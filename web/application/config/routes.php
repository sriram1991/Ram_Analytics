<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = '';

/*
| -------------------------------------------------------------------------
| URI ROUTING For Registration
| -------------------------------------------------------------------------
|
*/

// Login Contrller--------------------------------------------------------------------------
$route['login']  			= "login";
$route['logout'] 			= "login/logout";
$route['previlege_error'] 	= "Error_Controller/previlegeError";
$route['register']	    	= "user_registration";
// -----------------------------------------------------------------------------------------


// USER Registrations ----------------------------------------------------------------------

// $route['register/student']   		  = "registration/student_registration";
$route['register/user']   		  	  = "registration/student_registration";
// $route['register/associate'] 		  = "registration/associate_registration";
$route['register/spoc'] 		  	  = "registration/associate_registration";
$route['register/director']  		  = "registration/director_registration";
$route['register/update_director']    = "registration/update_director_details";
$route['register/affilate']   		  = "registration/affilate_registration";

$route['student/payment'] 	 		  = "registration/student_payment";
$route['parent/payment']	 		  = "registration/parent_payment";
$route['associate/payment']	 		  = "registration/associate_payment";
$route['associate/get_dashboard']     = "associate/ASH_Controller/get_dashboard";
$route['associate/mystudents'] 		  = "associate/ASH_Controller/mystudents";

// Added br ram .......
$route['associate/get_my_user'] 	  	   		= "associate/ASH_Controller/get_my_user";
$route['associate/sopc_user_details']      		= "associate/ASH_Controller/sopc_user_details";
$route['associate/spoc_user_details_list'] 		= "associate/ASH_Controller/spoc_user_details_list";
$route['associate/course_of_test'] 		   		= "associate/ASH_Controller/course_of_test";
$route['associate/load_user_subscribed_course'] = "associate/ASH_Controller/load_user_subscribed_course";

$route['associate/mystudents_reports']= "associate/ASH_Controller/mystudents_reports";
$route['associate/get_all_tests']	  = "associate/ASH_Controller/get_all_tests";
$route['associate/mystudents_ranks']  = "associate/ASH_Controller/mystudents_ranks";

// -----------------------------------------------------------------------------------------


// Common Controller -----------------------------------------------------------------------
$route['profile']            			  = "common/Profile_Controller";
$route['profile/ajax_profile_update']     = "common/Profile_Controller/ajax_profile_update";
$route['profile/change_pwd'] 			  = "common/Profile_Controller/change_pwd_response";
$route['profile/edit_profile_modal']	  = "common/Profile_Controller/edit_profile_modal";
$route['profile/send_profile_update_mail']= "common/Profile_Controller/send_profile_update_mail";
// -----------------------------------------------------------------------------------------


// Forgot Password -------------------------------------------------------------------------
$route['reset/isEmailValid']  = "registration/is_email_valid";
$route['forgot_password']     = "registration/forgot_password";
$route['resetpass']           = "registration/reset_password";
// -----------------------------------------------------------------------------------------


// USER Home Pages -------------------------------------------------------------------------
$route['admin_home']		  	= "admin/AH_Controller";
// $route['student_home'] 		  	= "student/SH_Controller";
$route['user_home'] 		  	= "student/SH_Controller";
$route['parent_home']  	 	  	= "parent/PH_Controller";
// $route['associate_home'] 	  	= "associate/ASH_Controller";
$route['spoc_home'] 	  		= "associate/ASH_Controller";
$route['registrar_home']      	= "registrar/Registrar_Controller";
// $route['content_admin_home']  	= "contents/ContentAdmin_Controller";
$route['mentor_home']  			= "contents/ContentAdmin_Controller";
$route['content_director_home'] = "content_director/ContentDirector_Controller";
$route['accountant_home']	  	= "accountant/ACH_Controller"; 
$route['affilate_home']      	= "affilate_role/Affilate_Controller";
// -----------------------------------------------------------------------------------------

// Accountant Management -------------------------------------------------------------------
$route['accountant/dashboard']						   	= "accountant/ACH_Controller/dashboard";
$route['accountant/offline_payment']	   			   	= "accountant/ACH_Controller/offline_payment";
$route['accountant/offline_not_verified_payment_list'] 	= "accountant/ACH_Controller/offline_not_verified_payment_list";
$route['accountant/offline_payment_list']  			   	= "accountant/ACH_Controller/offline_payment_list";
$route['accoutant/do_paid']  			   			   	= "accountant/ACH_Controller/do_paid";

// -----------------------------------------------------------------------------------------

// Associate Management ---------------------------------------------------------------------
$route['associate/dashboard'] 					  = "associate/ASH_Controller/dashboard";
$route['associate/add_student'] 				  = "associate/ASH_Controller/add_student"; // added for bulk student fee paid...
$route['associate/upload'] 						  = "associate/ASH_Controller/save_associate_qualification";
$route['associate/course_tree'] 				  = "associate/ASH_Controller/course_tree";
$route['associate/save_students_data'] 			  = "associate/ASH_Controller/save_students_data";
$route['associate/check_student_email'] 		  = "associate/ASH_Controller/check_student_email";
$route['associate/bulk_student_offline_payment']  = "associate/ASH_Controller/bulk_student_offline_payment";
$route['associate/joining_fee_payment'] 		  = "associate/ASH_Controller/joining_fee_payment";
$route['associate/save_offline_pay'] 			  = "associate/ASH_Controller/save_offline_pay";
$route['associate/students_tobe_registered']	  = "associate/ASH_Controller/students_tobe_registered";
$route['associate/checkEmail']	  				  = "associate/ASH_Controller/checkEmail";
$route['associate/load_subject_reg_view']		  = "associate/ASH_Controller/associate_subject_registration";
$route['associate/get_all_my_quotes']			  = "associate/ASH_Controller/get_all_my_quotes_list";	
// Bulk user enrolment with registration for spoc users
$route['associate/save_users_data'] 			  = "associate/ASH_Controller/save_users_data"; 
//-------------------------------------------------------------------------------------------

// Associate Course Materials Management ----------------------------------------------------
	$route['associate/course_materials']          = "associate/ASH_Controller/course_materials_dashboard";
	$route['associate/training_materials']        = "associate/ASH_Controller/training_materials_dashboard";
	$route['associate/student_course_tree']       = "associate/ASH_Controller/get_student_course_tree";

// Student Course Resource Browser ---------------------------------------------------------------
    $route['associate/student_course_modules']    = "associate/ASH_Controller/get_student_course_modules";
    $route['associate/student_course_syllabus']   = "associate/ASH_Controller/view_course_syllabus";
    $route['associate/student_course_groups']     = "associate/ASH_Controller/get_student_course_module_group";
    $route['associate/student_course_subjects']   = "associate/ASH_Controller/get_student_course_module_group_subject";
    $route['associate/student_cmgs_resources']    = "associate/ASH_Controller/get_student_course_module_group_subject_resources";
    $route['associate/open_subject_resources']    = "associate/ASH_Controller/open_subject_resources";
    $route['associate/open_pdf']                  = "associate/ASH_Controller/open_pdf_resource";
    $route['associate/open_video']                = "associate/ASH_Controller/open_video_resource";
    $route['associate/embed']                     = "associate/ASH_Controller/associate_video_embed";
    $route['associate/open_test_page']            = "associate/ASH_Controller/open_test_page";
    $route['associate/open_question_paper']       = "associate/ASH_Controller/open_question_paper";
    $route['associate/show_answer_key']           = "associate/ASH_Controller/open_show_answer_key";
    $route['associate/open_captiva']              = "associate/ASH_Controller/open_captiva_resource";
    $route['associate/open_captiva_quiz']         = "associate/ASH_Controller/open_captiva_quiz_resource";

    $route['associate/addstudentModal']           = "associate/ASH_Controller/addstudentModal";
	$route['associate/editstudentModal']          = "associate/ASH_Controller/editstudentModal";
	$route['associate/this_student_course']       = "associate/ASH_Controller/available_student_course";
	$route['associate/delete_unpaid_students']	  = "associate/ASH_Controller/delete_previously_saved_records";
	$route['associate/user_of_SPOC']	  		  = "associate/ASH_Controller/user_of_SPOC";
	$route['associate/bulk_user_registration'] 	  = "associate/ASH_Controller/bulk_user_registration";
	$route['associate/license_request']			  = "associate/ASH_Controller/license_request";
	$route['associate/send_license_request']	  = "associate/ASH_Controller/send_license_request";

// -----------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------

// Student Management -----------------------------------------------------------------------

$route['student/dashboard'] 			= "student/SH_Controller/dashboard";
$route['student/mycourses'] 			= "student/SH_Controller/my_courses";
$route['student/get_course_details']	= "student/SH_Controller/get_course_details";
$route['student/get_course_batch']		= "student/SH_Controller/get_course_batch";
$route['student/subscribe_course']		= "student/SH_Controller/subscribe_course";
$route['student/join_course_offline']	= "student/SH_Controller/join_course_offline";
$route['student/course_tree']			= "student/SH_Controller/course_tree";
$route['student/course_subjects_grid'] 	= "student/SH_Controller/course_subjects_grid";
$route['student/subject_resources']		= "student/SH_Controller/subject_resources";
$route['student/open_pdf']				= "student/SH_Controller/open_pdf_resource";
$route['student/open_video']			= "student/SH_Controller/open_video_resource";
$route['student/open_assessment']		= "student/SH_Controller/open_assessment_resource";
$route['student/open_test_page']		= "student/SH_Controller/open_test_page";
$route['student/start_test_page']		= "student/SH_Controller/start_test_page";
$route['student/last_answered_test']	= "student/SH_Controller/last_answered_test";
$route['student/view_test_attempts']    = "student/SH_Controller/view_test_attempts";
$route['student/show_answer_key']       = "student/SH_Controller/show_answer_key";
$route['student/save_student_answers']	= "student/SH_Controller/save_student_answers";
$route['student/open_captiva']			= "student/SH_Controller/open_captiva_resource";
$route['student/free_course_dashboard'] = "student/SH_Controller/free_course_dashboard";
$route['student/join_free_course'] 		= "student/SH_Controller/join_free_course";
$route['student/open_captiva_quiz']		= "student/SH_Controller/open_captiva_quiz_resource";

$route['student/available_aoi_courses'] = "student/SH_Controller/get_all_available_aoi_courses";
$route['student/paid_aoi_courses'] 		= "student/SH_Controller/get_all_paid_aoi_courses";


// Resource Browser ---------------------------------------------------------------

$route['student/course_modules']		= "student/SH_Controller/get_course_module";
$route['student/view_course_syllabus']  = "student/SH_Controller/view_course_syllabus";
$route['student/course_groups']			= "student/SH_Controller/get_course_module_group";
$route['student/course_subjects']		= "student/SH_Controller/get_course_module_group_subject";
$route['student/cmgs_resources']		= "student/SH_Controller/get_course_module_group_subject_resources";

// --------------------------------------------------------------------------------

$route['student/report_dashboard']	 	= "student/SH_Controller/report_dashboard";
$route['student/my_courses']		    = "student/SH_Controller/get_my_courses";
$route['student/my_tests']		    	= "student/SH_Controller/get_my_tests";
$route['student/my_rank']				= "student/SH_Controller/get_my_rank";
$route['student/subject_for_chart']		= "student/SH_Controller/subject_for_chart";
$route['student/load_subject_score_graph'] = "student/SH_Controller/load_subject_score_graph";
$route['student/my_courses_list']		= "student/SH_Controller/get_my_courses_list";

// Embeding Video - youtube and vimeo
$route['embed']							= "student/SH_Controller/embed";
//-------------------------------------------------------------------------------------------


// Parent Management -----------------------------------------------------------------------

$route['parent/dashboard']			       	  = "parent/PH_Controller/dashboard";
//$route['parent/parent_child_details']      	  = "parent/PH_Controller/parent_child_details";
// $route['parent/parent_child_details_list'] 	  = "parent/PH_Controller/parent_child_details_list";
$route['parent/child_of_parents'] 		   	  = "parent/PH_Controller/child_of_parents";
// $route['parent/course_of_test']			   	  = "parent/PH_Controller/course_of_test";
$route['parent/get_students_test']		   	  = "parent/PH_Controller/get_students_test";
$route['parent/student_assessment_rank']   	  = "parent/PH_Controller/student_assessment_rank";
// $route['parent/load_child_subscribed_course'] = "parent/PH_Controller/load_child_subscribed_course";
$route['parent/get_subject_of_course']		  = "parent/PH_Controller/get_subject_of_course";
$route['parent/plot_child_graph']		  	  = "parent/PH_Controller/plot_child_graph";

//-------------------------------------------------------------------------------------------



// Admin Management -------------------------------------------------------------------------

	// Content Director Management *********************************************************
	$route['admin/directors_page'] 			   = "admin/AH_Controller/content_director_page";
	$route['admin/directors_list']			   = "admin/AH_Controller/directors_list";
	$route['admin/add_director_modal']		   = "admin/AH_Controller/add_director_modal";
	$route['admin/edit_director_modal']		   = "admin/AH_Controller/edit_director_modal";
	$route['admin/create_director']			   = "admin/AH_Controller/create_director";
	// $route['admin/accountant_page'] = "admin/AH_Controller/accountant_page";
	// $route['admin/accountant_page'] = "admin/AH_Controller/registrar_page";
	//**************************************************************************************

	// Subject Management ******************************************************************
	$route['resource/subject_view']			= "admin/AH_Controller/subject_view";
	$route['resource/add_subject_modal']	= "admin/AH_Controller/add_subject_modal";
	$route['resource/add_subject']			= "admin/AH_Controller/add_subject";
	$route['resource/edit_sub_modal']    	= "admin/AH_Controller/edit_sub_modal";
	$route['resource/update_subject']    	= "admin/AH_Controller/update_subject";
	$route['resource/delete_subject']		= "admin/AH_Controller/delete_subject";
	//**************************************************************************************

	// Course Management *******************************************************************
	$route['resource/course_view']			= "admin/AH_Controller/course_view";
	$route['resource/add_course_modal'] 	= "admin/AH_Controller/add_course_modal";
	$route['resource/add_course']			= "admin/AH_Controller/add_course";
	$route['resource/edit_course_modal']	= "admin/AH_Controller/edit_course_modal";
	$route['resource/update_course']    	= "admin/AH_Controller/update_course";
	$route['resource/delete_course']		= "admin/AH_Controller/delete_course";
	$route['resource/add_course_with_file']	= "admin/AH_Controller/add_course_with_syllabus";
	$route['resource/update_course_with_file'] = "admin/AH_Controller/update_course_with_syllabus";
	//**************************************************************************************

	// Content Mamagement ******************************************************************
	$route['admin/manage_syllabus']			= "admin/AH_Controller/manage_syllabus";
	//**************************************************************************************

	// Batch Management ********************************************************************
	$route['batch/batch_view'] 		 = "admin/AH_Controller/batch_view";
	$route['batch/batch_list']		 = "admin/AH_Controller/batch_list";
	$route['batch/load_batch_modal'] = "admin/AH_Controller/load_batch_modal";
	$route['batch/add_batch']		 = "admin/AH_Controller/add_batch";
	$route['batch/edit_batch_modal'] = "admin/AH_Controller/edit_batch_modal";
	$route['batch/update_batch']	 = "admin/AH_Controller/update_batch";
	$route['batch/delete_batch']	 = "admin/AH_Controller/delete_batch";

	// Coupon Code Management **************************************************************
	$route['coupon/coupon_code_dashboard'] 	    = "admin/Coupon_Controller/coupon_code_dashboard";
	$route['coupon/generate_coupon'] 		    = "admin/Coupon_Controller/generate_coupon_code";
	$route['coupon/coupon_code_view'] 		    = "admin/Coupon_Controller/coupon_code_view";

	//  associate student Link Unlink ******************************************************************
	$route['admin/link_unlink']				    = "admin/AH_Controller/link_unlink";
	$route['admin/link_student']			    = "admin/AH_Controller/link_student";
	$route['admin/unlink_student']		        = "admin/AH_Controller/unlink_student";
	$route['admin/load_student_name']   	    = "admin/AH_Controller/load_student_name";
	$route['admin/load_associate_name'] 	    = "admin/AH_Controller/load_associate_name";
	$route['admin/load_linked_student_details'] = "admin/AH_Controller/load_linked_student_details";
	$route['admin/link_student_associate']	    = "admin/AH_Controller/link_student_associate";
	$route['admin/unlink_student_associate']    = "admin/AH_Controller/unlink_student_associate";
	$route['admin/isThereNoStudentLink']	    = "admin/AH_Controller/isThereNoStudentLink";
	$route['admin/isThereStudentLink']	        = "admin/AH_Controller/isThereStudentLink";
	$route['admin/isThereAssociateExists']	    = "admin/AH_Controller/isThereAssociateExists";
	$route['admin/grant_user_license']	    	= "admin/AH_Controller/grant_user_license";	
	$route['admin/update_license_request']	    = "admin/AH_Controller/update_license_request";	

	// SMS LOG ***************************************************************************************
	$route['admin/smslog_dashboard'] = "admin/AH_Controller/smslog_dashboard"; 		
	$route['admin/smslog_list'] 	 = "admin/AH_Controller/smslog_list"; 		
	$route['admin/delete_smslog'] 	 = "admin/AH_Controller/delete_smslog"; 		


// -----------------------------------------------------------------------------------------


// Content Admin ----------------------------------------------------------------------------
// Content Admin Dashboard
$route['contentadmin/director_dashboard'] = "content_director/ContentDirector_Controller/dashboard";
// Mentor / SME DashBoard
$route['contentadmin/mentor_dashboard']	  = "contents/ContentAdmin_Controller/dashboard";

// Content Management Page
$route['resouce/content_management'] = "contents/ContentAdmin_Controller/open_content_management";

// Course Resource Maping *********
$route['resource/cres_mapview'] 	 		= "contents/ContentAdmin_Controller/course_resource_mapview";
$route['resource/cres_maplist']		 		= "contents/ContentAdmin_Controller/course_resource_maplist";
$route['resource/load_cres_map_modal'] 		= "contents/ContentAdmin_Controller/load_cres_map_modal";
$route['resource/edit_cres_map_modal'] 		= "contents/ContentAdmin_Controller/edit_cres_map_modal";
$route['resource/add_course_resource']		= "contents/ContentAdmin_Controller/add_course_resource";
$route['resource/update_course_resource']	= "contents/ContentAdmin_Controller/update_course_resource";
// Course Assessment Maping *******
$route['resource/ctest_mapview'] 	 	= "contents/ContentAdmin_Controller/course_assessment_mapview";
$route['resource/ctest_maplist']		= "contents/ContentAdmin_Controller/course_test_maplist";
$route['resource/load_ctest_map_modal'] = "contents/ContentAdmin_Controller/load_ctest_map_modal";
$route['resource/edit_ctest_map_modal'] = "contents/ContentAdmin_Controller/edit_ctest_map_modal";
$route['resource/add_course_test']		= "contents/ContentAdmin_Controller/add_course_test";
$route['resource/update_course_test']	= "contents/ContentAdmin_Controller/update_course_test";

// Validation for names 
$route['isPresent/resource'] 		= "contents/ContentAdmin_Controller/isResourceNamePresent";
$route['isPresent/assessment'] 		= "contents/ContentAdmin_Controller/isAssessmentNoPresent";
$route['isPresent/subject'] 		= "contents/ContentAdmin_Controller/isSubjectNamePresent";
$route['isPresent/course'] 			= "contents/ContentAdmin_Controller/isCourseNamePresent";
$route['isPresent/batch'] 			= "admin/AH_Controller/isBatchNamePresent";

// Resource Adding ******
$route['resource/resource_view']		= "contents/ContentAdmin_Controller/resource_view";
$route['resource/resource_view1']		= "contents/ContentAdmin_Controller/resource_view1";
$route['resource/ajax_pdf']				= "contents/ContentAdmin_Controller/ajax_add_pdf";
$route['resource/upload_file']			= "contents/ContentAdmin_Controller/ajax_upload_file";
$route['resource/add_video_modal']  	= "contents/ContentAdmin_Controller/add_video_modal";
$route['resource/add_video']			= "contents/ContentAdmin_Controller/add_video_resource";
$route['resource/ajax_captiva']			= "contents/ContentAdmin_Controller/ajax_add_captiva";
$route['resource/ajax_captiva_upload'] 	= "contents/ContentAdmin_Controller/ajax_captiva_upload";
$route['resource/ajax_captiva_quiz']	= "contents/ContentAdmin_Controller/ajax_add_captiva_quiz";
//Resource Editing ******
$route['resource/edit_res_modal']   ="contents/ContentAdmin_Controller/edit_res_modal";
$route['resource/update_resource']  ="contents/ContentAdmin_Controller/update_resource";

// Resource Deleting ****
$route['resource/delete_resource']	= "contents/ContentAdmin_Controller/delete_resource";

// Assessment Management
$route['resource/assessment_list']		 = "contents/ContentAdmin_Controller/assessment_list";
$route['resource/assessment_list1']		 = "contents/ContentAdmin_Controller/assessment_list1";
$route['resource/add_assessment_modal']  = "contents/ContentAdmin_Controller/add_assessment_modal";
$route['resource/assessment_file_upload']= "contents/ContentAdmin_Controller/assessment_file_upload";
$route['resource/edit_assessment_modal'] = "contents/ContentAdmin_Controller/edit_assessment_modal";
$route['resource/update_assessment'] 	 = "contents/ContentAdmin_Controller/update_assessment";
$route['resource/ans_key_modal']  		 = "contents/ContentAdmin_Controller/ans_key_modal";
$route['resource/save_answer']  		 = "contents/ContentAdmin_Controller/save_answer";
$route['resource/delete_assessment']	 = "contents/ContentAdmin_Controller/delete_assessment";

// // Subject Management
// $route['resource/subject_view']		= "contents/ContentAdmin_Controller/subject_view";
// $route['resource/add_subject_modal'] = "contents/ContentAdmin_Controller/add_subject_modal";
// $route['resource/add_subject']		= "contents/ContentAdmin_Controller/add_subject";
// $route['resource/edit_sub_modal']    ="contents/ContentAdmin_Controller/edit_sub_modal";
// $route['resource/update_subject']    ="contents/ContentAdmin_Controller/update_subject";
// $route['resource/delete_subject']	= "contents/ContentAdmin_Controller/delete_subject";

// // Course Management
// $route['resource/course_view']		= "contents/ContentAdmin_Controller/course_view";
// $route['resource/add_course_modal'] = "contents/ContentAdmin_Controller/add_course_modal";
// $route['resource/add_course']		= "contents/ContentAdmin_Controller/add_course";
// $route['resource/edit_course_modal']="contents/ContentAdmin_Controller/edit_course_modal";
// $route['resource/update_course']    ="contents/ContentAdmin_Controller/update_course";
// $route['resource/delete_course']	= "contents/ContentAdmin_Controller/delete_course";

// Dashboard Events
$route['resource/course_dashboard']	 = "contents/ContentAdmin_Controller/course_management";

// Course Syllabus Management
$route['resource/course_syllabus_view']	= "contents/ContentAdmin_Controller/course_syllabus_view";
$route['resource/syllabus_list']		= "contents/ContentAdmin_Controller/syllabus_list";
$route['resource/load_csr_modal'] 		= "contents/ContentAdmin_Controller/load_csr_modal";
$route['resource/load_csa_modal'] 		= "contents/ContentAdmin_Controller/load_csa_modal";
$route['resource/add_syllabus']			= "contents/ContentAdmin_Controller/add_syllabus";
$route['resource/delete_syllabus']		= "contents/ContentAdmin_Controller/delete_syllabus";
$route['resource/view_pdf_modal']       = "contents/ContentAdmin_Controller/view_resource_modal";
//$route['resource/view_video_modal']	= "contents/ContentAdmin_Controller/view_resource_modal";
$route['embed_video']				    = "contents/ContentAdmin_Controller/embed_video";
$route['resource/view_assessment_pdf']  = "contents/ContentAdmin_Controller/view_assessment_pdf";


// ---------------------------------------------------------------------------------------------


// Registrar Management ------------------------------------------------------------------------

// COMMON FUNCTION
$route['registrar/dashboard']				 = "registrar/Registrar_Controller/dashboard";
$route['registrar/activate_user']		 	 = "registrar/Registrar_Controller/activate_user";
$route['registrar/de_activate_user']	 	 = "registrar/Registrar_Controller/de_activate_user";
$route['registrar/delete_unverified_user']     = "registrar/Registrar_Controller/delete_unverified_user";
$route['registrar/delete_notverified_user']	 = "registrar/Registrar_Controller/delete_notverified_user";

// ASSOCIATE MANAGMENT
$route['registrar/associates_dashboard'] 	 = "registrar/Registrar_Controller/associates_dashboard";
$route['registrar/associates_list']		 	 = "registrar/Registrar_Controller/associates_list";
$route['registrar/associates_document_list'] = "registrar/Registrar_Controller/associates_document_list";
$route['registrar/associates_subject_list']  = "registrar/Registrar_Controller/associates_subject_list";
$route['registrar/add_associate']		 	 = "registrar/Registrar_Controller/add_associate_modal";
$route['registrar/view_associate_doc']   	 = "registrar/Registrar_Controller/view_associate_doc";

// PARENTS MANAGMENT	
$route['registrar/parents_dashboard'] 	 = "registrar/Registrar_Controller/parents_dashboard";
$route['registrar/parents_list']		 = "registrar/Registrar_Controller/parents_list";

// Affiliate Role Management - Adding Affiliate users
$route['registrar/affilates_dashboard'] 	 = "registrar/Registrar_Controller/affilates_dashboard";
$route['registrar/affilates_list']		 	 = "registrar/Registrar_Controller/affilates_list";
$route['registrar/add_affilate']		 	 = "registrar/Registrar_Controller/add_affilate_modal";
$route['registrar/load_affilate_users_list'] = "registrar/Registrar_Controller/load_affilate_users_list";



// STUDENTS MANAGMENT
$route['registrar/students_dashboard']	  = "registrar/Registrar_Controller/students_dashboard";
$route['registrar/open_linked_sme']		  = "registrar/Registrar_Controller/open_linked_sme";

$route['registrar/students_list']		  = "registrar/Registrar_Controller/students_list";
$route['registrar/add_student']			  = "registrar/Registrar_Controller/add_student_modal";
$route['registrar/student_course_link']	  = "registrar/Registrar_Controller/student_course_link";
// Link 
$route['registrar/mentor_course_link']	  = "registrar/Registrar_Controller/mentor_course_link";
$route['registrar/link_course_modal']     = "registrar/Registrar_Controller/link_course_modal";

// for Link Course modal
$route['registrar/link_course_sme_modal'] = "registrar/Registrar_Controller/link_course_sme_modal";
$route['registrar/student_record_search'] = "registrar/Registrar_Controller/student_record_search";

// sriram : mentor course 
$route['registrar/mentor_record_search']  = "registrar/Registrar_Controller/mentor_record_search";
$route['registrar/isThisStudentExists']   = "registrar/Registrar_Controller/isThisStudentExists";

$route['registrar/isThisMentorExists']    = "registrar/Registrar_Controller/isThisMentorExists";
$route['registrar/link_student_course']   = "registrar/Registrar_Controller/link_student_with_course";
// link mentor with course
$route['registrar/link_mentor_course']    = "registrar/Registrar_Controller/link_mentor_with_course";
$route['registrar/unlink_user_course']    = "registrar/Registrar_Controller/unlink_user_course";

// unlink mentor with course 
$route['registrar/unlink_mentor_course']  = "registrar/Registrar_Controller/unlink_mentor_course";
$route['registrar/edit_student_modal']    = "registrar/Registrar_Controller/edit_student_modal";
$route['registrar/edit_student']   		  = "registrar/Registrar_Controller/edit_student";
$route['registrar/edit_associate_modal']  = "registrar/Registrar_Controller/edit_associate_modal";
$route['registrar/edit_associate']   	  = "registrar/Registrar_Controller/edit_associate";

// Scholarship
$route['registrar/scholarship_dashboard']		= "registrar/Registrar_Controller/scholarship_dashboard";
$route['registrar/all_scholarships']			= "registrar/Registrar_Controller/all_scholarships";
$route['registrar/not_verified_scholarships']	= "registrar/Registrar_Controller/not_verified_scholarships";
$route['registrar/give_scholarship']			= "registrar/Registrar_Controller/give_scholarship";
$route['registrar/reject_scholarship']			= "registrar/Registrar_Controller/reject_scholarship";

// Orginization SPOC Quotes Management
$route['registrar/spoc_quote_dashboard']		= "registrar/Registrar_Controller/spoc_quote_dashboard";
$route['registrar/all_spoc_quote']				= "registrar/Registrar_Controller/all_spoc_quotes";
$route['registrar/not_verified_spoc_quote']	    = "registrar/Registrar_Controller/not_verified_spoc_quotes";
$route['registrar/give_spoc_quote']			    = "registrar/Registrar_Controller/give_spoc_quote";
$route['registrar/reject_spoc_quote']			= "registrar/Registrar_Controller/reject_spoc_quote";
$route['registrar/delete_spoc_quote']			= "registrar/Registrar_Controller/delete_spoc_quote";

// Any User Enrollment 
$route['register/any_user_enrollment']   	  	= "registrar/Registrar_Controller/register_any_user";

// ALL REPORTS MANAGMENT
$route['reports/associates_reports'] 		     = "reports/Report_Controller/associates_reports";
$route['reports/students_reports'] 		    	 = "reports/Report_Controller/students_reports";
$route['reports/unverified_associates_list']     = "reports/Report_Controller/unverified_associates_list";
$route['reports/unverified_students_list']       = "reports/Report_Controller/unverified_students_list";
$route['reports/report_dash'] 			 	     = "reports/Report_Controller/report_dash";
$route['reports/report_payment_dashboard'] 	 	 = "reports/Report_Controller/report_payment_dashboard";


$route['reports/student_dashboard'] 			 = "reports/Report_Controller/student_dashboard";
$route['reports/paid_students'] 				 = "reports/Report_Controller/paid_students";
$route['reports/unpaid_students'] 				 = "reports/Report_Controller/unpaid_students";
$route['reports/payment_not_verified_students']  = "reports/Report_Controller/payment_not_verified_students";
$route['reports/associate_dashboard'] 			 = "reports/Report_Controller/associate_dashboard";
$route['reports/paid_associates']	 			 = "reports/Report_Controller/paid_associates";
$route['reports/unpaid_associates'] 			 = "reports/Report_Controller/unpaid_associates";
$route['reports/payment_not_verified_associates']= "reports/Report_Controller/payment_not_verified_associates";

$route['reports/get_all_course_tests']			 = "reports/Report_Controller/get_all_course_tests";
$route['reports/batch_student_dashboard'] 		 = "reports/Report_Controller/batch_student_dashboard";
$route['reports/batchwise_students'] 			 = "reports/Report_Controller/batchwise_students";
$route['reports/batchwise_associates'] 			 = "reports/Report_Controller/batchwise_associates";

$route['reports/assessment_results']			 = "reports/Report_Controller/assessment_results";
$route['reports/get_assessment_ranks']			 = "reports/Report_Controller/get_assessment_ranks";
$route['reports/batchwise_assessment_results']	 = "reports/Report_Controller/batchwise_assessment_results";
$route['reports/batchwise_assessment_ranks']	 = "reports/Report_Controller/get_batchwise_assessment_ranks";
//  New Assessment Reports 
$route['reports/new_assessment_results']		 = "reports/Report_Controller/new_assessment_results";
$route['reports/all_student_test_reports']		 = "reports/Report_Controller/all_student_test_reports";
$route['reports/get_new_student_rank_list']		 = "reports/Report_Controller/get_new_student_rank_list";

// ---------------------------------------------------------------------------------------------
$route['forgot_pwd']            ="student/forgot_pwd";

// Payment Management -------------------------------------------------------------------------

$route['payment/offline_payment_transaction'] 	= "payment/PAYMENT_Controller/offline_payment_transaction";
$route['payment/associate_summery']    			= "payment/PAYMENT_Controller/associate_subject_summery";
$route['payment/spoc_request_quote']    		= "payment/PAYMENT_Controller/spoc_interests_request_quote";
$route['payment/offline_payment']	   			= "payment/PAYMENT_Controller/offline_payment"; 
$route['payment/appply_coupon_code']	   		= "payment/PAYMENT_Controller/appply_coupon_code"; 
$route['payment/apply_scholarship']				= "payment/PAYMENT_Controller/apply_scholarship";
$route['payment/remove_aoi']					= "payment/PAYMENT_Controller/remove_aoi";

// ---------------------------------------------------------------------------------------------


// Mentor/SME Content Management ----------------------------------------------------------------------------
// Content Management Page For Mentor / SME
$route['resource/mentor_content_management'] = "contents/ContentAdmin_Controller/open_mentor_content_management";
$route['resource/mentor_resource_view']		 = "contents/ContentAdmin_Controller/mentor_resource_view";
$route['resource/ajax_mentor_pdf_modal']	 = "contents/ContentAdmin_Controller/ajax_mentor_add_pdf";
$route['resource/ajax_mentor_ppt_modal']	 = "contents/ContentAdmin_Controller/ajax_mentor_add_ppt";
$route['resource/ajax_mentor_video_modal']	 = "contents/ContentAdmin_Controller/ajax_mentor_add_video";
$route['resource/ajax_mentor_audio_modal']	 = "contents/ContentAdmin_Controller/ajax_mentor_add_audio";
$route['resource/upload_mentor_files']		 = "contents/ContentAdmin_Controller/ajax_mentor_upload_file";
$route['resource/ajax_mentor_pdf_upload']	 = "contents/ContentAdmin_Controller/ajax_mentor_pdf_upload";
$route['resource/ajax_mentor_ppt_upload']	 = "contents/ContentAdmin_Controller/ajax_mentor_ppt_upload";
$route['resource/ajax_mentor_audio_upload']	 = "contents/ContentAdmin_Controller/ajax_mentor_audio_upload";
$route['resource/ajax_mentor_video_upload']	 = "contents/ContentAdmin_Controller/ajax_mentor_video_upload";

$route['resource/all_mentor_resource_list']    = "contents/ContentAdmin_Controller/all_mentor_resource_list";
$route['resource/all_mentor_assessment_list']  = "contents/ContentAdmin_Controller/all_mentor_assessment_list";
// sriram : Created starts here...
$route['resource/all_mentor_resource_list1']   = "contents/ContentAdmin_Controller/all_mentor_resource_list1";
$route['resource/all_mentor_assessment_list1'] = "contents/ContentAdmin_Controller/all_mentor_assessment_list1";
// sriram : Ends here...

// Assessment of Mentors
$route['resource/mentor_assessment_list']	 = "contents/ContentAdmin_Controller/mentor_assessment_list";
$route['resource/ajax_mentor_test_modal']  	 = "contents/ContentAdmin_Controller/ajax_mentor_assessment_modal";
$route['resource/mentor_download_file']		 = "contents/ContentAdmin_Controller/mentor_download_file";

// sriram craeted here
$route['resource/mentor_assessment_download_file']		 = "contents/ContentAdmin_Controller/mentor_assessment_download_file";
// -----------------------------------------------------------------------------------------



// Mentor/SME Content Management ----------------------------------------------------------------------------
$route['affilate/dashboard']				 = "affilate_role/Affilate_Controller/dashboard";
// User Management
$route['affilate/affilate_users_dashboard']	 = "affilate_role/Affilate_Controller/students_dashboard";
$route['affilate/affilate_users_list']		 = "affilate_role/Affilate_Controller/affilate_users_list";
$route['affilate/add_user']			 		 = "affilate_role/Affilate_Controller/add_student_modal";
$route['affilate/edit_user_modal']   		 = "affilate_role/Affilate_Controller/edit_student_modal";
$route['affilate/edit_user']   		 		 = "affilate_role/Affilate_Controller/edit_student";

// -----------------------------------------------------------------------------------------------------------



/* End of file routes.php */
/* Location: ./application/config/routes.php */
