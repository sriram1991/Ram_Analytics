<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/static/theme/img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello,<?php echo $data['user_fname']." ".$data['user_lname']." "; ?>!</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!-- My Course -->
                        <li>
                            <a href="#">
                                <h4>
                                    <i class="fa icon-sitemap"></i> 
                                    <span>My Course</span> 
                                    <!-- <small class="badge pull-right bg-green">new</small> -->
                                </h4>
                            </a>
                        </li>

                        <!-- Course -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa icon-book"></i>
                                <span>Course</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/static/theme/UI/general.html"><i class="fa fa-angle-double-right"></i> Subject 1 </a></li>
                                <li><a href="/static/theme/UI/icons.html"><i class="fa fa-angle-double-right"></i> Subject 2 </a></li>
                                <li><a href="/static/theme/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Subject 3 </a></li>
                                <li><a href="/static/theme/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Subject 4 </a></li>
                                <li><a href="/static/theme/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Subject 5 </a></li>
                            </ul>
                        </li>
                       
                        <!-- Student -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa icon-group"></i>
                                <span>Student</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/static/theme/UI/general.html"><i class="fa fa-angle-double-right"></i> Subject 1</a></li>
                                <li><a href="/static/theme/UI/icons.html"><i class="fa fa-angle-double-right"></i> Subject 2</a></li>
                                <li><a href="/static/theme/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Subject 3</a></li>
                                <li><a href="/static/theme/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Subject 4</a></li>
                                <li><a href="/static/theme/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Subject 5</a></li>
                            </ul>
                        </li>

                        <!-- Associate -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa icon-microscope"></i>
                                <span>Associate</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/static/theme/UI/general.html"><i class="fa fa-angle-double-right"></i> Subject 1</a></li>
                                <li><a href="/static/theme/UI/icons.html"><i class="fa fa-angle-double-right"></i> Subject 2</a></li>
                                <li><a href="/static/theme/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Subject 3</a></li>
                                <li><a href="/static/theme/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Subject 4</a></li>
                                <li><a href="/static/theme/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Subject 5</a></li>
                            </ul>
                        </li>

                        <!-- Parent -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa icon-calculator"></i> <span>Parent</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                <small class="badge pull-right bg-green">new</small>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-android"></i> <span>Subject 1</span>
                                        <i class="fa fa-angle-left pull-right"></i>        
                                    </a>
                                    <ul class="treeview-menu">
                                        <!-- 11 -->
                                        <li><a href="/static/theme/tables/simple.html"><i class="fa fa-angle-double-right"></i> Topic 1 </a></li>
                                        <li><a href="/static/theme/tables/data.html"><i class="fa fa-angle-double-right"></i> Topic 2 </a></li>
                                        <!-- 11 -->
                                    </ul>
                                </li>
                                <!-- 01 -->
                                <li><a href="/static/theme/tables/simple.html"><i class="fa fa-angle-double-right"></i> Subject 2</a></li>
                                <li><a href="/static/theme/tables/data.html"><i class="fa fa-angle-double-right"></i> Subject 3</a></li>
                                <!-- 01 -->
                            </ul>
                        </li>

                        <!-- Batch -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa icon-calculator"></i> <span>Batch</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                <small class="badge pull-right bg-green">new</small>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-android"></i> <span>Subject 1</span>
                                        <i class="fa fa-angle-left pull-right"></i>        
                                    </a>
                                    <ul class="treeview-menu">
                                        <!-- 11 -->
                                        <li><a href="/static/theme/tables/simple.html"><i class="fa fa-angle-double-right"></i> Topic 1 </a></li>
                                        <li><a href="/static/theme/tables/data.html"><i class="fa fa-angle-double-right"></i> Topic 2 </a></li>
                                        <!-- 11 -->
                                    </ul>
                                </li>
                                <!-- 01 -->
                                <li><a href="/static/theme/tables/simple.html"><i class="fa fa-angle-double-right"></i> Subject 2</a></li>
                                <li><a href="/static/theme/tables/data.html"><i class="fa fa-angle-double-right"></i> Subject 3</a></li>
                                <!-- 01 -->
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <p> <?php echo $data['user_type']; ?> Dashboard </p>
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">


                </section><!-- /.content -->
                <!-- Content Header (Page footer) -->
                <style type="text/css">
                .footer {
                    position: fixed;
                    bottom: 0;
                    width: 100%;
                    height: 60px;
                    background-color: #16171c;
                }
                .skol_logo {
                    width: 5% !important;
                }
                </style>
                <section class="footer">
                    <div class="content" style="background: transparent;">
                        <img src="/static/theme/img/skol_logo.png" class="skol_logo"/>
                    </div>
                </section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
