    // Action -> AJAX Call-> Adding Assessment data & PDF File Upload with Validation
    $(function() {
        $('#ass_file_upload').submit(function(e) {
            e.preventDefault();
            //alert("Im getting called");
            if($('#ass_file_upload').valid() && check_test_date()) {
                $('#assessment_pdf').button('loading');
                $.ajaxFileUpload({
                    url             :'/resource/assessment_file_upload/', 
                    secureuri       :false,
                    fileElementId   :'upload_ques_paper',
                    dataType        : 'JSON',
                    data: { 
                            test_no          : $('#test_no').val(),
                            test_subject     : $('#test_subject').val(),
                            test_name        : $('#test_name').val(),
                            test_description : $('#test_description').val(),
                            no_of_questions  : $('#no_of_questions').val(),
                            test_type        : $('#test_type').val(),
                            test_date        : $('#test_date').val(),
                            test_duration    : $('#test_duration').val(),
                            upload_ques_paper: $('#upload_ques_paper').val(),
                            start_time       : $('#start_time').val(),
                            end_time         : $('#end_time').val()   
                          },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            $("#load-assmodal").modal('hide');
                            get_assessment_list();
                        } else {
                            $('#files').html(obj['msg']);
                            $('#assessment_pdf').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#assessment_pdf').button('reset'); }
            
        });
    function check_test_date() {
        if($('#test_date').val()){
            return true;
        } else {
            alert('Please Enter Test Date');
            return false;
        }
    }
    });