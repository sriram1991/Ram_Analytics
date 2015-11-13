<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Home page for skol
class Profile_Controller extends Common_Controller {

	public function __construct(){
    	parent::__construct();
        $this->load->model('pincode_model');
        $this->load->model('profile_model');
        $this->load->model('register_model');
        $this->load->model('sendemail_model');
    }

	public function index()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			// Action -> Load View when: Method = get
	        $user_id = $this->session->userdata('user_id');
	        $user_role = $this->session->userdata('user_role');
	        //$data['user_details'] = $this->profile_model->get_user_details($user_id);
	        $data['user_details'] = $this->session->all_userdata();

	        log_message('debug',"USER ROLE in Profile update ".$user_role);

	        switch ($user_role) {
				case '1':
					$data['user_home'] = '/user_home';
					break;
				case '2':
					$data['user_home'] = '/parent_home';
					break;
				case '3':
					$data['user_home'] = '/spoc_home';
					break;
				case '4':
					$data['user_home'] = '/registrar_home';
					break;
				case '5':
					$data['user_home'] = '/accountant_home';
					break;
				case '6':
					$data['user_home'] = '/mentor_home';
					break;
				case '7':
                    $data['user_home'] = '/admin_home';
                    break;
                case '8':
                    $data['user_home'] = '/content_director_home';
                    break;
                case '9':
					$data['user_home'] = '/affilate_home';
                    break;
				default:
					//redirect('/previlege_error');
					break;
			}

			$old_user_id = $this->input->post('user_id');
			$new_user_id = $this->session->userdata('user_id');
			if(strcasecmp($old_user_id, $new_user_id) == 0){
				$this->load->view('common/profile_update_view', $data);
			} else {
				echo "trying to update different user ";
				redirect('/logout');
			}
			
		}
	}

	public function Update_profile(){
        
        log_message('debug','profile');
        if($this->input->server('REQUEST_METHOD') == 'POST'){

            $user_details['first_name']     = $this->input->post('first_name');
            $user_details['middle_name']    = $this->input->post('middle_name');
            $user_details['last_name']      = $this->input->post('last_name');
            $user_details['user_phone']     = $this->input->post('phone');
            $user_details['user_email']     = $this->input->post('user_email');
            $user_details['user_address']   = $this->input->post('address');
            $user_details['user_city']      = $this->input->post('city');// get all details 
            $user_details['user_state']     = $this->input->post('state'); 
            $user_details['user_country']   = $this->input->post('country');
            $user_details['user_pincode']   = $this->input->post('pincode'); 
            // Getting District Name From PINCODE
            $res = $this->pincode_model->getPincode($user_details['user_pincode']);
            if($res != null){
                $user_details['user_district']  = $res['district_name'];
            }
            else{
                $user_details['user_district']  = 'District';
            }

            log_message('debug',"USER email ".$user_details['user_email']);
            
            $result = $this->profile_model->update_profile($user_details);

            if($result != null) {
                log_message('debug',"Update Success");
                $user_details = $this->profile_model->get_user_details($this->session->userdata('user_id'));
                $this->session->set_userdata($user_details);
				// Setting Flash Data for Notification
				$this->session->set_flashdata('success_msg','Your Profile is updated Successuflly !');

                /*====== USER ROLES =========*
				 |       1 | User            |
				 |       2 | Parent/Guardian |
				 |       3 | Associate       |
				 |       4 | Registrar       |
				 |       5 | Accountant      |
				 |       6 | Content Writer  |
				 |       7 | Admin           |
				 *===========================*/

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
                log_message('debug',"Update Error");
                echo "<h2> Update Error in profile </h2>";
            }
        }
    }

    // Action : Upload PDF Resource 
    public function ajax_profile_update() {
        $status = "";
        $msg    = "";
        log_message('debug','****************** Ajax Profile Update START ******************');

        $file_element_name              = 'user_photo';
        // Checking For Profile Picture
        $photo = $_FILES['user_photo'];
        if($photo['name'] != null){
            log_message('debug','Profile Update : Photo and Phone Number');
            if ($status != "error") {
                $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/img/user_photo';
                $config['allowed_types']    = 'png|jpg|jpeg'; // OLD 'gif|jpg|png|doc|txt';
                $config['max_size']         = 1024 * 5;
                $config['max_width']        = '1024';
                $config['max_height']       = '768';
                $config['encrypt_name']     = FALSE;
                // Initilize Ajax File upload 
                $this->load->library('upload', $config);
                // File Upload
                if (!$this->upload->do_upload($file_element_name)) {
                    $status = 'error';
                    log_message('debug','file element name '.$file_element_name);
                    $msg = $this->upload->display_errors('', '');
                } else {
                    $data = $this->upload->data();
                    $image_path = $data['full_path'];
                    log_message('debug','file uploaded : '.$data['file_name']);

                    if(file_exists($image_path)) {
                        $status = "success";
                        $user_details['user_photo']     = $data['file_name'];
                        // Collecting USER Details
                        $user_details['user_phone']     = $this->input->post('user_phone');
                        $user_details['user_email']     = $this->input->post('user_email');
                        
                        log_message('debug','Ajax Profile Update : user_email '.$user_details['user_email']);
                        log_message('debug','Ajax Profile Update : user_phone '.$user_details['user_phone']);
                        log_message('debug','Ajax Profile Update : user_photo '.$user_details['user_photo']);
                        // Update Profile Details
                        $result = $this->profile_model->ajax_profile_update($user_details);
                        // START 
                        if($result != null) {
                            log_message('debug',"Update Success");
                            $user_details = $this->profile_model->get_user_details($this->session->userdata('user_id'));
                            $this->session->set_userdata($user_details);
                            // Setting Flash Data for Notification
                            $this->session->set_flashdata('success_msg','Your Profile is updated Successuflly !');

                            /*====== USER ROLES =========*
                             |       1 | User            |
                             |       2 | Parent/Guardian |
                             |       3 | Associate       |
                             |       4 | Registrar       |
                             |       5 | Accountant      |
                             |       6 | Content Writer  |
                             |       7 | Admin           |
                             *===========================*/

                            // switch ($user_details['user_role']) {
                            //     case '1':
                            //         redirect('/user_home');
                            //         break;
                            //     case '2':
                            //         redirect('/parent_home');
                            //         break;
                            //     case '3':
                            //         redirect('/spoc_home');
                            //         break;
                            //     case '4':
                            //         redirect('/registrar_home');
                            //         break;
                            //     case '5':
                            //         redirect('/accountant_home');
                            //         break;
                            //     case '6':
                            //         redirect('/mentor_home');
                            //         break;
                            //     case '7':
                            //         redirect('/admin_home');
                            //         break;
                            //     default:
                            //         redirect('/previlege_error');
                            //         break;
                            // }


                        } else {
                            log_message('debug',"Update Error");
                            echo "<h2> Update Error in profile </h2>";
                        }
                        // ENDED
                        $msg = "File successfully uploaded";
                    } else {
                        $status = "error";
                        $msg    = "Something went wrong when saving the file, please try again.";
                    }
                }
                echo json_encode(array('status' => $status, 'msg' => $msg));
                // @unlink($_FILES[$file_element_name]);
            }
            // echo json_encode(array('status' => $status, 'msg' => $msg));
        } else {
            log_message('debug','Profile Update For Phone number');
            $status = "success";
            $msg    = "Profile Updated";
            $user_details['user_photo'] = $this->input->post('profile_picture');
            $user_details['user_phone'] = $this->input->post('user_phone');
            $user_details['user_email'] = $this->input->post('user_email');

            log_message('debug','Ajax Profile Update : user_email '.$user_details['user_email']);
            log_message('debug','Ajax Profile Update : user_phone '.$user_details['user_phone']);
            log_message('debug','Ajax Profile Update : user_photo '.$user_details['user_photo']);
            // Update in Table 
            $result = $this->profile_model->ajax_profile_update($user_details);
            // START
            if($result != null) {
                log_message('debug',"Update Success");
                $user_details = $this->profile_model->get_user_details($this->session->userdata('user_id'));
                $this->session->set_userdata($user_details);
                // Setting Flash Data for Notification
                $this->session->set_flashdata('success_msg','Your Profile is updated Successuflly !');

                /*====== USER ROLES =========*
                 |       1 | User            |
                 |       2 | Parent/Guardian |
                 |       3 | Associate       |
                 |       4 | Registrar       |
                 |       5 | Accountant      |
                 |       6 | Content Writer  |
                 |       7 | Admin           |
                 *===========================*/

                // switch ($user_details['user_role']) {
                //     case '1':
                //         redirect('/user_home');
                //         break;
                //     case '2':
                //         redirect('/parent_home');
                //         break;
                //     case '3':
                //         redirect('/spoc_home');
                //         break;
                //     case '4':
                //         redirect('/registrar_home');
                //         break;
                //     case '5':
                //         redirect('/accountant_home');
                //         break;
                //     case '6':
                //         redirect('/mentor_home');
                //         break;
                //     case '7':
                //         redirect('/admin_home');
                //         break;
                //     default:
                //         redirect('/previlege_error');
                //         break;
                // }


            } else {
                log_message('debug',"Update Error");
                echo "<h2> Update Error in profile </h2>";
            } 
            // ENDED
            echo json_encode(array('status' => $status, 'msg' => $msg));
        } 
        log_message('debug','****************** Ajax Profile Update ENDED ******************');
        
    }

    // public function change_pwd_request() {
    // 	if($this->input->server('REQUEST_METHOD') == 'POST') {
    // 		$this->load->view('common/change_pwd_model_view');
    // 	}
    // }

    public function change_pwd_response()
    {
    	if($this->input->server('REQUEST_METHOD') == 'POST'){
    		$user_id = $this->session->userdata('user_id');
    		$old_password = $this->input->post('old_password'); // for future use
    		$new_password = $this->input->post('new_password');
    		log_message('debug','Change Password : i came here');
    		$result = $this->register_model->update_password($user_id,$new_password);
    		if(isset($result)) { 
    			echo "true"; 
    			log_message('debug','Change Password : True');
    		} else { 
    			echo "false";
    			log_message('debug','Change Password : Failed');
    		}
    	}
    }

    public function check_user_pwd(){
    	if($this->input->server('REQUEST_METHOD') == 'POST'){
			$user_id = $this->session->userdata('user_id');	    	
	    	$old_password = $this->input->post('old_password');
	    	$result = $this->register_model->check_user_password($user_id,$old_password);
	    	if($result != null){
				echo "true";
				log_message('debug','Check Password : True');
			} else {
				echo "false";
				log_message('debug','Check Password : False');
			}
    	}
    }

    public function edit_profile_modal(){
        
        log_message('debug','****************** Edit profile Modal REQ View START ******************');
        $data['user_details'] = $this->session->all_userdata();
        $this->load->view('common/edit_profile_modal',$data);
        log_message('debug','****************** Edit profile Modal REQ View ENDED ******************');
    }

    public function send_profile_update_mail(){
        if($this->input->server('REQUEST_METHOD') =='POST'){

           $data['user_details'] = $this->session->all_userdata();
           //$user_id            = $this->session->userdata('user_id');
           $email_subject        = $this->input->post('email_subject');
           $message_body         = $this->input->post('message_body');

           $result = $this->sendemail_model->set_send_email(EMAIL_USERID,$email_subject,$message_body);
           if(isset($result)) { 
                echo "true"; 
                log_message('debug','send mail : True');
            } else { 
                echo "false";
                log_message('debug','send mail : Failed');
            }
        }

    }
    
}
