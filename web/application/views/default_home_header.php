<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo PRODUCT_NAME; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" href="/static/img/<?php echo FAVICON_IMAGE;?>" type="image/gif">
        <!-- BootStrap CSS -->
        <link href="/static/theme/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/static/theme/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Font-Awesome icons -->
        <link href="/static/theme/common/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="/static/theme/common/ionicons-1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Skol System Icons -->
        <link href="/static/fonts/skol-icons-font/skol-icons-font.css" rel="stylesheet" type="text/css"></link>
        <style type="text/css">
            .skol_logo{
                height: 90%;
                margin-top: -6px;
            }
        </style>

        <!-- Script JQuery Library 1.9 -->
        <script src="/static/js/common/jquery.min.js" type="text/javascript"></script>
        <!-- Script JQuery Validation.js -->
        <script src="/static/js/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/static/js/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
        
        <!-- SKOL Validation Script -->
        <script src="/static/js/common/validate.js" type="text/javascript"></script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img class="skol_logo" src="/static/img/<?php echo PRODUCT_LOGO;?>">
                <?php // echo PRODUCT_NAME; ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>

        <header>
            