<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ASH_Controller extends ASM_Controller {    
    public function __construct(){
        parent::__construct();
        $this->load->model('batch_model');
        $this->load->model('resource_model');
        $this->load->model('register_model');
        $this->load->model('resource_model');
        $this->load->model('pincode_model');
        $this->load->model('user_model');
        $this->load->model('sendemail_model');
        $this->load->model('report_model');
        $this->load->model('payment_model');
    }

    public function index(){
        $data['data'] = $this->session->all_userdata();
        $data['load_view'] = $this->session->flashdata('load_view');
        $data['user_home'] = "/spoc_home";
        $data['role_view'] = "associate/associate_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        // $this->load->view('associate/associate_dashboard_rightpan',$data);
        // log_message('debug','Associate Dash I HAVE NOT Yet Submited the Associate Doc ');

        $this->load->view('user_footer');
        // log_message('debug', 'Associate home');
    }

    function dashboard(){
        if($this->input->server('REQUEST_METHOD') == 'GET'){
            $data['user_details'] = $this->session->all_userdata();
            $user_id = $this->session->userdata('user_id');
            $result = $this->batch_model->is_subject_subscribed($user_id);
            $data['students_under_associate'] = $this->user_model->get_student_under_associate($user_id,'student_count');
               //   echo "<script>alert 'success';</script>";
            if($result != null){
               // $data['my_courses'] = $this->batch_model->my_courses($user_id);
                // $data['all_courses'] = $this->batch_model->associate_available_course($user_id,'Student');
                  $data['associate_student_count'] = $this->user_model->get_associate_students($user_id);
                  $data['associate_course_count']  = $this->user_model->get_associate_courses($user_id,'Student');
                // $this->load->view('associate/associate_dashboard_rightpan',$data);
                $this->load->view('associate/dashboard_right',$data);
                //echo "Already your Documents with us";
                // log_message('debug','Associate Dash I HAVE Submited the Associate Doc '); 
            } else {
                // $data['show_registration']  = "true";
                // log_message('debug','List of subjects');
                $user_id = $this->session->userdata('user_id');
                $subjects_list      = $this->batch_model->get_subject_list();
                // log_message('debug',print_r($subjects_list,true));  
                if(isset($subjects_list)){
                    foreach ($subjects_list as $key => $subject) {
                        // log_message('debug',print_r($subject['subject_id'],true));  
                        if($this->user_model->is_associate_has_subject($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                        if($this->payment_model->isThere_spoc_quote_for_this_aoi($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                    }
                }  
                if(sizeof($subjects_list) > 0){
                    $data['subjects'] = $subjects_list;
                } else {
                    $data['subjects'] = null;
                }
                // $data['subjects'] = $this->batch_model->get_subjects_details();
                // foreach ($data['subjects'] as $subject) {
                //     # code...
                //     log_message('debug','Subjects are '.$subject->subject_name);
                // }
                // log_message('debug','Course deatils are '.$data['course_details']);
                $this->load->view('associate/associate_join_subject',$data);
                // $this->load->view('associate/associate_qualification_view',$data);
                // log_message('debug','Associate Dash I HAVE NOT Yet Submited the Associate Doc ');
            }
        }
    }
    // Action : Open Associate_Subject_Subscribtion
    public function associate_subject_registration(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->session->userdata('user_id');
            $subjects_list      = $this->batch_model->get_subject_list();
            $data['user_details'] = $this->session->all_userdata();
            // log_message('debug','-- All Subjects Before -----------------------');  
            // log_message('debug',print_r($subjects_list,true));  
            // log_message('debug','----------------------------------------------');
            if(isset($subjects_list)){
                foreach ($subjects_list as $key => $subject) {
                    // log_message('debug',print_r($subject['subject_id'],true));  
                    if($this->user_model->is_associate_has_subject($user_id,$subject['subject_name'])){
                        unset($subjects_list[$key]);
                    }
                    if($this->payment_model->isThere_spoc_quote_for_this_aoi($user_id,$subject['subject_name'])){
                        unset($subjects_list[$key]);
                    }
                }
            }  
            // log_message('debug','-- All Subjects After ------------------------');  
            // log_message('debug',print_r($subjects_list,true));  
            // log_message('debug','----------------------------------------------');  
            if(sizeof($subjects_list) > 0){
                $data['subjects'] = $subjects_list;
            } else {
                $data['subjects'] = null;
            }
            $this->load->view('associate/associate_join_subject',$data);
        }
    }

    // Action : Load Course Materails Dashboard
    public function course_materials_dashboard(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug','course_meterial Dash board');
            $data['user_details'] = $this->session->all_userdata();
            $user_id = $this->session->userdata('user_id');
            $associate_paid_status = $this->is_associate_paid($user_id);
            if($associate_paid_status != null){
                if($associate_paid_status['payment_status'] == '2'){
                    // Display Course's Available for Student and Also Assocaite Training courses
                    $data['available_courses']   = $this->batch_model->associate_available_course($user_id,'Student');
                    $this->load->view('associate/course_materials_dashboard',$data);
                } else if($associate_paid_status['payment_status'] == '8'){
                    $this->load->view('associate/associate_payment_progress');
                }
            } else {
                log_message('debug','Associate Has Not Subscribed for Subject');
                // $data['subjects'] = $this->batch_model->get_subjects_details();
                $user_id = $this->session->userdata('user_id');
                $subjects_list      = $this->batch_model->get_subject_list();
                // log_message('debug',print_r($subjects_list,true));  
                if(isset($subjects_list)){
                    foreach ($subjects_list as $key => $subject) {
                        // log_message('debug',print_r($subject['subject_id'],true));  
                        if($this->user_model->is_associate_has_subject($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                        if($this->payment_model->isThere_spoc_quote_for_this_aoi($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                    }
                }  
                if(sizeof($subjects_list) > 0){
                    $data['subjects'] = $subjects_list;
                } else {
                    $data['subjects'] = null;
                }
                $this->load->view('associate/associate_join_subject',$data);
            }
        }
    }

    // Action : Load Associate Training Materials Dashboard
    public function training_materials_dashboard(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['user_details'] = $this->session->all_userdata();
            $user_id = $this->session->userdata('user_id');
            log_message('debug','course_meterial Dash board');
            // Display Course's Available for Student and Also Assocaite Training courses
            $data['available_courses']   = $this->batch_model->associate_available_course($user_id,'Associate');
            // $data['associate_courses'] = $this->batch_model->associate_available_course($user_id,'Associate');
            $this->load->view('associate/training_materials_dashboard',$data);
        }
    }

    // Action : GET Student Course Tree 
    public function get_student_course_tree(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id   = $this->session->userdata('user_id');
            $course_id = $this->input->post('course_id');
            $data['course_details'] = $this->resource_model->get_courses_details($course_id);
            // $data['course_tree'] = $this->resource_model->course_tree($course_id);
            $data['course_tree'] = $this->resource_model->associate_course_tree($user_id,$course_id);
            $course_details = $data['course_details'];
            // Setting Current Session Details : Course ID , Course Name
            $this->session->set_userdata('CR_course_id',$course_id);
            $this->session->set_userdata('CR_course_name',$course_details['course_name']);
            log_message('debug','---------------------------------------------------------');
            log_message('debug','| Associate Viewing Student Courses Materials');
            log_message('debug','| Current Session Details');
            log_message('debug','| Current Course ID   > '.$course_id);
            log_message('debug','| Current Course Name > '.$course_details['course_name']);
            log_message('debug','---------------------------------------------------------');
            // Loading Coure Tree View
            $this->load->view('associate/student_resource_browser/student_course_tree',$data);
        }
    }

    //------------------------------------------------------------------------------------
    //  Student Course Module Group Subject Started
    //------------------------------------------------------------------------------------
        // Action = Get Course Module
        public function get_student_course_modules(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $user_id = $this->session->userdata('user_id');
                $course_id = $this->input->post('course_id');
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $data['course_module']  = $this->resource_model->get_associate_course_modules($user_id,$course_id);
                $course_details = $data['course_details'];
                // Setting Current Session Details : Course ID , Course Name
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_details['course_name']);
                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Associate Viewing Student Courses Materials');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID   > '.$course_id);
                log_message('debug','| Current Course Name > '.$course_details['course_name']);
                log_message('debug','---------------------------------------------------------');
                // Loading Coure Tree View
                $this->load->view('associate/student_resource_browser/course_module_grid',$data);
            }
        }

        // Action : To Display Course Syllabus in Associate Side
        public function view_course_syllabus(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $course_id = $this->input->post('course_id');
                $file_name = $this->input->post('file_name');
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $course_details = $data['course_details'];
                $data['file_name'] = $course_details['course_syllabus_file'];
                // Setting Current Session Details : Course ID , Course Name
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_details['course_name']);
                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID   > '.$course_id);
                log_message('debug','| Current Course Name > '.$course_details['course_name']);
                log_message('debug','| Current Syllabus    > '.$course_details['course_syllabus_file']);
                $this->load->view('student/view_course_syllabus_modal',$data);
                log_message('debug','---------------------------------------------------------');
            }
        }

        // Action = Get Course Module Group
        public function get_student_course_module_group(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $user_id = $this->session->userdata('user_id');
                $course_id = $this->input->post('course_id');
                $module_name = $this->input->post('module_name');
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $data['module_name']    = $module_name;
                $data['course_group']  = $this->resource_model->get_associate_course_module_groups($user_id,$course_id,$module_name);
                $course_details = $data['course_details'];
                // Setting Current Session Details : Course ID , Course Name
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_details['course_name']);
                $this->session->set_userdata('CR_module_name',$module_name);
                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Associate Viewing Student Courses Materials');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID     > '.$course_id);
                log_message('debug','| Current Course Name   > '.$course_details['course_name']);
                log_message('debug','| Current Course Module > '.$module_name);
                log_message('debug','---------------------------------------------------------');
                // Loading Coure Tree View
                $this->load->view('associate/student_resource_browser/course_group_grid',$data);
            }
        }

        // Action = Get Course Module Group Subjects
        public function get_student_course_module_group_subject(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $user_id = $this->session->userdata('user_id');
                $course_id      = $this->input->post('course_id');
                // $module_name    = $this->session->userdata('CR_module_name');
                $module_name    = $this->input->post('module_name');
                $group_name     = $this->input->post('group_name');

                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $data['course_subject'] = $this->resource_model->get_associate_course_module_group_subjects($user_id,$course_id,$module_name,$group_name);
                $data['module_name']    = $module_name;
                $data['group_name']     = $group_name;
                $course_details = $data['course_details'];
                // Setting Current Session Details : Course ID , Course Name
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_details['course_name']);
                $this->session->set_userdata('CR_module_name',$module_name);
                $this->session->set_userdata('CR_group_name',$group_name);
                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Associate Viewing Student Courses Materials');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID     > '.$course_id);
                log_message('debug','| Current Course Name   > '.$course_details['course_name']);
                log_message('debug','| Current Course Module > '.$module_name);
                log_message('debug','| Current Course Group  > '.$group_name);
                log_message('debug','---------------------------------------------------------');
                // Loading Coure Tree View
                $this->load->view('associate/student_resource_browser/course_subjects_grid',$data);
            }
        }

        // Action Get Course Module Group Subject Resource 
        public function get_student_course_module_group_subject_resources(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $user_id = $this->session->userdata('user_id');
                $course_id       = $this->input->post('course_id');
                $course_name     = $this->session->userdata('CR_course_name');
                $module_name     = $this->session->userdata('CR_module_name');
                $group_name      = $this->session->userdata('CR_group_name');
                $subject_name    = $this->input->post('subject_name');

                $resource_list   = $this->resource_model->get_associate_cmgsr($course_id,$module_name,$group_name,$subject_name);
                $assessment_list = $this->resource_model->get_associate_cmgsa($course_id,$module_name,$group_name,$subject_name);
                // Load data's
                $data['course_id']      = $course_id;
                $data['course_name']    = $course_name;
                $data['module_name']    = $module_name;
                $data['group_name']     = $group_name;
                $data['subject_name']   = $subject_name;

                if($resource_list != null){
                    $data['resource_list'] = $resource_list;
                    log_message('debug','resource list generated');
                }
                if($assessment_list != null){
                    $data['assessment_list'] = $assessment_list;
                    log_message('debug','Assessment list Generated');
                }
                // Setting Current Session Details : Course ID , Course Name, Subject Name
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_module_name',$module_name);
                $this->session->set_userdata('CR_group_name',$group_name);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                
                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Associate Viewing Student Courses Materials');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID     > '.$course_id);
                log_message('debug','| Current Course Name   > '.$course_name);
                log_message('debug','| Current Course Module > '.$module_name);
                log_message('debug','| Current Course Group  > '.$group_name);
                log_message('debug','| Current Subject Name  > '.$subject_name);
                log_message('debug','---------------------------------------------------------');
                $this->load->view('associate/student_resource_browser/course_subjects_resource_view',$data);
            }    
        }

        // Action: Open Student Resourcs 
        // Action -> Get All Subject Resources 
        public function open_subject_resources(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $user_id = $this->session->userdata('user_id');
                $course_id       = $this->input->post('course_id');
                $course_name     = $this->session->userdata('CR_course_name');
                $subject_name    = $this->input->post('subject_name');
                $resource_list   = $this->resource_model->get_cs_resource($course_id,$subject_name);
                $assessment_list = $this->resource_model->get_cs_assessment($course_id,$subject_name);
                // Load data's
                $data['subject_name'] = $subject_name;
                if($resource_list != null){
                    $data['resource_list'] = $resource_list;
                    log_message('debug','resource list generated');
                }
                if($assessment_list != null){
                    $data['assessment_list'] = $assessment_list;
                    log_message('debug','Assessment list Generated');
                }
                // Setting Current Session Details : Course ID , Course Name, Subject Name
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID   > '.$course_id);
                log_message('debug','| Current Course Name > '.$course_name);
                log_message('debug','| Current Subject Name > '.$subject_name);
                log_message('debug','---------------------------------------------------------');
                $this->load->view('associate/student_resource_browser/resourse_view',$data);
            }
        }

        // Action -> open resource 
        public function open_pdf_resource(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_name']    = $this->session->userdata('CR_course_name');
                
                $data['course_id']      = $this->input->post('course_id');
                $data['module_name']    = $this->input->post('module_name');
                $data['group_name']     = $this->input->post('group_name');
                $data['subject_name']   = $this->input->post('subject_name');
                $data['resource_id']    = $this->input->post('resource_id');
                $data['resource_link']  = $this->input->post('resource_link');
                
                $resource_detail        = $this->resource_model->get_resource_details($data['resource_id']);
                $data['resource_detail']= $resource_detail;
                $course_id      = $data['course_id'];
                $course_name    = $data['course_name'];
                $subject_name   = $data['subject_name'];
                $resource_id    = $resource_detail['resource_id'];
                $resource_link  = $resource_detail['resource_link'];
                
                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_module_name',$data['module_name']);
                $this->session->set_userdata('CR_group_name',$data['group_name']);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                $this->session->set_userdata('CR_resource_id',$data['resource_id']);
                $this->session->set_userdata('CR_resource_name',$subject_name);
                $this->session->set_userdata('CR_resource_link',$data['resource_link']);

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID    >    '.$course_id);
                log_message('debug','| Current Course Name  >    '.$course_name);
                log_message('debug','| Current Module Name  >    '.$data['module_name']);
                log_message('debug','| Current Group Name   >    '.$data['group_name']);
                log_message('debug','| Current Subject Name >    '.$subject_name);
                log_message('debug','| Current Resource ID  >    '.$data['resource_id']);
                log_message('debug','| Current Resource URL >    '.$data['resource_link']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/pdf_view',$data);
            }
        }

        // Action -> CURL TO GET URL DATA
        public function curl_get($url) {
            // $this->load->library('curl');
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            $return = curl_exec($curl);
            curl_close($curl);
            log_message('debug',"CURL Result ".$return);
            return $return;
        } 

        // Action -> Generate embeded IFRAME Code  Need TOI From Kiruthiga 
        public function associate_video_embed() {
            // $this->layout = "default";
            $url = $this->input->get('url');
            $url = base64_decode($url);
            $json = "";
             if(strstr($url,"youtube"))
                $json = $this->curl_get("https://www.youtube.com/oembed?url=".rawurlencode($url)."&format=json&callback=foo");
            else if(strstr($url,"vimeo"))
                $json = $this->curl_get("https://vimeo.com/api/oembed.json?url=".rawurlencode($url));
            if(is_object(json_decode($json)) == 1) {
                echo $json;
                log_message('debug','------------------------------------------------------');
                log_message('debug','| JSON Result : '.$json);
                log_message('debug','------------------------------------------------------');
            } else {
                $json = json_encode(array("html" => "<h3>Video not available. Please try later.</h3>"));
                echo $json;
            }
        }

        // Action -> open resource 
        public function open_video_resource(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_name']    = $this->session->userdata('CR_course_name');
                // Gathering from post inputs
                $data['course_id']      = $this->input->post('course_id');
                $data['module_name']    = $this->input->post('module_name');
                $data['group_name']     = $this->input->post('group_name');
                $data['subject_name']   = $this->input->post('subject_name');
                $data['resource_id']    = $this->input->post('resource_id');
                $data['resource_link']  = $this->input->post('resource_link');

                $resource_detail        = $this->resource_model->get_resource_details($data['resource_id']);
                $data['resource_detail']= $resource_detail;

                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$data['course_id']);
                $this->session->set_userdata('CR_course_name',$data['course_name']);
                $this->session->set_userdata('CR_module_name',$data['module_name']);
                $this->session->set_userdata('CR_group_name',$data['group_name']);
                $this->session->set_userdata('CR_subject_name',$data['subject_name']);
                $this->session->set_userdata('CR_resource_id',$data['resource_id']);
                $this->session->set_userdata('CR_resource_name',$resource_detail['resource_name']);
                $this->session->set_userdata('CR_resource_link',$data['resource_link']);

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID    >    '.$data['course_id']);
                log_message('debug','| Current Course Name  >    '.$data['course_name']);
                log_message('debug','| Current Module Name  >    '.$data['module_name']);
                log_message('debug','| Current Group Name   >    '.$data['group_name']);
                log_message('debug','| Current Subject Name >    '.$data['subject_name']);
                log_message('debug','| Current Resource ID  >    '.$data['resource_id']);
                log_message('debug','| Current Resource Name>    '.$resource_detail['resource_name']);
                log_message('debug','| Current Resource URL >    '.$data['resource_link']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/video_view',$data);
            }
        }

        public function open_captiva_resource(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_name']    = $this->session->userdata('CR_course_name');
                
                $data['course_id']      = $this->input->post('course_id');
                $data['module_name']    = $this->input->post('module_name');
                $data['group_name']     = $this->input->post('group_name');
                $data['subject_name']   = $this->input->post('subject_name');
                $data['resource_id']    = $this->input->post('resource_id');
                // $data['resource_link']  = $this->input->post('resource_link');
                
                $resource_detail        = $this->resource_model->get_resource_details($data['resource_id']);
                $data['resource_detail']= $resource_detail;
                $data['resource_link']  = $resource_detail['resource_link'];

                $course_id      = $data['course_id'];
                $course_name    = $data['course_name'];
                $subject_name   = $data['subject_name'];
                $resource_id    = $resource_detail['resource_id'];
                $resource_link  = $resource_detail['resource_link'];
                
                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_module_name',$data['module_name']);
                $this->session->set_userdata('CR_group_name',$data['group_name']);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                $this->session->set_userdata('CR_resource_id',$data['resource_id']);
                $this->session->set_userdata('CR_resource_name',$subject_name);
                $this->session->set_userdata('CR_resource_link',$data['resource_link']);

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID    >    '.$course_id);
                log_message('debug','| Current Course Name  >    '.$course_name);
                log_message('debug','| Current Module Name  >    '.$data['module_name']);
                log_message('debug','| Current Group Name   >    '.$data['group_name']);
                log_message('debug','| Current Subject Name >    '.$subject_name);
                log_message('debug','| Current Resource ID  >    '.$data['resource_id']);
                log_message('debug','| Current Resource URL >    '.$data['resource_link']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/captiva_view',$data);
            }
        }

        public function open_captiva_quiz_resource(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_name']    = $this->session->userdata('CR_course_name');
                
                $data['course_id']      = $this->input->post('course_id');
                $data['module_name']    = $this->input->post('module_name');
                $data['group_name']     = $this->input->post('group_name');
                $data['subject_name']   = $this->input->post('subject_name');
                $data['resource_id']    = $this->input->post('resource_id');
                // $data['resource_link']  = $this->input->post('resource_link');
                
                $resource_detail        = $this->resource_model->get_resource_details($data['resource_id']);
                $data['resource_detail']= $resource_detail;
                $data['resource_link']  = $resource_detail['resource_link'];

                $course_id      = $data['course_id'];
                $course_name    = $data['course_name'];
                $subject_name   = $data['subject_name'];
                $resource_id    = $resource_detail['resource_id'];
                $resource_link  = $resource_detail['resource_link'];
                
                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_module_name',$data['module_name']);
                $this->session->set_userdata('CR_group_name',$data['group_name']);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                $this->session->set_userdata('CR_resource_id',$data['resource_id']);
                $this->session->set_userdata('CR_resource_name',$subject_name);
                $this->session->set_userdata('CR_resource_link',$data['resource_link']);

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID    >    '.$course_id);
                log_message('debug','| Current Course Name  >    '.$course_name);
                log_message('debug','| Current Module Name  >    '.$data['module_name']);
                log_message('debug','| Current Group Name   >    '.$data['group_name']);
                log_message('debug','| Current Subject Name >    '.$subject_name);
                log_message('debug','| Current Resource ID  >    '.$data['resource_id']);
                log_message('debug','| Current Resource URL >    '.$data['resource_link']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/captiva_quiz_view',$data);
            }
        }

        // Action : Open test page
        public function open_test_page(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $user_id                = $this->session->userdata('user_id');  
                $data['course_name']    = $this->session->userdata('CR_course_name');
                
                $data['course_id']      = $this->input->post('course_id');
                $data['module_name']    = $this->input->post('module_name');
                $data['group_name']     = $this->input->post('group_name');
                $data['subject_name']   = $this->input->post('subject_name');
                $data['test_id']        = $this->input->post('test_id');
                $data['test_name']      = $this->input->post('test_name');

                $data['assessment_detail'] = $this->resource_model->get_assessment_details($data['test_id']);
                $assessment_data= $data['assessment_detail'];
                $course_id      = $data['course_id'];
                $course_name    = $data['course_name'];
                $subject_name   = $data['subject_name'];
                $test_name      = $data['test_name'];
                $test_id        = $data['test_id'];
               
                $data['attempt_details'] = $this->resource_model->get_test_attempt($user_id,$course_id,$assessment_data['test_no']);
                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_module_name',$data['module_name']);
                $this->session->set_userdata('CR_group_name',$data['group_name']);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                $this->session->set_userdata('CR_test_id',$test_id);
                $this->session->set_userdata('CR_test_no',$assessment_data['test_no']);
                $this->session->set_userdata('CR_test_name',$test_name);
                $this->session->set_userdata('CR_assessment_details',$assessment_data);
                //$this->session->set_userdata('CR_resource_link',$data['resource_link']);

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID    >    '.$course_id);
                log_message('debug','| Current Course Name  >    '.$course_name);
                log_message('debug','| Current Module Name  >    '.$data['module_name']);
                log_message('debug','| Current Group Name   >    '.$data['group_name']);
                log_message('debug','| Current Subject Name >    '.$subject_name);
                log_message('debug','| Current Test ID      >    '.$data['test_id']);
                log_message('debug','| Current Test No      >    '.$assessment_data['test_no']);
                log_message('debug','| Current Test Name    >    '.$data['test_name']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/open_test_page',$data);
            }
        }

        // Action: This View Attempt can see only inside Course Subject Test
        function open_question_paper(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_name']        = $this->session->userdata('CR_course_name');
                $data['module_name']        = $this->session->userdata('CR_module_name');
                $data['group_name']         = $this->session->userdata('CR_group_name');

                $data['course_id']          = $this->input->post('course_id');
                $data['subject_name']       = $this->input->post('subject_name');
                $data['test_id']            = $this->input->post('test_id');
                $data['test_name']          = $this->input->post('test_name');
                $data['attempt_id']         = $this->input->post('attempt_id');
                
                $data['assessment_details'] = $this->resource_model->get_assessment_details($data['test_id']);
                $data['attempt_details']    = $this->resource_model->get_attempt_details($data['attempt_id']);
                $assessment_details         = $data['assessment_details'];
                $course_id                  = $data['course_id'];
                $course_name                = $data['course_name'];
                $subject_name               = $data['subject_name'];
                $test_name                  = $data['test_name'];
                $test_id                    = $data['test_id'];
               
                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                $this->session->set_userdata('CR_test_id',$test_id);
                $this->session->set_userdata('CR_test_name',$test_name);
                $this->session->set_userdata('CR_assessment_details',$assessment_details);                

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID            >    '.$course_id);
                log_message('debug','| Current Course Name          >    '.$course_name);
                log_message('debug','| Current Module Name          >    '.$data['module_name']);
                log_message('debug','| Current Group Name           >    '.$data['group_name']);
                log_message('debug','| Current Subject Name         >    '.$subject_name);
                log_message('debug','| Current Test ID              >    '.$data['test_id']);
                log_message('debug','| Current Test Name            >    '.$data['test_name']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/show_question_paper',$data);
            }                
        }

        // Action: This View Attempt can see only inside Course Subject Test
        function open_show_answer_key(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['course_name']        = $this->session->userdata('CR_course_name');
                $data['module_name']        = $this->session->userdata('CR_module_name');
                $data['group_name']         = $this->session->userdata('CR_group_name');

                $data['course_id']          = $this->input->post('course_id');
                $data['subject_name']       = $this->input->post('subject_name');
                $data['test_id']            = $this->input->post('test_id');
                $data['test_name']          = $this->input->post('test_name');
                $data['attempt_id']         = $this->input->post('attempt_id');
                
                $data['assessment_details'] = $this->resource_model->get_assessment_details($data['test_id']);
                $data['attempt_details']    = $this->resource_model->get_attempt_details($data['attempt_id']);
                $assessment_details         = $data['assessment_details'];
                $course_id                  = $data['course_id'];
                $course_name                = $data['course_name'];
                $subject_name               = $data['subject_name'];
                $test_name                  = $data['test_name'];
                $test_id                    = $data['test_id'];
               
                // Setting Current Session Details : Course ID , Course Name, Subject Name , Resource ID, Resource Name , Resource Type , Resource Link
                $this->session->set_userdata('CR_course_id',$course_id);
                $this->session->set_userdata('CR_course_name',$course_name);
                $this->session->set_userdata('CR_subject_name',$subject_name);
                $this->session->set_userdata('CR_test_id',$test_id);
                $this->session->set_userdata('CR_test_name',$test_name);
                $this->session->set_userdata('CR_assessment_details',$assessment_details);
                

                log_message('debug','---------------------------------------------------------');
                log_message('debug','| Current Session Details');
                log_message('debug','| Current Course ID            >    '.$course_id);
                log_message('debug','| Current Course Name          >    '.$course_name);
                log_message('debug','| Current Module Name          >    '.$data['module_name']);
                log_message('debug','| Current Group Name           >    '.$data['group_name']);
                log_message('debug','| Current Subject Name         >    '.$subject_name);
                log_message('debug','| Current Test ID              >    '.$data['test_id']);
                log_message('debug','| Current Test Name            >    '.$data['test_name']);
                log_message('debug','---------------------------------------------------------');

                $this->load->view('associate/student_resource_browser/show_answer_key',$data);
            }                
        }
    //------------------------------------------------------------------------------------
    //  Course Module Group Subject codeEnd
    //------------------------------------------------------------------------------------
    

    function is_associate_paid($user_id){
        $associate_data = $this->user_model->check_associate_paid_status($user_id);
        if($associate_data != null){
            return $associate_data;
        }
        return null;
    }

    function add_student(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            log_message('debug','-- Affiliate Add Student ---------------------------------------');
            // Checking for Subject Subscription
            $data['user_details'] = $this->session->all_userdata();
            $user_id = $this->session->userdata('user_id');
            $result = $this->batch_model->is_subject_subscribed($user_id);
            $associate_paid_status = $this->is_associate_paid($user_id);
            if($associate_paid_status != null){
                if($associate_paid_status['payment_status'] == '2'){
                    if($result != null){
                        log_message('debug','Associate Has Subscribed for Subject');
                        // $data['course_details'] = $this->batch_model->associate_available_course($user_id,'Student');
                        $data['course_details'] = $this->batch_model->get_add_students_course_list($user_id,'Student');
                        $this->load->view('associate/associate_add_student',$data);
                    } 
                } else if($associate_paid_status['payment_status'] == "8"){ 
                    $this->load->view('associate/associate_payment_progress');
                }
            } else {
                log_message('debug','Affiliate Has Not Subscribed for Subject');
                // $data['subjects'] = $this->batch_model->get_subjects_details();
                $user_id = $this->session->userdata('user_id');
                $subjects_list      = $this->batch_model->get_subject_list();
                // log_message('debug',print_r($subjects_list,true));  
                if(isset($subjects_list)){
                    foreach ($subjects_list as $key => $subject) {
                        // log_message('debug',print_r($subject['subject_id'],true));  
                        if($this->user_model->is_associate_has_subject($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                        if($this->payment_model->isThere_spoc_quote_for_this_aoi($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                    }
                }  
                if(sizeof($subjects_list) > 0){
                    $data['subjects'] = $subjects_list;
                } else {
                    $data['subjects'] = null;
                }
                $this->load->view('associate/associate_join_subject',$data);
            }
                

            log_message('debug','----------------------------------------------------------------');
        }
    }

    function do_pay(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['associate_detail'] = $this->session->all_userdata();
            $data['load_view'] = $this->session->flashdata('load_view');
            $user_email = $this->session->userdata('user_email');
            $data['user_address'] = $associate_data['user_address'];
            $user_id = $this->session->userdata('user_id');
            $data['user_details']=$this->load->batch_model->get_paid_student1($user_id);
            $this->load->view('associate/associate_add_student',$data);

        }
    }

    // Action : bulk student offline payment by associate.. 
    function bulk_student_offline_payment(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // log_message('debug','offline OK..');
            // $data['associate_detail'] = $this->session->all_userdata();
            $this->load->view('associate/bulk_student_offline_pay');
        }        
    }

    // Action : saving student offline payment in Database 
    function save_offline_pay(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $bank_name      =  $this->input->post('bank_name');
            $chalan_no      =  $this->input->post('chalan_no');
            $amount_paid    =  $this->input->post('amount_paid');
            $paid_date      =  $this->input->post('paid_date');
            $result = $this->batch_model->save_offline_payment($bank_name,$chalan_no,$amount_paid,$paid_date);
            log_message('debug','sri error here '.$result);
                if ($result) {
                   return $result;
                }
                   return false;              
        }
    }

    // Action :
    function students_tobe_registered(){
        if($this->input->server("REQUEST_METHOD") == 'POST'){
            $user_id = $this->session->userdata('user_id');
            $students = $this->batch_model->get_students_tobe_registered($user_id);
            if(isset($students)){
                echo json_encode($students);
                // return $students;
            }else{
                return null;
            }
        }
    }

    // Action : fetching course in student Bulk upload..
    function joining_fee_payment1(){
        $user_id = $this->session->userdata('user_id');

        $data['user_address'] = $this->session->userdata('user_address');
        $user_id = $this->session->userdata('user_id');
        $data['user_details'] = $this->batch_model->get_paid_student1($user_id);
        $this->load->view('associate/associate_add_student',$data);
    } 

    // Action : checking email in student bulk upload..
    function checkEmail() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $student_email = $this->input->post('student_email');
            $parent_email = $this->input->post('parent_email');
            $email = $this->input->post('email');
            if(isset($student_email)) { 
                $user_email = $student_email; 
            }
            if (isset($parent_email)) {
                $user_email = $parent_email;
            }
            if (isset($email)) {
                $user_email = $email;
            }

            log_message('debug',"Check Email > ".$user_email);
            $result = $this->user_model->check_email($user_email);
            if($result > 0){
                echo "false";
            } else {
                echo "true";
            }
            // log_message('debug',"Check Email > Result ".$result);
        }
    }

    // Action : dumping data to the database 
    function save_students_data(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug','Hitting to save_students_data() function NNo Problum -------->>>>>>>');
            $user_id = $this->session->userdata('user_id');

            //Deleting Previously saved record's to enter them freshly
            $this->batch_model->delete_previously_saved_records($user_id);

            $user_email = $this->session->userdata('user_email');
            //Fetching Associate Details with email id
            $associate_data    = $this->register_model->get_details($user_email);
            $associate_city    = $associate_data['user_city'];
            $associate_state   = $associate_data['user_state'];
            $associate_country = $associate_data['user_country'];
            $associate_pincode = $associate_data['user_pin'];
            
            $no_of_students = $this->input->post('no_of_students');
            $student_array  = $this->input->post('student');
            $to_be_done     = $this->input->post('to_be_done');
            // log_message('debug','########### Inside the save_students_data ');
            // $total_amount   = $this->input->post('total_amount');

            //Saving Data into Student Bulk Upload table
            $student_array1 =json_decode($student_array);           
            foreach($student_array1 as $student){
                $student_email  = $student->email;
                $student_course = $student->course;

                if(is_array($student_course)){
                // log_message('debug','########### Inside foreach Email '.print_r($student_course,TRUE));

                    foreach ($student_course as $res) {
                        // check if the student already exists 
                        $result = $this->register_model->is_student_course_details_exists($student_email,$res);
                        if($result != null){
                            // $total_amount = $total_amount - $student->cost;
                            // log_message('debug','########### Inside if ');
                            
                        } else {
                            $data = array(
                                'first_name'    => $student->fname,
                                'last_name'     => $student->lname,
                                'email'         => $student->email,
                                'mobile'        => $student->mobile,
                                'parent_name'   => $student->parent_name,
                                'address'       => $student->address,
                                'course'        => $res,   
                                'associate_id'  => $user_id,
                                // 'cost'          => $student->cost,
                                'transaction_id'=> 0
                                );
                            $res = $this->batch_model->student_bulk_insert($data);
                        }
                    }
                }
            }
            log_message('debug','########### Hi RAM submit code is hitting Upto save_students_data() ');
            //Verifying the Condition wether it has to be "Pay" or "Save"
            //Following loop executes if it is Pay ,If it is saved it goes back to DashBoard
            if($to_be_done =='pay'){
                
                    // log_message('debug','########### Inside the (to_be_done == pay) ');
                $user_id = $this->session->userdata('user_id');
                $user_fname = $this->session->userdata('user_fname');
                // $data['total_cost'] = $this->batch_model->total_amount();
                $this->session->set_userdata('no_of_students',$no_of_students);
                $this->session->set_userdata('offline_payment_for','student_bulk_upload');
                // $this->session->set_userdata('total_amount',$total_amount);

                // log_message('debug','Username is '.$user_fname);
                $data['user_fname']     = $user_fname;
                $data['user_details'] = $this->session->all_userdata();
                $data['students']   = $this->batch_model->get_associate_unpaid_student($user_id);
                $data['user_address']   = $this->session->userdata('user_address');
                $data['user_email']     = $this->session->userdata('user_email');
                // $data['total_amount']   = $total_amount;
                $data['no_of_students'] = $no_of_students;
                
                // $this->load->view('payment/summery_view',$data);
            } else {
                // log_message('debug','Data is saved');
                $data['my_courses'] = $this->batch_model->my_courses($user_id);
                $data['all_courses'] = $this->batch_model->all_course('Student');
                $data['associate_student_count'] = $this->user_model->get_associate_students($user_id);
                $data['associate_course_count']  = $this->user_model->get_associate_courses($user_id,'Student');
                $data['students_under_associate'] = $this->user_model->get_student_under_associate($user_id,'student_count');
                $this->load->view('associate/dashboard_right',$data);
            }
        }
    }

    // --------------------------------------------------------------------------
    //  Action : User Bulk Enrolement 
    // --------------------------------------------------------------------------
    function save_users_data(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            log_message('debug','>> Saving User Data in : student_bulk_upload table');
            $user_id    = $this->session->userdata('user_id');
            $user_email = $this->session->userdata('user_email');
            //Fetching Associate Details with email id
            $associate_data    = $this->register_model->get_details($user_email);
            $associate_city    = $associate_data['user_city'];
            $associate_state   = $associate_data['user_state'];
            $associate_country = $associate_data['user_country'];
            $associate_pincode = $associate_data['user_pin'];
            $no_of_students = $this->input->post('no_of_students');
            $student_array  = $this->input->post('student');
            $to_be_done     = $this->input->post('to_be_done');
            $count = 0;
            // log_message('debug','########### Inside the save_students_data ');
            // $total_amount   = $this->input->post('total_amount');

            //Verifying the Condition wether it has to be "Enrole" or "Save"
            //Following loop executes if it is enrole ,If it is saved it goes back to DashBoard
            if($to_be_done =='pay'){
                //Deleting Previously saved record's to enter them freshly
                $this->batch_model->delete_previously_saved_records($user_id);

                //Saving Data into Student Bulk Upload table
                $student_array1 =json_decode($student_array);           
                foreach($student_array1 as $student){
                    $student_email  = $student->email;
                    $student_course = $student->course;

                    if(is_array($student_course)){
                        // log_message('debug','########### Inside foreach Email '.print_r($student_course,TRUE));
                        foreach ($student_course as $res){
                            // check if the student already exists 
                            $result = $this->register_model->is_student_course_details_exists($student_email,$res);
                            if($result != null){
                                // $total_amount = $total_amount - $student->cost;
                                // log_message('debug','########### Inside if ');
                            } else {
                                $data = array(
                                    'first_name'    => $student->fname,
                                    'last_name'     => $student->lname,
                                    'email'         => $student->email,
                                    'mobile'        => $student->mobile,
                                    'parent_name'   => $student->parent_name,
                                    'address'       => $student->address,
                                    'course'        => $res,   
                                    'associate_id'  => $user_id,
                                    'cost'          => '0',
                                    'transaction_id'=> 0
                                    );
                                $res = $this->batch_model->student_bulk_insert($data);
                                log_message('debug','User Bulk Data Added RES :'.$res);
                            }
                        }
                    }
                }
                // Saving User Data is Done.
                log_message('debug','>> User Data Saved :)');

                log_message('debug','Enrolement is Going to Begin ...');
                // Bring Payment Functionality Here ! :D 
                // --------------------------------------------------------------
                // Generating Transcation for SPOC - Bulk User Enrolment 
                $user_details = $this->session->all_userdata();
                $transaction_details = array(
                    'user_id' => $user_details['user_id'],
                    'transaction_number' => $user_details['registration_no'],
                    'bank_name' => "ORG-SPOC-".$user_details['user_fname'],
                    'amount_paid' => "0",
                    'paid_date' => date('Y-m-d'),
                    'transaction_description'=> "SPOC Bulk User Enrollment - ".$no_of_students,
                    'payment_mode' => 'offline',
                    'payment_status' => '2', // before it was 8 - pending payment 2- paid
                    'total_amount' => "0"
                );
                
                // Creating Transcation and that will return transcation id 
                $transaction_id = $this->payment_model->offline_payment($transaction_details);
                log_message('debug','Creating Transcation ... Transcation ID: '.$transaction_id);
                // Get Un-Paid User Details 
                $unpaid_users = $this->batch_model->get_associate_unpaid_student($user_id);
                // var_dump($unpaid_users);
                // Create Users
                // if(isset($unpaid_users)){
                    log_message('debug','i got unpaid_users ');
                    foreach($unpaid_users as $student){
                        $count = $count+1;
                        log_message('debug','**********Details of '.$count);
                           
                        $this->batch_model->set_transaction_id($student->id,$transaction_id);
                        // Student Details :
                        $student_details = array();
                        $student_details['first_name']      = $student->first_name;
                        $student_details['last_name']       = $student->last_name;
                        $student_details['middle_name']     = '';
                        $student_details['user_email']      = $student->email;
                        $student_details['user_phone']      = $student->mobile;
                        $student_details['user_photo']      = '';
                        $student_details['user_address']    = $student->address;
                        $student_details['user_city']       = $user_details['user_city'];
                        $student_details['user_state']      = $user_details['user_state'];
                        $student_details['user_country']    = $user_details['user_country'];
                        $student_details['user_pincode']    = $user_details['user_pin'];
                        $res = $this->pincode_model->getPincode($student_details['user_pincode']);
                        if($res != null){
                            $student_details['user_district']=$res['district_name'];
                        } else {
                            $student_details['user_district']='District';
                        }
                        $student_details['user_photo'] = "default_photo.png";
                        // Student Details Ended

                        // Parent Detail - Not Capturing ...
                        // log_message('debug','User Details are captured');
                        // $parent_details = array();
                        // $parent_details['first_name']       = $student->parent_name;
                        // $parent_details['last_name']        = '';
                        // $parent_details['middle_name']      = '';
                        // $parent_details['user_email']       = '';
                        // $parent_details['user_phone']       = $student->mobile;
                        // $parent_details['user_address']     = $student->address;
                        // $parent_details['user_city']        = $associate_city;
                        // $parent_details['user_state']       = $associate_state;
                        // $parent_details['user_country']     = $associate_country;
                        // $parent_details['user_pincode']     = $associate_pincode;
                        // if($res != null){
                        //     $parent_details['user_district']=$res['district_name'];
                        // }
                        // else{
                        //     $parent_details['user_district']='District';
                        // }
                        // log_message('debug','Parent details are captured');


                        // Check if student exists usk
                        $student_email = $student_details['user_email'];
                        $student_registration_status = $this->register_model->get_details($student_email);

                        if($student_registration_status == false) {
                            log_message('debug','User Email : '.$student_email.' User Does Not Exists Now Going to Be Created !');

                            // Create User           
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

                            // Action : Send Verification link to Student
                            $email_subject = 'Welcome to '.PRODUCT_NAME;
                            $student_message_body = 'Dear '.$student_details['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$std_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 

                            // Sriram commented becouse we are not sending email directly 
                            // $this->sendemail_model->set_send_email($student_details['user_email'],$email_subject,$student_message_body);
                            // $this->send_mail($student_details['user_email'],$student_details['first_name'],$std_ack);

                            // sending email via crone job table..
                            $this->sendemail_model->email_on_adduser($student_details['user_email'],$email_subject,$student_message_body);
                                
                            // Send Verification link to Parent
                            // if($parent_email_status == true) {
                            //     // log_message('debug','Parent Email Sending .. Bock');
                            //     $student_message_body = 'Dear '.$parent_details['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$parent_ack.'">Click to verify</a></h3><br><br>Thank you<br>'.PRODUCT_NAME.'<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                            //     $this->sendemail_model->set_send_email($parent_details['user_email'],$email_subject,$student_message_body);
                            //     // $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);          
                            // }
                        } else {
                            log_message('debug','User : '.$student_email.' User Already Exists >> Moving To Course Subscription  !');
                    	} // end of if 
                        // User Creation Ended ----------------------------------------------------
                                
                        // User Couser Subscription Begning -----
                        $student_course = $student->course; // Getting Course Name From Array
                        $student_course_subscription = $this->register_model->is_student_course_details_exists($student_email,$student_course); // Checking for user_email and Course name
                        $student_details = $this->user_model->get_user_details($student_email); // Getting student email details
                        $student_id = $student_details['user_id']; // Getting student user_id
                    
                        // Checking If the User Has Already Subscribed ! ---
                        if($student_course_subscription == null){
                            /*------------ Adding Students to batch in associate bulk upload ------------ */
                            $course_name = $student->course;
                            $course = $this->resource_model->get_course_id($course_name);
                            // log_message('debug','course resutl '.var_dump($course),true);
                            $course_id = $course['course_id']; //please get dynamically
                            $course_fee = $course['course_fee'];

                            // Please Add Course Fee for the course 
                            $batch_data = array(
                                                'batch_name'    => $user_details['user_state'],
                                                'user_id'       => $student_id,
                                                'course_id'     => $course_id,
                                                'batch_type'    => 'Associate',
                                                'associate_id'  => $user_details['user_id'],
                                                'course_fee'    => $course_fee,                 //$student->cost,
                                                'transaction_id'=> $transaction_id
                                               );
                            log_message('debug','User : '.$student_email.' Course Name : '.$course_name.' Course Subscription Done');
                            $this->batch_model->add_student_to_batch($batch_data);
                        } else {
                            log_message('debug','User : '.$student_email.' Course Name : '.$course_name.' Already Exists');
                        }
                    }
            	//  }   // end for if isset
                // Load Dashboard 
                log_message('debug','Data is saved in student_bulk_upload table'); 
                $data['my_courses'] = $this->batch_model->my_courses($user_id);
                $data['all_courses'] = $this->batch_model->all_course('Student');
                $data['associate_student_count'] = $this->user_model->get_associate_students($user_id);
                $data['associate_course_count']  = $this->user_model->get_associate_courses($user_id,'Student');
                $data['students_under_associate'] = $this->user_model->get_student_under_associate($user_id,'student_count');
                $this->load->view('associate/dashboard_right',$data);
                // --------------------------------------------------------------
            } else if ( $to_be_done == 'save') {
                //Deleting Previously saved record's to enter them freshly
                $this->batch_model->delete_previously_saved_records($user_id);

                //Saving Data into Student Bulk Upload table
                $student_array1 =json_decode($student_array);           
                foreach($student_array1 as $student){
                    $student_email  = $student->email;
                    $student_course = $student->course;

                    if(is_array($student_course)){
                        // log_message('debug','########### Inside foreach Email '.print_r($student_course,TRUE));
                        foreach ($student_course as $res){
                            // check if the student already exists 
                            $result = $this->register_model->is_student_course_details_exists($student_email,$res);
                            if($result != null){
                                // $total_amount = $total_amount - $student->cost;
                                // log_message('debug','########### Inside if ');
                            } else {
                                $data = array(
                                    'first_name'    => $student->fname,
                                    'last_name'     => $student->lname,
                                    'email'         => $student->email,
                                    'mobile'        => $student->mobile,
                                    'parent_name'   => $student->parent_name,
                                    'address'       => $student->address,
                                    'course'        => $res,   
                                    'associate_id'  => $user_id,
                                    'cost'          => '0',
                                    'transaction_id'=> 0
                                    );
                                $res = $this->batch_model->student_bulk_insert($data);
                                log_message('debug','User Bulk Data Added RES :'.$res);
                            }
                        }
                    }
                }
                // Saving User Data is Done.
                log_message('debug','>> User Data Saved :)');
                log_message('debug','Data is saved in student_bulk_upload table'); 
                $data['my_courses'] = $this->batch_model->my_courses($user_id);
                $data['all_courses'] = $this->batch_model->all_course('Student');
                $data['associate_student_count'] = $this->user_model->get_associate_students($user_id);
                $data['associate_course_count']  = $this->user_model->get_associate_courses($user_id,'Student');
                $data['students_under_associate'] = $this->user_model->get_student_under_associate($user_id,'student_count');
                $this->load->view('associate/dashboard_right',$data);
            } else {
                echo " Ohh Somthing gone wrong, Unable to send Email";
            }
        }
    }
    // ---------------------------------------------------------------------------------------------------------------------------

    // Action -> Add New User
    private function add_new_user($input_array,$user_type) {
        $result = array();
        $activation_code = md5(uniqid($input_array['user_email'].time()));
        // Do DB Call To Get MAX Count of user ID 
        
        switch ($user_type) {
            case '1':
                $usertype = 'User';
                $input_array['registration_no'] = "TEMP".date('Y')."ST".date('mhms');
                break;
            case '2':
                $usertype = 'Parent';
                $input_array['registration_no'] = "TEMP".date('Y')."PR".date('mhms');
                break;
            case '3':
                $usertype = 'SPOC'; 
                $input_array['registration_no'] = "TEMP".date('Y')."AS".date('mhms');
                break;
            case '4':
                $usertype = 'Registrar';
                $input_array['registration_no'] = "TEMP".date('Y')."RA".date('mhms');
                break;
            case '5':
                $usertype = 'Accountant';
                $input_array['registration_no'] = "TEMP".date('Y')."AC".date('mhms');
                break;
            case '6':
                $usertype = 'Mentor/SME';
                $input_array['registration_no'] = "TEMP".date('Y')."CD".date('mhms');
                break;
            case '7':
                $usertype = 'SuperAdmin';
                $input_array['registration_no'] = "TEMP".date('Y')."GM".date('mhms');
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

    private function send_mail($email,$user_name,$activation_code){
        //$ques_id=$this->input->post('ques_id');
        //$student_name=$this->user_model->get_user_name_by_mail($address);
        log_message('debug','Sending Email to '.$email.' user name '.$user_name);
        $encrypted_string = $activation_code;

        $address=$email;
        $time=date('Y-m-d H:i:s');
        
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

    // Action validate for student email   
    function check_student_email(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $emailid = $this->input->post("email_");
            log_message('debug',' check email '.$emailid);
            $result  = $this->batch_model->registered_student_email($emailid);
            if($emailid==$result) {
                return $result;
            }
                return null;
        }
    }

    // Action Get All His Batches 
    function get_MyBatchs($user_id){
        $result = $this->batch_modal->get_batchs($user_id);
        if($result != null){
            return $result;
        }
        return null;
    }

    // Action Get All His Paied Batches 
    function get_MyPaidBatchs($user_id){
        $result = $this->batch_modal->get_paied_batchs($user_id);
        if($result != null){
            return $result;
        }
        return null;
    }
    
    // getting all course selected of associate
    function course_tree(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $course_id = $this->input->post('course_id');
            $data['course_details'] = $this->resource_model->get_courses_details($course_id);
            $data['course_tree'] = $this->resource_model->course_tree($course_id);
            $course_details = $data['course_details'];
            // Setting Current Session Details : Course ID , Course Name
            $this->session->set_userdata('CR_course_id',$course_id);
            $this->session->set_userdata('CR_course_name',$course_details['course_name']);
            log_message('debug','---------------------------------------------------------');
            log_message('debug','| Current Session Details');
            log_message('debug','| Current Course ID   > '.$course_id);
            log_message('debug','| Current Course Name > '.$course_details['course_name']);
            log_message('debug','---------------------------------------------------------');
            // Loading Coure Tree View
            $this->load->view('associate/course_tree',$data);
        }
    }

    public function get_course_batch(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $course_id = $this->input->post('course_id');
            $result = $this->batch_model->get_batchs($course_id);
            if($result != null){
                $data['course_batches'] = $result;
                $this->load->view('associate/show_course_batch_modal',$data);
                // echo var_dump($result);
            }
        }
    }

    // Action -> Join Course Batch : Note Inputs are USER ID, BATCH ID, COURSE ID
    public function subscribe_course(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id    = $this->session->userdata('user_id');
            $batch_id   = $this->input->post('batch_id');
            $course_id  = $this->input->post('course_id');
            $result = $this->batch_model->subscribe_course($user_id,$batch_id,$course_id);
            if($result != null){
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    public function save_associate_qualification(){
        log_message('debug','****************** AJAX PDF Upload START ******************');
        $associate['user_id'] = $this->session->userdata('user_id');
        $user_details = $this->session->all_userdata();
        $status = "";
        $msg    = "";
        $file_element_name = 'upload';
        $associate['degree'] = $this->input->post('degree');
        $associate['expertise']  = $this->input->post('expertise');
        $associate['course_handel'] = $this->input->post('course_handel');
        $associate['course_handel'] = '1';

        log_message('debug',' degree :'.$associate['degree']);
        log_message('debug',' expertise  :'.$associate['expertise']);
        log_message('debug',' course_handel  :'.$associate['course_handel']);

        if ($status != "error") {
            $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/resource/associate_record';
            $config['allowed_types']    = 'pdf|jpg|png'; // OLD 'gif|jpg|png|doc|txt';
            $config['max_size']         = 1024 * 200;
            $config['encrypt_name']     = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                $image_path = $data['full_path'];
                log_message('debug','file uploaded : '.$data['file_name']);

                if(file_exists($image_path)) {
                    $status = "success";
                    $associate['upload'] = $data['file_name'];
                    $result = $this->register_model->upload_associate_details($associate);
                    if($result != null){
                        $msg = "File successfully uploaded";

                        /* Email send to Admin and Associate*/
                        $this->load->helper('skol_system_helper');
                        $message_body = associate_docs_status($user_details);
                        $message_body_admin = associate_docs_admin_templet($user_details);
                        send_email_test($user_details['user_email'],'Associate Test',$message_body);
                        send_email_test(EMAIL_USERID,'Admin Test',$message_body_admin);
                        /*Email code ends here..*/                                          
                 }   
                } else {
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
        log_message('debug','****************** AJAX PDF Upload ENDED ******************');
    }

    //Action -> SKOL joining Fee payment by Associate
    function joining_fee_payment(){
        $user_id = $this->session->userdata('user_id');
        $amount  = $this->input->post('cost');
        $subjects = $this->input->post('subjects');
        $length = sizeof($subjects);
        $associate_subject = ''; 
        $payment_for = "";
        $this->session->set_userdata('subjects',$subjects);
        $this->session->set_userdata('amount',$amount);
        $this->session->set_userdata('no_of_subjects',$length);
        $this->session->set_userdata('payment_for','subject_subscription');
        
        // log_message('debug','Amount is '.$amount);
        $total_amount = $this->input->post('total_amount');
        
        $data['subject_registration']=True;
        $data['student_course_subscription']='';
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
    }

    function mystudents_reports(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->session->userdata('user_id');
            $associate_paid_status = $this->is_associate_paid($user_id);
            if($associate_paid_status){
                if($associate_paid_status['payment_status'] == '2'){
                    // $data['courses']=$this->resource_model->get_all_courses();
                    // $data['courses']= $this->batch_model->associate_available_course($user_id,'Student');
                    $data['courses']= $this->batch_model->get_add_students_course_list($user_id,'Student');
                    $this->load->view('associate/mystudents_assessments_reports',$data);
                }
                if($associate_paid_status['payment_status'] == '8'){
                    $this->load->view('associate/associate_payment_progress');
                }
            }else{
                log_message('debug','Associate Has Not Subscribed for Subject');
                // $data['subjects'] = $this->batch_model->get_subjects_details();
                $user_id = $this->session->userdata('user_id');
                $subjects_list      = $this->batch_model->get_subject_list();
                // log_message('debug',print_r($subjects_list,true));  
                if(isset($subjects_list)){
                    foreach ($subjects_list as $key => $subject) {
                        // log_message('debug',print_r($subject['subject_id'],true));  
                        if($this->user_model->is_associate_has_subject($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                        if($this->payment_model->isThere_spoc_quote_for_this_aoi($user_id,$subject['subject_name'])){
                            unset($subjects_list[$key]);
                        }
                    }
                }  
                if(sizeof($subjects_list) > 0){
                    $data['subjects'] = $subjects_list;
                } else {
                    $data['subjects'] = null;
                }
                $this->load->view('associate/associate_join_subject',$data);
            }
        }
    }

    function get_all_tests(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $course_id = $this->input->post('course_id');
            $data['tests'] = $this->user_model->get_students_test($course_id);
            $this->load->view('associate/test_list',$data);
        }
    }

    function mystudents_ranks(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $associate_id   = $this->session->userdata('user_id');
            $batch_name     = $this->session->userdata('user_state');
            $test_no        = $this->input->post('test_no');
            $course_id      = $this->input->post('course_id');

            $data['mystudents']     = $this->batch_model->get_mystudents($associate_id);
            $data['national_ranks'] = $this->report_model->get_student_ranks($test_no,$course_id);


            // $data['mystudents']     = $this->batch_model->get_mystudents($associate_id);
            // change here
            $data['batchwise_ranks'] = $this->report_model->get_batchwise_student_ranks($test_no,$batch_name,$course_id);
            $this->load->view('associate/student_rank_details',$data);
        }
    }

    function mystudents_ranks_batch_level(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $associate_id   = $this->session->userdata('user_id');
            $batch_name     = $this->session->userdata('user_state');
            $test_no        = $this->input->post('test_no');
            $course_id      = $this->input->post('course_id');

            $data['mystudents']     = $this->batch_model->get_mystudents($associate_id);
            $data['national_ranks'] = $this->report_model->get_batchwise_student_ranks($test_no,$batch_name,$course_id);
            $this->load->view('associate/student_rank_details',$data);
        }   
    }

    function mystudents(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $associate_id       = $this->session->userdata('user_id');
            $data['mystudents'] = $this->batch_model->get_mystudents_details($associate_id);
            $this->load->view('associate/mystudents_details',$data);
        }
    }

    //trile starts here

    function get_my_user(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $associate_id      = $this->session->userdata('user_id');
            
            // $data['my_user'] = $this->batch_model->get_mystudents_details($associate_id);
            $data['mystudents'] = $this->batch_model->get_mystudents_details($associate_id);
            $this->load->view('associate/mystudents_details',$data);
        }
    }

    //trile ends here 

    // In student bulkupload to add student modal
    function addstudentModal(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            
            $this->load->view('associate/add_bulk_student_modal');
        }
    }
    
    // In student bulkupload to edit student modal
    function editstudentModal(){
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $data['fname']       = $this->input->post('fname');
            $data['lname']       = $this->input->post('lname');
            $data['mobile']      = $this->input->post('mobile');
            $data['email']       = $this->input->post('email');
            $data['parent_name'] = $this->input->post('parent_name');
            $data['address']     = $this->input->post('address');
            $data['course']      = $this->input->post('course');
            $data['cost']        = $this->input->post('cost');
            $data['row_id']      = $this->input->post('row_id');
            log_message('debug','Edit Student Modal AS: Row ID:'.$data['row_id']);
            $this->load->view('associate/update_student_modal',$data);
        }
    }

    // Action : Get This Student available course in add student bulk registration page
    public function available_student_course(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_email = $this->input->post('user_email');
            log_message('debug','user_email : '.$user_email);

            $user    = $this->user_model->get_student_bulk_record_details($user_email);
            // $courses = $this->user_model->load_associate_subject($user_email); 
            $courses = $this->user_model->get_student_course();
            // log_message('debug','ggggggggg '.print_r($courses));  
            
            // ----------------------------------------------------------
            if(isset($user)){
                foreach($courses as $key => $course){
                    log_message('debug','CAptured  Here ................... '.$course['course_name']);  
                    
                    if($this->user_model->get_mapped_course($user[0]['user_id'],$course['course_id'])){
                        unset($courses[$key]);
                        log_message('debug','mapped',print_r($course['course_id'],true));
                     } else {
                     }
                }    
                $data['course_list'] = $courses;  
                log_message('debug','!!!!!!!!!!!'.print_r($courses));
              
                $data['students_details'] = $user;
                // $this->load->view('registrar/student_course_link_view',$data);      
                $this->load->view('associate/available_student_course',$data);
            } else {
                
                // $courses = $this->user_model->load_associate_subject($user_email);
                $courses    = $this->user_model->get_student_course();
                $data['course_list'] = $courses;
                log_message('debug','##################### '.print_r($courses));
                $this->load->view('associate/available_student_course',$data);
               
                
            }
            // ----------------------------------------------------------
        }
    }

    // Action: Delete previously saved records student bulk data
    function delete_previously_saved_records(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $user_id = $this->session->userdata('user_id');
            log_message('debug','Deleting Preiously Saved DATA of user_id '.$user_id);
            //Deleting Previously saved record's to enter them freshly
            $result = $this->batch_model->delete_previously_saved_records($user_id);
            echo $result;
        }  
    }

    // Action : Get all My Quotes List 
    function get_all_my_quotes_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $user_id = $this->session->userdata('user_id');
            $data['my_quotes_list'] = $this->payment_model->get_all_this_spoc_quotes($user_id);
            log_message('debug','SPOC List Brought ');
            $this->load->view('payment/request_quotation_area',$data);
        }
    }

    // Action : getting user details of perticular spoc
    public function sopc_user_details() {
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $child_id = $this->input->post('user_id');
            $this->session->set_userdata('CR_child_id',$child_id);
            $child_details = $this->user_model->get_userid_details($child_id);
            $this->session->set_userdata('CR_child_batch',$child_details['user_state']);
            // log_message('debug','current child id is '.$child_id);
            $this->load->view('associate/spoc_user_details');
        }
    }

    // Action : Parents List
    public function spoc_user_details_list(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $user_id = $this->session->userdata('CR_child_id');
            // $data['user_details']    = $this->session->all_userdata();
            $data['parents_details'] = $this->user_model->get_parent_child_list_view($user_id);
            // log_message('debug','PArent details are '.$parents_details);
            $this->load->view('associate/spoc_user_details_list',$data);
        }
    }

    // Action : 
    public function course_of_test(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $child_id = $this->session->userdata('CR_child_id');
            // $data['course_of_test_details'] = $this->user_model->get_course_of_test();
            $data['course_of_test_details'] = $this->batch_model->get_my_paid_courses($child_id);
            // log_message('debug',"================= Modal ================= ".print_r($data['course_of_test_details'],true));
            $this->load->view('associate/course_list',$data);
        }
    }

    // Action : loading subscribed course of his User   
    public function load_user_subscribed_course(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
          
            $child_id = $this->session->userdata('CR_child_id');
            $data['all_myuser_courses'] = $this->batch_model->get_my_paid_courses($child_id);

            $this->load->view('associate/user_graph',$data);
            // $data['get_my_montly_score'] = $this->user_model->get_my_montly_score($child_id,'percentage');
        }
    }

    // Processing creation of urse,sending mail if urse is new 
    public function bulk_user_registration(){

        if($this->input->server('REQUEST_METHOD') == 'POST'){
        log_message('debug','***************');
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
        
        // Checked up to here ..............
            if($offline_payment_for == "associate_subject_subscription"){
                log_message('debug','@@@@@@@@@@@@@@@ associate_subject_subscription '.print_r($offline_payment_for,true));
                $length = $this->session->userdata('no_of_subjects');
                $subjects = $this->session->userdata('subjects');
                if ($length >0){
                    $transaction_description = $subjects[0];
                }
                for ($i=1;$i<$length;$i++){
                    $transaction_description = $transaction_description." - ".$subjects[$i];
                }
                // log_message('debug','?????//??????? Transaction description is '.print_r($transaction_description,true));
            }else if($offline_payment_for == "student_course_subscription"){
                
                log_message('debug','@@@@@@@@@@@@@@@ student_course_subscription '.print_r($offline_payment_for,true));
                $transaction_description = $this->session->userdata('course_name');
                log_message('debug','********************Transaction description is '.$transaction_description);
            }else if($offline_payment_for == "student_bulk_upload"){

                log_message('debug','@@@@@@@@@@@@@@@ student_bulk_upload '.print_r($offline_payment_for,true));
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
                'total_amount' => $total_amount
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
                    log_message('debug','@@@@@@@@@@@@@@ associate_subject_subscription1 '.print_r($offline_payment_for,true));
                    
                    $length = $this->session->userdata('no_of_subjects');
                    $subjects = $this->session->userdata('subjects');
                    $amount = $this->session->userdata('amount');               
                    for ($i=0;$i<$length;$i++){
                        $associate_subject = array(
                            'user_id' => $user_id,
                            'subject_name' => $subjects[$i],
                            'subject_fee'  => $amount[$i],
                            'transaction_id'=> $transaction_id,
                        );
                        $result = $this->batch_model->subscribe_subject($associate_subject);
                    }
                    echo "true";
                }else if($offline_payment_for == "student_course_subscription"){

                    log_message('debug','@@@@@@@@@@@@@@ student_course_subscription1 '.print_r($offline_payment_for,true));
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
                    log_message('debug','@@@@@@@@@@@@@@ student_bulk_upload1 '.print_r($offline_payment_for,true));

                        $user_id = $this->session->userdata('user_id');
                        $user_email = $this->session->userdata('user_email');
                        $unpaid_students   = $this->batch_model->get_associate_unpaid_student($user_id);
                        $associate_data = $this->register_model->get_details($user_email);
                        $associate_city = $associate_data['user_city'];
                        $associate_state = $associate_data['user_state'];
                        $associate_country = $associate_data['user_country'];
                        $associate_pincode = $associate_data['user_pin'];
                        $count = 0;
                        log_message('debug',' &&&&&&^^^^^^&&&&& > The students are : '.print_r($unpaid_students),TRUE);
                        foreach($unpaid_students as $student){

                            $count = $count+1;
                            log_message('debug','&&&&&&^^^^^^&&&&& Details count of '.$count.' Unpaid Student '.print_r($unpaid_students,true));
                           
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
// commented
                            // log_message('debug','Student details are captured');
                            // $parent_details = array();
                            // $parent_details['first_name']       = $student->parent_name;
                            // $parent_details['last_name']        = '';
                            // $parent_details['middle_name']      = '';
                            // $parent_details['user_email']       = '';
                            // $parent_details['user_phone']       = $student->mobile;
                            // $parent_details['user_address']     = $student->address;
                            // $parent_details['user_city']        = $associate_city;
                            // $parent_details['user_state']       = $associate_state;
                            // $parent_details['user_country']     = $associate_country;
                            // $parent_details['user_pincode']     = $associate_pincode;
                            // if($res != null){
                            //     $parent_details['user_district']=$res['district_name'];
                            // }
                            // else{
                            //     $parent_details['user_district']='District';
                            // }
                            // log_message('debug','Parent details are captured');

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

                                log_message('debug','&&&&&&^^^^^^&&&&& User registration status ');

                                // Create Parent
                                $user_type = 2;
                            // $parent_email_status=false;
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

                                log_message('debug','&&&&&&^^^^^^&&&&& Email Sending part '.print_r($configs,true));
                                $email_subject = 'Welcome to Ask Analytics';
                                // Send Verification link to Student

                                $student_message_body = 'Dear '.$student_details['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$std_ack.'">Click to verify</a></h3><br><br>Thank you<br>Ask Analytics<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                                $this->sendemail_model->set_send_email($student_details['user_email'],$email_subject,$student_message_body);

                                // $this->send_mail($student_details['user_email'],$student_details['first_name'],$std_ack);
                                
                                    // Send Verification link to Parent
                                // if($parent_email_status == true) {
                                    // log_message('debug','Parent Email Sending .. Bock');
                                // $student_message_body = 'Dear '.$parent_details['first_name'].', <br> Thank you for Joining with us ! . <br> Please click the below link to verify your email id <br><h3><a href="'.DOMAIN_PROTOCOL.'://'.DOMAIN_HOST.':'.DOMAIN_PORT.'/registration/verify/?ack_code='.$parent_ack.'">Click to verify</a></h3><br><br>Thank you<br>SKOL System<br><br><h5>sent: '.date("d-M-Y").'</h5><br>'; 
                                // $this->sendemail_model->set_send_email($parent_details['user_email'],$email_subject,$student_message_body);
                                    // $this->send_mail($parent_details['user_email'],$parent_details['first_name'],$parent_ack);          
                                // }
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
                                $course_fee = $course['course_fee'];

                                // Please Add Course Fee for the course 
                                $batch_data = array(
                                            'batch_name'    => $associate_state,
                                            'user_id'       => $student_id,
                                            'course_id'     => $course_id,
                                            'batch_type'    => 'Associate',
                                            'associate_id'  => $user_id,
                                            'course_fee'    => $course_fee,
                                            // 'course_fee'    => $student->cost,
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

    public function license_request(){
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            $data['urse_fname']      = $this->input->get('urse_fname');
            $data['registration_no'] = $this->input->get('registration_no');
            $data['subject_name']    = $this->input->get('subject_name');

            $this->load->view('associate/request_license',$data);
            
        }
    } 
    
    // Action : send email to admin for requesting license 
    public function send_license_request(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $mail_subject = $this->input->post('mail_subject');
            $mail_body    = $this->input->post('mail_body');
            $license      = $this->input->post('license');
           
            $email_send = $this->sendemail_model->send_license_request($mail_subject,$mail_body,$license);
        }
    }

}
