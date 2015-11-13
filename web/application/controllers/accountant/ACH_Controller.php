<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ACH_Controller extends ACT_Controller {    
    public function __construct(){
    	parent::__construct();
        $this->load->model('user_model');
        $this->load->model('sendemail_model');
        $this->load->model('payment_model');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        $data['load_view'] = $this->session->flashdata('load_view');
        $data['user_home'] = "/accountant_home";
        $data['role_view'] = "/accountant/accountant_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        $this->load->view('user_footer');
        // log_message('debug', 'Accountant home');
    }

    public function dashboard(){
        if($this->input->server('REQUEST_METHOD') == 'GET'){
            $data['user_details'] = $this->session->all_userdata();
            $data['students_count']  = $this->user_model->get_user_count(1);
            $data['parent_count']    = $this->user_model->get_user_count(2);
            $data['associate_count'] = $this->user_model->get_user_count(3);
            $this->load->view('accountant/dashboard_rightpan',$data);
            // $result = $this->batch_model->get_batch($user_id);
            // if($result != null){

            // }
            // if($result == null){
            //     $this->load->view('student/dashboard_rightpan',$data);
            // }
        }
    }

    public function offline_payment(){
        if($this->input->server('REQUEST_METHOD') == 'GET'){
            $data['user_details'] = $this->session->all_userdata();
            $this->load->view('accountant/offline_payment',$data);
        }
    } 
    // Action : offline Payment List
    public function offline_payment_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['offline_payment_list'] = $this->user_model->get_offline_pay_list_view('offline'); 
            $this->load->view('accountant/offline_payment_list',$data);
        }

    }

    // Action : Not verified offline Payment List    
    public function offline_not_verified_payment_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['offline_not_verified_payment_list'] = $this->user_model->get_offline_pay_list_view('offline');
            $this->load->view('accountant/offline_not_verified_payment_list',$data);
        }
    }

    // Action : do payment activation
    public function do_paid(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $transaction_id = $this->input->post('transaction_id');
            $payment_status = $this->input->post('payment_status');
            $transaction_description = $this->input->post('transaction_description'); 
            log_message('debug','my id here'.$transaction_description);
            
            $user_id        = $this->input->post('user_id');
            $user_email     = $this->input->post('user_email');
            log_message('debug','my user_email here'.$user_email);

            $course_name    = $this->input->post('course_name');
            log_message('debug','my course_name here'.$course_name);
            $users_detail = $this->user_model->get_userid_details($user_id);
            $email_subject = "Your Payment Recived";

            $result = $this->user_model->change_payment_status($transaction_id,$payment_status);
            if($result == 1) {

                $message_body = 'Dear '.$users_detail['user_fname'].' ,<br> Welcome and Congratulation for selecting '.$transaction_description.'<br> For any other query kindly contact our service department at service@ask_analytics.com <br> Thanks, Grow and learn through your stay with us <br> BEST OF LUCK from .'.PRODUCT_NAME.'.';
                $res = $this->sendemail_model->set_send_email($users_detail['user_email'],$email_subject,$message_body);
                log_message('debug','Transaction ID: '.$transaction_id.' Has paid: success');

                if(isset($res)){
                    echo 'true';
                    // log_message('debug','saving here '.$res);
                }    
                log_message('debug',' # # # ############### # # message body is here'.$message_body);
                return true;  
            } else {
                log_message('debug','Transaction ID: '.$transaction_id.' Has paid: Failed');
                return false;
            } 
        }
    }

    public function scholarship_dashboard(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $this->load->view('accountant/scholarship_dashboard');
        }
    }

    public function all_scholarships(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $data['scholarship_students']=$this->payment_model->get_all_scholarships();
            $this->load->view('accountant/scholarship_students_list',$data);
        }
    }

    public function not_verified_scholarships(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $data['scholarship_students']=$this->payment_model->get_not_verfied_students();
            $this->load->view('accountant/not_verified_scholarship_students',$data);
        }
    }

    public function give_scholarship(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $student_id = $this->input->post('student_id');
            $course_id = $this->input->post('course_id');
            $discount_amount = $this->input->post('discount_amount');

            $scholarship_applied = $this->payment_model->update_scholarship($student_id,$course_id,$discount_amount);
        }
    }

    public function reject_scholarship(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $student_id = $this->input->post('user_id');
            $course_id  = $this->input->post('course_id');

            $scholarship_rejected = $this->payment_model->update_scholarship($student_id,$course_id,0);
        }
    }

}