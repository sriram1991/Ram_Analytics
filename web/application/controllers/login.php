<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		 $this->load->library('session');
		 $this->load->helper('url');
	}
	public function index() {
		//debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		// $this->load->view('login_view');
		$this->load->model('user_model');
		$user_details = $this->session->all_userdata();
		// Check for Session 
		$this->check_for_session($user_details);
	}

	// Action -> Check for Session And redirect to page else load login
	function check_for_session($user_details){
		if(isset($user_details['user_id'])) {
			log_message('debug','Setting Session with user details');
			$this->session->set_userdata($user_details);

			/*====== USER ROLES ================*
			 |       1 | Student         	    |
			 |       2 | Parent/Guardian 	    |
			 |       3 | SPOC 		       	    |
			 |       4 | Registrar       	    |
			 |       5 | Accountant      	    |
			 |       6 | Mentor/SME 	 	    |
			 |       7 | Super Admin       	    |
			 |       8 | Content Director Admin |
			 |       9 | Affiliate Role 			|
			 *==================================*/

			switch ($user_details['user_role']) {
				case '1':
					redirect('/user_home');
					break;
				case '2':
					redirect('/parent_home');
					break;
				case '3':
					redirect('/spoc_home');
					break;
				case '4':
					redirect('/registrar_home');
					break;
				case '5':
					redirect('/accountant_home');
					break;
				case '6':
					redirect('/mentor_home');
					break;
				case '7':
					redirect('/admin_home');
					break;
				case '8':
					redirect('/content_director_home');
					break;
				case '9':
					redirect('/affilate_home');
					break;
				default:
					redirect('/previlege_error');
					break;
			}
		} else {
			$this->load->view('default_home_header');
			$this->load->view('default_home_body');
			$this->load->view('default_home_footer');
		}
	}

	// Action -> For Logout 
    public function logout(){
    	//debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
    	
    	$data['error_msg'] = "<h4 style='color: red;'> ".$this->session->flashdata('error_msg')." </h4>";
		$this->load->view('default_home_header');
		$this->load->view('default_home_body',$data);
		$this->load->view('default_home_footer');
        $this->session->sess_destroy();
        log_message('debug','Session destroyed');
    }

	public function authenticate() {
		$data = array();
		$data['msg'] = null;
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model('user_model');
			$user_email 	= $this->input->post('loginname');
			$user_password 	= $this->input->post('password');
			$user_details 	= $this->user_model->authenticateUser($user_email,$user_password);

			if($user_details != null) {
				log_message('debug','Setting Session with user details');
				$this->session->set_userdata($user_details);

				/*====== USER ROLES ================*
				 |       1 | Student         	    |
				 |       2 | Parent/Guardian 	    |
				 |       3 | SPOC 		       	    |
				 |       4 | Registrar       	    |
				 |       5 | Accountant      	    |
				 |       6 | Mentor/SME 	 	    |
				 |       7 | Super Admin       	    |
				 |       8 | Content Director Admin |
				 |       9 | Affiliate Role 			|
				 *==================================*/
				 
				switch ($user_details['user_role']) {
					case '1':
						redirect('/user_home');
						break;
					case '2':
						redirect('/parent_home');
						break;
					case '3':
						redirect('/spoc_home');
						break;
					case '4':
						redirect('/registrar_home');
						break;
					case '5':
						redirect('/accountant_home');
						break;
					case '6':
						redirect('/mentor_home');
						break;
					case '7':
						redirect('/admin_home');
						break;
					case '8':
						redirect('/content_director_home');
						break;
					case '9':
						redirect('/affilate_home');
						break;
					default:
						redirect('/previlege_error');
						break;
				}
			} else {
				// Error Login
				log_message('debug','USER Not Found '.$user_email);
				$this->session->set_flashdata('error_msg', 'Please enter valid user name and password !');
				redirect('/logout');
			}
		} else { redirect('/logout'); }
	}	
}