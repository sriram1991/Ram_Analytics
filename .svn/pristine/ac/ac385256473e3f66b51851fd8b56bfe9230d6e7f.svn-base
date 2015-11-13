<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Home page for skol
class Test extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('form_validation');

	}

	public function index()
	{
		$this->load->view('default_home_header');
		$this->load->view('student_home_body');
		$this->load->view('default_home_footer');
	}

	public function test2()
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$data['msg'] = "";
			$data['main_content'] = "check_email_view";
        	$this->load->view('includes/template',$data);
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$user_email = $this->input->post('user_email');	
			$result = $this->get_details($user_email);
			if($result){
				$data['msg'] = "Email Id Exist";
				$data['user_details'] = $result;
				$data['main_content'] = "check_email_view";
        		$this->load->view('includes/template',$data);
			} else {
				$data['msg'] = "Email Id not present";
				$data['main_content'] = "check_email_view";
        		$this->load->view('includes/template',$data);
			}
		}
	}

	public function user_view()
	{
		$this->load->view('user_header');
		$this->load->view('user_body_leftpan');
		$this->load->view('user_body_rightpan');
		$this->load->view('user_footer');
	}

	public function get_leftpan()
	{
		if($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->load->view('student/left_side_tree');
		}
	}

	public function get_rightpan()
	{
		if($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->load->view('student/right_side_content');
		}
	}

	function get_details($user_email) {
		$this->load->model('register_model');
		$result = $this->register_model->get_details($user_email);

		if(count($result) > 1){
			return $result;
		} else {
			return false;
		}
	}

	public function add_file() {
		$this->load->view('add_file');
	}

	public function file_upload() {
		// $this->form_validation->set_rules('resource_name', 'PDF name', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('resource_tag', 'PDF tag', 'trim|required|xss_clean');
        //Text input fields
        if($this->input->server('REQUEST_METHOD') == 'GET'){
        	if ($this->form_validation->run() == FALSE) {
            $data['error'] ="";

            $data['main_content'] ='admin/add_pdf_modal_view';
            $this->load->view('includes/template', $data);

            //$chapter_id=$this->session->userdata('chapter_id');   
            //$this->load->view('/admin/elements/pdf');

        	}	
        }
         
        if($this->input->server('REQUEST_METHOD') == 'POST'){

        	$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/static/img/user_photo';
        	$config['allowed_types'] = 'gif|jpg|png';
        	$config['max_size']		= 1204 * 2;
			$config['max_width']  	= '1024';
			$config['max_height']  	= '768';
			$config['encrypt_name'] = FALSE;

			$file_name 				= $_FILES['resource_link'];
			log_message('debug','File i got is '.$file_name['name']);
			// $config['file_name'] 	= $file_name;
        	
			log_message('debug','I Got in resource_link as');
	        
	        $this->load->library('upload', $config);
    	    $pdfname=$this->input->post("resource_link");
        	$resource_tag=$this->input->post("pdf_tags");

        	if ( ! $this->upload->do_upload('resource_link')) {

            	$data['error'] = $this->upload->display_errors();
            	$data['main_content'] ='admin/add_pdf_modal_view';
            	$this->load->view('includes/template', $data);

        	} else {
            	// $chapter_id=$this->session->userdata('chapter_id');
            	$pdf=$this->upload->data();

            	$pdf_link=str_ireplace('.pdf','' ,$pdf['file_name']);
            	log_message('debug','+++++++++++ file upload link '.$pdf_link);
            	// $this->resource_model->savePdf($pdfname,$pdf_link,$resource_tag,$chapter_id);
            	echo "File upload success ";
            	// redirect("/admin/elements/".$chapter_id);
        	}
    	}
	}

	// Tally Integration Testing 
	public function calling_curl($xmlValue){
		// create curl resources
		$ch = curl_init();
		if(curl_error($ch) !=0){
			show_error(curl_error($ch));
		}
		// set url
	
		//include("curl_ip.php");
		curl_setopt($ch, CURLOPT_URL, "http://192.168.1.71:9000");
		//curl_setopt($ch, CURLOPT_URL, "http://192.168.1.28:9000");
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlValue);
	
		//return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
		// $output contains the output string
		$output = curl_exec($ch);
		//curl_exec($ch);
			//echo $output."<br/><br/>";
	/*
		if(!$output) {
			$output="error";
		}
		else
		{
			//		   echo "<pre>" . htmlspecialchars($output) . "</pre>";
			 
			/**************************************
			 XML extraction
			*****************************************
				
			$status = $this->value_in('STATUS', $output);
			echo "status=$status<br/>";
			if($status==0)
			echo "<b>Operations failure</b><br/><br/>";
			else
			echo "<b>Operations Successful</b><br/>";
	
			$version = $this->value_in('VERSION', $output);
			echo "version=$version<br/><br/>";
	
			/**************************************
			XML extraction
			***************************************** /
	
		}
	*/
	
	
		// close curl resource to free up system resources
		curl_close($ch);
		return $output;
	}
	
}