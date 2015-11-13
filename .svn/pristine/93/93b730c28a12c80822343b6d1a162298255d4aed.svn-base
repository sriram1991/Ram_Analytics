<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AHR_Controller extends AM_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper("file");
        $this->load->library('form_validation');
        $this->load->model('resource_model');
    }

    public function index(){
        log_message('debug','AHR_Controller Index Called');
    }

    // Action : Resource Name Validation
    public function check_resource_name() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $resource_name = $this->input->post('resource_name');

            $result = $this->resource_model->get_resource_name($resource_name);
            if(isset($result)) {
                echo "true";
                log_message('debug','Check Resource Name : available'.$result);
            } else {
                echo "false";
                log_message('debug','Check Resource Name : not available'.$result);
            }
        }
    }

    // Action : Load PDF Model View
    public function ajax_add_pdf(){
        log_message('debug','****************** AHR_Controller AJAX PDF REQ View START ******************');
        $this->load->view('admin/ajax_upload_view');
        log_message('debug','****************** AHR_Controller AJAX PDF REQ View ENDED ******************');
    }

    // Action : Upload PDF Resource
    public function ajax_upload_file() {
        log_message('debug','****************** AHR_Controller AJAX PDF Upload START ******************');
        $status = "";
        $msg    = "";
        $file_element_name = 'resource_link';
        $resource['resource_name'] = $this->input->post('resource_name');
        $resource['resource_tag']  = $this->input->post('resource_tag');

        log_message('debug',' resource_name :'.$resource['resource_name']);
        log_message('debug',' resource_tag  :'.$resource['resource_tag']);

        if ($status != "error") {
            $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/resource/pdf';
            $config['allowed_types']    = 'pdf'; // OLD 'gif|jpg|png|doc|txt';
            $config['max_size']         = 1024 * 8;
            $config['encrypt_name']     = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                $image_path = $data['full_path'];
                log_message('debug','file uploaded : '.$data['file_name']);

                if(file_exists($image_path)) {
                    $status = "success";
                    $resource['resource_link'] = $data['file_name'];
                    $this->resource_model->add_pdf($resource);
                    $msg = "File successfully uploaded";
                } else {
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            // @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
        log_message('debug','****************** AHR_Controller AJAX PDF Upload ENDED ******************');
    }

    // Action : Add Video Resource Link
    public function add_video_resource() {

        log_message('debug','AHR_Controller Add Video Resource Called');
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"AHR_Controller POST Video Resource Called");
            $resource['resource_name']  = $this->input->post('resource_name');
            $resource['resource_link']  = $this->input->post('resource_link');
            $resource['resource_tag']   = $this->input->post('resource_tag');
            // add data in resource master table 
            $result = $this->resource_model->add_video($resource);

            log_message('debug',"Video Resource result ".$result);

            if($result == 1) { 
                echo "true";
                //redirect('/admin_home'); 
            } else { echo "false"; }
        }
    }

    // Action : Delete Resource Link
    public function delete_resource() {
        log_message('debug','AHR_Controller Delete Resource Called');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"AHR_Controller POST delete Resource Called");

            $resource_id  = $this->input->post('resource_id');
            $res_details  = $this->resource_model->get_resource_details($resource_id);
            
            switch ($res_details['resource_type']) {
                case 'PDF':
                    $pdf_file   = $res_details['resource_link'];
                    $file_path  = $_SERVER['DOCUMENT_ROOT'].'/static/resource/pdf';
                    $this->deleteFiles($file_path,$pdf_file);
                    $result = $this->resource_model->delete_resource($resource_id); 
                    if($result == 1) { 
                        log_message('debug','PDF Resource Deleted ');
                        echo "true";
                    } else { 
                        echo "false"; 
                    } 
                    break;
                case 'VIDEO': 
                    $result = $this->resource_model->delete_resource($resource_id);
                    if($result == 1) {
                        log_message('debug','Video Resource Deleted ');
                        echo "true";  
                    } else {
                        echo "false";
                    } 
                    break;
                case 'TEST':
                    log_message('debug','Deleted test ');
                    $result = $this->resource_model->delete_resource($resource_id);
                    if($result == 1) {
                        log_message('debug','TEST Resource Deleted ');
                        echo "true";  
                    } else {
                        echo "false";
                    } 
                    break;

                default:
                    log_message('debug','UNKnown Resource ');
                    break;
            }

            log_message('debug',"Video Deleted Resource result ".$resource_id." result: ".$result);
        }
    }

    // Action : Delete File @Server
    function deleteFiles($path,$file_name){
        unlink($path.'/'.$file_name); 
        log_message('debug','File Deleted @ '.$path.'/'.$file_name);
    }

    // Action : Add Assessment Resource
    public function add_assessment_resrouce() {
        log_message('debug','AHR_Controller Add Assessment Resource Called');
    }

    // Action : Add URL Resource
    public function add_url_resrouce() {
        log_message('debug','AHR_Controller Add URL Resource Called');
    }

    
    // Action: PDF File upload using page redirect *Note: this is not used
    public function add_pdf_resource() {
        log_message('debug','****************** AHR_Controller Add PDF Resource BEGIN ******************');
        //if($this->input->server('REQUEST_METHOD') == 'GET') {
            log_message('debug','Add PDF GET Method Called');
            // $this->load->view('admin/add_pdf_modal_view');
            $this->form_validation->set_rules('resource_name', 'PDF name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('resource_tag', 'PDF tag', 'trim|required|xss_clean');
            //$data['chapter_id']=$this->session->userdata('chapter_id');
            
            //Text input fields
            if ($this->form_validation->run() == FALSE) {
                $data['error'] ="";
                $this->load->view('admin/add_pdf_modal_view', $data);

                //$chapter_id=$this->session->userdata('chapter_id');   
                //$this->load->view('/admin/elements/pdf');
            } else { 
                
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/static/resource/pdf/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '10000';

                $file_name=preg_replace('/,/', '_', $_FILES['resource_link'] ['name']);
                $config['file_name']=$file_name;

                
                $this->load->library('upload', $config);
                $resource['resource_name'] = $this->input->post("resource_name");
                $resource['resource_tag']  = $this->input->post("resource_tag");

                log_message('debug','resource name '.$resource['resource_name']);
                log_message('debug','resource_tag '.$resource['resource_tag']);
                log_message('debug','file name '.$file_name);

                if (!$this->upload->do_upload('resource_link')) {
                    log_message('debug','I Got in PDF do_upl '.$this->upload->display_errors());                
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('admin/add_pdf_modal_view', $data);

                } else {
                    $pdf=$this->upload->data();

                    log_message('debug','I Got in PDF data '.$pdf['file_name']);

                    //$resource['resource_link'] = str_ireplace('.pdf','' ,$pdf['file_name']);
                    $resource['resource_link'] = $pdf['file_name'];
                    $result = $this->resource_model->add_pdf($resource);
                    if(isset($result)) { 
                        //$this->session->set_flashdata('load_view','open_course();');
                        redirect("/admin_home"); 
                    } else { 
                        log_message('debug','file details not saved in db'); 
                    }
                }

            }
        //}

        //if($this->input->server('REQUEST_METHOD') == 'POST') {
            
        //}
        log_message('debug','****************** AHR_Controller Add PDF Resource ENDED ******************');
    }

}




    