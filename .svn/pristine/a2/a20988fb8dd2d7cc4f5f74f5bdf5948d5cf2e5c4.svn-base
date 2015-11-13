        
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
            <div class="row">
                <div class="col-xs-12 col-sd-6">
                    <?php 
                        if(isset($course_details)){
                            if($course_details['course_syllabus_file'] != 'NULL'){
                                $syllabus_file = $course_details['course_syllabus_file'];
                                $course_id     = $course_details['course_id'];
                                echo "<button class='btn btn-primary' onClick='show_student_syllabus(\"$course_id\",\"$syllabus_file\");'>View Syllabus</button>";
                            }
                        }
                    ?>

                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
                
                <?php
                    echo "<div class='content-header'>";
                    echo "<fieldset><legend>Modules</legend>"; 
                    if(isset($course_module)){
                        foreach ($course_module as $res) {
                            $title        = $course_details['course_name'];
                            $module_name  = $res->module_name;
                            $group_name   = "Group I";
                            $publish_date = date("d-M-Y", strtotime($res->schedule));
                            $course_id  = $res->course_id;
                            $small_box  = "
                                <div class='small-box bg-purple'
                                     data-course_id=".htmlspecialchars($course_id)."
                                     data-module_name=".htmlspecialchars($module_name)."
                                     data-group_name=".htmlspecialchars($group_name)."
                                     onClick='get_course_subjects(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-module_name\"),this.getAttribute(\"data-group_name\"));' >
                                    <div class='inner'><h3><i class='text-size-15'>".$module_name."</i></h3><p>".$title."</p></div>
                                    <div class='icon'><i class='ion-social-rss'></i></div>
                                    <a href='#'' class='small-box-footer'>See Subjects <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                            echo "<div class='col-lg-3 col-xs-6'>";
                            // echo $small_box;
                            echo "
                                <div class='small-box bg-green'
                                     onClick='get_course_subjects(\"$course_id\",\"$module_name\",\"$group_name\");' >
                                    <div class='inner'><h4>".$module_name."</h4><p>".$publish_date."</p></div>
                                    <div class='icon'><i class='ion-social-rss'></i></div>
                                    <a href='#'' class='small-box-footer'>See Subjects <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                            echo "</div>";
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

        <!-- =========  Modal Start =========== -->
        <div class="modal fade" id="show_syllabus_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                                    

                    <div class="modal-header">
                        <button type="button" class='close' onClick="$('.input').val('');" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><i class="hidden-lg"><?php echo $course_details['course_name'];?> Syllabus</i><?php echo $course_details['course_name'];?> Syllabus</h4>
                    </div>
                                    
                    <div class="modal-body" id="body-show_syllabus">
                        <!-- <iframe id="test_page_frame" src="/student/start_test_page"></iframe> -->
                        <!-- AJAX Call Show Course Batch Modal -->
                    
                    </div>
                                    
                    <div class="modal-footer">
                        <center>
                          <!-- <button type="button" class="btn btn-success" onClick="submit_close_test();" tabindex='4'>Submit</button> -->
                          <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal">Close</button>
                        </center>
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <!-- <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal">Close</button> -->
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- =============  Modal Ended =========== -->