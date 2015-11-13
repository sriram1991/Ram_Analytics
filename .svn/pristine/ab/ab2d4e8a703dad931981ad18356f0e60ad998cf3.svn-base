<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

<form method="POST" action="#" name="EditAssForm" id="EditAssForm" role="form">
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required=""  autocomplete="off" name="edit_test_subject" id="edit_test_subject" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="" >Select Area of interest</option>
                        <?php
                        if(isset($subject_list)){
                            foreach ($subject_list as $res) {
                                if($res->subject_name == $assessment_details['test_subject']){
                                    echo "<option value='".$res->subject_name."' selected>".$res->subject_name."</option>";    
                                } else {
                                    echo "<option value='".$res->subject_name."'>".$res->subject_name."</option>";
                                }
                                
                            }
                        } 
                        ?>
                        </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="edit_test_type" id="edit_test_type" class="form-control input" size="1" tabindex="2" aria-required="true">
                        <option value="" selected>Select Test Type</option>
                        <option value="Monthly Test"  <?php if(strcmp($assessment_details['test_type'],"Monthly Test") == 0) echo "selected"; ?> >Monthly Test</option>
                        <option value="Weekly Test" <?php if(strcmp($assessment_details['test_type'],"Weekly Test") == 0) echo "selected"; ?> >Weekly Test</option>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $assessment_details['test_name']; ?>" required="" autocomplete="off" name="edit_test_name" id="edit_test_name" class="form-control input" placeholder="Test Name" tabindex="3" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>

         <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text"value="<?php echo $assessment_details['test_description']; ?>"  required="" autocomplete="off" name="edit_test_description" id="edit_test_description" class="form-control input" placeholder="Test Description" tabindex="4" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>
         
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $assessment_details['no_of_questions']; ?>" required="" autocomplete="off" name="edit_no_of_questions" id="edit_no_of_questions" class="form-control input" placeholder="No of Questions" tabindex="5" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div> 
         <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $assessment_details['test_duration']; ?>"  required="" autocomplete="off" name="edit_test_duration" id="edit_test_duration" class="form-control input" placeholder="Test Duration" tabindex="6" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        
    </div> 

    <div class="row">

         <div class="col-xs-12 col-sm-6 col-md-6">   
            <!-- 
            <div class="form-group control-group">
                <div class="control">
                    <div class="input-group date">
                        <input type="text" value="<?php //echo $assessment_details['test_date']; ?>" required="" autocomplete="off" name="edit_test_date" id="edit_test_date" class="form-control input test_date" placeholder="Select Test Date" tabindex="7" aria-required="true">
                        <span class="input-group-addon" onclick="show_date();"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
                <span class="help-block"></span>
            </div> -->
            <div class="form-group control-group">
                <div class="input-group control">
                    <input type="text" value="<?php echo $assessment_details['test_date']; ?>" required="" autocomplete="off" name="edit_test_date" id="edit_test_date" class="form-control input edit-date-input" placeholder="Select Test Date" tabindex="7" aria-required="true">
                    <span class="input-group-btn">
                        <button class="date-button btn btn-default" type="button"><i class="glyphicon glyphicon-th"></i></button>
                    </span>
                </div>
                <div id="edit-date-picker"></div>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $assessment_details['test_id']; ?>" name="edit_test_id" id="edit_test_id">
</form>
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<!-- Datepicker script -->
<script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
<script type="text/javascript">
// var test_date = $('.test_date').pickadate({
//     format: 'yyyy-mm-dd',
//     // selectYears: true,
//     // selectMonths: true,
//     editable: true,
//     readOnly: true,
//     min: true
// });
// function show_date(){
//     // alert('show date called');
//     test_date.pickadate('picker').open();
//     event.stopPropagation();
// }

// Latest Working code for piackadate works with : chrome and firefox
var input = $('.edit-date-input').pickadate({
    editable: true, 
    format: 'yyyy-mm-dd',
    min:true, 
    container: '#edit-date-picker',
    onClose: function() {
        $("#EditAssForm").valid(); // Please Give Form id
    }
});
var picker = input.pickadate('picker');

$('.date-input').off('click focus'); // making input box focasable 
$('.date-button').on('click', function(e) {
  if (picker.get('open')) { 
    picker.close()
  } else {
    picker.open()
  }
  e.stopPropagation()    
});
//-----------------------------------------------------------------------------
$(document).ready(function(){
    $('.close_assessment_btn').hide();
    $('.edit_assessment_btn').show();
});
</script>
 
