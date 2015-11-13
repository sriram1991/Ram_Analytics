<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

<form method="POST" action="#" name="ajax_mentor_assessment_upload" id="ajax_mentor_assessment_upload" role="form">
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="test_subject" id="test_subject" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="" selected>Select Area of Interest</option>
                        <?php
                         if(isset($subject_list)){
                            foreach ($subject_list as $res) {
                                echo "<option value='".$res->subject_name."'>".$res->subject_name."</option>";
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
                    <input type="text" required="" autocomplete="off" name="test_no" id="test_no" class="form-control input" placeholder="Test No" tabindex="2" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="test_name" id="test_name" class="form-control input" placeholder="Test Name" tabindex="3" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>

         <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="test_description" id="test_description" class="form-control input" placeholder="Test Description" tabindex="4" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>
         
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="no_of_questions" id="no_of_questions" class="form-control input" placeholder="No of Questions" tabindex="5" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="test_type" id="test_type" class="form-control input" size="1" tabindex="6" aria-required="true">
                        <option value="" selected>Select Test Type</option>
                        <option value="Monthly Test">Monthly Test</option>
                        <option value="Weekly Test">Weekly Test</option>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>
    </div> 

    <div class="row">

         <div class="col-xs-12 col-sm-6 col-md-6">   
            <!-- <div class="form-group control-group">
                <div class="control">
                    <div class="input-group date">
                        <input type="text" required="" autocomplete="off" name="test_date" id="test_date" class="form-control input test_date" placeholder="Select Test Date" tabindex="7" aria-required="true">
                        <span class="input-group-addon" onclick="show_date();"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
                <span class="help-block"></span>
            </div> -->
            <div class="form-group control-group">
                <div class="input-group control">
                    <input type="text" required="" autocomplete="off" name="test_date" id="test_date" class="form-control input date-input" placeholder="Select Test Date" tabindex="7" aria-required="true">
                    <span class="input-group-btn">
                        <button class="date-button btn btn-default" type="button"><i class="glyphicon glyphicon-th"></i></button>
                    </span>
                </div>
                <div id="date-picker"></div>
                <span class="help-block"></span>
            </div>
        
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="test_duration" id="test_duration" class="form-control input" placeholder="Test Duration" tabindex="8" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>
    </div>


     <!-- <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="start_time" id="start_time" class="form-control input" placeholder="Start Time" tabindex="3" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="end_time" id="end_time" class="form-control input" placeholder="End Time" tabindex="3" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>  -->
    
        

    <div class="row"> <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="file" required="" autocomplete="off" name="upload_ques_paper" id="upload_ques_paper" class="form-control input" placeholder="Upload Question Paper" tabindex="9" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div id="files" class="error_file"></div>
</form>
 <script src="/static/js/common/ajaxfileupload.js" type="text/javascript"></script>
 <script src="/static/js/common/ajax_mentor_assessment_upload.js" type="text/javascript"></script>
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
var input = $('.date-input').pickadate({
    editable: true, 
    format: 'yyyy-mm-dd',
    min:true, 
    container: '#date-picker',
    onClose: function() {
        $("#ajax_mentor_assessment_upload").valid(); // Please Give Form id
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

</script>
 
