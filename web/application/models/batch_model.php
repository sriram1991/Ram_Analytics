<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Batch_model extends CI_Model {
    public function __construct() 
    {
        // Call the Model constructor 
        parent::__construct();
    }

    public function get_all_batch() {
        $result = $this->db->get('user_course_batch_view');
        if(isset($result)) {
            return $result->result();
        }
        return null;
    }

    public function get_all_batchnames(){
        $result = $this->db->query("Select Distinct user_state from user_master");
        if(isset($result)){
            return $result->result();
        }
        return null;
    }

    public function get_batch_details($batch_id) {
        $result = $this->db->get_where('batch_master',array('batch_id' => $batch_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }

    // For Validation Batch name
    public function get_batch_name($batch_name) {
        $result = $this->db->get_where('batch_master',array('batch_name' => $batch_name));
        if ($result->num_rows() > 0){
            return true;
        }
        return null;
    }

    // For Edit Batch Validation 
    public function check_batch_name_id($batch_id,$batch_name) {
        $check  = $this->db->get_where('batch_master',array('course_id' => $batch_id ,'batch_name' => $batch_name));
        if($check->num_rows() == 1){
            return null;
        } else {
            $result = $this->db->get_where('batch_master',array('batch_name' => $batch_name));
            if ($result->num_rows() > 0){
                return true;
            }
            return null;    
        }
        
    }

    

    public function add_batch($batch_array) {
        $batch_details = array(
                                'course_id'     => $batch_array['course_id'],
                                'batch_name'    => $batch_array['batch_name'],
                                'description'   => $batch_array['description'],
                                'start_date'    => $batch_array['start_date']
                              );
        $result = $this->db->insert('batch_master',$batch_details);
        if(isset($result)) {
            return $result;
        } else { return null; }
    }

    public function student_bulk_insert($student_array) {
        $result = $this->db->insert('student_bulk_upload',$student_array);
       //   log_message('debug','| student array size > '.count($student_array));
          return $result;

    }

    //Operation: Update Batch Deatils
    public function update_batch($batch_id,$batch_array){
        $batch_details = array(
                                'batch_name'    => $batch_array['batch_name'],
                                'course_id'     => $batch_array['course_id'],
                                'description'   => $batch_array['description'],
                                'start_date'    => $batch_array['start_date']
                              );
        $this->db->where('batch_id',$batch_id);
        $result = $this->db->update('batch_master',$batch_details);
        if(isset($result)){
            return $result;
        }
        return null;
    }

    // Operation : Delete a Batch 
    public function delete_batch($batch_id) {
        $result = $this->db->delete('batch_master',array('batch_id' => $batch_id));
        if(isset($result)) {
            return $result;
        }  else { return null; }
    }
    
    // sriram writen this............... for checking uesr_id accociate
    public function check_user_batch($user_id){
        $result = $this->db->get_where('batch_master',array('user_id'=>$user_id));
        if($result->num_rows > 0){
            return $result;
        } else { 
            return null; // Return null IF not Registered to any Batch
        }
    }
    // To fetch student_bulk_uploaded data in Payment gateway.
    public function get_associate_unpaid_student($user_id){
        $result = $this->db->get_where('student_bulk_upload',array('associate_id' => $user_id,'transaction_id'=>0));
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }

    public function get_students_tobe_registered($user_id){
        // $query = array('associate_id' => $user_id,'transaction_id'=>0);
        // $result = $this->db->get_where('student_bulk_upload',$query); 
        $result = $this->db->query("SELECT sbu.*,GROUP_CONCAT(sbu.course SEPARATOR '#') as user_courses FROM student_bulk_upload AS sbu WHERE associate_id ='".$user_id."' and transaction_id = '0' GROUP BY sbu.email");
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return null;   
    }

    public function delete_previously_saved_records($user_id){
        $query = array('associate_id' => $user_id,'transaction_id'=>0);
        $delete = $this->db->delete('student_bulk_upload',$query); 
    }


    public function set_transaction_id($id,$transaction_id){
        $query = array('transaction_id' => $transaction_id );
        $this->db->where('id',$id);
        $result = $this->db->update('student_bulk_upload',$query);
        if(isset($result)){
            return $result;
        }
        return null;
    }




    // fetch course student bulk upload
    public function get_paid_student1($user_id){
        $result = $this->db->get_where('student_bulk_upload',array('associate_id' => $user_id));
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return null;
    }



    // total amount of all students.
    function total_amount(){
        //$result = $this->db->query("SELECT SUM(cost) AS total FROM student_bulk_upload")->row();
        $this->db->select_sum('cost'); 
        $result = $this->db->get('student_bulk_upload');
        if(isset($result)) {
            return array_shift($result->result_array());
        }
    }

    // Operation : get user courses
    function my_courses($user_id){
        $result = $this->db->get_where('user_course_batch_view',array('user_id' => $user_id));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    function get_my_paid_courses($user_id){
        $result = $this->db->get_where('user_course_batch_view',array('user_id' => $user_id,'payment_status'=>2));
        // log_message('debug',"================= Modal ================= ".print_r($result,true));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;   
    }

    // Operation : Get All My Paid Area of Interest
    function get_my_paid_aoi($user_id){
        $result = $this->db->get_where('user_course_area_interest_view',array('user_id' => $user_id,'payment_status' => 2));
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get All Distinct Courses 
    function all_course($course_type){
        $this->db->group_by('course_name');
        $result = $this->db->get_where('user_course_view',array('course_type' => $course_type));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get Availabe Courses for USER 
    function get_available_courses($user_id,$course_type){
        // Try To Change This in Active Record 
        // DB Query: select bcv.* from batch_course_view as bcv where (bcv.course_type='Student' and bcv.course_id not in (select ucv.course_id from user_course_view as ucv where ucv.user_id = 2 group by ucv.course_id)) group by bcv.course_name; 
        $result = $this->db->query("SELECT * FROM user_course_view WHERE ((user_course_view.course_type = '$course_type') AND (user_course_view.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='$user_id' GROUP BY batch_master.course_id))) GROUP BY user_course_view.course_name;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // sriram
    function get_my_paid_courses1($area_of_int){
        $result = $this->db->query("SELECT distinct course_name,course_id from students_assessments_scores_view where test_subject = '".$area_of_int."' ");
        // log_message('debug',"================= Modal ================= ".print_r($result,true));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;   
    }

    // Operation : Get All Available Area of Interest 
    function get_available_aoi($user_id,$course_type){
        $result = $this->db->query("SELECT * FROM available_course_area_interest_view AS ACAIV WHERE ((ACAIV.course_type = '$course_type') AND (ACAIV.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='$user_id' GROUP BY batch_master.course_id))) GROUP BY ACAIV.subject_name;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get AOI Courses available 
    function get_aoi_avail_courses($user_id,$subject_name,$course_type){
        $result = $this->db->query("SELECT * FROM available_course_area_interest_view AS ACAIV WHERE ((ACAIV.course_type = '$course_type') AND (ACAIV.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='$user_id' GROUP BY batch_master.course_id)))  AND ACAIV.subject_name ='".$subject_name."' GROUP BY ACAIV.course_name;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get Paid AOI List
    function get_paid_aoi_list($user_id){
                  $this->db->group_by('subject_name');
        $result = $this->db->get_where('user_course_area_interest_batch_view',array('user_id' => $user_id));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get Paid AOI List
    function get_paid_aoi_courses($user_id,$subject_name){
                  // $this->db->group_by('course_name');
        // $result = $this->db->get_where('user_course_area_interest_batch_view',array('user_id' => $user_id, 'subject_name' => $subject_name));
        $result = $this->db->query("SELECT * FROM user_course_area_interest_batch_view WHERE user_id='".$user_id."' AND subject_name='".$subject_name."' GROUP BY course_name;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get Availabe Free Courses for USER 
    function get_available_free_courses($user_id,$course_type){
        // Try To Change This in Active Record 
        // DB Query:  SELECT * FROM user_course_view WHERE ((user_course_view.course_type = 'Student') AND (user_course_view.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='6' GROUP BY batch_master.course_id))) and user_course_view.course_fee ='0.00' GROUP BY user_course_view.course_name;
        $result = $this->db->query("SELECT * FROM user_course_view WHERE ((user_course_view.course_type = '$course_type') AND (user_course_view.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='$user_id' GROUP BY batch_master.course_id))) AND user_course_view.course_fee ='0.00' GROUP BY user_course_view.course_name;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Get Availabe Free Courses for USER 
    function get_available_paid_courses($user_id,$course_type){
        // Try To Change This in Active Record 
        // DB Query:  SELECT * FROM user_course_view WHERE ((user_course_view.course_type = 'Student') AND (user_course_view.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='6' GROUP BY batch_master.course_id))) and user_course_view.course_fee ='0.00' GROUP BY user_course_view.course_name;
        $result = $this->db->query("SELECT * FROM user_course_view WHERE ((user_course_view.course_type = '$course_type') AND (user_course_view.course_id NOT IN (SELECT batch_master.course_id FROM batch_master WHERE batch_master.user_id ='$user_id' GROUP BY batch_master.course_id))) AND user_course_view.course_fee !='0.00' GROUP BY user_course_view.course_name;");
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }



    // Operation : Get All Batches for this course id 
    function get_batchs($course_id){
        $result = $this->db->get_where('batch_course_view',array('course_id' => $course_id));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    // Operation : Subscribe Course 
    function subscribe_course($user_id,$batch_id,$course_id){
        $subscribe_details = array(
                                    'user_id'   => $user_id,
                                    'batch_id'  => $batch_id,
                                    'course_id' => $course_id
                                  );
        $result = $this->db->insert('user_batch_map',$subscribe_details);
        if($result != 0) {
            return $result;
        } else { return null; }
    }

    // Operation : Subcribe Course via Off Line Payment
    function join_course_offline($course_form){
        $data = array(
                        'batch_name'    => $course_form['batch_name'],
                        'user_id'       => $course_form['user_id'],
                        'course_id'     => $course_form['course_id'],
                        'course_fee'    => $course_form['course_fee'],
                        'transaction_id'=> $course_form['transaction_id']
                     );
        $result = $this->db->insert('batch_master',$data);
        if(isset($result)){
            return $result;
        }
        return null;
    }
    
    function registered_student_email($emailid){
        log_message('debug',' check email '.$emailid);
        $result = $this->db->query("SELECT user_email from user_master WHERE  user_email='$emailid'");
        log_message('debug','result '.$result);
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    function add_student_to_batch($student_array){
        $result = $this->db->insert('batch_master',$student_array);
        return $result;        
    }


    function get_subjects_details(){

        $result = $this->db->query("SELECT * from subject_master;");
        if($result->num_rows>0){
            return $result->result();            
        }
        return null;

    }
    // Operation : Get Subjects Lits used in Associate subject registartaion
    function get_subject_list(){
        $result = $this->db->get('subject_master');
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return null;
    }

    public function get_available_associate_subjects($user_id){
        $result = $this->db->query("SELECT distinct(subject_name) from associate_subject_map where user_id='".$user_id."';");
        if($result){
            return $result->result();
        }
        return null;
    }


    function get_course(){

        $result = $this->db->query("SELECT * from course_master  where course_status='Published'");
        if ($result->num_rows>0) {
            return $result->result();
        }
        return null;
    }

    // Operation : save_offline_pay..
    function save_offline_payment($bank_name,$chalan_no,$amount_paid,$paid_date){
        $data = array( 
                       'bank_name'  =>$bank_name,
                       'chalan_no'  =>$chalan_no,
                       'amount_paid'=>$amount_paid,
                       'paid_date'  =>$paid_date
                     );
        $result = $this->db->insert('payment_master',$data);
        log_message('debug','sri error here '.$result);
        if(isset($result)){
            return $result;
        }
        return null;
    }
    function subscribe_subject($associate_subject){

        $result = $this->db->insert('associate_subject_map',$associate_subject);
        if(!$result){
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            log_message('debug',">>> Add USER DB Error: \n");
            log_message('debug',">>> DB Error No : ".$num." \n");
            log_message('debug',">>> DB Error Msg: ".$msg." \n");
        }else{
            return $result;
        }
    }

    // Assoicate Subject Subscribtion Check
    function is_subject_subscribed($user_id){
        // $search_associate= array('user_id' => $user_id);
        // $res = $this->db->get_where('associate_subject_map',$search_associate);
        $res = $this->db->query("SELECT * from associate_subject_map where `user_id`='".$user_id."' and transaction_id != '0' ");
        if ($res->num_rows() > 0) {
            return true;
        }
            return null;
    }

    // Associate Availabel Courses
    function associate_available_course($user_id,$course_type){
        $this->db->group_by('course_id');
        $result = $this->db->get_where('associate_course_view',array('user_id' => $user_id, 'course_type' => $course_type));
        if($result->num_rows > 0){
            return $result->result();
        }
        return null;
    }

    function get_mystudents($associate_id){
        $result = $this->db->query("SELECT user_id from batch_master WHERE associate_id=".$associate_id);
        if(isset($result)){
            return $result->result_array();
        }else{
            return null;
        }
    }
    function get_mystudents_details($associate_id){
        // $result = $this->db->get_where('student_batch_payment_view',array('associate_id' => $associate_id));
        $result = $this->db->query("SELECT *,GROUP_CONCAT(course_name) AS course_names FROM student_batch_payment_view WHERE associate_id='".$associate_id."' GROUP BY user_id;");
        if(isset($result)){
            return $result->result();
        }else{
            return null;
        }
    }

    function unlink_user_course($user_id,$batch_id){
        $query = array('user_id' => $user_id,'batch_id'=> $batch_id);
        $result = $this->db->delete('batch_master',$query);
        return $result;
    }

    // Unlink mentor to course 
    function unlink_mentor_course($user_id,$map_id){
        $query = array('mentor_id' => $user_id,'map_id'=> $map_id);
        $result = $this->db->delete('mentor_course_map',$query);
        return $result;
    }

    function get_add_students_course_list($user_id,$course_type){
        $result = $this->db->query("SELECT * FROM associate_add_student_course_view WHERE user_id = '".$user_id."' AND course_type ='".$course_type."' AND payment_status = '2' GROUP BY course_id;");
        if($result->num_rows() > 0){
            return $result->result();
        }
        return null;
    }
    // Operation : for Student Side Batch wise Rank Details 
    // USK -------------------------------------------------------------------------------------------
    public function get_batch_details_userid_course_id($user_id,$course_id) {
        $result = $this->db->get_where('batch_master',array('user_id' => $user_id,'course_id' => $course_id));
        if(isset($result)) {
            return array_shift($result->result_array());
        }
        return null;
    }
    // USK -------------------------------------------------------------------------------------------
}