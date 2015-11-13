<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Pincode_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getPincode($pinCode){
        $qry = array('pin_code'=>$pinCode);
        $res = $this->db->get_where('india_pincode_master', $qry);
        if($res->num_rows() == 1){
            $pinDetails = $res->row_array();
            log_message('debug', "Found pin ".$pinDetails['pin_code']." ".$pinDetails['district_name']);
            return $pinDetails;
        }
        log_message('debug', "Pincode not found for ".$pinCode);
        return null;
    }

    public function get_indian_states(){
        $result = $this->db->query("SELECT DISTINCT(state_name) FROM india_pincode_master");
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }
}