<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/static/js/bootstrap/favicon.ico">

    <title> <?php echo PRODUCT_NAME; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="/static/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/static/css/bootstrap/starter-template.css" rel="stylesheet">

    <!-- Script JQuery Library 1.9 -->
    <script src="/static/js/common/jquery.min.js" type="text/javascript"></script>
    <!-- Script JQuery Validation.js -->
    <script src="/static/js/valitation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/static/js/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php echo PRODUCT_NAME; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Bootstrap Container Start
    ================================================== -->
    <div class="container">

            <script type="text/javascript" > 

$(document).ready(function(){

$('#user_role').on('change',function(){

    var user_role=$(this).val();

    if(user_role==='5'){

        $('#user_franchisee').hide();

            $.ajax({ 
                type:"POST",
                url:"/admin/student_controller/getAllCourses",
                                  
                success:function(response){
                     //alert(response);
                    $('#user_course').html(response);
                      
                    $('#user_course').on('change',function(){

                            if($('#user_role').val()==='5'){

                                $.ajax({ 
                                    type:"POST",
                                    url:"/admin/student_controller/get_subjects_from_course",
                                    data: {course_id:$(this).val()},
                          
                                    success:function(response){
                                        //alert(response);
                                      
                                        $('#teacher_subjects').html(response);
                                        $('#teacher_subjects').show();  
                             
                                    }
                                
                                });

                            }

                        

                    });
                    
                }
                        
            });

    }

   if(user_role==='4'){


        $('#user_franchisee').show();  
        $('#user_course').html("");
        $('#user_course').html("<option value='' selected>Select a course</option>");
        $('#teacher_subjects').hide();

   }



});


$('#user_franchisee').on('change',function(){

    $.ajax({ 
        type:"POST",
        url:"/admin/student_controller/get_course_from_franchisee",
        data: {franch_id:$(this).val()},
                  
        success:function(response){
                     //alert(response);
            $('#user_course').html(response);
                     
        }
                        
    });


}); 


 $.validator.addMethod("specialChar", function(value) {
     //return  /([0-9a-zA-Z\s])$/.test(value);
     return /^[A-Za-z0-9]*$/.test(value)
  }, "Please Fill Correct Value in Field.");    

 $.validator.addMethod("acceptor", function(value) {
    var param="[a-zA-Z]+";
    return value.match(new RegExp("^" + param + "$"));
 });

$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});

$('#sturegister').validate({

    rules: {
                user_role: {

                   required:true

                },

               // "teacher_subjects[]":"required",

                user_franchisee: {
                   required: true
                },

                user_course: {
                   required: true
                },

                
                user_fname: {
                    minlength: 2,
                    specialChar:true,
                    required: true
                },
                
                user_lname: {
                    minlength: 1,
                    acceptor: true,
                    required: true
                },

                user_login: {
                    minlength: 4,
                    specialChar:true,
                    required: true,
                    remote: {
                        url: "/admin/student_controller/check_login",
                        type: "post",
                        data: {
                            user_login: function() {
                            return $( "#user_login" ).val();
                            }
                        }
                    }
                },

                user_password: {
                    
                    pwcheck: true,
                    required: true,
                    minlength: 8

                },

                confirm_password: {
                     required: true,
                     equalTo: "#org_password"
                },

                user_email: {
                    
                    required:true,
                    email: true,
                    remote: {
                        url: "/admin/student_controller/check_email",
                        type: "post",
                        data: {
                            user_email: function() {
                            return $( "#user_email" ).val();
                            }
                        }
                    }
                },

                user_phone: {
                    minlength:10,
                    maxlength:10,
                    required: true,
                    digits:true
                },
                

                user_address: {
                    minlength: 2,
                    required: true
                },

                user_city: {
                    minlength: 2,
                    required: true
                },

                
                user_state: {
                   required: true
                },

                user_country: {
                    minlength: 2,
                    required: true
                },


                user_pin: {
                    minlength:6,
                    maxlength:6,
                    digits:true,
                    required: true
                },



       },
    
    messages: {

            user_login: {
                    
                    specialChar:"special characters not allowed",
                    remote:"User name already present"         
                    
                },
           
           /*,
            user_lname: {
                    required: "Last name is required"
                },
            user_login: {
                    
                    required: "Last name is required"
                },*/
            user_course:{

                required:"Atleast one course must be selected, if no course is present under this franchisee, create course for this franchisee first"
            },    
            user_password: {
                    
                    pwcheck: "Requires atleast one numeral,lowercase letter",
                    required: "Password is required",
                    

                },

            confirm_password: {
                     
                     required: "confirmation required",
                     equalTo:"Password not matching"


                },

            user_email: {
                    
                      email: "Invalid e-mail format",
                      remote: "E-mail id already exists"
                },

            user_phone: {
                    maxlength:"Only ten digits allowed",
                    
                },
            user_lname: {

                acceptor:"Only alphabets allowed"

            },     

            /*address: {
                    minlength: 2,
                    required: true
                },

            user_city: {
                    minlength: 2,
                    required: true
                },

                
            user_state: {
                   required: true
                },

            user_country: {
                    minlength: 2,
                    required: true
                },

            */
            user_pin: {
                    minlength: "Pincode should be 6  digits",
                    maxlength: "Pincode should be 6 digits"
                    //required: true
                },

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


$('#sturegister').submit(function(){



if($('#teacher_subjects').val()=='' && $('#teacher_subjects').is(':visible')){

    alert("subject not selected");
    $('#teacher_subjects').focus(); 
    return false;
}


});


/*$('#teacher_subjects').multiselect({

noneSelectedText: 'Select subjects',
//includeSelectAllOption: true,
enableFiltering: true,
filterPlaceholder: 'Search subjects'

});*/

$('#cancelstuadd').click(function(){

        //alert('hi');
        window.location.replace('/admin/student/');



    });

})


</script>


<div class="container">
    <div class="row-fluid">
        <div class="span9 ">

       <form name="create_student_form" id="sturegister" class="form-inline well" method="POST" action="/admin/student/addstud/">
        <hr><h3> User Registration Form</h3><hr>
        <div id="header-in">
        <div id="id1">
        <!-- User Details-->
        <fieldset id="userpg" class="span4" style="float:left;margin-left:40px;"><legend>Student Info</legend>

         <!--<div class="control-group">
            
            
            <div class="controls">
             <select name="user_role" autocomplete ="off" id="user_role" size="1" placeholder="State">
                      <option value="" >select role</option>
                      <option value="4">Student</option>
                      <option value="5">Teacher</option>
             </select>                 
        
        
        </div>
        <span class="help-block"></span> 
        </div>  -->

        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">State *</label> -->

            <div class="controls">
            <span class="color" >*</span>
             <select name="user_franchisee" autocomplete ="off" id="user_franchisee" size="1" placeholder="Franchisee">
                      <option value="" selected>Franchisee</option>
                      <?php 
                      foreach($franchisee as $franch) {
                      echo "<option value=".$franch['franchisee_id']." >".$franch['franchisee_name']."</option>";
                      }
                      ?>
                      
              </select>
            <span class="fillimg"> </span>  
                
        </div>
        <span class="help-block"></span>      
        </div>

        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">State *</label> -->
            <div class="controls">
             <span class="color" >*</span>
             <select name="user_course" autocomplete ="off" id="user_course" size="1" placeholder="Course">
                      <option value='' selected>Select a Course</option>;
                      
                      
              </select>
            <span class="fillimg"> </span>  
                
        </div>
        <span class="help-block"></span>      
        </div>

        

         <div class="control-group">
            
            <!--<label for="inputError" class="control-label">First Name *</label>-->
            <div class="controls">
              <span class="color" >*</span>
         
              <input autocomplete="off"  type="text" class="input" name="user_fname" placeholder="First Name"/>
           </div>
        <span class="help-block"></span> 
        </div>
         <div class="control-group">
            
            <!--<label for="inputError" class="control-label">Middle Name</label>-->
            <div class="controls">
             <span class="space"></span>
             <input autocomplete="off"  type="text" class="input" name="user_mname" placeholder="Middle Name"/>
                <span class="fillimg"> </span>              
            </div>
            <span class="help-block"></span> 
        </div>
        
        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">Last Name *</label> -->
            <div class="controls">

                <span class="color" >*</span>
                <input autocomplete="off" type="text" class="input" name="user_lname" placeholder="Last Name"/>
                <span class="fillimg"> </span>
        </div>
        <span class="help-block"></span> 
        </div>
        
        </fieldset>
        <!-- Login Details-->
        <fieldset id="userpg" style="float:left; margin-left:40px;" ><legend> Login Details</legend>
        <div class="control-group">
            
            <!--<label for="inputError" class="control-label">User Name *</label>-->
            <div class="controls">
            <span class="color" >*</span>
            <input autocomplete="off" type="text" class="input" name="user_login" id="user_login" placeholder="User Name"/>
            <span class="fillimg"> </span>
        
        </div>
        <span class="help-block"></span> 

        </div>
         <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">Password *</label> -->
            <div class="controls">
             <span class="color" >*</span>
         
            <input autocomplete="off"  type="password" id="org_password" class="input" name="user_password" placeholder="Password" />   
            <span class="fillimg"> </span>
            </div>
            <span class="help-block"></span> 
        </div>
        
        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">Confirm Password *</label> -->
            <div class="controls">
            <span class="color" >*</span>
            <input autocomplete="off"  type="password" class="input"id="password2" name="confirm_password" placeholder="Confirm Password"/>     
            <span class="fillimg"> </span>
                
        </div>
            <span class="help-block"></span> 
        </div>  
        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">E-Mail ID *</label> -->
            <div class="controls">
                <span class="color" >*</span>
            
                <input autocomplete="off" type="email" class="input" name="user_email" id="user_email" placeholder="E-Mail ID"/>
                <span class="fillimg"> </span>
                
        </div>
            <span class="help-block"></span> 
        </div>
        <div class="control-group">
            
            <!--<label for="inputError" class="control-label">Mobile No:* +91-</label>-->
            <div class="controls">
            <span class="color" >*</span>
            <input autocomplete="off"  type="text" class="input" name="user_phone" id="user_phone" maxlength="10" placeholder="Mobile No:* +91-" />
            <span class="fillimg"> </span>

        </div>
        <span class="help-block"></span>
        </div>  
        
        </fieldset>
        
        <!-- Address Details-->
        <fieldset id="userpg" style="float:left; margin-left:40px;"><legend> Address Info</legend>
        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">Address *</label> -->
            <div class="controls">
                 <span class="color" >*</span>
                 <textarea autocomplete="off"  id="address" name="user_address" rows="5" placeholder="Address"></textarea>
                 <span class="fillimg"> </span>
            
                <!-- <input autocomplete="off" value="" type="text" class="input" name="user_address" placeholder="Address *" /> -->
                
        </div>
        <span class="help-block"></span>
        </div>  
        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">City *</label> -->
            <div class="controls">
                <span class="color" >*</span>
            
                <input autocomplete="off" type="text" class="input" name="user_city" placeholder="City"/>
                <span class="fillimg"> </span>
                
        </div>
        <span class="help-block"></span> 
        </div>  
        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">State *</label> -->
            <div class="controls">
             <span class="color" >*</span>
             <select name="user_state" autocomplete ="off" id="user_state" size="1" placeholder="State">
                      <option value="" selected>State</option>
                      <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="Assam">Assam</option>
                      <option value="Bihar">Bihar</option>
                      <option value="Chandigarh">Chandigarh</option>
                      <option value="Chhattisgarh">Chhattisgarh</option>
                      <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                      <option value="Daman and Diu">Daman and Diu</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Goa">Goa</option>
                      <option value="Gujarat">Gujarat</option>
                      <option value="Haryana">Haryana</option>
                      <option value="Himachal Pradesh">Himachal Pradesh</option>
                      <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                      <option value="Jharkhand">Jharkhand</option>
                      <option value="Karnataka">Karnataka</option>
                      <option value="Kerala">Kerala</option>
                      <option value="Lakshadweep">Lakshadweep</option>
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                      <option value="Manipur">Manipur</option>
                      <option value="Meghalaya">Meghalaya</option>
                      <option value="Mizoram">Mizoram</option>
                      <option value="Nagaland">Nagaland</option>
                      <option value="Orissa">Orissa</option>
                      <option value="Pondicherry">Pondicherry</option>
                      <option value="Punjab">Punjab</option>
                      <option value="Rajasthan">Rajasthan</option>
                      <option value="Sikkim">Sikkim</option>
                      <option value="Tamil Nadu" >Tamil Nadu</option>
                      <option value="Tripura">Tripura</option>
                      <option value="Uttaranchal">Uttaranchal</option>
                      <option value="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="West Bengal">West Bengal</option>
              </select>
            <span class="fillimg"> </span>  
                
        </div>
        <span class="help-block"></span>      
        </div>  
        



        <div class="control-group">
            
           <!-- <label for="inputError" class="control-label">Postal Code *</label> -->
            <div class="controls">
            <span class="color" >*</span>
            
            <input autocomplete="off" type="text" class="input" id="user_pin" name="user_pin" placeholder="Postal Code" />
            <span class="fillimg"> </span>  
        </div>
        <span class="help-block"></span> 
        </div>  
    

        <div class="control-group">
            
            <!-- <label for="inputError" class="control-label">Country</label> -->
            <div class="controls">
                <span class="color" >*</span>
            
                <input autocomplete="off" type="text" class="input" name="user_country" placeholder="Country" />
                <span class="fillimg"> </span>
                
        </div>
        <span class="help-block"></span> 
        </div>  
                
        </fieldset>   
        <fieldset style="clear:both"></fieldset>
            <div class="form-actions">
                <button class="btn btn-primary" id="addstu" type="submit">Submit</button>
                <button class="btn" id="cancelstuadd" type="button">Cancel</button> 
                    
            </div>
        </div>
        </div>
      </form>
            </div><!-- for user_form-->
 
        </div>
        
    </div>
    <!-- Bootstrap Container End
    ================================================== -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/js/bootsrap/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/static/js/bootsrap/ie10-viewport-bug-workaround.js"></script>
    <script src="/static/js/bootsrap/ie-emulation-modes-warning.js"></script>
  </body>
</html>