
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Dashboard </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                 <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue" onclick="open_directors();">
                        <div class="inner">
                            <h4>
                               Mentor/SME
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h4>
                            <p><h4><?php if(isset($mentor_count)) echo $mentor_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->

                 <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow" onclick="open_affilate();">
                        <div class="inner">
                            <h4>
                                Affiliate
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h4>
                            <p><h4><?php if(isset($affiliate_count)) echo $affiliate_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua" onclick="open_content_management();">
                        <div class="inner">
                            <h4>
                                <?php if(isset($director_details)) echo $director_details['subject_name']; else echo "Total "; ?> | Resource
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h4>
                            <p><h4><?php if(isset($resource_count)) echo $resource_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-wand" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green" onclick="show_cm_assessment_tab();">
                        <div class="inner">
                            <h4>
                                <?php if(isset($director_details)) echo $director_details['subject_name']; else echo "Total "; ?> | Assessment
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h4>
                            <p><h4><?php if(isset($assessment_count)) echo $assessment_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="icon-book icon-size" style="font-size:70%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <?php /*
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon" onclick="open_content_management();" >
                        <div class="inner">
                            <h3><?php if(isset($resource_count)) echo $resource_count; ?></h3>
                            <p>Total Resource</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple" onclick="open_content_management(); get_subject_list();">
                        <div class="inner">
                            <h3><?php if(isset($assessment_count)) echo $assessment_count; ?></h3>
                            <p>Total Assessment</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                */?>
            </div>

        </section><!-- /.content -->
        
        <!-- Content Header (Page footer) -->
        <style type="text/css">
        /*.footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #16171c;
        }
        .skol_logo {
            width: 5% !important;
        }*/
        
        </style>
                
        <!--<section class="footer">
            <div class="content col-xs-15 col-md-12" style="background: transparent;">
                <img src="/static/theme/img/skol_logo.png" class="skol_logo"/>
            </div>
        </section>-->
    

