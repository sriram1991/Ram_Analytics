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
    <link href="/static/js/plugins/bootstrap/docs/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/static/js/plugins/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

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

    <div class="container">

      <div class="starter-template">
        <h1>Welcome to <?php echo PRODUCT_NAME; ?></h1>
        
        <!-- Sign in Form Start *************************** -->
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-info" >
                
                <div class="panel-heading">
                  <div class="panel-title">Sign In</div>
                  <div style="float:right; font-size: 80%; position: relative; top:-10px">
                    <a href="#">Forgot password?</a>
                  </div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form id="loginform" class="form-horizontal" role="form">
                      <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
                      </div>
                                
                      <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                      </div>
                      
                      <div class="input-group" role="group">
                        <div class="checkbox">
                          <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                          </label>
                          <label>
                              <!-- Button -->
                                <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                          </label>
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <div class="col-md-12 control" style="top: 10px;">
                          <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account! 
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                              Sign Up Here
                            </a>
                          </div>
                        </div>
                      </div>    
                  </form>     
                </div>                     
            </div>  
        </div>
      </div>
      <!-- Sign in Form Ended *************************** -->

      <!-- Sign up Form Start *************************** -->
      <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">Sign Up</div>
              <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>  
            <div class="panel-body">
                <a href="/registration/student_reg">
                <button type="button" class="btn btn-primary" style="display: inline; float: left;">
                  <span class="glyphicon glyphicon-user" aria-hidden="true">
                    Signup as Student
                  </span>
                </button>
              </a>

                <button type="button" class="btn btn-warning" style="display: inline; float: right;">
                  <span class="glyphicon glyphicon-user" aria-hidden="true">
                    Signup as Associate
                  </span>
                </button>
            </div>
          </div>
        </div>
      <!-- Sign in Form Ended *************************** -->

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/js/common/jquery-min.js"></script>
    <script src="/static/js/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/static/js/plugins/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>