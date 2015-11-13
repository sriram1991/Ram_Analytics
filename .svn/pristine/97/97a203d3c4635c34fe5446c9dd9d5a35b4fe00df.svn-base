<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

<form method="POST" action="#" name="EditCourseForm" id="EditCourseForm" role="form">
    <div class="row"> 
                                                
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $course_details['course_name']; ?>" required="" autocomplete="off" name="edit_course_name" id="edit_course_name" class="form-control input" placeholder="Course Name" tabindex="1" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $course_details['course_description']; ?>" required="" autocomplete="off" name="edit_course_description" id="edit_course_description" class="form-control input" placeholder="Course Description" tabindex="2" aria-required="true">
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>
    
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" value="<?php echo $course_details['course_duration']; ?>"  required="" autocomplete="off" name="edit_course_duration" id="edit_course_duration" class="form-control input" placeholder="Course Duration" tabindex="3" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="edit_course_type" id="edit_course_type" class="form-control input" size="1" tabindex="4" aria-required="true">
                        <option value="">Select Course Type</option>
                        <option value="Student" <?php if(strcmp($course_details['course_type'],"Student") == 0) echo "selected"; ?> >Student</option>
                        <option value="Associate" <?php if(strcmp($course_details['course_type'],"Associate") == 0) echo "selected"; ?> >Associate</option>
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
                    <input type="text" value="<?php echo $course_details['course_fee']; ?>"  required="" autocomplete="off" name="edit_course_fee" id="edit_course_fee" class="form-control input" placeholder="Course Fee" tabindex="5" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="edit_course_status" id="edit_course_status" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="">Select Course Status</option>
                        <option value="Published" <?php if($course_details['course_status'] == 'Published') echo 'selected';?> >Published</option>
                        <option value="UnPublished" <?php if($course_details['course_status'] == 'UnPublished') echo 'selected';?> >UnPublished</option>
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
                    <input type="file" required="" autocomplete="off" name="edit_course_syllabus_file" id="edit_course_syllabus_file" class="form-control input" placeholder="Upload Question Paper" tabindex="9" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <div id="files" class="error_file"></div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $course_details['course_id']; ?>" name="edit_course_id" id="edit_course_id">
    <input type="hidden" value="<?php echo $course_details['course_syllabus_file']; ?>" name="old_course_syllabus_file" id="old_course_syllabus_file">

</form>

<script src="/static/js/common/ajaxfileupload.js" type="text/javascript"></script>
<script src="/static/js/common/ajax_edit_course_syllabus_upload.js" type="text/javascript"></script>
<!-- Validation Script To Make Enable in Ajax Call -->
<script src="/static/js/common/validate.js" type="text/javascript"></script>