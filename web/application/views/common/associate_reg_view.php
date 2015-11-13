<!--
******************************************************************* 
|  Affiliate Registraton  : [ style - content - js ] by usk | Begin
*******************************************************************
-->
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- ========== Affiliate Registration Form Begin ============================== -->
    <br>
    <div class="container">
      <?php echo validation_errors(); ?>
      <?php $attr = array('id' => 'associateRegistrationFrom', 'role' => 'form', 'name' => 'associate_reg_form'); ?>
      <?php echo form_open_multipart('/register/spoc',$attr);?>
      <!-- <form name="associate_reg_form" id="associateRegistrationFrom" method="post" action="/register/spoc" role="form"> -->
      <!-- Panel Design Start -->
      <div class="panel panel-info">
        <div class="panel-heading"><div class="panel-title"><h4>SPOC Registration</h4></div></div>
      <!-- </div> -->

      <div class="panel panel-body">
        <div class="row"><!-- OUTER ROW Start-->
          <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
            <!-- Affiliate Details Begin -->
            <fieldset>
              <legend>SPOC Details</legend>
            
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
          <!-- Ended Affiliate Details -->
          </div><!-- OUTER Col Ended-->

          <div class="col-xs-12 col-sm-6 col-md-6"> <!-- OUTER Col Start -->
              <!-- Start Address Details -->
              <fieldset>
              <legend>Address</legend>
              
              <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <textarea autocomplete="off" name="address" id="address" class="form-control input-large" tabindex="6" placeholder="Street Address"></textarea>
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                      <div class="control">
                      <select name="country" autocomplete="off" id="country" class="form-control input" size="1" placeholder="Country" tabindex="7">
                        <!-- <option value="" selected>Select Country</option> -->
                      </select>
                      </div>
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <select name="state" autocomplete="off" id="state" class="form-control input" size="1" placeholder="State" tabindex="8">
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
                      <input type="text" autocomplete="off" name="city" id="city" class="form-control input" placeholder="City" tabindex="9">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="pincode" id="pincode" class="form-control input" placeholder="Pincode / Zip" tabindex="10">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
              
              </div>
              

              </fieldset>
              <!-- Ended Address Details -->
          </div><!-- ./ OUTER Col Ended -->
          
        </div><!-- OUTER ROW End -->

        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
              <!-- Start Course Details -->
              <fieldset>
              <legend>Professional Details</legend>

              <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" name="organization_name" id="organization_name" class="form-control input" placeholder="Organization Name" tabindex="11">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="text" autocomplete="off" required="" name="student_count" id="student_count" class="form-control input" placeholder="Approx no of Users " tabindex="12">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
              
              </div>

              <div class="row">
              
                <div class="col-xs-6 col-sm-12 col-md-12">
                  <div class="form-group control-group">
                    <div class="control">
                      <textarea id="letter_of_intent" name="letter_of_intent" class="form-control" rows="3" title="I <SPOC NAME> Submit my application for SPOC program with your organization acceptation and having gone through the company Terms & Conditions.   Regards. <SPOC NAME>." placeholder="Letter of Intent" tabindex="13"></textarea>
                      <!-- <input type="text" autocomplete="off" name="country" id="country" class="form-control input" placeholder="Letter of intent" tabindex="10"> -->
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>
            
            </div><!-- OUTER Col Ended -->

            <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
              <!-- Start Course Details -->
              <fieldset>
              <legend>Upload Profile Picture</legend>

              <div class="row">

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group control-group">
                    <div class="control">
                      <h5>Profile Picture</h5>
                      <h6 class="text-green">*max size: 600 X 480</h6>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-8">
                  <div class="form-group control-group">
                    <div class="control">
                      <input type="file" name="profile_picture" id="profile_picture" class="form-control input" placeholder="Upload Photo" tabindex="14"> 
                    </div>
                    <span id="file_error" class="text-red"><?php echo $error;?></span>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                  <div class="form-group control-group">
                    <div class="control input-group">
                      <input type="checkbox" id="ass_skol_terms" name="ass_skol_terms" required="" tabindex="15"> 
                        I accept <a data-toggle="modal" data-target="#ass-terms-modal" >Terms and Conditions </a> of <?php echo PRODUCT_NAME; ?>
                    </div>
                    <span class="help-block"></span>
                  </div>

                  <!-- <div class="form-group control-group">
                    <div class="control">
                      <button type="button" class="btn btn-primary" onClick="getLOI();" tabindex="12">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
                          See Letter of Intent
                      </button>
                    </div>
                    <span class="help-block"></span>
                  </div> -->
                
                </div>

              </div>
              
              <div class="row">

                <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="form-group control-group">
                    <div class="control">
                      <button type="button" class="btn btn-success skol-btn-success" onClick="doSubmit('#associateRegistrationFrom');" tabindex="16">
                        <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>  -->
                        Register
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="form-group control-group">
                    <div class="control">
                      <a href="/login" class="btn btn-danger" tabindex="17">
                        <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>  -->
                        Cancel
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- OUTER Col Ended -->

        </div><!-- OUTER Row Ended -->
      </div>
    </div><!-- panel close -->
      <!-- <div class="panel panel-footer">
        register
      </div> -->
      <!-- Panel Design Stope -->
    </form>
    </div>
    <!-- ========== Association Registration Form Ended ============================== -->

    <!-- ==========Ass Registration Modal Start ============================== -->
        <div class="modal fade" id="ass-terms-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">          
              <!-- <div class="row">  -->
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
              <!-- </div> -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" autofocus>Close</button>
              </div>
            </div>
          </div>
        </div>
    <!-- ========== Student Registration Modal Ended ============================== -->


    <!-- ========== Association Registration Modal Start ============================== -->
    <!-- Modal -->
    <div class="modal fade" id="associateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Welcome To <?php echo PRODUCT_NAME; ?> Affiliate Registration</h4>
          </div>
          <div class="modal-body">
            <p> From : <label class="email">Please fill your form</label> </p>
            <p> Subject : <label>Letter of Intent</label> </p>
            <!-- <p> Body: </p> -->
            <p> My Details</p>
            
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                First Name:
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <label class="first_name">Please fill the Form</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                Middle Name:
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <label class="middle_name"></label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                Last Name:
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <label class="last_name">Please fill your form</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                <i class="glyphicon glyphicon-home"></i> &nbsp; Address:
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <label class="address">Please fill your form</label>
                <label class="city"></label>
                <label class="state"></label>
                <label class="country"></label>
                <label class="pincode"></label>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                <i class="glyphicon glyphicon-envelope"></i> &nbsp; Email id:
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <label class="email">Please fill your form</label>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                <i class="glyphicon glyphicon-earphone"></i> &nbsp; Mobile No:
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <label class="mobile">Please fill your form</label>
              </div>
            </div>
            <br>
            <p>Thanking you<br>
              <label class="first_name">Please fill the form</label> &nbsp;
              <label class="last_name">Please fill your form</label>
            </p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" autofocus>Ok</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== Association Registration Modal Ended ============================== -->

</div>

</div><!-- /.container-->
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js" type="text/javascript"></script>
<script src="/static/js/common/skol.js" type="text/javascript"></script>
<script src="/static/js/common/country_state.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#profile_picture").on('change',function(){ $('#file_error').html(""); });
    populateCountries("country", "state");
});
</script>
<!-- 
******************************************************************* 
|  Affiliate Registraton  : [ style - content - js ] by usk | Ended
*******************************************************************
Note: Please Check getLOI() in SKOL.js for funcationality 
-->
