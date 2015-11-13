
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3><p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Dashboard </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h3>
        </section>

        <!-- Main content -->
    <!--    <section class="content">
            <div class="content-header">
                <fieldset> 
                <legend>Available Courses</legend> -->
                <?php 
              /*  if(isset($all_courses)){
                    foreach ($all_courses as $res) {
                        // var_dump($res);
                        $course_name = $res->course_name;
                        $course_id   = $res->course_id;
                        $duration    = $res->course_duration;
                        $fee         = $res->course_fee;
                        $small_box = "
                        <div class='small-box bg-aqua' onclick='associate_course_details();' title='Work in Process ...'>
                            <div class='inner'><h4>".$course_name."</h4><p>".$duration." Months <br> Rs. ".$fee."</p></div>
                            <div class='icon'><i class='icon-book icon-size'></i></div>
                            <a href='#'' class='small-box-footer'>See Batches <i class='fa fa-arrow-circle-right'></i></a>
                        </div>    
                        ";    
                        echo "<div class='col-lg-3 col-xs-6'>";
                        echo $small_box;
                        echo "</div>";
                    }    
                } else {
                    echo "<center><h4> We are going to create new courses soon for students ... ! </h4></center>";
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
                <legend>My Courses</legend>";
                    if(isset($my_courses)){
                        foreach ($my_courses as $res) {
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
                <legend>My Courses</legend>";
                
                echo "<center><h4> You have not subscribed for any course Please subscribe any course ! </h4></center>";
                
                echo "
                </fieldset>
                </div>";
            } */
            ?> 
                

    <!--    </section> --><!-- /.content -->

    <!--Main Content start-->
    <section class="content">
        <div class="content-header">
            <legend>My Courses</legend>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua" onclick="open_associate_course_materials();">
                        <div class="inner">
                            <h4>Available Courses</h4>
                            <p><h4><?php if($associate_course_count != NULL) echo $associate_course_count; else echo 0; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-wand" style="font-size: 85%;"></i>
                        </div>
                        <a  class="small-box-footer">
                          See course materials <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div>
        </div>
        <div class="content-header">
            <legend>My Users</legend>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green" onclick="get_my_students();">
                        <div class="inner">
                            <h4>
                                Users Joined
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h4>
                            <p><h4><?php if($associate_student_count != NULL) echo $associate_student_count[0]['student_count']; else echo 0; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact" style="font-size:85%;"></i>
                        </div>
                        <a class="small-box-footer">
                            See Users joined <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div>
        </div>


 <br> <legend> Charts </legend> <br>
            <div class="content-header">
                <div class="row">
                    <div class="col-xs-12 col-sd-6 col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>
                                <h3 class="box-title">My Users</h3>
                            </div>
                            <div class="box-body chart-responsive">
                                <div class="chart">
                                    <canvas class="flot-base" id="canvas1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /.content -->    <!-- main content ended-->

        <!-- Chart code starts here -->

    <?php      
            $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = "";

            if(isset($students_under_associate)) {
                foreach($students_under_associate as $key => $value) {
                    switch($value['month']) {
                        case '1':
                            $jan = $value['student_count'];
                            break;
                        case '2':
                            $feb = $value['student_count'];
                            break;
                        case '3':
                            $mar = $value['student_count'];
                            break;
                        case '4':
                            $apr = $value['student_count'];
                            break;
                        case '5':
                            $may = $value['student_count'];
                            break;
                        case '6':
                            $jun = $value['student_count'];
                            break;
                        case '7':
                            $jul = $value['student_count'];
                            break;
                        case '8':
                            $aug = $value['student_count'];
                            break;
                        case '9':
                            $sep = $value['student_count'];
                            break;
                        case '10':
                            $oct = $value['student_count'];
                            break;
                        case '11':
                            $nov = $value['student_count'];
                            break;
                        case '12':
                            $dec = $value['student_count'];
                            break;
                        
                        default:
                            exit;
                            break;
                    }
                }
            }
    ?>
        <script src="/static/js/common/chart.js"></script>
        <script type="text/javascript">
            var jan = "<?php if(isset($jan)) echo $jan; else '0'; ?>";
            var feb = "<?php if(isset($feb)) echo $feb; else '0'; ?>";
            var mar = "<?php if(isset($mar)) echo $mar; else '0'; ?>";
            var apr = "<?php if(isset($apr)) echo $apr; else '0'; ?>";
            var may = "<?php if(isset($may)) echo $may; else '0'; ?>";
            var jun = "<?php if(isset($jul)) echo $jun; else '0'; ?>";
            var jul = "<?php if(isset($jul)) echo $jul; else '0'; ?>";
            var aug = "<?php if(isset($aug)) echo $aug; else '0'; ?>";
            var sep = "<?php if(isset($sep)) echo $sep; else '0'; ?>";
            var oct = "<?php if(isset($oct)) echo $oct; else '0'; ?>";
            var nov = "<?php if(isset($nov)) echo $nov; else '0'; ?>";
            var dec = "<?php if(isset($dec)) echo $dec; else '0'; ?>";

            var array   = <?php echo '["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"]'; ?>;
            var barChartData = {
                labels : array,
                datasets : [
                            {
                                label: "Users",
                                fillColor : "rgba(0,166,90,1)",
                                strokeColor : "rgba(255,255,255,0.5)",
                                highlightStroke: "rgba(51,152,204,0.5)",
                                data : [
                                        jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec
                                ]
                            }                        
                ]
            };
        
            $(document).ready(function(){
                var ctx = document.getElementById("canvas1").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {                    
                    responsive : true,
                    // animation: true,
                    // barValueSpacing : 2,
                    // barDatasetSpacing : 1,
                    // tooltipFillColor: "rgba(0,0,0,0.8)",
                    tooltipTitleFontStyle: "bold",
                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                    // tooltipTemplate: "<%= datasetLabel %> - <%= value %>",
                    axisY:{ 
                        title: "Primary Y Axis"
                    }
                });
            });
           
        </script>
        
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