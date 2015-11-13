
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p>My Resources</p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                
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
                                $resource_link  = $res->resource_link;
                                $title = $res->resource_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-aqua' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                data-resource_link=".htmlspecialchars($resource_link)."
                                onClick='open_pdf(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"),this.getAttribute(\"data-resource_id\"),this.getAttribute(\"data-resource_link\"));'>
                                    <div class='inner'><h3>0%</h3><p>".$title."</p></div>
                                    <div class='icon'><i class='icon-book'></i></div>
                                    <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                // echo $small_box;
                                echo "
                                <div class='small-box bg-aqua' 
                                    onClick='open_pdf(\"$course_id\",\"$subject_name\",\"$resource_id\",\"$resource_link\");'>
                                    <div class='inner'><h3>0%</h3><p>".$title."</p></div>
                                    <div class='icon'><i class='icon-book'></i></div>
                                    <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "</div>";
                            }

                            if($res->resource_type == 'VIDEO'){
                                // var_dump($res);
                                $course_id      = $res->course_id;
                                $subject_name   = $res->subject_name;
                                $resource_id    = $res->resource_id;
                                $resource_type  = $res->resource_link;
                                $title = $res->resource_name;
                                $type  = $res->resource_type;
                                $small_box = "
                                <div class='small-box bg-aqua' 
                                data-course_id=".htmlspecialchars($course_id)."
                                data-subject_name=".htmlspecialchars($subject_name)."
                                data-resource_id=".htmlspecialchars($resource_id)."
                                data-resource_link=".htmlspecialchars($resource_link)."
                                onClick='open_video(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"),this.getAttribute(\"data-resource_id\"),this.getAttribute(\"data-resource_link\"));'>
                                    <div class='inner'><h3>0%</h3><p>".$title."</p></div>
                                    <div class='icon'><i class='icon-book'></i></div>
                                    <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";    
                                echo "<div class='col-lg-3 col-xs-6'>";
                                // echo $small_box;
                                echo "
                                <div class='small-box bg-aqua' 
                                    onClick='open_video(\"$course_id\",\"$subject_name\",\"$resource_id\",\"$resource_link\");'>
                                    <div class='inner'><h3>0%</h3><p>".$title."</p></div>
                                    <div class='icon'><i class='icon-book'></i></div>
                                    <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
                                </div>    
                                ";
                                echo "</div>";
                            }
                            
                        }    
                    } else {
                        echo "<center><h4> You have not subscribed for any course Please subscribe for a course ! </h4></center>";
                    }
                    
                    ?>
                </fieldset>
            </div>

            <?php
            if(isset($assessment_list)){
                echo "<div class='row'>";
                echo "<fieldset><legend>Assessment</legend>";
                foreach($resource_list as $res) {
                    // var_dump($res);
                    $title = $res->resource_name;
                    $course_id   = $res->course_id;
                    $small_box = "
                        <div class='small-box bg-green' onClick='get_course_menu(".$course_id.");'>
                            <div class='inner'><h3>0%</h3><p>".$title."</p></div>
                            <div class='icon'><i class='icon-clippy'></i></div>
                            <a href='#'' class='small-box-footer'>Start Learning <i class='fa fa-arrow-circle-right'></i></a>
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
