<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/css/main.css">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">

      <div class="pad margin no-print">
            <div class="alert alert-info" style="margin-bottom: 0!important;">
                <i class="fa fa-info"></i>
                  You offline priority page.
            </div>
      </div>
<form method="POST" action="#" name="EditBatchForm" id="EditBatchForm" role="form">
    <div class="row"> 
                                                
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" value ="<?php if(isset($batch_details['batch_name'])){ echo $batch_details['batch_name']; } ?>" name="edit_batch_name" id="edit_batch_name" class="form-control input" placeholder="Batch Name" tabindex="1" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" value="<?php if(isset($batch_details['description'])){ echo $batch_details['description']; } ?>" name="edit_batch_description" id="edit_batch_description" class="form-control input" placeholder="Batch Description" tabindex="2" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>

    <div class="row">
                    
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="edit_batch_course_id" id="edit_batch_course_id" class="form-control input" size="1" tabindex="3" aria-required="true">
                        <option value="">Select Course</option>
                        <?php
                        if(isset($course_list)){
                            foreach ($course_list as $res) {
                                if(strcmp($batch_details['course_id'],$res->course_id) == 0) {
                                        echo "<option value='".$res->course_id."' selected>".$res->course_name."</option>";    
                                } else {
                                        echo "<option value='".$res->course_id."' >".$res->course_name."</option>";
                                }
                                //echo "<option value='".$res->course_id."'>".$res->course_name."</option>";
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
                        <input type="text" placeholder="Batch Start Date" required="" value="<?php if(isset($batch_details['start_date'])){ echo $batch_details['start_date']; } ?>" autocomplete="off" name="edit_batch_start_date" id="edit_batch_start_date" class="form-control input" tabindex="4" aria-required="true"> 
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                    
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        <input type="hidden" id="batch_id" name="batch_id" value="<?php if(isset($batch_details['batch_id'])) echo $batch_details['batch_id']; ?>">
    </div>

</form>
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
<script type="text/javascript">
$('#edit_batch_start_date').pickadate({
    format: 'yyyy-mm-dd',
    // selectYears: true,
    // selectMonths: true,
    min: true
});
</script>