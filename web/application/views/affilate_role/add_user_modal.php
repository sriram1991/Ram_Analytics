<!--
******************************************************************* 
|  User Registraton  : [ style - content - js ] by usk | Begin
*******************************************************************
-->
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

    <!-- ========== Student Registration Form Begin ============================== -->
    <form name="associate_reg_form" id="associateRegistrationFrom" method="post" action="/register/any_user_enrollment" role="form">
      <!-- Panel Design Start -->
      <div class="panel panel-info">
        <div class="panel-heading"><div class="panel-title"><h4>User Registration</h4></div></div>
      </div>

      <div class="panel panel-body">
        <div class="row"><!-- OUTER ROW Start-->
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
            <!-- User Details Begin -->
            <fieldset>
              <legend>User Details</legend>
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
          <!-- Ended Student Details -->
          </div><!-- OUTER Col Ended-->
          <?php
          // Parent Code Dissabled 
          /*
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
          <!-- Start Parent Details -->
            <fieldset>
              <legend>Parent / Guardian Details</legend>
            
              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="parent_first_name" id="parent_first_name" class="form-control input" placeholder="First Name" tabindex="6">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="parent_middle_name" id="parent_middle_name" class="form-control input" placeholder="Middle Name" tabindex="7">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="parent_last_name" id="parent_last_name" class="form-control input" placeholder="Last Name" tabindex="8">
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
                        <input autocomplete="off" type="email" name="parent_email" id="parent_email" class="form-control input" placeholder="Email id" tabindex="9">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group control-group">
                    <div class="control input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input type="text" autocomplete="off" name="parent_phone" id="parent_phone" class="form-control input" placeholder="Mobile no" tabindex="10">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>

            </fieldset>
            <!-- Ended Parent Details -->
          </div><!-- OUTER Col Ended -->
          //Parent Code Dissabled 
          */ ?>

          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
              <!-- Start Address Details -->
              <fieldset>
              <legend>Address</legend>
              
              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                    <textarea autocomplete="off" name="address" id="address" class="form-control input-large" tabindex="11" placeholder="Street Address"></textarea>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control input-group">
                    <input type="text" autocomplete="off" name="city" id="city" class="form-control input" placeholder="City" tabindex="12">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <input type="text" autocomplete="off" name="pincode" id="pincode" class="form-control input" placeholder="Pincode / Zip" tabindex="15">
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              
              </div>

              <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-5">
                  <div class="form-group control-group">
                      <div class="control">
                      <select name="country" autocomplete="off" id="country" class="form-control input" size="1" placeholder="Country" tabindex="6">
                        <!-- <option value="" selected>Select Country</option> -->
                      </select>
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-5">
                  <div class="form-group control-group">
                      <div class="control">
                      <select name="state" autocomplete="off" id="state" class="form-control input" size="1" placeholder="State" tabindex="13">
                        <!-- <option value="" selected="">State</option> -->
                      </select>
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              
              </div>
              

              </fieldset>
              <!-- Ended Address Details -->
            </div><!-- OUTER Col Ended -->

        </div><!-- OUTER ROW End -->

        <div class="row"><!-- OUTER Row Being -->
            
            <input type="hidden" id="user_role" name="user_role" value="1" data-user="User"/> 

        </div><!-- OUTER Row Ended -->
      </div>
      
      <!-- <div class="panel panel-footer">
        register
      </div> -->
      <!-- Panel Design Stope -->
    </form>
    <!-- ========== Student Registration Form Ended ============================== -->

<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/js/common/country_state.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // $("#profile_picture").on('change',function(){ $('.file_error').html(""); });
    populateCountries("country", "state");
  });
</script>
<!-- 
******************************************************************* 
|  User Registraton  : [ style - content - js ] by usk | Ended
*******************************************************************
Note: Please Check getLOI() in SKOL.js for funcationality 
-->