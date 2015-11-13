    // Action -> AJAX Call EditCourseForm with PDF File Upload with Validation
    $(function() {
        $('#EditCourseForm').submit(function(e) {
            e.preventDefault();
            if($('#EditCourseForm').valid()){
                $('#edit_course_btn').button('loading');
                $.ajaxFileUpload({
                    url             :'/resource/update_course_with_file', 
                    secureuri       :false,
                    fileElementId   :'edit_course_syllabus_file',
                    dataType: 'JSON',
                    data: { 
                        course_id           : $("#EditCourseForm").find('#edit_course_id').val(),
                        course_name         : $("#EditCourseForm").find('#edit_course_name').val(), 
                        course_description  : $("#EditCourseForm").find('#edit_course_description').val(),
                        course_duration     : $("#EditCourseForm").find('#edit_course_duration').val(),
                        course_type         : $("#EditCourseForm").find('#edit_course_type').val(),
                        course_fee          : $("#EditCourseForm").find('#edit_course_fee').val(),
                        course_status       : $("#EditCourseForm").find('#edit_course_status').val(),
                        old_course_syllabus : $("#EditCourseForm").find('#old_course_syllabus_file').val()
                    },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            $("#editCourseModal").modal('hide');
                            $("#body-edit_course").html("");
                            get_course_list();
                        } else {
                            $('#files').html(obj['msg']);
                            $('#edit_course_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#edit_course_btn').button('reset'); }
            
        });
    });