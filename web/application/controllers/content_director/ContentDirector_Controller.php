<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ContentDirector_Controller extends CD_Controller {

    // public function __construct(){
    //     parent::__construct();
    //     $this->load->helper('form');
    //     $this->load->helper('url');
    //     $this->load->helper("file");
    //     $this->load->library('form_validation');
    //     $this->load->model('resource_model');
    //     $this->load->model('user_model');
    // }

    public function __construct(){
        parent::__construct();
        $this->load->model('resource_model');
        $this->load->model('report_model');
        $this->load->model('batch_model');
        $this->load->model('user_model');
        $this->load->model('pincode_model');
    }

    public function index(){
        $data['data'] = $this->session->all_userdata();
        $data['flash_msg'] = $this->session->flashdata('success_msg');
        $data['user_home'] = "/content_director_home";
        $data['role_view'] = "content_director/content_director_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        $this->load->view('user_footer');
        log_message('debug', 'Content Director Admin home');
    }

    // Action : content admin dashboard 
    public function dashboard(){
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            // getting details of Affiliate and Mentor SME
            $data['affiliate_count'] = $this->user_model->get_user_count(9); 
            $data['mentor_count']    = $this->user_model->get_user_count(6); 
         
            // Load Resource view according to USER GM / Content Director
            $user_role = $this->session->userdata('user_role');
            $user_id   = $this->session->userdata('user_id');
            if($user_role == '8'){
                // $data['director_details']          = $this->resource_model->get_admin_subject($user_id);
                // $director_details                  = $this->resource_model->get_admin_subject($user_id);    
                // log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                // $data['subject_resource_count']    = $this->resource_model->get_subject_resource_count($director_details['subject_name']);
                // $data['subject_assessment_count']  = $this->resource_model->get_subject_assessment_count($director_details['subject_name']);
                // $data['resource_count']            = $this->resource_model->get_resource_count();
                $data['resource_count']            = $this->resource_model->get_admins_resource_count();
                // $data['assessment_count']          = $this->resource_model->get_assessment_count();
                $data['assessment_count']          = $this->resource_model->get_admins_assessment_count();
                log_message('debug','Content Director Admin Dashboard Loaded');
            }
            $data['user_details'] = $this->session->all_userdata();
            $this->load->view('content_admin/contentadmin_dashboard',$data);
        }
    }

    // Action : Open Course Resource Management
    public function open_content_management(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','********** Course Resource Management **********');
            $this->load->view('content_admin/content_management');
            log_message('debug','************************************************');
        }
    }



    // Action : Option Course Dashboard
    public function ca_dashboard() {
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('content_admin/ca_dashboard');
        }
    }

    public function course_management() {

        if($this->input->server('REQUEST_METHOD') == 'GET') {
            $data['user_details'] = $this->session->all_userdata();
            $this->load->view('content_admin/course_dashboard',$data);
        }

    }

    public function batch_view() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            //$data['resource_details'] = $this->resource_model->get_all_resources();
            $this->load->view('content_admin/batch_view');
        }
    }

    //---------------------------------------------------------------------------------------//
    // Validation for Name's Resource Assessment Subject Course
    //---------------------------------------------------------------------------------------//

    // Action : Check Resource Name Exist
    public function isResourceNamePresent() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $resource_name = $this->input->post('edit_resource_name');
            if($resource_name != null) {
                $resource_name = $this->input->post('edit_resource_name');
                $resource_id   = $this->input->post('resource_id');
                log_message('debug','Edit resource name :'.$resource_name.' resource id :'.$resource_id);
                $res = $this->resource_model->check_resource_name_id($resource_id,$resource_name);
                if($res != null){
                    echo "false";
                    log_message('debug','resource Name Present DB output: '.$res);
                } else {
                    echo "true";
                    log_message('debug','resource Name Not Prenent or Same DB output'.$res);
                }

            } else {
                $resource_name = $this->input->post('resource_name');
                log_message('debug','resource name :'.$resource_name);
                $res = $this->resource_model->get_resource_name($resource_name);
                if(isset($res)){
                    echo "false";
                    log_message('debug','resource Name Present DB output: '.$res);
                } else {
                    echo "true";
                    log_message('debug','resource Name Not Prenent DB output'.$res);
                }
            }
        }
    }

    // Action : Check Assessment Name Exist
    public function isAssessmentNoPresent() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $test_no = $this->input->post('test_no');
            log_message('debug',"Check Assessment No : ".$test_no);
            $res = $this->resource_model->get_assessment_no($test_no);
            if(isset($res)){
                echo "false";
                log_message('debug','Resource Name Present DB output: '.$res);
            } else {
                echo "true";
                log_message('debug','Resource Name Not Prenent DB output'.$res);
            }
        }
    }

    // Action : Check Subject Name Exist
    public function isSubjectNamePresent() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $subject_name = $this->input->post('edit_subject_name');
            if($subject_name != null) {
                $subject_name = $this->input->post('edit_subject_name');
                $subject_id   = $this->input->post('subject_id');
                log_message('debug','Edit subject name :'.$subject_name.' subject id :'.$subject_id);
                $res = $this->resource_model->check_subject_name_id($subject_id,$subject_name);
                if($res != null){
                    echo "false";
                    log_message('debug',' Edit subject Name Present DB output: '.$res);
                } else {
                    echo "true";
                    log_message('debug','Edit subject Name Not Prenent or Same DB output'.$res);
                }

            } else {
                $subject_name = $this->input->post('subject_name');
                log_message('debug','subject name :'.$subject_name);
                $res = $this->resource_model->get_subject_name($subject_name);
                if(isset($res)){
                    echo "false";
                    log_message('debug','subject Name Present DB output: '.$res);
                } else {
                    echo "true";
                    log_message('debug','subject Name Not Prenent DB output'.$res);
                }
            }
        }
    }

    // Action : Check Course Name Exist
    public function isCourseNamePresent() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $course_name = $this->input->post('edit_course_name');
            if($course_name != null) {
                $course_name = $this->input->post('edit_course_name');
                $course_id   = $this->input->post('course_id');
                log_message('debug','Edit course name :'.$course_name.' Course id :'.$course_id);
                $res = $this->resource_model->check_course_name_id($course_id,$course_name);
                if($res != null){
                    echo "false";
                    log_message('debug','Course Name Present DB output: '.$res);
                } else {
                    echo "true";
                    log_message('debug','Course Name Not Prenent or Same DB output'.$res);
                }

            } else {
                $course_name = $this->input->post('course_name');
                log_message('debug',' course name :'.$course_name);
                $res = $this->resource_model->get_course_name($course_name);
                if(isset($res)){
                    echo "false";
                    log_message('debug','Course Name Present DB output: '.$res);
                } else {
                    echo "true";
                    log_message('debug','Course Name Not Prenent DB output'.$res);
                }
            }
        }
    }
   
    //---------------------------------------------------------------------------------------//




    //---------------------------------------------------------------------------------------//
    // Resource Management 
    //---------------------------------------------------------------------------------------//

    // Action : Load Resource View Page
    public function resource_view() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            // Load Resource view according to USER GM / Content Director
            $user_role = $this->session->userdata('user_role');
            $user_id   = $this->session->userdata('user_id');
            if($user_role == '6'){
                $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                $director_details      = $this->resource_model->get_admin_subject($user_id);    
                log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                $data['resource_details'] = $this->resource_model->get_all_subject_resources($director_details['subject_name']);
            }
            if($user_role == '7'){
                $data['subject_list']    = $this->resource_model->get_all_subjects();
                $data['resource_details']   = $this->resource_model->get_all_resources();   
            }
            $this->load->view('content_admin/resource_view',$data);
        }
    }

    // Action : Load PDF Model View
    public function ajax_add_pdf(){
        log_message('debug','****************** Content Admin AJAX PDF REQ View START ******************');
        // Load Resource view according to USER GM / Content Director
        $user_role = $this->session->userdata('user_role');
        $user_id   = $this->session->userdata('user_id');
        if($user_role == '6'){
            $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
            $director_details      = $this->resource_model->get_admin_subject($user_id);    
            log_message('debug','Content Director Subject :'.$director_details['subject_name']);
            //$data['resource_details'] = $this->resource_model->get_all_subject_resources($director_details['subject_name']);
        }
        if($user_role == '7'){
            $data['subject_list']    = $this->resource_model->get_all_subjects();
            //$data['resource_details']   = $this->resource_model->get_all_resources();   
        }
        $this->load->view('content_admin/ajax_upload_view',$data);
        log_message('debug','****************** Content Admin AJAX PDF REQ View ENDED ******************');
    }

    // Action : Upload PDF Resource 
    public function ajax_upload_file() {
        log_message('debug','****************** Content Admin AJAX PDF Upload START ******************');
        $status = "";
        $msg    = "";
        $file_element_name = 'resource_link';
        $resource['subject_name']  = $this->input->post('subject_name');
        $resource['resource_name'] = $this->input->post('resource_name');
        $resource['resource_tag']  = $this->input->post('resource_tag');

        log_message('debug',' resource_name :'.$resource['resource_name']);
        log_message('debug',' resource_tag  :'.$resource['resource_tag']);

        if ($status != "error") {
            $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/resource/pdf';
            $config['allowed_types']    = 'pdf'; // OLD 'gif|jpg|png|doc|txt';
            $config['max_size']         = 1024 * 200;
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
        log_message('debug','****************** Content Admin AJAX PDF Upload ENDED ******************');
    }

    // Action : Load Video Modal View
    public function add_video_modal(){
        log_message('debug','****************** Content Admin Video Modal REQ View START ******************');
        // Load Resource view according to USER GM / Content Director
        $user_role = $this->session->userdata('user_role');
        $user_id   = $this->session->userdata('user_id');
        if($user_role == '6'){
            $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
            $director_details      = $this->resource_model->get_admin_subject($user_id);    
            log_message('debug','Content Director Subject :'.$director_details['subject_name']);
            //$data['resource_details'] = $this->resource_model->get_all_subject_resources($director_details['subject_name']);
        }
        if($user_role == '7'){
            $data['subject_list']    = $this->resource_model->get_all_subjects();
            //$data['resource_details']   = $this->resource_model->get_all_resources();   
        }
        $this->load->view('content_admin/add_video_modal',$data);
        log_message('debug','****************** Content Admin Video Modal REQ View ENDED ******************');
    }

    // Action : Add Video Resource Link
    public function add_video_resource() {

        log_message('debug','Content Admin Add Video Resource Called');
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Video Resource Called");
            $resource['subject_name']   = $this->input->post('subject_name');
            $resource['resource_name']  = $this->input->post('resource_name');
            $resource['resource_link']  = $this->input->post('resource_link');
            $resource['resource_tag']   = $this->input->post('resource_tag');
            // add data in resource master table 
            $result = $this->resource_model->add_video($resource);

            log_message('debug',"Video Resource result ".$result);

            if($result == 1) { 
                echo "true";
            } else { echo "false"; }
        }
    }

    //Action: Load Edit Res Modal View
    public function edit_res_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $resource_id = $this->input->post('res_id');
            $data['resource_details'] = $this->resource_model->get_resource_details($resource_id);
            log_message('debug','****************** Content Admin Edit Res Modal REQ View START ******************');
            $this->load->view('content_admin/edit_res_modal',$data);
            log_message('debug','****************** Content Admin Edit Res Modal REQ View ENDED ******************');
        }
        
    }

    // Action : Check Weather Assessment is Mapped and Punlished 
    public function isAssessmentNotPublished($test_id){
        $result = $this->resource_model->isAssessmentNotPublished($test_id);
        if($result != true){
            return true;
        }
        return false;
    }
    // Action : Load Edit Assessment Modal View
    public function edit_assessment_modal(){
        log_message('debug','****************** Content Admin Edit Assessment Modal REQ View START ******************');
        $user_id   = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        $test_id   = $this->input->post('test_id');
        $assessment_status = $this->isAssessmentNotPublished($test_id);
        if($assessment_status){
            if($user_role == '6'){
                $data['assessment_details'] = $this->resource_model->get_assessment_details($test_id);
                $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                $director_details      = $this->resource_model->get_admin_subject($user_id);
                log_message('debug','Content Director Subject :'.$director_details['subject_name']);
            }
            if($user_role == '7'){
                $data['assessment_details'] = $this->resource_model->get_assessment_details($test_id);
                $data['subject_list'] = $this->resource_model->get_all_subjects();
                log_message('debug','-- Question Mapped By Admin --');
            }
            $this->load->view('content_admin/edit_assessment_modal',$data);
        } else {
            $this->load->view('content_admin/cannot_edit_assessment_modal');
        }

        log_message('debug','****************** Content Admin Edit Assessment Modal REQ View ENDED ******************');
    }

    // Action : Edit Resource Link
    public function update_resource() {

        log_message('debug','Content Admin Update Resource Called');
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Update Resource Called");
            $resource_name  = $this->input->post('resource_name');
            $resource_tag   = $this->input->post('resource_tag');
            $resource_id    = $this->input->post('resource_id');
            // Edit data in resource master table 
            $result = $this->resource_model->update_resource_details($resource_id,$resource_name,$resource_tag);

            log_message('debug',"Update Resource result ".$result);

            if($result == 1) { 
                echo "true";
            } else { echo "false"; }
        }
    }



    // Action : Delete Resource Link
    public function delete_resource() {
        log_message('debug','Content Admin Delete Resource Called');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST delete Resource Called");

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


    //---------------------------------------------------------------------------------------//



    //---------------------------------------------------------------------------------------//
    // Assessment Management  
    //---------------------------------------------------------------------------------------//

    // Action : Load Assessment View Page
    public function assessment_list() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $user_id   = $this->session->userdata('user_id');         
            $user_role = $this->session->userdata('user_role');
            if($user_role == '6'){
                // $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                $director_details      = $this->resource_model->get_admin_subject($user_id);    
                log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                $data['assessment_details'] = $this->resource_model->get_all_subject_assessments($director_details['subject_name']);
            }
            if($user_role == '7'){
                $data['assessment_details'] = $this->resource_model->get_all_assessment();   
                log_message('debug','-- Question Mapped By Admin --');
            }
            // $data['assessment_details'] = $this->resource_model->get_all_assessment();
            $this->load->view('content_admin/assessment_list',$data);
        }
    }

    // Action : Load Assessment Modal View
    public function add_assessment_modal(){
        log_message('debug','****************** Content Admin Assessment Modal REQ View START ******************');
        $user_id   = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');
        if($user_role == '6'){
            $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
            $director_details      = $this->resource_model->get_admin_subject($user_id);
            log_message('debug','Content Director Subject :'.$director_details['subject_name']);
        }
        if($user_role == '7'){
            $data['subject_list'] = $this->resource_model->get_all_subjects();
            log_message('debug','-- Question Mapped By Admin --');
        }
        $this->load->view('content_admin/add_assessment_modal',$data);
        log_message('debug','****************** Content Admin Assessment Modal REQ View ENDED ******************');
    }

    // Action : Add Assessment Data and uploading PDF File in DB
    public function assessment_file_upload() {
        log_message('debug','****************** Content Admin AJAX Assessment PDF Upload START ******************');
        $status = "";
        $msg    = "";
        $file_element_name = 'upload_ques_paper';
        //collecting details
        $assessment['test_no']          = $this->input->post('test_no');
        $assessment['test_name']        = $this->input->post('test_name');
        $assessment['test_subject']     = $this->input->post('test_subject');
        $assessment['test_description'] = $this->input->post('test_description');
        $assessment['no_of_questions']  = $this->input->post('no_of_questions');
        $assessment['test_type']        = $this->input->post('test_type');
        $assessment['test_date']        = $this->input->post('test_date');
        $assessment['test_duration']    = $this->input->post('test_duration');
        $assessment_file                = $_FILES['upload_ques_paper'];
       // $assessment['start_time']       = $this->input->post('start_time');
       // $assessment['end_time']         = $this->input->post('end_time');


        log_message('debug',' test_no :'.$assessment['test_no']);
        log_message('debug',' test_name  :'.$assessment['test_name']);
        log_message('debug',' test_subject  :'.$assessment['test_subject']);
        log_message('debug',' test_description  :'.$assessment['test_description']);
        log_message('debug',' no_of_questions  :'.$assessment['no_of_questions']);
        log_message('debug',' test_type  :'.$assessment['test_type']);
        log_message('debug',' test_date  :'.$assessment['test_date']);
        log_message('debug',' test_duration  :'.$assessment['test_duration']);
        log_message('debug',' upload_ques_paper  :'.$assessment_file['name']);
       // log_message('debug',' start_time  :'.$assessment['start_time']);
       // log_message('debug',' end_time  :'.$assessment['end_time']);

       if ($status != "error") {
            $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/resource/questions';
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
                    $assessment['upload_ques_paper'] = $data['file_name'];
                    $this->resource_model->add_assessment_pdf($assessment);
                    $msg = "File successfully uploaded";
                } else {
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            // @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
        log_message('debug','****************** Content Admin AJAX Assessment PDF Upload ENDED ******************');
    }


    //Action: Load Edit Res Modal View
    public function ans_key_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $test_id = $this->input->post('test_id');
            $data['assessment_detail'] = $this->resource_model->get_assessment_details($test_id);
            log_message('debug','****************** Content Admin Answer key Modal REQ View START ******************');
            $this->load->view('content_admin/ans_key_modal',$data);
            log_message('debug','****************** Content Admin Answer key Modal REQ View ENDED ******************');
        }
        
    }


    // Action : save assessment answers in db
    public function save_answer(){
        log_message('debug',"Content Admin update Answer key called");
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug',"Content Admin POST Update Answer key called");
            $test_id    = $this->input->post('test_id');
            log_message('debug',"test id " . $test_id);
            $answer_key = $this->input->post('answer_key');
             log_message('debug',"answer key " . $answer_key);
            //update answers in assessment master table
            $result = $this->resource_model->update_answer_key($test_id,$answer_key);

            log_message('debug',"Update answer key" .$result);

            if($result ==1){
                echo "true";
            }else { echo "false";}
        }
    }  


    // Action : Delete Assessment
    public function delete_assessment() {
        log_message('debug','Content Admin Delete Assessment Called');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Delete Assessment Called");

            $test_id    = $this->input->post('test_id');
            $pdf_file   = $assessment_detail['upload_ques_paper'];
            $file_path  = $_SERVER['DOCUMENT_ROOT'].'/static/resource/questions';
            $this->deletepdfFiles($file_path,$pdf_file);
            $result = $this->resource_model->delete_assessment_file($test_id);
            
            if($result == 1) {
                log_message('debug','Assessment file Deleted ');
                echo "true";  
            } else {
                echo "false";
            }

            log_message('debug',"Assessment file Deleted test_id ".$test_id." result: ".$result);
        }
    }

    
    // Action : Delete File @Server
    function deletepdfFiles($path,$file_name){
        unlink($path.'/'.$file_name); 
        log_message('debug','File Deleted @ '.$path.'/'.$file_name);
    }

    //---------------------------------------------------------------------------------------//



    
    //---------------------------------------------------------------------------------------//
    // Subjects Management  
    //---------------------------------------------------------------------------------------//

    // Action : Load Subject View Page
    public function subject_view() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['subject_details'] = $this->resource_model->get_all_subjects();
            $this->load->view('content_admin/subject_view',$data);
        }
    }


    // Action : Load Subject Modal View
    public function add_subject_modal(){
        log_message('debug','****************** Content Admin Subject Modal REQ View START ******************');
        $this->load->view('content_admin/add_subject_modal');
        log_message('debug','****************** Content Admin Subject Modal REQ View ENDED ******************');
    }

    public function add_subject()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $subjects['subject_name'] = $this->input->post('subject_name');
            $subjects['description']  = $this->input->post('subject_description');

            // add data in resource master table 
            $result = $this->resource_model->add_subject($subjects);

            log_message('debug',"Subjects Resource result ".$result);

            if($result == 1) { 
                echo "true";
            } else { echo "false"; }

        }
    }

  //Action: Load Edit Sub Modal View
    public function edit_sub_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $subject_id = $this->input->post('sub_id');
            $data['subject_details'] = $this->resource_model->get_subject_details($subject_id);
            log_message('debug','****************** Content Admin Edit Sub Modal REQ View START ******************');
            $this->load->view('content_admin/edit_sub_modal',$data);
            log_message('debug','****************** Content Admin Edit Sub Modal REQ View ENDED ******************');
        }
        
    }


    // Action : Edit Subject Link
    public function update_subject() {

        log_message('debug','Content Admin Update Subject Called');
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Update Subject Called");
            $subjects_details['subject_name']  = $this->input->post('subject_name');
            $subjects_details['subject_description']   = $this->input->post('subject_description');
            $subjects_details['subject_id']   = $this->input->post('subject_id');
            // Edit data in subject master table 
            $result = $this->resource_model->update_subject_details($subjects_details);
            log_message('debug',"Edit Subject result ".$result);

            if($result == 1) { 
                echo "true";
            } else { echo "false"; }
        }
    }

    //Action: Update Assessment 
    public function update_assessment(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){

            log_message('debug','Content Admin Update Assesment Start');

            $assessment_details['test_subject']     = $this->input->post('test_subject');
            $assessment_details['test_type']        = $this->input->post('test_type');
            $assessment_details['test_name']        = $this->input->post('test_name');
            $assessment_details['test_description'] = $this->input->post('test_description');
            $assessment_details['no_of_questions']  = $this->input->post('no_of_questions');
            $assessment_details['test_duration']    = $this->input->post('test_duration');
            $assessment_details['test_date']        = $this->input->post('test_date');
            $assessment_details['test_id']          = $this->input->post('test_id');

            //Edit data in assessment_master table
            $result = $this->resource_model->update_test_details($assessment_details);

            log_message('debug',"Edit Assessment result".$result);
            if($result ==1){
                echo "true";
            }else { echo "false"; }
        }
    }



    // Action : Delete Subject
    public function delete_subject() {
        log_message('debug','Content Admin Delete Delete Subject Called');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Delete Subject Called");

            $subject_id  = $this->input->post('subject_id');
            $result = $this->resource_model->delete_subject($subject_id);
            
            if($result == 1) {
                log_message('debug','Subject Resource Deleted ');
                echo "true";  
            } else {
                echo "false";
            }

            log_message('debug',"Subject Resource Deleted sub_id ".$subject_id." result: ".$result);
        }
    }

    //---------------------------------------------------------------------------------------//



    //---------------------------------------------------------------------------------------//
    // Course Management  
    //---------------------------------------------------------------------------------------//

    // Action : Load Course View Page
    public function course_view() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['course_details'] = $this->resource_model->get_all_courses();
            $this->load->view('content_admin/course_view',$data);
        }
    }

    // Action : Load Course Modal View
    public function add_course_modal(){
        log_message('debug','****************** Content Admin Course Modal REQ View START ******************');
        $this->load->view('content_admin/add_course_modal');
        log_message('debug','****************** Content Admin Course Modal REQ View ENDED ******************');
    }

    // Action : Add Course Data in DB
    public function add_course()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $courses['course_name']         = $this->input->post('course_name');
            $courses['course_description']  = $this->input->post('course_description');
            $courses['course_duration']     = $this->input->post('course_duration');
            $courses['course_type']         = $this->input->post('course_type');
            $courses['course_fee']          = $this->input->post('course_fee');
            $courses['course_status']       = $this->input->post('course_status');           
            // add data in course master table 
            $result = $this->resource_model->add_course($courses);

            log_message('debug',"course Resource result ".$result);

            if($result == 1) { 
                echo "true";
            } else { echo "false"; }

        }
    }

    //Action: Load Edit Course Modal View
    public function edit_course_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $course_id = $this->input->post('course_id');
            $data['course_details'] = $this->resource_model->get_courses_details($course_id);
            log_message('debug','****************** Content Admin Edit Course Modal REQ View START ******************');
            $this->load->view('content_admin/edit_course_modal',$data);
            log_message('debug','****************** Content Admin Edit Course Modal REQ View ENDED ******************');
        }
        
    }

   
    // Action : Edit Subject Link
    public function update_course() {

        log_message('debug','Content Admin Update course Called');
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Update course Called");
            $course_details['course_id']            = $this->input->post('course_id');
            $course_details['course_name']          = $this->input->post('course_name');
            $course_details['course_description']   = $this->input->post('course_description');
            $course_details['course_duration']      = $this->input->post('course_duration');
            $course_details['course_type']          = $this->input->post('course_type');
            $course_details['course_fee']           = $this->input->post('course_fee');
            $course_details['course_status']        = $this->input->post('course_status');
            log_message('debug','Course ID '.$course_details['course_id']);
            log_message('debug','Course Name '.$course_details['course_name']);
            log_message('debug','Course Desc '.$course_details['course_description']);
            log_message('debug','Course Duration '.$course_details['course_duration']);
            log_message('debug','Course Type  '.$course_details['course_type']);
            log_message('debug','Course Fee  '.$course_details['course_fee']);
            log_message('debug','Course status  '.$course_details['course_status']);

            // Edit data in subject master table 
            $result = $this->resource_model->update_course_details($course_details);
            log_message('debug',"Edit course result ".$result);

            if($result == 1) { 
                echo "true";
            } else { echo "false"; }
        }
    }



    
    // Action : Delete course
    public function delete_course() {
        log_message('debug','Content Admin Delete Delete course Called');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Delete course Called");

            $course_id  = $this->input->post('course_id');
            $result = $this->resource_model->delete_course($course_id);
            
            if($result == 1) {
                log_message('debug','Course Resource Deleted ');
                echo "true";  
            } else {
                echo "false";
            }

            log_message('debug',"Course Resource Deleted course_id ".$course_id." result: ".$result);
        }
    }

    //---------------------------------------------------------------------------------------//

    //---------------------------------------------------------------------------------------//
    // Map Course & Resource Management 
    //---------------------------------------------------------------------------------------//
        // Action : Get Course Resource Map View
        public function course_resource_mapview(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_details'] = $this->resource_model->get_all_published_courses();
                log_message('debug','********* Content Admin Course Resource Map View *********');
                $this->load->view('content_admin/course_resource_mapview',$data);
                log_message('debug','**********************************************************');
            }
        } 

        // Action : Get Course Resource Map List 
        public function course_resource_maplist($value=''){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $course_id =  $this->input->post('course_id');
                log_message('debug','Get Course Resource Map List with Course ID: '.$course_id);
                $data['user_details']   = $this->session->all_userdata();
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $user_id                = $this->session->userdata('user_id');
                $user_role              = $this->session->userdata('user_role');
                if($user_role == '6'){
                    $director_details       = $this->resource_model->get_admin_subject($user_id);    
                    log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                    $data['syllabus_list']  = $this->resource_model->get_director_course_resource_maplist($course_id,$director_details['subject_name']);
                }
                if($user_role == '7'){
                    $data['syllabus_list']  = $this->resource_model->get_course_resource_maplist($course_id);
                }
                $this->load->view('content_admin/course_resource_map_list',$data);
            }
        }

        //Action: Load view pdf modal
        public function view_resource_modal(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                log_message('debug','******************view pdf modal start*************');
                $syllabus_type = $this->input->post('syllabus_type');
                $resource_type = $this->input->post('res_type');
                $resource_id   = $this->input->post('res_id');
                $resource_details = $this->resource_model->get_resource_details($resource_id);
                log_message('debug','syllabus_type '.$syllabus_type);
                switch ($resource_type) {
                    case 'PDF':
                        $data['resource_details']  = $resource_details;
                        $resource_link = $this->input->post('resource_link');
                        log_message('debug','resource_id '.$resource_id);
                        log_message('debug','resource_type '.$resource_type);
                        log_message('debug','resource link' .$resource_details['resource_link']);
                        $this->load->view('content_admin/view_pdf_modal',$data);


                        # code...
                        break;
                    case 'VIDEO':
                        log_message('debug','resource_id '.$resource_id);
                        log_message('debug','resource_type '.$resource_type);
                        $data['resource_details']  = $resource_details;
                        $data['resource_link']  = $resource_details['resource_link'];
                        $this->load->view('content_admin/view_video_modal',$data);
                        # code...
                        break;
                    default:
                        # code...
                        break;
                }
                log_message('debug','***************view pdf modal end******************');
            }
        }

        //Action -> Load View Assessment Pdf Modal
        public function view_assessment_pdf(){
            if($this->input->server('REQUEST_METHOD') =='POST'){
                log_message('debug','***************view assessment pdf modal start******************');
                $syllabus_type      = $this->input->post('syllabus_type');
                $test_id            = $this->input->post('test_id');
                $upload_ques_paper  = $this->input->post('upload_ques_paper');
                log_message('debug','Syllabus Type '.$syllabus_type);
                log_message('debug','Test ID '.$test_id);

                $assessment_details = $this->resource_model->get_assessment_details($test_id);
                $data['assessment_details'] = $assessment_details;
                $this->load->view('content_admin/view_assessment_pdf',$data);
                log_message('debug','***************view assessment pdf modal end******************');
            }
        }
        
        // Action -> CURL TO GET URL DATA
        public function curl_get($url) {
            // $this->load->library('curl');
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            $return = curl_exec($curl);
            curl_close($curl);
            log_message('debug',"CURL Result ".$return);
            return $return;
        } 

        // Action -> Generate embeded IFRAME Code   
        public function embed_video() {
            // $this->layout = "default";
            $url = $this->input->get('url');
            $json = "";
             if(strstr($url,"youtube"))
                $json = $this->curl_get("https://www.youtube.com/oembed?url=".rawurlencode($url)."&format=json&callback=foo");
            else if(strstr($url,"vimeo"))
                $json = $this->curl_get("https://vimeo.com/api/oembed.json?url=".rawurlencode($url));
            if(is_object(json_decode($json)) == 1) {
                echo $json;
                log_message('debug','------------------------------------------------------');
                log_message('debug','| JSON Result : '.$json);
                log_message('debug','------------------------------------------------------');
            } else {
                log_message('debug','------------------------------------------------------');
                log_message('debug','| JSON Result : '.$json);
                log_message('debug','------------------------------------------------------');
                $json = json_encode(array("html" => "<h3>Video not available. Please try later.</h3>"));
                echo $json;
            }
        }

        // Action : Load Course Resource Map Modal View
        public function load_cres_map_modal(){
            log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View START ******************');
            $user_id = $this->session->userdata('user_id');
            $data['module_list']   = $this->resource_model->get_module_list();
            $data['group_list']    = $this->resource_model->get_group_list();
            $user_role             = $this->session->userdata('user_role');
            if($user_role == '6'){
                $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                $director_details      = $this->resource_model->get_admin_subject($user_id);    
                log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                $data['resource_list'] = $this->resource_model->get_all_subject_resources($director_details['subject_name']);
            }
            if($user_role == '7'){
                $data['subject_list']    = $this->resource_model->get_all_subjects();
                $data['resource_list']   = $this->resource_model->get_all_resources();   
            }
            // $data['subject_list']  = $this->resource_model->get_all_subjects();
            $this->load->view('content_admin/load_cres_map_modal',$data);
            log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View ENDED ******************');
        }

        // Action : Add Map B/W Course and Resource 
        public function add_course_resource(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $CRES_mapdata['course_id']      = $this->input->post('course_id');
                $CRES_mapdata['module_name']    = $this->input->post('module_name');
                $CRES_mapdata['group_name']     = $this->input->post('group_name');
                $CRES_mapdata['subject_name']   = $this->input->post('subject_name');
                $CRES_mapdata['syllabus_type']  = $this->input->post('syllabus_type');
                $CRES_mapdata['resource_id']    = $this->input->post('resource_id');
                $CRES_mapdata['schedule']       = $this->input->post('schedule');
                $CRES_mapdata['resource_status']= 'UnPublished';  
                
                // add data in course subject resource map table 
                $result = $this->resource_model->add_syllabus($CRES_mapdata);    
                log_message('debug',"ADD Syllabus result ".$result);
                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }

        // Action : Edit Course Resource Map Modal View
        public function edit_cres_map_modal(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View START ******************');
                $user_id = $this->session->userdata('user_id');
                $map_id  = $this->input->post('map_id');
                log_message('debug','MAP ID : '.$map_id);
                $data['module_list']   = $this->resource_model->get_module_list();
                $data['group_list']    = $this->resource_model->get_group_list();
                $user_role             = $this->session->userdata('user_role');
                if($user_role == '6'){
                    $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                    $director_details      = $this->resource_model->get_admin_subject($user_id);    
                    log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                    $data['resource_list'] = $this->resource_model->get_all_resources();
                }
                if($user_role == '7'){
                    $data['subject_list']    = $this->resource_model->get_all_subjects();
                    $data['resource_list']   = $this->resource_model->get_all_resources();   
                }
                $data['cres_map_details']  = $this->resource_model->get_course_resource_map_details($map_id);
                // log_message('debug','cres details '.print_r($data['cres_map_details']));
                $this->load->view('content_admin/edit_cres_map_modal',$data);
                log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View ENDED ******************');
            }
        }

        // Action : Update Map B/W Course and Resource 
        public function update_course_resource(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $update_CRES_mapdata['map_id']         = $this->input->post('map_id');
                $update_CRES_mapdata['module_name']    = $this->input->post('module_name');
                $update_CRES_mapdata['group_name']     = $this->input->post('group_name');
                $update_CRES_mapdata['subject_name']   = $this->input->post('subject_name');
                $update_CRES_mapdata['syllabus_type']  = $this->input->post('syllabus_type');
                $update_CRES_mapdata['resource_id']    = $this->input->post('resource_id');
                $update_CRES_mapdata['schedule']       = $this->input->post('schedule');
                $update_CRES_mapdata['resource_status']= 'UnPublished';    
                
                // add data in course subject resource map table 
                $result = $this->resource_model->update_syllabus($update_CRES_mapdata);    
                log_message('debug',"ADD Syllabus result ".$result);
                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }

    //---------------------------------------------------------------------------------------//

    
    //---------------------------------------------------------------------------------------//
    // Map Course & assessment Management 
    //---------------------------------------------------------------------------------------//
        // Action : Get Course Assessment Map View
        public function course_assessment_mapview(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_details'] = $this->resource_model->get_all_published_courses();
                log_message('debug','********* Content Admin Course Resource Map View *********');
                $this->load->view('content_admin/course_assessment_mapview',$data);
                log_message('debug','**********************************************************');
            }
        }

        // Action : Get Course Test Map List 
        public function course_test_maplist($value=''){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $course_id =  $this->input->post('course_id');
                log_message('debug','Get Course Resource Map List with Course ID: '.$course_id);
                $data['user_details'] = $this->session->all_userdata();
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                // List Mapping Detils accouring to User
                $user_id                = $this->session->userdata('user_id');
                $user_role              = $this->session->userdata('user_role');
                if($user_role == '6'){
                    $director_details      = $this->resource_model->get_admin_subject($user_id);    
                    log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                    $data['syllabus_list']  = $this->resource_model->get_director_course_assessment_maplist($course_id,$director_details['subject_name']);
                }
                if($user_role == '7'){
                    $data['syllabus_list']  = $this->resource_model->get_course_assessment_maplist($course_id);
                }
                $this->load->view('content_admin/course_assessment_map_list',$data);
            }
        }

        // Action : Load Course Test Map Modal View
        public function load_ctest_map_modal(){
            log_message('debug','****************** Content Admin Course Course Test Map Modal REQ View START ******************');
            $user_id = $this->session->userdata('user_id');
            $data['module_list']   = $this->resource_model->get_module_list();
            $data['group_list']    = $this->resource_model->get_group_list();
            $user_role             = $this->session->userdata('user_role');
            if($user_role == '6'){
                $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                $director_details      = $this->resource_model->get_admin_subject($user_id);    
                log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                $data['assessment_list'] = $this->resource_model->get_all_subject_assessments_with_key($director_details['subject_name']);
            }
            if($user_role == '7'){
                $data['subject_list']    = $this->resource_model->get_all_subjects();
                $data['assessment_list'] = $this->resource_model->get_all_admins_assessment_with_key();   
                log_message('debug','-- Question Mapped By Admin --');
            }
            // $data['subject_list']  = $this->resource_model->get_all_subjects();
            $this->load->view('content_admin/load_ctest_map_modal',$data);
            log_message('debug','****************** Content Admin Course Course Test Map Modal REQ View ENDED ******************');
        }

        // Action : Add Map B/W Course and Test 
        public function add_course_test(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $CTEST_mapdata['course_id']      = $this->input->post('course_id');
                $CTEST_mapdata['module_name']    = $this->input->post('module_name');
                $CTEST_mapdata['group_name']     = $this->input->post('group_name');
                $CTEST_mapdata['subject_name']   = $this->input->post('subject_name');
                $CTEST_mapdata['syllabus_type']  = $this->input->post('syllabus_type');
                $CTEST_mapdata['resource_id']    = $this->input->post('resource_id');
                $CTEST_mapdata['schedule']       = $this->input->post('schedule');   
                $CTEST_mapdata['resource_status']= 'UnPublished';
                // Add data in course subject resource map table 
                $result = $this->resource_model->add_syllabus($CTEST_mapdata);    
                log_message('debug',"ADD Syllabus result ".$result);
                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }

        // Action : Edit Course Test Map Modal View
        public function edit_ctest_map_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                log_message('debug','****************** Content Admin Course Course Test Map Modal REQ View START ******************');
                $user_id = $this->session->userdata('user_id');
                $map_id  = $this->input->post('map_id');
                $data['module_list']   = $this->resource_model->get_module_list();
                $data['group_list']    = $this->resource_model->get_group_list();
                $user_role             = $this->session->userdata('user_role');
                if($user_role == '6'){
                    $data['subject_list']  = $this->resource_model->get_admin_subject_details($user_id);
                    $director_details      = $this->resource_model->get_admin_subject($user_id);    
                    log_message('debug','Content Director Subject :'.$director_details['subject_name']);
                    $data['assessment_list'] = $this->resource_model->get_all_subject_assessments($director_details['subject_name']);
                }
                if($user_role == '7'){
                    $data['subject_list']    = $this->resource_model->get_all_subjects();
                    $data['assessment_list'] = $this->resource_model->get_all_assessment();   
                    log_message('debug','-- Question Mapped By Admin --');
                }
                $data['ctest_map_details']  = $this->resource_model->get_course_assessment_map_details($map_id);
                $this->load->view('content_admin/edit_ctest_map_modal',$data);
                log_message('debug','****************** Content Admin Course Course Test Map Modal REQ View ENDED ******************');
            }
        }

        // Action : Update Map B/W Course and Test 
        public function update_course_test(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $update_CTEST_mapdata['map_id']      = $this->input->post('map_id');
                $update_CTEST_mapdata['module_name']    = $this->input->post('module_name');
                $update_CTEST_mapdata['group_name']     = $this->input->post('group_name');
                $update_CTEST_mapdata['subject_name']   = $this->input->post('subject_name');
                $update_CTEST_mapdata['syllabus_type']  = $this->input->post('syllabus_type');
                $update_CTEST_mapdata['resource_id']    = $this->input->post('resource_id');
                $update_CTEST_mapdata['schedule']       = $this->input->post('schedule');
                $update_CTEST_mapdata['resource_status']='UnPublished';    
                
                // Update data in course subject resource map table 
                $result = $this->resource_model->update_syllabus($update_CTEST_mapdata);    
                log_message('debug',"ADD Syllabus result ".$result);
                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }
        

    //---------------------------------------------------------------------------------------//

    //---------------------------------------------------------------------------------------//
    // Course Syllabus Management 
    //---------------------------------------------------------------------------------------//
    
    // Action : Get Course syllabus view
    public function course_syllabus_view() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['course_details'] = $this->resource_model->get_all_courses();
            $this->load->view('content_admin/course_syllabus_view',$data);
        }
    }

    // Action : Get Syllabus List for The Course 
    public function syllabus_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $course_id =  $this->input->post('course_id');
            log_message('debug','Syllabus List Course ID: '.$course_id);
            $data['course_details'] = $this->resource_model->get_courses_details($course_id);
            $data['syllabus_list']  = $this->resource_model->get_syllabus_list($course_id);
            $this->load->view('content_admin/syllabus_list',$data); 
        }
    }

    // Action : Load Course Syllabus Resource Modal View
    public function load_csr_modal(){
        log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View START ******************');
        $user_id = $this->session->userdata('user_id');
        $data['module_list']   = $this->resource_model->get_module_list();
        $data['group_list']    = $this->resource_model->get_group_list();
        $data['admin_details'] = $this->resource_model->$CI($user_id);
        $data['resource_list'] = $this->resource_model->get_all_resources();
        $data['subject_list']  = $this->resource_model->get_all_subjects();
        $this->load->view('content_admin/load_csr_modal',$data);
        log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View ENDED ******************');
    }

    // Action : Load Course Syllabus Assessment Modal View
    public function load_csa_modal(){
        log_message('debug','****************** Content Admin Course Syllabus Assessment Modal REQ View START ******************');
        $data['assessment_list'] = $this->resource_model->get_all_resources();
        $data['subject_list']    = $this->resource_model->get_all_subjects();
        $this->load->view('content_admin/load_csa_modal',$data);
        log_message('debug','****************** Content Admin Course Syllabus Assessment Modal REQ View ENDED ******************');
    }

    // Action : Add Syllabus Data in DB
    public function add_syllabus(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $syllabus['course_id']      = $this->input->post('course_id');
            $syllabus['subject_name']   = $this->input->post('subject_name');
            $syllabus['syllabus_type']  = $this->input->post('syllabus_type');
            $syllabus['resource_id']    = $this->input->post('resource_id');
            $syllabus['schedule']       = $this->input->post('schedule');    
            $syllabus['module_name']    = 'Model 1';
            $syllabus['group_name']     = 'Group I';
            // add data in course subject resource map table 
            $result = $this->resource_model->add_syllabus($syllabus);    
            log_message('debug',"ADD Syllabus result ".$result);
            if($result == 1) { 
                echo "true";
            } else { echo "false"; }
        }
    }

    function change_order_res() {

        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $orderlist = explode(',', $_POST['order']);

            foreach ($orderlist as $order=>$id) {
                $this->resource_model->change_order_res($order+1,$id);
            }
            //print_r($orderlist) ;
        }
    }

    // Action : Delete course syllabus
    public function delete_syllabus() {
        log_message('debug','Content Admin Delete course syllabus Called');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug',"Content Admin POST Delete course syllabus Called");

            $map_id  = $this->input->post('map_id');
            $result = $this->resource_model->delete_syllabus($map_id);
            
            if($result == 1) {
                log_message('debug','Course Syllabus Deleted ');
                echo "true";  
            } else {
                echo "false";
            }

            log_message('debug',"Course Syllabus Deleted map_id ".$map_id." result: ".$result);
        }
    }

    // Action : Get Course list view 

    //---------------------------------------------------------------------------------------//


}
