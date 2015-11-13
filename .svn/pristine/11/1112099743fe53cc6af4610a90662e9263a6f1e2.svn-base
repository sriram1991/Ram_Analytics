<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Sample code
if ( ! function_exists('send_email_test')){
	function send_email_test($to_address,$subject,$message_body){
        $CI =& get_instance();
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
            'mailtype'  =>  'html',
            'charset'   =>  'iso-8859-1',
            'wordwrap'  =>  TRUE
            );
        $CI->load->library('email',$configs);
        $CI->email->set_newline("\r\n");

        //$message_body = "Dear ".$user_name.",<br><p> Thank you for Joining SKOL System.<br>Your Login details as below:<br>User Login: ".$user_email."<br>Password: ".$user_password."<br><a href='".DOMAIN_PROTOCOL."://".DOMAIN_HOST.":".DOMAIN_PORT."/login'>Click here to login</a><br><br>Thank you<br>Ask Analytics<br><h5>".date('d-M-Y')."</h5><br>";
        // Construct Email [ From : TO : Subject : Message Body ] 
        $CI->email->from(EMAIL_USERID);
        $CI->email->to($to_address);
        $CI->email->subject('SKOL System :'.$subject);
        $CI->email->message($message_body);
        // Verify email status 
        if(!$CI->email->send()){
            log_message('debug',"* Send Mail Error : \n".$CI->email->print_debugger());
        } else {
            log_message('debug',"* Email Sent Successfully to :".$to_address);
        }
        log_message('debug','**************** Send Email ************* Ended ****');
    }
}

// Mail template for Associate
if ( ! function_exists('associate_docs_status')){
    function associate_docs_status($user_details){
   	$msg = 'Welcome to Skol System '.$user_details['user_fname'].'<br><br> Thanks for submitting your document, verification will takes place, We will get back you in 2 working days <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/spoc_home">Click to Login </a></h3><br><br>Thank you<br>SKOL System<br><br><h5>sent: '.date('d/M/Y').'</h5><br>';
    return $msg;
    }
}

// Mail template for Admin
if ( ! function_exists('associate_docs_admin_templet')){
    function associate_docs_admin_templet($user_details){
    $msg = 'Hi Admin, '.'<br> <br>Welcome to Skol System <br> You recived a document from Associate Name :'.$user_details['user_fname'].' waiting for your conformation<br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registrar_home">Click to Conform Associate</a></h3><br><br>Thank you<br>SKOL System<br><br><h5>sent: '.date('d/M/Y').'</h5><br>';
    return $msg;
    }
}

if( !function_exists('log_activity')){
    function log_activity($user_id,$activityID,$logDescription,$severityIndex){

        $CI = & get_instance();
        $CI->load->model('activity_model');

        $log_activity = array(
                               'user_id'=> $user_id,
                               'activity_id'=>$activityID,
                               'log_description'=>$logDescription ,
                               'severity_id'=> $severityIndex);

        $CI->activity_model->activityLog($log_activity);

    }
}
