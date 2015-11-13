 <?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');

class Profile_model extends CI_Model{
	public function __construct() {
		parent::__construct();

	}

	// Action -> update profile 
	function update_profile($input_array) {
		$user_details = array(
						   'user_fname' 	=> $input_array['first_name'],
						   'user_mname' 	=> $input_array['middle_name'],
						   'user_lname' 	=> $input_array['last_name'],
						   'user_phone' 	=> $input_array['user_phone'],
						   'user_address' 	=> $input_array['user_address'],
						   'user_city' 		=> $input_array['user_city'],
						   'user_district' 	=> $input_array['user_district'],
						   'user_state' 	=> $input_array['user_state'],
						   'user_country' 	=> $input_array['user_country'],
						   'user_pin' 		=> $input_array['user_pincode']
						   );
		$this->db->where('user_email' , $input_array['user_email']);
		$result_usr = $this->db->update('user_master',$user_details);
		
		if($result_usr !== null) {
			return true;
		}
		return null;
	}

	// Action -> update profile 
	function ajax_profile_update($input_array) {
		$user_details = array(
						   'user_phone' 	=> $input_array['user_phone'],
						   'user_photo' 	=> $input_array['user_photo']
						   );
		$this->db->where('user_email' , $input_array['user_email']);
		$result_usr = $this->db->update('user_master',$user_details);
		
		if($result_usr !== null) {
			return true;
		}
		return null;
	}	

	// Action -> get user details 
	function get_user_details($user_id) {
		$result = $this->db->get_where('user_master',array('user_id' => $user_id ));
		if($result->num_rows() == 1) {
			return array_shift($result->result_array());
		}
		return null;
	}



}



