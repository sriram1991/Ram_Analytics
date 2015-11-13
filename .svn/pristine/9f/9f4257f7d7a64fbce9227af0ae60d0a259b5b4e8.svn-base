        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Dashboard </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="content-header">
                <fieldset> 
                <legend>Available Paid Courses</legend>
                <?php 
                $AV_flag = true;
                if(isset($all_courses)){
                    foreach ($all_courses as $res) {
                        // Paid Course
                        if($res->course_fee !='0.00'){
                            // var_dump($res);
                            $course_name = $res->course_name;
                            $course_id   = $res->course_id;
                            $duration    = $res->course_duration;
                            $fee         = $res->course_fee;
                            $small_box = "
                            <div class='small-box bg-aqua'>
                                <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> Rs. ".$fee."</p></div>
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
                        //         <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br><small class='badge bg-green' style='text-align:left; width:42%;'>Free Course</small> </p></div>
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
                </fieldset>
            </div>
            <!-- for MY Courses  -->
            <?php 
            if(isset($my_courses)){
                echo "
                <div class='content-header'>
                <fieldset> 
                <legend>My Paid Courses</legend>";
                    if(isset($my_courses)){
                        $pc_flag = true;
                        foreach ($my_courses as $res) {
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
                                            <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> ".$fee_status."</p></div>
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
                                            <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> ".$fee_status."</p></div>
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
                echo "
                </fieldset>
                </div>";
            } else {
                echo "
                <div class='content-header'>
                <fieldset> 
                <legend>My Courses</legend>";
                
                echo "<center><h4> You have not subscribed for any course Please subscribe any course ! </h4></center>";
                
                echo "
                </fieldset>
                </div>";
            }
            ?>

            <div class="content-header">
                <legend>Graphs</legend>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="control"> 
                            <select id="course_id" class="form-control input" tabindex="5" placeholder="Course" onchange="get_subject_for_chart(value);">
                                <option value="">Select Course</option>
                                <?php 
                                    if(isset($all_my_courses)){
                                        foreach($all_my_courses as $res){
                                            echo "<option value=".$res->course_id.">".$res->course_name."</option>";
                                        } 
                                    } 
                                ?>
                            </select>                                    
                        </div>
                        <span class="help-block"></span>
                    </div>
            
                    <div class="tab-content" id="load_subjects">                    
                    
                    </div>
                </div>

                <div class="tab-content" id="student_graph_result">

                </div>
                <br>
            </div>
        </section>

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

        
        <!-- ========= Show Course Details Modal Start =========== -->
        <div class="modal fade" id="course_details_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">                                    

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Course Details </h4>
                    </div>
                                    
                    <div class="modal-body" id="body-course_details_modal">
                            
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

        <!-- ========= Show Course Batchs Modal Start =========== -->
        <div class="modal fade" id="course_batch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Available Batches </h4>
                    </div>
                                    
                    <div class="modal-body" id="body-show_batches">
                            
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

        <!-- =========  Modal Start =========== -->
        <div class="modal fade" id="show_course_syllabus_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                                    

                    <div class="modal-header">
                        <button type="button" class='close' onClick="$('.input').val('');" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><i class="hidden-lg">Course Syllabus</i> Course Syllabus</h4>
                    </div>
                                    
                    <div class="modal-body" id="body-show_course_syllabus">
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


        <script type="text/javascript">
            function payment_confirmation() {
                $('#payment_confirmation').modal('show');
            }
        </script>