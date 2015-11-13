<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Resource_model extends CI_Model {
    public function __construct() 
    {
        // Call the Model constructor 
        parent::__construct();
    }

    // Operation : Get All Resource
    public function get_all_resources() {
        $result = $this->db->get('resource_master');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Admnis All Resource
    public function get_admins_all_resources() {
        $result = $this->db->get_where('mentor_resource_view',array('user_role !=' => '6'));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Subject Resources
    public function get_all_subject_resources($subject_name){
        $result = $this->db->get_where('resource_master',array('subject_name' => $subject_name));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Perticular Mentor Uploaded Resoures List 
    public function get_this_mentor_resources($user_id){
        $result = $this->db->get_where('resource_master',array('uploaded_user_id' => $user_id));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    } 

    // Operatoin : Get Resource Count
    public function get_resource_count(){
        $result = $this->db->get('resource_master');
        return $result->num_rows();
    }

    // Operatoin : Get Admin / Content Director Resource Count
    public function get_admins_resource_count(){
        $result = $this->db->get_where('mentor_resource_view',array('user_role !=' => '6'));
        return $result->num_rows();
    }

    // Operatoin : Get This Mentor/SME Resource Count
    public function get_this_mentor_resource_count($user_id){
        $result = $this->db->get_where('resource_master',array('uploaded_user_id' => $user_id));
        return $result->num_rows();
    }

    // Operation : Get Subject Resource Count
    public function get_subject_resource_count($subject_name){
        $result = $this->db->get_where('resource_master',array('subject_name' => $subject_name));
        return $result->num_rows();
    }

    public function get_all_assessment() {
        $result = $this->db->get('assessment_master');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Get All Admins Assessments List
    public function get_all_admins_assessment() {
        $result = $this->db->get_where('mentor_assessment_view',array('user_role !=' => '6'));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Admins Resoruce Count
    public function get_admins_assessment_count(){
        $result = $this->db->get_where('mentor_assessment_view',array('user_role !=' => '6'));
        return $result->num_rows();
    }

    // Operation : Get All Assessment with Answer Key Note Used at GM Level Mapping
    public function get_all_assessment_with_key() {
        // $this->db->not_like(array('answer_key' => '', 'answer_key' => 'null'));
        // $result = $this->db->get('assessment_master');
        $result = $this->db->query("SELECT * FROM assessment_master WHERE answer_key NOT LIKE '' AND answer_key NOT LIKE '%null%';");
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Assessment with Answer Key Note Used at GM Level Mapping
    public function get_all_admins_assessment_with_key() {
        // $this->db->not_like(array('answer_key' => '', 'answer_key' => 'null'));
        // $result = $this->db->get('assessment_master');
        $result = $this->db->query("SELECT * FROM mentor_assessment_view WHERE user_role !='6' AND answer_key NOT LIKE '' AND answer_key NOT LIKE '%null%';");
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }
    
    // Operatoin : Get Assessments Count
    public function get_assessment_count(){
        $result = $this->db->get('assessment_master');
        return $result->num_rows();
    }

    // Operatoin : Get Mentor/SME Uploaded Assessment Count
    public function get_this_assessment_count($user_id){
        $result = $this->db->get_where('assessment_master',array('uploaded_user_id' => $user_id));
        return $result->num_rows();
    }

    // Operation : Get Subject Assessments Count
    public function get_subject_assessment_count($subject_name){
        $result = $this->db->get_where('assessment_master',array('test_subject' => $subject_name));
        return $result->num_rows();
    }

    // Operation : Get All Subject Assessments
    public function get_all_subject_assessments($subject_name){
        $result = $this->db->get_where('assessment_master',array('test_subject' => $subject_name));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : get_this_mentor_assessments
    public function get_this_mentor_assessments($user_id){
        $result = $this->db->get_where('assessment_master',array('uploaded_user_id' => $user_id));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Subject Assessments with answer_key
    public function get_all_subject_assessments_with_key($subject_name){
        // $this->db->not_like(array('answer_key' => '', 'answer_key' => 'null'));
        // $result = $this->db->get_where('assessment_master',array('test_subject' => $subject_name));
        $result = $this->db->query("SELECT * FROM assessment_master WHERE answer_key NOT LIKE '' AND answer_key NOT LIKE '%null%' AND test_subject = '".$subject_name."';");
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    public function get_all_subjects() {
        $result = $this->db->get('subject_master');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Subjects List Array 
    public function get_all_subjects_array() {
        $result = $this->db->get('subject_master');
        if($result->num_rows() > 0) {
            return $result->result_array();
        }
        return null;
    }
    // Operation : Get All Subjects with course link status
    public function get_all_subjects_with_course_status() {
        $result = $this->db->get('subject_course_link_view');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Subject Count
    public function get_subject_count(){
        $result = $this->db->get('subject_master');
        return $result->num_rows();
    }

    public function get_all_courses() {
        $result = $this->db->get_where('course_master');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Published Courses 
    public function get_all_published_courses(){
        $result = $this->db->get_where('course_master',array('course_status' => 'Published'));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get course Count
    public function get_course_count(){
        $result = $this->db->get('course_master');
        return $result->num_rows();
    }

    // For Getting single resoure detials 
    public function get_resource_details($resource_id) {
        $result = $this->db->get_where('resource_master',array('resource_id' => $resource_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // For Getting single subject detials based on subject_id
    public function get_subject_details($subject_id) {
        $result = $this->db->get_where('subject_master',array('subject_id' => $subject_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // For Getting single subject detials based on subject_name
    public function get_subject_name_details($subject_name) {
        $result = $this->db->get_where('subject_master',array('subject_name' => $subject_name));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // For Getting single course detials 
    public function get_courses_details($course_id) {
        $result = $this->db->get_where('course_master',array('course_id' => $course_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // For Getting get course resource maplist
    public function get_course_resource_maplist($course_id) {
        $result = $this->db->get_where('course_resource_mapview',array('course_id' => $course_id));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // For Getting get Director course resource maplist
    public function get_director_course_resource_maplist($course_id,$subject_name) {
        $result = $this->db->get_where('course_resource_mapview',array('course_id' => $course_id,'subject_name' => $subject_name));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // For Getting Course Resource Map Details 
    public function get_course_resource_map_details($map_id){
        $result = $this->db->get_where('course_resource_mapview',array('map_id' => $map_id));
        if($result->num_rows() > 0) {
            return array_shift($result->result_array());
        }
        return null;   
    }

    // For Getting get course assessment maplist
    public function get_course_assessment_maplist($course_id) {
        $result = $this->db->get_where('course_assessment_mapview',array('course_id' => $course_id));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // For Getting get Director course assessment maplist
    public function get_director_course_assessment_maplist($course_id,$subject_name) {
        $result = $this->db->get_where('course_assessment_mapview',array('course_id' => $course_id, 'subject_name' => $subject_name));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // For Getting Course Assessment Map Details 
    public function get_course_assessment_map_details($map_id){
        $result = $this->db->get_where('course_assessment_mapview',array('map_id' => $map_id));
        if($result->num_rows() > 0) {
            return array_shift($result->result_array());
        }
        return null;   
    }

    public function get_syllabus_list($course_id) {
        $result = $this->db->get_where('course_syllabus_view',array('course_id' => $course_id));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }


    // For Getting single assessment detials 
    public function get_assessment_details($test_id) {
        $result = $this->db->get_where('assessment_master',array('test_id' => $test_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }


    // For Getting single attempt detials 
    public function get_attempt_details($attempt_id) {
        $result = $this->db->get_where('attempt_master',array('attempt_id' => $attempt_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : For Getting Answer key status to check student scored above 80%
    public function get_answer_key_status($input_data) {
        $result = $this->db->query("SELECT * FROM attempt_master WHERE user_id = ".$input_data['user_id']." AND course_id=".$input_data['course_id']." AND test_no = ".$input_data['test_no']." AND test_percentage >= ".$input_data['margin_value'].";");
        if($result->num_rows() > 0) {
            return "true";
        }
        return "false";
    }

    // For Student Side Attempt View in Eact Test
    public function get_test_attempt($user_id,$course_id,$test_no) {
        $result = $this->db->get_where('attempt_master',array('user_id' => $user_id, 'course_id' => $course_id, 'test_no' => $test_no, 'submit_status' => '1'));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // For resource name validation
    public function get_resource_name($resource_name) {
        $result = $this->db->get_where('resource_master',array('resource_name' => $resource_name));
        if ($result->num_rows() > 0){
            return true;
        }
        return null;
    }

     // For Edit Resource Validation 
    public function check_resource_name_id($resource_id,$resource_name) {
        $check  = $this->db->get_where('resource_master',array('resource_id' => $resource_id ,'resource_name' => $resource_name));
        if($check->num_rows() == 1){
            return null;
        } else {
            $result = $this->db->get_where('resource_master',array('resource_name' => $resource_name));
            if ($result->num_rows() > 0){
                return true;
            }
            return null;    
        }
        
    }



    // For Validation Assessment name
    public function get_assessment_no($test_no) {
        $result = $this->db->get_where('assessment_master',array('test_no' => $test_no));
        if ($result->num_rows() > 0){
            return true;
        }
        return null;
    }

    // For Validation subject name
    public function get_subject_name($subject_name) {
        $result = $this->db->get_where('subject_master',array('subject_name' => $subject_name));
        if ($result->num_rows() > 0){
            return true;
        }
        return null;
    }


     // For Edit Subject Validation 
    public function check_subject_name_id($subject_id,$subject_name) {
        $check  = $this->db->get_where('subject_master',array('subject_id' => $subject_id ,'subject_name' => $subject_name));
        if($check->num_rows() == 1){
            return null;
        } else {
            $result = $this->db->get_where('subject_master',array('subject_name' => $subject_name));
            if ($result->num_rows() > 0){
                return true;
            }
            return null;    
        }
        
    }

    // For Validation course name
    public function get_course_name($course_name) {
        $result = $this->db->get_where('course_master',array('course_name' => $course_name));
        if ($result->num_rows() > 0){
            return true;
        }
        return null;
    }

    // For Edit Course Validation 
    public function check_course_name_id($course_id,$course_name) {
        $check  = $this->db->get_where('course_master',array('course_id' => $course_id ,'course_name' => $course_name));
        if($check->num_rows() == 1){
            return null;
        } else {
            $result = $this->db->get_where('course_master',array('course_name' => $course_name));
            if ($result->num_rows() > 0){
                return true;
            }
            return null;    
        }
        
    }

    // For Validation isAssessmentNotPublished 
    public function isAssessmentNotPublished($test_id){
        $result = $this->db->query("SELECT * FROM course_assessment_mapview HAVING test_id = ".$test_id." AND resource_status='Published';");
        if($result->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function add_video($resource) {
        $resource_details = array(
                                  'subject_name'      => $resource['subject_name'],
                                  'resource_name'     => $resource['resource_name'],
                                  'resource_link'     => $resource['resource_link'],
                                  'resource_tag'      => $resource['resource_tag'],
                                  'uploaded_user_id'  => $resource['user_id'],
                                  'resource_type'     => 'VIDEO'
                                 );
        $result = $this->db->insert('resource_master',$resource_details);
        if(isset($result)) {
            return $result;
        } else { return null; }
    }

    public function add_pdf($resource) {
        $resource_details =  array(
                                    'subject_name'      => $resource['subject_name'],
                                    'resource_name'     => $resource['resource_name'],
                                    'resource_link'     => $resource['resource_link'],
                                    'resource_tag'      => $resource['resource_tag'],
                                    'uploaded_user_id'  => $resource['user_id'],
                                    'resource_type'     => 'PDF' 
                                  );
        $result = $this->db->insert('resource_master',$resource_details);
        if(isset($result)) { return $result; } else { return null; }
    }

    // Action : Mentor Upload File
    public function mentor_upload_file($resource) {
        $resource_details =  array(
                                    'subject_name'      => $resource['subject_name'],
                                    'resource_name'     => $resource['resource_name'],
                                    'resource_link'     => $resource['resource_link'],
                                    'resource_tag'      => $resource['resource_tag'],
                                    'uploaded_user_id'  => $resource['user_id'],
                                    'resource_type'     => $resource['file_type'] 
                                  );
        $result = $this->db->insert('resource_master',$resource_details);
        if(isset($result)) { return $result; } else { return null; }
    }

    public function delete_video($resource_id) {
        $result = $this->db->delete('resource_master',array('resource_id' => $resource_id));
        if(isset($result)) {
            return $result;
        }  else { return null; }
    }

    public function delete_resource($resource_id) {
        $result = $this->db->delete('resource_master',array('resource_id' => $resource_id));
        if(isset($result)) {
            return $result;
        }
        return null;
    }

    public function add_assessment_pdf($assessment){
        $assessment_details=array(
            'test_no'           =>$assessment['test_no'],
            'test_subject'      =>$assessment['test_subject'],
            'test_name'         =>$assessment['test_name'],
            'test_description'  =>$assessment['test_description'],
            'no_of_questions'   =>$assessment['no_of_questions'],
            'test_type'         =>$assessment['test_type'],
            'test_date'         =>$assessment['test_date'],
            'test_duration'     =>$assessment['test_duration'],
            'upload_ques_paper' =>$assessment['upload_ques_paper'],
            'uploaded_user_id'  =>$assessment['user_id']
            //'start_time'=>$assessment['start_time'],
           // 'end_time'=>$assessment['end_time'],
            );
        $result = $this->db->insert('assessment_master',$assessment_details);
        if(isset($result)){
            return $result;
        }else { return null; }
    }

     //Operation: Update assessment details
    function update_test_details($assessment_details){
        $res = $this->db->get_where('assessment_master',array('test_id' => $assessment_details['test_id']));
        $assessment_data = array_shift($res->result_array());
        if($assessment_data['no_of_questions'] != $assessment_details['no_of_questions']){
            $data  = array('test_subject'=> $assessment_details['test_subject'],
                       'test_type'       => $assessment_details['test_type'],
                       'test_name'       => $assessment_details['test_name'],
                       'test_description'=> $assessment_details['test_description'],
                       'no_of_questions' => $assessment_details['no_of_questions'],
                       'test_duration'   => $assessment_details['test_duration'],
                       'test_date'       => $assessment_details['test_date'],
                       'answer_key'      => ""
            );
        } else {
            $data  = array('test_subject'=> $assessment_details['test_subject'],
                       'test_type'       => $assessment_details['test_type'],
                       'test_name'       => $assessment_details['test_name'],
                       'test_description'=> $assessment_details['test_description'],
                       'no_of_questions' => $assessment_details['no_of_questions'],
                       'test_duration'   => $assessment_details['test_duration'],
                       'test_date'       => $assessment_details['test_date']
            );
        }
        
        $this->db->where('test_id',$assessment_details['test_id']);
        $result = $this->db->update('assessment_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }


    //action :assessment answer key updating

    public function update_answer_key($test_id,$answer_key){

        $data = array('answer_key' => $answer_key);
        $this->db->where('test_id', $test_id);
        $result = $this->db->update('assessment_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }

    //action : delete assessment

    public function delete_assessment_file($test_id){
        $result = $this->db->delete('assessment_master',array('test_id' => $test_id));
        if(isset($result)){
            return $result;
        }
           return null;
    }

    public function get_incomplete_attempt($user_id,$course_id,$test_no){
        $result = $this->db->query("SELECT * FROM attempt_master WHERE user_id = ".$user_id." AND course_id = ".$course_id." AND test_no = ".$test_no." AND submit_status='0' AND date(test_date) = date(now())");
        if($result->num_rows() > 0){
            return array_shift($result->result_array());
        }
        return null;
    }
    
    // Operation: student assessment answers saving
    public function start_test($attempt){
        $this->db->select_max('attempt_count');
        $this->db->where(array(
                                'user_id' => $attempt['user_id'],
                                'course_id'=>$attempt['course_id'],
                                'test_no' => $attempt['test_no']
                              ));
        $res = $this->db->get('attempt_master')->row();
        $attempt['attempt_count'] = $res->attempt_count+1;
        
        $attempt_details = array(
                                'course_id'         => $attempt['course_id'],
                                'test_subject'      => $attempt['subject_name'],
                                'user_id'           => $attempt['user_id'],
                                'test_no'           => $attempt['test_no'],
                                'attempt_count'     => $attempt['attempt_count'],
                                'test_type'         => $attempt['test_type'],
                                'test_name'         => $attempt['test_name'],
                                'no_of_questions'   => $attempt['no_of_questions'],
                                'answer_key'        => $attempt['answer_key'],
                                'student_answer'    => $attempt['student_answer'],
                                'remaining_time'    => $attempt['remaining_time']
                                );
       $result = $this->db->insert('attempt_master', $attempt_details);
       if(isset($result)){
            return $this->db->insert_id(); 
       }
       return null;
    }

    // Update student answers:
    public function save_answer_sheet($attempt_details){
        $data = array(
                        'student_answer'    => $attempt_details['student_answer'], 
                        'test_score'        => $attempt_details['test_score'], 
                        'test_percentage'   => $attempt_details['test_percentage'], 
                        'submit_status'     => $attempt_details['submit_status'],
                        'remaining_time'     => $attempt_details['remaining_time'] 
                     );
        $this->db->where('attempt_id',$attempt_details['attempt_id']);
        $result = $this->db->update('attempt_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }
         
    public function add_subject($subjects) {
        $subjects_details = array(
                                  'subject_name'        => trim(strtoupper($subjects['subject_name'])),
                                  'subject_description' => $subjects['description'],
                                  'subject_fee'         => $subjects['subject_fee']
                                 );
        $result = $this->db->insert('subject_master',$subjects_details);
        if(isset($result)) {
            return $result;
        } 
        return null;
    }

    public function delete_subject($subject_id) {
        $result = $this->db->delete('subject_master',array('subject_id' => $subject_id));
        if(isset($result)) {
            return $result;
        }
        return null;
    }

    public function add_course($courses) {
        $course_details = array(
                                  'course_name'         => $courses['course_name'],
                                  'course_description'  => $courses['course_description'],
                                  'course_duration'     => $courses['course_duration'],
                                  'course_type'         => $courses['course_type'],
                                  'course_fee'          => $courses['course_fee'],
                                  'course_status'       => $courses['course_status'],
                                  'course_syllabus_file'=> $courses['course_syllabus_file']
                                 );
        $result = $this->db->insert('course_master',$course_details);
        if(isset($result)) {
            return $result;
        } 
        return null;
    }

    // Operation: Adding Course Resource Sub,Module,Group 
    // Note: Syllabus type RESOURCE / ASSESSMENT
    public function add_syllabus($syllaubs) {
        $this->db->select_max('res_order');
        $this->db->where(array(
                                'course_id' => $syllaubs['course_id'],
                                'subject_name' => $syllaubs['subject_name']
                              ));
        $res = $this->db->get('course_subject_resource_map')->row();
        $syllaubs['max_id'] = $res->res_order+1;
        $syllaubs_details = array(
                                  'course_id'       => $syllaubs['course_id'],
                                  'module_name'     => $syllaubs['module_name'],
                                  'group_name'      => $syllaubs['group_name'],
                                  'subject_name'    => $syllaubs['subject_name'],
                                  'syllabus_type'   => $syllaubs['syllabus_type'],
                                  'resource_id'     => $syllaubs['resource_id'],
                                  'schedule'        => $syllaubs['schedule'],
                                  'resource_status' => $syllaubs['resource_status'],
                                  'res_order'       => $syllaubs['max_id']
                                 );
        $result = $this->db->insert('course_subject_resource_map',$syllaubs_details);
        if(isset($result)) {
            return $result;
        } 
        return null;
    }
    
    // Operation: Adding Course Resource Sub,Module,Group 
    // Note: Syllabus type RESOURCE / ASSESSMENT
    public function update_syllabus($syllaubs) {
        $this->db->where('map_id',$syllaubs['map_id']);
        $syllaubs_details = array(
                                  'module_name'     => $syllaubs['module_name'],
                                  'group_name'      => $syllaubs['group_name'],
                                  'subject_name'    => $syllaubs['subject_name'],
                                  'syllabus_type'   => $syllaubs['syllabus_type'],
                                  'resource_id'     => $syllaubs['resource_id'],
                                  'schedule'        => $syllaubs['schedule'],
                                  'resource_status' => $syllaubs['resource_status'],
                                 );
        $result = $this->db->update('course_subject_resource_map',$syllaubs_details);
        if(isset($result)) {
            return $result;
        } 
        return null;
    }

    // Operation : Publish Syllabus / Un Publish Syllabus Status
    public function update_syllabus_status($map_id,$resource_status){
        $data   = array('resource_status' => $resource_status);
        $this->db->where('map_id',$map_id);
        $result = $this->db->update('course_subject_resource_map',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }

    public function delete_course($course_id) {
        $result = $this->db->delete('course_master',array('course_id' => $course_id));
        if(isset($result)) {
            return $result;
        }
        return null;
    }

    public function delete_syllabus($map_id) {
        $result = $this->db->delete('course_subject_resource_map',array('map_id' => $map_id));
        if(isset($result)) {
            return $result;
        }
        return null;
    }

    //changes order of the resource TOI Abrajeethan
    function change_order_res($order,$id) {

        $data=array('resource_order'=>$order);
        $this->db->where('resource_id',$id);
        $this->db->update('resource_master',$data);
    }

    //Opration: Update Resource Name and Tag
    function update_resource_details($resource_id,$resource_name,$resource_tag){
        $data   = array('resource_name' => $resource_name, 'resource_tag' => $resource_tag);
        $this->db->where('resource_id',$resource_id);
        $result = $this->db->update('resource_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }

    //Operation: Update Subject Name and Description
    function update_subject_details($subjects_details){
        $data   = array(
                        'subject_name'        => trim(strtoupper($subjects_details['subject_name'])), 
                        'subject_description' => $subjects_details['subject_description'],
                        'subject_fee'         => $subjects_details['subject_fee']
                        );
        $this->db->where('subject_id',$subjects_details['subject_id']);
        $result = $this->db->update('subject_master',$data);
        if(isset($result)){

            return $result;
        }
        return null;
    }

    //Operation: Update Course Name and Description
    function update_course_details($course_details){
        $data   = array(
                        'course_name'         => $course_details['course_name'],
                        'course_description'  => $course_details['course_description'],
                        'course_duration'     => $course_details['course_duration'],
                        'course_type'         => $course_details['course_type'],
                        'course_fee'          => $course_details['course_fee'],
                        'course_status'       => $course_details['course_status'],
                        'course_syllabus_file'=> $course_details['course_syllabus_file']
                       );
        $this->db->where('course_id',$course_details['course_id']);
        $result = $this->db->update('course_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }
    //---------------------------------------------------------------------------------------
    // Browser : Course - Module - Group - Subject - Resource / Assessment Started  
    //---------------------------------------------------------------------------------------
        // Operation: Get Course Modules 
        function get_course_modules($course_id){
            $this->db->group_by(array('module_name','course_id'));
            $this->db->where(array('course_id' => $course_id));
            $result = $this->db->get('course_subject_resource_map');
            // $result = $this->db->query("SELECT * FROM course_subject_resource_map WHERE course_id = ".$course_id." GROUP BY module_name,course_id;");
            if($result->num_rows() > 0){
                return $result->result();
            }
            return null;
        } 
        // Operation: Get Course Module Group 
        function get_course_module_groups($course_id,$module_name){
            $this->db->group_by(array('group_name','course_id'));
            $this->db->where(array('course_id' => $course_id,'module_name' => $module_name));
            $result = $this->db->get('course_subject_resource_map');
            // $result = $this->db->query("SELECT * FROM course_subject_resource_map WHERE course_id = ".$course_id." AND module_name = ".$module_name." GROUP BY group_name,course_id;");
            if($result->num_rows() > 0){
                return $result->result();
            }
            return null;
        }
        // Operation: Get Course Module Group Subjects 
        function get_course_module_group_subjects($course_id,$module_name,$group_name){
            $this->db->group_by(array('subject_name','course_id'));
            $this->db->where(array('course_id' => $course_id,'module_name' => $module_name,'group_name' => $group_name));
            $result = $this->db->get('course_subject_resource_map');
            // $result = $this->db->query("SELECT * FROM course_subject_resource_map WHERE course_id = ".$course_id." AND module_name = ".$module_name." AND group_name = ".$group_name." GROUP BY subject_name,course_id;");
            if($result->num_rows() > 0){
                return $result->result();
            }
            return null;   
        }
        // Operation: Get Course Module Group Subject Resources 
        function get_cmgsr($course_id,$module_name,$group_name,$subject_name){
            $this->db->order_by('res_order');
            $this->db->where(array('course_id' => $course_id, 'module_name' => $module_name, 'group_name' => $group_name, 'subject_name' => $subject_name, 'resource_status' => 'Published'));
            $this->db->where('schedule <=','CURDATE()',FALSE);
            $result = $this->db->get('course_subject_resource_view');
            //$result = $this->db->query("SELECT * FROM course_subject_resource_view WHERE course_id = '.$course_id.' AND subject_name = '.$subject_name.' AND schedule <= 'CURDATE()' ORDER BY (res_order)");
            if($result->num_rows > 0){
                return $result->result();
            }
            return null;
        }
        // Operation: Get Course Module Group Subject Assessment 
        function get_cmgsa($course_id,$module_name,$group_name,$subject_name){
            $this->db->order_by('res_order');
            $this->db->where(array('course_id' => $course_id, 'module_name' => $module_name, 'group_name' => $group_name, 'subject_name' => $subject_name, 'resource_status' => 'Published'));
            $this->db->where('schedule <=','CURDATE()',FALSE);
            $result = $this->db->get('course_subject_assessment_view');
            //$result = $this->db->query("SELECT * FROM course_subject_resource_view WHERE course_id = '.$course_id.' AND subject_name = '.$subject_name.' AND schedule <= 'CURDATE()' ORDER BY (res_order)");
            if($result->num_rows > 0){
                return $result->result();
            }
            return null;
        }
    //---------------------------------------------------------------------------------------
    // Browser : Course - Module - Group - Subject - Resource / Assessment EndOfFile  
    //--------------------------------------------------------------------------------------- 
    
    // Operation : Get Course Tree in Student page 
    function course_tree($course_id){
        //$this->db->group_by('subject_name');
        //$result = $this->db->get_where('course_subject_resource_map',array('course_id' => $course_id));
        $result = $this->db->query("SELECT * , SUM(schedule) sub_schedule FROM course_subject_resource_map WHERE course_id =".$course_id." GROUP BY subject_name, course_id;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Associate Course Tree
    function associate_course_tree($user_id,$course_id){
        $result = $this->db->query("SELECT * FROM associate_course_sub_res_map WHERE course_id = ".$course_id." AND user_id = ".$user_id." GROUP BY subject_name;");
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    //---------------------------------------------------------------------------------------
    // Associate Browser : Course - Module - Group - Subject - Resource / Assessment Started  
    //---------------------------------------------------------------------------------------
        // Operation: Get Associate Course Modules 
        function get_associate_course_modules($user_id,$course_id){
            $this->db->group_by(array('module_name','course_id'));
            $this->db->where(array('course_id' => $course_id,'user_id' => $user_id));
            $result = $this->db->get('associate_course_sub_res_map');
            // $result = $this->db->query("SELECT * FROM course_subject_resource_map WHERE course_id = ".$course_id." GROUP BY module_name,course_id;");
            if($result->num_rows() > 0){
                return $result->result();
            }
            return null;
        } 
        // Operation: Get Associate Course Module Group 
        function get_associate_course_module_groups($user_id,$course_id,$module_name){
            $this->db->group_by(array('group_name','course_id'));
            $this->db->where(array('course_id' => $course_id,'user_id' => $user_id,'module_name' => $module_name));
            $result = $this->db->get('associate_course_sub_res_map');
            // $result = $this->db->query("SELECT * FROM course_subject_resource_map WHERE course_id = ".$course_id." AND module_name = ".$module_name." GROUP BY group_name,course_id;");
            if($result->num_rows() > 0){
                return $result->result();
            }
            return null;
        }
        // Operation: Get Associate Course Module Group Subjects 
        function get_associate_course_module_group_subjects($user_id,$course_id,$module_name,$group_name){
            $this->db->group_by(array('subject_name','course_id'));
            $this->db->where(array('course_id' => $course_id,'user_id' => $user_id,'module_name' => $module_name,'group_name' => $group_name));
            $result = $this->db->get('associate_course_sub_res_map');
            // $result = $this->db->query("SELECT * FROM course_subject_resource_map WHERE course_id = ".$course_id." AND module_name = ".$module_name." AND group_name = ".$group_name." GROUP BY subject_name,course_id;");
            if($result->num_rows() > 0){
                return $result->result();
            }
            return null;   
        }
        // Operation: Get Associate Course Module Group Subject Resources 
        function get_associate_cmgsr($course_id,$module_name,$group_name,$subject_name){
            $this->db->order_by('res_order');
            $this->db->where(array('course_id' => $course_id,'module_name' => $module_name, 'group_name' => $group_name, 'subject_name' => $subject_name, 'resource_status' => 'Published'));
            $this->db->where('schedule <=','CURDATE()',FALSE);
            $result = $this->db->get('course_subject_resource_view');
            //$result = $this->db->query("SELECT * FROM course_subject_resource_view WHERE course_id = '.$course_id.' AND subject_name = '.$subject_name.' AND schedule <= 'CURDATE()' ORDER BY (res_order)");
            if($result->num_rows > 0){
                return $result->result();
            }
            return null;
        }
        // Operation: Get Associate Course Module Group Subject Assessment 
        function get_associate_cmgsa($course_id,$module_name,$group_name,$subject_name){
            $this->db->order_by('res_order');
            $this->db->where(array('course_id' => $course_id,'module_name' => $module_name, 'group_name' => $group_name, 'subject_name' => $subject_name, 'resource_status' => 'Published'));
            $this->db->where('schedule <=','CURDATE()',FALSE);
            $result = $this->db->get('course_subject_assessment_view');
            //$result = $this->db->query("SELECT * FROM course_subject_resource_view WHERE course_id = '.$course_id.' AND subject_name = '.$subject_name.' AND schedule <= 'CURDATE()' ORDER BY (res_order)");
            if($result->num_rows > 0){
                return $result->result();
            }
            return null;
        }
        // Operation : Get Associate CS_resources ie Course Subject Resources
        function get_associate_cs_resource($course_id,$subject_name){
            $this->db->order_by('res_order');
            $this->db->where(array('course_id' => $course_id,'subject_name' => $subject_name,'resource_status' => 'Published'));
            $this->db->where('schedule <=','CURDATE()',FALSE);
            $result = $this->db->get('course_subject_resource_view');
            //$result = $this->db->query("SELECT * FROM course_subject_resource_view WHERE course_id = '.$course_id.' AND subject_name = '.$subject_name.' AND schedule <= 'CURDATE()' ORDER BY (res_order)");
            if($result->num_rows > 0){
                return $result->result();
            }
            return null;   
        }

        // Operation : Get Assocaite CS_assessment ie Course Subject Assessment
        function get_associate_cs_assessment($course_id,$subject_name){
            $this->db->order_by('res_order');
            $this->db->where(array('course_id' => $course_id,'subject_name' => $subject_name,'resource_status' => 'Published'));
            $this->db->where('schedule <=','CURDATE()',FALSE);
            $result = $this->db->get('course_subject_assessment_view');
            if($result->num_rows > 0){
                return $result->result();
            }
            return null;   
        }
    //---------------------------------------------------------------------------------------
    // Associate Browser : Course - Module - Group - Subject - Resource / Assessment EndOfFile  
    //--------------------------------------------------------------------------------------- 


    // Operation : Get Subject Resources
    function subject_resources($course_id,$subject_name){
        $this->db->order_by('res_order');
        $result = $this->db->get_where('course_subject_resource_map',array('course_id' => $course_id,'subject_name' =>$subject_name));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get CS_resources ie Course Subject Resources
    function get_cs_resource($course_id,$subject_name){
        $this->db->order_by('res_order');
        $this->db->where(array('course_id' => $course_id,'subject_name' => $subject_name,'resource_status' => 'Published'));
        $this->db->where('schedule <=','CURDATE()',FALSE);
        $result = $this->db->get('course_subject_resource_view');
        //$result = $this->db->query("SELECT * FROM course_subject_resource_view WHERE course_id = '.$course_id.' AND subject_name = '.$subject_name.' AND schedule <= 'CURDATE()' ORDER BY (res_order)");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;   
    }

    // Operation : Get CS_assessment ie Course Subject Assessment
    function get_cs_assessment($course_id,$subject_name){
        $this->db->order_by('res_order');
        $this->db->where(array('course_id' => $course_id,'subject_name' => $subject_name,'resource_status' => 'Published'));
        $this->db->where('schedule <=','CURDATE()',FALSE);
        $result = $this->db->get('course_subject_assessment_view');
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;   
    }

    // Operation : Get Module List
    function get_module_list(){
        $result = $this->db->get('module_list');
        if($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Group List 
    function get_group_list(){
        $result = $this->db->get('group_list');
        if($result->num_rows() > 0) {
            return $result->result();
        }
        return null;   
    }

    // Operation : Get Content Director Admin Details
    function get_admin_subject_details($user_id){
        $result = $this->db->get_where('content_director_view',array('user_id' => $user_id));
        if($result->num_rows() > 0) {
            return $result->result();
        }
        return null;   
    }

    // Operation : Get Content Director subject 
    public function get_admin_subject($user_id){
        $result = $this->db->get_where('content_director_view',array('user_id' => $user_id));
        if($result->num_rows() > 0) {
            return $result->result_array();
        }
        return null;
    }

    // Operation : Get Courser id by course name 
    public function get_course_id($course_name){
        $query = array('course_name' => $course_name );
        $result = $this->db->get_where('course_master',$query);
        if ($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : Get Whos Uploaded This Resource 
    public function who_uploaded_this_resource($resource_id){
        $result = $this->db->get_where('mentor_resource_view',array('resource_id' => $resource_id));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
    }

    // Operation : Get Whos Uploaded This Assessment 
    public function who_uploaded_this_assessment($test_id){
        $result = $this->db->get_where('mentor_assessment_view',array('test_id' => $test_id));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
    }

    // Operation : Get All Mentor Resource List 
    public function get_all_mentor_resource_list(){
        $result = $this->db->get('mentor_resource_view');
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Sriram : Operation : Get All Mentor Resource List 
    public function get_all_mentor_resource_list1(){
        $result = $this->db->get_where('mentor_resource_view',array('user_role' => '6'));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Mentor Assessment List 
    public function get_all_mentor_assessment_list(){
        $result = $this->db->get('mentor_assessment_view');
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Sriram : Operation : Get All Mentor Assessment List 
    public function get_all_mentor_assessment_list1(){
        $result = $this->db->get_where('mentor_assessment_view',array('user_role' => '6'));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get all Admin Resources
    public function get_all_admin_resource_list(){
        $result = $this->db->get_where('mentor_resource_view',array('user_role !=' => '6'));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get all Admin Assessment
    public function get_all_admin_assessment_list(){
        $result = $this->db->get_where('mentor_assessment_view',array('user_role !=' => '6'));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // sriram : Operation : Get only Mentor Assessment List 
    public function get_only_mentor_resource_list($subject_name){
        $result = $this->db->get_where('mentor_resource_view',array('subject_name' => $subject_name, 'user_role' => '6'));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }


    
    
// ---------------------------------------------------------------------
//  Sriram ->  Getting number of subjects subscribed by Menter/SME      | 
// ---------------------------------------------------------------------

    // USK
    // Operation : Get SME Subjects and Resource Count
    public function get_sme_subjects_with_resource_count($user_id){
        $result = $this->db->query("SELECT count(resource_link) as res_count, subject_name,uploaded_user_id, resource_name FROM mentor_resource_view WHERE uploaded_user_id ='".$user_id."' GROUP BY (subject_name)");
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get SME Subjects and Assessment Count
    public function get_sme_subjects_with_assessment_count($user_id){
        $result = $this->db->query("SELECT count(test_no) as test_count, test_subject,uploaded_user_id, test_name FROM mentor_assessment_view WHERE uploaded_user_id ='".$user_id."' GROUP BY (test_subject)");
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get number of subjects subscribed by SME
    public function get_sme_subjects($user_id){
        $result = $this->db->query('SELECT count(resource_name) as res_count , resource_link, uploaded_user_id ,subject_name from mentor_resource_view where uploaded_user_id="'.$user_id.'" group by subject_name');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

    // Operation : Get no of mentor course count
    public function get_sme_course_count($mentor_id){
        $result = $this->db->query('SELECT count(*) from mentor_course_user_count_view where mentor_id = '.$mentor_id.'');
        if ($result->num_rows() > 0) {
            return $result->num_rows();
        }
        return null;
    }
    
    // Operation : Get no of mentor course and their subscriber count
    public function get_sme_course_and_subsc_count($mentor_id){
        $result = $this->db->query('SELECT * from mentor_course_user_count_view where mentor_id = '.$mentor_id.'');
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }


// select count(resource_name) as res_count , resource_link, uploaded_user_id ,subject_name from mentor_resource_view where uploaded_user_id=13 group by subject_name;

// ---------------------------------------------------------------------
}
