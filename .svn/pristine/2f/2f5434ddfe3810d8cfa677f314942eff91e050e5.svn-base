<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Action : Sending email function
private function send_email_associate_doc($to_address,$subject,$message_body){
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

    	$message_body = "Dear ".$user_name.",<br><p> Thank you for Joining SKOL System.<br>Your Login details as below:<br>User Login: ".$user_email."<br>Password: ".$user_password."<br><a href='".DOMAIN_PROTOCOL."://".DOMAIN_HOST.":".DOMAIN_PORT."/login'>Click here to login</a><br><br>Thank you<br>Ask Analytics<br><h5>".date('d-M-Y')."</h5><br>";
    	// Construct Email [ From : TO : Subject : Message Body ] 
    	$this->email->from(EMAIL_USERID);
    	$this->email->to($to_address);
        $this->email->subject('SKOL System :'.$subject);
        $this->email->message($message_body);
        // Verify email status 
        if(!$this->email->send()){
        	log_message('debug',"* Send Mail Error : \n".$this->email->print_debugger());
        } else {
        	log_message('debug',"* Email Sent Successfully to :".$to_address);
        }
    	log_message('debug','**************** Send Email ************* Ended ****');
}
// Generate mail template like this
private function reset_mail_template($user_details,$reset_link){
   	$msg = 'Welcome to Skol System '.$user_details['user_fname'].'<br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/resetpass?reset_pwd='.$reset_link.'">Click to Reset your Password</a></h3><br><br>Thank you<br>SKOL System<br><br><h5>sent: '.date("d-M-Y").'</h5><br>';
    return $msg;
}
