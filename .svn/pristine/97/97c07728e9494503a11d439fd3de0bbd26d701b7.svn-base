<!-- DatePicker Style Sheets -->
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">

<form method="POST" action="#" name="EditCourseResourceMapForm" id="EditCourseResourceMapForm" role="form">
    <div class="row"> 
        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="module_name" id="module_name" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="">Select Module</option>
                        <?php
                        if(isset($module_list)){
                            foreach ($module_list as $res) {
                                if($res->module_name == $cres_map_details['module_name']){
                                    echo "<option value='".$res->module_name."' selected>".$res->module_name."</option>";    
                                } else {
                                    echo "<option value='".$res->module_name."'>".$res->module_name."</option>";
                                }
                                
                            }
                        } 
                        ?>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        <!--
        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="group_name" id="group_name" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="">Select Group Name</option>
                        <?php
                        /*
                        if(isset($group_list)){
                            foreach ($group_list as $res) {
                                if($res->group_name == $cres_map_details['group_name']){
                                    echo "<option value='".$res->group_name."' selected>".$res->group_name."</option>";    
                                } else {
                                    echo "<option value='".$res->group_name."'>".$res->group_name."</option>";
                                }
                            }
                        } 
                        */
                        ?>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        -->                                    
        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="subject_name" id="subject_name" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="">Select Area of interest</option>
                        <?php
                        if(isset($subject_list)){
                            foreach ($subject_list as $res) {
                                if($res->subject_name == $cres_map_details['subject_name']){
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

        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="resource_id" id="resource_id" class="form-control input" size="1" tabindex="2" aria-required="true">
                        <option value="" selected="">Select Resource</option>
                        <?php
                        if(isset($resource_list)){
                            foreach ($resource_list as $ress) {
                                if($ress->resource_id == $cres_map_details['resource_id']){
                                    echo "<option value='".$ress->resource_id."' selected>".$ress->resource_name."</option>";
                                } else{
                                    echo "<option value='".$ress->resource_id."'>".$ress->resource_name."</option>";
                                }
                            }
                        } 
                        ?>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">   
            <!-- 
            <div class="form-group control-group">
                <div class="control">
                    <div class="input-group date">
                        <input type="text" required="" value="<?php //if(isset($cres_map_details)) echo $cres_map_details['schedule']; ?>" autocomplete="off" name="schedule" id="schedule" class="form-control input schedule" placeholder="Select Publish Date" tabindex="3" aria-required="true"> 
                        <span class="input-group-addon" onclick="show_res_date();"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
                <span class="help-block"></span>
            </div> -->
            <div class="form-group control-group">
                <div class="input-group control">
                    <input type="text" required="" value="<?php if(isset($cres_map_details)) echo $cres_map_details['schedule']; ?>" autocomplete="off" name="schedule" id="schedule" class="form-control input edit-cres-schedule" placeholder="Select Publish Date" tabindex="3" aria-required="true"> 
                    <span class="input-group-btn">
                        <button class="date-button btn btn-default" type="button"><i class="glyphicon glyphicon-th"></i></button>
                    </span>
                </div>
                <div id="edit-cres-date-picker"></div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>

    <div class="row">
                        <div class="box">
                                                     
                            <div class="box-body table-responsive">

                                <table id="edit_resource_browser" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Resource Name</th>
                                            <th>Resource Link</th>
                                            <th>Resource Type</th>
                                            <th>Resource TAG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  $count = 1;
                                            foreach ($resource_list as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->resource_name."</td>";
                                                    echo "<td>".$res->resource_link."</td>";
                                                    echo "<td>".$res->resource_type."</td>";
                                                    echo "<td>".$res->resource_tag."</td>";
                                                    // echo "<td> 
                                                    //         <button type='button' class='btn-sm btn-info'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                    //         <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res->resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                    //       </td>"; 
                                                echo "</tr>";
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Resource Name</th>
                                            <th>Resource Link</th>
                                            <th>Resource Type</th>
                                            <th>Resource TAG</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
    </div>
    <input type="hidden" id="course_res_map_id" value="<?php echo $cres_map_details['map_id'];?>"></input>
</form>
<script src="/static/js/common/validate.js" type="text/javascript"></script>

<!-- Datepicker script -->
<script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
<script type="text/javascript">
// var edit_res_schedule_date = $('.schedule').pickadate({
//     format: 'yyyy-mm-dd',
//     // selectYears: true,
//     // selectMonths: true,
//     editable: true,
//     readOnly: true,
//     min: true
// });
// function show_res_date(){
//     // alert('show date called');
//     edit_res_schedule_date.pickadate('picker').open();
//     event.stopPropagation();
// }

// Latest Working code for piackadate works with : chrome and firefox
var input = $('.edit-cres-schedule').pickadate({
    editable: true, 
    format: 'yyyy-mm-dd',
    min:true, 
    container: '#edit-cres-date-picker',
    onClose: function() {
        $("#EditCourseResourceMapForm").valid(); // Please Give Form id
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
//-----------------------------------------------------------------------

</script>