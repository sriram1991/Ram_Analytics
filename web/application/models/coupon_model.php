<?php if(!defined('BASEPATH')) exit('Direct script access is prohibited');
class Coupon_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function generate($coupon_code_array,$discount_amount,$valid_till,$no_of_coupons){
    	
      for($i=0;$i<$no_of_coupons;$i++)
      {
        log_message('debug','Coupon is '.$coupon_code_array[$i]);
        $querry = array('coupon_code' =>$coupon_code_array[$i] ,'discount_amount' => $discount_amount,'valid_till' => $valid_till,'coupon_status' =>1 );
        $res = $this->db->insert('couponcode_master',$querry);
        if ($res== '')
          return false;
      }

    }


    public function update_couponcode($user_id,$promo_code){
        log_message('debug','###########Promo code is '.$promo_code);
        $updated_data =array('user_id' => $user_id,'coupon_status'=>2);
        $this->db->where('coupon_code',$promo_code);
        $result = $this->db->update('couponcode_master',$updated_data);
    }

    public function get_all_coupons(){
      $result = $this->db->get('couponcode_master');
      if(isset($result)) {
        return $result->result();
      }
      return null;
    }
    
    public function check_coupon_code($coupon_code){
        
        $result = $this->db->get_where('couponcode_master',array('coupon_code' => $coupon_code));
        if($result->num_rows() > 0){
            return array_shift($result->result());
        }else{
            return null;
        }
    }

    public function change_coupon_code_status($coupon_code,$status){
        $update_data = array('coupon_status'=>$status);
        $this->db->where('coupon_code',$coupon_code);
        $result = $this->db->update('couponcode_master',$update_data);
        // if(issest($result)){
        //     return true;
        // }else{
        //     return false;
        // }
    }

}