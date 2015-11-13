<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registration extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('register_model');
		$this->load->model('pincode_model');
	}

	public function index() {
		log_message('debug',"Registration Controller");

	}

	// public function user_registration(){
		
	// }

	public function student_registration(){
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			if ($this->form_validation->run() == FALSE) {
            	$data['error'] ="";
				$this->load->view('default_home_header');
				$this->load->view('common/student_reg_view',$data);
				$this->load->view('default_home_footer');
			}
		}

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			// Get Student Details and Parent Details 
			$student_details = array();
			$student_details['first_name'] 		= $this->input->post('student_first_name');
			$student_details['last_name'] 		= $this->input->post('student_last_name');
			$student_details['middle_name'] 	= $this->input->post('student_middle_name');
			$student_details['user_email'] 		= $this->input->post('student_email');
			$student_details['user_phone'] 		= $this->input->post('student_phone');
			$student_details['user_photo'] 		= $this->input->post('profile_picture');
			$student_details['user_address'] 	= $this->input->post('address');
			$student_details['user_city'] 		= $this->input->post('city');
			$student_details['user_state'] 		= $this->input->post('state');
			$student_details['user_country'] 	= $this->input->post('country');
			$student_details['user_pincode'] 	= $this->input->post('pincode');
            $res = $this->pincode_model->getPincode($student_details['user_pincode']);
            if($res != null){
                $student_details['user_district']=$res['district_name'];
            }
            else{
                $student_details['user_district']='District';
            }
			
			$parent_details = array();
			$parent_details['first_name'] 		= $this->input->post('parent_first_name');
			$parent_details['last_name'] 		= $this->input->post('parent_last_name');
			$parent_details['middle_name'] 		= $this->input->post('parent_middle_name');
			$parent_details['user_email'] 		= $this->input->post('parent_email');
			$parent_details['user_phone'] 		= $this->input->post('parent_phone');
			$parent_details['user_address'] 	= $this->input->post('address');
			$parent_details['user_city'] 		= $this->input->post('city');
			$parent_details['user_state'] 		= $this->input->post('state');
			$parent_details['user_country'] 	= $this->input->post('country');
			$parent_details['user_pincode'] 	= $this->input->post('pincode');
            if($res != null){
                $parent_details['user_district']=$res['district_name'];
            }
            else{
                $parent_details['user_district']='District';
            }

			// Checking for Student Profile pircute and Upload 
            $file_name = $_FILES['profile_picture'];
            if($file_name['name'] != null){
				$config['upload_path'] 	 = $_SERVER['DOCUMENT_ROOT'].'/static/img/user_photo/';
	        	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	        	$config['max_size']		 = 1204 * 2;
				$config['max_width']  	 = '1024';
				$config['max_height']  	 = '768';
				$config['encrypt_name']  = FALSE;
				$file_name 				 = $_FILES['profile_picture'];
				// $config['file_name'] 	= $file_name;
				log_message('debug','I Have Profile Picture '.$file_name['name']);
				$this->load->library('upload', $config);
				
				// Uploading File 
				if ( ! $this->upload->do_upload('profile_picture')) {
					// File Uploaded Failed load same page with error .
					$data['error'] = $this->upload->display_errors();
	            	$this->load->view('default_home_header');
					$this->load->view('common/student_reg_view',$data);
					$this->load->view('default_home_footer');
	        	} else {
	        		// File Uploaded Successfully Bock . save link in variable
	            	// echo "File upload success ";
	            	$profile_picture = $this->upload->data();
	            	log_message('debug','+++++++++++ file upload name '.print_r($profile_picture['file_name']));
	            	$student_details['user_photo'] = $profile_picture['file_name'];
	            	// Create Student			
					$user_type = 1;
					$res = $this->get_details($student_details['user_email']);
					if($res == null) {
						$std_res = $this->add_new_user($student_details, $user_type);
						$std_uid = $std_res['user_id'];
						$std_ack = $std_res['passwd_token'];
					} else {
						// send user exist page
						$this->session->set_flashdata('error_msg', 'Student Already Exist you can login from here !');
						log_message('debug','Student Already Exist');
						redirect('/logout');	
					}
					

					// Create Parent
					$user_type = 2;
					$parent_email_status=false;
					/* -- Parent Registration Dissabled 
					$parent_details['user_photo'] = 'default_photo.png';
					$res = $this->get_details($parent_details['user_email']);
					if($res != null && $res['user_role'] == 2) {
						// Parent already Exist so maping child with parent
						$parent_uid = $res['user_id'];
						log_message('debug','Parent Already Exist !');
						// Create Parent map 
						$this->register_model->map_student_parent($std_uid,$parent_uid);
						// Send Verification link to Parent
						// $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);					
					} else if ($res != null) {
						// Some other user exist
						log_message('debug','Parent email exist in user role ='.$res["user_role"]);
					} else {
						if($parent_details['user_email'] != null){
							$parent_res = $this->add_new_user($parent_details, $user_type);
							$parent_uid = $parent_res['user_id'];
							$parent_ack = $parent_res['passwd_token'];
							// Create Parent map 
							$res = $this->register_model->map_student_parent($std_uid,$parent_uid);
							$parent_email_status=true;
							log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
						} else {
							$parent_details['user_email'] = $parent_details['first_name'].date("YmdHis")."@ask_analytics.com";
							$parent_res = $this->add_new_user($parent_details, $user_type);
							$parent_uid = $parent_res['user_id'];
							$parent_ack = $parent_res['passwd_token'];
							// Create Parent map 
							$res = $this->register_model->map_student_parent($std_uid,$parent_uid);
							$parent_email_status=false;
							log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
						}
					}
					-- Parent Registration Dissabled 
					*/
					// Send Verification link to Student
					$this->send_mail($student_details['user_email'],$student_details['first_name'],$std_ack);
					
					// Send Verification link to Parent
					if($parent_email_status == true) {
						log_message('debug','Parent Email Sending .. Bock');
						$this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);			
					} 
		            redirect('/login');
	        	}
            } else {
            	log_message('debug','I Dont Have Profile Picture');
            	$student_details['user_photo'] = "default_photo.png";
            	// Create Student			
				$user_type = 1;
				$res = $this->get_details($student_details['user_email']);
				if($res == null) {
					$std_res = $this->add_new_user($student_details, $user_type);
					$std_uid = $std_res['user_id'];
					$std_ack = $std_res['passwd_token'];
				} else {
					// send user exist page
					$this->session->set_flashdata('error_msg', 'Student Already Exist you can login from here !');
					log_message('debug','Student Already Exist');
					redirect('/logout');	
				}
				// Create Parent
				$user_type = 2;
				$parent_email_status=false;
				/* -- Parent Registration Dissabled 
				$parent_details['user_photo'] = 'default_photo.png';
				$res = $this->get_details($parent_details['user_email']);
				if($res != null && $res['user_role'] == 2) {
					// Parent already Exist so maping child with parent
					$parent_uid = $res['user_id'];
					log_message('debug','Parent Already Exist !');
					// Create Parent map 
					$this->register_model->map_student_parent($std_uid,$parent_uid);
					// Send Verification link to Parent
					// $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);					
				} else if ($res != null) {
					// Some other user exist
					log_message('debug','Parent email exist in user role ='.$res["user_role"]);
				} else {

					if($parent_details['user_email'] != null){
						$parent_res = $this->add_new_user($parent_details, $user_type);
						$parent_uid = $parent_res['user_id'];
						$parent_ack = $parent_res['passwd_token'];
						// Create Parent map 
						$res = $this->register_model->map_student_parent($std_uid,$parent_uid);
						$parent_email_status=true;
						log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
					} else {
						$parent_details['user_email'] = $parent_details['first_name'].date("hi-A")."@ask_analytics.com";
						$parent_res = $this->add_new_user($parent_details, $user_type);
						$parent_uid = $parent_res['user_id'];
						$parent_ack = $parent_res['passwd_token'];
						// Create Parent map 
						$res = $this->register_model->map_student_parent($std_uid,$parent_uid);
						$parent_email_status=false;
						log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
					}
				}
				-- Parent Registration Dissabled 
				*/
				// Send Verification link to Student
				$this->send_mail($student_details['user_email'],$student_details['first_name'],$std_ack);
				// Send Verification link to Parent
				if($parent_email_status == true) {
					log_message('debug','Parent Email Sending .. Bock');
					$this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);			
				} 
	            redirect('/login');
            }
		}
	}

	// Action => [Associate Registration]
	public function associate_registration() {
		// Action -> Load View when: Method = get
		if($this->input->server('REQUEST_METHOD') == 'GET') {
			if ($this->form_validation->run() == FALSE) {
            	$data['error'] ="";
				$this->load->view('default_home_header');
				$this->load->view('common/associate_reg_view',$data);
				$this->load->view('default_home_footer');
			}
		}

		// Action -> do Registration when: Method = post
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			// Getting User Details 
			$associate_details = array();
			$associate_details['first_name'] 	= $this->input->post('first_name');
			$associate_details['last_name'] 	= $this->input->post('last_name');
			$associate_details['middle_name'] 	= $this->input->post('middle_name');
			$associate_details['user_email'] 	= $this->input->post('email');
			$associate_details['user_phone'] 	= $this->input->post('phone');
			$associate_details['user_address'] 	= $this->input->post('address');
			$associate_details['user_city'] 	= $this->input->post('city');
			$associate_details['user_state'] 	= $this->input->post('state');
			$associate_details['user_country'] 	= $this->input->post('country');
			$associate_details['user_pincode'] 	= $this->input->post('pincode');
            // Getting PinCode and District
            $res = $this->pincode_model->getPincode($associate_details['user_pincode']);
            if($res != null){
                $associate_details['user_district']=$res['district_name'];
            }
            else{
                $associate_details['user_district']='District';
            }
            // Getting Additional Details 
            $associate_details['organization_name'] 	= $this->input->post('organization_name');
            $associate_details['student_count'] 		= $this->input->post('student_count');
            $associate_details['letter_of_intent'] 		= $this->input->post('letter_of_intent');
            // Save this details in associate details master
            // Checking for Profile pircute and Upload 
            $file_name = $_FILES['profile_picture'];
            if($file_name['name'] != null){
				$config['upload_path'] 	 = $_SERVER['DOCUMENT_ROOT'].'/static/img/user_photo/';
	        	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	        	$config['max_size']		 = 1204 * 2;
				$config['max_width']  	 = '1024';
				$config['max_height']  	 = '768';
				$config['encrypt_name']  = FALSE;
				$file_name 				 = $_FILES['profile_picture'];
				// $config['file_name'] 	= $file_name;
				log_message('debug','i have photo '.$file_name['name']);
				$this->load->library('upload', $config);
				// Uploading File 
				if ( ! $this->upload->do_upload('profile_picture')) {
					// File Uploaded Failed load same page with error .
					$data['error'] = $this->upload->display_errors();
	            	$this->load->view('default_home_header');
					$this->load->view('common/associate_reg_view',$data);
					$this->load->view('default_home_footer');


	        	} else {
	        		// File Uploaded Successfully Bock . save link in variable
	            	// echo "File upload success ";
	            	$profile_picture = $this->upload->data();
	            	log_message('debug','+++++++++++ file upload name '.print_r($profile_picture));
	            	$associate_details['user_photo'] = $profile_picture['file_name'];
	            	// Create Associate			
					$user_type = 3;
					$res = $this->get_details($associate_details['user_email']);
					if($res == null) {
						$asso_res  = $this->add_new_user($associate_details, $user_type);
						$asso_uid  = $asso_res['user_id'];
						$asso_ack  = $asso_res['passwd_token'];
						
						// Save Associate Details in Associate Details Master
						$this->register_model->save_associate_details($associate_details,$asso_uid);

						// Send Verification link to Associate
						$this->send_mail($associate_details['user_email'],$associate_details['first_name'],$asso_ack);
						redirect('/login');
					} else {
						// send user exist page
						$this->session->set_flashdata('error_msg', 'Associate Already Exist you can login from here !');
						log_message('debug','Associate Already Exist');
						// redirect('/logout');	
					}

	        	}
            } else {
            	log_message('debug','i dont have photo ');
            	$associate_details['user_photo'] = "default_photo.png";
            	// Create Associate			
					$user_type = 3;
					$res = $this->get_details($associate_details['user_email']);
					if($res == null) {
						$asso_res  = $this->add_new_user($associate_details, $user_type);
						$asso_uid  = $asso_res['user_id'];
						$asso_ack  = $asso_res['passwd_token'];

						// Save Associate Details in Associate Details Master
						$associate_data = $this->register_model->save_associate_details($associate_details,$asso_uid);
						log_message('debug','Associate Data DB Status :'.$associate_data);

						// Send Verification link to Associate
						$this->send_mail($associate_details['user_email'],$associate_details['first_name'],$asso_ack);
						redirect('/login');
					} else {
						// send user exist page
						$this->session->set_flashdata('error_msg', 'Associate Already Exist you can login from here !');
						log_message('debug','Associate Already Exist');
						// redirect('/logout');	
					}
            }
		}
		
	}

	// Action => [director Registration]
	public function director_registration() {

		// Action -> do Registration when: Method = post
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			// Getting User Details 
			$director_details = array();
			$director_details['first_name'] 	= $this->input->post('first_name');
			$director_details['last_name'] 		= $this->input->post('last_name');
			$director_details['middle_name'] 	= $this->input->post('middle_name');
			$director_details['user_email'] 	= $this->input->post('email');
			$director_details['user_phone'] 	= $this->input->post('phone');
			$director_details['user_address'] 	= $this->input->post('address');
			$director_details['user_city'] 		= $this->input->post('city');
			$director_details['user_state'] 	= $this->input->post('state');
			$director_details['user_country'] 	= $this->input->post('country');
			$director_details['user_pincode'] 	= $this->input->post('pincode');
            // Getting PinCode and District
            $res = $this->pincode_model->getPincode($director_details['user_pincode']);
            if($res != null){
                $director_details['user_district']	=$res['district_name'];
            }else{
                $director_details['user_district']	='District';
            }

            // Getting Additional Details 
            $selected_hidden = $this->input->post('selected_hidden');
            $test   = explode(",", $selected_hidden);
 			$length = count($test);
            
            // Save this details in user master
            $director_details['user_photo'] = "default_photo.png";
            
            // Create Content Director ie: user_type = 6		
			$user_type = 6;
			$res = $this->get_details($director_details['user_email']);
			if($res == null) {
				$director_res  = $this->add_new_user($director_details, $user_type);
				$director_uid  = $director_res['user_id'];
				$director_ack  = $director_res['passwd_token'];

				// Save Director Details in Content Director map Master
				for ($i=0; $i<$length; $i++) { 
            		// print_r($test[$i]); echo "<br>";
					$director_data = $this->register_model->map_director_subject($director_uid,$test[$i]);
            	}

				log_message('debug','Director Data DB Status :'.$director_data);

				// Send Verification link to Director
				$this->send_mail($director_details['user_email'],$director_details['first_name'],$director_ack);
				redirect('/login');
			} else {
				// send user exist page
				$this->session->set_flashdata('error_msg', 'Director Already Exist you can login from here !');
				log_message('debug','Director Already Exist');
				// redirect('/logout');	
			}
		}
		
	}

	// Action => [Associate Registration]
	public function update_director_details() {
		// Action -> Updating director details
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			// Getting User Details 
			$director_details['user_id'] 		= $this->input->post('edit_user_id');
			$director_details['user_fname'] 	= $this->input->post('edit_first_name');
			$director_details['user_mname'] 	= $this->input->post('edit_middle_name');
			$director_details['user_lname'] 	= $this->input->post('edit_last_name');
			$director_details['user_phone'] 	= $this->input->post('edit_phone');
			$director_details['user_address'] 	= $this->input->post('edit_address');
			$director_details['user_city'] 		= $this->input->post('edit_city');
			$director_details['user_state'] 	= $this->input->post('edit_state');
			$director_details['user_country'] 	= $this->input->post('edit_country');
			$director_details['user_pin'] 		= $this->input->post('edit_pincode');
            // Getting PinCode and District
            $res = $this->pincode_model->getPincode($director_details['user_pin']);
            if($res != null){
                $director_details['user_district']	=$res['district_name'];
            }
            else{
                $director_details['user_district']	='District';
            }

            // Save this details in user master
            // log_message('debug','updaing director_details ');
            $director_details['user_photo'] = "default_photo.png";
            // Save Director Details in Content Director map Master
			$result = $this->register_model->update_director_details($director_details);
            
            // Getting Additional Details 
            // $director_details['subject_id'] = $this->input->post('subject_id');

            // Getting Subjects Selected from selected_hidden field
            $selected_hidden = $this->input->post('selected_hidden');
            $test   = explode(",", $selected_hidden);
 			$length = count($test);

			// log_message('debug','length of loop :'.$length);
            log_message('debug',"Hidden select is here ================> ".print_r($test,TRUE));

 			// Step 1: Delete Mapping Between Mentor/SME and subjects
 			$result = $this->register_model->delete_director_maps($director_details['user_id']);
			// $director_data = $this->register_model->map_director_subject($director_uid,$test[$i]);
			// Step 2: Create New map 
			for ($i=0; $i<$length; $i++) { 
				$result = $this->register_model->map_director_subject($director_details['user_id'],$test[$i]);
				// log_message('debug','Director Data DB Status :'.print_r($test[$i]),TRUE);
        	}

            log_message('debug',"Update Director Details" .$result);
            if($result ==1){
                redirect('/login');
            } else { 
            	echo "false"; 
        	}            
		}
		
	}

	// Action => Affilate Role Registration
	public function affilate_registration() {
		// Action : Show Registration Form whein : Method = GET
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			if ($this->form_validation->run() == FALSE) {
            	$data['error'] ="";
				$this->load->view('default_home_header');
				$this->load->view('common/affilate_reg_view',$data);
				$this->load->view('default_home_footer');
			}
		}

		// Action -> do Registration when: Method = post
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			// Getting User Details 
			$affilate_details = array();
			$affilate_details['first_name'] 	= $this->input->post('student_first_name');
			$affilate_details['last_name'] 		= $this->input->post('student_last_name');
			$affilate_details['middle_name'] 	= $this->input->post('student_middle_name');
			$affilate_details['user_email'] 	= $this->input->post('student_email');
			$affilate_details['user_phone'] 	= $this->input->post('student_phone');
			$affilate_details['user_photo'] 	= $this->input->post('profile_picture');
			$affilate_details['user_address'] 	= $this->input->post('address');
			$affilate_details['user_city'] 		= $this->input->post('city');
			$affilate_details['user_state'] 	= $this->input->post('state');
			$affilate_details['user_country'] 	= $this->input->post('country');
			$affilate_details['user_pincode'] 	= $this->input->post('pincode');
            // Getting PinCode and District
            $res = $this->pincode_model->getPincode($affilate_details['user_pincode']);
            if($res != null){
                $affilate_details['user_district']	=$res['district_name'];
            }
            else{
                $affilate_details['user_district']	='District';
            }
            // Getting Additional Details 
            $affilate_details['subject_id'] = $this->input->post('subject_id');
            
            // Save this details in user master
            log_message('debug','i dont have photo ');
            $affilate_details['user_photo'] = "default_photo.png";

            
            // Create Affilate Role ie: user_type = 9		
			$user_type = 9;
			$res = $this->get_details($affilate_details['user_email']);
			if($res == null) {
				$affilate_res  = $this->add_new_user($affilate_details, $user_type);
				$affilate_uid  = $affilate_res['user_id'];
				$affilate_ack  = $affilate_res['passwd_token'];

				// Save affilate Details in Content affilate map Master
				// $affilate_data = $this->register_model->map_affilate_subject($affilate_uid,$affilate_details['subject_id']);
				// log_message('debug','affilate Data DB Status :'.$affilate_data);

				// Send Verification link to Affilate
				$this->send_mail($affilate_details['user_email'],$affilate_details['first_name'],$affilate_ack);
				redirect('/login');
			} else {
				// send user exist page
				$this->session->set_flashdata('error_msg', 'Affiliate Already Exist you can login from here !');
				log_message('debug','Affiliate Already Exist');
				// redirect('/logout');	
			}
		}
		
	}


	// Action -> Add New User
	private function add_new_user($input_array,$user_type) {
		$result = array();
		$activation_code = md5(uniqid($input_array['user_email'].time()));
		// Do DB Call To Get MAX Count of user ID 
		//$max_user_count = $this->user_model->get_user_count($user_type); 
		//$reg_id 		= str_pad( $max_user_count+1, 4, '0', STR_PAD_LEFT); // output: 0001

		switch ($user_type) {
			case '1':
				$usertype = 'User';
				$input_array['registration_no'] = "TUT".date('YmdHis');
				break;
			case '2':
				$usertype = 'Parent';
				$input_array['registration_no'] = "TPR".date('YmdHis');
				break;
			case '3':
        		$usertype = 'SPOC'; 
        		$input_array['registration_no'] = "TSP".date('YmdHis');
        		break;
        	case '4':
                $usertype = 'Registrar';
                $input_array['registration_no'] = "TRA".date('YmdHis');
                break;
	    	case '5':
                $usertype = 'Accountant';
                $input_array['registration_no'] = "TAC".date('YmdHis');
                break;
        	case '6':
	            $usertype = 'Mentor/SME';
                $input_array['registration_no'] = "TMS".date('YmdHis');
                break;
       		case '7':
            	$usertype = 'SuperAdmin';
            	$input_array['registration_no'] = "TSA".date('YmdHis');
            	break;
            case '8':
            	$usertype = 'ContentAdmin';
            	$input_array['registration_no'] = "TAD".date('YmdHis');
            	break;
            case '9':
            	$usertype = 'Affiliate';
            	$input_array['registration_no'] = "TAF".date('YmdHis');
            	break;
        	default:
            	redirect('/previlege_error');
            	break;
		}

		// if ( $user_type == 1) { 
		// 	$usertype = 'Student';
		// 	$input_array['registration_no'] = "TEMP".date('Y')."ST".date('mhms');
		// } else if ( $user_type == 2) { 
		// 	$usertype = 'Parent';
		// 	$input_array['registration_no'] = "TEMP".date('Y')."PR".date('mhms'); 
		// }
		// else { 
		// 	$usertype = 'Associate'; 
		// 	$input_array['registration_no'] = "TEMP".date('Y')."AS".date('mhms');
		// }

		log_message('debug',"***************************************************************");
		log_message('debug',"| ADD NEW USER   =>  ".$usertype." Details                    |");
		log_message('debug',"***************************************************************");
		log_message('debug',"| ".$usertype." fname = ".$input_array['first_name']);
		log_message('debug',"| ".$usertype." lname = ".$input_array['last_name']);
		log_message('debug',"| ".$usertype." mname = ".$input_array['middle_name']);
		log_message('debug',"| ".$usertype." email = ".$input_array['user_email']);
		log_message('debug',"| ".$usertype." phone = ".$input_array['user_phone']);
		log_message('debug',"| Address 		= ".$input_array['user_address']);
		log_message('debug',"| City 		= ".$input_array['user_city']);
		log_message('debug',"| State 		= ".$input_array['user_state']);
		log_message('debug',"| country 		= ".$input_array['user_country']);
		log_message('debug',"| Pincode 		= ".$input_array['user_pincode']);
		log_message('debug',"***************************************************************");
		// Creating New User
		$res = $this->register_model->create_user($input_array,$user_type,$activation_code);
		if ($res > 0) {
			$result['passwd_token'] = $activation_code;
			$result['user_id'] = $res;
			// Get Session Data How This user Enrolles 
			$Suser_id 	= $this->session->userdata('user_id');
			$Suser_role = $this->session->userdata('role_name');
			if($Suser_id != null && $Suser_role != null) {
				$this->register_model->new_user_enrollment($Suser_id,$res);
			} else {
				$Suser_id = 1; // Default Enrolled by Admin / Online / Direct
				$Suser_role = "Online/Direct"; 
				$this->register_model->new_user_enrollment($Suser_id,$res);
			}
			log_message('debug',"***************************************************************");			
			log_message('debug','>>> NEW USER CREATED >>>');
			log_message('debug','>>> User ID 	   :'.$res);
			log_message('debug','>>> passwd_token  :'.$activation_code);
			log_message('debug','>>> User Enrolled :'.$Suser_id);
			log_message('debug','>>> Enrolled By   :'.$Suser_role);
			log_message('debug',"***************************************************************");
			return $result;
		} else {
			log_message('debug',"***************************************************************");			
			log_message('debug','>>> USER Creation Failed >>>');
			log_message('debug',"***************************************************************");
			return false;
		}
	}

	// Action : Check Email
	public function checkEmail() {
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			$student_email = $this->input->post('student_email');
			$parent_email = $this->input->post('parent_email');
			$email = $this->input->post('email');
			if(isset($student_email)) { 
				$user_email = $student_email; 
			}
			if (isset($parent_email)) {
				$user_email = $parent_email;
			}
			if (isset($email)) {
				$user_email = $email;
			}

			log_message('debug',"Check Email > ".$user_email);
			$result = $this->register_model->check_email($user_email);
			if($result > 0){
				echo "false";
			} else {
				echo "true";
			}
			log_message('debug',"Check Email > Result ".$result);
		}
	}

	// Action : Check User Email Exist and Email Verified 
	public function is_email_valid(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$user_email = $this->input->post('reset_user_email');
			$result = $this->register_model->forgot_email_check($user_email);
			if($result != null) {
				echo "true";
				log_message('debug','**** Password Reset Email Present ****');
			} else {
				echo "false";
				log_message('debug','**** Password Reset Email Not Valid or Not Present ****');
			}
		}
	}

	// Action : Check User Pincode Exist
	public function checkPincode() {
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			$pincode = $this->input->post('pincode');
			log_message('debug',"Check Pincode > ".$pincode);
			$res = $this->pincode_model->getPincode($pincode);
			if(isset($res)){
				echo "true";
				log_message('debug','Result for pincode: '.array_shift($res));
			} else {
				echo "false";
				log_message('debug','Result for pincode: NULL'.$res);
			}
		}
	}

	private function get_details($user_email) {
		$result = $this->register_model->get_details($user_email);
		if(count($result) > 1){
			return $result;
		} 
		return null;
	}

	private function send_mail($email,$user_name,$activation_code){

        //$ques_id=$this->input->post('ques_id');
        //$student_name=$this->user_model->get_user_name_by_mail($address);
		log_message('debug','Sending Email to '.$email.' user name '.$user_name);
		$encrypted_string = $activation_code;

        $address=$email;
        $time=date('Y-m-d H:i:s');
        
        $configs = array(
        'protocol'  =>  EMAIL_PROTOCOL,
        'smtp_host' =>  EMAIL_HOST,
        'smtp_user' =>  EMAIL_USERID,
        'smtp_pass' =>  EMAIL_PASSWD,
        'smtp_port' =>  EMAIL_PORT,
        'mailtype' 	=> 	'html',
  		'charset' 	=> 	'iso-8859-1',
  		'wordwrap' 	=> 	TRUE
        );

        $this->load->library('email',$configs);
        $this->email->set_newline("\r\n");

        $message_body = 'Dear '.$user_name.', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$encrypted_string.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
        $this->email->to($address);
        $this->email->from(EMAIL_USERID);
        $this->email->subject(PRODUCT_NAME);
        $this->email->message($message_body);

        if(!$this->email->send()){
        	log_message('debug',"Send Mail Error : \n".$this->email->print_debugger());
        } else {
        	log_message('debug',"Email Sent Successfully !");
        }

    }

    private function send_email($to_address,$subject,$message_body){
    	log_message('debug','**************** Send Email ************* Start ****');
    	log_message('debug','* Sending Email to   : '.$to_address);
    	log_message('debug','* Email Message Body : '.$message_body);
    	
    	// Email Configuration Parameters : Refer @ constats for the value
    	$configs = array(
    		'protocol'  =>  EMAIL_PROTOCOL,
        	'smtp_host' =>  EMAIL_HOST,
        	'smtp_user' =>  EMAIL_USERID,
        	'smtp_pass' =>  EMAIL_PASSWD,
        	'smtp_port' =>  EMAIL_PORT,
        	'mailtype' 	=> 	'html',
  			'charset' 	=> 	'iso-8859-1',
  			'wordwrap' 	=> 	TRUE
    		);
    	$this->load->library('email',$configs);
    	$this->email->set_newline("\r\n");

    	//$message_body = "Dear ".$user_name.",<br><p> Thank you for Joining SKOL System.<br>Your Login details as below:<br>User Login: ".$user_email."<br>Password: ".$user_password."<br><a href='".DOMAIN_PROTOCOL."://".DOMAIN_HOST.":".DOMAIN_PORT."/login'>Click here to login</a><br><br>Thank you<br>Ask Analytics<br><h5>".date('d-M-Y')."</h5><br>";
    	// Construct Email [ From : TO : Subject : Message Body ] 
    	$this->email->from(EMAIL_USERID);
    	$this->email->to($to_address);
        $this->email->subject(PRODUCT_NAME.' :'.$subject);
        $this->email->message($message_body);
        // Verify email status 
        if(!$this->email->send()){
        	log_message('debug',"* Send Mail Error : \n".$this->email->print_debugger());
        } else {
        	log_message('debug',"* Email Sent Successfully to :".$to_address);
        }
    	log_message('debug','**************** Send Email ************* Ended ****');
    }

    private function reset_mail_template($user_details,$reset_link){
   		$msg = 'Welcome to '.PRODUCT_NAME.' '.$user_details['user_fname'].'<br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/resetpass?reset_pwd='.$reset_link.'">Click to Reset your Password</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>';
    	return $msg;
    }

    private function send_mail_pwd($user_email,$user_name,$user_password){

        //$ques_id=$this->input->post('ques_id');
        //$student_name=$this->user_model->get_user_name_by_mail($address);
		log_message('debug','Send Email to '.$user_email.' user name '.$user_name);
        $address=$user_email;
        $time=date('Y-m-d H:i:s');
        
        $configs = array(
        'protocol'  =>  EMAIL_PROTOCOL,
        'smtp_host' =>  EMAIL_HOST,
        'smtp_user' =>  EMAIL_USERID,
        'smtp_pass' =>  EMAIL_PASSWD,
        'smtp_port' =>  EMAIL_PORT,
        'mailtype' 	=> 	'html',
  		'charset' 	=> 	'iso-8859-1',
  		'wordwrap' 	=> 	TRUE
        );

        $this->load->library('email',$configs);
        $this->email->set_newline("\r\n");
        
        $message_body = "Dear ".$user_name.",<br><p> Thank you for Joining ".PRODUCT_NAME.".<br>Your Login details as below:<br>User Login: ".$user_email."<br>Password: ".$user_password."<br><a href='".DOMAIN_PROTOCOL."://".DOMAIN_HOST.":".DOMAIN_PORT."/login'>Click here to login</a><br><br>Thank you<br>Ask Analytics<br><h5>".date('d-M-Y')."</h5><br>";

        $this->email->to($address);
        $this->email->from(EMAIL_USERID);
        $this->email->subject(PRODUCT_NAME.' : Registration Details');
        $this->email->message($message_body);

        if(!$this->email->send()){
        	log_message('debug',"Send Mail Error : \n".$this->email->print_debugger());
        } else {
        	log_message('debug',"Email Sent");
        }

    }

    public function verify() {
    	if($this->input->server('REQUEST_METHOD') == 'GET'){
    		log_message('debug','Verify Email : '.$this->input->get('ack_code'));

    		$passwd_token = $this->input->get('ack_code');
    		$user_details = $this->register_model->verify_email($passwd_token);
    		log_message('debug','************* Getting User Details *************');

    		if ($user_details != null) {
    			// perform activation 
    			$user_password = $this->generatePassword();
    			$result = $this->register_model->update_password($user_details['user_id'],$user_password);
    			if($result != null){
    				$this->send_mail_pwd($user_details['user_email'],$user_details['user_fname'],$user_password);
    				log_message('debug','Verify Email : verified');
    				log_message('debug','user password: '.$user_password);
                    $this->load->view('default_home_header');
                    $this->load->view('email_verified_view');
                    $this->load->view('default_home_footer');
    			} else {
                    $this->load->view('default_home_header');
                    $data['msg']="Your mail is verified password generation failed please contact: info.skolsystem@gmail.com !";
                    $this->load->view('error_view', $data);
                    $this->load->view('default_home_footer');
    			}

    		} else {
                $data['msg']=" Wrong Activation Code ! or Email Already verified !";
                $this->load->view('default_home_header');
                $this->load->view('error_view', $data);
                $this->load->view('default_home_footer');
    			log_message('debug','Verify Email : InValid');
    		}
    	}
    }

    private function generatePassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
		return implode($pass); //turn the array into a string
	}

	public function forgot_password(){
        if($this->input->server('REQUEST_METHOD') == 'GET'){
            log_message('debug','****************** FORGOT PWD Modal START ******************');
        	$this->load->view('forgotpwd_modal');
        	log_message('debug','****************** FORGOT PWD Modal ENDED ******************');
        }

        if($this->input->server('REQUEST_METHOD') == 'POST'){
        	log_message('debug','****************** FORGOT Password Reset START ******************');
            $user_email 	= $this->input->post('reset_user_email');
            // Get user details for this email address
            $user_details 	= $this->get_details($user_email);
            $user_id 		= $user_details['user_id'];
            // Generate Reset link for this user
            $reset_link 	= $this->generate_resetLink($user_email);
            $result = $this->register_model->create_reset_link($user_id,$reset_link);
            // Generate Reset Message Template
            $subject = "Reset Link";
            $message_body 	= $this->reset_mail_template($user_details,$reset_link);
			// Send Message To User 
            $this->send_email($user_email,$subject,$message_body);
            echo "Password Reset Link has sent to : ".$user_email."";
            log_message('debug','Reset User Email '.$user_email);
            log_message('debug','****************** FORGOT Password Reset Ended ******************');
            // check for email exist 
            // if exist then send reset link else throw error 
        }
    }

    // Action : Generate Reset Link
    function generate_resetLink($user_email){
    	return md5(uniqid($user_email.time()));
    }

    // Action : Get user Details 
    function get_user_details($user_email){
    	$result = $this->user_model->get_user_details($user_email);
		if(count($result) > 1){
			return $result;
		}
		return null;
    }



    public function reset_password(){
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            if($this->input->get('reset_pwd') != null){
            	$passwd_token = $this->input->get('reset_pwd');
                log_message('debug','Reset password called !');
                log_message('debug','Reset Password input : '.$this->input->get('reset_pwd'));
                $user_details = $this->register_model->remove_reset_link($passwd_token);
                if ($user_details != null) {
    				// perform activation 
    				$user_password = $this->generatePassword();
    				$result = $this->register_model->update_password($user_details['user_id'],$user_password);
    				if($result != null){
    					$this->send_mail_pwd($user_details['user_email'],$user_details['user_fname'],$user_password);
    					log_message('debug','Verify Email : verified');
    					log_message('debug','user password: '.$user_password);
                    	$this->load->view('default_home_header');
                    	$this->load->view('email_verified_view');
                    	$this->load->view('default_home_footer');
    				} else {
                    	$this->load->view('default_home_header');
                    	$data['msg']="Your mail is verified password generation failed please contact: info.skolsystem@gmail.com !";
                    	$this->load->view('error_view', $data);
                    	$this->load->view('default_home_footer');
    				}

    			} else {
                	$data['msg']=" In-Valid Verification Link ! or Email Already verified !";
                	$this->load->view('default_home_header');
                	$this->load->view('error_view', $data);
                	$this->load->view('default_home_footer');
    				log_message('debug','Verify Email : InValid');
    			}
            }
        }
    }

	// public function student_reg() {
	// 	$this->load->view('default_home_header');
	// 	$this->load->view('common/student_reg_view');
	// 	$this->load->view('default_home_footer');
	// }

	/*public function std_reg() {
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			$student_details = array();
			$student_details['first_name'] 		= $this->input->post('student_first_name');
			$student_details['last_name'] 		= $this->input->post('student_last_name');
			$student_details['middle_name'] 	= $this->input->post('student_middle_name');
			$student_details['user_email'] 		= $this->input->post('student_email');
			$student_details['user_phone'] 		= $this->input->post('student_phone');
			$student_details['user_photo'] 		= $this->input->post('profile_picture');
			$student_details['user_address'] 	= $this->input->post('address');
			$student_details['user_city'] 		= $this->input->post('city');
			$student_details['user_state'] 		= $this->input->post('state');
			$student_details['user_country'] 	= $this->input->post('country');
			$student_details['user_pincode'] 	= $this->input->post('pincode');
            $res = $this->pincode_model->getPincode($student_details['user_pincode']);
            if($res != null){
                $student_details['user_district']=$res['district_name'];
            }
            else{
                $student_details['user_district']='District';
            }
			
			$parent_details = array();
			$parent_details['first_name'] 		= $this->input->post('parent_first_name');
			$parent_details['last_name'] 		= $this->input->post('parent_last_name');
			$parent_details['middle_name'] 		= $this->input->post('parent_middle_name');
			$parent_details['user_email'] 		= $this->input->post('parent_email');
			$parent_details['user_phone'] 		= $this->input->post('parent_phone');
			$parent_details['user_address'] 	= $this->input->post('address');
			$parent_details['user_city'] 		= $this->input->post('city');
			$parent_details['user_state'] 		= $this->input->post('state');
			$parent_details['user_country'] 	= $this->input->post('country');
			$parent_details['user_pincode'] 	= $this->input->post('pincode');
            if($res != null){
                $parent_details['user_district']=$res['district_name'];
            }
            else{
                $parent_details['user_district']='District';
            }

			// Create Student			
			$user_type = 1;
			$res = $this->get_details($student_details['user_email']);
			if($res == null) {
				$std_res = $this->add_new_user($student_details, $user_type);
				$std_uid = $std_res['user_id'];
				$std_ack = $std_res['passwd_token'];
			} else {
				// send user exist page
				$this->session->set_flashdata('error_msg', 'Student Already Exist you can login from here !');
				log_message('debug','Student Already Exist');
				redirect('/logout');	
			}
			

			// Create Parent
			$user_type = 2;
			$parent_email_status=false;
			$res = $this->get_details($parent_details['user_email']);
			if($res != null && $res['user_role'] == 2) {
				// Parent already Exist so maping child with parent
				$parent_uid = $res['user_id'];
				log_message('debug','Parent Already Exist !');
				// Create Parent map 
				$this->register_model->map_student_parent($std_uid,$parent_uid);
				// Send Verification link to Parent
				// $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);					
			} else if ($res != null) {
				// Some other user exist
				log_message('debug','Parent email exist in user role ='.$res["user_role"]);
			} else {
				$parent_res = $this->add_new_user($parent_details, $user_type);
				$parent_uid = $parent_res['user_id'];
				$parent_ack = $parent_res['passwd_token'];
				// Create Parent map 
				$res = $this->register_model->map_student_parent($std_uid,$parent_uid);
				$parent_email_status=true;
				log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
			}
			
			// Send Verification link to Student
			$this->send_mail($student_details['user_email'],$student_details['first_name'],$std_ack);
			
			// Send Verification link to Parent
			if($parent_email_status == true) {
				log_message('debug','Parent Email Sending .. Bock');
				$this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);			
			} 
            redirect('/login');
		}
	}*/

	public function student_payment() {
		// Action -> Load View when: Method = get
		if($this->input->server('REQUEST_METHOD') == 'GET') {
			$data['user_name'] = $this->session->userdata('user_fname');
			$this->load->view('default_home_header');
			$this->load->view('student_payment_view',$data);
			$this->load->view('default_home_footer');
		}
	}

	public function associate_payment() {
		// Action -> Load View when: Method = get
		if($this->input->server('REQUEST_METHOD') == 'GET') {
			$data['user_name'] = $this->session->userdata('user_fname');

			$this->load->view('default_home_header');
			$this->load->view('associate_payment_view',$data);
			$this->load->view('default_home_footer');
		}
	}

	public function parent_payment() {
		// Action -> Load View when: Method = get
		if($this->input->server('REQUEST_METHOD') == 'GET') {
			$data['main_content'] = "parent_payment_view";
        	$this->load->view('includes/template',$data);
        	log_message('debug',"parent_payment_view");
		}
	}
}
