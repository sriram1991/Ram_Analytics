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

                <!-- ==== Begin of Sign up Form =============================================== -->
                  <div id="user_registration">
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
                                    
                                    </div>
                                    </center>
                                </div>
                              </fieldset>
                            </div>

                          <div class="panel-footer ">
                            <center>Have an account! <a href="/login" > Click to Sign in </a></center>
                           
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

    