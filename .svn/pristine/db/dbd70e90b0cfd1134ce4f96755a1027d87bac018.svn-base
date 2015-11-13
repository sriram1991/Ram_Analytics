<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Register_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	// Operation : Creating New user
	function create_user($input_array,$user_type,$pwd_token) {
		$user_details = array(
						   'registration_no'=> $input_array['registration_no'],
						   'user_fname' 	=> $input_array['first_name'],
						   'user_mname' 	=> $input_array['middle_name'],
						   'user_lname' 	=> $input_array['last_name'],
						   'user_email' 	=> $input_array['user_email'],
						   'user_password' 	=> md5("abc123"),
						   'user_phone' 	=> $input_array['user_phone'],
						   'user_photo'		=> $input_array['user_photo'],
						   'user_address' 	=> $input_array['user_address'],
						   'user_city' 		=> $input_array['user_city'],
						   'user_district' 	=> $input_array['user_district'],
						   'user_state' 	=> $input_array['user_state'],
						   'user_country' 	=> $input_array['user_country'],
						   'user_pin' 		=> $input_array['user_pincode'],
						   'user_role' 		=> $user_type,
						   );
		$this->db->trans_start();
		$result_usr = $this->db->insert('user_master',$user_details);
      	if(!$result_usr) {
      		// if query returns null
  			$msg = $this->db->_error_message();
  			$num = $this->db->_error_number();
  			log_message('debug',">>> Add USER DB Error: \n");
  			log_message('debug',">>> DB Error No : ".$num." \n");
  			log_message('debug',">>> DB Error Msg: ".$msg." \n");
      	} else {
      		$user_id 	= $this->db->insert_id();	
      		$pwd_data 	= array('user_id' => $user_id, 'passwd_token' => $pwd_token);
      		$result_pwd = $this->db->insert('passwd_master',$pwd_data);	
      	}
		$this->db->trans_complete();
		if(isset($user_id)) { return $user_id; } else { return false; }
	}

	// Operation : Mapping Student and Parent
	function map_student_parent($student_id,$parent_id) {
		$map_details = array('student_id' => $student_id,'parent_id' => $parent_id);
		$result_map  = $this->db->insert('student_parent_map', $map_details);
		if(isset($result_map)) { return $result_map; } else { return false; }
	}

	// Operation : Check user Email Validation 
	function check_email($email) {
		$search_email = array('user_email' => $email);
		$res = $this->db->get_where('user_master',$search_email);
		if ($res->num_rows() > 0){
       		return true;
   		} else {
       		return false;
   		}
	}

	// Operation : Get forget email check
	function forgot_email_check($email) {
		$search_email = array('user_email' => $email,'user_status <=' => 4);
		$res = $this->db->get_where('user_master',$search_email);
		if ($res->num_rows() >= 1){
       		return $res->result_array();
   		}
   		return null;
	}

	// Opetation Get user details 
	function get_details($email) {
		$search_email = array('user_email' => $email);
		$res = $this->db->get_where('user_master',$search_email);
		if ($res->num_rows() == 1){
       		return array_shift($res->result_array());
   		} else {
       		return false;
   		}
	}

	// Operation : Verifiy Password Link
	function verify_email($passwd_token) {
		$search_token = array('passwd_token' => $passwd_token);
		$res = $this->db->get_where('passwd_master',$search_token);
		if ($res->num_rows() == 1){
        	$pass_ress 	= array_shift($res->result_array());
        	$user_id 	= $pass_ress['user_id'];
        	log_message('debug'," Verified Email User id : ".$user_id);

        	// Get User Details and generate Registration No Accordingly 
        	$user_query = $this->db->get_where('user_master', array('user_id' => $user_id)); 
        	$user_data  = array_shift($user_query->result_array());
        	$reg_id 	= str_pad( $user_id, 4, '0', STR_PAD_LEFT);
        	
        	// Checking Role and Generating Registration Number 
        	switch ($user_data['user_role']) {
        		case '1':
        			$registration_no = PRODUCT_SERIAL_CODE.date('Y')."S".$reg_id;
        			break;
        		case '2':
        			$registration_no = PRODUCT_SERIAL_CODE.date('Y')."P".$reg_id;
        			break;
        		case '3':
        			$registration_no = PRODUCT_SERIAL_CODE.date('Y')."A".$reg_id;
        			break;
        		default:
        			$registration_no = PRODUCT_SERIAL_CODE.date('Y')."E".$reg_id;
        			break;
        	}
        	
        	// Update user_status and registration_no in user_master table // Corrently made to Active
    		$data = array('user_status' => 1, 'registration_no' => $registration_no);
			$this->db->where('user_id', $user_id);
			$this->db->update('user_master', $data);
			
			// Delete user_id record in password_master table
			$this->db->where('user_id', $user_id);
			$this->db->delete('passwd_master');
			
			// Get All Details of user_master
			$query = $this->db->get_where('user_master', array('user_id' => $user_id));
     		$user_details = array_shift($query->result_array());
       		return $user_details;
   		} else {
       		return false;
   		}
	}

	// Operation : Generate Password Link
	function generate_password($user_id,$passwd_token){
		$pwd_data = array('user_id' => $user_id, 'passwd_token' => $passwd_token);
		$result = $this->db->insert('passwd_master',$pwd_data);
		if(isset($result)){
			return true;
		}
		return null;
	}

	// Operation : update password
	function update_password($user_id,$user_password) {
		$data = array('user_password' => md5($user_password));
		$this->db->where('user_id', $user_id);
		$passwd_update = $this->db->update('user_master',$data);
		return $passwd_update;
	}
	// Operation : Check user Has this password
	function check_user_password($user_id,$password){
		$user_details = array('user_id' => $user_id, 'user_password' => md5($password));
		$res = $this->db->get_where('user_master',$user_details);
		if($res->num_rows() == 1) {
			return true;
		}
		return null;
	}

	// Operation : Create Reset Link Entry
	function create_reset_link($user_id,$passwd_token){
		$user_exist = $this->db->get_where('passwd_master',array('user_id' => $user_id));
		if($user_exist->num_rows() != 0){
			$data = array('passwd_token' => $passwd_token);
			$this->db->where('user_id',$user_id);
			$res = $this->db->update('passwd_master',$data);
			return $res;
		}
		$pwd_data 	= array('user_id' => $user_id, 'passwd_token' => $passwd_token);
      	$result_pwd = $this->db->insert('passwd_master',$pwd_data);
      	return $result_pwd;
	}

	// Operation : Remove Reset Link Entry
	function remove_reset_link($passwd_token){
		$search_token = array('passwd_token' => $passwd_token);
		$res = $this->db->get_where('passwd_master',$search_token);
		if ($res->num_rows() == 1){
			$pass_ress 	= array_shift($res->result_array());
        	$user_id 	= $pass_ress['user_id'];

        	// NEW Code Added From This --- START

        	// Get User Details and generate Registration No Accordingly 
        	$user_query = $this->db->get_where('user_master', array('user_id' => $user_id)); 
        	$user_data  = array_shift($user_query->result_array());
        	$reg_id 	= str_pad( $user_id, 4, '0', STR_PAD_LEFT);
        	
        	// Checking Role and Generating Registration Number 
        	switch ($user_data['user_role']) {
        		case '1':
        			$registration_no = "SKOL".date('Y')."S".$reg_id;
        			break;
        		case '2':
        			$registration_no = "SKOL".date('Y')."P".$reg_id;
        			break;
        		case '3':
        			$registration_no = "SKOL".date('Y')."A".$reg_id;
        			break;
        		default:
        			$registration_no = "SKOL".date('Y')."E".$reg_id;
        			break;
        	}
        	
        	// Update user_status and registration_no in user_master table // Corrently made to Active
    		$data = array('user_status' => 1, 'registration_no' => $registration_no);
			$this->db->where('user_id', $user_id);
			$this->db->update('user_master', $data);

			// NEW Code Added From This --- END

        	// Delete Reset Link
        	$this->db->where('user_id', $user_id);
			$this->db->delete('passwd_master');
			// Get User Details
			$query = $this->db->get_where('user_master', array('user_id' => $user_id));
     		$user_details = array_shift($query->result_array());
       		// Return User details 
       		return $user_details;
		}
		return null;
	}

	// Operation : Save Associate Details 
	function save_associate_details($associate_details,$user_id){
		$associate_data = array(
								'user_id'			=> $user_id,
								'organization_name' => $associate_details['organization_name'],
								'student_count' 	=> $associate_details['student_count'],
								'intent_letter' 	=> $associate_details['letter_of_intent']
							   );
		$result = $this->db->insert('associate_details_master',$associate_data);
		if(isset($result)) {
			return true;
		} else {
			return null;
		}
	}

	// Operation : upload associate details 
	function upload_associate_details($upload_details){
		$associate_details = array(
									'user_id'				=> $upload_details['user_id'],
									'higher_education' 		=> $upload_details['degree'],
									'subject_expertise' 	=> $upload_details['expertise'],
									'certificate_location' 	=> $upload_details['upload'],
								  );
		$result = $this->db->insert('associate_details_master',$associate_details);
        if(isset($result)) { return $result; } else { return null; }
	}

	function update_director_details($director_details){
		$data = array(
						'user_fname'  	=> $director_details['user_fname'],
						'user_mname'  	=> $director_details['user_mname'],
						'user_lname'  	=> $director_details['user_lname'],
						'user_phone'  	=> $director_details['user_phone'],
						'user_address'  => $director_details['user_address'],
						'user_city'  	=> $director_details['user_city'],
						'user_district' => $director_details['user_district'],
						'user_state'  	=> $director_details['user_state'],
						'user_country'  => $director_details['user_country'],
						'user_pin'  	=> $director_details['user_pin']
			);
		$this->db->where('user_id' , $director_details['user_id']);
		$result_usr = $this->db->update('user_master',$data);
		
		if($result_usr !== null) {
			return true;
		}
		return null;
	}

	// Operation : check for Associate already submited his documents or not 
	function check_associate_docs($user_id){
		$search_associate_docs= array('user_id' => $user_id );
		$res = $this->db->get_where('associate_details_master',$search_associate_docs);
		if ($res->num_rows() == 1) {
			return true;
		}
			return null;
		
	}

	// Operation : map director with subject for content uploading 
	function map_director_subject($user_id,$subject_id){
		$input_array = array(
							'user_id' 	 => $user_id,
							'subject_id' => $subject_id
							);
		$result = $this->db->insert('content_directors',$input_array);
		if(isset($result)){ return $result; } else { return null; }
	}

	// Operation : Delete Directors Mappings used in Update
	function delete_director_maps($user_id){
		$this->db->where('user_id',$user_id);
		$result  = $this->db->delete('content_directors');
		if (isset($result)) {
			return $result;
		} 
		return false;
	}

	// Operation : Update Director Details
	function update_director_subject($user_id,$subject_id){
		$input_array = array('subject_id' => $subject_id);
		log_message("debug",'LLLLLLLLLLLLLLL'.var_dump($input_array));

		// first delete previous recorde and update with new one
		$this->db->where('user_id',$user_id);
		$this->db->delete('content_directors',$input_array);
		
		$this->db->where('user_id',$user_id);
		$result = $this->db->insert('content_directors',$input_array);

		if(isset($result)){ return $result; } else { return null; }
	}


	//Opeartion : Checks the payment status of Associate
	function check_associate_payment($user_id){
		$search_associate_payment= array('user_id' => $user_id ,'payment_status'=>'paid');
		$res = $this->db->get_where('associate_details_master',$search_associate_payment);
		if ($res->num_rows() == 1) {
			return true;
		}
			return null;
	}

	// Operation : Check User Exists for Course Linking
	function isThisUserExists($search_query) {
		$res = $this->db->query("SELECT * FROM user_master WHERE user_role ='1' AND user_status <= 4 AND (user_email ='".$search_query."' OR registration_no ='".$search_query."');");
		if($res->num_rows() > 0){
       		return $res->result_array();
   		}
   		return null;
	}

	// Operation : Check Mentor/SME Exists for Course Linking
	function isThisSmeExists($search_query) {
		$res = $this->db->query("SELECT * FROM user_master WHERE user_role ='6' AND user_status <= 4 AND (user_email ='".$search_query."' OR registration_no ='".$search_query."');");
		if($res->num_rows() > 0){
       		return $res->result_array();
   		}
   		return null;
	}

	// Operation : match_student_email 
	function match_student_email($student_email){
		$res = $this->db->get_where('user_master',array('user_email' => $student_email, 'user_role' => 1));
		if($res->num_rows() > 0){
       		return array_shift($res->result_array());
   		}
   		return null;
	}

	// Opration : checking wether
	function is_student_course_details_exists($student_email,$student_course){
		$res = $this->db->query("SELECT * from user_email_course_batch_view where user_email = '".$student_email."' and course_name='".$student_course."'");
		if ($res->num_rows() > 0) {
			return array_shift($res->result_array());
		}
		return null;
	}

	// Opration : checking for same course match  
	function is_there_user_couser_exist($user_email){
		$result = $this->db->query("SELECT course_name from user_email_course_batch_view WHERE user_email='".$user_email."'");
		if ($result->num_rows() > 0) {
			return array_shift($result->result_array());
		}
		return null;
	}

	// Operation : New User Enrollment 
	function new_user_enrollment($user_id,$new_user_id){
		$input_array = array('affilate_user_id' => $user_id, 'joined_user_id' => $new_user_id );
		$result = $this->db->insert('affilate_user_map',$input_array);
		if(isset($result)){
			return $result;
		} 
		return false;
	}

	// Operation : Who Enrolled This User 
	function who_enrolled_this_user(){
		
	}
	
	// Operation : It will save the quotation deatail of area_of_interest
	// function save_request_quote($quote){
	// 	$result = $this->db->insert("quote_request_master",$quote);
	// 	if (isset($result)) {
	// 		return true;		
	// 	}
	// 	return null;
	// }


    // Operation : Subcribe Mentor link with course
    function mentor_course_link($course_form){
        $data = array(
                        'mentor_id'    => $course_form['user_id'],
                        'course_id'    => $course_form['course_id']
                     );
        $result = $this->db->insert('mentor_course_map',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }
}
