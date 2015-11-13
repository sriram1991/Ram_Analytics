        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <section class="content-header">
            <h3><p>Assessment Reports Details</p></h3>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">
                <div class="tab-content" id="my_course_names">
                    <!--select AOI code start -->
                     <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="control"> 
                                <select id="area_of_int" class="form-control input" tabindex="5" placeholder="Course" onchange="get_mycourses_list(value);">
                                    <option value="">Select AOI</option>
                                    <?php 
                                        if(isset($paid_aoi)){
                                            foreach($paid_aoi as $res){
                                                echo "<option value=\"$res->subject_name\">".$res->subject_name."</option>";
                                            } 
                                        } 
                                    ?>
                                </select>            
                            
                            </div>
                            <span class="help-block"></span>
                        </div>
                        
                        <div id="course_list1">  </div>
                    </div>

                    <br>
                    <!-- select AOI code ending -->               

                </div>
                <br> <br>
                <div class="tab-content" id="student_results">

                </div>
            </div>

        </section>
        <!-- ./Main content -->

        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

