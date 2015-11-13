
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2>
                <p>
                <?php
                    if(isset($course_details)) echo "Course Name: ".$course_details['course_name'];
                ?>
                </p>
                <small> 
                    <?php 
                        if(isset($course_details)){
                            echo "Course Description : ".$course_details['course_description']." | "; 
                            echo "Course Duration : ".$course_details['course_duration']." Months";    
                        }
                    ?>
                </small> 
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
            <ol class="breadcrumb">
                 <?php 
                    $course_id = $course_details['course_id'];
                    echo "<li><a href='#' onClick='get_student_course_tree(".$course_id."); get_student_course_modules(".$course_id.");'><i class='fa fa-dashboard'></i>".$course_details['course_name']."</a></li>"; 
                    // echo "<li><a href='#' onClick='get_student_course_tree(".$course_id."); get_student_course_groups(\"$course_id\",\"$module_name\");'>".$module_name."</a></li>"; 
                    echo "<li class='active'>".$module_name."</li>";
                ?>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                
                <?php
                    echo "<div class='content-header'>";
                    echo "<fieldset><legend>Subjects</legend>"; 
                    if(isset($course_subject)){
                        // var_dump($course_subject);
                        foreach ($course_subject as $res) {
                            if($res->payment_status == '2'){
                                $title        = $res->subject_name;
                                $group_name   = $res->group_name;
                                $course_id  = $res->course_id;
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo "
                                    <div class='small-box bg-purple'
                                         onClick='get_student_cmgs_resources(\"$course_id\",\"$title\");' >
                                        <div class='inner'><h4>".$title."</h4><p>".$group_name."</p></div>
                                        <div class='icon'><i class='ion-social-rss'></i></div>
                                        <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                                    </div>    
                                    ";
                                echo "</div>";
                                
                            }
                            if($res->payment_status == '8'){
                                $title        = $res->subject_name;
                                $group_name   = $res->group_name;
                                $course_id  = $res->course_id;
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo "
                                    <div class='small-box bg-red' data-toggle='modal' data-target='#associate_subject_status'>
                                        <div class='inner'><h4>".$title."</h4><p>".$group_name." | ".$res->status_name." </p></div>
                                        <div class='icon'><i class='ion-social-rss'></i></div>
                                        <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                                    </div>    
                                    ";
                                echo "</div>";
                            }
                        }
                    } else {
                        echo "<center><h3>No Resource Available</h3></center>";
                    }
                    echo "</fieldset>";
                    echo "</div>";
                ?>
                

                <!-- <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner"><h3>0%</h3><p>IIT Entrance</p></div>
                        <div class="icon"><i class="icon-book"></i></div>
                        <a href="#" onClick="start_course(id);" class="small-box-footer">Start Learning <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> -->
                
            

        </section><!-- /.content -->

        <!-- ========= Show associate subject status Modal Start =========== -->
        <div class="modal fade" id="associate_subject_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                                    

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Transcation Details </h4>
                    </div>
                                    
                    <div class="modal-body" id="body-associate_subject_status">
                        <center><h3>Your Payment is under verification !</h3></center>
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
        <!-- ============= Show associate subject status Modal Ended =========== -->