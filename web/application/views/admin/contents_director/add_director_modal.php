<!-- 
******************************************************************* 
|  Associate Registraton  : [ style - content - js ] by usk | Begin
*******************************************************************
-->
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

  <!-- ========== Associate Registration Form Begin ============================== -->
    <form name="associate_reg_form" id="directorRegistrationFrom" method="post" action="/register/any_user_enrollment" role="form">
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
                    <input type="text" autocomplete="off" name="first_name" id="first_name" class="form-control input" placeholder="First Name" tabindex="1">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="middle_name" id="middle_name" class="form-control input" placeholder="Middle Name" tabindex="2">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="text" autocomplete="off" name="last_name" id="last_name" class="form-control input" placeholder="Last Name" tabindex="3">
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
                      <input autocomplete="off" type="email" name="email" id="email" class="form-control input" placeholder="Email id" tabindex="4">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group control-group">
                  <div class="control input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input type="text" autocomplete="off" name="phone" id="phone" class="form-control input" placeholder="Mobile no" tabindex="5">
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
                          <select required="" autocomplete="off" onchange="selected_values();" name="subject_id" id="subject_id" class="form-control input" size="3" tabindex="6" aria-required="true" multiple>
                              <!-- <option value="" selected="">Select Area of Interest</option> -->
                              <?php
                              if(isset($subject_list)){
                                  foreach ($subject_list as $res) {
                                      echo "<option value='".$res->subject_id."'>".$res->subject_name."</option>";
                                      //log_message('debug','^-^-^-^-^-^-^-^-^-^-^-^-^-^-^-^-^\>  '.$res->subject_id);
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
                      <textarea autocomplete="off" name="address" id="address" class="form-control input-large" tabindex="7" placeholder="Street Address"></textarea>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <select name="country" autocomplete="off" id="country" class="form-control input" size="1" placeholder="Country" tabindex="8">
                        <!-- <option value="" selected>Select Country</option> -->
                      </select>
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <select name="state" autocomplete="off" id="state" class="form-control input" size="1" placeholder="State" tabindex="9">
                        <!-- <option value="" selected="">State</option> -->
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
                      <input type="text" autocomplete="off" name="city" id="city" class="form-control input" placeholder="City" tabindex="10">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="pincode" id="pincode" class="form-control input" placeholder="Pincode / Zip" tabindex="11">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
              
              </div>
              <input type="hidden" value="6" data-role='Mentor/SME' id="user_role" name="user_role"></input>

              </fieldset>
              <!-- Ended Address Details -->

            </div><!-- OUTER Col Ended -->

        </div><!-- OUTER Row Ended -->
      </div>
      </div><!-- End for panel-info-->
      <!-- <div class="panel panel-footer">
        register
      </div> -->
      <!-- Panel Design Stope -->
    </form>
    <!-- ========== Association Registration Form Ended ============================== -->

<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js" type="text/javascript"></script>
<script src="/static/js/common/skol.js" type="text/javascript"></script>
<script src="/static/js/common/country_state.js" type="text/javascript"></script>
<script type="text/javascript">
  populateCountries("country", "state");
  function selected_values(){
    var x = $("#subject_id").val();
    document.getElementById('selected_hidden').value = x;
  }
</script>
<!-- 
******************************************************************* 
|  Associate Registraton  : [ style - content - js ] by usk | Ended
*******************************************************************
Note: Please Check getLOI() in SKOL.js for funcationality 
