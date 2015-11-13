    // Action -> AJAX Call PDF File Upload with Validation
    $(function() {
        $('#ajax_file_upload').submit(function(e) {
            e.preventDefault();
            if($('#ajax_file_upload').valid()){
                $('#add_pdf_btn').button('loading');
                $.ajaxFileUpload({
                    url             :'/resource/upload_file/', 
                    secureuri       :false,
                    fileElementId   :'resource_link',
                    dataType: 'JSON',
                    data: { 
                        subject_name: $('#subject_name').val(),
                        resource_name : $('#resource_name').val(), 
                        resource_tag: $("#resource_tag").val() 
                    },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            $("#addPDFRes").modal('hide');
                            get_resource_list();
                        } else {
                            $('#files').html(obj['msg']);
                            $('#add_pdf_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#add_pdf_btn').button('reset'); }
            
        });
    });