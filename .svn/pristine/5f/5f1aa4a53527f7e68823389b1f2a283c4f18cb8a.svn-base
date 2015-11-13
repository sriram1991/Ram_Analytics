        <style type="text/css">
        .icon-size {
            font-size: 65%;
        }
        </style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p>
                <?php
                    if(isset($subject_name)) echo "$subject_name";
                ?>
                </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
            <ol class="breadcrumb">
                 <?php 
                    echo "<li><a href='#' onClick='get_course_modules(".$course_id.");'><i class='fa fa-dashboard'></i>".$course_name."</a></li>"; 
                    echo "<li><a href='#' onClick='get_course_menu(".$course_id."); get_course_subjects(\"$course_id\",\"$module_name\",\"$group_name\");'>".$module_name."</a></li>"; 
                    // echo "<li><a href='#' onClick='get_course_groups(\"$course_id\",\"$module_name\",\"$group_name\");'>".$group_name."</a></li>"; 
                    echo "<li class='active'>".$subject_name."</li>";
                ?>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="content-header">
                
                <fieldset>
                    <legend>Resources</legend>
                    <?php 
                    if(isset($resource_list)){
                        foreach ($resource_list as $res) {
                            $res_type = $res->resource_type;
                            if($res_type == 'PDF'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $module         = $res->module_name;
                                $group          = $res->group_name;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id; 
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $publish_date   = date("d-M-Y", strtotime($res->schedule));
                                $title = $res->resource_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-navy' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                data-resource_link=".htmlspecialchars($resource_link)."
                                onClick='open_pdf(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\",\"$resource_link\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$publish_date."</p></div>
                                    <div class='icon'><i class='icon-file-pdf icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Read <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                            }

                            if($res->resource_type == 'VIDEO'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $module         = $res->module_name;
                                $group          = $res->group_name;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $publish_date   = date("d-M-Y", strtotime($res->schedule));
                                $title = $res->resource_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-navy' 
                                onClick='open_video(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\",\"$resource_link\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$publish_date."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Watch <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                            }

                            if($res->resource_type == 'CAPTIVA'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $module         = $res->module_name;
                                $group          = $res->group_name;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $publish_date   = date("d-M-Y", strtotime($res->schedule));
                                $title = $res->resource_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-navy' 
                                onClick='open_captiva(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$publish_date."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Watch <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                            }

                            if($res->resource_type == 'CAPTIVA_QUIZ'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $module         = $res->module_name;
                                $group          = $res->group_name;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $publish_date   = date("d-M-Y", strtotime($res->schedule));
                                $title = $res->resource_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-navy' 
                                onClick='open_captiva_quiz(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$publish_date."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Take Quiz <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                echo $small_box;
                                echo "</div>";
                            }
                            
                        }    
                    } else {
                        echo "<center><h4> No Resource's Available ! </h4></center>";
                    }
                    
                    ?>
                </fieldset>
            </div>

            <?php
            if(isset($assessment_list)){
                echo "<div class='content-header'>";
                echo "<fieldset><legend>Assessment</legend>";
                foreach($assessment_list as $res) {
                    // var_dump($res);
                    $title          = $res->test_name;
                    $course_id      = $res->course_id;
                    $module         = $res->module_name;
                    $group          = $res->group_name;
                    $subject_name   = $res->subject_name;
                    $test_id        = $res->test_id;
                    $test_no        = $res->test_no;
                    $test_name      = $res->test_name;
                    $small_box = "
                        <div class='small-box bg-green' onClick='open_test_page(".$course_id.",\"$module\",\"$group\",\"$subject_name\",".$test_id.",\"$test_name\");'>
                            <div class='inner'><h4>TEST ".$test_no."</h4><p>".$title."</p></div>
                            <div class='icon'><i class='glyphicon glyphicon-pencil' style='font-size: 65%;'></i></div>
                            <a href='#'' class='small-box-footer'>Take Test <i class='fa fa-arrow-circle-right'></i></a>
                        </div>    
                        ";    
                    echo "<div class='col-lg-3 col-xs-6'>";
                    echo $small_box;
                    echo "</div>";
                }
                echo "</fieldset>";
                echo "</div>";
            }

            ?>
                <!-- <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner"><h3>0%</h3><p>IIT Entrance</p></div>
                        <div class="icon"><i class="icon-book"></i></div>
                        <a href="#" onClick="start_course(id);" class="small-box-footer">Start Learning <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> -->
                
            

        </section><!-- /.content -->
         