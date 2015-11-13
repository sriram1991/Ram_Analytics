<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*====== USER ROLES =========*
 |       1 | Student         |
 |       2 | Parent/Guardian |
 |       3 | SPOC           |
 |       4 | Registrar       |
 |       5 | Accountant      |
 |       6 | Mentor/SME      |
 |       7 | Super Admin     |
 |       8 | Content Admin   |
 |       9 | Affiliate Role  |
 *===========================*/

abstract class Common_Controller extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('user_id')) {
            log_message('debug','************ Common Controller ***************');
            log_message('debug','| User Doest Not Exist ');
            log_message('debug','**********************************************');
            redirect('/login');
        }
        // Checking for User Status 
        if($this->session->userdata('user_id')) {
            if($this->session->userdata('user_status') == 4) {
                log_message('debug','************ Common Controller *******************');
                log_message('debug','| This User email verification Pending ');
                log_message('debug','**************************************************');
                $this->session->set_flashdata('error_msg', 'Your email is not verified please click the verification link already sent to your email !');
                redirect('/logout');
            }
            if($this->session->userdata('user_status') == 5) {
                log_message('debug','************ Common Controller *******************');
                log_message('debug','| This User Account is In-Active ');
                log_message('debug','**************************************************');
                $this->session->set_flashdata('error_msg', 'Your Account is In-Active please contact '.PRODUCT_NAME.' admin');
                redirect('/logout');
            }    
        }
    }
}

class AM_Controller extends Common_Controller {
    public function __construct() {
        parent:: __construct();
        $user_role = $this->session->userdata('user_role');
        if($user_role != 7 && $user_role !=8) {
            log_message('debug','************ AM Controller ***************');
            log_message('debug','| This User is Not Admin');
            log_message('debug','******************************************');
            redirect('/previlege_error');
        }
    }
}

class CD_Controller extends Common_Controller {
    public function __construct() {
        parent:: __construct();
        $user_role = $this->session->userdata('user_role');
        if($user_role != 7 && $user_role !=8) {
            log_message('debug','************ AM Controller ***************');
            log_message('debug','| This User is Not Content Director Admin');
            log_message('debug','******************************************');
            redirect('/previlege_error');
        }
    }
}

class CW_Controller extends Common_Controller {
    public function __construct() {
        parent:: __construct();
        $user_role = $this->session->userdata('user_role');
        if($user_role != 8 && $user_role != 7 && $user_role != 6) {
            log_message('debug','************ CW Controller ***************');
            log_message('debug','| This User is neither Admin not Content writer');
            log_message('debug','******************************************');
            redirect('/previlege_error');
        }
    }
}

class RR_Controller extends Common_Controller {
    public function __construct() {
        parent:: __construct();
        $user_role = $this->session->userdata('user_role');
        if($user_role != 9 && $user_role != 8 && $user_role != 7 && $user_role != 6 && $user_role != 5 && $user_role != 4) {
            log_message('debug','************ Registrar Controller ***************');
            log_message('debug','| This User is neither Admin nor registrar');
            log_message('debug','*************************************************');
            redirect('/previlege_error');
        }
    }
}

class AF_Controller extends Common_Controller {
    public function __construct() {
        parent:: __construct();
        $user_role = $this->session->userdata('user_role');
        if($user_role != 9 && $user_role != 8 && $user_role != 7 && $user_role != 6 && $user_role != 5 && $user_role != 4) {
            log_message('debug','************ Affilate Controller ***************');
            log_message('debug','| This User is neither Admin nor Affilate');
            log_message('debug','*************************************************');
            redirect('/previlege_error');
        }
    }
}

class ACT_Controller extends Common_Controller {
    public function __construct() {
        parent:: __construct();
        $user_role = $this->session->userdata('user_role');
        if($user_role != 7 && $user_role != 5) {
            log_message('debug','************ Accountant Controller ***************');
            log_message('debug','| This User is neither Admin nor accountant');
            log_message('debug','**************************************************');
            redirect('/previlege_error');
        }
    }
}

class SM_Controller extends Common_Controller {
    public function __construct(){
        parent::__construct();
        $user_role = $this->session->userdata('user_role');        
        if($user_role != 7 && $user_role != 1){
            log_message('debug','************ AM Controller ***************');
            log_message('debug','| This User is Not Student');
            log_message('debug','******************************************');
            redirect('/previlege_error');
        }

        if($this->session->userdata('user_id')) {
            if($this->session->userdata('user_status') == 3 ) {
                log_message('debug','************ SM Controller ***************');
                log_message('debug','| This User Had Not Done Payment');
                log_message('debug','******************************************');
                redirect('/student/payment');
            }
        }
    }
}

class PG_Controller extends Common_Controller {
    public function __construct(){
        parent::__construct();
        $user_role = $this->session->userdata('user_role');        
        if($user_role != 7 && $user_role != 2 && $user_role != 3){
            log_message('debug','************ PG Controller ***************');
            log_message('debug','| This User is Not Parent / Guardian');
            log_message('debug','******************************************');
            redirect('/previlege_error');
        }

        if($this->session->userdata('user_id')) {
            if($this->session->userdata('user_status') == 3 ) {
                log_message('debug','************ PG Controller ***************');
                log_message('debug','| This User Had Not Done Payment');
                log_message('debug','******************************************');
                redirect('/parent/payment');
            }
        }
    }
}

class ASM_Controller extends Common_Controller {
    public function __construct(){
        parent::__construct();
        $user_role = $this->session->userdata('user_role');        
        if($user_role != 7 && $user_role != 3){
            log_message('debug', 'not student');
            redirect('/previlege_error');
        }

        if($this->session->userdata('user_id')) {
            if($this->session->userdata('user_status') == 3 ) {
                log_message('debug','************ ASM Controller ***************');
                log_message('debug','| This User Had Not Done Payment');
                log_message('debug','*******************************************');
                redirect('/associate/payment');
            }
        }
    }
}