        <link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
        <script src="/static/js/common/validate.js" type="text/javascript"></script>
        <form method="POST" name="UpdateStudentForm" id="UpdateStudentForm" action="#" role="form">
             
              <div class="panel panel-body">      
                <div class="row"><!-- OUTER ROW Start-->
                  <div class="col-xs-12 col-sm-12 col-md-12"><!-- OUTER Col Begin-->     
                    <div class="row"> 
                     
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input style="width:150px;" value="<?php if(isset($fname)) echo $fname;?>" type="text" pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" placeholder="First Name" title="Should be only alphabet with min 3 char" name="fname" id="update_fname" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input style="width:150px;" value="<?php if(isset($lname)) echo $lname;?>" type="text" pattern="^[a-zA-Z][a-zA-Z ]{0,20}$" placeholder="Last Name" title="Should be only alphabet with min 1 char" minlength="2" maxlength="20" name="lname" id="update_lname" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input style="width:150px;" value="<?php if(isset($mobile)) echo $mobile;?>" type="tel" pattern="[0-9]{10,10}$" minlength="10" maxlength="10" placeholder="Mobile" title="Should be 10 digit mobile no"  name="mobile" id="update_mobile" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input style="width:150px;" value="<?php if(isset($email)) echo $email;?>" type="email" name="email" id="update_email" placeholder="Email" onchange="update_email_bring_course(id);" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input style="width:150px;" value="<?php if(isset($parent_name)) echo $parent_name;?>" type="text" pattern="^[a-zA-Z][a-zA-Z ]{2,20}$" placeholder="Organization Name" title="Should be only alphabet with min 3 char" name="parent_name" id="update_parent_name" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <input style="width:150px;" value="<?php if(isset($address)) echo $address;?>" type="text" title="Should be minium 4 char" placeholder="Address" name="address" id="update_address" required>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                            <!-- onchange="update_this_course_change('+t+')" -->
                              <select title="Select Course" id="update_course" name="course" size='3' multiple selected required>
                                  <option value="">No Course Available</option>
                              </select>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>

                      <!-- <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group control-group">
                          <div class="control">
                              <input style="width:150px;" value="<?php //if(isset($cost)) echo $cost;?>" type="text" name="cost" id="update_cost" maxlength="10" placeholder="Amount" readonly>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div> -->

                    </div>

                  </div>
                </div>
              </div>
            <input type="hidden" id="update_row_id" value="<?php if(isset($row_id)) echo $row_id;?>"></input>
            <input type="hidden" id="old_course_cost" value="<?php if(isset($cost)) echo $cost;?>"></input>
        </form>

<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    update_email_bring_course('update_email');
  });
  // Generate Amount on course Selection
  function update_this_course_change(id){
      if(document.getElementById("update_course")){
        if($('#update_course').val()!=null){
          var student_total = 0;      
          var courses = $('#update_course').val();
          var course_details = courses.split('#');
          student_total = Number(course_details[1]); 
          $('#update_cost').val(Number(student_total));
          // Total = Total+student_total;
        }else{
            $('#update_cost').val(0);
        }
      }
    // $('#res').val(Number(Total));
  }
</script>