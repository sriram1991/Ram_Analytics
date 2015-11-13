<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

<form method="POST" action="#" name="EditSubForm" id="EditSubForm" role="form">    
    <div class="row"> 
    
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $subject_details['subject_name']; ?>" required="" autocomplete="off" name="edit_subject_name" id="edit_subject_name" class="form-control input" placeholder="Area of Interest Name" tabindex="1" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $subject_details['subject_description']; ?>"  required="" autocomplete="off" name="edit_subject_description" id="edit_subject_description" class="form-control input" placeholder="Area of Interest Description" tabindex="2" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $subject_details['subject_fee']; ?>" required="" autocomplete="off" name="edit_subject_fee" id="edit_subject_fee" class="form-control input" placeholder="Area of Interest Fee" tabindex="2" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <input type="hidden" value="<?php echo $subject_details['subject_id']; ?>" id="subject_id"/>
    </div>
</form>
<!-- Validation Script To Make Enable in Ajax Call -->
<script src="/static/js/common/validate.js" type="text/javascript"></script>