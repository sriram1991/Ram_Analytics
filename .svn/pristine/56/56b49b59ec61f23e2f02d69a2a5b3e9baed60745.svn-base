        <section class="content-header">
            <h2><p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Dashboard </p>
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua" onclick="open_course();">
                        <div class="inner">
                            <h4>Course</h4>
                            <p><h4><?php if(isset($course_count)) echo $course_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-wand" style="font-size: 85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                        
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green" onclick="open_student();">
                        <div class="inner">
                            <h4>
                                Users
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h4>
                            <p><h4><?php if(isset($students_count)) echo $students_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
<!--                 <div class="col-lg-3 col-xs-6">

                    <div class="small-box bg-yellow" onclick="open_parent();">
                        <div class="inner">
                            <h4>Parent</h4>
                             <p><h4><?php if(isset($parent_count)) echo $parent_count; ?></h4></p> 
                        </div>
                        <div class="icon">
                            <i class="ion ion-man" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div> -->
                        
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red" onclick="open_associate();" >
                        <div class="inner">
                            <h4>SPOC</h4>
                            <p><h4><?php if(isset($associate_count)) echo $associate_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->

                 <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue" onclick="open_directors()" >
                        <div class="inner">
                            <h4>Mentor/SME</h4>
                            <p><h4><?php if(isset($mentor_count)) echo $mentor_count; ?></h4></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person" style="font-size:85%;"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->


            </div>
            <br> <legend> Charts </legend> <br>
            <div class="content-header">
                <div class="row">
                    <div class="col-xs-12 col-sd-6 col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>
                                <h3 class="box-title">User vs SPOC Registration Details</h3>
                            </div>
                            <div class="box-body chart-responsive">
                                <div class="chart">
                                    <canvas class="flot-base" id="canvas1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
     

                    <div class="col-xs-12 col-sd-6 col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>
                                <h3 class="box-title">Users Course Subscription</h3>
                            </div>
                            <div class="box-body chart-responsive">
                                <div id="canvas-holder">
                                <h4 id="pie_error" style="color:red;"></h4>
                                   <center> <canvas id="chart-area" width="300" height="247"/></canvas> </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    <?php 
            $stu_jan = $stu_feb = $stu_mar = $stu_apr = $stu_may = $stu_jun = ""; 
            $stu_jul = $stu_aug = $stu_sep = $stu_oct = $stu_nov = $stu_dec = "";  
        
            if(isset($student_data)){
                foreach ($student_data as $key => $value) {
                    switch ($value['month']) {
                        case '1':                           
                            $stu_jan = $value['student_count'];
                            break;
                        case '2':                          
                            $stu_feb = $value['student_count'];
                            break;
                        case '3':                           
                            $stu_mar = $value['student_count'];
                            break;
                        case '4':                          
                            $stu_apr = $value['student_count'];
                            break;
                        case '5':                          
                            $stu_may = $value['student_count'];
                            break;
                        case '6':                          
                            $stu_jun = $value['student_count'];
                            break;
                        case '7':                          
                            $stu_jul = $value['student_count'];                            
                            break;
                        case '8':                           
                            $stu_aug = $value['student_count'];
                            break;
                        case '9':                           
                            $stu_sep = $value['student_count'];
                            break;
                        case '10':                           
                            $stu_oct = $value['student_count'];
                            break;
                        case '11':                           
                            $stu_nov = $value['student_count'];
                            break;
                        case '12':                          
                            $stu_dec = $value['student_count'];
                            break;
            
                        default:
                            exit;
                            break;
                    }
                }
            }

            if (isset($associate_data)) {
                foreach ($associate_data as $key => $value) {
                    switch ($value['month']) {
                        case '1':                            
                            $ass_jan = $value['associate_count'];
                            break;
                        case '2':                           
                            $ass_feb = $value['associate_count'];
                            break;
                        case '3':                            
                            $ass_mar = $value['associate_count'];
                            break;
                        case '4':                           
                            $ass_apr = $value['associate_count'];
                            break;
                        case '5':                            
                            $ass_may = $value['associate_count'];
                            break;
                        case '6':                            
                            $ass_jun = $value['associate_count'];
                            break;
                        case '7':                            
                            $ass_jul = $value['associate_count'];
                            break;
                        case '8':                           
                            $ass_aug = $value['associate_count'];
                            break;
                        case '9':                           
                            $ass_sep = $value['associate_count'];
                            break;
                        case '10':                           
                            $ass_oct = $value['associate_count'];
                            break;
                        case '11':                           
                            $ass_nov = $value['associate_count'];
                            break;
                        case '12':                           
                            $ass_dec = $value['associate_count'];
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

            var stu_jan = "<?php if(isset($stu_jan)) echo $stu_jan; else '0'; ?>";
            var stu_feb = "<?php if(isset($stu_feb)) echo $stu_feb; else '0'; ?>";
            var stu_mar = "<?php if(isset($stu_mar)) echo $stu_mar; else '0'; ?>";
            var stu_apr = "<?php if(isset($stu_apr)) echo $stu_apr; else '0'; ?>";
            var stu_may = "<?php if(isset($stu_may)) echo $stu_may; else '0'; ?>";
            var stu_jun = "<?php if(isset($stu_jun)) echo $stu_jun; else '0'; ?>";
            var stu_jul = "<?php if(isset($stu_jul)) echo $stu_jul; else '0'; ?>";
            var stu_aug = "<?php if(isset($stu_aug)) echo $stu_aug; else '0'; ?>";
            var stu_sep = "<?php if(isset($stu_sep)) echo $stu_sep; else '0'; ?>";
            var stu_oct = "<?php if(isset($stu_oct)) echo $stu_oct; else '0'; ?>";
            var stu_nov = "<?php if(isset($stu_nov)) echo $stu_nov; else '0'; ?>";
            var stu_dec = "<?php if(isset($stu_dec)) echo $stu_dec; else '0'; ?>";

            var ass_jan = "<?php if(isset($ass_jan)) echo $ass_jan; else '0'; ?>";
            var ass_feb = "<?php if(isset($ass_feb)) echo $ass_feb; else '0'; ?>";
            var ass_mar = "<?php if(isset($ass_mar)) echo $ass_mar; else '0'; ?>";
            var ass_apr = "<?php if(isset($ass_apr)) echo $ass_apr; else '0'; ?>";
            var ass_may = "<?php if(isset($ass_may)) echo $ass_may; else '0'; ?>";
            var ass_jun = "<?php if(isset($ass_jun)) echo $ass_jun; else '0'; ?>";
            var ass_jul = "<?php if(isset($ass_jul)) echo $ass_jul; else '0'; ?>";
            var ass_aug = "<?php if(isset($ass_aug)) echo $ass_aug; else '0'; ?>";
            var ass_sep = "<?php if(isset($ass_sep)) echo $ass_sep; else '0'; ?>";
            var ass_oct = "<?php if(isset($ass_oct)) echo $ass_oct; else '0'; ?>";
            var ass_nov = "<?php if(isset($ass_nov)) echo $ass_nov; else '0'; ?>";
            var ass_dec = "<?php if(isset($ass_dec)) echo $ass_dec; else '0'; ?>";

            var array   = <?php echo '["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"]'; ?>;
            var barChartData = {
            labels : array,
            datasets : [
                        {
                            label: "User",
                            fillColor : "rgba(0,166,90,1)",
                            strokeColor : "rgba(255,255,255,0.5)",
                            highlightStroke: "rgba(51,152,204,0.5)",
                            data : [
                                stu_jan,stu_feb,stu_mar,stu_apr,stu_may,stu_jun,
                                stu_jul,stu_aug,stu_sep,stu_oct,stu_nov,stu_dec
                            ]
                        },
                        {
                            label: "SPOC",
                            fillColor : "rgba(245,105,84,1)",
                            strokeColor : "rgba(255,255,255,0.5)",
                            highlightStroke : "rgba(151,187,205,1)",
                            data : [
                                   ass_jan,ass_feb,ass_mar,ass_apr,ass_may,ass_jun,
                                   ass_jul,ass_aug,ass_sep,ass_oct,ass_nov,ass_dec
                            ]
                        }
            ]
            };
            
            $(document).ready(function(){

                function randcolor(){
                    var code = '0123456789ABCDEF';
                    var color = "#";
                    for (var i = 0; i < 6; i++) {
                        color +=  code[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

            var ctx = document.getElementById("canvas1").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {
                    responsive : true,
                    animation: true,
                    barValueSpacing : 2,
                    barDatasetSpacing : 1,
                    tooltipFillColor: "rgba(0,0,0,0.8)",
                    multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>",
                    axisY:{ 
                        title: "Primary Y Axis"
                    }              
                });
                   var piechart_data = [];
                   var pieData = <?php echo json_encode($pie_chart); ?>;
                   if(pieData != null ){

                       for(var i=0;i<pieData.length;i++){
                            var course_data = {value: pieData[i]['course_count'] ,color: randcolor(),highlight: randcolor(),label: pieData[i]['course_name']};
                            piechart_data.push(course_data);
                       }
                
                        var ctx1 = document.getElementById("chart-area").getContext("2d");
                        window.myPie = new Chart(ctx1).Pie(piechart_data);
                   }  else{
                    $('#pie_error').text("Still courses are not yet subscribed by any user.");
                   }
            });
        </script>