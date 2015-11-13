<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Controller extends Common_Controller {    
    public function __construct(){
    	parent::__construct();
        $this->load->model('report_model');
        $this->load->model('resource_model');
        $this->load->model('batch_model');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        log_message('debug', 'Payment home');
    }

    public function dashboard(){
        log_message('debug','Im in Report dashboard');
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->load->view('reports/student_payment_report');            
        }else{
            log_message('debug',"Post is not called");
        }
    }
    // Action : Display's the Student's Report Dashborad
    public function student_dashboard(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->load->view('reports/student_payment_report');            
        }else{
            log_message('debug',"Post is not called");
        }
    }
    // Action : Display's the List of Paid Students
    public function paid_students(){
        
        if($this->input->server('REQUEST_METHOD')=='POST'){   
            $data['students'] = $this->report_model->get_payment_status_students(2);
            $this->load->view('reports/payment_status_student',$data);
            // $this->load->view('registrar/registrar_dashboard',$data);
        }
    }
    // Action : Display's the List of Unpaid Students
    public function unpaid_students(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['students'] = $this->report_model->get_payment_status_students(3);
            $this->load->view('reports/payment_status_student',$data);
        }
    }
    // Action : Display's the List of Payment Not Verified Students
    public function payment_not_verified_students(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['students'] = $this->report_model->get_payment_status_students(8);
            $this->load->view('reports/payment_status_student',$data);
        } 
    }

    // Action : Display's the Associate's Report Dashborad
    public function associate_dashboard(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->load->view('reports/associate_payment_report');            
        }else{
            log_message('debug',"Post is not called");
        }
    }

    public function paid_associates(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['associates'] =  $this->report_model->get_payment_status_assocaites('2');
            $this->load->view('reports/payment_status_associate',$data);
        }
    }

    public function unpaid_associates(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['associates'] =  $this->report_model->get_payment_status_assocaites('3');
            $this->load->view('reports/payment_status_associate',$data);
        }
    }

    public function payment_not_verified_associates(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['associates'] =  $this->report_model->get_payment_status_assocaites('8');
            $this->load->view('reports/payment_status_associate',$data);
        }
    }


    public function batch_student_dashboard(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['batches'] = $this->batch_model->get_all_batchnames();
            $this->load->view('reports/batch_report',$data);            
        }else{
            log_message('debug',"Post is not called");
        }
    }


    public function batchwise_students(){
        log_message('debug','In Batchwise_students of RC ');
        if($this->input->server('REQUEST_METHOD')=='POST'){
            log_message('debug','In POST of Batchwise_students of RC ');
            $batch = $this->input->post('batch_name');
            $data['batchwise_list'] = $this->report_model->get_batchwise_students($batch);
            $this->load->view('reports/student_batchwise_list',$data);
        }
    }

    public function batchwise_associates(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $batch = $this->input->post('batch_name');
            $data['batchwise_list'] = $this->report_model->get_batchwise_associates($batch);
            $this->load->view('reports/associate_batchwise_list',$data);
        }
    }

    // Action : Associate reports here
    public function associates_reports() {
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            //$data['associate_details'] = $this->user_modal->get_all_associates();
            $this->load->view('reports/associates_reports');
        }
    }

    // Action : Associate reports here
    public function students_reports() {
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            //$data['associate_details'] = $this->user_modal->get_all_associates();
            $this->load->view('reports/students_reports');
        }
    }

    // Action : Unverified Associates List for Reports 
    public function unverified_associates_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['not_varified_associates_details'] = $this->report_model->get_unregistered_list_view(3,4);
            $this->load->view('reports/unverified_associates_list',$data);
        }
    }

    // Action : Unverified students List for Reports 
    public function unverified_students_list(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['not_verified_student_details'] = $this->report_model->get_unregistered_list_view(1,4);
            $this->load->view('reports/unverified_students_list',$data);
        }
    }

    public function report_dash() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['user_details']    = $this->session->all_userdata();
            // $data['course_count']    = $this->resource_model->get_course_count();
            $data['students_count']  = $this->report_model->get_user_count(1);
            // $data['parent_count']    = $this->user_model->get_user_count(2);
            $data['associate_count'] = $this->report_model->get_user_count(3);

            $this->load->view('reports/reports_dashboard',$data);
        }
    }

    public function report_payment_dashboard() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['user_details']    = $this->session->all_userdata();
            // $data['course_count']    = $this->resource_model->get_course_count();
            $data['students_count']  = $this->report_model->get_user_count(1);
            // $data['parent_count']    = $this->user_model->get_user_count(2);
            $data['associate_count'] = $this->report_model->get_user_count(3);

            $this->load->view('reports/reports_payment_dashboard',$data);
        }
    }

    public function assessment_results(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['courses'] = $this->batch_model->get_course();
            $this->load->view('reports/assessment_result_report',$data);
        }
    }

    // Action : New Assessment Results 
    public function new_assessment_results() {
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','Loading new Assessment Reports View ');
            $this->load->view('reports/new_assessment_result_view');
        }
    }

    // Action : All Students Resoult View 
    public function all_student_test_reports() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            // Bring All Datas of filter 
            $data['country_list']   = $this->report_model->get_all_country_list();
            $data['state_list']     = $this->report_model->get_state_list();
            $data['aoi_list']       = $this->report_model->get_aoi_list();
            $data['course_list']    = $this->report_model->get_course_list();
            $data['test_name_list'] = $this->report_model->get_test_name_list();
            log_message('debug','Loading new all Students test Reports View ');
            $this->load->view('reports/all_student_test_reports',$data);
        }
    }

    // Action : Get New Student Rank list
    public function get_new_student_rank_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_country = $this->input->post('user_country');
            $user_state   = $this->input->post('user_state');
            $user_aoi     = $this->input->post('user_aoi');
            $course_id    = $this->input->post('course_id');
            $test_no      = $this->input->post('test_no');
            log_message('debug','Building search_filter ..............................');
            if($user_country != 'ALL_Countrys'){
                $search_filter['user_country'] = $user_country;
            }

            if($user_state != 'ALL_States'){
                $search_filter['user_state'] = $user_state;
            }

            if($user_aoi != 'ALL_AOI'){
                $search_filter['test_subject'] = $user_aoi;
            }

            if($course_id != 'ALL_Courses'){
                $search_filter['course_id'] = $course_id;
            }

            if($test_no != 'ALL_Test'){
                $search_filter['test_no'] = $test_no;
            }
            $search_filter['test_score > '] = '0';
            log_message('debug','Build search_filter ..................................');
            // log_message('debug',print_r($search_filter),true);
            log_message('debug','Build search_filter Ready ............................');
            $data['rank_list'] = $this->report_model->get_new_student_ranks($search_filter);

            $this->load->view('reports/all_student_rank_list',$data);
        }
    }


    public function batchwise_assessment_results(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['courses'] = $this->batch_model->get_course();
            $data['batches'] = $this->batch_model->get_all_batchnames();
            $this->load->view('reports/assessment_result_report',$data);
        }   
    }

    public function get_assessment_ranks(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $test_no = $this->input->post('test_no');
            $course_id = $this->input->post('course_id');
            $data['rank_list'] = $this->report_model->get_student_ranks($test_no,$course_id);
            $this->load->view('reports/assessment_rank_list',$data);
        }
    }

    public function get_batchwise_assessment_ranks(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $test_no = $this->input->post('test_no');
            $course_id = $this->input->post('course_id');
            $batch_name = $this->input->post('batch_name');
            $data['rank_list'] = $this->report_model->get_student_batchwise_ranks($test_no,$batch_name,$course_id);
            $this->load->view('reports/assessment_rank_list',$data);
        }
    }

    public function get_all_course_tests(){
        
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $course_id = $this->input->post('course_id');
            $level = $this->input->post('level');
            $data['course_tests'] = $this->report_model->get_all_course_tests($course_id);
            if($level == 'national_level'){
                $this->load->view('reports/national_test_list',$data);
            }
            if($level == 'batch_level'){
                $this->load->view('reports/batch_test_list',$data);
            }
        }
    }

}