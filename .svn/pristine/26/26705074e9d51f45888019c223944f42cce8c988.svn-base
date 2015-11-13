<!-- 
********************************************************* 
|  Login Form  Format : [ style - content - js ] by usk |
*********************************************************
 -->
<link rel="stylesheet" type="text/css" href="/static/css/common/common.css">


        <div class="wrapper row-offcanvas row-offcanvas-left">
           

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center><h3>Welcome to <?php echo PRODUCT_NAME; ?></h3></center>
                </section> 

                <!-- Main content -->
                <section class="content">
                <!-- ==== Begin of Login Form =============================================== -->
                <div id="login">
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <center><strong> Sign in to continue</strong></center>
                      </div>
                        
                        <div class="panel-body">
                          <form role="form" action="/login/authenticate" method="POST">
                            <fieldset>
                              <div class="row">
                                <div class="center-block">
                                  <img class="profile-img" src="/static/img/default_photo.png" alt="USER NAME">
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                      </span> 
                                      <input class="form-control" autocomplete="off" title="Please Enter User ID !" placeholder="User Email ID" name="loginname" type="email" autofocus value="" required>
                                    </div>
                                  </div>
                                
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                      </span>
                                      <input class="form-control" autocomplete="off" title="Please Enter Password !" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                  </div>
                                
                                  <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                          </form>
                        </div>

                      <div class="panel-footer ">
                        <center>Don't have an account! <a href="#" onClick="$('#login').hide(); $('#signup').show();"> Sign Up Here </a></center>
                        <center><a href="#" data-toggle="modal" data-target="#forgot_pwd_modal" onClick="load_forgot_modal();";> Forgot Password ? </a></center>
                      </div>
                    
                    </div> <!-- End of ./Panel -->
                  
                  </div>
                </div>
                <center><?php if(isset($error_msg)) { echo $error_msg; } ?></center>
                </div>
                <!-- ==== End of Login Form =============================================== -->



                <!-- ==== Begin of Sign up Form =============================================== -->
                <div id="signup">
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                      <div class="panel-heading"><center><strong>Sign up to continue</strong></center></div>
                        
                        <div class="panel-body">
                          <fieldset>
                            <div class="row">
                                <center>
                                <div class="center-block">
                                  
                                  <a href="/register/user" class="btn btn-success"><img class="profile-img" src="/static/img/default_photo.png" alt="User Registration">User</a>
                                  <a href="/register/spoc" class="btn btn-warning"><img class="profile-img" src="/static/img/default_photo.png" alt="SPOC Registration">SPOC</a>
                                  <!-- <a href="/register/affilate" class="btn btn-info"><img class="profile-img" src="/static/img/default_photo.png" alt="Affiliate Registration">Affiliate</a> -->
                                
                                </div>
                                </center>
                            </div>
                          </fieldset>
                        </div>

                      <div class="panel-footer ">
                        <center>Have an account! <a href="#" onClick="$('#login').show(); $('#signup').hide();"> Click to Sign in </a></center>
                       
                      </div>
                    
                    </div> <!-- End of ./Panel -->
                  
                  </div>
                </div>
                </div>
                <!-- ==== End of Sign up Form =============================================== -->
    <!-- ==== End of forgot password modal =============================================== -->
    </section>
                <!-- /.Main content -->
  </aside><!-- /.right-side -->
  </div>

                        <!-- ============= Forget PWD Modal =========== -->

                        <div class="modal fade" id="forgot_pwd_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Forgot Password !</h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-forgot_modal">
                                            
                                        <!-- AJAX CALL Will LOAD Add Fprgot  Modal -->

                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="forgot_password();" tabindex='4'>Submit</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                        <!-- ============= Forget PWD Modal =========== -->
                
    