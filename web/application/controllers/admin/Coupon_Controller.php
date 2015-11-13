<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_Controller extends ASM_Controller {    
    public function __construct(){
    	parent::__construct();
        $this->load->model('batch_model');
        $this->load->model('resource_model');
        $this->load->model('register_model');
        $this->load->model('coupon_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        $data['flash_msg'] = $this->session->flashdata('success_msg');
        $data['user_home'] = "/admin_home";
        $data['role_view'] = "/admin/admin_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        $this->load->view('user_footer');
        log_message('debug', 'Admin home');
    }

    public function coupon_code_dashboard(){
        log_message('debug','*******Admin Coupon Code Dashboard*********'); 
        $this->load->view('admin/coupon_code_dashboard');
    }

    public function coupon_code_view(){
        log_message('debug','*******Admin Coupon Code List*************');
        $data['coupon_details'] = $this->coupon_model->get_all_coupons();
        $this->load->view('admin/coupon_code_view',$data);
    }


    public function generate_coupon_code(){
    	if($this->input->server('REQUEST_METHOD') == 'GET'){
            log_message('debug','*******Admin Generating Coupon Code*********'); 
            $this->load->view('admin/generate_coupon_code');
            log_message('debug','*******Coupon Code will generate now********');
         
        }
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $no_of_coupons = $this->input->post('no_of_coupons');
            $discount_amount = $this->input->post('discount_amount');
            $valid_till = $this->input->post('valid_till');
            log_message('debug','No of coupons are '.$no_of_coupons); 
            log_message('debug','Discounted amount is '.$discount_amount);
            log_message('debug','Valid till '.$valid_till);

            $coupon_code_array = array();
            
            $keys = array_merge(range(0, 9), range('A', 'Z'));
            for ($i = 0; $i < $no_of_coupons; $i++) {
              $key = md5($i.time());
              $coupon_code = strtoupper(substr($key,0,10));
              log_message('debug','Coupon code is '.$coupon_code);
              $coupon_code_array[$i] = $coupon_code;
            }
            log_message('debug','Coupons are generated and they are');
            // for($i=0;$i<$no_of_coupons;$i++)
            // {
            //     log_message('debug','Coupon is '.$array_data[$i]);
            //     log_message('debug','Coupon code is '.$array_data[$i]['coupon_code']);
            //     log_message('debug','Coupon code is '.$array_data[$i]['discount_amount']);
            // }

            $this->load->model('coupon_model');
            $generated = $this->coupon_model->generate($coupon_code_array,$discount_amount,$valid_till,$no_of_coupons);
            if($generated){
                log_message('debug','Coupon code Generated');
            }else{
                log_message('debug','Some Coupon code not generated');
            }
            
            echo "coupons_generated";
         
        }
    }

}