<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrar_Controller extends RR_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('register_model');
        $this->load->model('batch_model');
        $this->load->model('payment_model');
        $this->load->model('pincode_model');
        $this->load->model('resource_model');
        $this->load->model('sendemail_model');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        $data['flash_msg'] = $this->session->flashdata('success_msg');
        $data['user_home'] = "/registrar_home";
        $data['role_view'] = "/registrar/registrar_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        $this->load->view('user_footer');
        log_message('debug', 'Registrar home');
    }

    //---------------------------------------------------------------------------------------//
    // Dashboard Management 
    //---------------------------------------------------------------------------------------//
    public function dashboard(){
        if($this->input->server('REQUEST_METHOD') == 'GET') {
                $data['user_details']    = $this->session->all_userdata();
                $data['students_count']  = $this->user_model->get_user_count(1);
                $data['parent_count']    = $this->user_model->get_user_count(2);
                $data['affilate_count']  = $this->user_model->get_user_count(9);
                $data['associate_count'] = $this->user_model->get_user_count(3);
                $this->load->view('registrar/registrar_dashboard',$data);
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
    

    // Action : Deletes the not verified users 
    public function delete_notverified_user(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $user_id = $this->input->post('user_id');
            $result  = $this->user_model->delete_user($user_id);
            if ($result == 1) {
                echo "true";
                log_message('debug','Ok %%%%%%%%%%%%%%%%%%%%');
            }else{
                echo "false";
                log_message('debug','Fail ^^^^^^^^^^^^^^^^^^^');
            }
        }
    }

    // // DRY CODE: Action : Delete Unverified User
    // public function delete_unverified_user(){
    //         log_message("debug",'HHHHHHHHHHHHHH');
    //     // if($this->input->server('REQUEST_METHOD') == 'POST'){
    //     //     $user_id   = $this->input->post('user_id');
    //         $result    = $this->user_model->delete_user($user_id);
    //         if($result == 1) {
            
    //             log_message('debug','User ID: '.$user_id.' Has Deleted: Success');
    //             echo "true";  
    //         } else {
    //             log_message('debug','User ID: '.$user_id.' Has Deleted: Failed');
    //             echo "false";
    //         } 
    //     // }
    // }



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
            $this->load->view('registrar/students_dashboard');
        }
    }

    // Action->Load Add Student Modal view
    public function add_student_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','****************** AHR controller Add Student Modal REQ View START ******************');
            $this->load->view('registrar/add_student_modal');
            // $this->load->view('registrar/add_user_modal');
            log_message('debug','****************** AHR controller Add Student Modal REQ View ENDED ******************');    
        }
    }

    // Action : Students List
    public function students_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_details']     = $this->session->all_userdata();
            $data['students_details'] = $this->user_model->get_users_list_view(1);
            $this->load->view('registrar/students_list',$data);
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

    //  Action : User Course link
    public function mentor_course_link(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_role = 6; // student
            // $data['students_details'] = $this->user_model->user_course_link_view($user_role);
            //get_director_group_concat_list
            // $this->load->view('registrar/mentor_course_link',$data);

            $data['mentor_details'] = $this->user_model->mentor_course_link_view($user_role);
            $this->load->view('registrar/mentor_course_link',$data);
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
    
    // Action->Load link Course Modal view
    public function link_course_sme_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','****************** AHR controller Add course link Modal REQ View START ******************');
            $this->load->view('registrar/link_course_sme_modal');
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

    // Action : Check User Email Exist and Email Verified Please Chenge it to Mentor
    public function isThisMentorExists(){
        log_message('debug','icame here ');
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug',$this->input->post('search_user_email'));
            $user_email = $this->input->post('search_user_email');
            //$result = $this->register_model->forgot_email_check($user_email);
            $result = $this->register_model->isThisSmeExists($user_email);
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

    //Action: student record search function
    public function mentor_record_search(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $search_query = $this->input->post('search_user_email');
            $user = $this->user_model->get_mentor_record($search_query);
            $courses = $this->user_model->get_student_course();
            if(isset($user)){
                foreach($courses as $key => $course){
                    $get_mentor = $this->user_model->get_mentor_mapped_course($user[0]['user_id'],$course['course_id']);
                    if($get_mentor){
                        unset($courses[$key]);
                        log_message('debug','mapped 111',print_r($course['course_id'],true));
                     }
                     else{
                        // log_message('debug','not mapped',$course['course_id']);  
                     }
                }    
                $data['course_list'] = $courses;  
                    log_message('debug','*******************############'.print_r($courses,true));
                $data['mentor_details'] = $user;
                $this->load->view('registrar/mentor_course_link_view',$data);      
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

    // Action : Link Mentor with Coruse 
    public function link_mentor_with_course(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id      = $this->input->post('user_id');
            $course_id    = $this->input->post('course_id');
            $course_details = $this->resource_model->get_courses_details($course_id); 
         
            $user_details   = $this->user_model->get_userid_details($user_id);
            $mentor_course_data['course_id']  = $course_details['course_id'];
            $mentor_course_data['user_id']    = $user_details['user_id'];
            log_message('debug','-- Join Course Offline------------------------------------');
            log_message('debug','Course ID          :'.$mentor_course_data['course_id']);
            log_message('debug','Mentor User ID     :'.$mentor_course_data['user_id']);
            log_message('debug','----------------------------------------------------------');
            $result = $this->register_model->mentor_course_link($mentor_course_data);
            if($result != null){
                echo "true";
            } else {
                echo "false";
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

    // Action -> Un-Link User and Course
    public function unlink_mentor_course(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->input->post('user_id');
            $map_id  = $this->input->post('map_id');
            // Delete Transcation From Payment Master
            // $result = $this->payment_model->delete_user_transcation($transaction_id);
            // log_message('debug','transaction deleted RES '.$result);
            // Delete Course Link From Batch Master
            $result = $this->batch_model->unlink_mentor_course($user_id,$map_id);
            if(isset($result)){
                echo "true";
            } else {
                echo "false"; 
            }
        }
    }

    //Action:Edit Student Registration Modal

    public function edit_student_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                log_message('debug','******************  Edit student Modal REQ View START ******************');
                $user_id              = $this->input->post('user_id');

                $data['user_details'] = $this->user_model->get_userid_details($user_id);
               
               // $data['indian_state'] = $this->pincode_model->get_indian_states();            
                $this->load->view('registrar/edit_student_modal',$data);
                log_message('debug','******************Edit student Modal REQ View ENDED ******************');    
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
            $user_details['user_state']     = $this->input->post('user_state');
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
            $user_details['user_state']     = $this->input->post('user_state');
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
            log_message('debug'," Discount Amount ????????? ".$discount_amount." ");
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
        if($this->input->server('REQUEST_METHOD') == "POST"){
            $user_id         = $this->input->post('user_id');
            $subject_id      = $this->input->post('subject_id');
            $license_count   = $this->input->post('license_count');
            $discount_amount = $this->input->post('discount_amount');
            log_message('debug','................License Count '.$license_count);

            // update table with license count
            $spoc_quote_result = $this->payment_model->update_spoc_quote($user_id,$subject_id,$discount_amount,$license_count);
            log_message('debug','................ '.print_r($spoc_quote_result,true));
            
            // make Transaction 
            // Create Transcation 
            $subject_transaction = array(
                    'user_id'                 => $user_id,
                    'transaction_number'      => $spoc_quote_result['registration_no'],
                    'bank_name'               => 'ASK Analytics TR',
                    'amount_paid'             => $discount_amount,
                    'paid_date'               => date('Y-m-d'),
                    'transaction_description' => 'Admin SPOC Registration for '.$spoc_quote_result['subject_name'].' of '.$spoc_quote_result['no_of_license'].' License.',
                    'payment_mode'            => 'offline',
                    'payment_status'          => '2', // Note: 8-pending payment | 2-paid
                    'total_amount'            => $spoc_quote_result['subject_fee']
            );
            $transaction_id = $this->payment_model->offline_payment($subject_transaction); 
            log_message('debug','Processing : SPOC Transcation SPOC .......... '.print_r($transaction_id,true));
            
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
                'total_amount'              => $subject_details['subject_fee']
        );
        $transaction_id = $this->payment_model->offline_payment($subject_transaction);
        // Create Link Between SPOC and 
        log_message('debug','Linking : SPOC with Area of Intrest ...........'.print_r($user_details,true));
        log_message('debug','Subject Transaction ...........> '.print_r($subject_transaction,true));
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

    // Delete SPOC Quote
    public function delete_spoc_quote(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $user_id      = $this->input->post('user_id');
            $quote_id     = $this->input->post('quote_id');
            $subject_name = $this->input->post('subject_name');

            log_message('debug','SPOC Quote with quote_id:'.$quote_id.' and User_id:'.$user_id.' deletion Started');
            $quote_status = $this->payment_model->remove_aoi($quote_id);
            if(isset($quote_status)){
                // $asm_res = $this->payment_model->delete_spoc_aoi_map($user_id,$subject_name);
                // log_message('debug','SPOC Quote Deleted Successfully .'.$asm_res);
                log_message('debug','SPOC Quote Deleted Successfully .');
                echo "true";
            } else {
                log_message('debug','SPOC Quote Deletion Faild .');
                echo "false";
            }
        }
    }
    //------------------------------------------------------------------------------------------------------//


    //------------------------------------------------------------------------------------------------------// 
    // Action : User Registration With out File Upload
    //------------------------------------------------------------------------------------------------------// 
    public function register_any_user() {
        if($this->input->server('REQUEST_METHOD')=='GET'){
            // load registration form 
        }

        if($this->input->server('REQUEST_METHOD')=='POST'){
            // Get inputs form the form 
            // Getting User Details 
            $new_user = array();
            $new_user['first_name']     = $this->input->post('first_name');
            $new_user['last_name']      = $this->input->post('last_name');
            $new_user['middle_name']    = $this->input->post('middle_name');
            $new_user['user_email']     = $this->input->post('email');
            $new_user['user_phone']     = $this->input->post('phone');
            $new_user['user_address']   = $this->input->post('address');
            $new_user['user_city']      = $this->input->post('city');
            $new_user['user_state']     = $this->input->post('state');
            $new_user['user_country']   = $this->input->post('country');
            $new_user['user_pincode']   = $this->input->post('pincode');
            $new_user['user_role']      = $this->input->post('user_role');  // Which Role Want to Be Created
            // Getting PinCode and District
            $res = $this->pincode_model->getPincode($new_user['user_pincode']);
            if($res != null){
                $new_user['user_district']  =$res['district_name'];
            } else {
                $new_user['user_district']  ='District';
            }
            $new_user['user_photo'] = "default_photo.png";
            log_message('debug','New User Registration With out Photo');
            //Create User
            switch ($new_user['user_role']) {
                case '1':
                    // User Registration Not Used
                    log_message('debug','>>> User Registration Started ');
                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' User Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);
                    break;
                case '2':
                    // Parent Registration Not Used
                    log_message('debug','>>> Parent Registration Started ');
                    break;
                case '3':
                    // SPOC Registration Not Used
                    log_message('debug','>>> SPOC Registration Started ');
                    // Getting Additional Details 
                    $spoc_details['organization_name']     = $this->input->post('organization_name');
                    $spoc_details['student_count']         = $this->input->post('student_count');
                    $spoc_details['letter_of_intent']      = $this->input->post('letter_of_intent');

                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' SPOC Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // Save SPOC Details in SPOC Details Master
                    $this->register_model->save_associate_details($spoc_details,$new_uid);
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);

                    break;
                case '4':
                    // Registrar Registration Not Used
                    log_message('debug','>>> Registrar Registration Started ');
                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' Employee Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);                
                    break;
                case '5':
                    // Accountant Registration Not Used
                    log_message('debug','>>> Accountant Registration Started ');
                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' Employee Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);
                    break;
                case '6':
                    // Mentor/SME Registration Not Used
                    log_message('debug','>>> Mentor/SME Registration Started ');  
                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' Mentor/SME Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    // Save Director Details in Content Director map Master
                    $director_uid  = $new_uid;
                    // $subject_id    = $this->input->post('subject_id');
                    // Getting Additional Details 
                    $selected_hidden = $this->input->post('selected_hidden');
                    $test   = explode(",", $selected_hidden);
                    $length = count($test);
                    // Save Director Details in Content Director map Master
                    for ($i=0; $i<$length; $i++) { 
                        $director_data = $this->register_model->map_director_subject($director_uid,$test[$i]);
                        log_message('debug','>>> Mentor/SME id :'.$director_uid.' subject_id:'.$test[$i]);
                        log_message('debug','>>> Mentor/SME DB Status :'.$director_data);
                    }
                    // $director_data = $this->register_model->map_director_subject($director_uid,$subject_id);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);              
                    break;
                case '7':
                    // SuperAdmin Registration Not Used
                    log_message('debug','>>> SuperAdmin Registration Started ');
                    break;
                case '8':
                    // ContentAdmin Registration Not Used
                    log_message('debug','>>> ContentAdmin Registration Started ');
                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' User Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);
                    break;
                case '9':
                    // Affilate Registration Not Used
                    log_message('debug','>>> Affilate Registration Started ');
                    $new_res = $this->add_new_user($new_user, $new_user['user_role']);
                    $new_uid = $new_res['user_id'];
                    $new_ack = $new_res['passwd_token'];
                    $email_subject = PRODUCT_NAME.' Affiliate Registration ';
                    $user_message_body = 'Dear '.$new_user['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$new_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                    // $this->sendemail_model->set_send_email($new_user['user_email'],$email_subject,$user_message_body);
                    $this->send_mail($new_user['user_email'],$new_user['first_name'],$new_ack);                
                    break;
                default:
                    // UNknown User Role 
                    log_message('debug','UNknown User Role');
                    break;
            }
            redirect('/login');
        }
    }

    // Action -> Add New User
    private function add_new_user($input_array,$user_type) {
        $result = array();
        $activation_code = md5(uniqid($input_array['user_email'].time()));
        // Do DB Call To Get MAX Count of user ID 
        //$max_user_count = $this->user_model->get_user_count($user_type); 
        //$reg_id       = str_pad( $max_user_count+1, 4, '0', STR_PAD_LEFT); // output: 0001
        // Generating Temp REG Code
        switch ($user_type) {
            case '1':
                $usertype = 'User';
                $input_array['registration_no'] = "TUT".date('YmdHis');
                break;
            case '2':
                $usertype = 'Parent';
                $input_array['registration_no'] = "TPR".date('YmdHis');
                break;
            case '3':
                $usertype = 'SPOC'; 
                $input_array['registration_no'] = "TSP".date('YmdHis');
                break;
            case '4':
                $usertype = 'Registrar';
                $input_array['registration_no'] = "TRA".date('YmdHis');
                break;
            case '5':
                $usertype = 'Accountant';
                $input_array['registration_no'] = "TAC".date('YmdHis');
                break;
            case '6':
                $usertype = 'Mentor/SME';
                $input_array['registration_no'] = "TMS".date('YmdHis');
                break;
            case '7':
                $usertype = 'SuperAdmin';
                $input_array['registration_no'] = "TSA".date('YmdHis');
                break;
            case '8':
                $usertype = 'ContentAdmin';
                $input_array['registration_no'] = "TAD".date('YmdHis');
                break;
            case '9':
                $usertype = 'Affiliate';
                $input_array['registration_no'] = "TAF".date('YmdHis');
                break;
            default:
                redirect('/previlege_error');
                break;
        }

        log_message('debug',"***************************************************************");
        log_message('debug',"| ADD NEW USER   =>  ".$usertype." Details                    |");
        log_message('debug',"***************************************************************");
        log_message('debug',"| ".$usertype." fname = ".$input_array['first_name']);
        log_message('debug',"| ".$usertype." lname = ".$input_array['last_name']);
        log_message('debug',"| ".$usertype." mname = ".$input_array['middle_name']);
        log_message('debug',"| ".$usertype." email = ".$input_array['user_email']);
        log_message('debug',"| ".$usertype." phone = ".$input_array['user_phone']);
        log_message('debug',"| Address      = ".$input_array['user_address']);
        log_message('debug',"| City         = ".$input_array['user_city']);
        log_message('debug',"| State        = ".$input_array['user_state']);
        log_message('debug',"| country      = ".$input_array['user_country']);
        log_message('debug',"| Pincode      = ".$input_array['user_pincode']);
        log_message('debug',"***************************************************************");
        // Creating New User
        $res = $this->register_model->create_user($input_array,$user_type,$activation_code);
        if ($res > 0) {
            $result['passwd_token'] = $activation_code;
            $result['user_id'] = $res;
            // Get Session Data How This user Enrolles 
            $Suser_id      = $this->session->userdata('user_id');
            $Suser_details = $this->user_model->get_userid_status_details($Suser_id);
            $Suser_role    = $Suser_details['role_name'];
            log_message('debug','>>> Suser_id '.$Suser_id);
            log_message('debug','>>> Suser_name '.$Suser_role);
            if($Suser_id != null) {
                $this->register_model->new_user_enrollment($Suser_id,$res);
            } else {
                $Suser_id = 1; // Default Enrolled by Admin / Online / Direct
                $Suser_role = "Online/Direct"; 
                $this->register_model->new_user_enrollment($Suser_id,$res);
            }
            log_message('debug',"***************************************************************");         
            log_message('debug','>>> NEW USER CREATED >>>');
            log_message('debug','>>> User ID       :'.$res);
            log_message('debug','>>> passwd_token  :'.$activation_code);
            log_message('debug','>>> User Enrolled :'.$Suser_id);
            log_message('debug','>>> Enrolled By   :'.$Suser_role);
            log_message('debug',"***************************************************************");
            return $result;
        } else {
            log_message('debug',"***************************************************************");         
            log_message('debug','>>> USER Creation Failed >>>');
            log_message('debug',"***************************************************************");
            return false;
        }
    }

    //  Send Email Function After User Creation
    private function send_mail($email,$user_name,$activation_code){
        log_message('debug','Sending Email to '.$email.' user name '.$user_name);
        $encrypted_string = $activation_code;
        $address          = $email;
        $time             = date('Y-m-d H:i:s');
        $configs          = array(
                            'protocol'  =>  EMAIL_PROTOCOL,
                            'smtp_host' =>  EMAIL_HOST,
                            'smtp_user' =>  EMAIL_USERID,
                            'smtp_pass' =>  EMAIL_PASSWD,
                            'smtp_port' =>  EMAIL_PORT,
                            'mailtype'  =>  'html',
                            'charset'   =>  'iso-8859-1',
                            'wordwrap'  =>  TRUE
                            );
        $this->load->library('email',$configs);
        $this->email->set_newline("\r\n");
        $message_body = 'Dear '.$user_name.', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$encrypted_string.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
        $this->email->to($address);
        $this->email->from(EMAIL_USERID);
        $this->email->subject(PRODUCT_NAME);
        $this->email->message($message_body);
        if(!$this->email->send()){
            log_message('debug',"Send Mail Error : \n".$this->email->print_debugger());
        } else {
            log_message('debug',"Email Sent Successfully !");
        }
    }

    
    // --------------------------------------------------------------------------------------//


    //---------------------------------------------------------------------------------------//
    // Affilate Role Management
    //---------------------------------------------------------------------------------------//
    // Action : Open Affilate Dashboard
    public function affilates_dashboard(){
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            //$data['associate_details'] = $this->user_modal->get_all_associates();
            $this->load->view('registrar/affilates_dashboard');
        }
    }

    // Action : Get Affilates List
    public function affilates_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_details']      = $this->session->all_userdata();
            $data['affilates_details'] = $this->user_model->get_users_list_view(9);
            $this->load->view('registrar/affilates_list',$data);
        }
    }

    // Action : Get This Affilate Users List To Display in Admin  
    public function load_affilate_users_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $affilate_id  = $this->input->post('affilate_id');
            $data['user_details']        = $this->user_model->get_userid_details($affilate_id);
            $data['affilate_users_list'] = $this->user_model->get_affilate_users_list_view($affilate_id,1);  // Brings only users list enrolled by that affialte
            $this->load->view('registrar/affilate_users_list',$data);
        }
    }

    // Action->Load Add Affilate Modal view
    public function add_affilate_modal(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','****************** AHR controller Add Affilate Modal REQ View START ******************');
            // $this->load->view('registrar/add_student_modal');
            $this->load->view('registrar/add_affilate_modal');
            log_message('debug','****************** AHR controller Add Affilate Modal REQ View ENDED ******************');    
        }
    }
    //---------------------------------------------------------------------------------------//

}
