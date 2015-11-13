// Action : AJAX Profile Picture Upload with Validation
    $(function() {
        $('#ajax_profile_update').submit(function(e) {
            e.preventDefault();
            if($('#ajax_profile_update').valid()){
                $("#update_profile_btn").button('loading');
                $.ajaxFileUpload({
                    url             :'/profile/ajax_profile_update/', 
                    secureuri       :false,
                    fileElementId   :'user_photo',
                    dataType: 'JSON',
                    data: { 
                        user_email      : $("#user_email").val(), 
                        user_phone      : $("#user_phone").val(),
                        profile_picture : $("#profile_picture").val() 
                    },
                    success : function (data) {
                        var obj = jQuery.parseJSON(data);                
                        if(obj['status'] == 'success') {
                            $('#files').html(obj['msg']);
                            // Redirect to home 
                            window.location.replace('/');
                        } else {
                            $('#files').html(obj['msg']);
                            $('#update_profile_btn').button('reset');
                        }
                    }
                });
                return false;   
            } else { $('#update_profile_btn').button('reset'); }
            
        });
    });