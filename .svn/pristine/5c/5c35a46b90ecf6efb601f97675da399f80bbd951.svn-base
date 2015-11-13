<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class User_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // Operation : Authenticate User
    public function authenticateUser($user_email,$user_password) {
        $querry = array('user_email' => $user_email, 'user_password' => md5($user_password));
        $res    = $this->db->get_where('user_master',$querry);
        if($res->num_rows() == 1) {
            $user_details = array_shift($res->result_array());
            $role = $this->db->get_where('role_master', array('role_id' => $user_details['user_role']));
            if($role->num_rows() == 1) {
                $user_role = array_shift($role->result_array());
                $user_details['user_type'] = $user_role['role_name'];
            }
            return $user_details;
        } else {
            return null;
        }
                
    }


    function check_associate_paid_status($user_id){
        $result = $this->db->get_where('associate_subject_payment_view',array('user_id' => $user_id));
        if ($result->num_rows() > 0) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : get user details
    function get_all_users(){
        $result = $this->db->get('user_master');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Opetation : Get USER Count 
    function get_user_count($user_role){
        $result = $this->db->get_where('user_master',array('user_role' => $user_role));
        return $result->num_rows();
    }

    // Operation : Get Affilate Enrolled Users Count 
    function get_affilate_joined_user_count($user_id,$user_role){
        $result = $this->db->get_where('affilate_user_map_view',array('affilate_user_id' => $user_id, 'user_role' => $user_role));
        return $result->num_rows();
    }

    // Operation : get perticular user details Note: Type could be number 
    function get_users_list_view($user_role){
        $result = $this->db->get_where('user_status_role_view',array('user_role' => $user_role));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Affilate User List View for this user 
    function get_affilate_users_list_view($user_id,$user_role){
        $result = $this->db->get_where('affilate_user_map_view',array('affilate_user_id' => $user_id, 'user_role' => $user_role));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }
   
    // Operation : get perticular user details Note: Type could be number 
    function get_doc_list_view(){
        $result = $this->db->get('associate_additional_view'); // change master table to view
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Associate Subject Regisrtation List
    function associate_subject_registration_list(){
        $result = $this->db->get('associate_subject_registration');
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // For Getting Associate Pdf detials 
    public function get_asso_docs_details($user_id) {
        $result = $this->db->get_where('associate_details_master',array('user_id' => $user_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }


    // Operation : activate user
    public function change_user_status($user_id,$user_status){
        $data = array('user_status' => $user_status);
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('user_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }

    //operation: Delete unverified user
    public function delete_user($user_id) {
        $result = $this->db->delete('user_master',array('user_id' => $user_id ));
        if(isset($result)) {
            return $result;
        }
        return null;
    }

    // Opetation : Get User Details 
    function get_user_details($user_email){
        $result = $this->db->get_where('user_master',array('user_email' => $user_email));
        if(isset($result)){
            return array_shift($result->result_array());
        }
        return null;
    }

    // Opetation : Get User Details user id
    function get_userid_details($user_id){
        $result = $this->db->get_where('user_master',array('user_id' => $user_id));
        if(isset($result)){
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : Get Directors Subject 
    function get_director_list($user_role){
        $result = $this->db->get_where('content_director_view',array('user_role' => $user_role));
        if($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Mentor SME List Grouped By Subject Names 
    function get_director_group_concat_list($user_role){
        // $result = $this->db->get_where('content_director_view',array('user_role' => $user_role));
        $result = $this->db->query("SELECT CDV.*, GROUP_CONCAT(CDV.subject_name SEPARATOR ',') AS group_subject_name FROM content_director_view AS CDV GROUP BY user_id");
        if($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Directors Subject 
    function get_director_details($user_id){
        $result = $this->db->get_where('content_director_view',array('user_id' => $user_id));
        if($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }

    // Operation : Get Directors Subject 
    function get_content_director_details($user_id){
        $result = $this->db->get_where('content_director_view',array('user_id' => $user_id));
        if($result->num_rows() > 0) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : Get Content Admin Subject :
    function get_admin_subject($user_id){
        $result = $this->db->get_where('content_director_view',array('user_id' => $user_id));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : get offline payment list 
    function get_offline_pay_list_view($payment_mode){
        // $result = $this->db->get_where('payment_master',array('payment_mode' => $payment_mode));
        $result = $this->db->get_where('payment_master_user_view',array('payment_mode' => $payment_mode));
      // log_message('debug','i error cought here'.$result);
       if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    // Operation : get perticular user details Note: Type could be number 
    function get_parent_child_list_view($user_id){
        // Directly we can take from attempt master table        
        $result = $this->db->get_where('parent_student_view',array('user_id' => $user_id));
        // $result = $this->db->get_where('attempt_master',array('user_id' => $user_id));
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }


    // Operation : activate user
    function change_payment_status($transaction_id,$payment_status){
        $data = array('payment_status' => $payment_status);
        $this->db->where('transaction_id', $transaction_id);
        $result = $this->db->update('payment_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }

    // Operation : user course link view
    function user_course_link_view($user_role){
        $result = $this->db->get_where('user_course_link_view',array('user_role' => $user_role));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;    
    }

    // Opetation : Get User Details 
    function get_student_record($search_query){
        // $result = $this->db->get_where('user_master',array('user_email' => $user_email));
        $result = $this->db->query("SELECT * FROM user_master WHERE user_role ='1' AND user_status <= 3 AND (user_email ='".$search_query."' OR registration_no ='".$search_query."');");
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return null;
    }

    // sriram Opetation : Get mentor Details 
    function get_mentor_record($search_query){
        // $result = $this->db->get_where('user_master',array('user_email' => $user_email));
        $result = $this->db->query("SELECT * FROM user_master WHERE user_role ='6' AND user_status <= 3 AND (user_email ='".$search_query."' OR registration_no ='".$search_query."');");
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return null;
    }

    // Opetation : Get Student Bulk Record Details for Affiliate Student Bulk Registration for getting scourse
    function get_student_bulk_record_details($search_query){
        // $result = $this->db->get_where('user_master',array('user_email' => $user_email));
        $result = $this->db->query("SELECT * FROM user_master WHERE user_role ='1' AND user_status <= 4 AND (user_email ='".$search_query."' OR registration_no ='".$search_query."');");
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return null;
    }

    //For getting associate students count
    public function get_associate_students($associate_id){
        $result = $this->db->query("SELECT count(distinct(user_id)) as student_count FROM student_batch_payment_view WHERE associate_id ='".$associate_id."';");
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return null;
    }


    //For getting associate course count based on the course type
    public function get_associate_courses($associate_id,$course_type){
        // select * from associate_course_view where user_id=8 and course_type='Student' group by course_id;
        $result = $this->db->query("SELECT * FROM associate_course_view WHERE user_id='".$associate_id."' AND course_type='".$course_type."' GROUP BY course_id;");
        if($result->num_rows() > 0){
            return $result->num_rows();
        }
        return null;
    }

    // Operation : get_student_course
    function get_student_course(){
        $result = $this->db->get('user_course_view');
        if(isset($result)){
            return $result->result_array();
        }
        return null;
    }

    // Opration : get all area of interest (subjects) of SPOC 
    function load_associate_subject($user_email){
        $result = $this->db->get_where('associate_subject_payment_view',array('user_email' => $user_email, 'payment_status' => 2));
        if(isset($result)){
            return $result->result_array();
        }
        return null;
    }

    // Operation : get mapped courses
    function get_mapped_course($user_id,$course_id){
        $result = $this->db->get_where('user_course_batch_view',array('user_id' => $user_id, 'course_id' => $course_id));
       // var_dump($result);
        if(sizeof($result->result_array()) > 0){
            return true;
        }
        return false;
    }

    // Operation : get mapped courses
    function get_mentor_mapped_course($user_id,$course_id){
        $result = $this->db->get_where('mentor_course_map_view',array('mentor_id' => $user_id, 'course_id' => $course_id));
       // var_dump($result);
        if(sizeof($result->result_array()) > 0){
            return true;
        }
        return false;
    }

    // Operaton : check isThereNoStudentLink
    function isThereNoStudentLink($registration_no){
        $result = $this->db->query("SELECT * FROM student_batch_payment_view WHERE registration_no ='".$registration_no."' AND associate_id =0");
        if($result->num_rows() > 0){
            return true;
        }
        return null;
    }

    // Operaton : check isThereStudentLink
    function isThereStudentLink($registration_no){
        $result = $this->db->query("SELECT * FROM student_batch_payment_view WHERE registration_no ='".$registration_no."' AND associate_id !=0");
        if($result->num_rows() > 0){
            return true;
        }
        return null;
    }

    // Operation : Check isThereAssoicate Exists
    function isThereAssociate($registration_no){
        // $result = $this->db->query("SELECT * FROM user_master WHERE registration_no ='"$registration_no"' AND associate_id !=0");
        $result = $this->db->query("SELECT * FROM user_master WHERE user_role = '3' AND user_status <= '3' AND registration_no = '".$registration_no."';");
        if($result->num_rows() == 1){
            return true;
        }
        return null;
    }


    function get_course_of_test(){
        $result = $this->db->get('course_master');
        if (isset($result)) {
            return $result->result();
        }
        return null;
    }
    
    function get_students_test($course_id){
        $this->db->distinct($course_id);
        $result = $this->db->get_where('course_subject_assessment_view',array('course_id' => $course_id));
         if (isset($result)) {
             return $result->result();
         }
         return null;
    }

    public function load_student_name($registration_no){        
        $result = $this->db->get_where('user_master',array('registration_no' => $registration_no,'user_role' => 1));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    public function load_associate_name($registration_no){        
        $result = $this->db->get_where('user_master',array('registration_no' => $registration_no,'user_role' => 3));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    public function get_student_id($student_registration_no){
        $result = $this->db->get_where('user_master',array('registration_no' => $student_registration_no));
        if(isset($result)){
            return array_shift($result->result_array());
        }
        return null;
    }

    public function get_associate_id($associate_registration_no){
        $result = $this->db->get_where('user_master',array('registration_no' => $associate_registration_no));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    public function link_student_associate($student_id,$associate_id,$batch_id,$batch_name){    
        $data = array('batch_name' => $batch_name,'associate_id' => $associate_id,'batch_type' => 'Associate');
        $this->db->where(array('user_id' => $student_id, 'batch_id' => $batch_id));
        $result = $this->db->update('batch_master',$data);

        if($result == 1){
            return $result;
        }
        return null;
    }

    public function linked_student_details($registration_no){
        $result = $this->db->query("SELECT * FROM student_batch_payment_view WHERE registration_no ='".$registration_no."' AND associate_id !=0");
        if ($result->num_rows() > 0) {
            return array_shift($result->result_array());
        }
        return null;
    }

    public function load_linked_student_details($registration_no){
        $result = $this->db->query("SELECT * FROM associate_student_link WHERE student_regno ='".$registration_no."' AND associate_id !=0");
        
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }

    public function unlink_student_associate($student_id,$batch_id,$batch_name){
        $data = array('batch_name' => $batch_name,'associate_id' => 0,'batch_type' => 'Online');
        // $this->db->where('user_id', $student_id);
        $this->db->where(array('user_id' => $student_id, 'batch_id' => $batch_id));
        $result = $this->db->update('batch_master',$data);

        if(isset($result)){
            return $result;
        }
        return null;
    }

    public function check_student_id($user_id){
        $result = $this->db->get_where('batch_master',array('user_id' => $user_id,'associate_id' => 0));

        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    public function get_valid_student($registration_no){
        $result = $this->db->get_where('user_master',array('registration_no' => $registration_no, 'user_role' => 1));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    // Action -> update student details 
    function update_student_registration($user_details) {
        $data = array(
                       'user_fname'     => $user_details['user_fname'],
                       'user_mname'     => $user_details['user_mname'],
                       'user_lname'     => $user_details['user_lname'],
                       'user_phone'     => $user_details['user_phone'],
                       'user_address'   => $user_details['user_address'],
                       'user_city'      => $user_details['user_city'],
                       'user_country'   => $user_details['user_country'],
                       'user_state'     => $user_details['user_state'],
                       'user_pin'       => $user_details['pincode']
                     );
        $this->db->where('user_id' , $user_details['user_id']);
        $result_usr = $this->db->update('user_master',$data);
        
        if($result_usr !== null) {
            return true;
        }
        return null;
    }

    // Action -> update associate details 
    function update_associate_registration($user_details) {
        $data = array( 
                       'user_fname'    => $user_details['user_fname'],
                       'user_mname'    => $user_details['user_mname'],
                       'user_lname'    => $user_details['user_lname'],
                       'user_phone'    => $user_details['user_phone'],
                       'user_address'  => $user_details['user_address'],
                       'user_city'     => $user_details['user_city'],
                       'user_state'    => $user_details['user_state'],
                       'user_country'  => $user_details['user_country'],
                       'user_pin'      => $user_details['pincode']
                     );
        $this->db->where('user_id' , $user_details['user_id']);
        $result_usr = $this->db->update('user_master',$data);
        
        if($result_usr !== null) {
            return true;
        }
        return null;
    }

    // get all students and associates used for graphs
    public function get_all_students_and_associates($user_role,$user_type){
        $result = $this->db->query('SELECT count(*) as '.$user_type.' ,month(user_updated) as month from user_master where user_role = '.$user_role.' and year(user_updated) = year(CURDATE()) group by month(user_updated)');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return null;
    }

    // get all student details of joined month used for graphs.
    public function get_student_under_associate($user_id,$user_type){

        $result = $this->db->query('SELECT count(user_id) as '.$user_type.',month(batch_updated) as month from batch_master where associate_id = '.$user_id.' and year(batch_updated) = year(CURDATE()) group by month');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return null;
    }
   
   //get particular student score in student dashboard
   public function get_my_montly_score($user_id,$percentage){
        $result = $this->db->query('SELECT test_percentage as '.$percentage.',month(test_date) as month from student_assessment_score_view where user_id='.$user_id.' and year(test_date) = year(CURDATE()) group by month');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return null;
   }

   public function get_student_for_each_course($no_of_students){
        $result = $this->db->query('SELECT course_name,count(course_id) as '.$no_of_students.' from user_course_batch_view where payment_status=2 group by course_id');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return null;
   }

   public function get_subject_of_course($course_id){
        $result = $this->db->get_where('student_course_subject_view', array('course_id' => $course_id));
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return null;

   }

    // get subjects of course
    public function get_subject_under_course($course_id,$user_id){
        $result = $this->db->query("SELECT distinct(subject_name) FROM student_course_subject_view where course_id = '".$course_id."'and user_id = '".$user_id."';");
        if ($result){
            return $result->result();
        }
        return null;
    }

    //get details of particular subject
    public function get_subject_details($user_id,$subject_name,$course_id){
        $result = $this->db->query("SELECT subject_name,ROUND(avg(test_percentage),2) as test_percentage,month(test_date) as month from student_course_subject_view where user_id='".$user_id."' and subject_name='".$subject_name."' and course_id= '".$course_id."' and year(test_date) = year(CURDATE()) group by month;");
        if ($result) {
            return $result->result_array();
        }
        return null;
    }
    
    // Operation : Check user Email Validation and allowing students even if he registered already 
    public function check_email($email) {

        // $search_email = array('user_email' => $email);
        $res = $this->db->query("SELECT * from user_master WHERE user_email='".$email."' and user_role != 1");
        if ($res->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    // Operation : Check Associate mapped with Subjects ( for Affiliate Subject Registration )
    function is_associate_has_subject($user_id,$subject_name){
        $result = $this->db->get_where('associate_subject_map',array('user_id' => $user_id, 'subject_name' => $subject_name));
        if(sizeof($result->result_array()) > 0){
            return true;
        }
        return false;
    }

    // Operation : load course for displaying course in unlink
    function load_course($student_id){
    
        $result = $this->db->get_where('students_course_link_view',array('student_id' => $student_id , 'associate_id' => 0));
        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return null;
        }
    }
 
    // Opetation : upldaet license request with new license and cost 
    function update_license_request($quote_id,$final_license,$final_license_cost){        
    
        $data   = array('no_of_license'=>$final_license, 'discount_amount'=>$final_license_cost); 
        // $this->db->where('quote_id', $quote_id);
        $result = $this->db->update('quote_request_master',$data,array('quote_id' => $quote_id));        
        $res = $this->db->affected_rows();
        if($res == 1){
            return true;
        }
        return false;
    }

    // Operation : get perticular user details Note: Type could be number 
    function get_userid_status_details($user_id){
        $result = $this->db->get_where('user_status_role_view',array('user_id' => $user_id));
        if($result->num_rows() == 1){
            return array_shift($result->result_array());
        }
        return null;
    }

    // Operation : used to get Mentor Course Link with user subscription count
    function mentor_course_link_view($user_role){
        // $result = $this->db->get_where('mentor_course_map_view',array('user_role' => $user_role));
        $result = $this->db->get_where('mentor_course_user_count_view',array('user_role' => $user_role));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;    
    }

    //-----------------------------------------------------------------------------------//
}
