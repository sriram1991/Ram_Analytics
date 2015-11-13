<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class SendEmail_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function set_send_email($email_id,$email_subject,$email_body){
        $query = array('email_id'=>$email_id,'email_subject'=>$email_subject,'email_body'=>$email_body);
        $res   = $this->db->insert('send_email', $query);
    }

    // Opration : send email to admin for requesting license 
    public function send_license_request($mail_subject,$mail_body,$license){
    	$values = array('email_id' => EMAIL_USERID ,'email_subject' => $mail_subject ,'email_body' => $mail_body ,'invalid' => $license);
    	$query  = $this->db->insert('send_email',$values);
    }

    // Opration : send License conform email to user 
    public function send_license_approve($email_id,$mail_subject,$mail_body,$req_license){
        $values = array('email_id'=>$email_id ,'email_subject'=>$mail_subject ,'email_body'=>$mail_body ,'invalid'=>$req_license);
        $query  = $this->db->insert('send_email',$values);
    }

    // Operation : send email on Add User by SPOC 
    public function email_on_adduser($email_id,$mail_subject,$mail_body){
        $values = array('email_id' => $email_id, 'email_subject' => $mail_subject, 'email_body' => $mail_body);
        $query  = $this->db->insert('send_email',$values); 
    }

}