<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
<!-- <link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/css/main.css"> -->
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">

<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Off-Line Payment</p>
    <!-- <marquee><small>Please Subscribe to Subject</small></marquee> -->
  </h4>
</section>

<!-- Main content -->
<section class="content-header">
  <form name="offline_pay" id="offline_pay" method="post" action="#" role="form" novalidate="novalidate">
  
                <!-- Panel Design Start -->
                <div class="panel panel-info" style="width: 95%;">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>Please Enter your Payment Details</h4></div>
                    </div>
                    <div class="panel-body">
                        <!-- Subject List  -->
                        <fieldset>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>Bank Name:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">   
                                  <div class="form-group control-group">
                                      <div class="control">
                                          <input type="text" required="" autocomplete="off" name="bank_name" id="bank_name" class="form-control input" placeholder="Bank Name" tabindex="1" aria-required="true">
                                      </div>
                                      <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>Chalan No:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">   
                                  <div class="form-group control-group">
                                      <div class="control">
                                          <input type="text" required="" autocomplete="off" name="challan_no" id="challan_no" class="form-control input" placeholder="Enter Chalan No" tabindex="2" aria-required="true">
                                      </div>
                                      <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>Paid Amount:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">   
                                  <div class="form-group control-group">
                                      <div class="control">
                                        <input type="text" required="" autocomplete="off" name="amount" id="amount" class="form-control input" placeholder="Paid Amount" tabindex="3" aria-required="true">
                                      </div>
                                      <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>Date Of Payment:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">   
                                  
                                  <div class="form-group control-group">
                                    <div class="input-group control">
                                        <input type="text" required="" autocomplete="off" id="pay_date" name="pay_date" class="form-control input payment-date" placeholder="Enter Date Of Payment" tabindex="4" aria-required="true">
                                        <span class="input-group-btn">
                                            <button class="date-button btn btn-default" type="button"><i class="glyphicon glyphicon-th"></i></button>
                                        </span>
                                    </div>
                                    <div id="date-picker"></div>
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                            </div>

                        </fieldset>
                        

                        <!-- Term and condition -->
                        <fieldset>
                            <div class="row">
                                <div class="col-xs-6 col-sm-2 col-md-2">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <button class="btn btn-success " onclick="offline_payment();"><i class="fa fa-credit-card"></i> Submit</button><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-2 col-md-2">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <a href="/" class="btn btn-danger" tabindex="14">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                    </div>
                </div>
                <!-- Panel Design Ended -->

  </form>
</section>
<!-- ./Main content -->
<!-- <script src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js" type="text/javascript"></script> -->
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
<script type="text/javascript">
// Latest Working code for piackadate works with : chrome and firefox
var input = $('.payment-date').pickadate({
    editable: true, 
    format: 'yyyy-mm-dd',
    container: '#date-picker',
    onClose: function() {
        // $("#ass_file_upload").valid(); // Please Give Form id
    }
});
var picker = input.pickadate('picker');

$('.payment-date').off('click focus'); // making input box focasable 
$('.date-button').on('click', function(e) {
  if (picker.get('open')) { 
    picker.close()
  } else {
    picker.open()
  }
  e.stopPropagation()    
});
</script>