        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2><p><?php if(isset($user_details)) { echo $user_details['user_type']; }?> Dashboard </p>
                <!-- <marquee><small>Flash Update</small></marquee> -->
            </h2>
        </section>

        <!-- Main content -->
        <section class="content">
            <legend> Resource and Assessment </legend> <br>
            <div class="row">
                <?php
                    // For Resources
                    if(isset($sme_subject_resource_count)){
                        foreach ($sme_subject_resource_count as $res) {
                            echo "<div class='col-lg-3 col-xs-6'>";
                            // Display the small box
                                echo "<div class='small-box bg-aqua' onclick='open_mentor_content_management();' >
                                        <div class='inner'>
                                            <h4>".$res->subject_name."</h4><p>Resource : ".$res->res_count." </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='ion ion-wand' style='font-size:85%;'></i>
                                        </div>
                                        <a href='#' class='small-box-footer'>
                                            More info <i class='fa fa-arrow-circle-right'></i>
                                        </a>
                                     </div> ";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='col-lg-3 col-xs-6'>";
                            // Display the small box
                            echo "<div class='small-box bg-aqua' onclick='open_mentor_content_management();' >
                                    <div class='inner'>
                                        <h4>No Resource</h4><p>Resource : 0 </p>
                                    </div>
                                    <div class='icon'>
                                        <i class='ion ion-wand' style='font-size:85%;'></i>
                                    </div>
                                    <a href='#' class='small-box-footer'>
                                        More info <i class='fa fa-arrow-circle-right'></i>
                                    </a>
                                 </div> ";
                            echo "</div>";
                    }
                    // For Assessment
                    if(isset($sme_subject_assessment_count)){
                        foreach ($sme_subject_assessment_count as $res) {
                            echo "<div class='col-lg-3 col-xs-6'>";
                            // Display the small box
                                echo "<div class='small-box bg-green' onclick='show_sme_assessment_tab();' >
                                        <div class='inner'>
                                            <h4>".$res->test_subject."</h4><p>Assessment : ".$res->test_count." </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='icon-book icon-size' style='font-size:70%;'></i>
                                        </div>
                                        <a href='#' class='small-box-footer'>
                                            More info <i class='fa fa-arrow-circle-right'></i>
                                        </a>
                                     </div> ";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='col-lg-3 col-xs-6'>";
                            // Display the small box
                            echo "<div class='small-box bg-green' onclick='show_sme_assessment_tab();' >
                                    <div class='inner'>
                                        <h4>No Assessment </h4><p>Assessment : 0 </p>
                                    </div>
                                    <div class='icon'>
                                        <i class='ion ion-android-contact' style='font-size:85%;'></i>
                                    </div>
                                    <a href='#' class='small-box-footer'>
                                        More info <i class='fa fa-arrow-circle-right'></i>
                                    </a>
                                 </div> ";
                        echo "</div>";
                    }

                ?>
            </div>
            <br><legend> User subscription count </legend>
            
                <div class="content"> 
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div>
            
                        <div class="box-body table-responsive">
                            <table id="mentor_user_count" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.NO</th>
                                        <th>Course Name</th>
                                        <th>Users subscription count</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                $count=1;
                                    if (isset($user_count)) {
                                        foreach ($user_count as $result) {
                                            echo "<tr>";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>".$result->course_name."</td>";
                                                echo "<td> <small class='badge bg-green'>".$result->sub_count."</small></td>";                                                
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th>SL.NO</th>
                                        <th>Course Name</th>
                                        <th>Users subscription count</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            
            <?php 
                /* <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon" onclick="open_content_management();" >
                        <div class="inner">
                            <h3><?php if(isset($resource_count)) echo $resource_count; ?></h3>
                            <p>Total Resource</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple" onclick="open_content_management(); get_subject_list();">
                        <div class="inner">
                            <h3><?php if(isset($assessment_count)) echo $assessment_count; ?></h3>
                            <p>Total Assessment</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div><!-- ./col --> */ 
            ?>
            </div>
        </section><!-- /.content -->
        
        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
        $( document ).ready(function() {
                var mentor_user_count = $('#mentor_user_count').dataTable();
            });
        </script>
