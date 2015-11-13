<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title><?php echo PRODUCT_NAME;?> TRAINER</title>
  <meta charset="utf-8">
  	
  <link href="/assets/css/admin/global.css" rel="stylesheet" type="text/css">

  <link href="/assets/css/admin/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/admin/datepicker.css" rel="stylesheet" type="text/css">
  
  <script type="text/javascript" src="/assets/plugins/jqlayout/js/jquery-latest.js"></script>
  <!-- <script type="text/javascript" src="/assets/js/jquery-migrate-1.0.0.js"></script> -->
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/assets/js/admin.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap-datepicker.js"></script>
 
</head>
<body style="background:#c3c3c3;" >
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	        <a class="brand"><?php echo PRODUCT_NAME;?></a>
	        <ul class="nav">
	        
	       <!-- <li>
	            <a href="/trainer/courses">Courses</a>
	        </li>  -->
	        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="/trainer/change_password">Change Password</a>
	            </li>  
	          
	            <li>
	              <a href="/trainer/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
