<?php 
/*
******************************************************************* 
|  Student Registraton  : [ style - content - js ] by usk | Begin
******************************************************************* 
*/
?>
<!-- Styles Start  -->
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
<!-- Styles Ended  -->

  <!-- Student Registration Page Begin -->
  <div class="wrapper row-offcanvas row-offcanvas-left">
    <br>
    <div class="container"><!-- /.container -->
      <!-- ========== Student Registration Form Begin ============================== -->
      <?php echo validation_errors(); ?>
      <?php $attr = array('id' => 'studentRegistrationFrom', 'role' => 'form', 'name' => 'student_reg_form'); ?>
      <?php echo form_open_multipart('/register/user',$attr);?>
      
      <!-- Panel Design Start -->
      <div class="panel panel-info">
        <div class="panel-heading"><div class="panel-title"><h4>User Registration</h4></div></div>
      <!-- </div> -->

      <!-- Panel Body -->
      <div class="panel panel-body">
        <!-- Student Form Begin -->
        
        <div class="row"><!-- OUTER ROW Start-->
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
          
            <fieldset>  <legend>User Details</legend>
              <div class="row">
            
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="student_first_name" id="student_first_name" class="form-control input" placeholder="First Name" tabindex="1">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="student_middle_name" id="student_middle_name" class="form-control input" placeholder="Middle Name" tabindex="2">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="student_last_name" id="student_last_name" class="form-control input" placeholder="Last Name" tabindex="3">
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
                        <input autocomplete="off" type="email" name="student_email" id="student_email" class="form-control input" placeholder="Email id" tabindex="4">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group control-group">
                    <div class="control input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input type="text" autocomplete="off" name="student_phone" id="student_phone" class="form-control input" placeholder="Mobile no" tabindex="5">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>

            </fieldset>
          </div>
          
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
            <fieldset>  <legend>Address</legend>
                
              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                    <textarea autocomplete="off" name="address" id="address" class="form-control input-large" tabindex="5" placeholder="Street Address"></textarea>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <select name="country" autocomplete="off" id="country" class="form-control input" size="1" placeholder="Country" tabindex="6">
                        <!-- <option value="" selected>Select Country</option> -->
                      </select>
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <select name="state" autocomplete="off" id="state" class="form-control input" size="1" placeholder="State" tabindex="7">
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
                    <input type="text" autocomplete="off" name="city" id="city" class="form-control input" placeholder="City" tabindex="8">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <!--
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <input type="text" autocomplete="off" name="country" id="country" class="form-control input" placeholder="Country" tabindex="14">
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div> 
                -->
                
                <!-- <input type="hidden" value="560076" id="pincode" name="pincode" placeholder="pincode"> -->
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <input type="text" autocomplete="off" name="pincode" id="pincode" class="form-control input" placeholder="Pincode / Zip" tabindex="9">
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>

              
              </div>

            </fieldset>
          </div><!-- OUTER Col Ended -->

        </div><!-- OUTER ROW End -->

        <div class="row"><!-- OUTER Row Being -->
          
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
            <fieldset>
              <legend>Upload Profile Picture </legend>
              
              <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12">

                  <div class="row">

                    <div class="col-xs-12 col-sm-4 col-md-4">
                      <div class="form-group control-group">
                        <div class="control">
                          <h5> User Profile Picture</h5>
                          <h6 class="text-green">*max size: 600 X 480</h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8">
                      <div class="form-group control-group">
                        <div class="control">
                          <input type="file" name="profile_picture" id="profile_picture" class="form-control input" placeholder="Upload Photo" tabindex="10"> 
                        </div>
                        <span class="help-block"></span>
                        <span class="file_error"><?php echo $error; ?></span>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group control-group">
                        <div class="control input-group">
                          <input type="checkbox" id="skol_terms" name="skol_terms" required="" tabindex="12"> 
                            I accept <a data-toggle="modal" data-target="#terms-modal" tabindex="11">Terms and Conditions </a> of <?php echo PRODUCT_NAME; ?>
                        </div>
                        <span class="help-block"></span>
                      </div>
                    </div>
                  
                  </div>

                  <div class="row">
                    
                    <div class="col-xs-6 col-sm-3 col-md-3">
                      <div class="form-group control-group">
                          <div class="control">
                          <button type="button" class="btn btn-success" onClick="doSubmit('#studentRegistrationFrom');" tabindex="13">
                            <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>  -->
                            Register
                          </button>
                          </div>
                      </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                      <div class="form-group control-group">
                          <div class="control">
                          <a href="/login" class="btn btn-danger" tabindex="14">
                            <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>  -->
                            Cancel
                          </a>
                          </div>
                      </div>
                    </div>
                  
                  </div>
            </fieldset>
          </div>
          
        </div><!-- OUTER Col Ended -->

      </div><!-- OUTER Row Ended -->
    </div><!-- panel ended -->
      <!-- Student Form Ended -->
      </div>
      <?php echo form_close();?>
      <!-- ========== Student Registration Form Ended ============================== -->
    </div><!-- /.container -->
  </div>
  <!-- Student Registration Page Ended -->

  <!-- ==========Student Registration Modal Start ============================== -->
    <div class="modal fade" id="terms-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">          
          
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Terms and Condition of <?php echo PRODUCT_NAME; ?></h4>
          </div>          
        
          <div class="modal-body">
          
            <div style="width: 100%; padding-right: 5%;">
              <ol>
                <li> 
                  <p align="justify">                
                    After depositing money for the admission-cum-scholarship test or course fee, if a user fails to join classes in the institute for any reason
                    whatsoever, the Institute will not provide a refund, the registration money deposited for a particular course will not be adjusted against any
                    other course.
                  </p>
                </li>
                <li>
                  <p align="justify">
                    A user, after qualifying the admission-cum-scholarship test and taking admission at any centre of the Institute will be bound by the
                    terms and conditions of that centre on all matters whatsoever.
                  </p>  
                </li>
                <li>
                  <p align="justify">
                    If any user remains absent for more than 6 days continuously without prior written application, he/she shall be deemed to have been
                    expelled from the institute. No fee or part of fee will be refunded in such cases. The decision of the Centre Incharge in this regard will be
                    final and binding on the users and parents.
                  </p>  
                </li>
                <li>
                  <p align="justify">
                    users enrolled in the Institute have to submit photocopy of admit cards of Medical Entrance Examinations they are appearing in as soon
                    as they receive their admits cards from the examining body.
                  </p>  
                </li>
                <li>
                  <p align="justify">
                    The Institute reserves the right to use a user’s photograph for publicity purposes in case that user gets through successfully in any
                    Medical Entrance Exams. The user should also attach two extra photographs with the completed registration/admission form.
                  </p>  
                </li>
                <li>
                  <p align="justify">
                    The Institute reserves the right to make any alterations in its programmes / fee without any prior notice.
                  </p> 
                </li>
                <li>
                  <p align="justify">
                    The Institute holds no responsibility in procuring and forwarding the admission forms of various Medical Exams to the examine bodies. The
                    users and guardians are responsible for the same.
                  </p>  
                </li>
                <li>
                  <p align="justify">
                    Once enrolled, the users are expected to maintain the discipline of the Institute and be sincere in their academics. In case the teacher
                    feels that any users is indisciplined, irregular, not attentive in the class, he/she may be expelled from the Institute. The decision of the
                    Centre Incharge in this regard will be final and binding on the users. No fee or part of fee will be refunded in such cases.
                  </p>  
                </li>
              </ol>
            </div>
                
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" autofocus>Close</button>
          </div>
        </div>
      </div>
    </div>
  <!-- ========== user Registration Modal Ended ============================== -->

<!-- Scripting Start -->
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js" type="text/javascript"></script>
<script src="/static/js/common/skol.js" type="text/javascript"></script>
<script src="/static/js/common/country_state.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#profile_picture").on('change',function(){ $('.file_error').html(""); });
      // populateStates("country", "state");
      populateCountries("country", "state");
  });
</script>
<!-- Scripting Ended -->
<?php 
/*
******************************************************************* 
|  Student Registraton  : [ style - content - js ] by usk | Ended
*******************************************************************
*/
?>


<?php 
          /*Parent UI Dissabled*/
          /*
            <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
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
          </div><!-- OUTER Col Ended -->
          */
          ?>