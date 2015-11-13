<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PAYMENT_Controller extends Common_Controller {    
    public function __construct(){
    	parent::__construct();
        $this->load->model('user_model');
        $this->load->model('payment_model');
        $this->load->model('resource_model');
        $this->load->model('batch_model');
        $this->load->model('register_model');
        $this->load->model('pincode_model');
        $this->load->model('sendemail_model');
        $this->load->model('coupon_model');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        // $data['load_view'] = $this->session->flashdata('load_view');
        // $data['user_home'] = "/accountant_home";
        // $data['role_view'] = "/accountant/accountant_body_leftpan";
        // $this->load->view('user_header',$data);
        // $this->load->view('user_body_leftpan');
        // $this->load->view('user_body_rightpan');
        // $this->load->view('user_footer');
        log_message('debug', 'Payment home');
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


     function offline_payment(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $promo_code = $this->input->post('promo_code');
            $this->session->set_userdata('promo_code',$promo_code);
            $this->load->view('payment/offline_payment');
        }        
    }


    public function offline_payment_transaction(){
       // log_message('debug','***************In Subject registration Controller');
        if($this->input->server('REQUEST_METHOD') == 'POST'){
       //     log_message('debug','***************In POST of Subject registration Controller');
            $user_id  = $this->session->userdata('user_id');
            $user_name = $this->session->userdata('user_name');
            // $transaction
            $offline_payment_for = $this->session->userdata('offline_payment_for');
            log_message('debug','****_------****** Offline payment for '.$offline_payment_for);
            $transaction_number = $this->input->post('transaction_number');
            $bank_name = $this->input->post('bank_name');
            $amount_paid = $this->input->post('amount_paid');
            $paid_date = $this->input->post('paid_date');
            $total_amount = $this->session->userdata('total_amount');
            $transaction_description = '';
            if($offline_payment_for == "associate_subject_subscription"){
                $length = $this->session->userdata('no_of_subjects');
                $subjects = $this->session->userdata('subjects');
                if ($length >0){
                    $transaction_description = $subjects[0];
                }
                for ($i=1;$i<$length;$i++){
                    $transaction_description = $transaction_description." - ".$subjects[$i];
                }
                log_message('debug','************Transaction description is '.$transaction_description);
            }else if($offline_payment_for == "student_course_subscription"){
                $transaction_description = $this->session->userdata('course_name');
                log_message('debug','********************Transaction description is '.$transaction_description);
            }else if($offline_payment_for == "student_bulk_upload"){
                $no_of_students = $this->session->userdata('no_of_students');
                $transaction_description = "Student Bulk Uploaded =>".$no_of_students;
                log_message('debug','********Transaction description is '.$transaction_description);
            }           
            $subject_transaction = array(
                'user_id' => $user_id,
                'transaction_number' => $transaction_number,
                'bank_name' => $bank_name,
                'amount_paid' => $amount_paid,
                'paid_date' => $paid_date,
                'transaction_description'=> $transaction_description,
                'payment_mode' => 'offline',
                'payment_status' => '8',
                'total_amount' => $total_amount,
            );
            $transaction_id = $this->payment_model->offline_payment($subject_transaction);
            log_message('debug','The transaction_id is '.$transaction_id);
            if($transaction_id){
                // If coupon code is applied,Update the data
                $promo_code = $this->session->userdata('promo_code');
                log_message('debug','###########Promo code in Payment Controler '.$promo_code);
                if($promo_code!=null){
                    $this->coupon_model->update_couponcode($user_id,$promo_code);
                }
                if($offline_payment_for == "associate_subject_subscription"){

                    log_message('debug','**********************Transaction is completed . Now in Associate Subject Subscription ************');
                    $length = $this->session->userdata('no_of_subjects');
                    $subjects = $this->session->userdata('subjects');
                    $amount = $this->session->userdata('amount');               
                    for ($i=0;$i<$length;$i++){
                        $associate_subject = array(
                            'user_id' => $user_id,
                            'subject_name' => $subjects[$i],
                            'subject_fee'  => $amount[$i],
                            'transaction_id'=> $transaction_id
                        );
                        $result = $this->batch_model->subscribe_subject($associate_subject);
                    }
                    echo "true";
                }else if($offline_payment_for == "student_course_subscription"){

                    log_message('debug','Transaction is completed . Now in Student Course Subscription ************');
                    $user_details              = $this->session->all_userdata();
                    $course_form['course_id']  = $this->session->userdata('course_id');
                    $course_form['course_fee'] = $this->session->userdata('course_fee');
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

                }else if($offline_payment_for == "student_bulk_upload"){

                        $user_id = $this->session->userdata('user_id');
                        $user_email = $this->session->userdata('user_email');
                        $unpaid_students   = $this->batch_model->get_associate_unpaid_student($user_id);
                        // log_message('debug','The students are '.$unpaid_students);
                        $associate_data = $this->register_model->get_details($user_email);
                        $associate_city = $associate_data['user_city'];
                        $associate_state = $associate_data['user_state'];
                        $associate_country = $associate_data['user_country'];
                        $associate_pincode = $associate_data['user_pin'];
                        $count = 0;
                        foreach($unpaid_students as $student){
                            $count = $count+1;
                            log_message('debug','**********Details of '.$count);
                           
                            $this->batch_model->set_transaction_id($student->id,$transaction_id);
                            
                            $student_details = array();
                            $student_details['first_name']      = $student->first_name;
                            $student_details['last_name']       = $student->last_name;
                            $student_details['middle_name']     = '';
                            $student_details['user_email']      = $student->email;
                            $student_details['user_phone']      = $student->mobile;
                            $student_details['user_photo']      = '';
                            $student_details['user_address']    = $student->address;
                            $student_details['user_city']       = $associate_city;
                            $student_details['user_state']      = $associate_state;
                            $student_details['user_country']    = $associate_country;
                            $student_details['user_pincode']    = $associate_pincode;
                            $res = $this->pincode_model->getPincode($student_details['user_pincode']);
                            if($res != null){
                                $student_details['user_district']=$res['district_name'];
                            }
                            else{
                                $student_details['user_district']='District';
                            }
                            log_message('debug','Student details are captured');
                            $parent_details = array();
                            $parent_details['first_name']       = $student->parent_name;
                            $parent_details['last_name']        = '';
                            $parent_details['middle_name']      = '';
                            $parent_details['user_email']       = '';
                            $parent_details['user_phone']       = $student->mobile;
                            $parent_details['user_address']     = $student->address;
                            $parent_details['user_city']        = $associate_city;
                            $parent_details['user_state']       = $associate_state;
                            $parent_details['user_country']     = $associate_country;
                            $parent_details['user_pincode']     = $associate_pincode;
                            if($res != null){
                                $parent_details['user_district']=$res['district_name'];
                            }
                            else{
                                $parent_details['user_district']='District';
                            }
                            log_message('debug','Parent details are captured');

                            $student_details['user_photo'] = "default_photo.png";

                            // check if student exists usk
                            $student_email = $student_details['user_email'];
                            $student_registration_status = $this->register_model->get_details($student_email);

                            if($student_registration_status == false) {
                                log_message('debug','Student : '.$student_email.' User Does Not Exists Now Going to Be Created !');
                                // Create Student           
                                $user_type = 1;
                                $std_res = $this->add_new_user($student_details, $user_type,$count);
                                $std_uid = $std_res['user_id'];
                                $std_ack = $std_res['passwd_token'];
                                log_message('debug','Student Id is'.$std_uid);

                                // Create Parent
                                $user_type = 2;
                                $parent_email_status=false;
                                // -- Disabling parent 
                                /*
                                $parent_details['user_photo'] = 'default_photo.png';
                                $res = $this->register_model->get_details($parent_details['user_email']);
                                if($res != null && $res['user_role'] == 2) {
                                    // Parent already Exist so maping child with parent
                                    $parent_uid = $res['user_id'];
                                    log_message('debug','Parent Already Exist !');
                                    // Create Parent map 
                                    $this->register_model->map_student_parent($std_uid,$parent_uid);
                                    // Send Verification link to Parent
                                    // $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);                   
                                } else if ($res != null) {
                                    // Some other user exist
                                    log_message('debug','Parent email exist in user role ='.$res["user_role"]);
                                } else {
                                    if($parent_details['user_email'] != null){
                                        $parent_res = $this->add_new_user($parent_details, $user_type,$count);
                                        $parent_uid = $parent_res['user_id'];
                                        $parent_ack = $parent_res['passwd_token'];
                                        // Create Parent map 
                                        $res = $this->register_model->map_student_parent($std_uid,$parent_uid);
                                        $parent_email_status=true;
                                        log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
                                    } else {
                                        $parent_details['user_email'] = $parent_details['first_name'].date("YmdHis")."".$count."@ask_analytics.com";
                                        $parent_res = $this->add_new_user($parent_details, $user_type,$count);
                                        $parent_uid = $parent_res['user_id'];
                                        $parent_ack = $parent_res['passwd_token'];
                                        // Create Parent map 
                                        $res = $this->register_model->map_student_parent($std_uid,$parent_uid);
                                        $parent_email_status=false;
                                        log_message('debug',"MAP Created bteween Student id:".$std_uid." Parent ID:".$parent_uid." Result:".$res);
                                    }
                                }
                                // -- Disabling parent 
                                */
                                //Email Config's
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

                                $email_subject = 'Welcome to '.PRODUCT_NAME;
                                // Send Verification link to Student

                                $student_message_body = 'Dear '.$student_details['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$std_ack.'">Click to verify</a></h3><br><br>Thank you<br>SKOL System<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                                $this->sendemail_model->set_send_email($student_details['user_email'],$email_subject,$student_message_body);

                                // $this->send_mail($student_details['user_email'],$student_details['first_name'],$std_ack);
                                
                                // Send Verification link to Parent
                                if($parent_email_status == true) {
                                    // log_message('debug','Parent Email Sending .. Bock');
                                    $student_message_body = 'Dear '.$parent_details['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$parent_ack.'">Click to verify</a></h3><br><br>Thank you<br>SKOL System<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                                    $this->sendemail_model->set_send_email($parent_details['user_email'],$email_subject,$student_message_body);
                                    // $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);          
                                }
                            } else {
                                log_message('debug','Student : '.$student_email.' User Already Exists >> Moving To Course Subscription  !');
                            } // end of if
                            
                            $student_course = $student->course; // Getting Course Name From Array
                            $student_course_subscription = $this->register_model->is_student_course_details_exists($student_email,$student_course); // Checking for user_email and Course name
                            $student_details = $this->user_model->get_user_details($student_email); // Getting student email details
                            $student_id = $student_details['user_id']; // Getting student user_id
                            // continue from here 
                            if($student_course_subscription == null){
                                /*------------ Adding Students to batch in associate bulk upload ------------ */
                                $course_name = $student->course;
                                $course = $this->resource_model->get_course_id($course_name);
                                log_message('debug','course resutl '.var_dump($course));
                                $course_id = $course['course_id']; //please get dynamically

                                // Please Add Course Fee for the course 
                                $batch_data = array(
                                            'batch_name'    => $associate_state,
                                            'user_id'       => $student_id,
                                            'course_id'     => $course_id,
                                            'batch_type'    => 'Associate',
                                            'associate_id'  => $user_id,
                                            'course_fee'    => $student->cost,
                                            'transaction_id'=> $transaction_id
                                            );
                                log_message('debug','Student : '.$student_email.' Course Name : '.$course_name.' Course Subscription Done');
                                $this->batch_model->add_student_to_batch($batch_data);
                            } else {
                                log_message('debug','Student : '.$student_email.' Course Name : '.$course_name.' Already Exists');
                            }

                        }   
                    echo "true";
                   }
                }
         }else{
            log_message('debug','**********Please send POST request');
         }
    }

    //Action : SKOL joining Fee payment by Associate
    function associate_subject_summery(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){

            $user_fname      = $this->input->post('user_fname');
            $subject         = $this->input->post('subject');
            $discount_amount = $this->input->post('discount_amount');
            
            log_message('debug','<<<<<<<<<<<<<<<<<<<< >>>>>>>>>>>>>>>>>>>'.$user_fname.' Subject '.$subject.' Amount '.$discount_amount);
            $data['user_details'] = $this->session->all_userdata();

            $user_id    = $this->session->userdata('user_id');
            // $amount     = $this->input->post('cost');
            // $length     = sizeof($subjects);
            // $total_amount = $this->input->post('total_amount');
            $this->session->set_userdata('subject',$subject);
            $this->session->set_userdata('discount_amount',$discount_amount);
            // $this->session->set_userdata('no_of_subjects',$length);
            // $this->session->set_userdata('offline_payment_for','associate_subject_subscription');
            // $this->session->set_userdata('total_amount',$total_amount);

            $data['subject_registration'] = True;
            $data['user_fname'] = $user_fname;
            $data['discount_amount'] = $discount_amount;
            $data['subject'] = $subject;
            // $data['length'] = $length;
            // $data['total_amount'] = $total_amount;

            $user_email = $this->session->userdata('user_email');
            $data['user_email'] = $user_email;
            $associate_data = $this->register_model->get_details($user_email);
            $data['user_address'] = $associate_data['user_address'];
            $data['associate_name'] = $this->session->userdata('user_fname');
            // $data['user_address'] = $this->session->userdata('user_address');
            // $user_id = $this->session->userdata('user_id');
            // $data['user_details'] = $this->batch_model->get_paid_student($user_id);
            
            $this->load->view('payment/summery_view',$data);

            /*
            $data['user_details'] = $this->session->all_userdata();
            $user_id    = $this->session->userdata('user_id');
            $amount     = $this->input->post('cost');
            $subjects   = $this->input->post('subjects');
            $length     = sizeof($subjects);
            $total_amount = $this->input->post('total_amount');
            $this->session->set_userdata('subjects',$subjects);
            $this->session->set_userdata('amount',$amount);
            $this->session->set_userdata('no_of_subjects',$length);
            $this->session->set_userdata('offline_payment_for','associate_subject_subscription');
            $this->session->set_userdata('total_amount',$total_amount);
            // log_message('debug','Amount is >>>>>>>>>>>>> '.var_dump($amount));
            
            $data['subject_registration'] = True;
            $data['amount'] = $amount;
            $data['subjects'] = $subjects;
            $data['length'] = $length;
            $data['total_amount'] = $total_amount;
            
            $user_email = $this->session->userdata('user_email');
            $data['user_email'] = $user_email;
            $associate_data = $this->register_model->get_details($user_email);
            $data['user_address'] = $associate_data['user_address'];
            $data['associate_name'] = $this->session->userdata('user_fname');
            // log_message('debug','Qutation Details Find Here >>>>>>>>>>>>>>>>>>> '." uesr_id : ".$user_id." Amount : ".var_dump($amount));
            // log_message('debug','Qutation Subject Find Here >>>>>>>>>>>>>>>>>>> '." Subjects : ".var_dump($subjects));

            
            $data['user_address'] = $this->session->userdata('user_address');
            $user_id = $this->session->userdata('user_id');
            $data['user_details'] = $this->batch_model->get_paid_student($user_id);
            
            // saving data into area_of_interest table.
            $request_quote = $this->register_model->save_request_quote();

            // dont load summery_view page 
            $this->load->view('payment/summery_view',$data);
            */
        }
    }

    // Action -> Deleting row from table in SPOC
    function remove_aoi(){
        if($this->input->server('REQUEST_METHOD') == "POST"){
            $quote_id = $this->input->post('quote_id');
            $result   = $this->payment_model->remove_aoi($quote_id);
            log_message('debug','are u there>>>>>>>>>>>>>>>>>>>>.');

            if(isset($result)) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Action -> Add New User
    private function add_new_user($input_array,$user_type,$count) {
        $result = array();
        $activation_code = md5(uniqid($input_array['user_email'].time()));
        // Do DB Call To Get MAX Count of user ID 
        
        switch ($user_type) {
            case '1':
                $usertype = 'User';
                $input_array['registration_no'] = "TST".date('YmdHis')."".$count;
                break;
            case '2':
                $usertype = 'Parent';
                $input_array['registration_no'] = "TPR".date('YmdHis')."".$count;
                break;
            case '3':
                $usertype = 'SPOC'; 
                $input_array['registration_no'] = "TAS".date('YmdHis');
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
                $input_array['registration_no'] = "TCD".date('YmdHis');
                break;
            case '7':
                $usertype = 'SuperAdmin';
                $input_array['registration_no'] = "TGM".date('YmdHis');
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

    public function appply_coupon_code(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $coupon_code = $this->input->post('coupon_code');
            $coupon_code_details = $this->coupon_model->check_coupon_code($coupon_code);
            if($coupon_code_details == null){
                echo 7;
            }else{
                // log_message('debug','#######couopon is '.print_r($coupon_status->coupon_status));
                $coupon_status = $coupon_code_details->coupon_status;
                if ($coupon_status == 1){
                    $today_date = date("Y-m-d");
                    $valid_till = date($coupon_code_details->valid_till);
                    if($valid_till >= $today_date){
                        // log_message('debug','$$$$$$$$$$$$Valid is greater than today');
                        $total_amount = $this->session->userdata('total_amount');
                        $discount_amount = $coupon_code_details->discount_amount;
                        $total_amount = $total_amount - $discount_amount;
                        if($total_amount<0){
                            $total_amount = 0;
                        }
                        $this->session->set_userdata('total_amount',$total_amount);
                        echo $coupon_status.'-'.$total_amount.'-'.$discount_amount;
                    }else{
                        // log_message('debug','$$$$$$$$$$$$$$$Valid is less than today');
                        $this->coupon_model->change_coupon_code_status($coupon_code,5);
                        echo 5;
                    }
                    

                }else{
                    echo $coupon_status;
                } 
            }
        }   
    }

    public function apply_scholarship(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $student_id         = $this->session->userdata('user_id');
            $student_details    = $this->session->userdata('user_details');
            $course_name        = $this->session->userdata('course_name');
            $course_id          = $this->session->userdata('course_id');

            $check_scholarship_applied = $this->payment_model->check_scholarship_status($student_id,$course_id);
            log_message('debug','status is @##@#@##@#@##@##@#@ '.$check_scholarship_applied);
            if($check_scholarship_applied==false){
                $to_email           = EMAIL_USERID;
                $email_subject      = "Applying for Scholarship";
                $email_message_body = "Hello ".PRODUCT_NAME.",<br><br><t><t> I am ".$student_details['user_fname']." with Registration no: ".$student_details['registration_no'].".
                                        I want to apply Scholarship for ".$course_name.". Please do the needful.<br><br>Regard\'s <br>".$student_details['user_fname'].".";

                $this->sendemail_model->set_send_email($to_email,$email_subject,$email_message_body);
                $student_details    = $this->session->userdata('user_details');
                $course_fee         = $this->session->userdata('total_amount');
                $course_id          = $this->session->userdata('course_id');
                
                $student_name       = $this->session->userdata('user_fname');
                $registration_no    = $this->session->userdata('registration_no');
                $scholarship_data   = array(
                                        'user_id'           => $student_id,
                                        'user_fname'        => $student_name,
                                        'registration_no'   => $registration_no,
                                        'course_id'         => $course_id,
                                        'course_name'       => $course_name,
                                        'course_fee'        => $course_fee,
                                        'status_id'         => 9
                                        );

                $scholarship_applied = $this->payment_model->apply_scholarship($scholarship_data);
                
                if($scholarship_applied){
                    echo true;
                }
            }
            else{
                echo $check_scholarship_applied->status_id;
            }
        }
    }

    //Action : SPOC Intrestes Request Quote
    function spoc_interests_request_quote(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_details'] = $this->session->all_userdata();
            $user_details = $this->session->all_userdata();
            $user_id    = $this->session->userdata('user_id');
            $amount     = $this->input->post('cost');
            $subjects   = $this->input->post('subjects');
            $length     = sizeof($subjects);
            $total_amount = $this->input->post('total_amount');
            $this->session->set_userdata('subjects',$subjects);
            $this->session->set_userdata('amount',$amount);
            $this->session->set_userdata('no_of_subjects',$length);
            $this->session->set_userdata('offline_payment_for','associate_subject_subscription');
            $this->session->set_userdata('total_amount',$total_amount);
            // log_message('debug','Amount is '.$amount);
            
            $data['subject_registration'] = True;
            $data['amount']       = $amount;
            $data['subjects']     = $subjects;
            $data['length']       = $length;
            $data['total_amount'] = $total_amount;
            
            $user_email             = $this->session->userdata('user_email');
            $data['user_email']     = $user_email;
            $associate_data         = $this->register_model->get_details($user_email);
            $data['user_address']   = $associate_data['user_address'];
            $data['associate_name'] = $this->session->userdata('user_fname');
            // $data['user_address'] = $this->session->userdata('user_address');
            // $user_id = $this->session->userdata('user_id');
            // $data['user_details'] = $this->batch_model->get_paid_student($user_id);
            // $this->load->view('payment/summery_view',$data);
            // echo $length;
            for($i=0; $i < $length; $i++){
                $subject_detail = $this->resource_model->get_subject_name_details($subjects[$i]);
                $request_quote_data = array(
                                            'user_id'           => $user_details['user_id'],
                                            'user_fname'        => $user_details['user_fname'],
                                            'registration_no'   => $user_details['registration_no'],
                                            'subject_id'        => $subject_detail['subject_id'],
                                            'subject_name'      => $subject_detail['subject_name'],
                                            'subject_fee'       => $subject_detail['subject_fee'],
                                            'status_id'         => 9
                                            );
                $this->payment_model->request_quote($request_quote_data);
                
            }

            $this->load->view("payment/request_quotation_area");
        }
    }
    /*
    function spoc_interests_request_quote(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_details'] = $this->session->all_userdata();
            $user_details = $this->session->all_userdata();
            $user_id    = $this->session->userdata('user_id');
            $amount     = $this->input->post('cost');
            $subjects   = $this->input->post('subjects');
            $length     = sizeof($subjects);
            $total_amount = $this->input->post('total_amount');
            $this->session->set_userdata('subjects',$subjects);
            $this->session->set_userdata('amount',$amount);
            $this->session->set_userdata('no_of_subjects',$length);
            $this->session->set_userdata('offline_payment_for','associate_subject_subscription');
            $this->session->set_userdata('total_amount',$total_amount);
            // log_message('debug','Amount is '.$amount);
            
            $data['subject_registration'] = True;
            $data['amount'] = $amount;
            $data['subjects'] = $subjects;
            $data['length'] = $length;
            $data['total_amount'] = $total_amount;
            
            $user_email = $this->session->userdata('user_email');
            $data['user_email'] = $user_email;
            $associate_data = $this->register_model->get_details($user_email);
            $data['user_address'] = $associate_data['user_address'];
            $data['associate_name'] = $this->session->userdata('user_fname');
            // $data['user_address'] = $this->session->userdata('user_address');
            // $user_id = $this->session->userdata('user_id');
            // $data['user_details'] = $this->batch_model->get_paid_student($user_id);
            // $this->load->view('payment/summery_view',$data);
            // echo $length;
            for($i=0; $i < $length; $i++){
                $subject_detail = $this->resource_model->get_subject_name_details($subjects[$i]);
                $request_quote_data = array(
                                            'user_id'           => $user_details['user_id'],
                                            'user_fname'        => $user_details['user_fname'],
                                            'registration_no'   => $user_details['registration_no'],
                                            'subject_id'        => $subject_detail['subject_id'],
                                            'subject_name'      => $subject_detail['subject_name'],
                                            'subject_fee'       => $subject_detail['subject_fee'],
                                            'status_id'         => 9
                                            );
                $this->payment_model->request_quote($request_quote_data);
                
            }
            log_message('debug','Quotes Status ID '.$request_quote_data['status_id']);

            if($request_quote_data('status_id') == 2){
                $this->load->view("payment/request_quotation_area");                
            }

        }
    }
    */

    // Action : Request Quote for Area of Intrest in Orginization SPOC 
    public function request_quote(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id         = $this->session->userdata('user_id');
            $user_details    = $this->session->userdata('user_details');
            $subject_name    = $this->session->userdata('subject_name');
            $subject_id      = $this->session->userdata('subject_id');

            $check_scholarship_applied = $this->payment_model->check_quote_request_status($user_id,$subject_id);
            // log_message('debug','status is '.$check_scholarship_applied);
            if($check_scholarship_applied==false){
                $to_email           = EMAIL_USERID;
                $email_subject      = "Request for Quote : From ".$user_details['user_fname'];
                $email_message_body = "Hello ".PRODUCT_NAME.",<br><br><t><t> I am ".$user_details['user_fname']." with Registration no: ".$user_details['registration_no'].".
                                        I want to take up ".$subject_name.". Please send me the quote  !.<br><br>Regard\'s <br>".$user_details['user_fname'].".";

                $this->sendemail_model->set_send_email($to_email,$email_subject,$email_message_body);
                $user_details    = $this->session->userdata('user_details');
                $subject_fee     = $this->session->userdata('total_amount');
                $subject_id      = $this->session->userdata('course_id');
                
                $user_name          = $this->session->userdata('user_fname');
                $registration_no    = $this->session->userdata('registration_no');
                $request_quote_data = array(
                                        'user_id'           => $user_id,
                                        'user_fname'        => $user_name,
                                        'registration_no'   => $registration_no,
                                        'course_id'         => $subject_id,
                                        'course_name'       => $subject_name,
                                        'course_fee'        => $subject_fee,
                                        'status_id'         => 9
                                        );

                $scholarship_applied = $this->payment_model->request_quote($request_quote_data);
                
                if($scholarship_applied){
                    echo true;
                }
            }
            else{
                echo $check_scholarship_applied->status_id;
            }
        }
    }

}
