// Student Form Validation 
$(document).ready(function(){

// Adding New Rule : Student Parent Email Not Same
$.validator.addMethod("studentParent_email_not_same", function(value, element) {
   return $('#student_email').val() != $('#parent_email').val()
}, "*Student and Parent email id cannot be same !");


// Adding New Rule : New Password and Confirm Password Should Be Same
$.validator.addMethod("isPassword_Same", function(value, element) {
   return $('#new_password').val() == $('#confirm_password').val()
}, "*New Password and Confirm Password Should Be Same !");

// Adding Email Validation Rule
$.validator.addMethod("email_format",function(value){
  console.log("sdsdsd"+value);
  return /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/.test(value);
},"Please Enter Valid email id !");

// Adding isParent Email  Validation Rule
$.validator.addMethod("isParent_email_format",function(value){
  if($('#parent_email').val() != ""){
    return /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/.test(value);
  } else return true;
},"Please Enter Valid email id !");

// Adding Password Check 
$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
},'Requires atleast one numeral,lowercase letter !');

// Adding isText  Rule
$.validator.addMethod("isText",function(value){
  return /^[a-zA-Z ]*$/.test(value);
},"Please enter only Alphabet !");

// Adding isNameFormat Rule 
$.validator.addMethod("isNameFormat",function(value){
  return /^[a-zA-Z0-9\.\-\,\&\(\) ]*$/.test(value);
},"Please enter only Alphanumeric,space,dash,Hash");


// Student Registration Form Validation At Signup -----------------------------------------

// Student Registration Form
$("#studentRegistrationFrom").validate({
    rules: {
      student_first_name: {
        required: true,
        isText: true,
        minlength: 3
      },
      student_last_name: {
        required: true,
        isText: true,
        minlength: 1
      },
      student_email: {
        required: true,
        studentParent_email_not_same: true,
        email: true,
        email_format: true,
        remote: {
          url: "/registration/checkEmail",
          type: "post",
          data: {
            email: function() {
              return $( "#student_email" ).val();         // if false -> email already exist
              console.log($( "#student_email" ).val());
            }
          }
        }
      },
      student_phone: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      profile_picture: {
        required: false,
        accept: 'image/*'
      },
      parent_first_name: {
        required: true,
        isText: true,
        minlength: 3
      },
      parent_last_name: {
        required: true,
        isText: true,
        minlength: 1
      },
      parent_email: {
        required: false,
        isParent_email_format: true,
        studentParent_email_not_same: true
        // email: true,
        // email_format: true
      },
      parent_phone: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      address: {
        required: true,
        minlength: 5
      },
      city: {
        required: true,
        isText: true,
        minlength: 3
      },
      state: {
        required: true
      },
      country: {
        required: true
      },
      pincode: {
        minlength: 5,
        maxlength: 6,
        required: true,
        alphanumeric: true
        // remote: {
        //   url: "/registration/checkPincode",
        //   type: "post",
        //   data: {
        //     pincode: function() {
        //       return $( "#pincode" ).val();         // if false -> wrong pincode
        //     }
        //   }
        // }
      },
      skol_terms: {
        required:true
      }
    },

    messages: {
      student_first_name: {
        required: "Please enter User first name !"
      },
      student_last_name: {
        required: "Please enter User last name !"
      },
      student_email: {
        required: "Please enter User email ID !",
        email: "Please enter valid email ID !",
        studentParent_email_not_same: "User and Parent email ID cannot be same !",
        remote: "Email ID already exist !"
      },
      student_phone: {
        required: "Please enter User mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      profile_picture: {
        accept: "Please select PNG or JPEG file"
      },
      parent_first_name: {
        required: "Please enter parent first name !"
      },
      parent_last_name: {
        required: "Please enter parent last name !"
      },
      parent_email: {
        required: "Please enter parent email ID !",
        isParent_email_format: "Please enter valid email ID !",
        studentParent_email_not_same: "User and Parent email ID cannot be same !"
        // remote: "Email id already exist!"
      },
      parent_phone: {
        required: "Please enter parent mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      address: {
        required: "Please enter your address !",
        minlength: "Your address is too short !"
      },
      city: {
        required: "Please enter your city name!",
        minlength: "Please enter minimum 2 Characters !"
      },
      state: {
        required: "Please select your state !"
      },
      country: {
        required: "Please select your country !"
      },
      pincode: {
        required: "Please enter your pincode !",
        minlength: "Please enter your 5 digit pincode !",
        maxlength: "Please enter your 6 digit pincode !"
        // remote: "Please enter correct pincode !"
      },
      skol_terms: {
        required: "Please accept Terms and Condition !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// Edit Student Registration Form
$("#EditRegistrationForm").validate({
    rules: {
      edit_user_fname: {
        required: true,
        isText: true,
        minlength: 3
      },
      edit_user_lname: {
        required: true,
        isText: true,
        minlength: 1
      },
      edit_user_phone: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      edit_address: {
        required: true,
        minlength: 5
      },
      edit_city: {
        required: true,
        isText: true,
        minlength: 3
      },
      edit_state: {
        required: true
        // isText: true,
        // minlength: 2
      },
      edit_country: {
        required: true
        // isText: true,
        // minlength: 2
      },
      pincode: {
        minlength: 5,
        maxlength: 6,
        required: true,
        alphanumeric: true
        // remote: {
        //   url: "/registration/checkPincode",
        //   type: "post",
        //   data: {
        //     pincode: function() {
        //       return $( "#pincode" ).val();         // if false -> wrong pincode
        //     }
        //   }
        // }
      }
    },

    messages: {
      edit_user_fname: {
        required: "Please enter first name !"
      },
      edit_user_lname: {
        required: "Please enter last name !"
      },
      edit_user_phone: {
        required: "Please enter the mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      edit_address: {
        required: "Please enter your address !",
        minlength: "Your address is too short !"
      },
      edit_city: {
        required: "Please enter your city name!",
        minlength: "Please enter minimum 2 Characters !"
      },
      edit_country: {
        required: "Please select your country !"
        // minlength: "Please enter minimum 2 Characters !"
      },
      edit_state: {
        required: "Please select your state name !"
        // minlength: "Please enter minimum 2 Characters !"
      },
      edit_pincode: {
        required: "Please enter your pincode !",
        minlength: "Please enter your 5 digit pincode !",
        maxlength: "Please enter your 6 digit pincode !"
        // remote: "Please enter correct pincode !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// ----------------------------------------------------------------------------------------

// offline payment form
$("#offline_pay").validate({
    rules: {
      bank_name: {
        required: true,
        isNameFormat: true,
        minlength: 3
      },
      challan_no: {
        required: true,
        alphanumeric: true,
        minlength: 6,
        maxlength: 50
      },
      amount: {
        required: true,
        number: true,
        min: 1
      },
      pay_date:{
        required:true,
        date: true
      }

    },
    messages:{
      bank_name: {
        required: "Please enter Bank name !",
        isNameFormat: "Please enter only Alphabet ! "
      },
      challan_no: {
        required: "Please enter valid Challan | Cheque number !",
        alphanumeric: "Please enter Alphanumeric !",
        minlength: "Challan | Cheque No 5 Char Above !",
        maxlength: "Challan | Cheque No Should be less than 51 Char !"
      },
      amount:{
        required: "Please enter paid Amount !",
        number: "Please enter amount in number format !",
        min: "Minimum Payable amount is 1 Rs !"
      },
      pay_date:{
        required: "Please enter date of payment !",
        date: "please enter in valid format YYYY-MM-DD !"
      }
    },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});



// Associate Registration Form Validation At Signup -----------------------------------------

// For Associate 
$("#associateRegistrationFrom").validate({
    rules: {
      first_name: {
        required: true,
        isText: true,
        minlength: 3
      },
      last_name: {
        required: true,
        isText: true,
        minlength: 1
      },
      email: {
        required: true,
        email: true,
        email_format: true,
        remote: {
          url: "/registration/checkEmail",
          type: "post",
          data: {
            email: function() {
              return $( "#email" ).val();         // if false -> email already exist
            }
          }
        }
      },
      phone: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      address: {
        required: true,
        minlength: 5
      },
      city: {
        required: true,
        isText: true,
        minlength: 3
      },
      state: {
        required: true
      },
      country: {
        required: true
      },
      pincode: {
        minlength: 5,
        maxlength: 6,
        required: true,
        alphanumeric: true
        // remote: {
        //   url: "/registration/checkPincode",
        //   type: "post",
        //   data: {
        //     pincode: function() {
        //       return $( "#pincode" ).val();         // if false -> wrong pincode
        //     }
        //   }
        // }
      },
      ass_skol_terms: {
        required:true
      },
      profile_picture: {
        required: false,
        accept: 'image/*'
      },
      organization_name: {
        required: true,
        isText: true,
        minlength: 3,
        maxlength: 35
      },
      student_count: {
        required: true,
        digits: true,
        min: 5
      },
      letter_of_intent: {
        required: true,
        minlength: 30,
        maxlength: 250
      }

    },

    messages: {
      first_name: {
        required: "Please enter your first name !"
      },
      last_name: {
        required: "Please enter your last name !"
      },
      email: {
        required: "Please enter your email ID !",
        email: "Please enter valid Email ID !",
        remote: "Email ID already exist !"
      },
      phone: {
        required: "Please enter your mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      address: {
        required: "Please enter your address !",
        minlength: "Your address is too short !"
      },
      city: {
        required: "Please enter your city name !",
        minlength: "Please enter minimum 2 Characters !"
      },
      state: {
        required: "Please select your state !"
      },
      country: {
        required: "Please select your country !"
      },
      pincode: {
        required: "Please enter your pincode !",
        minlength: "Please enter your 5 digit pincode !",
        maxlength: "Please enter your 6 digit pincode !"
        // remote: "Please enter correct pincode !"
      },
      ass_skol_terms: {
        required: "Please accept Terms and Condition !"
      },
      profile_picture: {
        accept: "Please select PNG or JPEG file"
      },
      organization_name: {
        required: "Please Enter your organization name !",
        isText: "Please enter only alphabet !",
        minlength: "Organization name should be minimum 3 Characters !",
        maxlength: "Organization name should not be more than 35 Characters !"
      },
      student_count: {
        required: "Please enter approx no of users count !",
        min: "You should have minimum 5 no of users !"
      },
      letter_of_intent: {
        required: "Please fill your Letter of Intent !",
        minlength: "Please enter minimum 30 Characters !",
        maxlength: "Letter of Intent should be less than 250 Characters !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// add Student student Bulk upload Form
$("#AddStudentForm").validate({
    rules: {
      fname: {
        required: true,
        isText: true,
        minlength: 3
      },
      lname: {
        required: true,
        isText: true,
        minlength: 1
      },
      mobile: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      email: {
        required: true,
        email: true,
        email_format: true
      },
      parent_name:{
        required: true,
        isText: true,
        minlength: 3
      },
      address: {
        required: true,
        minlength: 5
      }
    },

    messages: {
      fname: {
        required: "Please enter first name !"
      },
      lname: {
        required: "Please enter last name !"
      },
      mobile: {
        required: "Please enter the mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      email: {
        required: "Please enter your email ID !",
        email: "Please enter valid Email ID !",
        remote: "Email ID already exist !"
      },
      parent_name: {
        required: "Please enter Organization name !"
      },
      address: {
        required: "Please enter your address !",
        minlength: "Your address is too short !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// Update Student student Bulk upload Form
$("#UpdateStudentForm").validate({
    rules: {
      fname: {
        required: true,
        isText: true,
        minlength: 3
      },
      lname: {
        required: true,
        isText: true,
        minlength: 1
      },
      mobile: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      email: {
        required: true,
        email: true,
        email_format: true
      },
      parent_name:{
        required: true,
        isText: true,
        minlength: 3
      },
      address: {
        required: true,
        minlength: 5
      }
    },

    messages: {
      fname: {
        required: "Please enter first name !"
      },
      lname: {
        required: "Please enter last name !"
      },
      mobile: {
        required: "Please enter the mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      email: {
        required: "Please enter your email ID !",
        email: "Please enter valid Email ID !",
        remote: "Email ID already exist !"
      },
      parent_name: {
        // required: "Please enter first name !"
        required: "Please enter Organization name !"
      },
      address: {
        required: "Please enter your address !",
        minlength: "Your address is too short !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------



// ----------------------------------------------------------------------------------------
//  Change Password and Reset Password Validation 
// ----------------------------------------------------------------------------------------

// For ChangePassword Form 
$("#ChangePWDForm").validate({
    rules: {
      old_password: {
        required: true,
        minlength: 5,
        remote: {
          url: "/common/Profile_Controller/check_user_pwd",
          type: "post",
          data: {
            old_password: function() {
              return $("#old_password").val();
            }
          }
        }
      },
      new_password: {
        required: true,
        pwcheck: true,
        // isPassword_Same: true,
        alphanumeric: true,
        minlength: 8,
        maxlength: 20
      },
      confirm_password: {
        required: true,
        pwcheck: true,
        isPassword_Same: true,
        alphanumeric: true,
        minlength: 8,
        maxlength: 20
      }
    },

    messages: {
      old_password: {
        required: "Please enter your old password !",
        minlength: "Your password should be minimum 5 Characters !",
        maxlength: "Your password should not be more than 20 Characters !",
        remote: "Please enter password correctly !"
      },
      new_password: {
        required: "Please enter new password !",
        alphanumeric: "Only alphanumeric characters are allowed !",
        minlength: " Your password should be minimum 8 Characters !",
        maxlength: "Your password should not be more than 20 Characters !"
        // isPassword_Same: "Your New Password and Confirm Password should be name !"
      },
      confirm_password: {
        required: "Please enter confirm password !",
        alphanumeric: "only alphanumeric characters are allowed !",
        minlength: " Your password should be minimum 8 Characters !",
        maxlength: "Your password should not be more than 20 Characters !",
        isPassword_Same: "Your new password and confirm password should be same !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// For Forgot Password  
$("#ResetPWDForm").validate({
    rules: {
      reset_user_email: {
        required: true,
        //email:true,
        email_format: true,
        remote: {
          url: "/reset/isEmailValid",
          type: "POST",
          data: {
            reset_user_email: function() {
              return $("#reset_user_email").val();
            }
          }
        }
      }
    },

    messages: {
      reset_user_email: {
        required: "Please enter your email ID !",
        //email: "Please enter the valid email address",
        email_format:"Please enter the valid email ID !",
        remote: "Your email ID does not exist. please contact admin@ask_analytics.com !"
      }
      
    }, 
      
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------





// General Profile Update Validation at All User's ----------------------------------------


// Used At : Profile update 
$("#ajax_profile_update").validate({
    rules: {
      user_phone: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      user_photo: {
        required: false,
        accept: "image/*"
      }
    },

    messages: {
      user_phone: {
        required: "Please enter your mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      user_photo:{
        accept: "Please select PNG or JPEG file"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// Used At : Profile update 
$("#BasicForm").validate({
    rules: {
      first_name: {
        required: true,
        isText: true,
        minlength: 3
      },
      last_name: {
        required: true,
        isText: true,
        minlength: 1
      },
      phone: {
        minlength: 10,
        maxlength: 10,
        required: true,
        digits: true
      },
      address: {
        required: true,
        minlength: 5
      },
      city: {
        required: true,
        isText: true,
        minlength: 3
      },
      state: {
        required: true
      },
      country: {
        required: true,
        isText: true,
        minlength: 2
      },
      pincode: {
        minlength: 5,
        maxlength: 6,
        required: true,
        alphanumeric: true
        // remote: {
        //   url: "/registration/checkPincode",
        //   type: "post",
        //   data: {
        //     pincode: function() {
        //       return $( "#pincode" ).val();         // if false -> wrong pincode
        //     }
        //   }
        // }
      }
    },

    messages: {
      first_name: {
        required: "Please enter your first name !"
      },
      last_name: {
        required: "Please enter your last name !"
      },
      phone: {
        required: "Please enter your mobile number !",
        minlength: "Please enter 10 digits mobile number !",
        maxlength: "Please enter 10 digits mobile number !"
      },
      address: {
        required: "Please enter your address !",
        minlength: "Your address is too short !"
      },
      city: {
        required: "Please enter your city name!",
        minlength: "Please enter minimum 2 Characters !"
      },
      state: {
        required: "Please select your state !"
      },
      country: {
        required: "Please enter your country name!",
        minlength: "Please enter minimum 2 Characters !"
      },
      pincode: {
        required: "Please enter your pincode !",
        minlength: "Please enter your 5 digit pincode !",
        maxlength: "Please enter your 6 digit pincode !"
        // remote: "Please enter correct pincode !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------




// ----------------------------------------------------------------------------------------
// Resource Adding , Editing, Uploading Files Validation 
// ----------------------------------------------------------------------------------------

// For PDF Resource Adding : AJAX File Upload at PDF Resource Upload (Add_PDF)
$('#ajax_file_upload').validate({
  rules: {
      subject_name:{
        required: true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_link: {
        required: true,
        accept: "application/pdf"
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_link: {
        required: "Please select a PDF resource file !",
        accept: "Please select valid PDF file !"
      },
      resource_tag: {
        required: "Please enter resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For Video Resource Adding : Name , URL , TAG (Add_Video)
$("#VideoForm").validate({
    rules: {
      subject_name:{
        required:true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_link: {
        required: true,
        url: true
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_link: {
        required: "Please enter a resource link !",
        url: "Please enter a valid URL !"
      },
      resource_tag: {
        required: "Please enter a resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For PDF Resource Editing : Resource Name , Resource Tag (Edit_Resource)
// For Edit Resource 
$("#EditResForm").validate({
    rules: {
      edit_resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            edit_resource_name: function() {
              console.log('Res '+$("#edit_resource_name").val());
              return $("#edit_resource_name").val();
            },
            resource_id : function() {
              return $("#EditResForm").find('#resource_id').val();
            }
          }
        }
      },
      edit_resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      
    },

    messages: {
      edit_resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name already is exist !"
      },
      
      edit_resource_tag: {
        required: "Please enter a resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});
// ----------------------------------------------------------------------------------------





// Subject Validation At Content Admin ----------------------------------------------------

// For Subject Form 
$("#AddSubjectForm").validate({
    rules: {
      subject_name: {
        required: true,
        isNameFormat: true,
        minlength: 4,
        remote: {
          url: "/isPresent/subject",
          type: "post",
          data: {
            subject_name: function() {
              return $("#subject_name").val();
            }
          }
        }
      },
      subject_description: {
        required: true,
        minlength: 8
      },
      subject_fee:{
        required: true,
        number:true,
        min:0,
        max: 500000
      }
    },

    messages: {
      subject_name: {
        required: "Please enter a Area of Interest !",
        remote: "Area of Interest is already exist !"
      },
      subject_description: {
        required: "Please enter a Area of Interest description !",
        minlength: "Area of Interest description should be more than 8 Characters !"
      },
      subject_fee:{
        required: "Please Enter Area of Interest Fee !",
        number: "Please Enter Area of Interest Fee in numbers !",
        min: "minimum Area of Interest fee can be 0",
        max: "Area of Interest fee should not be more than 500000"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For Subject Editing 
$("#EditSubForm").validate({
    rules: {
      edit_subject_name: {
        required: true,
        isNameFormat: true,
        minlength: 4,
        remote: {
          url: "/isPresent/subject",
          type: "post",
          data: {
            edit_subject_name: function() {
              console.log('Res '+$("#edit_subject_name").val());
              return $("#edit_subject_name").val();
            },
            subject_id : function() {
              return $("#EditSubForm").find('#subject_id').val();
            }
          }
        }
      },
      edit_subject_description: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      edit_subject_fee:{
        required: true,
        number:true,
        min:0.00,
        max: 500000
      }
      
    },

    messages: {
      edit_subject_name: {
        required: "Please enter a Area of Interest Name !",
        remote: "Area of Interest name is already exist !"
      },
      
      edit_subject_description: {
        required: "Please enter a Area of Interest description !"
      },
      edit_subject_fee:{
        required: "Please Enter Area of Interest Fee !",
        number: "Please Enter Area of Interest Fee in numbers !",
        min: "minimum Area of Interest fee can be 0",
        max: "Area of Interest fee should not be more than 500000"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------



// Course Validation At Content Admin -----------------------------------------------------

// For Course Form 
$("#AddCourseForm").validate({
    rules: {
      course_name: {
        required: true,
        isNameFormat: true,
        minlength: 4,
        remote: {
          url: "/isPresent/course",
          type: "post",
          data: {
            course_name: function() {
              return $("#course_name").val();
            }
          }
        }
      },
      course_description: {
        required: true,
        minlength: 8
      },
      course_duration: {
        required: true,
        digits: true,
        min: 1
      },
      course_type: {
        required: true
      },
      course_fee:{
        required: true,
        number:true,
        min:0,
        max: 500000
      },
      course_status:{
        required: true
      },
      course_syllabus_file:{
        accept: 'application/pdf'
      }
    },
    messages: {
      course_name: {
        required: "Please enter a course name !",
        remote: "Course name is already exist !"
      },
      course_description: {
        required: "Please enter a course description !",
        minlength: "Course description should be more than 8 characters !"
      },
      course_duration: {
        required: "Please enter a course duration !",
        digits: "Please enter duration in months !",
        min: "Minimum course duration is 1 month !"
      },
      course_type:{
        required: "Please select course type !"
      },
      course_fee:{
        required: "Please enter a course Fee !",
        number:"Please enter course Fee in digits ! ",
        min:"Minimum course fee is 0 rupees !",
        max:"Maximum course fee should not be more than 500000 rupees !"
      },
      course_status:{
        required: "Please select Course Status !"
      },
      course_syllabus_file:{
        accept: "Course syllabus file should be in pdf format !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For Edit Course Form 
$("#EditCourseForm").validate({
    rules: {
      edit_course_name: {
        required: true,
        isNameFormat: true,
        minlength: 4,
        remote: {
          url: "/isPresent/course",
          type: "post",
          data: {
            edit_course_name: function() {
              console.log('Res '+$("#edit_course_name").val());
              return $("#edit_course_name").val();
            },
            course_id : function() {
              return $("#EditCourseForm").find('#edit_course_id').val();
            }
          }
        }
      },
      edit_course_description: {
        required : true,
        minlength: 8
      },
      edit_course_duration: {
        required: true,
        digits  : true,
        min: 1
      },
      edit_course_type: {
        required: true
      },
      edit_course_fee:{
        required  : true,
        min : 0,
        max : 500000

      },
      edit_course_status:{
        required: true
      },
      edit_course_syllabus_file:{
        required: true,
        accept: 'application/pdf'
      }
    },
    messages: {
      edit_course_name: {
        required: "Please enter a course name !",
        remote: "Course name is already exist !"
      },
      edit_course_description: {
        required: "Please enter a course description !",
        minlength: "Course description should be more than 8 Characters !"
      },
      edit_course_duration: {
        required: "Please enter a course duration !"
      },
      edit_course_type:{
        required: "Please select course type !"
      },
      edit_course_fee:{
        required: "Please enter a course fee !",
        digits:"Please enter course fee in digits ! ",
        min:"Minimum course fee is 0 rupees !",
        max:"Maximum course fee should not be more than 500000 rupees !"
      },
      edit_course_status:{
        required: "Please select Course Status"
      },
      edit_course_syllabus_file:{
        required: "Please Select The Course Syllabus File !",
        accept: "Course syllabus must be in pdf format !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------

// Course Resource Validation At Content Admin --------------------------------------------

// For AddCourseResourceMapForm validation 
$("#AddCourseResourceMapForm").validate({
    rules: {
      module_name: {
        required: true
      },
      group_name: {
        required: true
      },
      subject_name: {
        required: true
      },
      resource_id: {
        required: true
      },
      schedule: {
        required: true,
        date: true
        // min: -1
      }
    },

    messages: {
      module_name: {
        required: "Please select Module !"
      },
      group_name:{
        required: "Please select Group !"
      },
      subject_name: {
        required: "Please select a Area of Interest !"
      },
      resource_id: {
        required: "Please select a resource !"
      },
      schedule: {
        required: "Please select publish date !",
        date: "Please enter valid date format:YYYY-MM-DD !"
        // min: "minimum syllabus schedule is 1 week !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For EditCourseResourceMapForm validation 
$("#EditCourseResourceMapForm").validate({
    rules: {
      module_name: {
        required: true
      },
      group_name: {
        required: true
      },
      subject_name: {
        required: true
      },
      resource_id: {
        required: true
      },
      schedule: {
        required: true,
        date: true
        // min: -1
      }
    },

    messages: {
      module_name: {
        required: "Please select Module !"
      },
      group_name:{
        required: "Please select Group !"
      },
      subject_name: {
        required: "Please select a Area of Interest !"
      },
      resource_id: {
        required: "Please select a resource !"
      },
      schedule: {
        required: "Please select publish date !",
        date: "Please enter valid date format:YYYY-MM-DD !"
        // min: "minimum syllabus schedule is 1 week !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------

// Course Assessment Validation At Content Admin ------------------------------------------
// For AddCourseAssessmentMapForm validation 
$("#AddCourseAssessmentMapForm").validate({
    rules: {
      module_name: {
        required: true
      },
      group_name: {
        required: true
      },
      subject_name: {
        required: true
      },
      resource_id: {
        required: true
      },
      schedule: {
        required: true,
        date: true
        // min: -1
      }
    },

    messages: {
      module_name: {
        required: "Please select Module !"
      },
      group_name:{
        required: "Please select Group !"
      },
      subject_name: {
        required: "Please select a Area of Interest !"
      },
      resource_id: {
        required: "Please select a Test No !"
      },
      schedule: {
        required: "Please select publish date !",
        date: "Please enter valid date format:YYYY-MM-DD !"
        // min: "minimum syllabus schedule is 1 week !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For EditCourseAssessmentMapForm validation 
$("#EditCourseAssessmentMapForm").validate({
    rules: {
      module_name: {
        required: true
      },
      group_name: {
        required: true
      },
      subject_name: {
        required: true
      },
      resource_id: {
        required: true
      },
      schedule: {
        required: true,
        date: true
        // min: -1
      }
    },

    messages: {
      module_name: {
        required: "Please select Module !"
      },
      group_name:{
        required: "Please select Group !"
      },
      subject_name: {
        required: "Please select a Area of Interest !"
      },
      resource_id: {
        required: "Please select a Test No !"
      },
      schedule: {
        required: "Please select publish date !",
        date: "Please enter valid date format:YYYY-MM-DD !"
        // min: "minimum syllabus schedule is 1 week !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ----------------------------------------------------------------------------------------

// Syllabus Validation At Content Admin ---------------------------------------------------

// For AddSyllabusForm Form (Add_Syllabus)
$("#AddSyllabusForm").validate({
    rules: {
      module_name: {
        required: true
      },
      group_name: {
        required: true
      },
      subject_name: {
        required: true
      },
      resource_id: {
        required: true
      },
      schedule: {
        required: true,
        date: true
        // min: -1
      }
    },

    messages: {
      module_name: {
        required: "Please select Module !"
      },
      group_name:{
        required: "Please select Group !"
      },
      subject_name: {
        required: "Please select a Area of Interest !"
      },
      resource_id: {
        required: "Please select a resource !",
      },
      schedule: {
        required: "Please select publish date !",
        date: "Please enter valid date format:YYYY-MM-DD !"
        // min: "minimum syllabus schedule is 1 week !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});




// For PDF Assessment Adding : AJAX File Upload at PDF Assessment Upload 
$('#ass_file_upload').validate({
  rules: {
    test_name: {
      required:true,
      isNameFormat:true
    },
    test_subject:{
      required:true,
      isNameFormat:true
    },
    test_no: {
      required: true,
      digits: true,
      min: 1,
      remote: {
        url: "/isPresent/assessment",
        type: "post",
        data: {
          test_no: function() {
            return $("#test_no").val();
          }
        }
      }
    },
    test_description:{
      required:true,
      minlength:6
    },
    no_of_questions: {
        required:true,
        digits:true,
        min:1,
        max:500
    },
    test_type:{
      required:true,
      isNameFormat:true
    },
    test_date:{
      required:true,
      date: true
    },
    test_duration:{
      required:true,
      digits:true,
      min:1
    },
    upload_ques_paper: {
        required: true,
        accept: "application/pdf"
      }
    },

    messages: {
      test_no:{
        required:"Please enter the test no !",
        digits:"Please enter in digits !",
        min:"Test no should start from 1 !",
        remote:"Test no already exist !"
      },
      test_subject:{
        required: "Please enter the Area of Interest name ! "
      },
      test_name: {
        required: "Please enter the test name !"
      },
      test_description:{
        required: " Please enter the test description !"
      },
      no_of_questions:{
        required:"Please enter the No of Questions !",
        digits: "Please enter the no of question in digits !",
        min:"Number should be more than 1 !",
        max:"Number should not be more than 500 !"
      },
      test_type:{
        required: "Please enter the test type ! "
      },
      test_date:{
        required:"Please select the date !"
      },
      test_duration:{
        required:"Please enter the test duration !",
        digits:"Please enter the duration in digits !"
      },
      upload_ques_paper: {
        required: "Please select a PDF question paper !",
        accept: "Please select valid PDF file !"
      }
   },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// For Edit Assessment  

$('#EditAssForm').validate({
  rules: {
    edit_test_name: {
      required:true,
      isNameFormat:true
    },
    edit_test_subject:{
      required:true,
      isNameFormat:true
    },
    edit_test_description:{
      required:true,
      minlength:6
    },
    edit_no_of_questions: {
        required:true,
        digits:true,
        min:1,
        max:500
    },
    edit_test_type:{
      required:true,
      isNameFormat:true
    },
    edit_test_date:{
      required:true,
      date: true
    },
    edit_test_duration:{
      required:true,
      digits:true,
      min:1
    }
  },

    messages: {
      edit_test_subject:{
        required: "Please enter the Area of Interest name ! "
      },
      edit_test_name: {
        required: "Please enter the test name !"
      },
      edit_test_description:{
        required: " Please enter the test description !"
      },
      edit_no_of_questions:{
        required:"Please enter the No of Questions !",
        digits: "Please enter the no of question in digits !",
        min:"Number should be more than 1 !",
        max:"Number should not be more than 500 !"
      },
      edit_test_type:{
        required: "Please enter the test type ! "
      },
      edit_test_date:{
        required:"Please select the date !"
      },
      edit_test_duration:{
        required:"Please enter the test duration !",
        digits:"Please enter the duration in digits !"
      }
   },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});



// ----------------------------------------------------------------------------------------


// ---------------------------------------------------------------------------------------
// Batch Management Validaton at Admin ---------------------------------------------------
// ---------------------------------------------------------------------------------------

// For Add Batch Form 
$("#AddBatchForm").validate({
    rules: {
      batch_name: {
        required: true,
        isNameFormat: true,
        minlength: 4,
        remote: {
          url: "/isPresent/batch",
          type: "post",
          data: {
            batch_name: function() {
              return $("#batch_name").val();
            }
          }
          
        }
      },
      batch_description: {
        required: true,
        minlength: 8
      },
      batch_start_date:{
        required: true,
        date: true
      },
      batch_course_id: {
        required: true,
        digits: true,
        min: 1
      }
      
    },

    messages: {
      batch_name: {
        required: "Please enter a Batch name !",
        remote  : "Batch name is already exist !"
      },
       batch_description: {
        required  : "Please enter a batch description !",
        minlength : "Batch description should be more than 8 Characters !"
      },
      batch_start_date:{
        required: "Please select the date !",

      },
      batch_course_id: {
        required: "Please select a Course !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
  
});

// For Edit Batch Form 
$("#EditBatchForm").validate({
    rules: {
      edit_batch_name: {
        required: true,
        isNameFormat: true,
        minlength: 4,
        remote: {
          url: "/isPresent/batch",
          type: "post",
          data: {
            edit_batch_name: function() {
              console.log('Res '+$("#edit_batch_name").val());
              return $("#edit_batch_name").val();
            },
            edit_batch_course_id : function() {
              return $("#EditBatchForm").find('#edit_batch_course_id').val();
            }
          }
        }
      },
      edit_batch_description: {
        required: true,
        minlength: 8
      },
      edit_batch_course_id: {
        required: true,
        digits: true,
        min: 1
      }
      
    },
    messages: {
      edit_batch_name: {
        required: "Please enter a Batch name !",
        remote: "Batch name is already exist !"
      },
      edit_batch_description: {
        required: "Please enter a batch description !",
        minlength: "Batch description should be more than 8 Characters !"
      },
      edit_batch_course_id: {
        required: "Please select a course !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
  
});
// ---------------------------------------------------------------------------------------



// ---------------------------------------------------------------------------------------
// Associate Document's Verification 
// ---------------------------------------------------------------------------------------
// sriram has been changed....
// For Associate 
$("#associateRegistrationFrom1").validate({
    rules: {
      degree: {
        required: true
      },
      upload: {
        required: true,
        accept: "application/pdf"
      },
      expertise: {
        required: true
      },
      course_handel: {
        required:true
      },
      batch: {
        required: true
      },
      skol_terms: {
        required: true
      }
    },

    messages: {
      degree: {
        required: "Please select your Highest Degree !"
      },
      upload: {
        required: "Please select a PDF resource file !",
        accept: "Please select valid PDF file !"
      },
      expertise: {
        required: "Please select expertise !"
      },
       course_handel: {
        required: "Please select course !"
      },
      batch: {
        required: "Please select batch !"
      },
      skol_terms:{
        required: "Please accept Terms and Conditions !"
      }
    },
             
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ---------------------------------------------------------------------------------------

// Director Registration -----------------------------------------------------------------
  // For Director 
  $("#directorRegistrationFrom").validate({
      rules: {
        first_name: {
          required: true,
          isText: true,
          minlength: 3
        },
        last_name: {
          required: true,
          isText: true,
          minlength: 1
        },
        email: {
          required: true,
          email: true,
          email_format: true,
          remote: {
            url: "/registration/checkEmail",
            type: "post",
            data: {
              email: function() {
                return $( "#email" ).val();         // if false -> email already exist
              }
            }
          }
        },
        phone: {
          minlength: 10,
          maxlength: 10,
          required: true,
          digits: true
        },
        address: {
          required: true,
          minlength: 5
        },
        city: {
          required: true,
          isText: true,
          minlength: 3
        },
        state: {
          required: true
        },
        country: {
          required: true
        },
        pincode: {
          minlength: 5,
          maxlength: 6,
          required: true,
          alphanumeric: true
          // remote: {
          //   url: "/registration/checkPincode",
          //   type: "post",
          //   data: {
          //     pincode: function() {
          //       return $( "#pincode" ).val();         // if false -> wrong pincode
          //     }
          //   }
          // }
        },
        subject_id: {
          required:true
        },
        profile_picture: {
          required: false,
          accept: 'image/*'
        }
      },

      messages: {
        first_name: {
          required: "Please enter your first name !"
        },
        last_name: {
          required: "Please enter your last name !"
        },
        email: {
          required: "Please enter your email ID !",
          email: "Please enter valid Email ID !",
          remote: "Email ID already exist !"
        },
        phone: {
          required: "Please enter your mobile number !",
          minlength: "Please enter 10 digits mobile number !",
          maxlength: "Please enter 10 digits mobile number !"
        },
        address: {
          required: "Please enter your address !",
          minlength: "Your address is too short !"
        },
        city: {
          required: "Please enter your city name !",
          minlength: "Please enter minimum 2 Characters !"
        },
        state: {
          required: "Please select your state !"
        },
        country: {
          required: "Please select your country !"
        },
        pincode: {
          required: "Please enter your pincode !",
          minlength: "Please enter your 5 digit pincode !",
          maxlength: "Please enter your 6 digit pincode !"
          // remote: "Please enter correct pincode !"
        },
        subject_id: {
          required: "Please Select Mentor/SME Area of Interest"
        },
        profile_picture: {
          accept: "Please select PNG or JPEG file"
        }
      },
      
      highlight: function(element) {
      $(element).closest('.control-group').removeClass('success').addClass('error');
      },
      unhighlight: function(element) {
      $(element).closest('.control-group').removeClass('error').addClass('success');
      },
      success: function(element) {  
      //$(element).closest('.control-group').find('.fillimg').addClass('valid');
      // What is ".fillimg"?  That's not a real word.       
      },
      errorPlacement: function (error, element) {
      $(element).closest('.control-group').find('.help-block').html(error.text());
      }
  });

// Edit Director Registration -----------------------------------------------------------------
  // For Director 
  $("#EditdirectorRegistrationForm").validate({
      rules: {
        edit_first_name: {
          required: true,
          isText: true,
          minlength: 3
        },
        edit_last_name: {
          required: true,
          isText: true,
          minlength: 1
        },
        edit_phone: {
          minlength: 10,
          maxlength: 10,
          required: true,
          digits: true
        },
        address: {
          required: true,
          minlength: 5
        },
        edit_city: {
          required: true,
          isText: true,
          minlength: 3
        },
        edit_state: {
          required: true
        },
        edit_country: {
          required: true
          // isText: true,
          // minlength: 2
        },
        edit_pincode: {
          minlength: 5,
          maxlength: 6,
          required: true,
          alphanumeric: true
          // remote: {
          //   url: "/registration/checkPincode",
          //   type: "post",
          //   data: {
          //     pincode: function() {
          //       return $( "#pincode" ).val();         // if false -> wrong pincode
          //     }
          //   }
          // }
        },
        edit_subject_id: {
          required:true
        }
        
      },

      messages: {
        edit_first_name: {
          required: "Please enter your first name !"
        },
        edit_last_name: {
          required: "Please enter your last name !"
        },
        email: {
          required: "Please enter your email ID !",
          email: "Please enter valid Email ID !",
          remote: "Email ID already exist !"
        },
        edit_phone: {
          required: "Please enter your mobile number !",
          minlength: "Please enter 10 digits mobile number !",
          maxlength: "Please enter 10 digits mobile number !"
        },
        edit_address: {
          required: "Please enter your address !",
          minlength: "Your address is too short !"
        },
        edit_city: {
          required: "Please enter your city name !",
          minlength: "Please enter minimum 2 Characters !"
        },
        edit_state: {
          required: "Please select your state !"
        },
        edit_country: {
          required: "Please select your country !"
          // minlength: "Please enter minimum 2 Characters !"
        },
        edit_pincode: {
          required: "Please enter your pincode !",
          minlength: "Please enter your 5 digit pincode !",
          maxlength: "Please enter your 6 digit pincode !"
          // remote: "Please enter correct pincode !"
        },
        edit_subject_id: {
          required: "Please Select Director Area of Interest"
        }
      },
      
      highlight: function(element) {
      $(element).closest('.control-group').removeClass('success').addClass('error');
      },
      unhighlight: function(element) {
      $(element).closest('.control-group').removeClass('error').addClass('success');
      },
      success: function(element) {  
      //$(element).closest('.control-group').find('.fillimg').addClass('valid');
      // What is ".fillimg"?  That's not a real word.       
      },
      errorPlacement: function (error, element) {
      $(element).closest('.control-group').find('.help-block').html(error.text());
      }
  });
// ---------------------------------------------------------------------------------------

// ---------------------------------------------------------------------------------------
// Associate Subject subscription
// ---------------------------------------------------------------------------------------
// For Associate Subject subscription
$("#AssociateJoinSubjectForm").validate({
    rules: {
      subject: {
        required: true
      },
      skol_terms: {
        required: true
      }
    },

    messages: {
      subject:{
        required: "Please Select a Area of Interest !"
      },
      skol_terms:{
        required: "Please accept Terms and Conditions !"
      }
    },
             
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// ---------------------------------------------------------------------------------------
// For Forgot Password  
$("#LinkCourseForm").validate({
    rules: {
      search_user_email: {
        required: true,
        remote: {
          url: "/registrar/isThisStudentExists/",
          type: "POST",
          data: {
            search_user_email: function() {
              //console.log($("#search_user_email").val());
              return $("#search_user_email").val();
            }
          }
        }
      },
      amount_paid:{
        required: true,
        number: true
      },
      link_course:{
        required: true
      }
    },

    messages: {
      search_user_email: {
        required: "Please enter valid User email ID or registration number !",
        remote: "User email ID does not exist please check !"
      },
      amount_paid: {
        required: "Please Enter Amount !"
      },
      link_course:{
        required: "Please Select Course !" 
      }
    }, 

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For Forgot Password  
$("#LinkCourseSmeForm").validate({
    rules: {
      search_user_email: {
        required: true,
        remote: {
          url: "/registrar/isThisMentorExists/",
          type: "POST",
          data: {
            search_user_email: function() {
              //console.log($("#search_user_email").val());
              return $("#search_user_email").val();
            }
          }
        }
      },
      // amount_paid:{
      //   required: true,
      //   number: true
      // },
      link_course:{
        required: true
      }
    },

    messages: {
      search_user_email: {
        required: "Please enter valid User email ID or registration number !",
        remote: "User email ID does not exist please check !"
      },
      // amount_paid: {
      //   required: "Please Enter Amount !"
      // },
      link_course:{
        required: "Please Select Course !" 
      }
    }, 

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

//---------------------------------------------------------------------------------------

// link student with associate validation in admin
$("#linkstudent").validate({
    rules: {
      student_registration_no: {
        required: true,
        remote: {
          url: "/admin/isThereNoStudentLink/",
          type: "POST",
          data: {
            student_registration_no: function() {
              console.log($("#student_registration_no").val());
              return $("#student_registration_no").val();
            }
          }
        }
      },
      associate_registration_no: {
        required: true,
        remote: {
          url: "/admin/isThereAssociateExists/",
          type: "POST",
          data: {
            associate_registration_no: function() {
              console.log($("#associate_registration_no").val());
              return $("#associate_registration_no").val();
            }
          }
        }
      }

    },
    messages:{
      student_registration_no: {
        required: "Please enter valid User registration number !",
        remote: "Please enter valid User registration number who has subscribed for any course !"
      },
      associate_registration_no: {
        required: "Please enter valid SPOC registration number !",
        remote: "Please enter valid SPOC registration number !"
      }
    },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// unlink student with associate validation in admin login
$("#unlinkstudent").validate({
    rules: {
      search_user_email: {
        required: true,
        remote: {
          url: "/admin/isThereStudentLink/",
          type: "POST",
          data: {
            search_user_email: function() {
              //console.log($("#search_user_email").val());
              return $("#search_user_email").val();
            }
          }
        }

      }
    },
    messages:{
      search_user_email: {
        required: "Please enter valid User registration number !",
        remote: "This User is not linked with any Mentor !"
      }
    },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

//
$("#addLicenseForm").validate({
    rules:{
      mail_body:{
        required:true,
        minlength:10,
        maxlength:250

      },
      license_no:{
        required:true,
        digits:true,
        minlength:1
      }
    },
    messages:{
      mail_body:{
        required:"Please enter message in body !",
        minlength:"Please enter minimum 10 Characters",
        maxlength:"You are message should not exided 250 Characters"
      },
      license_no:{
        required:"Please enter No of License required !",
        digits:"Only digits are allowed",
        minlength: "Please enter minimum 2 Characters !"
      }
    },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


// unlink student with associate validation in admin login
$("#couponcode_GenerationFrom").validate({
      rules: {
          no_of_coupons: {
            required: true,
            digits: true
          },
          discount_amount :{
            required :true,
            digits: true
          },
          valid_till :{
            required :true,
            date:true
          }
        },
    messages:{
        no_of_coupons: {
          required: "Please enter No.of Promo code's to be generated",
          digits  : "Please enter Digits only"
        },
        discount_amount: {
          required: "Please enter Final Amount",
          digits  : "Please enter Digits only"
        },
        valid_till: {
          required : "Please enter the expiry date",
          digits   : "Please enter valid date"
        }
     },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For PPT Resource Adding : AJAX MENTOR PPT FILE UPLOAD
$('#ajax_ppt_upload').validate({
  rules: {
      subject_name:{
        required: true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_ppt_link: {
        required: true,
        extension: "ppt|pptx"
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_ppt_link: {
        required: "Please select a PPT resource file !",
        extension: "Please select valid .ppt or .pptx file !"
      },
      resource_tag: {
        required: "Please enter resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For PPT Resource Adding : AJAX MENTOR PPT FILE UPLOAD
$('#ajax_mentor_video_upload').validate({
  rules: {
      subject_name:{
        required: true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_video_link: {
        required: true,
        accept: "video/mpeg,video/mp4"
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_video_link: {
        required: "Please select a Video resource file !",
        accept: "Please select valid mp4 or mpeg file !"
      },
      resource_tag: {
        required: "Please enter resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For Audio Resource Adding : AJAX MENTOR AUDIO FILE UPLOAD
$('#ajax_mentor_audio_upload').validate({
  rules: {
      subject_name:{
        required: true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_audio_link: {
        required: true,
        accept: "audio/*"
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_audio_link: {
        required: "Please select a Video resource file !",
        accept: "Please select valid mp3 or audio file !"
      },
      resource_tag: {
        required: "Please enter resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For PDF Resource Adding : AJAX Mentor PDF File Upload 
$('#ajax_mentor_pdf_upload').validate({
  rules: {
      subject_name:{
        required: true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_pdf_link: {
        required: true,
        accept: "application/pdf"
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_pdf_link: {
        required: "Please select a PDF resource file !",
        accept: "Please select valid PDF file !"
      },
      resource_tag: {
        required: "Please enter resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// validation for License Request
$("#addLicenseForm").validate({
    rules:{
      mail_body:{
        required:true,
        minlength:30,
        maxlength:250

      },
      license_no:{
        required:true,
        digits:true,
        minlength:1
      }
    },
    messages:{
      mail_body:{
        required:"Please enter message in body !",
        minlength:"Please enter minimum 30 Characters",
        maxlength:"You are message should not exided 250 Characters"
      },
      license_no:{
        required:"Please enter No of License required !",
        digits:"Only digits are allowed",
        minlength: "Please enter minimum 2 Characters !"
      }
    },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});


//  validation of response for requested license 
$("#grantLicenseForm").validate({
    rules:{
      requested_license_count:{
        required:true,
         minlength: 1,
        digits:true
      },
      req_license_cost:{
        required:true,
         minlength: 1,
        digits:true
      }
    },
    messages:{
      requested_license_count:{
        required:"Please enter number of License you want to grant !",
        minlength:"At least 1 license required",
        digits:"Only digits are allowed"
      },
      req_license_cost:{
        required:"Please enter the cost of License !",
        minlength:"Enter valid license amount",
        digits:"Only digits are allowed"
      }
    },

    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
  
});


// Ajax Mentor Assessment Upload Validation 
$('#ajax_mentor_assessment_upload').validate({
  rules: {
    test_name: {
      required:true,
      isNameFormat:true
    },
    test_subject:{
      required:true,
      isNameFormat:true
    },
    test_no: {
      required: true,
      digits: true,
      min: 1,
      remote: {
        url: "/isPresent/assessment",
        type: "post",
        data: {
          test_no: function() {
            return $("#test_no").val();
          }
        }
      }
    },
    test_description:{
      required:true,
      minlength:6
    },
    no_of_questions: {
        required:true,
        digits:true,
        min:1,
        max:500
    },
    test_type:{
      required:true,
      isNameFormat:true
    },
    test_date:{
      required:true,
      date: true
    },
    test_duration:{
      required:true,
      digits:true,
      min:1
    },
    upload_ques_paper: {
        required: true,
        accept: "application/pdf"
      }
    },

    messages: {
      test_no:{
        required:"Please enter the test no !",
        digits:"Please enter in digits !",
        min:"Test no should start from 1 !",
        remote:"Test no already exist !"
      },
      test_subject:{
        required: "Please enter the Area of Interest name ! "
      },
      test_name: {
        required: "Please enter the test name !"
      },
      test_description:{
        required: " Please enter the test description !"
      },
      no_of_questions:{
        required:"Please enter the No of Questions !",
        digits: "Please enter the no of question in digits !",
        min:"Number should be more than 1 !",
        max:"Number should not be more than 500 !"
      },
      test_type:{
        required: "Please enter the test type ! "
      },
      test_date:{
        required:"Please select the date !"
      },
      test_duration:{
        required:"Please enter the test duration !",
        digits:"Please enter the duration in digits !"
      },
      upload_ques_paper: {
        required: "Please select a PDF question paper !",
        accept: "Please select valid PDF file !"
      }
   },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// For Captiva Resource Adding : AJAX Captiva FILE UPLOAD
$('#ajax_captiva_upload').validate({
  rules: {
      subject_name:{
        required: true
      },
      resource_name: {
        required: true,
        isNameFormat: true,
        minlength: 3,
        remote: {
          url: "/isPresent/resource",
          type: "post",
          data: {
            resource_name: function() {
              return $("#resource_name").val();
            }
          }
        }
      },
      resource_tag: {
        required: true,
        isNameFormat: true,
        minlength: 1
      },
      resource_captiva_link: {
        required: true,
        extension: "zip"
      }
    },

    messages: {
      subject_name:{
        required: "Please select Area of Interest !"
      },
      resource_name: {
        required: "Please enter a resource name !",
        remote: "Resource name is already exist !"
      },
      resource_captiva_link: {
        required: "Please select a captiva zip file !",
        extension: "Please select valid captiva zip file !"
      },
      resource_tag: {
        required: "Please enter resource tag !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});

// Action : This is used in admin login where granting license for area of interest
$('#license_granting').validate({
  rules: {
      license_count_:{
        required: true,
        digits:true,
        min:1
      },
      discount_amount_: {
        required:true,
        digits:true,
        min:1
      }
    },

    messages: {
      license_count_:{
        required:"Please enter the No of Questions !",
        digits: "Please enter the no of question in digits !",
        min:"Should have atleast 1 License !"
      },
      discount_amount_: {
        required:"Please enter the No of Questions !",
        digits: "Please enter the no of question in digits !",
        min:"Please enter valid amount !"
      }
    },
    
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
    $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function(element) {  
    //$(element).closest('.control-group').find('.fillimg').addClass('valid');
    // What is ".fillimg"?  That's not a real word.       
    },
    errorPlacement: function (error, element) {
    $(element).closest('.control-group').find('.help-block').html(error.text());
    }
});




// Note:
// Please Add all your code here :) 


}); // End For Document Ready
