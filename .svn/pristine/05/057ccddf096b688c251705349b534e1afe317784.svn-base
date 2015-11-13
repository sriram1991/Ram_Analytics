
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
                    echo "<li><a href='#' onClick='get_student_course_tree(".$course_id.");get_student_course_modules(".$course_id.");'><i class='fa fa-dashboard'></i>".$course_details['course_name']."</a></li>"; 
                    echo "<li class='active'>".$module_name."</li>";
                ?>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                
                <?php
                    echo "<div class='content-header'>";
                    echo "<fieldset><legend>Groups</legend>"; 
                    if(isset($course_group)){
                        foreach ($course_group as $res) {
                            $course_id  = $res->course_id;
                            $module_name = $res->module_name;
                            $group_name  = $res->group_name;
                            echo "<div class='col-lg-3 col-xs-6'>";
                            echo "
                                <div class='small-box bg-maroon'
                                     onClick='get_student_course_subjects(\"$course_id\",\"$module_name\",\"$group_name\");' >
                                    <div class='inner'><h4>".$group_name."</h4><p>".$module_name."</p></div>
                                    <div class='icon'><i class='ion-social-rss'></i></div>
                                    <a href='#'' class='small-box-footer'>See Subjects <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                            echo "</div>";
                        }
                    } else {
                        echo "<center><h3>No Resource's Available !</h3></center>";
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
