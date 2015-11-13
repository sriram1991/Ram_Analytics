    // Action -> AJAX Call PDF File Upload with Validation
    $(function() {
        $('#ajax_mentor_pdf_upload').submit(function(e) {
            e.preventDefault();
            if($('#ajax_mentor_pdf_upload').valid()){
                $('#add_pdf_file_btn').button('loading');
                $.ajaxFileUpload({
                    url             :'/resource/ajax_mentor_pdf_upload/', 
                    secureuri       :false,
                    fileElementId   :'resource_pdf_link',
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
                            $("#mentor_add_pdf_modal").modal('hide');
                            get_mentor_resource_list();
                        } else {
                            $('#files').html(obj['msg']);
                            $('#add_pdf_file_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#add_pdf_file_btn').button('reset'); }
            
        });
    });