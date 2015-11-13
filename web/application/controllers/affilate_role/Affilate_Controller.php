<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affilate_Controller extends AF_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('register_model');
        $this->load->model('batch_model');
        $this->load->model('payment_model');
        $this->load->model('resource_model');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        $data['flash_msg'] = $this->session->flashdata('success_msg');
        $data['user_home'] = "/affilate_home";
        $data['role_view'] = "affilate_role/affilate_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        $this->load->view('user_footer');
        log_message('debug', 'Affilate home');
    }

    //---------------------------------------------------------------------------------------//
    // Dashboard Management 
    //---------------------------------------------------------------------------------------//
    public function dashboard(){
        if($this->input->server('REQUEST_METHOD') == 'GET') {
                $user_id                = $this->session->userdata('user_id');
                $data['user_details']   = $this->session->all_userdata();
                $data['students_count'] = $this->user_model->get_affilate_joined_user_count($user_id,1);
                // $data['parent_count']   = $this->user_model->get_user_count(2);
                // $data['associate_count'] = $this->user_model->get_user_count(3);
                $this->load->view('affilate_role/affilate_dashboard',$data);
            }
    }
    //---------------------------------------------------------------------------------------//

    //---------------------------------------------------------------------------------------//
    // User Management 
    //---------------------------------------------------------------------------------------//
    
    // DRY CODE: Action : Activiate User
    public function activate_user(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->input->post('user_id');

            $result = $this->user_model->change_user_status($user_id,1);
            if($result == 1) {
                log_message('debug','User ID: '.$user_id.' Has Activation: Success');
                echo "true";  
            } else {
                log_message('debug','User ID: '.$user_id.' Has Activation: Failed');
                echo "false";
            } 
        }
    }

    // DRY CODE: Action : De-Activiate User
    public function de_activate_user(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->input->post('user_id');
            $result  = $this->user_model->change_user_status($user_id,5);
            if($result == 1) {
                log_message('debug','User ID: '.$user_id.' Has De-Activated: Success');
                echo "true";  
            } else {
                log_message('debug','User ID: '.$user_id.' Has De-Activated: Failed');
                echo "false";
            } 
        }
    }
    

    // DRY CODE: Action : Delete Unverified User
    public function delete_unverified_user(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id    = $this->input->post('user_id');
           // $user_role  = $this->input->post('user_role');
            $result     = $this->user_model->delete_user($user_id);
            if($result == 1) {
            
                log_message('debug','User ID: '.$user_id.' Has Deleted: Success');
                echo "true";  
            } else {
                log_message('debug','User ID: '.$user_id.' Has Deleted: Failed');
                echo "false";
            } 
        }
    }
    //---------------------------------------------------------------------------------------//


    //---------------------------------------------------------------------------------------//
    // Associate Management 
    //---------------------------------------------------------------------------------------//
    // Make DRY : Action : Associate Management
    public function associates_dashboard() {
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            //$data['associate_details'] = $this->user_modal->get_all_associates();
            $this->load->view('registrar/associates_dashboard');
        }
    }


    // Action : Associates List
    public function associates_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_details']     = $this->session->all_userdata();
            $data['associates_details'] = $this->user_model->get_users_list_view(3);
            $this->load->view('registrar/associates_list',$data);
        }
    }

    // Action->Load Add associate Modal view
    public function add_associate_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','****************** AHR controller Add Associate Modal REQ View START ******************');
            $this->load->view('registrar/add_associate_modal');
            log_message('debug','****************** AHR controller Add Associate Modal REQ View ENDED ******************');    
        }
    }

    // Action : Associates List document by srirarm 
    public function associates_document_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['associates_details'] = $this->user_model->get_doc_list_view();
            $this->load->view('registrar/associates_document_list',$data);
        }
    }

    // Action : Associates Subjects List 
    public function associates_subject_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['associates_details'] = $this->user_model->associate_subject_registration_list();
            $this->load->view('registrar/associate_subjects_list',$data);
        }
    }

    //Action: Load Edit associate Document Modal View
    public function view_associate_doc(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
             $user_id = $this->input->post('user_id');
             $data['user_details']      = $this->user_model->get_userid_details($user_id);
             $data['associate_details'] = $this->user_model->get_asso_docs_details($user_id);
             log_message('debug','****************** Content Admin Edit Document Modal REQ View START ******************');
             $this->load->view('registrar/associate_docs_modal',$data);
             log_message('debug','****************** Content Admin Edit Document Modal REQ View ENDED ******************');
        }
        
    }

    //---------------------------------------------------------------------------------------//
    

    //---------------------------------------------------------------------------------------//
    // Parents Management 
    //---------------------------------------------------------------------------------------//
    // Make DRY : Action : Parents Management
    public function parents_dashboard() {
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            //$data['associate_details'] = $this->user_modal->get_all_associates();
            $this->load->view('registrar/parents_dashboard');
        }
    }
    
    // Action : Parents List
    public function parents_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['parents_details'] = $this->user_model->get_users_list_view(2);
            $this->load->view('registrar/parents_list',$data);
        }
    }
    //---------------------------------------------------------------------------------------//



    //---------------------------------------------------------------------------------------//
    // Students Management 
    //---------------------------------------------------------------------------------------//
    // Make DRY : Action : Students Management
    public function students_dashboard() {
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            //$data['associate_details'] = $this->user_modal->get_all_associates();
            $this->load->view('affilate_role/users_management_dashboard');
        }
    }

    // Action->Load Add Student Modal view
    public function add_student_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','****************** AHR controller Add Student Modal REQ View START ******************');
            $this->load->view('affilate_role/add_user_modal');
            log_message('debug','****************** AHR controller Add Student Modal REQ View ENDED ******************');    
        }
    }

    // Action : affilate users list
    public function affilate_users_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id                  = $this->session->userdata('user_id');
            $data['user_details']     = $this->session->all_userdata();
            // $data['students_details'] = $this->user_model->get_users_list_view(1);
            $data['students_details'] = $this->user_model->get_affilate_users_list_view($user_id,1);
            $this->load->view('affilate_role/users_management_list',$data);
        }
    }

    //Action:Edit Student Registration Modal
    public function edit_student_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','******************  Edit student Modal REQ View START ******************');
            $user_id              = $this->input->post('user_id');
            $data['user_details'] = $this->user_model->get_userid_details($user_id);
           // $data['indian_state'] = $this->pincode_model->get_indian_states();            
            $this->load->view('affilate_role/edit_user_modal',$data);
            log_message('debug','******************  Edit student Modal REQ View ENDED ******************');    
        }
    }

    // Action : Student Course link
    public function student_course_link(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_role = 1; // student
            $data['students_details'] = $this->user_model->user_course_link_view($user_role);
            $this->load->view('registrar/student_course_link',$data);
        }
    }

    // Action->Load link Course Modal view
    public function link_course_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','****************** AHR controller Add course link Modal REQ View START ******************');
            $this->load->view('registrar/link_course_modal');
            log_message('debug','****************** AHR controller Add course link Modal REQ View ENDED ******************');    
        }
    }

    // Action : Check User Email Exist and Email Verified Please Chenge it to Student
    public function isThisStudentExists(){
        log_message('debug','icame here ');
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug',$this->input->post('search_user_email'));
            $user_email = $this->input->post('search_user_email');
            //$result = $this->register_model->forgot_email_check($user_email);
            $result = $this->register_model->isThisUserExists($user_email);
            if($result != null) {
                echo "true";
                log_message('debug','****  Email Present ****');
            } else {
                echo "false";
                log_message('debug','**** Email Not Valid or Not Present ****');
            }
        }
    }

    //Action: student record search function
    public function student_record_search(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $search_query = $this->input->post('search_user_email');
            $user = $this->user_model->get_student_record($search_query);
            $courses = $this->user_model->get_student_course();
            // log_message('debug',print_r($courses,true));  
            if(isset($user)){
                foreach($courses as $key => $course){
                    if($this->user_model->get_mapped_course($user[0]['user_id'],$course['course_id'])){
                        unset($courses[$key]);
                        // log_message('debug','mapped',print_r($course['course_id'],true));
                     }
                     else{
                        // log_message('debug','not mapped',$course['course_id']);  
                     }
                }    
                $data['course_list'] = $courses;  
                $data['students_details'] = $user;
                $this->load->view('registrar/student_course_link_view',$data);      
            } else {
                echo "<h4> User Does not Exists !</h4>";
            }
        }
    }

    // Action : Link Student with Coruse 
    public function link_student_with_course(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id      = $this->input->post('user_id');
            $course_id    = $this->input->post('course_id');
            $amount_paid  = $this->input->post('amount_paid');
            $payment_status = $this->input->post('payment_status');
            $course_details = $this->resource_model->get_courses_details($course_id); 
            $total_amount   = $course_details['course_fee'];

            $admin_transaction = array(
                'user_id' => $user_id,
                'transaction_number' => 'SKOLADMIN'.date('Ymd'),
                'bank_name' => 'SKOLADMIN',
                'amount_paid' => $amount_paid,
                'paid_date' => date('Y-m-d'),
                'transaction_description'=> 'Course Linking Done By Admin',
                'payment_mode' => 'offline',
                'payment_status' => $payment_status,
                'total_amount' => $total_amount,
                );
            $transaction_id = $this->payment_model->offline_payment($admin_transaction);
            if(isset($transaction_id)){
                log_message('debug','----- Transaction is completed . Now in Student Course Linking ------');
                $user_details   = $this->user_model->get_userid_details($user_id);
                $course_details = $this->resource_model->get_courses_details($course_id);
                $course_form['course_id']  = $course_details['course_id'];
                $course_form['course_fee'] = $course_details['course_fee'];
                $course_form['batch_name'] = $user_details['user_state'];
                $course_form['user_id']    = $user_details['user_id'];
                $course_form['transaction_id'] = $transaction_id;
                log_message('debug','-- Join Course Offline------------------------------------');
                log_message('debug','Course ID          :'.$course_form['course_id']);
                log_message('debug','Course Fee         :'.$course_form['course_fee']);
                log_message('debug','Course User ID     :'.$course_form['user_id']);
                log_message('debug','Course Batch_name  :'.$course_form['batch_name']);
                log_message('debug','----------------------------------------------------------');
                $result = $this->batch_model->join_course_offline($course_form);
                if($result != null){
                    echo "true";
                } else {
                    echo "false";
                }
            }
        }
    }

    // Action -> Un-Link User and Course
    public function unlink_user_course(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->input->post('user_id');
            $batch_id = $this->input->post('batch_id');
            $transaction_id = $this->input->post('transaction_id');
            // Delete Transcation From Payment Master
            // $result = $this->payment_model->delete_user_transcation($transaction_id);
            // log_message('debug','transaction deleted RES '.$result);
            // Delete Course Link From Batch Master
            $result = $this->batch_model->unlink_user_course($user_id,$batch_id);
            if(isset($result)){
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    // Action: Edit Student Registration in Admin side
    public function edit_student(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){

            log_message('debug','Registrar Update Student Reg Start');
            $user_details['user_fname']     = $this->input->post('user_fname');
            $user_details['user_mname']     = $this->input->post('user_mname');
            $user_details['user_lname']     = $this->input->post('user_lname');
            $user_details['user_phone']     = $this->input->post('user_phone');
            $user_details['user_address']   = $this->input->post('user_address');
            $user_details['user_city']      = $this->input->post('user_city');
            $user_details['user_country']   = $this->input->post('user_country');
            $user_details['pincode']        = $this->input->post('pincode');
            $user_details['user_id']        = $this->input->post('user_id');
            //Edit data in user_master table
            $result = $this->user_model->update_student_registration($user_details);
            log_message('debug',"Edit Student Reg result".$result);
            if($result ==1){
                echo "true";
            }else { echo "false"; }
        }
    }

    //Action:Edit Associate Registration Modal

    public function edit_associate_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                log_message('debug','******************  Edit Associate Modal REQ View START ******************');
                $user_id              = $this->input->post('user_id');
                $data['user_details'] = $this->user_model->get_userid_details($user_id);
               
               // $data['indian_state'] = $this->pincode_model->get_indian_states();            
                $this->load->view('registrar/edit_associate_modal',$data);
                log_message('debug','******************Edit Associate Modal REQ View ENDED ******************');    
            }
        }


    // Action: Edit Associate Registration in Admin side

    public function edit_associate(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){

            log_message('debug','Registrar Update Associate Reg Start');

            $user_details['user_fname']     = $this->input->post('user_fname');
            $user_details['user_mname']     = $this->input->post('user_mname');
            $user_details['user_lname']     = $this->input->post('user_lname');
            $user_details['user_phone']     = $this->input->post('user_phone');
            $user_details['user_address']   = $this->input->post('user_address');
            $user_details['user_city']      = $this->input->post('user_city');
            $user_details['user_country']   = $this->input->post('user_country');
            $user_details['pincode']        = $this->input->post('pincode');
            $user_details['user_id']        = $this->input->post('user_id');


            //Edit data in user_master table
            $result = $this->user_model->update_associate_registration($user_details);

            log_message('debug',"Edit Associate Reg result".$result);
            if($result ==1){
                echo "true";
            }else { echo "false"; }
        }
    }

    //------------------------------------------------------------------------------------------------------//


    //------------------------------------------------------------------------------------------------------//
    // Scholarship Management
    //------------------------------------------------------------------------------------------------------//
    // Displays the Scholarship Dashboard
    public function scholarship_dashboard(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $this->load->view('registrar/scholarship_dashboard');
        }
    }

    //Displays the List of all Scholarship entries
    public function all_scholarships(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $data['scholarship_students']=$this->payment_model->get_all_scholarships();
            $this->load->view('registrar/scholarship_students_list',$data);
        }
    }

    //Displays the list of not verified students
    public function not_verified_scholarships(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $data['scholarship_students']=$this->payment_model->get_not_verfied_students();
            $this->load->view('registrar/not_verified_scholarship_students',$data);
        }
    }

    // Gives the scholarship to student for a particular course
    public function give_scholarship(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $student_id = $this->input->post('student_id');
            $course_id = $this->input->post('course_id');
            $discount_amount = $this->input->post('discount_amount');
            $scholarship_applied = $this->payment_model->update_scholarship($student_id,$course_id,$discount_amount);
        }
    }

    // Rejects the Scholarship for the student
    public function reject_scholarship(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $student_id = $this->input->post('user_id');
            $course_id  = $this->input->post('course_id');

            $scholarship_rejected = $this->payment_model->update_scholarship($student_id,$course_id,0);
        }
    }
    //------------------------------------------------------------------------------------------------------//
    

    //------------------------------------------------------------------------------------------------------//
    // Orginization SPOC Quote Management 
    //------------------------------------------------------------------------------------------------------//
    // Action : Displays the SPOC Quote Dashboard
    public function spoc_quote_dashboard(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $this->load->view('registrar/spoc_quotes_dashboard');
        }
    }

    // Action : Displays the List of all SPOC Quote entries
    public function all_spoc_quotes(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            // $data['scholarship_students']=$this->payment_model->get_all_scholarships();
            $data['scholarship_students']=$this->payment_model->get_all_spoc_quotes();
            $this->load->view('registrar/spoc_quotes_list',$data);
        }
    }

    // Action : Displays the list of not verified SPOC Quote
    public function not_verified_spoc_quotes(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            // $data['scholarship_students']=$this->payment_model->get_not_verfied_students();
            $data['scholarship_students']=$this->payment_model->get_not_verified_spoc_quotes();
            $this->load->view('registrar/not_verified_spoc_quotes',$data);
        }
    }

    // Action : Gives the SPOC Quote for perticular Area of Interest
    public function give_spoc_quote(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $user_id    = $this->input->post('user_id');
            $subject_id = $this->input->post('subject_id');
            $discount_amount    = $this->input->post('discount_amount');
            $spoc_quote_result = $this->payment_model->update_spoc_quote($user_id,$subject_id,$discount_amount);
            // Make SPOC Quote Paid and link AOI
            $user_details = $this->user_model->get_userid_details($user_id);
            $subject_details = $this->resource_model->get_subject_details($subject_id);
            $status = $this->make_spoc_quote_pay_and_link($user_details,$subject_details,$discount_amount);
        }
    }

    // Action : Approve the SPOC Transcation & Create link with SPOC and Area of Intrest and make paid
    public function make_spoc_quote_pay_and_link($user_details,$subject_details,$discount_amount){
        // Create Transcation 
        log_message('debug','Processing : SPOC Transcation ................');
        $subject_transaction = array(
                'user_id'                   => $user_details['user_id'],
                'transaction_number'        => $user_details['registration_no'],
                'bank_name'                 => 'ASK Analytics TR',
                'amount_paid'               => $discount_amount,
                'paid_date'                 => date('Y-m-d'),
                'transaction_description'   => 'Admin SPOC Registration for '.$subject_details['subject_name'],
                'payment_mode'              => 'offline',
                'payment_status'            => '2', // Note: 8-pending payment | 2-paid
                'total_amount'              => $subject_details['subject_fee'],
        );
        $transaction_id = $this->payment_model->offline_payment($subject_transaction);
        // Create Link Between SPOC and 
        log_message('debug','Linking : SPOC with Area of Intrest ...........');
        $associate_subject = array(
            'user_id'        => $user_details['user_id'],
            'subject_name'   => $subject_details['subject_name'],
            'subject_fee'    => $discount_amount,
            'transaction_id' => $transaction_id      
        );
        $result = $this->batch_model->subscribe_subject($associate_subject);
        if(isset($result)){
            return true;
        } else {
            return false;
        }
    }

    // Rejects the SPOC Quote for perticular Area of Interest
    public function reject_spoc_quote(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $user_id            = $this->input->post('user_id');
            $subject_id         = $this->input->post('subject_id');
            $spoc_quote_status = $this->payment_model->update_spoc_quote($user_id,$subject_id,0);
        }
    }
    //------------------------------------------------------------------------------------------------------//




}
