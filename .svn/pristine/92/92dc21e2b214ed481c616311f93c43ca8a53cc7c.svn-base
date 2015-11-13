<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Activity_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('user_agent');
    }

    function activityLog($logActivity){
        $logActivity['log_user_agent'] = $this->agent->agent_string();
        $this->db->insert('activity_log', $logActivity);
    }
    
    function lastLogInTime($userId){
        $str = "select log_created from activity_log where activity_id = 1 and user_id=".$userId." order by log_created desc limit 2";
        $logInDetails = $this->db->query($str);
        if($logInDetails->num_rows()>1){
        return $logInDetails->result_array();
        }
        return null;
    }

    function lastLogOutTime($userId){
       $str = "select log_created from activity_log where activity_id = 3 and user_id=".$userId." order by log_created desc limit 2";
       $logOutDetails = $this->db->query($str);
       if($logOutDetails->num_rows()>1){
        return $logOutDetails->result_array();
       }
       return null;
    }
 
    function lastLogData($userId){
       $str = "select log_user_agent from activity_log where activity_id = 1 and user_id=".$userId." order by log_created desc limit 2";
       $logData = $this->db->query($str);
       if($logData->num_rows()>1){
        return $logData->result_array();
       }
       return null;
        
       }
}