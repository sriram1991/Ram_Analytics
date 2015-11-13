
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p>
                <?php
                    if(isset($subject_name)) echo "$subject_name";
                ?>
                </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
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
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id; 
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $title = $res->resource_name;
                                $module = $res->module_name;
                                $group  = $res->group_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-aqua' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                data-resource_link=".htmlspecialchars($resource_link)."
                                onClick='open_pdf(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"),this.getAttribute(\"data-resource_id\"),this.getAttribute(\"data-resource_link\"));'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-file-pdf icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Read <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                // echo $small_box;
                                echo "
                                <div class='small-box bg-aqua' 
                                onClick='open_pdf(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\",\"$resource_link\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-file-pdf icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Read <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";
                                echo "</div>";
                            }
                            
                            if($res->resource_type == 'VIDEO'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $title  = $res->resource_name;
                                $module = $res->module_name;
                                $group  = $res->group_name;
                                $type   = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-aqua' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                data-resource_link=".htmlspecialchars($resource_link)."
                                onClick='open_video(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"),this.getAttribute(\"data-resource_id\"),this.getAttribute(\"data-resource_link\"));'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Watch <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                // echo $small_box;
                                echo "
                                <div class='small-box bg-aqua' 
                                onClick='open_video(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\",\"$resource_link\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Watch <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";
                                echo "</div>";
                            }

                            if($res->resource_type == 'CAPTIVA'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $title  = $res->resource_name;
                                $module = $res->module_name;
                                $group  = $res->group_name;
                                $type   = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-aqua' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                onClick='open_captiva(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"),this.getAttribute(\"data-resource_id\"));'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Watch <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                // echo $small_box;
                                echo "
                                <div class='small-box bg-aqua' 
                                onClick='open_captiva(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Watch <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";
                                echo "</div>";
                            }

                            if($res->resource_type == 'CAPTIVA_QUIZ'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $res_order      = $res->res_order;
                                $resource_link  = $res->resource_link;
                                $title  = $res->resource_name;
                                $module = $res->module_name;
                                $group  = $res->group_name;
                                $type   = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-aqua' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                onClick='open_captiva_quiz(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"),this.getAttribute(\"data-resource_id\"));'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Take Quiz <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                // echo $small_box;
                                echo "
                                <div class='small-box bg-aqua' 
                                onClick='open_captiva_quiz(\"$course_id\",\"$module\",\"$group\",\"$subject_name\",\"$resource_id\");'>
                                    <div class='inner'><h4>".$title."</h4><p>".$module." | ".$group."</p></div>
                                    <div class='icon'><i class='icon-movie-play-1 icon-size'></i></div>
                                    <a href='#'' class='small-box-footer'> Take Quiz <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";
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
         