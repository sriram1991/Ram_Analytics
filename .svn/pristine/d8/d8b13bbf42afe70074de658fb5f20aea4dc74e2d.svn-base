        <!-- DATA TABLES -->
        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>Assessment Reports</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" id="tab_national_level" class="active"><a href="#student_results" id="national_results" onclick="assessment_result_reports()" aria-controls="students" role="tab" data-toggle="tab">National Level Rank List</a></li>
                    <li role="presentation" id="tab_batch_level"><a href="#batchwise_results" id="batchwise_results" onclick="batch_level_results();" aria-controls="students" role="tab" data-toggle="tab">Batch Level Rank List</a></li>
                    <!-- <li role="presentation"><a href="#payment_not_verified_students" onClick="payment_not_verified_students();" aria-controls="students" role="tab" data-toggle="tab">Payment not Verified Students</a></li> -->
                </ul>
                <!-- Nav tabs -->
                <h4 id="reports_error" style="color:red;"></h4>
                <!-- Tab panes -->
                <div class="tab-content">
                    <br>
                    <br>
                    <div role="tabpanel" class="tab-pane active" id="national_level_results">
                                                
                        <div class="tab-content" id="national_course_names">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="control"> 
                                        <select id="course_id" class="form-control input" tabindex="5" placeholder="Course" onchange="get_all_course_tests(value,'national_level');">
                                            <option value="">Select Course</option>
                                            <?php 
                                                if(isset($courses)){
                                                    foreach($courses as $res){
                                                        echo "<option value=".$res->course_id.">".$res->course_name."</option>";
                                                    } 
                                                } 
                                            ?>
                                        </select>            
                                    
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                                
                                <div id="national_course_tests" class="col-xs-12 col-sm-6 col-md-3">
                                    
                                </div>
                            
                            </div>
                    
                        </div>
                        <br> <br>
                        <div class="tab-content" id="national_student_results">

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="batch_level_results">
                        <div class="tab-content" id="batch_course_names">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="control" id="batchname_list"> 
                                        <select name="state" autocomplete="off" id="batch_name" class="form-control input" onchange="batch_name_changed();" size="1" placeholder="State" tabindex="13">
                                            <option value="" selected="">Batch Name</option>
                                            <?php 
                                                if(isset($batches)){
                                                    foreach ($batches as $ress) {
                                                        if($ress->user_state != 'State'){
                                                            echo "<option value='".$ress->user_state."'>".$ress->user_state."</option>";    
                                                        }   
                                                    }
                                                } 

                                            ?>
                                        </select>
                                    </div>
                                    <span class="help-block"></span>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="control"> 
                                        <select id="batch_course_id" class="form-control input" tabindex="5" placeholder="Course" onchange="get_all_course_tests(value,'batch_level');">
                                            <option value="">Select Course</option>
                                            <?php 
                                                if(isset($courses)){
                                                    foreach($courses as $res){
                                                        echo "<option value=".$res->course_id.">".$res->course_name."</option>";
                                                    } 
                                                } 
                                            ?>
                                        </select>            
                                    
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                                
                                <div id="batch_course_tests" class="col-xs-12 col-sm-6 col-md-3">
                                    
                                </div>
                            
                            </div>
                    
                        </div>
                        <br> <br>
                        <div class="tab-content" id="batch_student_results">

                        </div>
                    </div>
                    
                    
                </div>
                <!-- Tab panes -->
            </div>
            <!-- ./TAB PANEL -->

        </section>
        <!-- ./Main content -->

        <!-- Content Header (Page footer) -->
        <!-- DATA TABES SCRIPT -->
        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            // assessment_selected("");
        </script>        

