<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
<link rel="stylesheet" type="text/css" href="/static/css/common/jquery.dataTables.css">
<script type="text/javascript" src="/static/theme/js/plugins/datatables/jquery.dataTables.js"></script>

<style type="text/css">
  .datatable{ width: 99%; overflow: auto; }
  .data-table-holder { overflow-x: auto; }
  .dataTables_filter { display: none; } /* This code removes search box */
  .error {
    color: #b94a48;
    border-color: #b94a48;
    font-size: 12px;
    font-family: inherit;
    font-style: italic;
  }
</style>

<section class="content-header">
  <h3>
    <p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> - User's Bulk Enrollment</p>
  </h3>
</section>

<!-- Main content -->
<section class="content-header">
  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="panel-title">
        
        <div class="row">
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button id="add_row" data-toggle="modal" data-target="#addstudentModal" onClick="addstudentModal();" value="Add Row" name="Add Row" class="btn btn-info">Add User</button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button id="pay" onclick="user_bulk_enrole('pay');" style="display:none;margin-left: 12%;" class="btn btn-success">Submit</button>
          </div>
          <div class="col-xs-3 col-sm-1 col-md-1">
            <button id="cancel" onclick="delete_all_row();" style="display:none" class="btn btn-danger">Cancel</button> 
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button id="save" onclick="user_bulk_enrole('save');" style="display:none; margin-left:-10%;" class="btn btn-success">Save</button>
          </div>
        <!--   <div class="col-xs-6 col-sm-6 col-md-5 pull-right">
            <label class="pull-right"> Total Amount: <input type="text" style="width:50%;" id="res" readonly> ( &#x20B9; )</label> 
          </div> -->
        </div>
        
      </div>
    </div>
    <div class="panel-body">
      <!-- Validation -->
      <div class="row">
        <center>
          <div class="" id="error"><h4 style="color:#ff0000"></h4></div>
        </center>
      </div>
      <!-- DATA Table Tob loaded begin Here -->
      <form method="post" action="#" id="student_bulk_registration">
      <div class="data-table-holder">
        <table class="table table-striped table-advance table-hover dt-responsive" id="studenttable">
          <thead>
            <tr>   
              <th>First Name</th> 
              <th>Last Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Organization Name</th>
              <th>Address</th>
              <th>Course</th>               
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      </form>
      <!-- DATA Table Tob loaded Ended here -->
    </div>
  </div><!-- ./panel ended -->
</section>

<script type="text/javascript">
  // Global Variable Decleration :
  var id,table;
  var t=0;
  var r=0;
  var i;
  var Total = 0;
  // var this_course_length = 0;

    $(document).ready(function(){

        table = $('#studenttable').DataTable({
              "bPaginate": false,
              "bLengthChange": false,
              "bFilter": true,
              "bInfo": false,
              "bAutoWidth": true,
              "bResponsive": true
          });
        
        

        $.ajax({
            type: "POST",
            url: "/associate/students_tobe_registered",
            success: function (responce){
                if(responce !=""){
                  data =jQuery.parseJSON(responce);
                  var length = data.length;
                  var total = 0;
                  if (length > 0){
                    for(var i = 0; i < length; i++){

                      var select_course = data[i].user_courses;
                      var selected_course = select_course.split('#');
                      // console.log(selected_course);
                      var this_course_length = selected_course.length;
                      
                      // Action : loads all registered course
                      function course_list(){
                        var course_array = '';
                        for (var j=0; j<this_course_length; j++) {
                          var course_array = course_array+'<option value="'+selected_course[j]+'" selected>'+selected_course[j]+'</option>'
                          // course_list_return = course_list_return+'<option value="'+course_list[i]+'" selected>'+course_list[i]+'</option>'+',';
                        }
                        return course_array;
                      }


                      table.fnAddData([
                        '<input readonly style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" title="Should be only alphabet with min 3 char" name="fname_'+t+'" id="fname_'+t+'" value=\"'+data[i].first_name+'\">',
                        '<input readonly style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{0,20}$" title="Should be only alphabet with min 1 char" minlength="1" maxlength= "20" name="lname_'+t+'" id="lname_'+t+'" value=\"'+data[i].last_name+'\">',
                        '<input readonly style="width:100px;" type="tel"  required pattern="[0-9]{10,10}$" minlength="10" maxlength="10" title="Should be 10 digit mobile no"  name="mobile_'+t+'" id="mobile_'+t+'" value='+data[i].mobile+'>',
                        '<input readonly style="width:100px;" type="email" required name="email_'+t+'" id="email_'+t+'" onchange="check_email(id);" value='+data[i].email+'>',
                        '<input readonly style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" title="Should be only alphabet with min 3 char" name="parent_name_'+t+'" id="parent_name_'+t+'" value=\"'+data[i].parent_name+'\">',
                        '<input readonly style="width:100px;" type="text" required title="Should be minium 4 char" name="address_'+t+'" id="address_'+t+'" value=\"'+data[i].address+'\">',
                        '<select title="Select Course" id="course_'+t+'" name="course_'+t+'" size=3 multiple disabled>'+
                        course_list()
                        +'</select>',

                        <?php
                          // if(isset($course_details)){
                          //   foreach ($course_details as $subject) {
                          //     $course_name = $subject->course_name;
                          //     $course_fee = $subject->course_fee;
                          //     $course_string = $course_name."#".$course_fee;
                          //     $small_box = '<option value="'.$course_string.'">'.$course_name.'</option>';
                          //     echo "'".$small_box."'+";
                          //   }    
                          // }
                        ?>
                        // '<input style="width:100px;" type="text" name="cost_'+t+'" id="cost_'+t+'" maxlength="10" readonly value='+data[i].cost+'>',
                        '<center> <button type="button" id="delete_'+t+'" class="btn-sm btn-danger" onclick="delete_row(delete_'+t+','+t+')"><i class="glyphicon glyphicon-trash text-white"></i></button> <center>',
                        '<center> <button type="button" id="edit_'+t+'" name="edit_'+t+'" data-toggle="modal" data-target="#editstudentModal" onClick="editstudentModal('+t+');" class="btn-sm btn-info"><i class="glyphicon glyphicon-edit text-white"></i></button> </center>'
                      ]);
      
                    

                    t=t+1;
                    total = total+Number(data[i].cost);
                    } // end of for loop

                    // $('#res').val(Number(total));
                    // for(var i=0;i<length;i++){
                    //   var value=data[i].course;
                    //   // var value=data[i].course+"#"+data[i].cost+'.00';
                    //   $('#course_'+i).val(value);
                    // }

                    $('#pay').show();
                    $('#cancel').show();
                    $('#save').show();
                  } //end of if condition
                }
            } //end of ajax success 

        }); // end of ajax 
  }); // end of document ready

  // Add Row in DataTable 
  function addRow() {
    // Make pay cancle save visible
    $('#pay').show();
    $('#cancel').show();
    $('#save').show();
      
    // Adding row in dataTable check_email(id);
    table.fnAddData([
            '<input style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" title="Should be only alphabet with min 3 char" name="fname_'+t+'" id="fname_'+t+'" readonly>',
            '<input style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{0,20}$" title="Should be only alphabet with min 1 char" minlength="1" maxlength= "20"  name="lname_'+t+'" id="lname_'+t+'" readonly>',
            '<input style="width:100px;" type="tel"  required pattern="[0-9]{10,10}$" minlength="10" maxlength="10" title="Should be 10 digit mobile no"  name="mobile_'+t+'" id="mobile_'+t+'" readonly>',
            '<input style="width:100px;" type="email" required name="email_'+t+'" id="email_'+t+'" onchange="check_email(id);" readonly>',
            '<input style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" title="Should be only alphabet with min 3 char" name="parent_name_'+t+'" id="parent_name_'+t+'" readonly>',
            '<input style="width:100px;" type="text" required title="Should be minium 4 char" name="address_'+t+'" id="address_'+t+'" readonly>',
            '<input style="width:100px;" type="text" required title="Should be minium 4 char" name="course_'+t+'" id="course_'+t+'" readonly>',
            // '<select required title="Select Course" id="course_'+t+'" name="course_'+t+'" onchange="course_change('+t+')" size=3 multiple>'+ 
            <?php
              // if(isset($course_details)){
              //   foreach ($course_details as $subject) {
              //     $course_name = $subject->course_name;
              //     $course_fee = $subject->course_fee;
              //     $course_string = $course_name."#".$course_fee;
              //     $small_box = '<option value="'.$course_string.'">'.$course_name.'</option>';
              //     echo "'".$small_box."'+";
              //   }    
              // }
            ?>
            // '</select>',
            // '<input style="width:100px;" type="text" name="cost_'+t+'" id="cost_'+t+'" maxlength="10" readonly>',
            '<center> <button type="button" id="delete_'+t+'" class="btn-sm btn-danger" onclick="delete_row(delete_'+t+','+t+')"><i class="glyphicon glyphicon-trash text-white"></i></button> </center>',
            '<center> <button type="button" id="edit_'+t+'" data-toggle="modal" data-target="#editstudentModal" onClick="editstudentModal();" class="btn-sm btn-info"><i class="glyphicon glyphicon-edit text-white"></i></button> </center>'
    ]);
    var b = $('#res').val();  
    var c = $('#course_'+t).val();
    var z = Number(b)+Number(c);
    $("cost_"+t).val();     
    $("res").val();     
    t=t+1; // counter for each record
  }// add_row() ends here


  // Calculate Cost
  function calculation_cost(id){
    $.each( id, function( i, val ) {
        $( "#" + val ).text( "Mine is " + val + "." );
        var length=table.fnGetData().length;
        var Total=0;
        for (var i=0;i<length;i++){
          if (document.getElementById("cost_"+i)){
            var cost = document.getElementById("cost_"+i).value;
            Total = Number(Total)+Number(cost);
          }
        }
        
        $('#res').val(Total);
        return ( val !== "three" );
    });
  } // calculation_cost() ends here

  // Delete a Row in DataTable
  function delete_row(delete_id,id){
    if(window.confirm("Do you want to Delete ?")){
      if(table.fnGetData().length > 1){
        var row = delete_id.parentNode.parentNode;
        // console.log('row '+row);              
        var a = $('#cost_'+id).val();
        var b = $('#res').val();
        // table.fnDeleteRow(row);
        var this_row = $('#delete_'+id).closest('tr');
        var nRow     = this_row[0];
        $('#studenttable').dataTable().fnDeleteRow(nRow); 
        var sum = Number(b) - Number(a);
        $('#res').val(Number(sum));
        calculation_cost(id);
        $("#error h4").text(""); // clear validation text on ever delete ..
      } else {
        delete_all_row();
        $.ajax({
          type: "POST",
          url : "associate/delete_unpaid_students",
          success:function(response){
            console.log('Add Student Data Deleted : '+response);
          }
        });
      }
    }
  }// Delete row Ended Here

  // Check for Student Email exists or not 
  function check_email(id){
    var email = document.getElementById(id).value;       
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var count = 0;
    if (email==""){
      $("#error h4").text("Please enter Email!");
      $("#fname_").focus();
      return false;          
    }
    // for(i=0;i<t;i++){
    //   if(document.getElementById("email_"+i)){
    //     if(email == document.getElementById("email_"+i).value){
    //       count = count+1;
    //       if(count >1){
    //           $("#error h4").text(document.getElementById("email_"+i).value+" Email Address Already There in Data Table !");
    //           return false;       
    //       }
    //      }
    //    }      
    // }

    if(!(emailReg.test(email)) && email!=""){
      $("#error h4").text("Please enter valid email !");
      $("#email_").focus();
      return false;
    } else {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "/associate/checkEmail",
        data: { email:email },
          success:function(data){
            if (!data){
              $("#error h4").text("Email Already Registered !");
            } else {
              $("#error h4").text("");                                  
            }
          }
        });
      return true;
    } // if ends here 
  } // check_email ends here

  // Do Email validateion and  bring course while adding new student
  function check_email_bring_course(id){
    var email = document.getElementById(id).value;       
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var count = 0;
    if (email==""){
      $("#error h4").text("Please enter Email!");
      $("#fname_").focus();
      $('#course').html("");
      return false;          
    }
    // for(i=0;i<t;i++){
    //   if(document.getElementById("email_"+i)){
    //     if(email == document.getElementById("email_"+i).value){
    //       count = count+1;
    //       if(count >1){
    //           $("#error h4").text(document.getElementById("email_"+i).value+" Email Address Already There in Data Table !");
    //           return false;       
    //       }
    //      }
    //    }
    // }

    if(!(emailReg.test(email)) && email!=""){
      $("#error h4").text("Please enter valid email !");
      $("#email_").focus();
      return false;
    } else {
      // console.log(email);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "/associate/checkEmail",
        data: { email:email },
          success:function(data){
            if (!data){
              $("#error h4").text("Email Already Registered !");
              $('#course').html("");
              $('#course').html("<option disabled value=''>This is Not A Student !</option>");
              return false;
            } else {
              $("#error h4").text("");                                  
              $.ajax({
                type:"POST",
                url:"/associate/this_student_course",
                data: { user_email: email },
                success:function(response){
                  $('#course').html("");
                  $('#course').html(response);
                  // Updating in new place
                  // $('#course_'+id).html(response);
                  // $('#course_'+id).html(response);
                  // console.log(response);
                  return true;
                }
              })
            }
          }
        });
    } // if ends here 
  }

  // Do Email validateion and  bring course while updating student
  function update_email_bring_course(id){
    var email = document.getElementById(id).value;       
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var count = 0;
    if (email==""){
      $("#error h4").text("Please enter Email!");
      $("#fname_").focus();
      $('#course').html("");
      return false;          
    }
    // for(i=0;i<t;i++){
    //   if(document.getElementById("email_"+i)){
    //     if(email == document.getElementById("email_"+i).value){
    //       count = count+1;
    //       if(count >1){
    //           $("#error h4").text(document.getElementById("email_"+i).value+" Email Address Already There in Data Table !");
    //           return false;       
    //       }
    //      }
    //    }
    // }

    if(!(emailReg.test(email)) && email!=""){
      $("#error h4").text("Please enter valid email !");
      $("#email_").focus();
      return false;
    } else {
      console.log(email);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "/associate/checkEmail",
        data: { email:email },
          success:function(data){
            if (!data){
              $("#error h4").text("Email Already Registered !");
              $('#course').html("");
              $('#course').html("<option disabled value=''>This is Not A Student !</option>");
              return false;
            } else {
              $("#error h4").text("");                                  
              $.ajax({
                type:"POST",
                url:"associate/this_student_course",
                data: { user_email: email },
                success:function(response){
                  // console.log(response);
                  $('#update_course').html("");
                  $('#update_course').html(response);
                  // Updating in new place
                  // $('#course_'+id).html(response);
                  // $('#course_'+id).html(response);
                  // console.log(response);
                  return true;
                }
              })
            }
          }
        });
    } // if ends here 
  }

  // Generate Amount on course Selection
  function course_change(id){
    var Total = 0;
    for (var i=0;i<t;i++){
      if(document.getElementById("course_"+i)){
        if($('#course_'+i).val()!=null){
          var student_total = 0;      
          var courses = $('#course_'+i).val();
          var course_details = courses.split('#');
          student_total = Number(course_details[1]); 
          $('#cost_'+i).val(Number(student_total));
          Total = Total+student_total;
        }else{
            $('#cost_'+i).val(0);
        }
      }
    }
    $('#res').val(Number(Total));
  } // end of course_change()

  // Pay / Register Students 
  function student_bulk(to_be_done){
    if($('#student_bulk_registration').valid()){
      var student = []
      var student_count = 0;
      // var total_amount = $('#res').val();
      // Getting inputs 
      for(i=0; i<t; i++){

        // Getting individual inputs
        var fname       = $("#fname_"+i).val();
        var lname       = $("#lname_"+i).val();
        var mobile      = $("#mobile_"+i).val();
        var email       = $("#email_"+i).val();
        var parent_name = $("#parent_name_"+i).val();
        var address     = $("#address_"+i).val();
        var course      = $("#course_"+i).val();
        // var cost        = $("#cost_"+i).val();

        //Cross checking the email id once again
        if(document.getElementById("email_"+i)){
            var count = 0;
            // for( j = 0; j < t; j++){
            //   if(document.getElementById("email_"+j)){
            //     if(email == document.getElementById("email_"+j).value){
            //       count = count+1;
            //       if(count > 1){
            //           $("#error h4").text(document.getElementById("email_"+j).value+" Email Address Already There in Data Table !");
            //           return false;       
            //       }
            //     }
            //   }
            //}
            // console.log('email check counter of i:'+i);
            var course_name = course;
            student[student_count] = {}
            student[student_count]['fname'] = fname;
            student[student_count]['lname'] = lname;
            student[student_count]['mobile'] = mobile;
            student[student_count]['email'] = email;
            student[student_count]['parent_name'] = parent_name;
            student[student_count]['address'] = address;
            student[student_count]['course'] = course_name;
            // student[student_count]['cost'] = cost;
            student_count = student_count+1;
        }
      } // top for closed

      if(student_count > 0 ){
        // Saving in one JSON Format
        student_final = JSON.stringify(student);
        
        // Confirmation for Transcatoin
        if(confirm("Do you want to Submit ?")){
          $.ajax({
            type:"POST",
            url: "/associate/save_students_data",
            data:{
              student:student_final,
              no_of_students:student_count,
              to_be_done:to_be_done
            },
              // total_amount:total_amount,
            success: function(response){                                               
              $('#right-side-content').html('');
              $('#right-side-content').html(response);
            }
          }).done(function(msg){
              if(msg == "done"){
                $("#pay").hide();
                $("#cancel").hide();
              }
          });
        }
      }else{
        $("#error h4").text("User are not Added. Please add a user and try again !");
        return false;
      }
    } // top if closed
  } // student_bulk() end 

  // User UnroleMent 
  function user_bulk_enrole(to_be_done){
    if($('#student_bulk_registration').valid()){
      var student = []
      var student_count = 0;
      // var total_amount = $('#res').val();
      // Getting inputs 
      for(i=0; i<t; i++){

        // Getting individual inputs
        var fname       = $("#fname_"+i).val();
        var lname       = $("#lname_"+i).val();
        var mobile      = $("#mobile_"+i).val();
        var email       = $("#email_"+i).val();
        var parent_name = $("#parent_name_"+i).val();
        var address     = $("#address_"+i).val();
        var course      = $("#course_"+i).val();
        // var cost        = $("#cost_"+i).val();

        //Cross checking the email id once again
        if(document.getElementById("email_"+i)){
            var count = 0;
            // for( j = 0; j < t; j++){
            //   if(document.getElementById("email_"+j)){
            //     if(email == document.getElementById("email_"+j).value){
            //       count = count+1;
            //       if(count > 1){
            //           $("#error h4").text(document.getElementById("email_"+j).value+" Email Address Already There in Data Table !");
            //           return false;       
            //       }
            //     }
            //   }
            //}
            // console.log('email check counter of i:'+i);
            var course_name = course;
            student[student_count] = {}
            student[student_count]['fname'] = fname;
            student[student_count]['lname'] = lname;
            student[student_count]['mobile'] = mobile;
            student[student_count]['email'] = email;
            student[student_count]['parent_name'] = parent_name;
            student[student_count]['address'] = address;
            student[student_count]['course'] = course_name;
            // student[student_count]['cost'] = cost;
            student_count = student_count+1;
        }
      } // top for closed

      if(student_count > 0 ){
        // Saving in one JSON Format
        student_final = JSON.stringify(student);
        
        // Confirmation for Transcatoin
        if(confirm("Do you want to Submit ?")){
          $.ajax({
            type:"POST",
            url: "/associate/save_users_data",
            data:{
              student:student_final,
              no_of_students:student_count,
              to_be_done:to_be_done
            },
              // total_amount:total_amount,
            success: function(response){                                               
              $('#right-side-content').html('');
              $('#right-side-content').html(response);
            }
          }).done(function(msg){
              if(msg == "done"){
                $("#pay").hide();
                $("#cancel").hide();
              }
          });
        }
      }else{
        $("#error h4").text("User are not Added. Please add a user and try again !");
        return false;
      }
    }
  } 

  // Delete All Rows 
  function delete_all_row(){
    table.fnClearTable();
    t=0; r=0;
    $("#pay").hide();
    $("#save").hide();          
    $("#cancel").hide();
    $("#error h4").text("");
    $("#res").val('');
    window.location.reload();
  }

  // Validate All form
  function save_data(){
    if($('#student_bulk_registration').valid()){
      // Check for email validation
      for(i=0;i<t;i++){
        if(check_email("email_"+i)){
          return true;
        } else {
          alert('email Already Registered');
          return false;
        }
      }
    }
  }

  //Check exsistence of entered email 
  function email_validation(){
    var this_email = "";
    $('input[type="email"]').each(function() {
      this_email = this;
      $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "/registration/checkEmail",
            data: { email: $(this_email).val() },
            success:function(data){
                if(data != true){
                  // console.log('igot true in data:'+data);
                  if($("#error h4").text()!=""){
                  alert('i have error');
                  } else {
                    $("#error h4").text($(this_email).val()+"Email Already Registered !");
                  }
                } else {
                  // console.log('igot false in data:'+data);
                  $("#error h4").text("");
                }
            }
      });
    });
  }

  // Function : insertRow()
  function insertRow() {
    if($('#AddStudentForm').valid()){
      addNewRow();
    }
  }

  function get_list(){
    var course_list  = $('#course').val();
    var course_list_length = course_list.length;
    for(var i=0;i<course_list_length;i++){
      var course_list_return = course_list_return+'<option value="'+course_list[i]+'" selected>'+course_list[i]+'</option>'
    }
    return course_list_return;
  }

  function addNewRow() {
    // Make pay cancle save visible
    $('#pay').show();
    $('#cancel').show();
    $('#save').show();
    
    var user_fname   = $('#fname').val();
    var user_lname   = $('#lname').val();
    var user_mobile  = $('#mobile').val();
    var user_email   = $('#email').val();
    var parent_name  = $('#parent_name').val();
    var user_address = $('#address').val();
    
    var course_list  = $('#course').val();
    var course_list_length = $('#course').val().length;
    var course_cost  = $('#cost').val();
    // Adding row in dataTable check_email(id);
    table.fnAddData([
            '<input readonly value="'+user_fname+'" style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" title="Should be only alphabet with min 3 char" name="fname_'+t+'" id="fname_'+t+'" >',
            '<input readonly value="'+user_lname+'" style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{0,20}$" title="Should be only alphabet with min 1 char" minlength="1" maxlength= "20" name="lname_'+t+'" id="lname_'+t+'" >',
            '<input readonly value="'+user_mobile+'" style="width:100px;" type="tel"  required pattern="[0-9]{10,10}$" minlength="10" maxlength="10" title="Should be 10 digit mobile no"  name="mobile_'+t+'" id="mobile_'+t+'" >',
            '<input readonly value="'+user_email+'" style="width:100px;" type="email" required name="email_'+t+'" id="email_'+t+'" onchange="check_email(id);" readonly>',
            '<input readonly value="'+parent_name+'" style="width:100px;" type="text" required pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" title="Should be only alphabet with min 3 char" name="parent_name_'+t+'" id="parent_name_'+t+'" >',
            '<input readonly value="'+user_address+'" style="width:100px;" type="text" required title="Should be minium 4 char" name="address_'+t+'" id="address_'+t+'" >',
            // '<input readonly value="'+course_list[0]+'" style="width:100px;" type="text" required title="Should be minium 4 char" name="course_'+t+'" id="course_'+t+'" readonly>',
            // '<select required title="Select Course" id="course_'+t+'" name="course_'+t+'" onchange="course_change('+t+')" size=3 >'+ 
            '<select title="Select Course" id="course_'+t+'" name="course_'+t+'" size=3 multiple disabled required>'+ 
            // course_list
            get_list()+
            '</select>',
            '<center> <button type="button" id="delete_'+t+'" class="btn-sm btn-danger" onclick="delete_row(delete_'+t+','+t+')"><i class="glyphicon glyphicon-trash text-white"></i></button> </center>',
            '<center> <button type="button" id="edit_'+t+'" data-toggle="modal" data-target="#editstudentModal" onClick="editstudentModal('+t+');" class="btn-sm btn-info"><i class="glyphicon glyphicon-edit text-white"></i></button> </center>'
    ]);
    // $('#course_'+t).html(course_list);
    var b = $('#res').val();  
    var c = $('#course_'+t).val();
    var z = Number(b)+Number(c);
    $("cost_"+t).val();     
    t=t+1; // counter for each record
    // calculating cost
    var total = $('#res').val();
    total = Number(total)+Number(course_cost);
    $('#res').val(Number(total));     
    $('#body-add_student').html('');
    $('#addstudentModal').modal('hide');
  }

  function update_student_details(element){
    if ($(element).Valid()){
      $(element).submit();
      $('#update_bulk_student').button('loading');
    }
  }

  // Function : UpdateThisRow()
  function UpdateThisRow() {
    if($('#UpdateStudentForm').valid()){
      // Make pay cancle save visible
      $('#pay').show();
      $('#cancel').show();
      $('#save').show();
      
      var update_fname        = $('#UpdateStudentForm').find('#update_fname').val();
      var update_lname        = $('#UpdateStudentForm').find('#update_lname').val();
      var update_mobile       = $('#UpdateStudentForm').find('#update_mobile').val();
      var update_email        = $('#UpdateStudentForm').find('#update_email').val();
      var update_parent_name  = $('#UpdateStudentForm').find('#update_parent_name').val();
      var update_address      = $('#UpdateStudentForm').find('#update_address').val();
      var update_course_list  = $('#UpdateStudentForm').find('#update_course').val();
      // var update_course_cost  = $('#UpdateStudentForm').find('#update_cost').val();
      var update_course_cost  = 0;
      // var old_course_cost     = $('#UpdateStudentForm').find('#old_course_cost').val();
      var update_row_id       = $('#UpdateStudentForm').find('#update_row_id').val();
      console.log(old_course_cost+'  '+update_row_id);
      // Decrease old course cost
      var a = old_course_cost;
      var b = $('#res').val();
      var sum = Number(b) - Number(a);
      $('#res').val(Number(sum));
      // Update Current Record
      $('#fname_'+update_row_id).val('');       $('#fname_'+update_row_id).val(update_fname);
      $('#lname_'+update_row_id).val('');       $('#lname_'+update_row_id).val(update_lname);
      $('#mobile_'+update_row_id).val('');      $('#mobile_'+update_row_id).val(update_mobile);
      $('#email_'+update_row_id).val('');       $('#email_'+update_row_id).val(update_email);
      $('#parent_name_'+update_row_id).val(''); $('#parent_name_'+update_row_id).val(update_parent_name);
      $('#address_'+update_row_id).val('');     $('#address_'+update_row_id).val(update_address);
      $('#course_'+update_row_id).html(''); 
      // 
      for (var i = 0; i < update_course_list.length; i++) {
        $('#course_'+update_row_id).append('<option value="' + update_course_list[i] + '" selected>' + update_course_list[i] + '</option>');       
      }
      
      // $('#course_'+update_row_id).val(update_course_list[i]);
      // $('#cost_'+update_row_id).val('');        $('#cost_'+update_row_id).val(update_course_cost);
      // Update With new Cost
      var c = update_course_cost;
      var b = $('#res').val();  
      var z = Number(b)+Number(c);
      $('#res').val(Number(z));
      $('#body-update_student').html('');
      $('#editstudentModal').modal('hide');
    }// end of validation
  }

</script>
  <!-- ========== Add student Modal Start ============================== -->
      

      <div class="modal fade" id="addstudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">  
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Enter User Details</h4>
              </div>
              <div class="modal-body" id="body-add_student">
                   <!--Ajax call load Edit Associate form -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onClick="$('#AddStudentForm').find('.input').val('');$('#AddStudentForm').find('select').html('<option disabled>Select Course</option>');" >Reset</button>
                <button type="button" class="btn btn-success" autofocus onclick="insertRow();">Insert</button>
              </div> 
          </div>
        </div>
      </div>
   

  <!-- ========== Add student Modal Ended ============================== -->

   <!-- ========== Edit student Modal Start ============================== -->
       <div class="modal fade" id="editstudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">  
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Update User Details</h4>
              </div>

              <div class="modal-body" id="body-update_student">
                   <!--Ajax call load Edit Associate form -->
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onClick="UpdateThisRow();" autofocus>Update</button>
              </div> 
          </div>
        </div>
      </div>
  <!-- ========== Edit student Modal Ended ============================== -->