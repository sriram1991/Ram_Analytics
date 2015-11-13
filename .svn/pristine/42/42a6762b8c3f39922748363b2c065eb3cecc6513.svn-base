
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3><p><?php /* if(isset($user_details)) { echo $user_details['user_type']; } */ ?>User Course Materials </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h3>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="content-header">
                <fieldset> 
                <legend>Available Courses</legend>
                <?php 
                if(isset($available_courses)){
                    foreach ($available_courses as $res) {
                        // var_dump($res);
                        $course_name = $res->course_name;
                        $course_id   = $res->course_id;
                        $duration    = $res->course_duration;
                        $fee         = $res->course_fee;
                        //associate_course_details();
                        $small_box = "
                        <div class='small-box bg-aqua' onclick='get_student_course_tree(\"$course_id\");get_student_course_modules(\"$course_id\");' title=\"$course_name\">
                            <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> Rs. ".$fee."</p></div>
                            <div class='icon'><i class='icon-book icon-size'></i></div>
                            <a href='#'' class='small-box-footer'>See Modules <i class='fa fa-arrow-circle-right'></i></a>
                        </div>    
                        ";    
                        echo "<div class='col-lg-3 col-xs-6'>";
                        echo $small_box;
                        echo "</div>";
                    }    
                } else {
                    echo "<center><h4> We are going to create new courses soon for user ... ! </h4></center>";
                }
                ?>
                </fieldset>
            </div>
            
            <!-- for MY Courses  -->
            <?php /*
            if(isset($associate_courses)){
                echo "
                <div class='content-header'>
                <fieldset> 
                <legend>Associate Course Materails</legend>";
                    if(isset($associate_courses)){
                        foreach ($associate_courses as $res) {
                            // var_dump($res);
                            $course_name = $res->course_name;
                            $course_id   = $res->course_id;
                            $duration    = $res->course_duration;
                            $small_box = "
                            <div class='small-box bg-aqua' onClick='associate_course_details();get_asso_course_menu(".$course_id."); get_course_subjects_grid(".$course_id.");'>
                                <div class='inner'><h3>".$duration."<i class='text-size-15'>Months</i></h3><p>".$course_name."</p></div>
                                <div class='icon'><i class='icon-book icon-size'></i></div>
                                <a href='#'' class='small-box-footer'>See Batches <i class='fa fa-arrow-circle-right'></i></a>
                            </div>    
                            ";    
                            echo "<div class='col-lg-3 col-xs-6'>";
                            echo $small_box;
                            echo "</div>";
                        }    
                    } 
                echo "
                </fieldset>
                </div>";
            } else {
                echo "
                <div class='content-header'>
                <fieldset> 
                <legend>Associate Course Materails</legend>";
                
                echo "<center><h4> You have not subscribed for any course Please subscribe any course ! </h4></center>";
                
                echo "
                </fieldset>
                </div>";
            }*/
            ?>
                

        </section><!-- /.content -->
        
        <script type="text/javascript">
            function associate_course_details() {
                $("#associate_course_info").modal('show');
            }
        </script>

        <!-- ========= Show Course Batchs Modal Start =========== -->
        <div class="modal fade" id="associate_course_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                                    

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Course Details </h4>
                    </div>
                                    
                    <div class="modal-body" id="body-associate_course_info">
                        <center><h3> Coming soon ...</h3></center>
                        <!-- AJAX Call Show Course Batch Modal -->
                    
                    </div>
                                    
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal">Close</button>
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- ============= Show Course Batchs Modal Ended =========== -->

<?php /*
                <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Course Creation</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-wand"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                        
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Students</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Parents</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                        
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Associates</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                </div>
                */?>