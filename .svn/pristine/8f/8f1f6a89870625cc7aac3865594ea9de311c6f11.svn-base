          <link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
          <script src="/static/js/common/validate.js" type="text/javascript"></script>
          <div class="alert alert-info alert-dismissable">
                  <i class="fa fa-info"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <b>Note:</b> You need to enter your email for getting available courses !.
          </div> 

          <form method="POST" name="AddStudentForm" id="AddStudentForm" action="#" role="form">
             
                <div class="row"><!-- OUTER ROW Start-->
                  <div class="col-xs-12 col-sm-12 col-md-12"><!-- OUTER Col Begin-->     
                    <div class="row"> 
                     
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input class='input' style="width:150px;" type="text" pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" placeholder="First Name" title="Should be only alphabet with min 3 char" name="fname" id="fname" onFocus="this.select()" required> 
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input class='input' style="width:150px;" type="text" pattern="^[a-zA-Z][a-zA-Z ]{0,20}$" placeholder="Last Name" title="Should be only alphabet with min 1 char" minlength="1" maxlength="20" name="lname" id="lname" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input class='input' style="width:150px;" type="tel" pattern="[0-9]{10,10}$" minlength="10" maxlength="10" placeholder="Mobile" title="Should be 10 digit mobile no"  name="mobile" id="mobile" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input class='input' style="width:150px;" type="email" name="email" id="email" placeholder="Email" onchange="check_email_bring_course(id);" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input class='input' style="width:150px;" type="text" pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" placeholder="Organization Name" title="Should be only alphabet with min 3 char" name="parent_name" id="parent_name" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input class='input' style="width:150px;" type="text" title="Should be minium 4 char" placeholder="Address" name="address" id="address" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                          <!-- <select required title="Select Course" class='input' id="course" name="course" onchange="this_course_change(id);" size='3' multiple> -->
                          <select required title="Select Course" class='input' id="course" name="course" size='3' multiple>
                              <option value='' disabled> Select Course</option>
                          </select>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                     <!--  <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                              <input class='input' style="width:150px;" type="text" name="cost" id="cost" maxlength="10" placeholder="Amount" readonly>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div> -->

                    </div>
                  </div>
                </div>
          </form>
  <script type="text/javascript">
  // Generate Amount on course Selection
  function this_course_change(id){
      if(document.getElementById("course")){
        if($('#course').val()!=null){
          var student_total = 0;      
          var courses = $('#course').val();
          var course_details = courses.split('#');
          student_total = Number(course_details[1]); 
          // alert(student_total);
          $('#cost').val(Number(student_total));
          // Total = Total+student_total;
        }else{
            $('#cost').val(0);
        }
      }
    // $('#res').val(Number(Total));
  }
</script>