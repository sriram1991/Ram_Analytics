/* --------------------------------------------------------------------------*\
 | SKOL SYSTEM JAVA SCRIPT File by USK                                       |
\* --------------------------------------------------------------------------*/

// doSubmit
function doSubmit(element){
  if($(element).valid()){
    $(element).submit();
    freaze_screen();
  }
}

// Freaze screen
function freaze_screen(){
  $('body').oLoader({
    wholeWindow: true, //makes the loader fit the window size
    lockOverflow: true, //disable scrollbar on body
    backgroundColor: '#000',
    fadeInTime: 1000,
    fadeLevel: 0.4,
    style: "<div style='position:absolute;left:23%;bottom:50%;background:#000;color:#fff;padding:5px;border-radius:4px'><center><img src='/static/js/jquery-oLoader/images/ownageLoader/loader4.gif'/></center><br><span>Almost there! <br> We've sent you an email.<br>In the email there is a link that will complete your account creation. Please check your email and click that link to continue!</span></div>",
    image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif'
  });
}

// Course Management 
function loading_animation(){
  $('body').oLoader({
    wholeWindow: true, //makes the loader fit the window size
    lockOverflow: true, //disable scrollbar on body
    backgroundColor: '#000',
    fadeInTime: 1000,
    fadeLevel: 0.4,
    //style: "<div style='position:absolute;left:23%;bottom:50%;background:#000;color:#fff;padding:5px;border-radius:4px'><center><img src='/static/js/jquery-oLoader/images/ownageLoader/loader4.gif'/></center></div>",
    image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif'
  });
}


// Associate Model LOI 
function getLOI () {
    if ($("#associateRegistrationFrom").valid()) {
        $("#associateModal").modal('show');
        if($("#first_name").val()) { $(".first_name").text($("#first_name").val()); }
        if($("#middle_name").val()) { $(".middle_name").text($("#middle_name").val()); }
        if($("#last_name").val()) { $(".last_name").text($("#last_name").val()); }
        if($("#address").val()) { $(".address").text($("#address").val()); }
        if($("#city").val()) { $(".city").text($("#city").val()); }
        if($("#state").val()) { $(".state").text($("#state").val()); }
        if($("#country").val()) { $(".country").text($("#country").val()); }
        if($("#pincode").val()) { $(".pincode").text($("#pincode").val()); }
        if($("#email").val()) { $(".email").text($("#email").val()); }
        if($("#phone").val()) { $(".mobile").text($("#phone").val()); }
    } else {
        $("#associateModal").modal('hide');
    }
    
}


/*===================================================================================*/
/*| Common Functions - Profile etc                                  Begin            */
/*===================================================================================*/

    // Please Load ajax_profile_update.js in that window 
    // ie <script src='/static/js/common/ajax_profile_update.js/'/> //
    
    // Action : update Proile 
    function update_profile(element){
        $(element).submit();
    }

    // Change Passowrd 
    function change_password() {
        var old_pwd = $("#change_pwd_model").find('#old_password').val();
        var new_pwd = $("#change_pwd_model").find('#new_password').val();
        //var cnf_pwd = $("#addVideoRes").find('#confirm_password').val();
        if($("#ChangePWDForm").valid()) {
            $.ajax({
                type: "POST",
                url: "/profile/change_pwd",
                data: { old_password: old_pwd, new_password: new_pwd },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#change_pwd_model").modal('hide');
                    $('#change_pwd_model').find('.input').val('');
                    window.location.replace('/logout');
                }
            });    
        } else { }
    }

    
    // Action -> Load Model With AJAX Forgot Password Modal
    function load_forgot_modal() {
        $.ajax({
            type: "GET",
            url: "/forgot_password",
            success: function (responce){
                $("#body-forgot_modal").html("");
                $("#body-forgot_modal").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action-> Load Forgot Password Modal
    function forgot_password() {
        var reset_user_email = $("#forgot_pwd_modal").find('#reset_user_email').val();
        if($("#ResetPWDForm").valid()) {
            $("#forgot_pwd_modal").modal('hide');
            $('body').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                url:  "/forgot_password",
                data: { reset_user_email: reset_user_email },
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    console.log("I GOT this responce "+response);
                }
            });
        }
    }

/*===================================================================================*/
/*| Common Functions - Profile etc                                  Ended            */
/*===================================================================================*/

/*===============================================================================================*/
/*| Admin Releated Functionalities                                   Begin                      |*/
/*===============================================================================================*/


/*-----------------------------------------------------------------------------------------------*/
/* Admin Management and Roles                                                                    */
/*-----------------------------------------------------------------------------------------------*/
    // Action -> Get All Associates
    function get_all_directors(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/admin/directors_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#directors_list_view").html("");
                $("#directors_list_view").html(response);
                var directors_list = $('#directors_list').dataTable();
                // var table = $("#associate_list").dataTable();
            }
        });
    }

    // Action -> Get All Mentors Resource List View
    function get_all_mentor_resource_list(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            // url:  "/resource/all_mentor_resource_list",
            url:  "/resource/all_mentor_resource_list1",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#mentor_resource_list_view").html("");
                $("#mentor_resource_list_view").html(response);
                var directors_list = $('#mentor_resources_list').dataTable();
                // var table = $("#associate_list").dataTable();
            }
        });
    }

    //Action -> Load Edit profile Modal with Ajax
    function edit_profile_modal() {
        $.ajax({
            type: "POST",
            url: "/profile/edit_profile_modal",
            success: function (responce){
                $("#EditProfileModal").modal('show');
                $("#body-edit_profile").html("");
                $("#body-edit_profile").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    //Action: Send profile update mail to admin
    function send_profile_update_mail(){
        var email_subject   = $("#EditProfileModal").find('#email_subject').val();
        var message_body    = $("#EditProfileModal").find('#message_body').val();
       // var user_id         = $("#EditProfileModal").find('#edit_user_id').val();
        if($("#editprofileform").valid()) {
            $.ajax({
                type: "POST",
                url:  "/profile/send_profile_update_mail",
                data:  { 
                   // user_id : user_id ,
                    email_subject: email_subject,
                    message_body: message_body
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#EditProfileModal").modal('hide');
                }
            });    
        }
    }

    // Action -> Load Model With AJAX Add Student Modal
    function add_director_modal() {
        $.ajax({
            type: "POST",
            url: "/admin/add_director_modal",
            success: function (responce){
                $("#add_director_modal").modal('show');
                $("#body-add_director").html("");
                $("#body-add_director").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    //Action -> Load Edit Director Modal with Ajax
    function edit_director_modal(user_id) {
        $.ajax({
            type: "POST",
            url: "/admin/edit_director_modal",
            data: {user_id: user_id},
            success: function (responce){
                $("#edit_director_modal").modal('show');
                $("#body-edit_director").html("");
                $("#body-edit_director").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    //Action -> Load Edit student Modal with Ajax
    function edit_student_modal(user_id) {
        $.ajax({
            type: "POST",
            url: "/registrar/edit_student_modal",
            data: {user_id: user_id},
            success: function (responce){
                $("#EditStudentModal").modal('show');
                $("#body-edit_student").html("");
                $("#body-edit_student").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    //Action -> Load Affilate Users Joinee
    function open_affilates_joinee_modal(affilate_id) {
        $.ajax({
            type: "POST",
            url: "/registrar/load_affilate_users_list",
            data: {affilate_id: affilate_id},
            success: function (responce){
                $("#affilates_joinee_modal").modal('show');
                $("#body-affilates_joinee_modal").html("");
                $("#body-affilates_joinee_modal").html(responce);
                var affilate_users_list = $('#affilate_users_list').dataTable();
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Edit student registration
    function edit_student() {
        var user_fname      = $("#EditStudentModal").find('#edit_user_fname').val();
        var user_mname      = $("#EditStudentModal").find('#edit_user_mname').val();
        var user_lname      = $("#EditStudentModal").find('#edit_user_lname').val();
        var user_phone      = $("#EditStudentModal").find('#edit_user_phone').val();
        var user_address    = $("#EditStudentModal").find('#edit_address').val();
        var user_city       = $("#EditStudentModal").find('#edit_city').val();
        var user_country    = $("#EditStudentModal").find('#edit_country').val();
        var user_state      = $("#EditStudentModal").find('#edit_state').val();
        var pincode         = $("#EditStudentModal").find('#pincode').val();
        var user_id         = $("#EditStudentModal").find('#edit_user_id').val();
        
        if($("#EditRegistrationForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/registrar/edit_student",
                data:  { 
                    user_fname  : user_fname,
                    user_mname  : user_mname,
                    user_lname  : user_lname,
                    user_phone  : user_phone,
                    user_address: user_address,
                    user_city   : user_city,
                    user_country: user_country,
                    user_state  : user_state,
                    pincode     : pincode,
                    user_id     : user_id
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#EditStudentModal").modal('hide');
                    get_all_students();
                }
            });    
        }
    }

    //Action -> Load Edit Associate Modal with Ajax
    function edit_associate_modal(user_id) {
        $.ajax({
            type: "POST",
            url: "/registrar/edit_associate_modal",
            data: {user_id: user_id},
            success: function (responce){
                $("#EditAssociateModal").modal('show');
                $("#body-edit_associate").html("");
                $("#body-edit_associate").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Edit student registration
    function edit_associate() {
        var user_fname      = $("#EditAssociateModal").find('#edit_user_fname').val();
        var user_mname      = $("#EditAssociateModal").find('#edit_user_mname').val();
        var user_lname      = $("#EditAssociateModal").find('#edit_user_lname').val();
        var user_phone      = $("#EditAssociateModal").find('#edit_user_phone').val();
        var user_address    = $("#EditAssociateModal").find('#edit_address').val();
        var user_city       = $("#EditAssociateModal").find('#edit_city').val();
        var user_state      = $("#EditAssociateModal").find('#edit_state').val();
        var user_country    = $("#EditAssociateModal").find('#edit_country').val();
        var pincode         = $("#EditAssociateModal").find('#pincode').val();
        var user_id         = $("#EditAssociateModal").find('#edit_user_id').val();
        
        if($("#EditRegistrationForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/registrar/edit_associate",
                data:  { 
                    user_fname  : user_fname,
                    user_mname  : user_mname,
                    user_lname  : user_lname,
                    user_phone  : user_phone,
                    user_address: user_address,
                    user_city   : user_city,
                    user_state  : user_state,
                    user_country: user_country,
                    pincode     : pincode,
                    user_id     : user_id
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#EditAssociateModal").modal('hide');
                    get_all_associates();
                }
            });    
        }
    }


    // Action -> Manage Resource Syllabus publish / un publish
    function manage_resource_syllabus(map_id,course_id,resource_status) {
        $.ajax({
            type: "POST",
            url: "/admin/manage_syllabus",
            data: { map_id:map_id, resource_status: resource_status },
            success: function(responce) {
                console.log('Manage Syllabus RES '+responce);
                get_course_resource_map_list(course_id);
            }
        });
    }

    // Action -> Manage Assessment Syllabus publish / un publish
    function manage_assessment_syllabus(map_id,course_id,resource_status) {
        $.ajax({
            type: "POST",
            url: "/admin/manage_syllabus",
            data: { map_id:map_id, resource_status: resource_status },
            success: function(responce) {
                console.log('Manage Syllabus TEST '+responce);
                get_course_test_map_list(course_id);
            }
        });
    }

/*-----------------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------------------*/
/* Registrar Admin Management                                                                    */
/*-----------------------------------------------------------------------------------------------*/
    
    // Action -> open Registrar Dashboard
    function open_registrar() {
        $.ajax({
            type:"GET",                                               
            url:"/registrar/dashboard/",
            success:function(response) {
                        $('#right-side-content').html("");                     
                        $('#right-side-content').html(response);
                    }           
                });
        //$('#right-side-content').html("<h1> Registrar Management Dashboard Work in progress.. </h1>");
    }

    // Action -> Register user 
    function register_user(element) {
        if($(element).valid()){
            $(element).submit();
            $('#add_user_btn').button('loading');
        }
    }

     // Action -> Save changes 
    function save_changes(element) {
        if($(element).valid()){
            $(element).submit();
            $('#edit_user_btn').button('loading');
        }
    }

    // Common Function -> Activate User
    function activate_user(user_id,user_role) {
        if (confirm('Are you sure you want to activate this user?')){ 
            $.ajax({
                type: "POST",
                url: "/registrar/activate_user",
                data: { user_id: user_id },
                success: function(responce) {
                    // call model and close
                    console.log("User With ID:"+user_id+" User Role "+user_role+" Activated Successfully");
                    switch (user_role) {
                        case 1:
                            console.log('students USER');
                            get_all_students();
                            break;
                        case 2:
                            console.log('parents USER');
                            get_all_parents();
                            break;
                        case 3:
                            console.log('Associates USER');
                            get_all_associates();
                            break;
                        case 4:
                            console.log('Registrar Admin USER');
                            break;
                        case 5:
                            console.log('Accountant Admin User');
                            break;
                        case 6:
                            console.log('Content Director USER');
                            get_all_directors();
                            console.log('PPPPPPPPPPPPPP');
                            break;
                        case 7:
                            console.log('Admin USER');
                            break;
                        case 8:
                            console.log('Content Admin');
                            break;
                        case 9:
                            console.log('Affilate User');
                            get_all_affilates();
                            break;
                        default:
                            console.log('UnKnown USER');
                            break;
                    }
                }
            });
        }
    }

    // Common Function : De-Activate User
    function de_activate_user(user_id,user_role) {
        if (confirm('Are you sure you want to de-activate this user?')){ 
            $.ajax({
                type: "POST",
                url: "/registrar/de_activate_user",
                data: { user_id: user_id },
                success: function(responce) {
                    // call model and close
                    console.log("User With ID:"+user_id+" User Role "+user_role+" De-Activated Successfully");
                    switch (user_role) {
                        case 1:
                            console.log('students USER');
                            get_all_students();
                            break;
                        case 2:
                            console.log('parents USER');
                            get_all_parents();
                            break;
                        case 3:
                            console.log('SPOC USER');
                            get_all_associates();
                            break;
                        case 4:
                            console.log('Registrar Admin USER');
                            break;
                        case 5:
                            console.log('Accountant Admin User');
                            break;
                        case 6:
                            console.log('Mentor/SME USER');
                            get_all_directors();
                            break;
                        case 7:
                            console.log('Admin USER');
                            break;
                        case 8:
                            console.log('Content Admin');
                            break;
                        case 9:
                            console.log('Affilate User');
                            get_all_affilates();
                            break;
                        default:
                            console.log('UnKnown USER');
                            break;
                    }
                }
            });
        }
    }

    // Common Function : De-Activate User
    function delete_unverified_user(user_id,user_role) {
        if (confirm('Are you sure you want to delete this user?')){ 
            $.ajax({
                type: "POST",
                url: "/registrar/delete_notverified_user",
                data: { user_id: user_id },
                success: function(responce) {
                    // call model and close
                    switch (user_role) {
                        case 1:
                            console.log('students USER');
                            get_all_students();
                            break;
                        case 2:
                            console.log('parents USER');
                            get_all_parents();
                            break;
                        case 3:
                            console.log('Associates USER');
                            get_all_associates();
                            break;
                        case 4:
                            console.log('Registrar Admin USER');
                            break;
                        case 5:
                            console.log('Accountant Admin User');
                            break;
                        case 6:
                            console.log('Mentor/SME USER');
                            get_all_directors();
                            console.log("Oh Flow comming up to switch");
                            break;
                        case 7:
                            console.log('Super Admin USER');
                            break;
                        case 8:
                            console.log('Content Admin USER');
                            break;
                        case 9:
                            console.log('Affilate USER');
                            get_all_affilates();
                            break;
                        default:
                            console.log('UnKnown USER');
                            break;
                    }
                }
            });
        }
    }

    // Action -> Get All Associates
    function get_all_associates(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/associates_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#associates").html("");
                $("#associates").html(response);
                var table = $("#associate_list").dataTable();
            }
        });
    }

    // Action -> get unverified associates list    
    function get_unverified_associates(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/unverified_associates_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#associates").html("");
                $("#associates").html(response);
                var table = $("#associate_list").dataTable();
            }
        });
    }

    //Action -> get all unverified students list
    function get_unverified_students(){
        $('.tab-content').oLoader({
            wholeWindow:true,
            lockOverflow:true,
            backgroundColor:'#000',
            fadeLevel:0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/unverified_students_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#students").html("");
                $("#students").html(response);
                var table = $("#student_list").dataTable();
            }
        });
    } 

    // Action -> Load Model With AJAX Add Student Modal
    function add_associate_modal() {
        $.ajax({
            type: "POST",
            url: "/registrar/add_associate",
            success: function (responce){
                $("#add_associate_modal").modal('show');
                $("#body-add_associat").html("");
                $("#body-add_associat").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Get All Parents
    function get_all_parents(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/parents_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#parents").html("");
                $("#parents").html(response);
                var table = $("#parents_list").dataTable();
            }
        });
    }

    // Action -> On select course show possible test in parent login
    function get_test_of_course(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/associate/course_of_test",
            // url:  "/parent/course_of_test",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#course_names").html("");
                $("#course_names").html(response);
                // var table = $("#parents").dataTable();
            }
        });
    }

     // Action -> On select course show possible test in parent login
     // get_score_student_graph() changed to get_score_user_graph()
    function get_score_user_graph(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/associate/load_user_subscribed_course",
            // url:  "/parent/load_child_subscribed_course",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#student_score_rhaph").html("");
                $("#student_score_rhaph").html(response);
                // var table = $("#parents").dataTable();
            }
        });
    }

    // Action : on select subject ploting the graph
    function get_subject_of_course(subject_name){
        var course_id = $('#course_id').val();
        $.ajax({
                type:"POST",
                url:"/parent/get_subject_of_course",
                data:{
                    subject_name:subject_name,
                    course_id : course_id
                },
                success:function(response){
                    $("#load_subjects").html("");
                    $("#load_subjects").html(response);
                }
        });

    }

    // Action : plot child graph
    function plot_child_graph(subject_name){
        var course_id = $('#course_id').val();
        $.ajax({
                type:"POST",
                url:"/parent/plot_child_graph",
                data:{
                    subject_name:subject_name,
                    course_id : course_id
                },
                success:function(response){
                    $("#child_graph_result").html("");
                    $("#child_graph_result").html(response);
                }
        });
    }

    // Action -> Get All Parent's Children
    function get_all_parents_children(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/parents_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#parents").html("");
                $("#parents").html(response);
                var table = $("#parents_list").dataTable();
            }
        });
    }

    // Action -> Get All Students
    function get_all_students(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/students_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#students").html("");
                $("#students").html(response);
                var table = $("#students_list").dataTable();
            }
        });
    }

    // Action -> Load Model With AJAX Add Student Modal
    function add_student_modal() {
        $.ajax({
            type: "POST",
            url: "/registrar/add_student",
            success: function (responce){
                $("#body-add_student").html("");
                $("#body-add_student").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }


    // Action -> Get All Course link with student
    function get_course_link(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/student_course_link",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#stu_cou_link").html("");
                $("#stu_cou_link").html(response);
                var table = $("#student_course_link").dataTable();
            }
        });
    }

    // Action -> Load With AJAX Add Course with student Modal
    function link_course_modal() {
        $.ajax({
            type: "POST",
            url: "/registrar/link_course_modal",

            success: function (responce){
                $("#body-course_link").html("");
                $("#body-course_link").html(responce);              
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Load With AJAX Link Course with SME Modal
    function link_course_sme_modal() {
        $.ajax({
            type: "POST",
            url: "/registrar/link_course_sme_modal",

            success: function (responce){
                $("#body-sme-course_link").html("");
                $("#body-sme-course_link").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // student course link--emailid search
    function student_record_search(){
        if($("#LinkCourseForm").valid()){
            var search_user_email = $("#CourseLinkModal").find('#search_user_email').val();
            $.ajax({
                type: "POST",
                url: "/registrar/student_record_search",
                data: { search_user_email: search_user_email},
                success:function(response){
                    $('#stu_cou_link_list').html("");
                    $('#stu_cou_link_list').html(response);
                    //console.log("Student record search" +response);
                }
            });
        }
    }

    // sriram : mentor course link--emailid search
    function mentor_record_search(){
        if($("#LinkCourseSmeForm").valid()){
            var search_user_email = $("#CourseLinkModal").find('#search_user_email').val();
            $.ajax({
                type: "POST",
                url: "/registrar/mentor_record_search",
                data: { search_user_email: search_user_email},
                success:function(response){
                    $('#stu_cou_link_list').html("");
                    $('#stu_cou_link_list').html(response);
                    //console.log("Student record search" +response);
                }
            });
        }
    }

    // Action -> Link Student and Course 
    function link_student_course(user_id,status){
        if($("#LinkCourseForm").valid()){
            var course_id = $('#link_course').val();
            var amount_paid = $('#amount_paid').val();
            $.ajax({
                url:'/registrar/link_student_course',
                type:'POST',
                data: {
                    user_id       : user_id,
                    course_id     : course_id,
                    amount_paid   : amount_paid,
                    payment_status: status
                },
                success: function(response){
                    if(response == "true"){
                        $("#CourseLinkModal").modal('hide');
                        $("#body-course_link").html("");
                        get_course_link();
                    }
                }
            });
        }
    }
 
    // Action -> Link MEntor/SME and Course 
    function link_mentor_course(user_id){
        if($("#LinkCourseSmeForm").valid()){
            var course_id = $('#link_course').val();
            // var amount_paid = $('#amount_paid').val();
            $.ajax({
                url:'/registrar/link_mentor_course',
                type:'POST',
                data: {
                    user_id       : user_id,
                    course_id     : course_id
                },
                success: function(response){
                    if(response == "true"){
                        $("#CourseLinkModal").modal('hide');
                        $("#body-course_link").html("");
                        get_all_linked_mentor();
                    }
                }
            });
        }
    }

    // Action -> Un-Link Coruse and Student
    function unlink_user_course(user_id,batch_id,transaction_id) {
        if(confirm('Are you sure you want to un-link this course ?')){
            $.ajax({
                type:"POST",
                url: "/registrar/unlink_user_course",
                data: { 
                    user_id: user_id, 
                    batch_id:batch_id, 
                    transaction_id: transaction_id 
                },
                success: function(response){
                    if(response == "true"){
                        get_course_link();
                    }
                }
            });
        }        
    }

    // sriram : Action -> Un-Link Coruse and Mentor ..........
    function unlink_mentor_course(user_id,map_id) {
        if(confirm('Are you sure you want to un-link this course ?')){
            $.ajax({
                type:"POST",
                url: "/registrar/unlink_mentor_course",
                data: { 
                    user_id: user_id, 
                    map_id:map_id
                },
                success: function(response){
                    if(response == "true"){
                        get_all_linked_mentor();
                    }
                }
            });
        }        
    }

    // ### im working here 
    // Action -> Open Affilate Page
    function open_affilate() {
        $.ajax({
            type:"GET",                                               
            url:"/registrar/affilates_dashboard/",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });
    }

    // Action -> Get all Affilate list
    function get_all_affilates(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/affilates_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#affiliates").html("");
                $("#affiliates").html(response);
                var table = $("#affilates_list").dataTable();
            }
        });
    }

    // Action -> Load Model With AJAX Add Affilate Modal
    function add_affilate_modal() {
        $.ajax({
            type: "POST",
            url: "/registrar/add_affilate",
            success: function (responce){
                $("#body-add_affilate").html("");
                $("#body-add_affilate").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

/*----------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------*/
/* Content Admin DashBoard Management Begin                                                       */
/*-----------------------------------------------------------------------------------------------*/
    // Action : Open Content Direcotr Dashboard
    function open_contents_ca() {
        $.ajax({
            type:"GET",                                               
            url:"/contentadmin/director_dashboard/",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });
    }

    // Action : Open Mentor / SME Dashboard
    function open_mentor_dashboard() {
        $.ajax({
            type:"GET",                                               
            url:"/contentadmin/mentor_dashboard/",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });
    }

    // Action : open course resource management
    function open_content_management() {
        // $('#right-side-content').html("<h1> Couse Management</h1>");
        $.ajax({
            type:"POST",                                               
            url:"/resouce/content_management",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                get_resource_list();
            }           
        });
    }

    function show_cm_assessment_tab(){
        $.ajax({
            type:"POST",                                               
            url:"/resouce/content_management",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                // setTimeout(function(){
                    get_assessment_list();
                // },500);
                $('.nav-tabs a[href="#assessment"]').tab('show');
            }           
        });
    }

/*-----------------------------------------------------------------------------------------------*/
/* Content Admin DashBoard Management Ended                                                       */
/*-----------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Resource Management Begin                                                               */
/*-----------------------------------------------------------------------------------------------*/

    // Action -> Get All Resource List
    function get_resource_list() {

        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            // url:  "/resource/resource_view",
            url:  "/resource/resource_view1",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#resource").html("");
                $("#resource").html(response);
                var table = $("#resource_list").dataTable();
            }
        });
    }


    // Action -> Get Subject List
    function get_subject_list() {

        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/subject_view",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#subject").html("");
                $("#subject").html(response);
                $("#subject_list").dataTable();
            }
        });
    }

    // Action -> Get Course List
    function get_course_list(){
    
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/course_view",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#course").html("");
                $("#course").html(response);
                $("#course_list").dataTable();
            }
        });
    }

    

    // Action -> Load Modal With AJAX PDF Uploader
    function ajax_pdf_request() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_pdf",
            success: function (responce){
                $("#body-add_pdf").html("");
                $("#body-add_pdf").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Load Modal With AJAX Video Modal
    function add_video_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/add_video_modal",
            success: function (responce){
                $("#body-add_video").html("");
                $("#body-add_video").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Load Modal With AJAX Captiva Uploader
    function ajax_captiva_request() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_captiva",
            success: function (responce){
                $("#body-add_captiva").html("");
                $("#body-add_captiva").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Load Modal With AJAX Captiva Quize Uploader
    function ajax_captiva_quiz_request() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_captiva_quiz",
            success: function (responce){
                $("#body-add_captiva_quiz").html("");
                $("#body-add_captiva_quiz").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }
    
    // Please Add ajax_pdf_upload.js in that file 
    // ie: <script src="/static/js/common/ajax_pdf_upload.js/"></script> 

    // Action -> Call upload pdf when button click
    function upload_pdf(element) {
        $(element).submit();
    }

    // Action -> Add Video Resource
    function add_video_resource() {
        var sub_name = $("#addVideoRes").find('#subject_name').val();
        var res_name = $("#addVideoRes").find('#resource_name').val();
        var res_link = $("#addVideoRes").find('#resource_link').val();
        var res_tags = $("#addVideoRes").find('#resource_tag').val();
        if($("#VideoForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/add_video",
                data: { 
                    subject_name: sub_name, 
                    resource_name: res_name, 
                    resource_link: res_link, 
                    resource_tag: res_tags 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#addVideoRes").modal('hide');
                    get_resource_list();
                }
            });    
        } else { }
    }
    

    // Action -> Load Modal With AJAX edit resource Modal
    function edit_res_modal(res_id) {
        $.ajax({
            type: "POST",
            url: "/resource/edit_res_modal",
            data:{res_id:res_id},
            success: function (responce){
                $("#EditResource").modal('show');
                $("#body-edit_resource").html("");
                $("#body-edit_resource").html(responce);
                console.log('Responce :'+responce);
            }
        });
    }


    // Action -> Edit Resource
    function update_resource() {
        var resource_name   = $("#EditResource").find('#edit_resource_name').val();
        var resource_tag    = $("#EditResource").find('#edit_resource_tag').val();
        var resource_id     = $("#EditResource").find('#resource_id').val();   
        if($("#EditResForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_resource",
                data: { 
                    resource_id: resource_id, 
                    resource_name:resource_name,  
                    resource_tag: resource_tag 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#EditResource").modal('hide');
                    get_resource_list();
                }
            });    
        } 
    }


    // Action -> Delete Resource
    function delete_resource(res_id) {
        if (confirm('Are you sure you want to delete this file?')){ 
            console.log("true"); 
            $.ajax({
                type: "POST",
                url: "/resource/delete_resource",
                data: {resource_id: res_id },
                success: function(responce) {
                    // call model and close
                    console.log("video with res_id "+res_id+" Deleted");
                    get_resource_list();
                }
            });
        }
    }

/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Resource Management Ended                                                       */
/*-----------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Assessment Management Start                                                       */
/*-----------------------------------------------------------------------------------------------*/

    // Action : Get Assessment Tab in Course Dash:
    function get_assessment_list() {
        $('.tab-content').oLoader({
            wholeWindow:true, // makes the loader fit the window size
            lockOverflow: true, // disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: 'POST',
            // url: '/resource/assessment_list',
            url: '/resource/assessment_list1',
            updateContent: false, // this will not update content in .content
            complete: function(response) {
                $('#assessment').html('');
                $('#assessment').html(response);
                var assessment_list = $('#assessment_list').dataTable();
            }
        });
    }

    // Action -> Get All Mentors Assessment List View
    function get_all_mentor_assessment_list(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            // url:  "/resource/all_mentor_assessment_list",
            url:  "/resource/all_mentor_assessment_list1",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#mentor_assessment_list_view").html("");
                $("#mentor_assessment_list_view").html(response);
                var directors_list = $('#mentor_assessments_list').dataTable();
                // var table = $("#associate_list").dataTable();
            }
        });
    }


    // sriram : Action -> Get All Mentors Linked  User List View
    function get_all_linked_mentor(){
       $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/mentor_course_link",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#mentor-course-link").html("");
                $("#mentor-course-link").html(response);
                var table = $("#mentor_course_link_table").dataTable();
            }
        });
    }

    //Action -> Load Assessment Modal With AJAX call
    function add_assessment_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/add_assessment_modal",
            success: function (responce){
                $("#body-add_assessment").html("");
                $("#body-add_assessment").html(responce);
                //console.log('Responce :'+responce);
           }
        });
    }

    // Action : Upload Assessment PDF 
    // Please Add ajax_assessment_upload.js in that file 
    // is <script src="/static/js/common/ajax_assessment_upload.js" ></script>

    // Action -> Call upload pdf when button click
    function upload_ass_pdf(element) {
        $(element).submit();
    }


    // Action -> Load Edit Assessment Modal
    function edit_assessment_modal(test_id){
        $.ajax({
            type:"POST",
            url:"/resource/edit_assessment_modal",
            data:{test_id: test_id},
            success: function (responce){
                $("#edit-assmodal").modal('show');
                $("#body-edit_assessment").html("");
                $("#body-edit_assessment").html(responce);
                console.log('Responce :'+responce);
            }
        });
    }

    // Action -> Update Edit Assessment modal
    function update_assessment() {
        var test_subject        = $("#edit-assmodal").find('#edit_test_subject').val();
        var test_type           = $("#edit-assmodal").find('#edit_test_type').val();
        var test_name           = $("#edit-assmodal").find('#edit_test_name').val();
        var test_description    = $("#edit-assmodal").find('#edit_test_description').val();
        var no_of_questions     = $("#edit-assmodal").find('#edit_no_of_questions').val();
        var test_duration       = $("#edit-assmodal").find('#edit_test_duration').val();
        var test_date           = $("#edit-assmodal").find('#edit_test_date').val();
        var test_id             = $("#edit-assmodal").find('#edit_test_id').val();
        
        if($("#EditAssForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_assessment",
                data: { 
                    test_subject    : test_subject, 
                    test_type       : test_type,
                    test_name       : test_name,
                    test_description: test_description,
                    no_of_questions : no_of_questions,
                    test_duration   : test_duration,
                    test_date       : test_date,
                    test_id         : test_id
                },
                success:function(responce){
                    // console.log("I GOT this responce "+responce);
                    $("#edit-assmodal").modal('hide');
                    get_assessment_list();
                }
            });    
        }
    }

    //Action -> Load Answer key Modal With AJAX call
    function ans_key_modal(test_id) {
        $.ajax({
            type: "POST",
            url: "/resource/ans_key_modal",
            data:{ test_id:test_id},
            success: function (responce){
                $("#AnsKeyModal").modal('show');
                $("#body-ans_key").html("");
                $("#body-ans_key").html(responce);
                // console.log('Responce :'+responce);
           }
        });
    }

    // Action: This will return answer string : ie 1,2#2,2
    function get_answers(no_of_questions) {
        var string = ""; 
        for (var i = 0; i < no_of_questions; i++) {
            var ans = $('[name="data['+i+']"]').val();
            if(ans == "" || ans == "undefined" || ans =="0" || ans =="null"){
                if(no_of_questions == i+1){
                    string+='null';
                } else {
                    string+= 'null,'; 
                }
            } else {
                if(no_of_questions == i+1){
                    string+= ''+ans;
                } else {
                    string+= ''+ans+',';
                }
            }
        };
        return string;
    }

    // Action:save assessment answers using Ajax
    function save_answer(){
        if($('#AnsKeyForm').valid()){
            if(confirm("Are you sure you want to submit the answers?")){
               console.log("true");
                $.ajax({
                    type:"POST",
                    url:"/resource/save_answer",
                    data:{
                        test_id   : $("#AnsKeyModal").find('#test_id').val(),
                        answer_key: collect_answer()
                    },
                    success:function(responce){
                        console.log("I GOT this responce "+responce);
                        $("#AnsKeyModal").modal('hide');                        
                    }
                });
            }
        }
    }


    //Action: Delete Assessment with Ajax
    function delete_assessment(test_id){
        if(confirm("Are you sure you want to delete this file?")){
            console.log("true");
            $.ajax({
                type:"POST",
                url:"/resource/delete_assessment",
                data:{test_id:test_id},
                success: function(responce){
                    console.log(" Assessment with test_id"+test_id+"Deleted");
                    get_assessment_list();
                }
            });
        }
    }

    // get_student answer is moved to start_test_page
    // save_student_answer is moved to start_test_page
    

//*-----------------------------------------------------------------------------------------------*/
/* Content Admin Assessment Management Ended                                                       */
/*-----------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Subject Management Begin                                                               */
/*-----------------------------------------------------------------------------------------------*/
    
    // Action -> Load Model With AJAX Subject Modal
    function add_subject_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/add_subject_modal",
            success: function (responce){
                $("#body-add_subject").html("");
                $("#body-add_subject").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action-> Adding Subject
    function add_subject() {
        var sub_name = $("#addSubjectModal").find('#subject_name').val();
        var sub_desc = $("#addSubjectModal").find('#subject_description').val();
        var sub_fee  = $("#addSubjectModal").find('#subject_fee').val();
        if($("#AddSubjectForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/add_subject",
                data: { 
                    subject_name: sub_name, 
                    subject_description: sub_desc,
                    subject_fee: sub_fee 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#addSubjectModal").modal('hide');
                    get_subject_list();
                }
            });    
        }
    }


    // Action -> Load Modal With AJAX edit subject Modal
    function edit_sub_modal(sub_id){
        $.ajax({
            type: "POST",
            url: "/resource/edit_sub_modal",
            data:{sub_id:sub_id},
            success: function (responce){
                $("#EditSubject").modal('show');
                $("#body-edit_subject").html("");
                $("#body-edit_subject").html(responce);
                console.log('Responce :'+responce);
            }
        });
    }

    // Action -> Edit Subject
    function update_subject() {
        var sub_name = $("#EditSubject").find('#edit_subject_name').val();
        var sub_desc = $("#EditSubject").find('#edit_subject_description').val();
        var sub_fee  = $("#EditSubject").find('#edit_subject_fee').val();
        var sub_id   = $("#EditSubject").find('#subject_id').val();
        if($("#EditSubForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_subject",
                data:  { 
                    subject_id : sub_id ,
                    subject_name: sub_name,
                    subject_description: sub_desc,
                    subject_fee: sub_fee
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#EditSubject").modal('hide');
                    get_subject_list();
                }
            });    
        }
    }

    // Action -> Deleting Subject
    function delete_subject(subject_id){
        if (confirm('Are you sure you want to delete this Area of Interest ?')){ 
            console.log("true"); 
            $.ajax({
                type: "POST",
                url: "/resource/delete_subject",
                data: {subject_id: subject_id },
                success: function(responce) {
                    // call model and close
                    console.log("subject with sub_id "+subject_id+" Deleted");
                    get_subject_list();
                }
            });
        }
    }

/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Subject Management Ended                                                        */
/*-----------------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Management Begin                                                               */
/*-----------------------------------------------------------------------------------------------*/
    
    // Action -> Load Model With AJAX Course Modal
    function add_course_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/add_course_modal",
            success: function (responce){
                $("#body-add_course").html("");
                $("#body-add_course").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action-> Adding Course
    function add_course() {
        var course_name     = $("#addCourseModal").find('#course_name').val();
        var course_desc     = $("#addCourseModal").find('#course_description').val();
        var course_duration = $("#addCourseModal").find('#course_duration').val();
        var course_type     = $("#addCourseModal").find('#course_type').val();
        var course_fee      = $("#addCourseModal").find('#course_fee').val();
        var course_status   = $("#addCourseModal").find('#course_status').val();
        if($("#AddCourseForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/add_course",
                data: { 
                    course_name: course_name, 
                    course_description: course_desc,
                    course_duration: course_duration,
                    course_type: course_type,
                    course_fee:course_fee,
                    course_status: course_status
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#addCourseModal").modal('hide');
                    get_course_list();
                }
            });    
        }
    }

    // Action -> Add Course with Syllabus File
    function upload_course_with_syllabus(element) {
        $(element).submit();
    }

    // Action -> Load Modal With AJAX edit course Modal
    function edit_course_modal(course_id){
        $.ajax({
            type: "POST",
            url: "/resource/edit_course_modal",
            data:{course_id:course_id},
            success: function (responce){
                $("#editCourseModal").modal('show');
                $("#body-edit_course").html("");
                $("#body-edit_course").html(responce);
                //console.log('Responce :'+responce);
            }
        });
    }

    // Action -> Edit Course with Syllabus file 
    function edit_course_with_syllabus(element) {
        $(element).submit();
    }

    // Action -> Edit Course
    function update_course() {
        var course_name     = $("#EditCourseForm").find('#edit_course_name').val();
        var course_desc     = $("#EditCourseForm").find('#edit_course_description').val();
        var course_duration = $("#EditCourseForm").find('#edit_course_duration').val();
        var course_type     = $("#EditCourseForm").find('#edit_course_type').val();
        var course_fee      = $("#EditCourseForm").find('#edit_course_fee').val();
        var course_status   = $("#EditCourseForm").find('#edit_course_status').val();
        var course_id       = $("#EditCourseForm").find('#edit_course_id').val();

        if($("#EditCourseForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_course",
                data:  { course_id : course_id ,
                         course_name: course_name,
                         course_description: course_desc,
                         course_duration: course_duration,
                         course_type: course_type,
                         course_fee: course_fee,
                         course_status: course_status 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#editCourseModal").modal('hide');
                    get_course_list();
                }
            });    
        }
    }

    // Action -> Deleting Subject
    function delete_course(course_id){
        // Check for course map tabe for this id is not prenent then allow to delete
        if (confirm('Are you sure you want to delete this course ?')){ 
            console.log("true"); 
            $.ajax({
                type: "POST",
                url: "/resource/delete_course",
                data: {course_id: course_id },
                success: function(responce) {
                    // call model and close
                    console.log("course with course_id "+course_id+" Deleted");
                    get_course_list();
                }
            });
        }
    }
/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Management Ended                                                         */
/*-----------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Resource Map Management Begin                                                               */
/*-----------------------------------------------------------------------------------------------*/
    // Action -> open course resource map
    function open_course_resource_mapview() {
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/cres_mapview",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#course_resource_map_list").html("");
                $("#course_resource_map_list").html(response);
                // $("#course_syllabus_list").dataTable();
            }
        });    
    }

    // Action -> Get Course Resource Map List
    function get_course_resource_map_list(course_id){
    
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/cres_maplist",
            data: { course_id: course_id },
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#cres_map_list").html("");
                $("#cres_map_list").html(response);
                $("#course_syllabus_list").dataTable();
            }
        });
    }

    // Action -> Load Model With AJAX Course Resource Map selection  Modal
    function load_cres_map_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/load_cres_map_modal",
            success: function (responce){
                $("#add_course_resource_modal").modal('show');
                $("#body-add_course_resource_map").html("");
                $("#body-add_course_resource_map").html(responce);
                $('#resource_browser').dataTable({
                    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
                });
                //console.log('Responsce :'+responce);
            }
        });
    }

    //Action -> Load view PDF Modal with Ajax
    function view_pdf_modal(syllabus_type,res_type,res_id){
        $.ajax({
            type: "POST",
            url : "/resource/view_pdf_modal",
            data: {
                syllabus_type: syllabus_type,
                res_type: res_type,
                res_id: res_id
            },
            success: function(response){
                $("#ViewPdfModal").modal('show');
                $("#body-view_pdf").html("");
                $("#body-view_pdf").html(response);
                $("#course_syllabus_list").dataTable();
            }
        });
    }

    //Action -> Load view video Modal with Ajax
    function view_video_modal(syllabus_type,res_type,res_id){
        $.ajax({
            type: "GET",
            url : "/resource/view_video_modal",
            data:{
                syllabus_type: syllabus_type,
                res_type: res_type,
                res_id: res_id
            },
            success: function(response){
                $("#ViewVideoModal").modal('show');
                $("#body-view_video").html("");
                $("#body-view_video").html(response);
                $("#course_syllabus_list").dataTable();
            }
        });
    }


    //Action -> Load view PDF Modal with Ajax
    function view_assessment_pdf(syllabus_type,test_id){
        $.ajax({
            type: "POST",
            url : "/resource/view_assessment_pdf",
            data: {
                syllabus_type: syllabus_type,
                test_id: test_id
            },
            success: function(response){
                $("#ViewAssessmentPdf").modal('show');
                $("#body-view_assessment_pdf").html("");
                $("#body-view_assessment_pdf").html(response);
                console.log(response);
            }
        });
    }
    // Action : Open Video and bind inside video view
    function view_video_resource(video_url, width, height) {
        var url,html;
        if(video_url != undefined && video_url != null && video_url != ""){
            var data = $.ajax({
                            // url : "/embed_video?url="+escape(video_url),
                            url : "/embed_video?url="+btoa(video_url),
                            type : "GET",
                            async : false
                        }).responseText;
                data = $.parseJSON(data);
                // console.log('video responce : '+data);
                data.html = data.html.replace('http:','https:');
                data.html = data.html.replace('feature=oembed', 'feature=oembed&rel=0');
                html = data == undefined ? "NA" : data.html == undefined ? "NA" : data.html;

            if(width != undefined && height != undefined) {
                if($(html).get(0).tagName == "IFRAME") {
                    html = $(html).attr("width", width+"%");
                    html = $(html).attr("height", height+"px");
                    html = $(html).addClass('embed-responsive-item');
                    html = $("<div/>").html($(html).clone());
                    html = $(html).html();
                }
            }
            $('.video-player').html("");
            $('.video-player').html(html);
            // console.log(html);
            return html;
        } else {
            $('.video-player').html("");
            $('.video-player').html("NA");
            return "NA";
        }
    } 
    
    // Action-> Adding Course Resource
    function add_course_resource(course_id,syllabus_type) {
        var module_name  = $("#AddCourseResourceMapForm").find('#module_name').val();
        var group_name   = $("#AddCourseResourceMapForm").find('#group_name').val();
        var subject_name = $("#AddCourseResourceMapForm").find('#subject_name').val();
        var resource_id  = $("#AddCourseResourceMapForm").find('#resource_id').val();
        var schedule     = $("#AddCourseResourceMapForm").find('#schedule').val();
        if($("#AddCourseResourceMapForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/add_course_resource",
                data: { 
                    course_id: course_id, 
                    module_name: module_name,
                    group_name: group_name,
                    subject_name: subject_name,
                    syllabus_type: syllabus_type,
                    resource_id: resource_id,
                    schedule: schedule 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#add_course_resource_modal").modal('hide');
                    get_course_resource_map_list(course_id);
                }
            });    
        }
    }

    // Action -> Load Model With AJAX Course Resource Map Editing  Modal
    function edit_cres_map_modal(map_id){
        $.ajax({
            type: "POST",
            url: "/resource/edit_cres_map_modal",
            data: { map_id:map_id },
            success: function (responce){
                $("#edit_course_resource_modal").modal('show');
                $("#body-edit_course_resource_map").html("");
                $("#body-edit_course_resource_map").html(responce);
                $('#edit_resource_browser').dataTable({
                    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
                });
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Updating course Resource Map
    function update_course_resource_map(course_id,syllabus_type) {
        var map_id       = $("#EditCourseResourceMapForm").find('#course_res_map_id').val();
        var module_name  = $("#EditCourseResourceMapForm").find('#module_name').val();
        var group_name   = $("#EditCourseResourceMapForm").find('#group_name').val();
        var subject_name = $("#EditCourseResourceMapForm").find('#subject_name').val();
        var resource_id  = $("#EditCourseResourceMapForm").find('#resource_id').val();
        var schedule     = $("#EditCourseResourceMapForm").find('#schedule').val();
        if($("#EditCourseResourceMapForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_course_resource",
                data: { 
                    map_id: map_id, 
                    module_name: module_name,
                    group_name: group_name,
                    subject_name: subject_name,
                    syllabus_type: syllabus_type,
                    resource_id: resource_id,
                    schedule: schedule 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#edit_course_resource_modal").modal('hide');
                    get_course_resource_map_list(course_id);
                }
            });    
        }
    }
    

/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Resource Map Management Ended                                                               */
/*-----------------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Assessment Map Management Begin                                                               */
/*-----------------------------------------------------------------------------------------------*/
    // Action -> open course Assessment map
    function open_course_assessment_mapview() {
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/ctest_mapview",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#course_assessment_map_list").html("");
                $("#course_assessment_map_list").html(response);
                // $("#course_syllabus_list").dataTable();
            }
        });    
    }

    // Action -> Get Course Test Map List
    function get_course_test_map_list(course_id){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/ctest_maplist",
            data: { course_id: course_id },
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#ctest_map_list").html("");
                $("#ctest_map_list").html(response);
                $("#course_test_list").dataTable();
            }
        });
    }

    // Action -> Load Model With AJAX Course Test Map selection  Modal
    function load_ctest_map_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/load_ctest_map_modal",
            success: function (responce){
                $("#add_course_assessment_modal").modal('show');
                $("#body-add_course_test_map").html("");
                $("#body-add_course_test_map").html(responce);
                $("#assessment_browser").dataTable({
                    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
                });
                //console.log('Responsce :'+responce);
            }
        });
    }
    
    // Action-> Adding Course Test Map
    function add_course_test(course_id,syllabus_type) {
        var module_name  = $("#AddCourseAssessmentMapForm").find('#module_name').val();
        var group_name   = $("#AddCourseAssessmentMapForm").find('#group_name').val();
        var subject_name = $("#AddCourseAssessmentMapForm").find('#subject_name').val();
        var resource_id  = $("#AddCourseAssessmentMapForm").find('#resource_id').val();
        var schedule     = $("#AddCourseAssessmentMapForm").find('#schedule').val();
        if($("#AddCourseAssessmentMapForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/add_course_test",
                data: { 
                    course_id: course_id, 
                    module_name: module_name,
                    group_name: group_name,
                    subject_name: subject_name,
                    syllabus_type: syllabus_type,
                    resource_id: resource_id,
                    schedule: schedule 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#add_course_assessment_modal").modal('hide');
                    get_course_test_map_list(course_id);
                }
            });    
        }
    }

    // Action -> Load Model With AJAX Course Test Map selection  Modal
    function edit_ctest_map_modal(map_id) {
        $.ajax({
            type: "POST",
            url: "/resource/edit_ctest_map_modal",
            data: { map_id:map_id },
            success: function (responce){
                $("#edit_course_assessment_modal").modal('show');
                $("#body-edit_course_test_map").html("");
                $("#body-edit_course_test_map").html(responce);
                $("#edit_assessment_browser").dataTable({
                    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
                });
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Updating Course Test Map
    function update_course_test(course_id,syllabus_type) {
        var map_id       = $("#EditCourseAssessmentMapForm").find('#course_test_mapid').val();
        var module_name  = $("#EditCourseAssessmentMapForm").find('#module_name').val();
        var group_name   = $("#EditCourseAssessmentMapForm").find('#group_name').val();
        var subject_name = $("#EditCourseAssessmentMapForm").find('#subject_name').val();
        var resource_id  = $("#EditCourseAssessmentMapForm").find('#resource_id').val();
        var schedule     = $("#EditCourseAssessmentMapForm").find('#schedule').val();
        if($("#EditCourseAssessmentMapForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_course_test",
                data: { 
                    map_id: map_id,
                    module_name: module_name,
                    group_name: group_name,
                    subject_name: subject_name,
                    syllabus_type: syllabus_type,
                    resource_id: resource_id,
                    schedule: schedule 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#edit_course_assessment_modal").modal('hide');
                    get_course_test_map_list(course_id);
                }
            });    
        }
    }

/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Assessment Map Management Ended                                                               */
/*-----------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Syllabus Management Begin                                                               */
/*-----------------------------------------------------------------------------------------------*/
    // Action -> Get Course Syllabus List
    function open_course_syllabus(course_id){
    
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/course_syllabus_view",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#course_syllabus").html("");
                $("#course_syllabus").html(response);
                // $("#course_syllabus_list").dataTable();
            }
        });
    }

    // Action -> Get Course List
    function get_syllabus_list(course_id){
    
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/syllabus_list",
            data: { course_id: course_id },
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#syllabus_list").html("");
                $("#syllabus_list").html(response);
                $("#course_syllabus_list").dataTable();
            }
        });
    }

    // Action-> Adding Course Syllabus
    function add_syllabus(course_id,syllabus_type) {
        var subject_name = $("#AddSyllabusForm").find('#subject_name').val();
        var resource_id  = $("#AddSyllabusForm").find('#resource_id').val();
        var schedule     = $("#AddSyllabusForm").find('#schedule').val();
        if($("#AddSyllabusForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/add_syllabus",
                data: { 
                    course_id: course_id, 
                    subject_name: subject_name,
                    syllabus_type: syllabus_type,
                    resource_id: resource_id,
                    schedule: schedule 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#add_syllabus_modal").modal('hide');
                    $("#add_test_syllabus_modal").modal('hide');
                    get_syllabus_list(course_id);
                }
            });    
        }
    }

    // Action -> Load Model With AJAX Syllabus Resource Modal
    function load_csr_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/load_csr_modal",
            success: function (responce){
                $("#body-add_syllabus").html("");
                $("#body-add_syllabus").html(responce);
                $('#resource_browser').dataTable({
                    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
                });
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Load Model With AJAX Syllabus Assessment Modal
    function load_csa_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/load_csa_modal",
            success: function (responce){
                $("#body-add_test_syllabus").html("");
                $("#body-add_test_syllabus").html(responce);
                $('#assessment_browser').dataTable({
                    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
                });
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Deleting Syllabus
    function delete_syllabus(map_id,course_id,res_type){
        // Check for course map tabe for this id is not prenent then allow to delete
        if (confirm('Are you sure you want to delete this course ?')){ 
            console.log("true"); 
            $.ajax({
                type: "POST",
                url: "/resource/delete_syllabus",
                data: {map_id: map_id },
                success: function(responce) {
                    // call model and close
                    console.log("course syllabus with map_id "+map_id+" Deleted");
                    if(res_type == "RESOURCE"){
                        get_course_resource_map_list(course_id);
                    }
                    if(res_type == "ASSESSMENT"){
                        get_course_test_map_list(course_id);
                    }
                    get_syllabus_list(course_id);
                }
            });
        }
    }
/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Course Syllabus Management Ended                                                               */
/*-----------------------------------------------------------------------------------------------*/




/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Batch Management Start                                                               */
/*-----------------------------------------------------------------------------------------------*/
    // Action : Get Batch List
    function get_batch_list() {
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/batch/batch_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#batch-view").html("");
                $("#batch-view").html(response);
                $("#batch_list").dataTable();
            }
        });
    }

    // Action -> Load Model With AJAX Add Batch Modal
    function load_batch_modal() {
        $.ajax({
            type: "GET",
            url: "/batch/load_batch_modal",
            success: function (responce){
                $("#body-add_batch").html("");
                $("#body-add_batch").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action -> Load Model With AJAX Edit Batch Modal
    function edit_batch_modal(batch_id) {
        $.ajax({
            type: "POST",
            url: "/batch/edit_batch_modal",
            data: { batch_id: batch_id },
            success: function (responce){
                $("#edit_batch_modal").modal('show');
                $("#body-edit_batch").html("");
                $("#body-edit_batch").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action-> Adding Batch
    function add_batch() {
        var batch_name          = $("#add_batch_modal").find('#batch_name').val();
        var batch_description   = $("#add_batch_modal").find('#batch_description').val();
        var batch_start_date    = $("#add_batch_modal").find('#batch_start_date').val();
        var batch_course_id     = $("#add_batch_modal").find('#batch_course_id').val();
        
        if($("#AddBatchForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/batch/add_batch",
                data: { 
                    batch_name: batch_name, 
                    batch_description: batch_description,
                    batch_start_date: batch_start_date,
                    batch_course_id: batch_course_id 
                },
                success:function(responce){
                    //console.log("I GOT this responce "+responce);
                    $("#add_batch_modal").modal('hide');
                    get_batch_list();
                }
            });    
        }
    }

    // Action -> update batch
    function update_batch() {
        var batch_name          = $("#edit_batch_modal").find('#edit_batch_name').val();
        var batch_description   = $("#edit_batch_modal").find('#edit_batch_description').val();
        var batch_start_date    = $("#edit_batch_modal").find('#edit_batch_start_date').val();
        var batch_course_id     = $("#edit_batch_modal").find('#edit_batch_course_id').val();
        var batch_id            = $("#edit_batch_modal").find('#batch_id').val();
        
        if($("#EditBatchForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/batch/update_batch",
                data: { 
                    batch_name: batch_name, 
                    batch_description: batch_description,
                    batch_start_date: batch_start_date,
                    batch_course_id: batch_course_id,
                    batch_id: batch_id
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#edit_batch_modal").modal('hide');
                    get_batch_list();
                }
            });    
        }
    }

    // Action -> Delete Batch 
    function delete_batch(batch_id){
        // Check for course map tabe for this id is not prenent then allow to delete
        if (confirm('Are you sure you want to delete this batch ?')){ 
            console.log("true"); 
            $.ajax({
                type: "POST",
                url: "/batch/delete_batch",
                data: {batch_id: batch_id },
                success: function(responce) {
                    // call model and close
                    console.log("batch with batch_id "+batch_id+" Deleted");
                    get_batch_list();
                }
            });
        }
    }

    // Action : Reports 
    function report_dashboard(){
        $.ajax({
            type:"POST",                                               
            url:"/reports/report_dash",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });            
    }

    // Action : Reports Payment 
    function report_payment_dashboard(){
        $.ajax({
            type:"POST",                                               
            url:"/reports/report_payment_dashboard",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });            
    }

/*-----------------------------------------------------------------------------------------------*/
/* Content Admin Batch Management Ended                                                               */
/*-----------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------*/
/* Admin SMS LOG Checking Start                                                               */
/*-----------------------------------------------------------------------------------------------*/
// ### usk working here
    // Action : Open SMS LOG Dashboard
    function open_smslog_dashboard(){
        $.ajax({
            type:"GET",
            url: "/admin/smslog_dashboard/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }

    // Action : Open SMS Log List
    function get_smslog_list(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/admin/smslog_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $('#smslog_list').html('');
                $('#smslog_list').html(response);
                var smslog_list = $("#smslog_table").dataTable();
            }
        });
    }

    // Action : Delete this SMS
    function delete_sms_log(sms_id){
        $.ajax({
            type:"POST",
            url: "/admin/delete_smslog",
            data: { sms_id : sms_id },
            success:function(response) {
                get_smslog_list();
            }
        });
    }
/*-----------------------------------------------------------------------------------------------*/
/* Admin SMS LOG Checking Ended                                                               */
/*-----------------------------------------------------------------------------------------------*/


    
    
/*===============================================================================================*/
/*| Admin Releated Functionalities                                   Ended                      |*/
/*===============================================================================================*/





/*===============================================================================================*/
/*| Associate Releated Functionalities                                   Begin                    |*/
/*===============================================================================================*/

/*-----------------------------------------------------------------------------------------------*/
/* Associate Page Activites Start                                                                */
/*-----------------------------------------------------------------------------------------------*/

    // Action : Open Associate Dash Board
    function open_associate_dashboard() {
        $.ajax({
            type:"GET",
            url: "/associate/dashboard/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }
    // ###
    // Action: Open Associate Subject Registration
    function load_associate_subject_reg() {
        $.ajax({
            type:"POST",
            url: "/associate/load_subject_reg_view/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }

    // Action : Open bulk student fee paid....
    function open_associate_add_student() {
        $.ajax({
            type:"POST",
            url: "/associate/add_student/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    } 

    // Action -> AJAX Call PDF File Upload with Validation
    $(function() {
        $('#associateRegistrationFrom1').submit(function(e) {
            e.preventDefault();
            if($('#associateRegistrationFrom1').valid()){
                $('#add_pdf_btn').button('loading');
                $.ajaxFileUpload({
                    url             :'/associate/upload', 
                    secureuri       :false,
                    fileElementId   :'upload',
                    dataType: 'JSON',
                    data: { 
                        degree : $('#degree').val(), 
                        expertise: $("#expertise").val(),
                        course_handel: $("#course_handel").val()
                    },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            window.location.replace("/spoc_home");    
                            // $("#addPDFRes").modal('hide');
                        } else {
                            $('#files').html(obj['msg']);
                            // $('#add_pdf_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#add_pdf_btn').button('reset'); }
            
        });
    });

    // Action -> Call upload pdf when button click
    function upload_associate_doc(element) {
        $(element).submit();
    }

    //for associate view....
    function get_asso_course_menu(course_id) {
        $.ajax({
            type: "POST",
            url: "/associate/course_tree",
            data: { course_id:course_id },
            success: function (response) {
                $("#course_tree").html("");
                $("#course_tree").html(response);
                $(".sidebar .treeview").tree();
            },
            statusCode: {
                404: function() {
                    alert( "page not found" );
                }
            }
        });
    }

    // Action -> Get All Associates Docs
    function get_all_associates_docs(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/associates_document_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#associate_doc_list").html("");
                $("#associate_doc_list").html(response);
                var table = $("#associate_document_list").dataTable();
            }
        });
    }
    
    // Action -> Get All Associates Docs
    function get_all_associates_subjects(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/registrar/associates_subject_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#associate_subjects").html("");
                $("#associate_subjects").html(response);
                var table = $("#associate_subjects_list").dataTable();
            }
        });
    }

    // Action -> Load Modal With AJAX varify associate 
    function open_associate_varify_modal(user_id){
        $.ajax({
            type: "POST",
            url: "/registrar/view_associate_doc",
            data:{user_id:user_id},
            success: function (responce){
                $("#varify_asso_modal").modal('show');
                $("#body-associate_varify_details").html("");
                $("#body-associate_varify_details").html(responce);
                console.log('Responce :'+responce);
            }
        });
    }

    // Action -> Associate Subject Subscribe payment/associate_summery
    function associate_subscribe_subject(quote_id,subject,discount_amount,user_fname){
        if($('#AssociateJoinSubjectForm').valid()){
            // var amount = $('#amount').val();
            // var subjects = $('#subject').val();
            // alert("user NAME"+user_fname);
            // var length = subjects.length;
            // var selected_subjects = [];
            // var subjects_cost = [];
            // for (var i=0;i<length;i++){
                // var subject = subjects[i].split('#');
                // selected_subjects[i] = subject[0];
                // subjects_cost[i] = subject[1];
            // }
            $.ajax({
                type: "POST",
                url: "/payment/associate_summery",
                data:{
                    quote_id : quote_id,
                    user_fname : user_fname,
                    discount_amount : discount_amount,
                    subject : subject
                },
                success: function (responce){
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(responce);                
                }
            });
        }
    }

    // Action : Spoc Request Quote 
    function spoc_request_quote(){
        if($('#AssociateJoinSubjectForm').valid()){
            var amount   = $('#amount').val();
            var subjects = $('#subject').val();
            var length   = subjects.length;
            var selected_subjects = [];
            var subjects_cost = [];
            for (var i=0;i<length;i++){
                var subject = subjects[i].split('#');
                selected_subjects[i] = subject[0];
                subjects_cost[i] = subject[1];
            }
            $.ajax({
                type: "POST",
                url: "/payment/spoc_request_quote",
                data:{
                    cost : subjects_cost,
                    subjects : selected_subjects,
                    total_amount : amount
                },success: function (responce){
                    $('#request_for_quotation').modal('show');
                    $('#quotation_area').html("");                     
                    $('#quotation_area').html(responce);
                    // old code disableing
                    // $('#right-side-content').html("");                     
                    // $('#right-side-content').html(responce);
                }
            });          
        }
    }

    // Action -> removing SPOC Request  
    function remove_aoi(quote_id){
        if (confirm('Are you sure you want to delete this payment?')){ 
            $.ajax({
                type: "POST",
                url: "payment/remove_aoi",
                data:{
                    quote_id : quote_id
                },
                success: function (responce){
                }
            });
        }
        window.location.reload();
    }

    // Action -> get all this spoc quotes list 
    function get_all_this_spoc_quoets_list(){
        $.ajax({
            type: 'POST',
            url : 'associate/get_all_my_quotes',
            success: function (responce) {
                $('#quotation_area').html("");
                $('#quotation_area').html(responce);
            }
        });
    }

    //Action - > Loads to Payment page of joining SKOL OLD Code
    function associate_payment(){
        if($('#AssociateJoinSubjectForm').valid()){
            var amount = $('#amount').val();
            var subjects = $('#subject').val();
            var length = subjects.length;
            var selected_subjects = [];
            var subjects_cost = [];
            for (var i=0;i<length;i++){
                var subject = subjects[i].split('#');
                selected_subjects[i] = subject[0];
                subjects_cost[i] = subject[1];
            }            
            $.ajax({
                type: "POST",
                url: "/associate/joining_fee_payment",
                data:{
                    cost : subjects_cost,
                    subjects : selected_subjects,
                    total_amount : amount,
                },
                success: function (responce){
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(responce);
                }
            });
        }
    }

    // Action -> Get my students in associate menu
    function get_my_students(){
        $.ajax({
            type:"POST",
            url:"associate/mystudents",
            success:function(response){
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                var table = $('#student_batchwise').dataTable();
                    // var table = $("#student_course_link").dataTable();
            }
        });
    }

    function open_students_reports(){
        $.ajax({
            type:"POST",
            url:"associate/mystudents_reports",
            success:function(response){
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                $('#ranks_tab').hide();
            }
        });
    }

    function get_all_tests(course_id){
        $.ajax({
                type:"POST",
                url: "/associate/get_all_tests",
                data:{course_id:course_id},
                success:function(response) {
                    $("#nationallevel_test_names").html("");
                    $('#national_level_ranks').html("");
                    $("#nationallevel_test_names").html(response);
                }
        });
    }

    function mystudents_ranks(test_no){
        var course_id = $('#course_id').val();
        $.ajax({
                type:'POST',
                url:"associate/mystudents_ranks",
                data:{
                    test_no:test_no,
                    course_id:course_id
                },
                success:function(response){
                    $('#ranks').html("");
                    $('#ranks').html(response);
                    $('#ranks_tab').show();
                    
                    $('#rank_list1').dataTable();
                    $('#rank_list2').dataTable();
                    $('#rank_list3').dataTable();


                    $('#tab_batch_level').removeClass('active');
                    $('#tab_mybatch_level').removeClass('active');
                    $('#tab_national_level').addClass('active');
                    $('#batch_level_ranks').hide();
                    $('#mybatch_level_ranks').hide();

                }
        });
    }

    function batch_level_rank_list(){
        $('#mybatch_level_ranks').hide();
        $('#national_level_ranks').hide();
        $('#batch_level_ranks').show();
    }

    function nation_level_rank_list(){
        $('#mybatch_level_ranks').hide();
        $('#batch_level_ranks').hide();
        $('#national_level_ranks').show();
    }

    function mybatch_level_rank_list(){
        $('#national_level_ranks').hide();
        $('#batch_level_ranks').hide();
        $('#mybatch_level_ranks').show();   

    }

    // add student details for student bulk upload....
    function addstudentModal(){
        $.ajax({
            type: "POST",
            url: "/associate/addstudentModal",
            success:function(response){
                $('#addstudentModal').modal('show');
                $('#body-add_student').html("");
                $('#body-add_student').html(response);
            }
        });
    } 

    // update student details for student bulk upload....
    function editstudentModal(id){
        $.ajax({
            type: "POST",
            url: "/associate/editstudentModal",
            data:{
                fname       : $('#fname_'+id).val(),
                lname       : $('#lname_'+id).val(),
                mobile      : $('#mobile_'+id).val(),
                email       : $('#email_'+id).val(),
                parent_name : $('#parent_name_'+id).val(),
                address     : $('#address_'+id).val(),
                course      : $('#course_'+id).val(),
                cost        : $('#cost_'+id).val(),
                row_id      : id
            },
            success:function(response){
                $('#editstudentModal').modal('show');
                $('#body-update_student').html("");
                $('#body-update_student').html(response);
            }
        });
    }

/*-----------------------------------------------------------------------------------------------*/
/* Associate Page Activites Ended                                                                     */
/*-----------------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------------------*/
/* Associate Course Activites Begin                                                                     */
    /*-----------------------------------------------------------------------------------------------*/
        // Action : Load Course Materials Dashboard
        function open_associate_course_materials() {
            $.ajax({
                type:"POST",
                url: "/associate/course_materials/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }

        // Action : Load Associate Training Meterials
        function open_associate_training_materials() {
            $.ajax({
                type:"POST",
                url: "/associate/training_materials/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }
        
        // Action : Load Student Course Menu
        function get_student_course_tree(course_id) {
            $.ajax({
                type:"POST",
                url: "/associate/student_course_tree",
                data: { course_id:course_id },
                success: function (response) {
                    $("#ass_course_tree").html("");
                    $("#ass_course_tree").html(response);
                    $(".sidebar .treeview").tree();
                },
                statusCode: {
                    404: function() {
                        alert( "page not found" );
                    }
                }
            });
        }

        // Associate : Student Course Module Group Subject Resource -------------START--
        // Action -> Get Associate Student Course Syllabus
        function get_student_course_syllabus(course_id,file_name) {
            $.ajax({
                type: "POST",
                url: "/associate/student_course_syllabus",
                data:{
                    course_id:course_id,
                    file_name: file_name
                },
                success: function (responce){
                    $('#show_syllabus_modal').modal('show');
                    $('#body-show_syllabus').html('');
                    $("#body-show_syllabus").html(responce);
                }
            });
        }
    
        // Action -> Get Course Modules
        function get_student_course_modules(course_id){
           $('#ass_course_tree').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
                type: "POST",
                data: { course_id:course_id },
                url:  "/associate/student_course_modules",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            }); 
        }

        // Action -> Get Course Group
        function get_student_course_groups(course_id,module_name){
           $('#ass_course_tree').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name:module_name
                },
                url:  "/associate/student_course_groups",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            }); 
        }

        // Action -> Get Course subjects
        function get_student_course_subjects(course_id,module_name,group_name){
           $('#ass_course_tree').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name: module_name,
                    group_name: group_name
                },
                url:  "/associate/student_course_subjects",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            }); 
        }

        // Action -> Get Course Subject Resources view
        function get_student_cmgs_resources(course_id,subject_name) {
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id, 
                    subject_name:subject_name 
                },
                url:  "/associate/student_cmgs_resources",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            });
        }

        // Action : Open Resources
        function open_subject_resources(course_id,subject_name) {
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { course_id:course_id, subject_name:subject_name },
                url:  "/associate/open_subject_resources",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            });
        }

        // Action : open Video file 
        function associate_open_video(course_id,module,group,subject,resource_id,resource_link) {
            // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name: module,
                    group_name: group, 
                    subject_name:subject, 
                    resource_id:resource_id,
                    resource_link:resource_link
                },
                url:  "/associate/open_video",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            });
        }

        // Action : Open Video and bind inside video view
        function associate_loadVideo(video_url, width, height) {
            var url,html;
            if(video_url != undefined && video_url != null && video_url != ""){
                var data = $.ajax({
                                // url : "/associate/embed?url="+escape(video_url),
                                url : "/associate/embed?url="+btoa(video_url), // base64 encode in client do base64 decode in server
                                type : "GET",
                                async : false
                            }).responseText;
                    data = $.parseJSON(data);
                    // console.log('video responce : '+data);
                    data.html = data.html.replace('http:','https:');
                    data.html = data.html.replace('feature=oembed', 'feature=oembed&rel=0');
                    html = data == undefined ? "NA" : data.html == undefined ? "NA" : data.html;

                if(width != undefined && height != undefined) {
                    if($(html).get(0).tagName == "IFRAME") {
                        html = $(html).attr("width", width+"%");
                        html = $(html).attr("height", height+"px");
                        html = $(html).addClass('embed-responsive-item');
                        html = $("<div/>").html($(html).clone());
                        html = $(html).html();
                    }
                }
                $('.video-player').html("");
                $('.video-player').html(html);
                // console.log(html);
                return html;
            } else {
                $('.video-player').html("");
                $('.video-player').html("NA");
                return "NA";
            }
        } 

        // Action : open pdf file 
        function associate_open_pdf(course_id,module,group,subject,resource_id,resource_link) {
            // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name: module,
                    group_name: group, 
                    subject_name:subject, 
                    resource_id:resource_id,
                    resource_link:resource_link
                },
                url:  "/associate/open_pdf",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                    //console.log(response);
                }
            });
        }

        // Action : Open test page
        function associate_open_test_page(course_id,module,group,subject,test_id,test_name) {
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id, 
                    module_name: module,
                    group_name: group,
                    subject_name: subject,
                    test_id:test_id, 
                    test_name: test_name 
                },
                url:"/associate/open_test_page",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                    var attempt_list = $("#attempt_list").dataTable();
                }
            });
        }

        // Action : Show Question Paper
        function associate_open_question_paper(course_id,subject_name,test_id,test_name){
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data:{
                    course_id: course_id,
                    subject_name: subject_name,
                    test_id: test_id,
                    test_name: test_name
                },
                url: "/associate/open_question_paper",
                updateContent: false, //this will not update content in .content
                complete:function(response){
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);

                }
            });
        }

        //Action: Show Answer Key
        function associate_show_answer_key(course_id,subject_name,test_id,test_name){
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data:{
                    course_id: course_id,
                    subject_name: subject_name,
                    test_id: test_id,
                    test_name: test_name
                },
                url: "/associate/show_answer_key",
                updateContent: false, //this will not update content in .content
                complete:function(response){
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);

                }
            });
        }

        // Action : open Associate side student Captiva file 
        function associate_open_captiva(course_id,module,group,subject,resource_id) {
            // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name: module,
                    group_name: group, 
                    subject_name:subject, 
                    resource_id:resource_id
                },
                url:  "/associate/open_captiva",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            });
        }

        // Action : open Associate side student Captiva file 
        function associate_open_captiva_quiz(course_id,module,group,subject,resource_id) {
            // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name: module,
                    group_name: group, 
                    subject_name:subject, 
                    resource_id:resource_id
                },
                url:  "/associate/open_captiva_quiz",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            });
        }

        // Associate : Student Course Module Group Subject Resource -------------ENDED--
    
/*-----------------------------------------------------------------------------------------------*/
/* Associate Course Activites Ended                                                                     */
/*-----------------------------------------------------------------------------------------------*/



/*===============================================================================================*/
/*| Associate Releated Functionalities                                   Ended                    |*/
/*===============================================================================================*/

    function offline_mode_payment(){
        var status = false;
        var coupon_code_id = document.getElementById('apply_couponcode');
        if(coupon_code_id!=undefined){
            status = document.getElementById('apply_couponcode').disabled;
        }
        var promo_code;
        if(status){
            promo_code = $('#coupon_code').val();
        }else{
            promo_code = null;
        }
        $.ajax({
            type:"POST",
            url :"/payment/offline_payment",
            data:{
                promo_code :promo_code
            },
            success: function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);

            }
        })
    }


/*===============================================================================================*/
/*| Student Releated Functionalities                                   Begin                    |*/
/*===============================================================================================*/

/*-----------------------------------------------------------------------------------------------*/
/* General Browser  Start                                                                       */
/*-----------------------------------------------------------------------------------------------*/
    
    // Action : Open Student Dash Board
    function open_student_dashboard() {
        $.ajax({
            type:"GET",
            url: "/student/dashboard/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }

    // Action : Open User Free Course DashBoard
    function open_user_free_course_dashboard() {
        $.ajax({
            type:"GET",
            url: "/student/free_course_dashboard/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }

    // Action : Open My Courses 
    function open_mycourses() {
        $.ajax({
            type:"POST",
            url: "/student/mycourses/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }

    // Action : See Batches 
    function get_course_batch(course_id) {
        $.ajax({
            type:"POST",
            url: "/student/get_course_batch/",
            data: { course_id:course_id },
            success:function(response) {
                $('#body-show_batches').html("");
                $('#body-show_batches').html(response);
                // console.log('available batches '+response);
            }
        });
    }

    // Action : See Course Details On Click of Available Course
    function get_course_details(course_id) {
        $.ajax({
            type:"POST",
            url: "/student/get_course_details/",
            data: { course_id:course_id },
            success:function(response) {
                // $('#course_details_modal').modal('show');
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
                //console.log('POST: Course Details'+response);
            }
        });
    }

    // Action : JOIN Course Throught Off Line 
    function join_this_free_course(course_id,course_fee,course_name){
        $.ajax({
            type: "POST",
            url:  "/student/join_free_course/",
            data: { course_id:course_id, course_fee:course_fee, course_name: course_name },
            success: function(response) {
                console.log('Free Course Subscribe LOG :'+response);
                $("#course_details_modal").modal('hide');
                if(response) {
                    alert("Thank you for joining Course");
                    open_user_free_course_dashboard();
                } else {
                    alert("Some thing went wrong in joining course pleaes try again !");
                }
            }
        }).fail(function(err) {
            console.log( err);
        });
    }

    // Action : Join Free Course Off Line

    /*

    function offline_payment(){
        if($('#offline_pay').valid()){
            var transaction_number = $('#challan_no').val();
            var bank_name = $('#bank_name').val();
            var amount_paid = $('#amount').val();
            var paid_date = $('#pay_date').val();
            // Footer
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                // url:  "/associate/bulk_user_registration",
                url:  "/payment/offline_payment_transaction",
                updateContent: false, //this will not update content in .content
                data:{
                    transaction_number: transaction_number,
                    bank_name:bank_name,
                    amount_paid:amount_paid,
                    paid_date:paid_date
                },
                complete:function(response) {
                    console.log(response);
                    if(response){
                        window.location.reload('/');
                    }
                }
            });
        }
    }

    */

    // Action : See Batches 
    function get_course_batch(course_id) {
        $.ajax({
            type:"POST",
            url: "/student/get_course_batch/",
            data: { course_id:course_id },
            success:function(response) {
                $('#course_batch_modal').modal('show');
                $('#body-show_batches').html("");
                $('#body-show_batches').html(response);
                console.log('available batches '+response);
            }
        });
    }

    // Action : Subscribe Course 
    function subscribe_course(batch_id,course_id) {
        $.ajax({
            type: "POST",
            url:  "/student/subscribe_course/",
            data: { batch_id:batch_id, course_id:course_id },
            success: function(response) {
                console.log('Batch Subscribe LOG :'+response);
                $("#course_batch_modal").modal('hide');
                if(response) {
                    alert("Thank you for joining Course");
                    open_student_dashboard();
                } else {
                    alert("Some thing went wrong in joining course pleaes try again !");
                }
            }
        }).fail(function(err) {
            console.log( err);
        });
    }

    // Action : Get Available AOI Courses Based on AOI
    function get_available_aoi_courses(area_of_interest){
        $('#availavle_aoi_courses').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                area_of_interest:area_of_interest
            },
            url:  "/student/available_aoi_courses",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#avail_aoi_btn").html('');
                $('#avail_aoi_btn').html(" "+area_of_interest+" <span class='caret'></span>");
                $("#availavle_aoi_courses").html("");
                $("#availavle_aoi_courses").html(response);
            }
        }); 
    }

    // Action : Get Paid AOI Courses Based on AOI
    function get_paid_aoi_courses(area_of_interest){
        $('#paid_aoi_courses').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                area_of_interest:area_of_interest
            },
            url:  "/student/paid_aoi_courses",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_aoi_btn").html('');
                $('#paid_aoi_btn').html(" "+area_of_interest+" <span class='caret'></span>");
                $("#paid_aoi_courses").html("");
                $("#paid_aoi_courses").html(response);
            }
        }); 
    }

    // Action : Get MY Paid AOI Courses Based on AOI
    function get_my_paid_aoi_courses(area_of_interest){
        $('#my_paid_aoi_courses').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                area_of_interest:area_of_interest
            },
            url:  "/student/paid_aoi_courses",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#my_paid_aoi_btn").html('');
                $('#my_paid_aoi_btn').html(" "+area_of_interest+" <span class='caret'></span>");
                $("#my_paid_aoi_courses").html("");
                $("#my_paid_aoi_courses").html(response);
            }
        }); 
    }

    // Action : Get Course Menu 
    function get_course_menu(course_id) {
        $.ajax({
            type: "POST",
            url: "/student/course_tree",
            data: { course_id:course_id },
            success: function (response) {
                $("#course_tree").html("");
                $("#course_tree").html(response);
                $(".sidebar .treeview").tree();
            },
            statusCode: {
                404: function() {
                    alert( "page not found" );
                }
            }
        });
    }

    // Resource Browser Started----------------------------------------------------------
        // Action -> Get Show Syllabus
        function show_student_syllabus(course_id,file_name) {
            $.ajax({
                type: "POST",
                url: "/student/view_course_syllabus",
                data:{
                    course_id:course_id,
                    file_name: file_name
                },
                success: function (responce){
                    $('#show_syllabus_modal').modal('show');
                    $('#body-show_syllabus').html('');
                    $("#body-show_syllabus").html(responce);
                }
            });
        }

        // Action -> Get Show Syllabus
        function show_course_syllabus(course_id) {
            $.ajax({
                type: "POST",
                url: "/student/view_course_syllabus",
                data:{ course_id:course_id },
                success: function (responce){
                    $('#show_course_syllabus_modal').modal('show');
                    $('#body-show_course_syllabus').html('');
                    $("#body-show_course_syllabus").html(responce);
                }
            });
        }

        // Action -> Get Course Modules
        function get_course_modules(course_id){
           $('#course_tree').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
                type: "POST",
                data: { course_id:course_id },
                url:  "/student/course_modules",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            }); 
        }

        // Action -> Get Course Group
        function get_course_groups(course_id,module_name){
           $('#course_tree').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name:module_name
                },
                url:  "/student/course_groups",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            }); 
        }

        // Action -> Get Course subjects
        function get_course_subjects(course_id,module_name,group_name){
           $('#course_tree').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
                type: "POST",
                data: { 
                    course_id:course_id,
                    module_name: module_name,
                    group_name: group_name
                },
                url:  "/student/course_subjects",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            }); 
        }

        // Action -> Get Course Subject Resources view
        function get_cmgs_resources(course_id,subject_name) {
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                data: { 
                    course_id:course_id, 
                    subject_name:subject_name 
                },
                url:  "/student/cmgs_resources",
                updateContent: false, //this will not update content in .content
                complete:function(response) {
                    $("#right-side-content").html("");
                    $("#right-side-content").html(response);
                }
            });
        }


    // Resource Browser EndCode--------------------------------------------------------------

    function get_course_subjects_grid(course_id) {
        $('#course_tree').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader1.gif',
            type: "POST",
            data: { course_id:course_id },
            url:  "/student/course_subjects_grid",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    // Action : Open Resources
    function open_resources(course_id,subject_name) {
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { course_id:course_id, subject_name:subject_name },
            url:  "/student/subject_resources",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    /***************************  Begin Open PDF Page Function  **********************************************/
    function pdf_page(element,page_number){
        return document.getElementById(element).contentWindow.PDFView.page = page_number;
    }
    /***************************  Ended Open PDF Page Function  **********************************************/

    // Action : open pdf file 
    function open_pdf(course_id,module,group,subject,resource_id,resource_link) {
        // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                course_id:course_id,
                module_name: module,
                group_name: group, 
                subject_name:subject, 
                resource_id:resource_id,
                resource_link:resource_link
            },
            url:  "/student/open_pdf",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
                //console.log(response);
            }
        });
    }

    // Action : open Video file 
    function open_video(course_id,module,group,subject,resource_id,resource_link) {
        // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                course_id:course_id,
                module_name: module,
                group_name: group, 
                subject_name:subject, 
                resource_id:resource_id,
                resource_link:resource_link
            },
            url:  "/student/open_video",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    // Action : open captiva file 
    function open_captiva(course_id,module,group,subject,resource_id) {
        // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                course_id:course_id,
                module_name: module,
                group_name: group, 
                subject_name:subject, 
                resource_id:resource_id
            },
            url:  "/student/open_captiva",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    // Action : open captiva file 
    function open_captiva_quiz(course_id,module,group,subject,resource_id) {
        // alert("Course ID: "+course_id+"Sub Name: "+subject_name+"RES ID: "+resource_id+"RES Link: "+resource_link);
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                course_id:course_id,
                module_name: module,
                group_name: group, 
                subject_name:subject, 
                resource_id:resource_id
            },
            url:  "/student/open_captiva_quiz",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    // Action : Open Resource File Fix it later
    function open_resource_file(course_id,subject_name,resource_id) {
    //    alert("CID: "+course_id+" SUB NAME: "+subject_name+" RES_ID: "+resource_id);
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { course_id:course_id, subject_name:subject_name },
            url:  "/student/subject_resources",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    // Action : Open Video and bind inside video view
    function loadVideo(video_url, width, height) {
        var url,html;
        if(video_url != undefined && video_url != null && video_url != ""){
            var data = $.ajax({
                            // url : "/embed?url="+escape(video_url),
                            url : "/embed?url="+btoa(video_url), // base 64 encoded in client do decode in php server
                            type : "GET",
                            async : false
                        }).responseText;
                data = $.parseJSON(data);
                // console.log('video responce : '+data);
                data.html = data.html.replace('http:','https:');
                data.html = data.html.replace('feature=oembed', 'feature=oembed&rel=0');
                html = data == undefined ? "NA" : data.html == undefined ? "NA" : data.html;

            if(width != undefined && height != undefined) {
                if($(html).get(0).tagName == "IFRAME") {
                    html = $(html).attr("width", width+"%");
                    html = $(html).attr("height", height+"px");
                    html = $(html).addClass('embed-responsive-item');
                    html = $("<div/>").html($(html).clone());
                    html = $(html).html();
                }
            }
            $('.video-player').html("");
            $('.video-player').html(html);
            // console.log(html);
            return html;
        } else {
            $('.video-player').html("");
            $('.video-player').html("NA");
            return "NA";
        }
    } 


//Action: open assessment page in resource view

  // Action : Open test page
    function open_test_page(course_id,module,group,subject,test_id,test_name) {
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data: { 
                course_id:course_id, 
                module_name: module,
                group_name: group,
                subject_name: subject,
                test_id:test_id, 
                test_name: test_name 
            },
            url:"/student/open_test_page",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
                var attempt_list = $("#attempt_list").dataTable();
            }
        });
    }

    //Action: Start test page
    function start_test_page(course_id,subject_name,test_id,test_name){
        /*
        // $('#start_test_page').modal('show');
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            cache:false,
            data:{
                course_id: course_id,
                subject_name: subject_name,
                test_id: test_id,
                test_name: test_name
            },
            url: "student/start_test_page",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                // $("#right-side-content").html("");
                // $("#right-side-content").html(response);
                // $("#body-start_test_page").html('');
                // $("#body-start_test_page").html('<section class="content hidden-xs"><h4>'+test_name+'</h4></section><iframe id="test_page_frame" src="/student/start_test_page" width="100%;"></iframe>');
            }
        });
        */
        $("#body-start_test_page").html('');
        $("#body-start_test_page").html('<iframe id="test_page_frame" src="/student/start_test_page" style=" height:450px; width:100%;"></iframe>');
    }

    // Submint Test And Close
    function submit_close_test(course_id,module,group,subject,test_id,test_name){
        document.getElementById('test_page_frame').contentWindow.general_submit();
        $('#start_test_page').modal('hide');
        // This lines are moved to Open Test Page
        // setTimeout(function() { 
        //     $('#body-start_test_page').html('');
        //     open_test_page(course_id,module,group,subject,test_id,test_name);
        // }, 500);
        
    }

    //Action: View  test attempts
    function view_test_attempts(course_id,subject_name,test_id,test_name,attempt_id){
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data:{
                course_id: course_id,
                subject_name: subject_name,
                test_id: test_id,
                test_name: test_name,
                attempt_id: attempt_id
            },
            url: "student/view_test_attempts",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                $("#right-side-content").html("");
                $("#right-side-content").html(response);

            }
        });
    }

    //Action: Show Answer Key
    function show_answer_key(course_id,subject_name,test_id,test_name){
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            data:{
                course_id: course_id,
                subject_name: subject_name,
                test_id: test_id,
                test_name: test_name
            },
            url: "student/show_answer_key",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
            }
        });
    }

    function assessment_result_reports(){
        $('#reports_error').text('');
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url: "reports/assessment_results",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
                $('#batch_level_results').hide();
                $('#tab_batch_level').removeClass('active');
                $('#tab_national_level').addClass('active');
            }
        });
    }

    function new_assessment_result_reports(){
        // $('#reports_error').text('');
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url: "reports/new_assessment_results",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
                setTimeout(function() { all_student_test_reports(); },500);
                // $('#batch_level_results').hide();
                // $('#tab_batch_level').removeClass('active');
                // $('#tab_national_level').addClass('active');
            }
        });
    }

    function all_student_test_reports() {
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url: "reports/all_student_test_reports",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                $("#all_student_test_reports").html("");
                $("#all_student_test_reports").html(response);
                // $('#batch_level_results').hide();
                // $('#tab_batch_level').removeClass('active');
                // $('#tab_national_level').addClass('active');
            }
        });
    }

    function batch_level_results(){
        $('#right-side-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image:'/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url: "reports/batchwise_assessment_results",
            updateContent: false, //this will not update content in .content
            complete:function(response){
                $("#right-side-content").html("");
                $("#right-side-content").html(response);
                
                $('#tab_national_level').removeClass('active');
                $('#tab_batch_level').addClass('active');
                $('#national_level_results').hide();
            }
        });    
    }

    function assessment_selected(test_no){
        var course_id = $('#course_id').val();
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/get_assessment_ranks",
            data:{
                test_no:test_no,
                course_id:course_id,
            },
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#national_student_results").html("");
                $("#national_student_results").html(response);
                $('#batch_level_results').hide();
                // console.log("I got response as "+response);
                var rank_list = $("#rank_list").dataTable();
            }
        });
    }
    
    function batch_assessment_selected(test_no){
            var course_id = $('#batch_course_id').val();
            var batch_name  = $('#batch_name').val();
            if(batch_name == ''){
                $('#reports_error').text('Please select the Batch name');
            }
            if(course_id == ''){
                $('#reports_error').text('PLease select the Course name');
            }

            if(batch_name !='' && course_id !='')
            {
                $('#reports_error').text('');
                $('.tab-content').oLoader({
                    wholeWindow: true, //makes the loader fit the window size
                    lockOverflow: true, //disable scrollbar on body
                    backgroundColor: '#000',
                    fadeLevel: 0.4,
                    image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                    type: "POST",
                    url:  "/reports/batchwise_assessment_ranks",
                    data:{
                        test_no:test_no,
                        course_id:course_id,
                        batch_name:batch_name
                    },
                    updateContent: false, //this will not update content in .content
                    complete:function(response) {
                        $("#batch_student_results").html("");
                        $("#batch_student_results").html(response);
                        $('#national_level_results').hide();
                        // console.log("I got response as "+response);
                        var rank_list = $("#rank_list").dataTable();
                    }
                });
            }
            // else{
            //     alert('Please select appropriate Batch name and Course name ')
            // }
    }

    function batch_name_changed(){
        
        var course_id   = $('#batch_course_id').val();
        var test_no     = $('#test_no').val();
        $("#batch_student_results").html("");
        if(course_id == ''){
            $('#reports_error').text('Please select the Course name')
        }
        if(test_no == ''){
            $('#reports_error').text('Please select the Test name')
        }
        if(course_id!='' && test_no!=''){
            batch_assessment_selected(test_no)
        }
    }

    function my_child_rank(test_no){
        
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/parent/student_assessment_rank",
            data:{'test_no':test_no},
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#student_results").html("");
                $("#student_results").html(response);
                // console.log("I got response as "+response);
                var in_rank_list = $("#in_rank_list").dataTable();
                var na_rank_list = $("#na_rank_list").dataTable();
                var st_rank_list = $("#st_rank_list").dataTable();
            }
        });
    }


    function get_all_course_tests(course_id,level){
        
        if(level == 'national_level'){
            $.ajax({
                type:"POST",
                url: "/reports/get_all_course_tests",
                data:{
                    course_id:course_id,
                    level:level
                },
                success:function(response) {
                    $("#national_course_tests").html("");
                    $("#national_student_results").html("");
                    $("#national_course_tests").html(response);
                }
            });
        }else{
            $('#reports_error').text('');
            $.ajax({
                type:"POST",
                url: "/reports/get_all_course_tests",
                data:{
                    course_id:course_id,
                    level:level
                },
                success:function(response) {
                    $("#batch_course_tests").html("");
                    $("#batch_student_results").html("");
                    $("#batch_course_tests").html(response);
                }
            });
        }
    }

/*-----------------------------------------------------------------------------------------------*/
/* General Browser  Ended                                                                       */
/*-----------------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------------------*/
/* Student Reports Started                                                                       */
/*-----------------------------------------------------------------------------------------------*/

    function open_myreports(){
        $.ajax({
                type:"POST",
                url: "/student/report_dashboard",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
        });
    }


    function get_mycourses(){    
        $.ajax({
                type:"POST",
                url: "/student/my_courses",
                success:function(response) {
                    $("#my_course_names").html("");
                    $("#my_course_names").html(response);
                }
        });
    }


    function get_my_tests(course_id){
        $.ajax({
                type:"POST",
                url: "/student/my_tests",
                data:{course_id:course_id},
                success:function(response) {
                    $("#my_test_names").html("");
                    $("#student_results").html("");
                    $("#my_test_names").html(response);
                }
        });
    } 

    // on select course in student dashboard 
    function get_subject_for_chart(course_id){
        $.ajax({
                type: "POST",
                url:"/student/subject_for_chart",
                data:{course_id:course_id},
                success:function(response){
                    $("#load_subjects").html("");    
                    $("#load_subjects").html(response);    
                }
        });
    }

    // on select subject ploting the graph
    function load_subject_score_graph(subject_name){
        var course_id = $('#course_id').val();
        $.ajax({
                type:"POST",
                url:"/student/load_subject_score_graph",
                data:{
                    subject_name:subject_name,
                    course_id : course_id
                },
                success:function(response){
                    $("#student_graph_result").html("");
                    $("#student_graph_result").html(response);
                }
        });
    }

    function my_rank(test_no){
        var course_id = $('#course_id').val();
        $.ajax({
                type:"POST",
                url: "/student/my_rank",
                data:{
                    test_no:test_no,
                    course_id:course_id
                },
                success:function(response) {
                    $("#student_results").html("");
                    $("#student_results").html(response);
                }
        });    
    }  



/*-----------------------------------------------------------------------------------------------*/
/* Student Reports Started                                                                       */
/*-----------------------------------------------------------------------------------------------*/

/*===============================================================================================*/
/*| Student Releated Functionalities                                   Ended                    |*/
/*===============================================================================================*/




/*===============================================================================================*/
/*| Parent Releated Functionalities                                   Begin                    |*/
/*===============================================================================================*/

/*-----------------------------------------------------------------------------------------------*/
/* General Browser  Start                                                                       */
/*-----------------------------------------------------------------------------------------------*/
    // Action : Open Parent Dash Board
    function open_parent_dashboard() {
            $.ajax({
                    type:"GET",
                    url: "/parent/dashboard/",
                    success:function(response) {
                        $('#right-side-content').html("");
                        $('#right-side-content').html(response);
                    }
            });
    }
    
    // Action : view childs test details
    function open_spoc_user_details(user_id,registration_no) {
        var reg = /(TEMP)/g;
        if(!registration_no.match(reg)){
            $.ajax({
                    type:"POST",
                    data:{user_id:user_id},
                    url: "/associate/sopc_user_details",
                    // url: "/parent/parent_child_details",
                    success:function(response) {
                        $('#right-side-content').html("");
                        $('#right-side-content').html(response);
                    }
            });
        }else{
            alert("Your Child Email id is not yet verified!");
        }

    }

    function get_mycourses_list(area_of_int){    
        $.ajax({
                type:"POST",
                url: "/student/my_courses_list",
                data: {area_of_int : area_of_int},
                success:function(response) {
                    $("#course_list1").html("");
                    $("#course_list1").html(response);
                }
        });
    }

    // Action -> Get All spoc get_my_child_details() replaced 
    function get_my_user_details(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/associate/spoc_user_details_list",
            // url:  "/parent/parent_child_details_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#parents").html("");
                $("#parents").html(response);
                var table = $("#parents_list").dataTable();
            }
        });
    }

    // Action : no of childs of a parents 
    function child_of_parents(){  // this is over dont tuch it
        $.ajax({
                type:"POST",                                               
                url:"/parent/child_of_parents",
                // url:"/associate/user_of_SPOC",
                success:function(response) {
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(response);
                }           
        });            
    }

// trile starts here ..................

     // Action -> Get my users in SPOC menu
    function get_my_user(){
        $.ajax({
            type:"POST",
            url:"associate/get_my_user",
            success:function(response){
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                // var table = $('#student_batchwise').dataTable();
                    // var table = $("#student_course_link").dataTable();
            }
        });
    }

//  trile ends here ....................

    function get_students_test(course_id) {
        $.ajax({
                type:"POST",
                data:{course_id:course_id},
                url: "/parent/get_students_test",
                success:function(response) {
                    $('#test_names').html("");
                    $('#test_names').html(response);
                }
        });
    }

/*-----------------------------------------------------------------------------------------------*/
/* General Browser  Ended                                                                       */
/*-----------------------------------------------------------------------------------------------*/

/*===============================================================================================*/
/*| Parent Releated Functionalities                                   Ended                    |*/
/*===============================================================================================*/


    

/*===============================================================================================*/
/*| Accountant Releated Functionalities                                   Begin                    |*/
/*===============================================================================================*/

/*-----------------------------------------------------------------------------------------------*/
/* General Browser  Start                                                                       */
/*-----------------------------------------------------------------------------------------------*/
    // Action : Open Accountant Dash Board
    function open_accountant_dashboard() {
            $.ajax({
                    type:"GET",
                    url: "/accountant/dashboard/",
                    success:function(response) {
                        $('#right-side-content').html("");
                        $('#right-side-content').html(response);
                    }
            });
    }

    // Action : Open Accountant manage offline
    function open_accountant_offline_payment() {
            $.ajax({
                    type:"GET",
                    url: "/accountant/offline_payment",
                    success:function(response) {
                        $('#right-side-content').html("");
                        $('#right-side-content').html(response);
                    }
            });
    }

    // get all offline payments of user
    function get_all_offline_payment(){
        $('.tab-content').oLoader({
            wholeWindow: true,
            lockOverflow: true,
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/accountant/offline_payment_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#students").html("");
                $("#students").html(response);
                var table = $("#offline_list").dataTable();
            }
        });
    }

    // get all not verified offline payments of user
    function get_not_verified_offline_payment(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/accountant/offline_not_verified_payment_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#students").html("");
                $("#students").html(response);
                var table = $("#not_verified_offline_list").dataTable();
            }
        });
    }

    // make  it as paid for transaction_id in accoutant 
    function do_paid(transaction_id,payment_status,user_id,transaction_description) {
        if (confirm('Are you sure you want to Approve this payment?')){ 
            console.log("true"); 
            $.ajax({
                    type: "POST",
                    url: "/accoutant/do_paid",
                    data: { 
                        transaction_id: transaction_id,
                        payment_status: payment_status,
                        user_id: user_id,
                        transaction_description: transaction_description 
                    },
                    success: function(responce) {
                        // call model and close
                        console.log("Transction ID:"+transaction_id+" Payment status "+payment_status+" paid Successfully");
                        get_not_verified_offline_payment();
                    }
            });
        }
    }
    // Action : Open Scholarship Management
    function open_applied_scholarships(){
        $.ajax({
                type:"POST",
                url:"registrar/scholarship_dashboard",
                success:function(response){
                    // console.log('response is '+response);
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
        });
    }
    // Action : Get Not Verified Scholarship Students
    function get_not_verified_scholarships(){
        $.ajax({
                type:"POST",
                url:"registrar/not_verified_scholarships",
                success:function(response){
                    $('#students').html("");
                    $('#not_verified_students').html("");
                    $('#not_verified_students').html(response);
                    var table = $('#scholarship_not_verified_students').dataTable();
                }
        });
    }
    // Action: Get All Scholarships Students List
    function get_all_scholarships(){
        $.ajax({
                type:"POST",
                url:"registrar/all_scholarships",
                success:function(response){
                    $('#not_verified_students').html("");
                    $('#students').html("");
                    $('#students').html(response);
                    var table = $('#all_scholarship_students').dataTable();
                }
        });
    }

    // Action : Open SPOC Quotes Management
    function open_spoc_quotes_dashboard(){
        $.ajax({
                type:"POST",
                url:"registrar/spoc_quote_dashboard",
                success:function(response){
                    // console.log('response is '+response);
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
        });
    }

    // Action : Get Not Verified SPOC Quotes
    function get_not_verified_spoc_quotes(){
        $.ajax({
                type:"POST",
                url:"registrar/not_verified_spoc_quote",
                success:function(response){
                    $('#students').html("");
                    $('#not_verified_students').html("");
                    $('#not_verified_students').html(response);
                    var table = $('#scholarship_not_verified_students').dataTable();
                }
        });
    }

    // Action: Get All SPOC Quotes List
    function get_all_spoc_quotes(){
        $.ajax({
                type:"POST",
                url:"registrar/all_spoc_quote",
                success:function(response){
                    $('#not_verified_students').html("");
                    $('#students').html("");
                    $('#students').html(response);
                    var table = $('#all_scholarship_students').dataTable();
                }
        });
    }

    // Action Delete SPOC Quote
    function delete_spoc_quote(user_id,quote_id,subject_name){

        if(confirm("Do you want to delete the request ?")){ 
            $.ajax({
                type:"POST",
                url:"registrar/delete_spoc_quote",
                data:{
                    user_id     :user_id,
                    quote_id    :quote_id,
                    subject_name: subject_name
                },success:function(response){
                    get_all_spoc_quotes();
                }
            });
        }
    }

/*-----------------------------------------------------------------------------------------------*/
/* General Browser  Ended                                                                       */
/*-----------------------------------------------------------------------------------------------*/

/*===============================================================================================*/
/*| Accountant Releated Functionalities                                   Ended                    |*/
/*===============================================================================================*/


/*===============================================================================================*/
/*| Coupon Code Related Functionalities Started                    |*/
/*===============================================================================================*/ 
   
    function coupon_code_dashboard(){
        $.ajax({
                type: "GET",
                url: "/coupon/coupon_code_dashboard",
                success : function(response){
                    $("#right-side-content").html("");
                    $('#right-side-content').html(response);
                }
        });
    }

    function generate_coupon_code(){
        $.ajax({
                type: "GET",
                url: "/coupon/generate_coupon",
                success : function(response){
                    $("#coupon_code_list").hide();
                    $("#coupon_code_generation").html("");
                    $('#coupon_code_generation').html(response);   
                    $("#coupon_code_generation").show();
                }
        });
    }

    function generate_couponcodes(){
        if($('#couponcode_GenerationFrom').valid()){
            var no_of_coupons   = $('#no_of_coupons').val();
            var discount_amount = $('#discount_amount').val();
            var valid_till      = $('#valid_till').val();
            $.ajax({
                type: "POST",
                url: "/coupon/generate_coupon",
                data:{
                    no_of_coupons   : no_of_coupons,
                    discount_amount : discount_amount,
                    valid_till      : valid_till,
                },
                success : function(response){
                    get_couponcodes();
                }
            });            
        }
    }

    function get_couponcodes(){        
        $.ajax({
            type: "POST",
            url:  "/coupon/coupon_code_view",
            success : function(response){
                
                $("#coupon_code_generation").hide();
                $("#coupon_code_list").show();
                $('#coupon_code_list').addClass('active');
                $('#tab_coupon_code_generation').removeClass('active');
                $('#tab_coupon_code_list').addClass('active');
                $("#coupon_code_list").html("");
                $("#coupon_code_list").html(response);
                $("#all_coupon_codes").dataTable();
            }
        });
    }

    function get_coupon_code_list(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/coupon/coupon_code_view",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#coupon_code_generation").hide();
                $("#coupon_code_list").show();
                $("#coupon_code_list").html("");
                $("#coupon_code_list").html(response);
                $("#all_coupon_codes").dataTable();
            }
        });
    }
    
/*===============================================================================================*/
/*| Coupon Code Related Functionalities Ended                    |*/
/*===============================================================================================*/ 


/*===============================================================================================*/
/*| Payment Related Functionalities Started                    |*/
/*===============================================================================================*/    
    
    // If you wan to use this function please crate new function and copy and use it 
    function offline_payment(){
        if($('#offline_pay').valid()){
            var transaction_number = $('#challan_no').val();
            var bank_name = $('#bank_name').val();
            var amount_paid = $('#amount').val();
            var paid_date = $('#pay_date').val();
            // Footer
            $('#right-side-content').oLoader({
                wholeWindow: true, //makes the loader fit the window size
                lockOverflow: true, //disable scrollbar on body
                backgroundColor: '#000',
                fadeLevel: 0.4,
                image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
                type: "POST",
                // url:  "/associate/bulk_user_registration",
                url:  "/payment/offline_payment_transaction",
                updateContent: false, //this will not update content in .content
                data:{
                    transaction_number: transaction_number,
                    bank_name:bank_name,
                    amount_paid:amount_paid,
                    paid_date:paid_date
                },
                complete:function(response) {
                    console.log(response);
                    if(response){
                        window.location.reload('/');
                    }
                }
            });
        }
    }

    function enable_scholarship(){
        document.getElementById('apply_couponcode').disabled=true;
        document.getElementById('online_payment_button').disabled=true;
        document.getElementById('offline_payment_button').disabled=true;
        $.ajax({
            type:'POST',
            url : 'payment/apply_scholarship',
            success : function(response){
                if(response==true){
                    $("#scholarship_info").modal('show');
                }else if(response== 9){
                    $("#scholarship_inprocess").modal('show');
                }else if(response == 6 ){
                    document.getElementById('apply_couponcode').disabled=false;
                    document.getElementById('online_payment_button').disabled=false;
                    document.getElementById('offline_payment_button').disabled=false;
                    $("#scholorship_valid").modal('show');
                }else if(response == 7){
                    document.getElementById('apply_couponcode').disabled=false;
                    document.getElementById('online_payment_button').disabled=false;
                    document.getElementById('offline_payment_button').disabled=false;
                    $("#scholarship_invalid").modal('show');
                }
                    

            }
        });
    }

    function enable_coupon_code(){
        document.getElementById('enable_couponcode').disabled = true;
        var coupon_code_div = document.getElementById('coupon_code_div');
        coupon_code_div.style.visibility="visible";
    }

    function scholarship_pay_now(){
        document.getElementById('apply_couponcode').disabled=false;
        document.getElementById('online_payment_button').disabled=false;
        document.getElementById('offline_payment_button').disabled=false;
        // $("#scholarship_inprocess").modal('hide');
        return false;
    }

    function apply_coupon_code(){
        
        var coupon_code = $('#coupon_code').val();
        $.ajax({
            type:'POST',
            url : "payment/appply_coupon_code",
            data:{
                coupon_code:coupon_code
            },
            success : function(response){
                var length = response.length;
                if(length>1){
                    var coupon_code_details=response.split('-');
                    
                    var coupon_code = document.getElementById('coupon_code_text');
                    coupon_code.style.color="green";
                    // $('#coupon_code_text').setStyle('color:red;');
                    var text = "Successfully applied and you got Discount of Rs "+coupon_code_details[2]+"/-"
                    $('#sub_total').val(coupon_code_details[1]);
                    $('#total_amount').val(coupon_code_details[1]);
                    $('#coupon_code_text').text(text);

                    // $("#coupon_code_text").html(response);
                }else{
                    document.getElementById('apply_couponcode').disabled=false;
                    // $('#').disabled=false;
                    if(response == 7){
                        var coupon_code = document.getElementById('coupon_code_text');
                        coupon_code.style.color="red";
                        $('#coupon_code_text').text('Entered Promo Code is Invalid');
                    }else if(response == 2){
                        var coupon_code = document.getElementById('coupon_code_text');
                        coupon_code.style.color="red";
                        $('#coupon_code_text').text('Entered Promo Code is already used');
                    }else if(response == 5){
                        var coupon_code = document.getElementById('coupon_code_text');
                        coupon_code.style.color="red";
                        $('#coupon_code_text').text('Entered Promo Code is expired');
                    }
                }
            }
        });
    }



/*===============================================================================================*/
/*| Payment Related Functionalities Ended                    |*/
/*===============================================================================================*/

/*===============================================================================================*/
/*| Report Related Functionalities Started                    |*/
/*===============================================================================================*/

    function student_payment_report(){
        $.ajax({
            type: "POST",
            url: "/reports/student_dashboard",
            success : function(response){
                $("#right-side-content").html("");
                $('#right-side-content').html(response);
            }
        });
    }

    function paid_students(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/paid_students",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_students").html("");
                $("#unpaid_students").html("");
                $("#payment_not_verified_students").html("");
                $("#paid_students").html(response);
                var table = $("#student_list").dataTable();
            }
        });
    }

    function unpaid_students(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/unpaid_students",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_students").html("");
                $("#unpaid_students").html("");
                $("#payment_not_verified_students").html("");
                $("#unpaid_students").html(response);
                var table = $("#student_list").dataTable();
            }
        });
    }

    function payment_not_verified_students(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/payment_not_verified_students",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_students").html("");
                $("#unpaid_students").html("");
                $("#payment_not_verified_students").html("");
                $("#payment_not_verified_students").html(response);
                var table = $("#student_list").dataTable();
            }
        });
    }


    function associate_payment_report(){
         $.ajax({
            type: "POST",
            url: "/reports/associate_dashboard",
            success : function(response){
                $("#right-side-content").html("");
                $('#right-side-content').html(response);
            }
        });
    }

    function paid_associates(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/paid_associates",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_associates").html("");
                $("#unpaid_associates").html("");
                $("#payment_not_verified_associates").html("");
                $("#paid_associates").html(response);
                var table = $("#associate_list").dataTable();
            }
        });
    }

    function unpaid_associates(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/unpaid_associates",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_associates").html("");
                $("#unpaid_associates").html("");
                $("#payment_not_verified_associates").html("");
                $("#unpaid_associates").html(response);
                var table = $("#associate_list").dataTable();
            }
        });
    }

    function payment_not_verified_associates(){
        
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/payment_not_verified_associates",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#paid_associates").html("");
                $("#unpaid_associates").html("");
                $("#payment_not_verified_associates").html("");
                $("#payment_not_verified_associates").html(response);
                var table = $("#associate_list").dataTable();
            }
        });
    }

    function batch_student_report(){
        $.ajax({
            type: "POST",
            url: "/reports/batch_student_dashboard",
            success : function(response){
                $("#right-side-content").html("");
                $('#right-side-content').html(response);
            }
        });
    }

    function batchwise_students(batch_name){
        // alert(batch_name);
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/batchwise_students",
            data:{'batch_name':batch_name},
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#batchwise_students").html("");
                $("#batchwise_associates").html("");
                $("#batchwise_students").html(response);
                var table = $("#batchwise_list").dataTable();
            }
        });
    }


    function batchwise_associates(batch_name){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/reports/batchwise_associates",
            data:{'batch_name':batch_name},
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#batchwise_students").html("");
                $("#batchwise_associates").html("");
                $("#batchwise_associates").html(response);
                var table = $("#batchwise_list").dataTable();
            }
        });
    }


/*===============================================================================================*/
/*| Report Related Functionalities Ended                    |*/
/*===============================================================================================*/


/*===============================================================================================*/
/*| Admin Associate student linking  Functionalities Start   |*/
/*===============================================================================================*/

    // Action : open link unlink associate student page 
    function link_unlink_associate_student(){
        $.ajax({
            type:"POST",                                               
            url:"/admin/link_unlink/",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });
    }

    // ACTION : link associate tab
    function link_associate(){    
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/admin/link_student",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#link").html("");
                $("#link").html(response);
                $("#course_list").dataTable();
            }
        });
    }    

    // ACTION : unlink Asscociate tab
    function unlink_associate(){    
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/admin/unlink_student",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#unlink").html("");
                $("#unlink").html(response);
                $("#course_list").dataTable();
            }
        });
    }    

    // fetching student deatails in admin link unlink
    function load_student_associate_details() {
        if($('#linkstudent').valid()){
            var student_regno   = $('#linkstudent').find('#student_registration_no').val();
            var associate_regno = $('#linkstudent').find('#associate_registration_no').val();
            $.ajax({
                type: "POST",
                url : "/admin/load_student_name",
                data:{
                    student_registration_no : student_regno,
                    associate_registration_no: associate_regno
                },
                success:function (response){
                    $("#student_associate_link_details").html("");
                    $("#student_associate_link_details").html(response);
                }
            });
        }
    }

    // ACTION : perform linking of student and associate
    function link_student_associate(student_id,associate_id,batch_id){
        if(confirm('Do you want to link this user with this SPOC ?')){
            $.ajax({
                type:"POST",
                url:"/admin/link_student_associate",
                data:{
                       student_id:student_id,
                       associate_id:associate_id,
                       batch_id:batch_id
                     },
                success:function(response){
                    link_associate();
                    //$("#link_student").html("");
                    //$("#link_student").html(response);
                }
            });
        }        
    }

    // fetching student deatails in admin link unlink plese rename to load_student_associate_details()
    function load_student_name(registration_no) {
        $.ajax({
            type: "POST",
            url : "/admin/load_student_name",
            data:{registration_no:registration_no},
            success:function (response){
                $("#student_name").html("");
                $("#student_name").html(response);
            }
        });
    }

    // ACTION : fetching associate deatails in admin link-unlink    
    function load_associate_name(registration_no) {
        $.ajax({
            type: "POST",
            url : "/admin/load_associate_name",
            data:{registration_no:registration_no},
            success:function (response){
                $("#associate_name").html("");
                $("#associate_name").html(response);
            }
        });
    }

    // ACTION : Loading linked deatails of student with associate  
    function load_linked_student_details(){
        if($('#unlinkstudent').valid()){
            var registration_no = $('#unlinkstudent').find('#search_user_email').val();
            $.ajax({
                type: "POST",
                url: "/admin/load_linked_student_details",
                data:{registration_no:registration_no},
                success:function(response){        
                    $("#student_link_details").html("");
                    $("#student_link_details").html(response);
                }
            });      
        }
    }

    // Action : unlink Student with Associate 
    function unlink_student_associate(student_id,batch_id){
        if(confirm('Do you want to unlink this user from this SPOC for this courses ?')){
            $.ajax({
                type: "POST",
                url: "/admin/unlink_student_associate",
                data: { student_id: student_id, batch_id: batch_id },
                success:function(response){
                    // console.log('Student Unlinked '+response);
                    unlink_associate();
                    // $("#unlink_student").html("");
                    // $("#unlink_student").html(response);
                }
            });
        }
    }

/*===============================================================================================*/
/*| Admin Associate student linking  Functionalities Start   |*/
/*===============================================================================================*/



/*-----------------------------------------------------------------------------------------------*/
/*| Mentor SME Functionalities BEGIN   |*/
/*-----------------------------------------------------------------------------------------------*/
    
    // Action : open mentor content management
    function open_mentor_content_management() {
        $.ajax({
            type:"POST",                                               
            url:"/resource/mentor_content_management",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                get_mentor_resource_list();
            }           
        });
    }

    // Action : Get All Mentor Resource List
    function get_mentor_resource_list() {
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/resource/mentor_resource_view",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#mentor_resource").html("");
                $("#mentor_resource").html(response);
                var table = $("#mentor_resource_list").dataTable();
            }
        });
    }

    // Action : Get All Mentor Assessment List
    function get_mentor_assessment_list() {
        $('.tab-content').oLoader({
            wholeWindow:true, // makes the loader fit the window size
            lockOverflow: true, // disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: 'POST',
            url: '/resource/mentor_assessment_list',
            updateContent: false, // this will not update content in .content
            complete: function(response) {
                $('#mentor_assessment').html('');
                $('#mentor_assessment').html(response);
                var assessment_list = $('#mentor_assessment_list').dataTable();
            }
        });
    }

    // Action : Load Ajax Mentor PDF Upload Modal
    function ajax_mentor_pdf_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_mentor_pdf_modal",
            success: function (responce){
                $("#body-add_mentor_pdf").html("");
                $("#body-add_mentor_pdf").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action : Load Ajax Mentor PPT Upload Modal
    function ajax_mentor_ppt_modal() {
        console.log('ajax_mentor_pdf_modal is called');
        $.ajax({
            type: "GET",
            url: "/resource/ajax_mentor_ppt_modal",
            success: function (responce){
                $("#body-add_mentor_ppt").html("");
                $("#body-add_mentor_ppt").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action : Load Ajax Mentor video Upload Modal
    function ajax_mentor_video_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_mentor_video_modal",
            success: function (responce){
                $("#body-add_mentor_video").html("");
                $("#body-add_mentor_video").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action : Load Ajax Mentor Audio Upload Modal
    function ajax_mentor_audio_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_mentor_audio_modal",
            success: function (responce){
                $("#body-add_mentor_audio").html("");
                $("#body-add_mentor_audio").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

    // Action : Load Ajax Mentor Assessment Upload Model
    function ajax_mentor_assessment_modal() {
        $.ajax({
            type: "GET",
            url: "/resource/ajax_mentor_test_modal",
            success: function (responce){
                $("#body-add_mentor_assessment").html("");
                $("#body-add_mentor_assessment").html(responce);
                //console.log('Responce :'+responce);
           }
        });
    }

    // Action : Load Edit Mentor Assessment Modal
    function edit_mentor_assessment_modal(test_id){
        $.ajax({
            type:"POST",
            url:"/resource/edit_assessment_modal",
            data:{test_id: test_id},
            success: function (responce){
                $("#edit-mentor_assessment_modal").modal('show');
                $("#body-edit_mentor_assessment").html("");
                $("#body-edit_mentor_assessment").html(responce);
                // console.log('Responce :'+responce);
            }
        });
    }

    // Action : Update Mentor Assessment Data
    function update_mentor_assessment() {
        var test_subject        = $("#edit-mentor_assessment_modal").find('#edit_test_subject').val();
        var test_type           = $("#edit-mentor_assessment_modal").find('#edit_test_type').val();
        var test_name           = $("#edit-mentor_assessment_modal").find('#edit_test_name').val();
        var test_description    = $("#edit-mentor_assessment_modal").find('#edit_test_description').val();
        var no_of_questions     = $("#edit-mentor_assessment_modal").find('#edit_no_of_questions').val();
        var test_duration       = $("#edit-mentor_assessment_modal").find('#edit_test_duration').val();
        var test_date           = $("#edit-mentor_assessment_modal").find('#edit_test_date').val();
        var test_id             = $("#edit-mentor_assessment_modal").find('#edit_test_id').val();
        
        if($("#EditAssForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_assessment",
                data: { 
                    test_subject    : test_subject, 
                    test_type       : test_type,
                    test_name       : test_name,
                    test_description: test_description,
                    no_of_questions : no_of_questions,
                    test_duration   : test_duration,
                    test_date       : test_date,
                    test_id         : test_id
                },
                success:function(responce){
                    // console.log("I GOT this responce "+responce);
                    $("#edit-mentor_assessment_modal").modal('hide');
                    get_mentor_assessment_list();
                }
            });    
        }
    }

    // Action : Load Mentor Modal With AJAX edit resource Modal
    function edit_mentor_res_modal(res_id) {
        $.ajax({
            type: "POST",
            url: "/resource/edit_res_modal",
            data:{res_id:res_id},
            success: function (responce){
                $("#EditMentorResourceModal").modal('show');
                $("#body-edit_mentor_resource").html("");
                $("#body-edit_mentor_resource").html(responce);
                // console.log('Responce :'+responce);
            }
        });
    }

    // Action : Mentor Download File using RES_ID
    function download_mentor_resource(res_id){
        $.ajax({
            type: "GET",
            url : "/resource/mentor_download_file",
            data: {res_id:res_id}
            // success: function (argument) {
            //     // body...
            // }
        });
    }

    // Action : Update Mentor Resource Model
    function update_mentor_resource() {
        var resource_name   = $("#EditMentorResourceModal").find('#edit_resource_name').val();
        var resource_tag    = $("#EditMentorResourceModal").find('#edit_resource_tag').val();
        var resource_id     = $("#EditMentorResourceModal").find('#resource_id').val();   
        if($("#EditResForm").valid()) {
            $.ajax({
                type: "POST",
                url:  "/resource/update_resource",
                data: { 
                    resource_id: resource_id, 
                    resource_name:resource_name,  
                    resource_tag: resource_tag 
                },
                success:function(responce){
                    console.log("I GOT this responce "+responce);
                    $("#EditMentorResourceModal").modal('hide');
                    get_mentor_resource_list();
                }
            });    
        } 
    }

    // Action : Show SME Assessment TAB
    function show_sme_assessment_tab(){
        $.ajax({
            type:"POST",                                               
            url:"/resource/mentor_content_management",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
                $('.nav-tabs a[href="#mentor_assessment"]').tab('show');
                get_mentor_assessment_list();
            }           
        });
    }

/*-----------------------------------------------------------------------------------------------*/
/*| Mentor SME Functionalities ENDED   |*/
/*-----------------------------------------------------------------------------------------------*/


    // Action : Requesting for more License
    function request_license(urse_fname,registration_no,subject_name){
        $.ajax({
            type: "GET",
            url: "/associate/license_request",
            data: {
                    urse_fname : urse_fname,
                    registration_no : registration_no,
                    subject_name : subject_name
                },
            success:function (response) {
                $('#addLicense').modal('show');
                $('#request_license').html("");
                $('#request_license').html(response);
            }
        });
    }

    // Action : send email to admin for more license
    function send_license_request(){
        var mail_subject = $("#addLicense").find('#mail_subject').val();
        var mail_body    = $("#addLicense").find('#mail_body').val();
        var license      = $("#addLicense").find('#license_no').val();
        if ($("#addLicenseForm").valid()) {

            $.ajax({
                type: "POST",
                url: "/associate/send_license_request",
                data:{
                    mail_subject: mail_subject,
                    mail_body: mail_body,
                    license: license
                },
                success:function(response){
                    $("#addLicense").modal('hide');
                    alert("Your Request for License sent Successfully !"); 
                }
            });
        }
    }

    // Action -> Load Modal With AJAX edit resource Modal
    function edit_license_modal(quote_id,user_id,subject,old_license,old_cost) {
        // if ($("#grantLicenseForm").valid) {
            $.ajax({
                type: "POST",
                url: "/admin/grant_user_license",
                data:{
                    quote_id:quote_id,
                    user_id:user_id,
                    subject:subject,
                    old_license:old_license,
                    old_cost:old_cost
                },
                success: function (responce){
                    $("#grantLicense").modal('show');
                    $("#grant_license").html("");
                    $("#grant_license").html(responce);
                }
            });
        // }
    }

    // Action : Update no license count 
    function update_license_request(){
        var quote_id         = $("#quote_id").val();
        var user_id          = $('#user_id').val();
        var old_license      = $('#license_no').val();
        var old_cost         = $('#license_cost').val();
        var req_license      = $("#requested_license_count").val();
        var subject_name     = $('#subject').val();
        var req_license_cost = $("#req_license_cost").val();
        if ($("#grantLicenseForm").valid()) {
            $.ajax({
                type:"POST",
                url:"/admin/update_license_request",
                data:{
                    user_id          : user_id,
                    quote_id         : quote_id,
                    old_license      : old_license,
                    old_cost         : old_cost,
                    req_license      : req_license,
                    req_license_cost : req_license_cost,
                    subject_name     : subject_name
                },
                success: function (responce){
                    $("#grantLicense").modal('hide');
                    get_all_spoc_quotes();
                }
            });
        }
    }

/*-----------------------------------------------------------------------------------------------*/
/* Affilate Role Functionalities                                                                    */
/*-----------------------------------------------------------------------------------------------*/
    
    // Action -> open Affilate Dashboard
    function open_affilate_dashboard() {
        $.ajax({
            type:"GET",                                               
            url:"/affilate/dashboard/",
            success:function(response) {
                $('#right-side-content').html("");                     
                $('#right-side-content').html(response);
            }           
        });
    }

    // Action : open affilate user
    function open_affilate_user() {
        $.ajax({
            type:"GET",
            url: "/affilate/affilate_users_dashboard/",
            success:function(response) {
                $('#right-side-content').html("");
                $('#right-side-content').html(response);
            }
        });
    }

    // Action : Get All Affilate Users
    function get_all_affilate_users(){
        $('.tab-content').oLoader({
            wholeWindow: true, //makes the loader fit the window size
            lockOverflow: true, //disable scrollbar on body
            backgroundColor: '#000',
            fadeLevel: 0.4,
            image: '/static/js/jquery-oLoader/images/ownageLoader/loader4.gif',
            type: "POST",
            url:  "/affilate/affilate_users_list",
            updateContent: false, //this will not update content in .content
            complete:function(response) {
                $("#students").html("");
                $("#students").html(response);
                var table = $("#students_list").dataTable();
            }
        });
    }

    // Action -> Load Model With AJAX Add User By Affilate Role Modal
    function add_user_byaffilate_modal() {
        $.ajax({
            type: "POST",
            url: "/affilate/add_user",
            success: function (responce){
                $("#body-add_student").html("");
                $("#body-add_student").html(responce);
                //console.log('Responsce :'+responce);
            }
        });
    }

/*-----------------------------------------------------------------------------------------------*/