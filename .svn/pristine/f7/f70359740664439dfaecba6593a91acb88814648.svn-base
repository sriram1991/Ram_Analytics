      <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
       <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>
                <p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Area Of Interest</p>
                <!-- <marquee><small>Please Subscribe to Subject</small></marquee> -->
            </h3>
        </section>

        <!-- Main content -->
        <section class="content">
            <form name="AssociateJoinSubjectForm" id="AssociateJoinSubjectForm" method="post" action="/register/spoc" role="form">
                <!-- Panel Design Start -->
                <div class="panel panel-info" style="width: 95%;">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>Please Select your Area Of Interest</h4></div>
                    </div>
                    <div class="panel-body">
                        <!-- Subject List  -->
                        <fieldset>
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>Area Of Interest</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <select name="subject" multiple="multiple" autocomplete="off" id="subject" class="form-control input" size="3" placeholder="Subject" tabindex="11" onchange="subject_selected(id);">
                                            <?php 
                                                if(isset($subjects)){
                                                    foreach ($subjects as $subject) {
                                                        // $subject_name = $subject->subject_name;
                                                        // $subject_fee = $subject->subject_fee;
                                                        // $subject_string = $subject_name."#".$subject_fee;
                                                        // $small_box = "
                                                        // <option value=\"$subject_string\">".$subject_name."</option>
                                                        // ";
                                                        $subject_name = $subject['subject_name'];
                                                        $subject_fee = $subject['subject_fee'];
                                                        $subject_string = $subject_name."#".$subject_fee;
                                                        $small_box = "<option value=\"$subject_string\">".$subject_name."</option>";
                                                        echo $small_box;
                                                    } 
                                                } else {
                                                    echo "<option value='' disabled>Content not available </option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            <!--
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>Payable Amount</label>
                                        </div>
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

                            -->

                            </div>
                        </fieldset>
                        <!-- Term and condition -->
                        <fieldset>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group control-group">
                                        <div class="control input-group">
                                            <input type="checkbox" id="skol_terms" name="skol_terms" required=""> 
                                            I accept <a data-toggle="modal" data-target="#associateTermsModal" >Terms and Conditions </a> of <?php echo PRODUCT_NAME; ?>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <!-- associate_subscribe_subject(); spoc_request_quote(); -->
                                        <div class="control">
                                            <button type="button" class="btn btn-success" onClick="spoc_request_quote();" tabindex="13">
                                                Request Quote
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <a href="/spoc_home" class="btn btn-danger" tabindex="14">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                </div>
            </form>
                 <div class="panel panel-info" style="width: 95%;">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>Requested Area Of Interest</h4></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12" id="quotation_area">
                                <!-- ajax will load result -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Design Ended -->
        </section><!-- /.content -->

        <!-- ========== Association Registration Modal Start ============================== -->
        <div class="modal fade" id="associateTermsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">          
              <!-- <div class="row">  -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Please Read the Terms and Condition of <?php echo PRODUCT_NAME; ?>.</h4>
                </div>          
                <div class="modal-body">
                 
                    <div style="width: 100%; padding-right: 5%;">
                      <ol>
                        <li> 
                          <p align="justify">                
                            After depositing money for the admission-cum-scholarship test or course fee, if a User fails to join classes in the institute for any reason
                            whatsoever, the Institute will not provide a refund, the registration money deposited for a particular course will not be adjusted against any
                            other course.
                          </p>
                        </li>
                        <li>
                          <p align="justify">
                            A User, after qualifying the admission-cum-scholarship test and taking admission at any centre of the Institute will be bound by the
                            terms and conditions of that centre on all matters whatsoever.
                          </p>  
                        </li>
                        <li>
                          <p align="justify">
                            If any User remains absent for more than 6 days continuously without prior written application, he/she shall be deemed to have been
                            expelled from the institute. No fee or part of fee will be refunded in such cases. The decision of the Centre Incharge in this regard will be
                            final and binding on the Users and parents.
                          </p>  
                        </li>
                        <li>
                          <p align="justify">
                            Users enrolled in the Institute have to submit photocopy of admit cards of Medical Entrance Examinations they are appearing in as soon
                            as they receive their admits cards from the examining body.
                          </p>  
                        </li>
                        <li>
                          <p align="justify">
                            The Institute reserves the right to use a User’s photograph for publicity purposes in case that User gets through successfully in any
                            Medical Entrance Exams. The User should also attach two extra photographs with the completed registration/admission form.
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
                            Users and guardians are responsible for the same.
                          </p>  
                        </li>
                        <li>
                          <p align="justify">
                            Once enrolled, the Users are expected to maintain the discipline of the Institute and be sincere in their academics. In case the teacher
                            feels that any Users is indisciplined, irregular, not attentive in the class, he/she may be expelled from the Institute. The decision of the
                            Centre Incharge in this regard will be final and binding on the Users. No fee or part of fee will be refunded in such cases.
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
        <!-- ========== Association Registration Modal Ended ============================== -->

        <!-- ========== Association Request for quotation Modal start ============================== -->        
        <div class="modal fade" id="request_for_quotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onclick="window.location.reload('/');">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="load_associate_subject_reg();">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Requested for Quotation Details </h4>
                    </div>
                    <div class="modal-body" id="body-associate_course_info">
                        <center><h4> You have successfully Requested for Quotation.<br>Ask Analytics Team will get back to you soon.</h4></center>
                    
                    </div>          
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <button type="button" class="btn btn-danger" onClick="load_associate_subject_reg();" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== Association Request for quotation Modal start ============================== -->        

<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script type="text/javascript">
  function subject_selected(id){
    
    var subjects = $('#subject').val();
    var length = subjects.length;
    var payment = 0;
    for (var i=0;i<length;i++){
      var cost = subjects[i].split('#');
      payment = Number(payment)+Number(cost[1]);
    }
    $('#amount').val(Number(payment));
  }
  $(document).ready(function(){
    get_all_this_spoc_quoets_list();
  });
</script>
    <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
