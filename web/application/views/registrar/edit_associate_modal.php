<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

    <!-- ========== Student Registration Form Begin ============================== -->
    <form method="POST" name="EditRegistrationForm" id="EditRegistrationForm"  action="#" role="form">
      <!-- Panel Design Start -->
      <div class="panel panel-info">
        <div class="panel-heading"><div class="panel-title"><h4>Edit SPOC Registration</h4></div></div>
      </div>

      <div class="panel panel-body">
        <div class="row"><!-- OUTER ROW Start-->
          <div class="col-xs-12 col-sm-12 col-md-12"><!-- OUTER Col Begin-->
            <!-- Student Details Begin -->
            <fieldset>
              <legend>SPOC Details</legend>
            <div class="row">
            
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="edit_user_fname" id="edit_user_fname" value ="<?php echo $user_details['user_fname'];?>" class="form-control input" placeholder="First Name" tabindex="1">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="edit_user_mname" id="edit_user_mname" value ="<?php echo $user_details['user_mname'];?>"  class="form-control input" placeholder="Middle Name" tabindex="2">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="edit_user_lname" id="edit_user_lname" value ="<?php echo $user_details['user_lname'];?>" class="form-control input" placeholder="Last Name" tabindex="3">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input autocomplete="off" type="email" name="edit_user_email" id="edit_user_email" value ="<?php echo $user_details['user_email'];?>" class="form-control input" placeholder="Email id" tabindex="4" disabled>
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input type="text" autocomplete="off" name="edit_user_phone" id="edit_user_phone" value ="<?php echo $user_details['user_phone'];?>" class="form-control input" placeholder="Mobile no" tabindex="5">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

            </div>
          <!-- Ended Student Details -->
          </div><!-- OUTER Col Ended-->
          
        </div><!-- OUTER ROW End -->

        <div class="row"><!-- OUTER Row Being -->
            <div class="col-xs-12 col-sm-12 col-md-12"><!-- OUTER Col Begin-->
              <!-- Start Address Details -->
              <fieldset>
              <legend>Address</legend>
              
              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                    <textarea autocomplete="off" name="edit_address" id="edit_address"  class="form-control input-large" tabindex="6" placeholder="Street Address"><?php echo $user_details['user_address'];?></textarea>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                        <input type="text" autocomplete="off" name="edit_country" id="edit_country" value ="<?php echo $user_details['user_country'];?>"  class="form-control input" placeholder="Country" tabindex="14" disabled>
                        <!-- <select name="edit_country" autocomplete="off" id="edit_country" class="form-control input" size="1" placeholder="State" tabindex="7"> -->
                          <!-- <option value="<?php //echo $user_details['user_country'];?>" selected><?php echo $user_details['user_country'];?></option> -->
                        <!-- </select> -->
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control input-group">
                        <input type="text" autocomplete="off" name="edit_state" id="edit_state" value ="<?php echo $user_details['user_state'];?>"  class="form-control input" placeholder="state" disabled>
                        <!-- <select name="edit_state" autocomplete="off" id="edit_state" class="form-control input" size="1" placeholder="State" tabindex="8"> -->
                          <!-- <option value="<?php //echo $user_details['user_state'];?>" selected><?php echo $user_details['user_state'];?></option> -->
                        <!-- </select> -->
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              
              </div>

              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control input-group">
                    <input type="text" autocomplete="off" name="edit_city" id="edit_city" value ="<?php echo $user_details['user_city'];?>" class="form-control input" placeholder="City" tabindex="9">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <input type="text" autocomplete="off" name="pincode" id="pincode" value ="<?php echo $user_details['user_pin'];?>" class="form-control input" placeholder="Pincode / Zip" tabindex="10">
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              </fieldset>
            </div><!-- OUTER Col Ended -->
        </div><!-- OUTER Row Ended -->
      </div>
      <input type="hidden" value="<?php echo $user_details['user_id']; ?>" name="edit_user_id" id="edit_user_id">
    </form>
    <!-- ========== Student Registration Form Ended ============================== -->

<script src="/static/js/common/validate.js" type="text/javascript"></script>
<!-- <script src="/static/js/common/country_state.js" type="text/javascript"></script> -->
<script type="text/javascript">
  // $(document).ready(function(){
  //   // $("#profile_picture").on('change',function(){ $('.file_error').html(""); });
  //   // populateCountries("edit_country", "edit_state");
  // });
</script>