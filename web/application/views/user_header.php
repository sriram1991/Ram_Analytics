<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo PRODUCT_NAME;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" href="/static/img/<?php echo FAVICON_IMAGE;?>" type="image/gif">
        <link href="/static/theme/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/static/theme/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="/static/theme/common/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="/static/theme/common/ionicons-1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- SKOL COMMON CSS -->
        <link href="/static/css/common/skol.css" rel="stylesheet" type="text/css"></link>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- JQuery Library 1.9 -->
        <script src="/static/theme/common/js/jquery.min.js" type="text/javascript"></script>
        <!-- Script JQuery Validation.js -->
        <script src="/static/js/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/static/js/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
        <!-- SKOL Validation Script -->
        <script src="/static/js/common/validate.js" type="text/javascript"></script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href='<?php echo $user_home ?>' class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img class="skol_logo" src="/static/img/<?php echo PRODUCT_LOGO;?>">
                <?php // echo PRODUCT_NAME;?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="nav-text-white">
                                   <?php
                                   echo $data['user_fname']." ".$data['user_lname']
                                   ?>
                                 <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Body -->
                                <?php $user_id = $data['user_id']; ?>
                                <li class="user-body" onClick='open_profile("<?php echo $user_id;?>");'>
                                    <div class="col-xs-4 col-sm-8 col-md-8">
                                      <?php 
                                      echo "<a href='#profile'>Profile</a>";
                                      ?>
                                    </div>
                                </li>

                                <li class="user-body" data-toggle="modal" data-target="#change_pwd_model">
                                    <div class="col-xs-4 col-sm-8 col-md-8">
                                        <a href="#">Change Password</a>
                                    </div>
                                 </li> 

                                <li class="user-body" onClick="window.location.replace('/logout');">
                                    <div class="col-xs-4 col-sm-8 col-md-8">
                                        <a href="/logout">
                                            <i class="fa icon-sign-out"></i>
                                            <i>Logout</i> 
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
<!-- Skol-Fontastic-icons -->
<link href="/static/fonts/skol-icons-font/skol-icons-font.css" rel="stylesheet" type="text/css"></link>

<!-- CHANGE Password Model Start-->
<div class="modal fade" id="change_pwd_model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onClick="$('.input').val('');" class="close" data-dismiss="modal" aria-label="close" ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>

      <div class="modal-body" id="body-change_pwd_model">

       <form method="POST" action="#" name="ChangePWDForm" id="ChangePWDForm" role="form">
          <div class="row"> 
              <div class="col-xs-12 col-sm-8 col-md-8">   
                 <div class="form-group control-group">
                  <div class="control">
                    <input type="password" required autocomplete="off" name="old_password" id="old_password" class="form-control input" placeholder="Old Password" tabindex="1">
                  </div>
                <span class="help-block"></span>
               </div>
             </div>
          </div>

          <div class="row"> 
     
            <div class="col-xs-12 col-sm-8 col-md-8">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="password" required autocomplete="off" name="new_password" id="new_password" class="form-control input" placeholder="New Password" tabindex="2">
                  </div>
                <span class="help-block"></span>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-xs-12 col-sm-8 col-md-8">
                <div class="form-group control-group">
                  <div class="control">
                    <input type="password" required autocomplete="off" name="confirm_password" id="confirm_password" class="form-control input" placeholder="Confirm Password" tabindex="3">
                  </div>
                <span class="help-block"></span>
              </div>
            </div>
          </div>
        </form> <!--  </div>-->

      </div>
    
     
                               
        
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onClick="change_password();">Set Password</button tabindex="4">
        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal">Cancel</button tabindex="5">
  
      </div>
    </div>
    </div>
</div>
<!-- CHANGE Password Model Ended-->

<div class="wrapper row-offcanvas row-offcanvas-left">

<style type="text/css">
[class*="icon"] {
    color: #eee;
}
</style>
