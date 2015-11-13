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
    <link href="/static/js/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/static/js/plugins/bootstrap/docs/examples/cover/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/static/js/plugins/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
ra
  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"> Welcome to <?php echo PRODUCT_NAME; ?></h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Students</a></li>
                  <li><a href="#">Associates</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="site-wrapper-inner">
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
                      
                      <div class="input-group">
                        <div class="checkbox">
                          <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                          </label>
                        </div>
                      </div>

                      <div style="margin-top:10px" class="form-group">
                      <!-- Button -->
                        <div class="col-sm-12 controls">
                          <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                          <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 control">
                          <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account! 
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                              Sign Up here
                            </a>
                          </div>
                        </div>
                      </div>    
                  </form>     
                </div>                     
            </div>  
        </div>
        
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">Sign Up</div>
              <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>  
            <div class="panel-body" >
              <form id="signupform" class="form-horizontal" role="form">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                  <p>Error:</p>
                  <span></span>
                </div>
                                    
                <div class="form-group">
                  <label for="email" class="col-md-3 control-label">Email</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="email" placeholder="Email Address">
                  </div>
                </div>
                                    
                <div class="form-group">
                  <label for="firstname" class="col-md-3 control-label">First Name</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="firstname" placeholder="First Name">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="lastname" class="col-md-3 control-label">Last Name</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                      <input type="password" class="form-control" name="passwd" placeholder="Password">
                    </div>
                </div>
                                    
                <div class="form-group">
                  <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="icode" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                <!-- Button -->                                        
                  <div class="col-md-offset-3 col-md-9">
                    <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                      <span style="margin-left:8px;">or</span>  
                  </div>
                </div>
                                
                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                  <div class="col-md-offset-3 col-md-9">
                    <button id="btn-fbsignup" type="button" class="btn btn-primary">
                      <i class="icon-facebook"></i>   Sign Up with Facebook
                    </button>
                  </div>                                           
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>

          <div class="btn-group btn-group-lg" role="group" >
            <button type="button" class="btn btn-primary" aria-label="Left Align">
              <span class="glyphicon glyphicon-user" aria-hidden="true">
                Signup as Student
              </span>
            </button>

            <button type="button" class="btn btn-warning" aria-label="Left Align">
              <span class="glyphicon glyphicon-user" aria-hidden="true">
                Signup as Associate
              </span>
            </button>
          </div>

        </div>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/js/common/jquery-min.js"></script>
    <script src="/static/js/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/static/js/plugins/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
