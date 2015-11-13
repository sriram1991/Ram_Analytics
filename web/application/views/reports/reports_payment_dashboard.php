        <section class="content-header">
            <h2><p>Payment Status</p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                        
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green" onclick="student_payment_report();" >
                        <div class="inner">
                            <!-- <h3><?php //if(isset($associate_count)) echo $associate_count; ?></h3> -->
                            <h4>User Payments</h4>
                            <p>&nbsp;</p>
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
                
                    <div class="small-box bg-red" onclick="associate_payment_report();">
                        <div class="inner">
                            <!-- <h3><?php //if(isset($course_count)) echo $course_count; ?></h3> -->
                            <h4>SPOC Payments</h4>
                            <p>&nbsp;</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div> <!-- ./col -->

            </div>

        </section><!-- /.content -->