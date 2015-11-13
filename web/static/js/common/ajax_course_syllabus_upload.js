    // Action -> AJAX Call AddCourseForm with PDF File Upload with Validation
    $(function() {
        $('#AddCourseForm').submit(function(e) {
            e.preventDefault();
            if($('#AddCourseForm').valid()){
                $('#add_course_btn').button('loading');
                $.ajaxFileUpload({
                    url             :'/resource/add_course_with_file', 
                    secureuri       :false,
                    fileElementId   :'course_syllabus_file',
                    dataType: 'JSON',
                    data: { 
                        course_name: $("#addCourseModal").find('#course_name').val(), 
                        course_description: $("#addCourseModal").find('#course_description').val(),
                        course_duration: $("#addCourseModal").find('#course_duration').val(),
                        course_type: $("#addCourseModal").find('#course_type').val(),
                        course_fee:$("#addCourseModal").find('#course_fee').val(),
                        course_status: $("#addCourseModal").find('#course_status').val()
                    },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            $("#addCourseModal").modal('hide');
                            get_course_list();
                        } else {
                            $('#files').html(obj['msg']);
                            $('#add_course_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#add_course_btn').button('reset'); }
            
        });
    });