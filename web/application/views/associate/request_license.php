    <link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

    <form method="POST" name="addLicenseForm" id="addLicenseForm" role="form">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8">
                <div class="form-group control-group">
                    <div class="control">
                        Subject:
                        <input type="text" name="mail_subject" id="mail_subject" required="" autocomplete="off" value="<?php echo "Name : ".$urse_fname.", Subject : ".$subject_name.", Registration No : ".$registration_no; ?>" name="registration_no" id="registration_no" class="form-control input"  tabindex="1" aria-required="true" disabled> 
                    </div>
                     <span class="help-block"></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="form-group control-group">
                    <div class="control">
                        No of License :
                        <input type="text" name="license_no" id="license_no" required="" autocomplete="off" value="" class="form-control input" tabindex="1" aria-required="true">
                    </div>
                     <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-11 col-md-11">
                <div class="form-group control-group">
                    <div class="control">
                        Message:
                        <textarea value="" title="Please Fill the Details" required autofocus id="mail_body" name="mail_body" rows="4" class="form-control input col-md-12" tabindex="3"></textarea>
                    </div>
                     <span class="help-block"></span>
                </div>
            </div>
        </div>

        <input type="hidden" value="" name="edit_user_id" id="edit_user_id" >
    </form>
    <script src="/static/js/common/validate.js" type="text/javascript"></script>
