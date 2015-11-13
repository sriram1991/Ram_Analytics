<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">



<form method="POST" action="#" name="AddBatchForm" id="AddBatchForm" role="form">
    <div class="row"> 
                                                
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="batch_name" id="batch_name" class="form-control input" placeholder="Batch Name" tabindex="1" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="batch_description" id="batch_description" class="form-control input" placeholder="Batch Description" tabindex="2" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>

    <div class="row">
                    
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="batch_course_id" id="batch_course_id" class="form-control input" size="1" tabindex="3" aria-required="true">
                        <option value="" selected="">Select Course</option>
                        <?php
                        if(isset($course_list)){
                            foreach ($course_list as $res) {
                                echo "<option value='".$res->course_id."'>".$res->course_name."</option>";
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
                    <div class="input-group date">
                        <input type="text" required="" autocomplete="off" name="batch_start_date" id="batch_start_date" class="form-control input batch_start_date" placeholder="Batch Start Date" tabindex="4" aria-required="true">
                        <span class="input-group-addon" onclick="show_date();"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                    <!-- <input type="date" required="" autocomplete="off" name="batch_start_date" id="batch_start_date" class="form-control input" placeholder="Syllabus schedule" tabindex="4" aria-required="true">  -->
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>

</form>
<script src="/static/js/common/validate.js" type="text/javascript"></script>

<script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
<script type="text/javascript">
var batch_start_date = $('.batch_start_date').pickadate({
    format: 'yyyy-mm-dd',
    // selectYears: true,
    // selectMonths: true,
    editable: true,
    readOnly: true,
    min: true
});
function show_date(){
    // alert('show date called');
    batch_start_date.pickadate('picker').open();
    event.stopPropagation();
}
</script>
 
