<!--
******************************************************************* 
|  Associate Registraton  : [ style - content - js ] by usk | Begin
*******************************************************************
-->
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
  <section class="content-header">
  <!-- ========== Associate Registration Form Begin ============================== -->
    
    <div class="container">
      <form name="associate_reg_form" id="associateRegistrationFrom1" method="post" action="/register/spoc" role="form">
      <!-- Panel Design Start -->
      <div class="panel panel-info" style="width: 95%;">
        <div class="panel-heading">
          <div class="panel-title"><h4>Please Subcribe your Subject</h4></div>
        </div>

        <div class="panel panel-body">
          <div class="row"><!-- OUTER ROW Start-->
            
            <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
              <!-- Associate Details Begin -->
              <fieldset>
                <!-- <legend>Associate Details</legend> -->
                <div class="row">
                  <div class="col-xs-12 col-sm-3 col-md-3">
                    <div class="form-group control-group">
                        <div class="control">
                            <label>Your Subject</label>
                        </div>
                        <span class="help-block"></span>
                        <div id="files"></div>
                    </div>
                  </div>
                
                  <div class="col-xs-12 col-sm-3 col-md-3">
                    <div class="form-group control-group">
                      <div class="control">
                        <select name="subject" multiple="multiple" autocomplete="off" id="subject" class="form-control input" size="3" placeholder="Subject" tabindex="11" onchange="subject_selected(id);">
                        <?php 
                            if(isset($subjects)){
                                foreach ($subjects as $subject) {
                                    $subject_name = $subject->subject_name;
                                    $subject_fee = $subject->subject_fee;
                                    $small_box = "
                                    <option value=".$subject_name."-".$subject_fee.">".$subject_name."</option>
                                    ";    
                                    echo $small_box;
                                }    
                            } else {
                                echo "<center><h4> We are going to create new courses soon for user ... ! </h4></center>";
                            }
                        ?>
                        </select>
                      </div>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-3 col-md-3">
                    <div class="form-group control-group">
                        <div class="control">
                            <label>Payable Amount</label>
                        </div>
                        <span class="help-block"></span>
                    </div>
                  </div>
     
                  <div class="col-xs-12 col-sm-3 col-md-3">
                    <div class="form-group control-group">
                      <div class="control">
                        <input type="text" required autocomplete="off" name="amount" id="amount" class="form-control input" placeholder="Amount to be Paid" tabindex="2" readonly="readonly"> 
                      </div>
                      <span class="help-block"></span>
                    </div>
                  </div>
              </div>
            </fieldset>
            <!--    
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">   
                 <div class="form-group control-group">
                    <div class="control input-group">
                      <input type="text" autocomplete="off" name="expertise" id="expertise" class="form-control input" placeholder="Subject Expertise" tabindex="20">
                    </div>
                    <span class="help-block"></span>
                 </div>
              </div>
            </div> 
            -->
            <!-- Ended Associate Details -->
            </div><!-- OUTER Col Ended-->
          
          </div><!-- OUTER ROW End -->

          <div class="row"><!-- OUTER Row Being -->
            <br>
            <div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->
              <!-- Start Course Details -->
              <fieldset>
              <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group control-group">
                      <div class="control input-group">
                        <input type="checkbox" id="skol_terms" name="skol_terms" required=""> 
                          I accept <a data-toggle="modal" data-target="#associateTermsModal" >terms and conditions </a> of SKOL
                      </div>
                      <span class="help-block"></span>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="form-group control-group">
                    <div class="control">
                      <button type="button" class="btn btn-success" onClick="associate_payment()" tabindex="13">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
                        Pay
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="form-group control-group">
                    <div class="control">
                      <a href="/spoc_home" class="btn btn-danger" tabindex="14">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
                        Cancel
                      </a>
                    </div>
                  </div>
                </div>

              </div>
              </fieldset>
            </div><!-- OUTER Col Ended -->

          </div><!-- OUTER Row Ended -->
        </div>
      </div>
      </form>
    </div><!-- /.container-->
  <!-- ========== Association Registration Form Ended ============================== -->
  </section>

    <!-- ========== Association Registration Modal Start ============================== -->
    <form method="POST" action="#" name="EditSubForm" id="EditSubForm" role="form">   
        <div class="modal fade" id="associateTermsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">          
              <!-- <div class="row">  -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Please Read the Terms and Condition of SKOL System.</h4>
                </div>          
                <div class="modal-body">
                 
                 Work in Process ...

                </div>
              <!-- </div> -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" autofocus>Close</button>
              </div>
            </div>
          </div>
        </div>
    </form>
    <!-- ========== Association Registration Modal Ended ============================== -->



<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js" type="text/javascript"></script>
<script src="/static/js/common/skol.js" type="text/javascript"></script>
<script src="/static/js/common/ajaxfileupload.js"></script>
<!-- 
******************************************************************* 
|  Associate Registraton  : [ style - content - js ] by usk | Ended
*******************************************************************
Note: Please Check getLOI() in SKOL.js for funcationality -->