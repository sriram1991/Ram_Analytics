                <?php 
                $AV_flag = true;
                if(isset($all_aoi_courses)){
                    foreach ($all_aoi_courses as $res) {
                        // Paid Course
                        if($res->course_fee !='0.00'){
                            // var_dump($res);
                            $course_name = $res->course_name;
                            $course_id   = $res->course_id;
                            $duration    = $res->course_duration;
                            $fee         = $res->course_fee;
                            $small_box = "
                            <div class='small-box bg-aqua'>
                                <div class='inner'><h4 class='short-text' title='".$course_name."'>".$course_name."</h4><p>".$duration." Months <br> Rs. ".$fee."</p></div>
                                <div class='icon'><i class='icon-book icon-size'></i></div>
                                <a href='#'' class='small-box-footer text-white'>
                                    <i onClick='get_course_details(".$course_id.");'>Join Course <i class='fa fa-arrow-circle-right'></i></i> &nbsp;&nbsp;&nbsp;
                                    <i onClick='show_course_syllabus(".$course_id.");'>See Syllabus <i class='fa fa-arrow-circle-right'></i></i>
                                </a>
                            </div>    
                            ";    
                            echo "<div class='col-lg-3 col-xs-6'>";
                            echo $small_box;
                            echo "</div>";
                            $AV_flag = false;
                        }

                        // Free Courses 
                        // if($res->course_fee =='0.00'){
                        //     // var_dump($res);
                        //     $course_name = $res->course_name;
                        //     $course_id   = $res->course_id;
                        //     $duration    = $res->course_duration;
                        //     $fee         = $res->course_fee;
                        //     $small_box = "
                        //     <div class='small-box bg-aqua'>
                        //         <div class='inner'><h4 class='short-text'>".$course_name."</h4><p>".$duration." Months <br><small class='badge bg-green' style='text-align:left; width:42%;'>Free Course</small> </p></div>
                        //         <div class='icon'><i class='icon-book icon-size'></i></div>
                        //         <a href='#'' class='small-box-footer text-white'>
                        //             <i onClick='join_this_free_course(\"$course_id\",\"$fee\",\"$course_name\");'>Join Course <i class='fa fa-arrow-circle-right'></i></i> &nbsp;&nbsp;&nbsp;
                        //             <i onClick='show_course_syllabus(".$course_id.");'>See Syllabus <i class='fa fa-arrow-circle-right'></i></i>
                        //         </a>
                        //     </div>    
                        //     ";    
                        //     echo "<div class='col-lg-3 col-xs-6'>";
                        //     echo $small_box;
                        //     echo "</div>";
                        // }
                    } 
                    //  Check for AV_Flag is false then display  following 
                    if($AV_flag){
                        echo "<center><h4> We are going to create new courses for you soon ... ! </h4></center>";    
                    }
                } else {
                    echo "<center><h4> We are going to create new courses for you soon ... ! </h4></center>";
                }
                ?>