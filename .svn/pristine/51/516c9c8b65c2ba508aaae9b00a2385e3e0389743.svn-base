        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p>My Courses </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <?php 
                if(isset($my_courses)){
                    foreach ($my_courses as $res) {
                        if($res->payment_status == 2){
                            // var_dump($res);
                            $course_name = $res->course_name;
                            $course_id   = $res->course_id;
                            $duration    = $res->course_duration;
                            $fee_status  = $res->status_name;
                            // get_course_menu();get_course_subjects_grid();
                            $small_box = "
                                <div class='small-box bg-blue' onClick='get_course_menu(".$course_id."); get_course_modules(".$course_id.");'>
                                    <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> ".$fee_status."</p></div>
                                    <div class='icon'><i class='icon-book icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'>See Modules <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                            echo "<div class='col-lg-3 col-xs-6'>";
                            echo $small_box;
                            echo "</div>";
                        } elseif($res->payment_status == 8){
                            // var_dump($res);
                            $course_name = $res->course_name;
                            $course_id   = $res->course_id;
                            $duration    = $res->course_duration;
                            $fee_status  = $res->status_name;
                            // get_course_menu();get_course_subjects_grid();
                             $small_box = "
                                    <div class='small-box bg-red' onClick='payment_confirmation();'>
                                        <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> ".$fee_status."</p></div>
                                        <div class='icon'><i class='icon-book icon-size'></i></div>
                                        <a href='#'' class='small-box-footer'>more info <i class='fa fa-arrow-circle-right'></i></a>
                                    </div>    
                                    ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                        } else {
                            echo "<center><h4> You have not subscribed for any course Please subscribe any course ! </h4></center>";
                        }
                    }
                } else { 
                    echo "<center><h4> You have not subscribed for any course Please subscribe any course ! </h4></center>";    
                }


                        // var_dump($res);
                        /*
                        $course_name    = $res->course_name;
                        $course_id      = $res->course_id;
                        $duration       = $res->course_duration;
                        $small_box      = "
                        <div class='small-box bg-aqua' onClick='get_course_menu(".$course_id."); get_course_subjects_grid(".$course_id.");'>
                            <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months </p></div>
                            <div class='icon'><i class='icon-book'></i></div>
                            <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                        </div>    
                        ";    
                        echo "<div class='col-lg-3 col-xs-6'>";
                        echo $small_box;
                        echo "</div>";
                     

                        */

           ?>
                       
              
                
                

                <!-- <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner"><h3>0%</h3><p>IIT Entrance</p></div>
                        <div class="icon"><i class="icon-book"></i></div>
                        <a href="#" onClick="start_course(id);" class="small-box-footer">Start Learning <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> -->
                
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


        <!-- ========= Show Transcation Details =========== -->
        <div class="modal fade" id="payment_confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                                    

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Payment Details </h4>
                    </div>
                                    
                    <div class="modal-body" id="body-payment_confirmation">
                        <span>Your registration details are being processed.</span>
                        <!-- AJAX Call Show Course Details Modal -->
                    
                    </div>
                                    
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal">Close</button>
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- ============= Show Course Details Modal Ended =========== -->
    

