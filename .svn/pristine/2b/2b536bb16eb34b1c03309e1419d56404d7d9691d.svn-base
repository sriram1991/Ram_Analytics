<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Payment_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }


    public function offline_payment($transaction_query){
    	log_message('debug','The transaction query is >>>>>>>>>>>>>>>>>>>> '.print_r($transaction_query,true));
    	$result = $this->db->insert('payment_master',$transaction_query);
    	if(!$result){
    		// if query returns null
  			$msg = $this->db->_error_message();
  			$num = $this->db->_error_number();
  			log_message('debug',">>> Add USER DB Error: \n");
  			log_message('debug',">>> DB Error No : ".$num." \n");
  			log_message('debug',">>> DB Error Msg: ".$msg." \n");
    	}else{
    		$transaction_id 	= $this->db->insert_id();
    	}
    	if(isset($transaction_id)) { return $transaction_id; } else { return false; }
    }
    
    public function delete_user_transcation($transaction_id){
      $query = array('transaction_id' => $transaction_id);
      $result = $this->db->delete('payment_master',$query);
      return $result;
    }

    public function apply_scholarship($scholarship_data){

      $result = $this->db->insert('scholarship_master',$scholarship_data);
      if(!$result){
          $msg = $this->db->_error_message();
          $num = $this->db->_error_number();
          log_message('debug',">>> Add USER DB Error: \n");
          log_message('debug',">>> DB Error No : ".$num." \n");
          log_message('debug',">>> DB Error Msg: ".$msg." \n");
          return false;
      }else{
          return true;
      } 
    }

    public function check_scholarship_status($student_id,$course_id){
      $result = $this->db->get_where('scholarship_master',array('user_id' => $student_id,'course_id'=>$course_id));
      if($result->num_rows == 0){
        return false;
      }else{
        return array_shift($result->result());
      }
    }

    public function get_all_scholarships(){
      $result = $this->db->get('scholarship_master');
      if(isset($result)){
        return $result->result();
      }
      return null;
    }

    public function get_not_verfied_students(){
      $result = $this->db->get_where('scholarship_master',array('status_id' => 9));
      if(isset($result)){
        return $result->result();
      }
      return null;
    }

    public function update_scholarship($user_id,$course_id,$discount_amount){

      $result = $this->db->get_where('scholarship_master',array('user_id' => $user_id,'course_id'=>$course_id));
      $scholarship_data = array_shift($result->result());
      $scholarship_id   = $scholarship_data->scholarship_id;
      if($discount_amount == 0){
        //Discount_amount=0 indicates that the scholarship has been reject.
        //So the we are updating the status of this scholarship_id to 7(which indicated 'Invalid' in status_master table)
        $data_tobe_update = array('discount_amount'=>$discount_amount,'status_id'=>7);
      }else{
        //Discount_amount!=0 indicates that the scholarship has been approved.
        //So the we are updating the status of this scholarship_id to 6(which indicated 'Valid' in status_master table)
        $data_tobe_update = array('discount_amount'=>$discount_amount,'status_id'=>6);  
      }
      $this->db->where('scholarship_id',$scholarship_id);
      $result= $this->db->update('scholarship_master',$data_tobe_update);
    
    } 

    // Operation : Check Quote Request Status 
    public function check_quote_request_status($user_id,$subject_id){
      $result = $this->db->get_where('quote_request_master',array('user_id' => $user_id,'subject_id'=>$subject_id));
      if($result->num_rows == 0){
        return false;
      } else {
        return array_shift($result->result());
      }
    }

    // Operation : Request for Quote
    public function request_quote($request_quote_data) {
      $result = $this->db->insert('quote_request_master',$request_quote_data);
      if(!$result){
        $msg = $this->db->_error_message();
        $num = $this->db->_error_number();
        log_message('debug',">>> Add Quote Request DB Error: \n");
        log_message('debug',">>> DB Error No : ".$num." \n");
        log_message('debug',">>> DB Error Msg: ".$msg." \n");
        return false;
      } else {
        return true;
      } 
    }

    // Operation : Get Not Verifed SPOC Quotes 
    public function get_not_verified_spoc_quotes(){
      $result = $this->db->get_where('quote_request_master',array('status_id' => 9));
      if(isset($result)){
        return $result->result();
      }
      return null;
    }

    // Operation : Get All SPOC Quotes
    public function get_all_spoc_quotes(){
      $result = $this->db->get('quote_request_master');
      if(isset($result)){
        return $result->result();
      }
      return null;
    }

    // Operation : Get All SPOC Quotes for this user
    public function get_all_this_spoc_quotes($user_id){
      $result = $this->db->get_where('quote_request_master',array('user_id' => $user_id));
      // $result = $this->db->get_where('quote_request_status_view',array('user_id' => $user_id));
      if(isset($result)){
        return $result->result();
      }
      return null;
    }

    // Operation : Check  SPOC Quote for this Area of Interest 
    public function isThere_spoc_quote_for_this_aoi($user_id,$subject_name){
      $result = $this->db->get_where('quote_request_master',array('user_id' => $user_id, 'subject_name' => $subject_name));
      if($result->num_rows() > 0){
        return true;
      }
      return null;
    }

    // Operation : Update SPOC Status 
    public function update_spoc_quote($user_id,$subject_id,$discount_amount,$license_count){

      $result = $this->db->get_where('quote_request_master',array('user_id' => $user_id,'subject_id'=>$subject_id));
      $spoc_quote_data = array_shift($result->result());
      $quote_id         = $spoc_quote_data->quote_id;
      if($discount_amount == 0){
        //Discount_amount=0 indicates that the scholarship has been reject.
        //So the we are updating the status of this quote_id to 7(which indicated 'Invalid' in status_master table)
        $data_tobe_update = array('discount_amount'=>$discount_amount,'no_of_license'=>$license_count,'status_id'=>7);
      }else{
        //Discount_amount!=0 indicates that the scholarship has been approved.
        //So the we are updating the status of this quote_id to 6(which indicated 'Valid' in status_master table)
        $data_tobe_update = array('discount_amount'=>$discount_amount,'no_of_license'=>$license_count,'status_id'=>6);  
      }
      $this->db->where('quote_id',$quote_id);
      $result= $this->db->update('quote_request_master',$data_tobe_update);
    
    } 

    // Operation : delete payment of area of interest
    public function remove_aoi($quote_id){
      $result = $this->db->query("DELETE FROM quote_request_master where quote_id = '".$quote_id."' ");
      if (isset($result)) {
        return $result;
      }
      return null;
    }

    // Operation : Delete Associate Subject Map now SPOC subject map
    public function delete_spoc_aoi_map($user_id,$subject_name) {
      $result = $this->db->delete('associate_subject_map',array('user_id' => $user_id, 'subject_name' => $subject_name));
      if(isset($result)){
        return $result;
      }
      return null;
    }
 
}
