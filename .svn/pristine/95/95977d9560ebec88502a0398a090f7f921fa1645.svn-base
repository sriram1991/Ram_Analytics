<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

  <!-- ========== Associate Registration Form Begin ============================== -->
    <form name="edit_associate_reg_form" id="EditdirectorRegistrationForm" method="post" action="/register/update_director" role="form">
      <!-- Panel Design Start -->
      <div class="panel panel-info">
        <div class="panel-heading"><div class="panel-title"><h4>Mentor/SME Registration</h4></div></div>
      

      <div class="panel panel-body">
        <div class="row"><!-- OUTER ROW Start-->
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
            <!-- Associate Details Begin -->
            <fieldset>
              <legend>Mentor/SME Details</legend>
            
            <div class="row">
            
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="edit_first_name" id="edit_first_name" value ="<?php echo $director_details['user_fname'];?>"  class="form-control input" placeholder="First Name" tabindex="1">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="edit_middle_name" id="edit_middle_name" value ="<?php echo $director_details['user_mname'];?>" class="form-control input" placeholder="Middle Name" tabindex="2">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="edit_last_name" id="edit_last_name"value ="<?php echo $director_details['user_lname'];?>"class="form-control input" placeholder="Last Name" tabindex="3">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group control-group">
                  <div class="control input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input autocomplete="off" type="email" name="edit_mail" id="edit_mail" value ="<?php echo $director_details['user_email'];?>" class="form-control input" placeholder="Email id" disabled tabindex="4">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group control-group">
                  <div class="control input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input type="text" autocomplete="off" name="edit_phone" id="edit_phone"  value ="<?php echo $director_details['user_phone'];?>"class="form-control input" placeholder="Mobile no" tabindex="5">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

            </div>
          <!-- Ended Associate Details -->
          </div><!-- OUTER Col Ended-->

          <div class="col-xs-12 col-sm-6 col-md-6"> <!-- OUTER Col Start -->
              <!-- Select Subject Started -->
              <fieldset>
              <legend>Select Mentor/SME Area of Interest</legend>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">   
                  <div class="form-group control-group">
                      <div class="control">
                          <select autocomplete="off" name="subject_id" id="subject_id" class="form-control input" size="3" tabindex="6" aria-required="true" onchange="selected_values();" required multiple selected>
                              <?php
                              if(isset($subject_list)){
                                foreach ($subject_list as $res) {
                                  $selected = false;
                                  if(isset($director_subjects)){
                                    foreach ($director_subjects as $dir_sub) {
                                      if($res->subject_id == $dir_sub->subject_id) {
                                        $selected = true;
                                        break;
                                      } 
                                    }
                                  }
                                  if($selected == true) {
                                    echo "<option value='".$res->subject_id."' selected>".$res->subject_name."</option>"; 
                                    // echo $res->subject_name." selected <br>";
                                  } else {
                                    echo "<option value='".$res->subject_id."'>".$res->subject_name."</option>";
                                    // echo $res->subject_name." <br>";
                                  }
                                }
                              } 
                              ?>
                          </select>
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <input type="hidden" name="selected_hidden" id="selected_hidden">
              </fieldset>
              <!-- Select Subject Ended -->
          </div><!-- ./ OUTER Col Ended --> 
          
        </div><!-- OUTER ROW End -->

        <div class="row"><!-- OUTER Row Being -->
             <div class="col-xs-12 col-sm-12 col-md-12"><!-- OUTER Col Begin-->
              <!-- Start Address Details -->
              <fieldset>
              <legend>Address</legend>
              
              <div class="row">
                
                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <textarea autocomplete="off" name="edit_address" id="edit_address" class="form-control input-large" tabindex="7" placeholder="Street Address"><?php echo $director_details['user_address'];?></textarea>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <!-- <input type="text" autocomplete="off" name="edit_country" id="edit_country" value ="<?php echo $director_details['user_country'];?>" class="form-control input" placeholder="Country" tabindex="10"> -->
                      <select name="edit_country" autocomplete="off" id="edit_country" class="form-control input" size="1" placeholder="State" tabindex="7">
                          <!-- <option value="<?php echo $director_details['user_country'];?>" selected><?php echo $director_details['user_country'];?></option> -->
                      </select>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <select name="edit_state" autocomplete="off" id="edit_state" value="<?php echo $director_details['user_state']?>"class="form-control input" size="1" placeholder="State" tabindex="9">
                        <?php /*
                        <option value="" selected="">State</option>
                        <option value="Andaman and Nicobar Islands" <?php if(strcmp($director_details['user_state'],'Andaman and Nicobar Islands') == 0) { echo "selected='selected'"; } ?> >Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh" <?php if(strcmp($director_details['user_state'],'Andhra Pradesh') == 0) { echo "selected='selected'"; } ?>>Andhra Pradesh</option>
                        <option value="Arunachal Pradesh" <?php if(strcmp($director_details['user_state'],'Arunachal Pradesh') == 0) { echo "selected='selected'"; } ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php if(strcmp($director_details['user_state'],'Assam') == 0) { echo "selected='selected'"; } ?>>Assam</option>
                        <option value="Bihar" <?php if(strcmp($director_details['user_state'],'Bihar') == 0) { echo "selected='selected'"; } ?>>Bihar</option>
                        <option value="Chandigarh" <?php if(strcmp($director_details['user_state'],'Chandigarh') == 0) { echo "selected='selected'"; } ?>>Chandigarh</option>
                        <option value="Chhattisgarh" <?php if(strcmp($director_details['user_state'],'Chhattisgarh') == 0) { echo "selected='selected'"; } ?>>Chhattisgarh</option>
                        <option value="Dadra and Nagar Haveli" <?php if(strcmp($director_details['user_state'],'Dadra and Nagar Haveli') == 0) { echo "selected='selected'"; } ?>>Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu" <?php if(strcmp($director_details['user_state'],'Daman and Diu') == 0) { echo "selected='selected'"; } ?>>Daman and Diu</option>
                        <option value="Delhi" <?php if(strcmp($director_details['user_state'],'Delhi') == 0) { echo "selected='selected'"; } ?>>Delhi</option>
                        <option value="Goa" <?php if(strcmp($director_details['user_state'],'Goa') == 0) { echo "selected='selected'"; } ?>>Goa</option>
                        <option value="Gujarat" <?php if(strcmp($director_details['user_state'],'Gujarat') == 0) { echo "selected='selected'"; } ?>>Gujarat</option>
                        <option value="Haryana" <?php if(strcmp($director_details['user_state'],'Haryana') == 0) { echo "selected='selected'"; } ?>>Haryana</option>
                        <option value="Himachal Pradesh" <?php if(strcmp($director_details['user_state'],'Himachal Pradesh') == 0) { echo "selected='selected'"; } ?>>Himachal Pradesh</option>
                        <option value="Jammu and Kashmir" <?php if(strcmp($director_details['user_state'],'Jammu and Kashmir') == 0) { echo "selected='selected'"; } ?>>Jammu and Kashmir</option>
                        <option value="Jharkhand" <?php if(strcmp($director_details['user_state'],'Jharkhand') == 0) { echo "selected='selected'"; } ?>>Jharkhand</option>
                        <option value="Karnataka" <?php if(strcmp($director_details['user_state'],'Karnataka') == 0) { echo "selected='selected'"; } ?>>Karnataka</option>
                        <option value="Kerala" <?php if(strcmp($director_details['user_state'],'Kerala') == 0) { echo "selected='selected'"; } ?>>Kerala</option>
                        <option value="Lakshadweep" <?php if(strcmp($director_details['user_state'],'Lakshadweep') == 0) { echo "selected='selected'"; } ?>>Lakshadweep</option>
                        <option value="Madhya Pradesh" <?php if(strcmp($director_details['user_state'],'Madhya Pradesh') == 0) { echo "selected='selected'"; } ?>>Madhya Pradesh</option>
                        <option value="Maharashtra" <?php if(strcmp($director_details['user_state'],'Maharashtra') == 0) { echo "selected='selected'"; } ?>>Maharashtra</option>
                        <option value="Manipur" <?php if(strcmp($director_details['user_state'],'Manipur') == 0) { echo "selected='selected'"; } ?>>Manipur</option>
                        <option value="Meghalaya" <?php if(strcmp($director_details['user_state'],'Meghalaya') == 0) { echo "selected='selected'"; } ?>>Meghalaya</option>
                        <option value="Mizoram" <?php if(strcmp($director_details['user_state'],'Mizoram') == 0) { echo "selected='selected'"; } ?>>Mizoram</option>
                        <option value="Nagaland" <?php if(strcmp($director_details['user_state'],'Nagaland') == 0) { echo "selected='selected'"; } ?>>Nagaland</option>
                        <option value="Orissa" <?php if(strcmp($director_details['user_state'],'Orissa') == 0) { echo "selected='selected'"; } ?>>Orissa</option>
                        <option value="Pondicherry"<?php if(strcmp($director_details['user_state'],'Pondicherry') == 0) { echo "selected='selected'"; } ?>>Pondicherry</option>
                        <option value="Punjab" <?php if(strcmp($director_details['user_state'],'Punjab') == 0) { echo "selected='selected'"; } ?>>Punjab</option>
                        <option value="Rajasthan" <?php if(strcmp($director_details['user_state'],'Rajasthan') == 0) { echo "selected='selected'"; } ?>>Rajasthan</option>
                        <option value="Sikkim" <?php if(strcmp($director_details['user_state'],'Sikkim') == 0) { echo "selected='selected'"; } ?>>Sikkim</option>
                        <option value="Tamil Nadu" <?php if(strcmp($director_details['user_state'],'Tamil Nadu') == 0) { echo "selected='selected'"; } ?>>Tamil Nadu</option>
                        <option value="Telangana" <?php if(strcmp($director_details['user_state'],'Telangana') == 0) { echo "selected='selected'"; } ?>>Telangana</option>
                        <option value="Tripura" <?php if(strcmp($director_details['user_state'],'Tripura') == 0) { echo "selected='selected'"; } ?>>Tripura</option>
                        <option value="Uttaranchal" <?php if(strcmp($director_details['user_state'],'Uttaranchal') == 0) { echo "selected='selected'"; } ?>>Uttaranchal</option>
                        <option value="Uttar Pradesh" <?php if(strcmp($director_details['user_state'],'Uttar Pradesh') == 0) { echo "selected='selected'"; } ?>>Uttar Pradesh</option>
                        <option value="West Bengal" <?php if(strcmp($director_details['user_state'],'West Bengal') == 0) { echo "selected='selected'"; } ?>>West Bengal</option>
                        */?>
                        <?php
                          // if(isset($indian_state)){
                          //   foreach ($indian_state as $res) {
                          //     echo "<option value='".$res->state_name."'>".$res->state_name."</option>";
                          //   }
                          // } 
                        ?>
                      </select>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
              
              </div>

              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control input-group">
                      <input type="text" autocomplete="off" name="edit_city" id="edit_city" value ="<?php echo $director_details['user_city'];?>" class="form-control input" placeholder="City" tabindex="8">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="edit_pincode" id="edit_pincode" value ="<?php echo $director_details['user_pin'];?>"class="form-control input" placeholder="Pincode / Zip" tabindex="11">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
              
              </div>
              

              </fieldset>
              <!-- Ended Address Details -->

            </div><!-- OUTER Col Ended -->

        </div><!-- OUTER Row Ended -->
      </div>
      </div><!-- End for panel-info-->
      <input type="hidden" value="<?php echo $director_details['user_id']; ?>" name="edit_user_id" id="edit_user_id">
      <!-- Panel Design Stope -->
    </form>
    <!-- ========== Association Registration Form Ended ============================== -->
<script>
  
</script>
<script type="text/javascript" src="/static/js/common/validate.js"></script>
<script type="text/javascript" src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js"></script>
<script type="text/javascript" src="/static/js/common/skol.js"></script>
<script src="/static/js/common/country_state.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // $("#profile_picture").on('change',function(){ $('.file_error').html(""); });
    function selected_values(){
      var x = $("#subject_id").val();
      document.getElementById('selected_hidden').value = x;
    }
    populateCountries("edit_country", "edit_state");
    //  Selecting Values form Multiple select and storing in hidden select
    selected_values(); 
  });
</script>