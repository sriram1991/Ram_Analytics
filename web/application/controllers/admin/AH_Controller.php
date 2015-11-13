<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AH_Controller extends AM_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('resource_model');
        $this->load->model('report_model');
        $this->load->model('batch_model');
        $this->load->model('user_model');
        $this->load->model('pincode_model');
        $this->load->model('payment_model');
        $this->load->model('sendemail_model');
    }

    public function index(){
    	$data['data'] = $this->session->all_userdata();
        $data['flash_msg'] = $this->session->flashdata('success_msg');
        $data['user_home'] = "/admin_home";
        $data['role_view'] = "admin/admin_body_leftpan";
        $this->load->view('user_header',$data);
        $this->load->view('user_body_leftpan');
        $this->load->view('user_body_rightpan');
        $this->load->view('user_footer');
        log_message('debug', 'Admin home');
    }

    //---------------------------------------------------------------------------------------//
    // Admin Dashboard View List Count of users 
    //---------------------------------------------------------------------------------------//
        // Action : Admin Dashboard View
        public function admin_dashboard() {
            if($this->input->server('REQUEST_METHOD') == 'GET') {
                $data['user_details']    = $this->session->all_userdata();
                $data['course_count']    = $this->resource_model->get_course_count();
                $data['students_count']  = $this->user_model->get_user_count(1);
                $data['parent_count']    = $this->user_model->get_user_count(2);
                $data['associate_count'] = $this->user_model->get_user_count(3);
                $data['mentor_count']    = $this->user_model->get_user_count(6);

                /* start of Bar chart code */
                $data['student_data'] = $this->user_model->get_all_students_and_associates(1,'student_count');
                $data['associate_data'] = $this->user_model->get_all_students_and_associates(3,'associate_count');
                /* End of Bar chart code */

                /*start of pie chart*/
                $data['pie_chart'] = $this->user_model->get_student_for_each_course('course_count');
                $this->load->view('admin/admin_dashboard',$data);
                 
                /*End of pie chart*/
            }
        }

    //---------------------------------------------------------------------------------------//


    //---------------------------------------------------------------------------------------//
    // Content Directors Management Create , List , Assign Subject  
    // Note : Deletion and De-Activition is taken care in Registration admin
    //---------------------------------------------------------------------------------------//

        // Action : Display content Director page
        public function content_director_page(){
            if($this->input->server('REQUEST_METHOD') == 'GET'){
                $this->load->view('admin/contents_director/directors_page');
            }
        }

        // Action : Directors List
        // public function directors_list(){
        //     if($this->input->server('REQUEST_METHOD') == 'POST'){
        //         $data['director_details'] = $this->user_model->get_director_list(6);
        //         $this->load->view('admin/contents_director/directors_list',$data);
        //     }
        // }

        // Action : Directors List
        public function directors_list(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['director_details'] = $this->user_model->get_director_group_concat_list(6);
                $this->load->view('admin/contents_director/directors_list',$data);
            }
        }

        // Action->Load Add Directors Modal view
        public function add_director_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                log_message('debug','****************** AH controller Add Directors Moda REQ View START ******************');
                $data['subject_list'] = $this->resource_model->get_all_subjects();
                $data['indian_state'] = $this->pincode_model->get_indian_states();            
                $this->load->view('admin/contents_director/add_director_modal',$data);
                log_message('debug','****************** AH controller Add Directors Moda REQ View ENDED ******************');    
            }
        }

        // Action->Load Edit Directors Modal view
        public function edit_director_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                log_message('debug','****************** AH controller Edit Directors Moda REQ View START ******************');
                $user_id                    = $this->input->post('user_id');
                $data['director_details']   = $this->user_model->get_content_director_details($user_id);
                $data['director_subjects']  = $this->user_model->get_director_details($user_id);
                $data['subject_list']  = $this->resource_model->get_all_subjects();
                // $data['subject_array'] = $this->resource_model->get_all_subjects_array();
                // $data['indian_state'] = $this->pincode_model->get_indian_states();            
                $this->load->view('admin/contents_director/edit_director_modal',$data);
                log_message('debug','****************** AH controller Edit Directors Moda REQ View ENDED ******************');    
            }
        }

        

    //---------------------------------------------------------------------------------------//


    // Course Creation Subject Creatoin Publish Course and modules and assessment

    //---------------------------------------------------------------------------------------//
    // Subjects Management  
    //---------------------------------------------------------------------------------------//

        // Action : Load Subject View Page
        public function subject_view() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                // $data['subject_details'] = $this->resource_model->get_all_subjects();
                $data['subject_details'] = $this->resource_model->get_all_subjects_with_course_status();
                $this->load->view('admin/course_subject_management/subject_view',$data);
            }
        }


        // Action : Load Subject Modal View
        public function add_subject_modal(){
            log_message('debug','****************** Admin Subject Modal REQ View START ******************');
            $this->load->view('admin/course_subject_management/add_subject_modal');
            log_message('debug','****************** Admin Subject Modal REQ View ENDED ******************');
        }

        public function add_subject() {
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $subjects['subject_name'] = $this->input->post('subject_name');
                $subjects['description']  = $this->input->post('subject_description');
                $subjects['subject_fee']  = $this->input->post('subject_fee');
                // add data in resource master table 
                $result = $this->resource_model->add_subject($subjects);

                log_message('debug',"Subjects Resource result ".$result);

                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }

            }
        }

        //Action: Load Edit Sub Modal View
        public function edit_sub_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $subject_id = $this->input->post('sub_id');
                $data['subject_details'] = $this->resource_model->get_subject_details($subject_id);
                log_message('debug','****************** Admin Edit Sub Modal REQ View START ******************');
                $this->load->view('admin/course_subject_management/edit_sub_modal',$data);
                log_message('debug','****************** Admin Edit Sub Modal REQ View ENDED ******************');
            }
            
        }


        // Action : Edit Subject Link
        public function update_subject() {

            log_message('debug','Content Admin Update Subject Called');
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug',"Content Admin POST Update Subject Called");
                $subjects_details['subject_name']           = $this->input->post('subject_name');
                $subjects_details['subject_description']    = $this->input->post('subject_description');
                $subjects_details['subject_fee']            = $this->input->post('subject_fee');
                $subjects_details['subject_id']             = $this->input->post('subject_id');
                // Edit data in subject master table 
                $result = $this->resource_model->update_subject_details($subjects_details);
                log_message('debug',"Edit Subject result ".$result);

                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }



        // Action : Delete Subject
        public function delete_subject() {
            log_message('debug','Content Admin Delete Delete Subject Called');
            
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug',"Content Admin POST Delete Subject Called");

                $subject_id  = $this->input->post('subject_id');
                $result = $this->resource_model->delete_subject($subject_id);
                
                if($result == 1) {
                    log_message('debug','Subject Resource Deleted ');
                    echo "true";  
                } else {
                    echo "false";
                }

                log_message('debug',"Subject Resource Deleted sub_id ".$subject_id." result: ".$result);
            }
        }

    //---------------------------------------------------------------------------------------//


    //---------------------------------------------------------------------------------------//
    // Course Management  
    //---------------------------------------------------------------------------------------//

        // Action : Load Course View Page
        public function course_view() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $data['course_details'] = $this->resource_model->get_all_courses();
                $this->load->view('admin/course_subject_management/course_view',$data);
            }
        }

        // Action : Load Course Modal View
        public function add_course_modal(){
            log_message('debug','****************** Admin Course Modal REQ View START ******************');
            $this->load->view('admin/course_subject_management/add_course_modal');
            log_message('debug','****************** Admin Course Modal REQ View ENDED ******************');
        }

        // Action : Add Course Data in DB & Syllabus PDF File upload 
        public function add_course_with_syllabus(){
            log_message('debug','****** GM Admin AJAX Add Course Data in DB & Syllabus PDF File upload START *****');
            $status = "";
            $msg    = "";
            $file_element_name = 'course_syllabus_file';
            $courses['course_name']         = $this->input->post('course_name');
            $courses['course_description']  = $this->input->post('course_description');
            $courses['course_duration']     = $this->input->post('course_duration');
            $courses['course_type']         = $this->input->post('course_type');
            $courses['course_fee']          = $this->input->post('course_fee');
            $courses['course_status']       = $this->input->post('course_status');
            $course_syllabus_file           = $_FILES['course_syllabus_file'];
            log_message('debug',' course_name           :'.$courses['course_name']);
            log_message('debug',' course_description    :'.$courses['course_description']);
            log_message('debug',' course_duration       :'.$courses['course_duration']);
            log_message('debug',' course_type           :'.$courses['course_type']);
            log_message('debug',' course_fee            :'.$courses['course_fee']);
            log_message('debug',' course_status         :'.$courses['course_status']);
            
            if($course_syllabus_file['name'] != null){
                log_message('debug',' course_syllabus_file  :'.$course_syllabus_file['name']);
                // START CHECKING FOR FILE UPLOAD
                if ($status != "error") {
                    $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/resource/course_syllabus';
                    $config['allowed_types']    = 'pdf'; // OLD 'gif|jpg|png|doc|txt';
                    $config['max_size']         = 1024 * 8; // 30MB
                    $config['encrypt_name']     = FALSE;
                    $this->load->library('upload', $config);
                    // File is being uploaded
                    if (!$this->upload->do_upload($file_element_name)) {
                        $status = 'error';
                        $msg = $this->upload->display_errors('', '');
                    } else {
                        $data = $this->upload->data();
                        $File_path = $data['full_path'];
                        log_message('debug','file uploaded : '.$data['file_name']);

                        if(file_exists($File_path)) {
                            $status = "success";
                            $courses['course_syllabus_file'] = $data['file_name'];
                            // add data in course master table 
                            $result = $this->resource_model->add_course($courses);
                            $msg = "File successfully uploaded";
                        } else {
                            $status = "error";
                            $msg = "Something went wrong while saving the file, please try again.";
                        }
                    }
                    // @unlink($_FILES[$file_element_name]);
                }
                echo json_encode(array('status' => $status, 'msg' => $msg));
            } else {
                log_message('debug','Course_syllabus_file  : No File Selected !');
                $courses['course_syllabus_file'] = 'NULL';
                // add data in course master table 
                $result = $this->resource_model->add_course($courses);
                if($result == 1) { 
                    $status = "success";
                    $msg    = "Course Created Successfully !";
                    echo json_encode(array('status' => $status, 'msg' => $msg));
                } else { 
                    $status = "error";
                    $msg    = "Something went wrong while saving the file, please try again.";
                    echo json_encode(array('status' => $status, 'msg' => $msg));
                }
            }
            log_message('debug','****** GM Admin AJAX Add Course Data in DB & Syllabus PDF File upload ENDED *****');
        }

        // Action : Add Course Data in DB
        public function add_course()
        {
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $courses['course_name']         = $this->input->post('course_name');
                $courses['course_description']  = $this->input->post('course_description');
                $courses['course_duration']     = $this->input->post('course_duration');
                $courses['course_type']         = $this->input->post('course_type');
                $courses['course_fee']          = $this->input->post('course_fee');
                $courses['course_status']       = $this->input->post('course_status');

                // add data in course master table 
                $result = $this->resource_model->add_course($courses);

                log_message('debug',"course Resource result ".$result);

                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }

            }
        }

        //Action: Load Edit Course Modal View
        public function edit_course_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $course_id = $this->input->post('course_id');
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $course_details = $data['course_details'];
                $this->session->set_userdata('CR_course_details',$course_details);
                log_message('debug','****************** Admin Edit Course Modal REQ View START ******************');
                $this->load->view('admin/course_subject_management/edit_course_modal',$data);
                log_message('debug','****************** Admin Edit Course Modal REQ View ENDED ******************');
            }
            
        }

        // Action : update_course_with_syllabus
        public function update_course_with_syllabus(){
            log_message('debug','****** GM Admin AJAX Update Course Data in DB & Syllabus PDF File upload START *****');
            $status = "";
            $msg    = "";
            $file_element_name = 'edit_course_syllabus_file';
            $course_details['course_id']            = $this->input->post('course_id');
            $course_details['course_name']          = $this->input->post('course_name');
            $course_details['course_description']   = $this->input->post('course_description');
            $course_details['course_duration']      = $this->input->post('course_duration');
            $course_details['course_type']          = $this->input->post('course_type');
            $course_details['course_fee']           = $this->input->post('course_fee');
            $course_details['course_status']        = $this->input->post('course_status');
            $course_details['old_course_syllabus']  = $this->input->post('old_course_syllabus');
            $course_syllabus_file                   = $_FILES['edit_course_syllabus_file'];
            log_message('debug','Course ID '.$course_details['course_id']);
            log_message('debug','Course Name '.$course_details['course_name']);
            log_message('debug','Course Desc '.$course_details['course_description']);
            log_message('debug','Course Duration '.$course_details['course_duration']);
            log_message('debug','Course Type  '.$course_details['course_type']);
            log_message('debug','Course Fee  '.$course_details['course_fee']);
            log_message('debug','Course Status '.$course_details['course_status']);
            log_message('debug','OLD Course Syllabus '.$course_details['old_course_syllabus']);
            log_message('debug','NEW Course_syllabus_file  :'.$course_syllabus_file['name']);
            
            // log_message('debug','files i got '.print_r($course_syllabus_file,true));
            if($course_syllabus_file['name'] != null){
                log_message('debug',' course_syllabus_file  :'.$course_syllabus_file['name']);
                // START CHECKING FOR FILE UPLOAD
                if ($status != "error") {
                    $config['upload_path']      = $_SERVER['DOCUMENT_ROOT'].'/static/resource/course_syllabus';
                    $config['allowed_types']    = 'pdf'; // OLD 'gif|jpg|png|doc|txt';
                    $config['max_size']         = 1024 * 8; // 30MB
                    $config['encrypt_name']     = FALSE;
                    $this->load->library('upload', $config);
                    // File is being uploaded
                    if (!$this->upload->do_upload($file_element_name)) {
                        $status = 'error';
                        $msg = $this->upload->display_errors('', '');
                    } else {
                        $data = $this->upload->data();
                        $File_path = $data['full_path'];
                        log_message('debug','file uploaded : '.$data['file_name']);

                        if(file_exists($File_path)) {
                            $status = "success";
                            $course_details['course_syllabus_file'] = $data['file_name'];
                            if($course_details['old_course_syllabus'] != 'NULL'){
                                //@Delete That File
                                $path = $_SERVER['DOCUMENT_ROOT'].'/static/resource/course_syllabus';
                                // unlink($path.'/'.$course_details['old_course_syllabus']); 
                                log_message('debug','File Deleted @ '.$path.'/'.$course_details['old_course_syllabus']);
                            }
                            // update data in course master table with new pdf
                            $result = $this->resource_model->update_course_details($course_details);
                            $msg = "File successfully uploaded";
                        } else {
                            $status = "error";
                            $msg = "Something went wrong while saving the file, please try again.";
                        }
                    }
                    // @unlink($_FILES[$file_element_name]);
                }
                echo json_encode(array('status' => $status, 'msg' => $msg));
            } /*else {
                if($course_details['old_course_syllabus'] != 'NULL'){
                    log_message('debug','OLD Course_syllabus_file  :'.$course_details['old_course_syllabus']);
                    $course_details['course_syllabus_file'] = $course_details['old_course_syllabus'];
                } else {
                    log_message('debug','Course_syllabus_file  : No File Selected !');
                    $course_details['course_syllabus_file'] = 'NULL';
                }
                // Edit data in subject master table 
                $result = $this->resource_model->update_course_details($course_details);
                log_message('debug',"Edit course result ".$result);

                if($result == 1) { 
                    $status = "success";
                    $msg    = "Course Updated Successfully !";
                    echo json_encode(array('status' => $status, 'msg' => $msg));
                } else { 
                    $status = "error";
                    $msg    = "Something went wrong while saving the file, please try again.";
                    echo json_encode(array('status' => $status, 'msg' => $msg));
                }
            }*/
            log_message('debug','****** GM Admin AJAX Update Course Data in DB & Syllabus PDF File upload ENDED *****');
        }

        // upload syllabus in pdf 
        // Action : Edit Subject Link
        public function update_course() {

            log_message('debug','Admin Update course Called');
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug',"Content Admin POST Update course Called");
                $course_details['course_id']            = $this->input->post('course_id');
                $course_details['course_name']          = $this->input->post('course_name');
                $course_details['course_description']   = $this->input->post('course_description');
                $course_details['course_duration']      = $this->input->post('course_duration');
                $course_details['course_type']          = $this->input->post('course_type');
                $course_details['course_fee']           = $this->input->post('course_fee');
                $course_details['course_status']        = $this->input->post('course_status');
                log_message('debug','Course ID '.$course_details['course_id']);
                log_message('debug','Course Name '.$course_details['course_name']);
                log_message('debug','Course Desc '.$course_details['course_description']);
                log_message('debug','Course Duration '.$course_details['course_duration']);
                log_message('debug','Course Type  '.$course_details['course_type']);
                log_message('debug','Course Fee  '.$course_details['course_fee']);
                log_message('debug','Course Status '.$course_details['course_status']);

                // Edit data in subject master table 
                $result = $this->resource_model->update_course_details($course_details);
                log_message('debug',"Edit course result ".$result);

                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }



        
        // Action : Delete course
        public function delete_course() {
            log_message('debug','Admin Delete Delete course Called');
            
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug',"Content Admin POST Delete course Called");
                $path           = $_SERVER['DOCUMENT_ROOT'].'/static/resource/course_syllabus';
                $course_id      = $this->input->post('course_id');
                $course_details = $this->resource_model->get_courses_details($course_id);
                $result         = $this->resource_model->delete_course($course_id);
                
                if($result == 1) {
                    log_message('debug','Course Resource Deleted ');
                    //@Delete That File
                    unlink($path.'/'.$course_details['course_syllabus_file']); 
                    log_message('debug','File Deleted @ '.$path.'/'.$course_details['course_syllabus_file']);
                    echo "true";  
                } else {
                    echo "false";
                }

                log_message('debug',"Course Resource Deleted course_id ".$course_id." result: ".$result);
            }
        }

    //---------------------------------------------------------------------------------------//



    //---------------------------------------------------------------------------------------//
    // Course Syllabus Management pleae use update_syllabus_status for syllabus publish / un publish
    //---------------------------------------------------------------------------------------//
        // Action : manage syllabus
        public function manage_syllabus(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $map_id          = $this->input->post('map_id');
                $resource_status = $this->input->post('resource_status');
                $result = $this->resource_model->update_syllabus_status($map_id,$resource_status);
                if(isset($result)){
                    echo "Updated Status";
                } else {
                    echo "Update Failed";
                }
            }
        }

        //------------------------OLD------------------------Start------------------------------
        // Action : Get Course syllabus view
        public function course_syllabus_view() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $data['course_details'] = $this->resource_model->get_all_courses();
                $this->load->view('content_admin/course_syllabus_view',$data);
            }
        }

        // Action : Get Syllabus List for The Course 
        public function syllabus_list(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $course_id =  $this->input->post('course_id');
                log_message('debug','Syllabus List Course ID: '.$course_id);
                $data['course_details'] = $this->resource_model->get_courses_details($course_id);
                $data['syllabus_list']  = $this->resource_model->get_syllabus_list($course_id);
                $this->load->view('content_admin/syllabus_list',$data); 
            }
        }

        // Action : Load Course Syllabus Resource Modal View
        public function load_csr_modal(){
            log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View START ******************');
            $user_id = $this->session->userdata('user_id');
            $data['module_list']   = $this->resource_model->get_module_list();
            $data['group_list']    = $this->resource_model->get_group_list();
            $data['admin_details'] = $this->resource_model->get_admin_subject($user_id);
            $data['resource_list'] = $this->resource_model->get_all_resources();
            $data['subject_list']  = $this->resource_model->get_all_subjects();
            $this->load->view('content_admin/load_csr_modal',$data);
            log_message('debug','****************** Content Admin Course Syllabus Resource Modal REQ View ENDED ******************');
        }

        // Action : Load Course Syllabus Assessment Modal View
        public function load_csa_modal(){
            log_message('debug','****************** Content Admin Course Syllabus Assessment Modal REQ View START ******************');
            $data['assessment_list'] = $this->resource_model->get_all_resources();
            $data['subject_list']    = $this->resource_model->get_all_subjects();
            $this->load->view('content_admin/load_csa_modal',$data);
            log_message('debug','****************** Content Admin Course Syllabus Assessment Modal REQ View ENDED ******************');
        }

        // Action : Add Syllabus Data in DB
        public function add_syllabus(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $syllabus['course_id']      = $this->input->post('course_id');
                $syllabus['subject_name']   = $this->input->post('subject_name');
                $syllabus['syllabus_type']  = $this->input->post('syllabus_type');
                $syllabus['resource_id']    = $this->input->post('resource_id');
                $syllabus['schedule']       = $this->input->post('schedule');    
                
                // add data in course subject resource map table 
                $result = $this->resource_model->add_syllabus($syllabus);    
                log_message('debug',"ADD Syllabus result ".$result);
                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }

        function change_order_res() {

            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $orderlist = explode(',', $_POST['order']);

                foreach ($orderlist as $order=>$id) {
                    $this->resource_model->change_order_res($order+1,$id);
                }
                //print_r($orderlist) ;
            }
        }

        // Action : Delete course syllabus
        public function delete_syllabus() {
            log_message('debug','Content Admin Delete course syllabus Called');
            
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug',"Content Admin POST Delete course syllabus Called");

                $map_id  = $this->input->post('map_id');
                $result = $this->resource_model->delete_syllabus($map_id);
                
                if($result == 1) {
                    log_message('debug','Course Syllabus Deleted ');
                    echo "true";  
                } else {
                    echo "false";
                }

                log_message('debug',"Course Syllabus Deleted map_id ".$map_id." result: ".$result);
            }
        }
        //------------------------------------------------ OLD Ended --------------------------
        // Action : Get Course list view 

    //---------------------------------------------------------------------------------------//
    

    //---------------------------------------------------------------------------------------//
    // SMS LOG Management 
    //---------------------------------------------------------------------------------------//
        // Action : open smslog dashboard
        public function smslog_dashboard(){
            if($this->input->server('REQUEST_METHOD') == 'GET') { 
                log_message('debug','-- SMS LOG DASHBOARD ----------------');
                $this->load->view('admin/cron_logs/smslog_dashboard');
                log_message('debug','-------------------------------------');
            }
        }
        // Action : open sms log list 
        public function smslog_list(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $result = $this->report_model->get_sms_log();
                if($result != null){
                    $data['smslog_data'] = $result;
                    log_message('debug','-- SMS LOG List ---------------------');
                    $this->load->view('admin/cron_logs/sms_log_list',$data);
                    log_message('debug','-------------------------------------');
                } else {
                    log_message('debug','-- SMS LOG List ---------------------');
                    log_message('debug','-- NO Pending SMS !');
                    echo "<br><br><br><br><center><h4>No Pending SMS ! </h4></center>";
                    log_message('debug','-------------------------------------');
                }
            }
        }
        // Action : delete this sms log
        public function delete_smslog(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $sms_id = $this->input->post('sms_id');
                log_message('debug','delete sms log '.$sms_id);
                $result = $this->report_model->delete_sms_log($sms_id);
                if(isset($result)){
                    echo "true";
                } else {
                    echo "false";
                }
            }
        }
    //---------------------------------------------------------------------------------------//



    //---------------------------------------------------------------------------------------//
    // Batch Management View , List , Insert ,Edit , Delete 
    //---------------------------------------------------------------------------------------//
        // Action : Batch DashView
        public function batch_view() {
            if($this->input->server('REQUEST_METHOD') == 'GET') {
                log_message('debug','********* Batch View ********* Start ******************');
                $this->load->view('admin/batch/batch_view');
                log_message('debug','********* Batch View ********* Ended ******************');
            }
        }

        // Action : Batch List's
        public function batch_list(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                log_message('debug','********* Batch LIST ********* Start ******************');
                $data['batch_list'] = $this->batch_model->get_all_batch();
                $this->load->view('admin/batch/batch_list',$data);
                log_message('debug','********* Batch LIST ********* Ended ******************');
            }
        }

        // Action : Load Create Batch Modal 
        public function load_batch_modal(){
            log_message('debug','****************** Admin Add Batch Modal REQ View START ******************');
            $data['course_list']  = $this->resource_model->get_all_courses();
            $this->load->view('admin/batch/load_batch_modal',$data);
            log_message('debug','****************** Admin Add Batch Modal REQ View ENDED ******************');
        }

        // Action : Load Edit Batch Modal 
        public function edit_batch_modal(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug','****************** Admin Edit Batch Modal REQ View START ******************');
                $batch_id = $this->input->post('batch_id');
                $data['course_list']  = $this->resource_model->get_all_courses();
                $data['batch_details'] =  $this->batch_model->get_batch_details($batch_id);
                $this->load->view('admin/batch/edit_batch_modal',$data);
                log_message('debug','****************** Admin Edit Batch Modal REQ View ENDED ******************');              
            }
        }

        // Action : ADD Batch in DB
        public function add_batch(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $batch_details['batch_name']    = $this->input->post('batch_name');
                $batch_details['description']   = $this->input->post('batch_description');
                $batch_details['start_date']    = $this->input->post('batch_start_date');
                $batch_details['course_id']     = $this->input->post('batch_course_id');
                log_message('debug','ADD Batch ----------------------------- Begin ---');
                log_message('debug','Batch Name :'.$batch_details['batch_name']);
                log_message('debug','description :'.$batch_details['description']);
                log_message('debug','Batch start date :'.$batch_details['start_date']);
                log_message('debug','Batch course_id :'.$batch_details['course_id']);
                log_message('debug','ADD Batch ----------------------------- Ended ---');
                // add data in batch master table 
                $result = $this->batch_model->add_batch($batch_details);    
                log_message('debug',"ADD Batch result ".$result);
                if($result == 1) { 
                    echo "true";
                } else { echo "false"; }
            }
        }

        // Action : Update Batch in DB
        public function update_batch(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $batch_details['batch_name']    = $this->input->post('batch_name');
                $batch_details['description']   = $this->input->post('batch_description');
                $batch_details['start_date']    = $this->input->post('batch_start_date');
                $batch_details['course_id']     = $this->input->post('batch_course_id');
                $batch_id                       = $this->input->post('batch_id');
                
                // update data in batch master table 
                $result = $this->batch_model->update_batch($batch_id,$batch_details);
                log_message('debug',"update Batch result ".$result);

                if($result == 1) { 
                    echo "true";
                } else { 
                    echo "false"; 
                }
            }
        }

        // Action : Check Batch Name Exist
        public function isBatchNamePresent() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $batch_name = $this->input->post('edit_batch_name');
                if($batch_name != null) {
                    $batch_name = $this->input->post('edit_batch_name');
                    $batch_id   = $this->input->post('edit_batch_course_id');
                    log_message('debug','Edit batch name :'.$batch_name.' Batch course id :'.$batch_id);
                    $res = $this->batch_model->check_batch_name_id($batch_id,$batch_name);
                    if($res != null){
                        echo "false";
                        log_message('debug','Edit Batch Name Present DB output: '.$res);
                    } else {
                        echo "true";
                        log_message('debug','Edit Batch Name Not Present or Same DB output'.$res);
                    }

                } else {
                    $batch_name = $this->input->post('batch_name');
                    log_message('debug',' Batch name :'.$batch_name);
                    $res = $this->batch_model->get_batch_name($batch_name);
                    if(isset($res)){
                        echo "false";
                        log_message('debug','Batch Name Present DB output: '.$res);
                    } else {
                        echo "true";
                        log_message('debug','Batch Name Not Present DB output'.$res);
                    }
                }
            }
        }

        // Action : Delete Batch in DB
        public function delete_batch() {
            log_message('debug','Admin Delete Batch Called');
            
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                log_message('debug',"Admin POST Delete Batch Called");

                $batch_id  = $this->input->post('batch_id');
                $result = $this->batch_model->delete_batch($batch_id);
                
                if($result == 1) {
                    log_message('debug','Batch Deleted ');
                    echo "true";  
                } else {
                    echo "false";
                }

                log_message('debug',"Batch Deleted batch_id ".$batch_id." result: ".$result);
            }
        }

        // ACTION : laoding link and unlink view 
        public function link_unlink() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {

                $this->load->view('admin/link_unlink_associate');
            }

        }

        // ACTION : link student tab 
        public function link_student() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {
         
                $this->load->view('admin/link_student');
            }
        }

        // ACTION : unlink student tab 
        public function unlink_student() {
            if($this->input->server('REQUEST_METHOD') == 'POST') {
         
                $this->load->view('admin/unlink_student');
            }
        }

        // ACTION : Fetching student name Modified By USK
        public function load_student_name(){
            if ($this->input->server('REQUEST_METHOD') == 'POST') {

                $student_registration_no   = $this->input->post('student_registration_no');
                $associate_registration_no = $this->input->post('associate_registration_no');

                $student_data   = $this->user_model->load_student_name($student_registration_no);
                $associate_data = $this->user_model->load_associate_name($associate_registration_no);

                $student_id = $student_data['user_id'];

                $course_details = $this->user_model->load_course($student_id); // course_name
                // log_message('debug','ttttttttttt'.$course_details);
                // log_message('debug','course name : '.print_r($course_details),true);

                // var_dump($course_details);
                if($student_data != null && $associate_data != null && $course_details != null){
                    $data['student_data']   = $student_data;
                    $data['associate_data'] = $associate_data;
                    $data['course_details'] = $course_details;
                    $this->load->view('admin/link_student_associate_view',$data);
                } else {
                    echo "<h4> Please Give Valid Inputes </h4>";
                }

                // $registration_no = $this->input->post('registration_no');
                // log_message('debug','@!@#$%^&*@#$%^&*( show '.$registration_no);
                // $student_data    = $this->user_model->load_student_name($registration_no);
                // $student_id      = $this->user_model->check_student_id($student_data['user_id']);
                // log_message('debug','<<<<<< check_student_id >>>>>'.$student_data['user_id']);

                // if($student_data != null){
                //     if($student_id != 0){
                //         echo "<h4 style='color:red' id='associate_link_msg'>This student already linked</h4>";
                //     }else{
                //         echo '<h4 id="student_msg1" >'.$student_data['user_fname'].' '.$student_data['user_mname'].''.$student_data['user_lname'].'</h4>';
                //     }
                // } else{
                //     echo '<h4 style="color:red" id="student_msg">Please enter correct registration number</h4>';
                // }
            }
        }
        
        // ACTION : Fetchiing associate name
        public function load_associate_name(){
            if ($this->input->server('REQUEST_METHOD') == 'POST') {

                $registration_no = $this->input->post('registration_no');
                $associate_data  = $this->user_model->load_associate_name($registration_no);
               
                if($associate_data != null)
                    echo '<h4 id="associate_msg">'.$associate_data['user_fname'].' '.$associate_data['user_mname'].''.$associate_data['user_lname'].'</h4>';
                else
                    echo "<h4 style='color:red' id='associate_msg'>Please enter correct registration number</h4>";                
            }
        }


        // ACTION : Linking student with associate
        public function link_student_associate(){
            if ($this->input->server('REQUEST_METHOD') == "POST"){
                $student_id   = $this->input->post('student_id');
                $associate_id = $this->input->post('associate_id');
                $batch_id     = $this->input->post('batch_id');
                $associate_details = $this->user_model->get_userid_details($associate_id);
                log_message('debug','-- Student ID --'.$student_id);
                log_message('debug','-- Batch   ID --'.$batch_id);
                log_message('debug','-- Batch Name --'.$associate_details['user_state']);

                $result = $this->user_model->link_student_associate($student_id,$associate_id,$batch_id,$associate_details['user_state']);
                if ($result != 0){
                    echo "true";
                    // log_message('debug','result not 0 ');
                }else{
                    // log_message('debug','result is 0');
                    echo "false";
                }
            }
        }

        // ACTION : Linked details of student 
        public function load_linked_student_detail(){
            if ($this->input->server('REQUEST_METHOD') == 'POST'){
                $registration_no        = $this->input->post('registration_no');
                $linked_student_details = $this->user_model->linked_student_details($registration_no);
                log_message('debug','Linked Student Details'.print_r($linked_student_details,true));
                if($linked_student_details != null){
                    $linked_associate_id    = $linked_student_details['associate_id'];
                    $linked_associate_data  = $this->user_model->get_userid_details($linked_associate_id);
                    log_message('debug','Linked Student Details'.print_r($linked_associate_data,true));
                    if($linked_associate_data != null){
                        $data['linked_student_details'] = $linked_student_details;
                        $data['linked_associate_details'] = $linked_associate_data;
                        $this->load->view('admin/student_associate_link_view',$data); 
                    }
                } else {
                    echo "<h4 style='color:red' id='student_msg'>Please enter correct registration number </h4>";
                }
                /*
                $check_valid_student = $this->user_model->get_valid_student($registration_no);
                if ($check_valid_student != null) {

                    // log_message('debug','!@!@!@!@!@ registration_no'.$registration_no);
                    $linked_student_details = $this->user_model->linked_student_details($registration_no);                
                    if ($linked_student_details != null){ 
                        $linked_associate       = $linked_student_details['associate_id'];
                        $linked_associate_data  = $this->user_model->get_userid_details($linked_associate);
                        if($linked_associate_data != null){
                            $data['linked_student_details'] = $linked_student_details;
                            $data['linked_associate_details'] = $linked_associate_data;
                            $this->load->view('admin/student_associate_link_view',$data);                 
                        } else {
                            echo "<h4 style='color:red' id='student_msg'>This student is not linked to any Associate </h4>";              
                        }
                    }else{
                            echo "<h4 style='color:red' id='student_msg'>This student is not linked to any Associate </h4>";
                    }
                }else{
                    echo "<h4 style='color:red' id='student_msg'>Please enter correct registration</h4>";
                }
                */
            }
        }
        // Action : Linked details of student for unlinking 
        public function load_linked_student_details(){
            if ($this->input->server('REQUEST_METHOD') == 'POST'){
                $registration_no        = $this->input->post('registration_no');
                $linked_student_details = $this->user_model->load_linked_student_details($registration_no);
                log_message('debug','Linked Student Details'.print_r($linked_student_details,true));
                if($linked_student_details != null){
                    $data['associates_student_links'] = $linked_student_details;
                    $this->load->view('admin/student_associate_link_view',$data); 
                } else {
                    echo "<h4 style='color:red' id='student_msg'>Please enter correct registration number </h4>";
                }
            }
        }

        // ACTION : This will unlink student with associate 
        public function unlink_student_associate(){
            if ($this->input->server('REQUEST_METHOD') == "POST"){
                $student_id = $this->input->post('student_id');  
                $batch_id   = $this->input->post('batch_id');
                $student_details = $this->user_model->get_userid_details($student_id);
                // get student details   
                log_message('debug','-- Student ID --'.$student_id);
                log_message('debug','-- Batch   ID --'.$batch_id);
                log_message('debug','-- Batch Name --'.$student_details['user_state']);
                $result = $this->user_model->unlink_student_associate($student_id,$batch_id,$student_details['user_state']);

                if($result != null){
                    // log_message('debug','12345678 ok'.$result);
                    echo "true";
                } else {
                    echo "<script language='javascript'>alert('UnLinking Failed'); </script>";
                }
            }
        }
        // Action : Check if the student in not linked with associate used in validation
        public function isThereNoStudentLink(){
            if ($this->input->server('REQUEST_METHOD') == "POST") {
                $search_key = $this->input->post('student_registration_no');
                // log_message('debug','search_key for link'.$search_key);
                $result = $this->user_model->isThereNoStudentLink($search_key);
                if($result != null){
                    echo "true";
                    // log_message('debug','result for search_key'.$result);
                } else {
                    echo "false";
                    // log_message('debug','result for search_key'.$result);
                }

            }
        }

        // Action : Check if the student is linked with associate used in validation
        public function isThereStudentLink(){
            if ($this->input->server('REQUEST_METHOD') == "POST") {
                $search_key = $this->input->post('search_user_email');
                log_message('debug','search_key for link'.$search_key);
                $result = $this->user_model->isThereStudentLink($search_key);
                if($result != null){
                    echo "true";
                    // log_message('debug','result for search_key'.$result);
                } else {
                    echo "false";
                    // log_message('debug','result for search_key'.$result);
                }

            }
        }

        // Action : Check is there an Associate 
        public function isThereAssociateExists(){
            if ($this->input->server('REQUEST_METHOD') == "POST") {
                $search_key = $this->input->post('associate_registration_no');
                // log_message('debug','search_key for link'.$search_key);
                $result = $this->user_model->isThereAssociate($search_key);
                if($result != null){
                    echo "true";
                    // log_message('debug','result for search_key'.$result);
                } else {
                    echo "false";
                    // log_message('debug','result for search_key'.$result);
                }

            }
        }

        // Fetching no of students and associates for Graphs Charts.
        public function get_associate_and_students_graph(){
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $student_data = $this->user_model->get_all_students_and_associates(1);

                $associate_data = $this->user_model->get_all_students_and_associates(3);

                $data['associate_data'] = $associate_data1; 
                $data['student_data']   = $student_data1;
                $this->load->view('admin/admin_dashboard',$data);
                  // $this->load->view('admin/student_associate_link_view',$data); 

                // if($student_data1 && $associate_data1 != null) {
                //     echo "true";
                // } else {
                //     echo "false";
                // }
            }
        }

    //---------------------------------------------------------------------------------------//
    //      grant for number user License of SPOC 
    //---------------------------------------------------------------------------------------//

        public function grant_user_license(){            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $user_id          = $this->input->post('user_id');
                $user_details     = $this->user_model->get_userid_details($user_id);
                $data['quote_id'] = $this->input->post('quote_id');
                $data['user_id']  = $user_id;
                $data['reg_no']   = $user_details['registration_no'];
                $data['subject']  = $this->input->post('subject');
                $data['license']  = $this->input->post('old_license');
                $data['cost']     = $this->input->post('old_cost');

                $this->load->view('admin/grant_requested_license',$data);     
            }
        }

        // Action : update the linense 
        public function update_license_request(){
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $quote_id         = $this->input->post('quote_id');
                $user_id          = $this->input->post('user_id');
                $user_details     = $this->user_model->get_userid_details($user_id);
                $old_license      = $this->input->post('old_license');
                $old_cost         = $this->input->post('old_cost');
                $req_license      = $this->input->post('req_license');
                $req_license_cost = $this->input->post('req_license_cost');
                $subject_name     = $this->input->post('subject_name');
                // Step 1: Create Make Transcation for the new license ie req_license and req_license cost 
                // Transaction started ..................
                $update_license_transaction = array(
                    'user_id'                  => $user_details['user_id'],
                    'transaction_number'       => $user_details['registration_no'],
                    'bank_name'                => 'ASK Analytics TR LICENSE UPDATE',
                    'amount_paid'              => $req_license_cost,
                    'paid_date'                => date('Y-m-d'),
                    'transaction_description'  => "SPOC REG_NO: ".$user_details['registration_no']." for this area of intrest ".$subject_name." with new License ".$req_license.".",
                    'payment_mode'             => 'offline',
                    'payment_status'           => '2', // Note: 8-pending payment | 2-paid
                    'total_amount'             => $req_license_cost
                );
                log_message('debug','Transaction Here '.var_dump($update_license_transaction));
                $transaction_id = $this->payment_model->offline_payment($update_license_transaction);
                // log_message('debug','################### ');
                // Transaction ended ....................

                
                
                // Step 2: updating old license cost + new license cost and count ;
                $final_license  = $old_license + $req_license;
                $final_cost     = $old_cost + $req_license_cost;
                $update_license = $this->user_model->update_license_request($quote_id,$final_license,$final_cost);
                // Step 3: Send mail 

                $email_id     = $user_details['user_email'];
                $mail_subject = $update_license_transaction['transaction_description'];
                $mail_body    = 'Dear '.$user_details['user_fname'].' '.$user_details['user_mname'].' '.$user_details['user_lname'].','.' <br> '.' Thanks for your interest to get more Ask analytics user licenses.'.'<br>'.'Existing License: '.$old_license.' Approved License: '.$req_license.'<br>'.' Now onwards you can use '.($old_license + $req_license).' Licenses.'.'<br>'.' Thanks, Grow and learn through your stay with us'.'<br>'.' BEST OF LUCK from Team Ask Analytics';
                log_message('debug','********* send mail parameters at Here *********'.$email_id." License Req ");
 
                $email_send   = $this->sendemail_model->send_license_approve($email_id,$mail_subject,$mail_body,$req_license);
                log_message('debug','********* send mail at Here *********'.var_dump($email_send));


            }
        }
}
