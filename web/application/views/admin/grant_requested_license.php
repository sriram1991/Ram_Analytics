    <link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
   
    <form method="POST" name="grantLicenseForm" id="grantLicenseForm" role="form">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="form-group control-group">
                    <div class="control">
                        Registration No :
                        <input type="text" name="reg_no" id="reg_no" required="" autocomplete="off" value="<?php echo $reg_no; ?>" class="form-control input" tabindex="1" aria-required="true" disabled>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group control-group">
                    <div class="control">
                        Area of Interest:
                        <input type="text" name="subject" id="subject" required="" autocomplete="off" value="<?php echo $subject; ?>" class="form-control input" tabindex="1" aria-required="true" disabled> 
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-2 col-md-2">
                <div class="form-group control-group">
                    <div class="control">
                        No of License :
                        <input type="text" name="license_no" id="license_no" required="" autocomplete="off" value="<?php echo $license; ?>" class="form-control input" tabindex="1" aria-required="true" disabled>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2">
                <div class="form-group control-group">
                    <div class="control">
                        Cost:
                        <input type="text" name="license_cost" id="license_cost" required="" autocomplete="off" value="<?php echo $cost; ?>" class="form-control input" tabindex="1" aria-required="true" disabled> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row">       
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group control-group">
                    <div class="control">
                        Requested License:
                        <input type="text" name="requested_license_count" id="requested_license_count" required="" autocomplete="off" value="" class="form-control input" tabindex="1" aria-required="true"> 
                    </div>
                     <span class="help-block"></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group control-group">
                    <div class="control">
                        License Cost:
                         <input type="text" name="req_license_cost"  id="req_license_cost" required="" autocomplete="off" value="" class="form-control input" tabindex="1" aria-required="true">
                    </div>
                     <span class="help-block"></span>
                </div>
            </div>
        </div>
        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" id="user_id" >
        <input type="hidden" value="<?php echo $quote_id; ?>" name="quote_id" id="quote_id" >
    </form>
    <script src="/static/js/common/validate.js" type="text/javascript"></script>
