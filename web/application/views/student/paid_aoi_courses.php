                <?php 
                if(isset($paid_aoi_courses)){
                    $pc_flag = true;
                    foreach ($paid_aoi_courses as $res) {
                        // All Paid Courses
                        if($res->course_fee !='0.00'){
                            if($res->payment_status == 2){
                                // var_dump($res);
                                $course_name = $res->course_name;
                                $course_id   = $res->course_id;
                                $duration    = $res->course_duration;
                                $fee_status  = $res->status_name;
                                // get_course_menu();get_course_subjects_grid();
                                $small_box = "
                                    <div class='small-box bg-blue' onClick='get_course_menu(".$course_id."); get_course_modules(".$course_id.");'>
                                        <div class='inner'><h4 class='short-text' title='".$course_name."'>".$course_name."</h4><p>".$duration." Months <br> ".$fee_status."</p></div>
                                        <div class='icon'><i class='icon-book icon-size'></i></div>
                                        <a href='#'' class='small-box-footer'>See Modules <i class='fa fa-arrow-circle-right'></i></a>
                                    </div>    
                                    ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                                $pc_flag = false;
                            }
                            if($res->payment_status == 8){
                                // var_dump($res);
                                $course_name = $res->course_name;
                                $course_id   = $res->course_id;
                                $duration    = $res->course_duration;
                                $fee_status  = $res->status_name;
                                $small_box = "
                                    <div class='small-box bg-red' onClick='payment_confirmation();'>
                                        <div class='inner'><h4 class='short-text' title='".$course_name."'>".$course_name."</h4><p>".$duration." Months <br> ".$fee_status."</p></div>
                                        <div class='icon'><i class='icon-book icon-size'></i></div>
                                        <a href='#'' class='small-box-footer'>more info <i class='fa fa-arrow-circle-right'></i></a>
                                    </div>    
                                    ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                                $pc_flag = false;
                            }
                        }
                    } 
                    // Check for pc_flag Paid Course Flag if false dont show bellow
                    if($pc_flag){
                        echo "<center><h4> You have not subscribed for any course Please subscribe any course ! </h4></center>";
                    }

                }
                ?>

