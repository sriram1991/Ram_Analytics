    // Action -> AJAX Call PDF File Upload with Validation
    $(function() {
        $('#ajax_ppt_upload').submit(function(e) {
            e.preventDefault();
            if($('#ajax_ppt_upload').valid()){
                $('#add_ppt_file_btn').button('loading');
                $.ajaxFileUpload({
                    url             :'/resource/ajax_mentor_ppt_upload/', 
                    secureuri       :false,
                    fileElementId   :'resource_ppt_link',
                    dataType: 'JSON',
                    data: { 
                        subject_name  : $('#subject_name').val(),
                        resource_name : $('#resource_name').val(), 
                        resource_tag  : $("#resource_tag").val(),
                        file_type     : $('#file_type').val() 
                    },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            $("#mentor_add_video_modal").modal('hide');
                            // get_resource_list();
                            get_mentor_resource_list();
                        } else {
                            $('#files').html(obj['msg']);
                            $('#add_ppt_file_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#add_ppt_file_btn').button('reset'); }
            
        });
    });