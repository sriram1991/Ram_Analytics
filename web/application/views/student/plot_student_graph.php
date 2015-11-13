<br>    <div class="row">
            <div class="col-xs-12 col-sd-6 col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                      <i class="fa fa-bar-chart-o"></i>
                        <h3 class="box-title">User monthly test graph</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart">
                            <canvas class="flot-base" id="canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
        <?php 
            if(isset($load_graph_data)){
                foreach ($load_graph_data as $key => $value) {

                    switch ($value['month']) {
                        case '1':        
                            if($value['test_percentage'] > 0){    
                                $stu_jan = $value['test_percentage'];
                            }            
                            break;
                        case '2':
                            if($value['test_percentage'] > 0){
                                $stu_feb = $value['test_percentage'];
                            }          
                            break;
                        case '3':
                            if($value['test_percentage'] > 0){
                                $stu_mar = $value['test_percentage'];
                            }
                            break;
                        case '4':
                            if($value['test_percentage'] > 0){
                                $stu_apr = $value['test_percentage'];
                            }                          
                            break;
                        case '5':                          
                            if($value['test_percentage'] > 0){
                                $stu_may = $value['test_percentage'];
                            }
                            break;
                        case '6':                          
                            if($value['test_percentage'] > 0){
                                $stu_jun = $value['test_percentage'];
                            }
                            break;
                        case '7':     
                            if($value['test_percentage'] > 0){
                                $stu_jul = $value['test_percentage'];                            
                            }                     
                            break;
                        case '8':    
                            if($value['test_percentage'] > 0){
                                $stu_aug = $value['test_percentage'];
                            }                       
                            break;
                        case '9':   
                            if($value['test_percentage'] > 0){
                                $stu_sep = $value['test_percentage'];
                            }                        
                            break;
                        case '10':  
                            if($value['test_percentage'] > 0){
                                $stu_oct = $value['test_percentage'];
                            }                         
                            break;
                        case '11':  
                            if($value['test_percentage'] > 0){
                                $stu_nov = $value['test_percentage'];
                            }                         
                            break;
                        case '12':  
                            if($value['test_percentage'] > 0){
                                $stu_dec = $value['test_percentage'];
                            }                        
                            break;
            
                        default:
                            exit;
                            break;
                    }
                }
            }else{
                echo "<h4 style='color:red'> You have not writen any test</h4>";
            }
        ?>

        <script src="/static/js/common/chart.js"></script>
        <script type="text/javascript">
            
            var stu_jan = "<?php if(isset($stu_jan)) echo $stu_jan; else 'NULL'; ?>";
            if(stu_jan=='')
                stu_jan =null;

            var stu_feb = "<?php if(isset($stu_feb)) echo $stu_feb; else NULL; ?>";
            if(stu_feb=='')
                stu_feb =null;
            
            var stu_mar = "<?php if(isset($stu_mar)) echo $stu_mar; else NULL; ?>";
            if(stu_mar=='')
                stu_mar =null;
            
            var stu_apr = "<?php if(isset($stu_apr)) echo $stu_apr; else null; ?>";
            if(stu_apr=='')
                stu_apr =null;
            
            var stu_may = "<?php if(isset($stu_may)) echo $stu_may; else null; ?>";
            if(stu_may=='')
                stu_may =null;
            
            var stu_jun = "<?php if(isset($stu_jun)) echo $stu_jun; else null; ?>";
            if(stu_jun=='')
                stu_jun =null;
            
            var stu_jul = "<?php if(isset($stu_jul)) echo $stu_jul; else null; ?>";
            if(stu_jul=='')
                stu_jul =null;
            
            var stu_aug = "<?php if(isset($stu_aug)) echo $stu_aug; else null; ?>";
            if(stu_aug=='')
                stu_aug =null;         
            
            var stu_sep = "<?php if(isset($stu_sep)) echo $stu_sep; else null; ?>";
            if(stu_sep=='')
                stu_sep =null;
            
            var stu_oct = "<?php if(isset($stu_oct)) echo $stu_oct; else null; ?>";
            if(stu_oct=='')
                stu_oct =null;

            var stu_nov = "<?php if(isset($stu_nov)) echo $stu_nov; else null; ?>";
            if(stu_nov=='')
                stu_nov =null;
                        
            var stu_dec = "<?php if(isset($stu_dec)) echo $stu_dec; else null; ?>";
            if(stu_dec=='')
                stu_dec =null;

            var array   = <?php echo '["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"]'; ?>;
            var lineChartData = {
                labels : array,
                datasets : [
                            {
                                label: "Student",
                                fillColor : "rgba(000,000,000,0)",
                                strokeColor : "rgba(78,206,157,1)",
                                pointColor : "rgba(151,187,205,1)",
                                pointStrokeColor : "#fff",
                                pointHighlightFill : "#fff",
                                pointHighlightStroke : "rgba(151,187,205,1)",
                                data : [
                                    stu_jan,stu_feb,stu_mar,stu_apr,stu_may,stu_jun,
                                    stu_jul,stu_aug,stu_sep,stu_oct,stu_nov,stu_dec
                                ]
                            }
                           ]
            };
             
            $(document).ready(function(){
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myLine = new Chart(ctx).Line(lineChartData, {
                    responsive : true,
                    animation: true,
                    // datasetStrokeWidth: 2,
                    pointDotRadius : 4,
                    // tooltipYPadding: 6,
                    tooltipFillColor: "rgba(0,0,0,0.8)",
                    // tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>"
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

                });
            });
           
        </script>