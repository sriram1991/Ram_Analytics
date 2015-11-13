       			<style type="text/css">
               td.description{
                    width: 50%;
                    word-wrap: break-word;
                    text-align: justify;
                }          
            </style>
            <!-- DATA TABLES -->
            <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            
                <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <h3>
                      <?php if(isset($assessment_detail)) echo $assessment_detail['test_name']; ?> Test
                    </h3>
                    <center>
                      <h4><font color="LightSeaGreen">Assessment details</font></h4>
                    </center>
                    <ol class="breadcrumb">
                        <?php 
                            echo "<li><a href='#' onClick='get_course_menu(".$course_id."); get_course_modules(".$course_id.");'><i class='fa fa-dashboard'></i>".$course_name."</a></li>"; 
                            echo "<li><a href='#' onClick='get_course_menu(".$course_id."); get_course_subjects(\"$course_id\",\"$module_name\",\"$group_name\");'>".$module_name."</a></li>"; 
                            //echo "<li><a href='#' onClick='get_course_groups(\"$course_id\",\"$module_name\",\"$group_name\");'>".$group_name."</a></li>"; 
                            echo "<li><a href='#' onClick='open_resources(\"$course_id\",\"$subject_name\");'>".$subject_name."</a></li>";
                            echo "<li class='active'>".$assessment_detail['test_name']."</li>";
                        ?>
                    </ol>
                    <br>
                  
 		<!--		<div class="content-body"> -->
          <h4>
 						<div class="row">
 							<div class="col-xs-12 col-sm-6 col-md-4">
 								<div class="control">
                  <font color="LightSeaGreen">Test No :</font>
                  <?php echo $assessment_detail['test_no']; ?>
 								</div>
 							</div>
 							<div class="col-xs-12 col-sm-6 col-md-4">
 								<div class="control">
                  <font color="LightSeaGreen">
 									  Test Name  : 
                  </font>
                   <?php echo $assessment_detail['test_name']; ?>
 								</div>
 							</div>
 							<div class="col-xs-12 col-sm-6 col-md-4">
 								<div class="control">
                  <font color="LightSeaGreen">
 									  Subject Name  :  
                  </font>
                  <?php echo $assessment_detail['test_subject']; ?>
 								</div>
 							</div>
 						</div>
            <br>
 						<div class="row">
 							<div class="col-xs-12 col-sm-6 col-md-4">
 								<div class="control">
                  <font color="LightSeaGreen">
 									  Test Description  : 
                  </font>
                   <?php echo $assessment_detail['test_description']; ?>
 								</div>
 							</div>
 							<div class="col-xs-12 col-sm-6 col-md-4">
 								<div class="control">
                  <font color="LightSeaGreen">
 									  Number of Questions  :  
                  </font>
                  <?php echo $assessment_detail['no_of_questions']; ?>
 								</div>
 							</div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="control">
                  <font color="LightSeaGreen">
                    Test Duration  : 
                  </font>
                   <?php echo $assessment_detail['test_duration']; ?> Mins
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="control">
                  <font color="LightSeaGreen">
                    Test Date  :  
                  </font>
                  <?php echo $assessment_detail['test_date'];?>
                </div>
              </div>
            </div>
          </h4>
 		  <!--   </div> -->
      <!--  <div class="content-footer"> -->
            <center>
              <?php
              $test_date = $assessment_detail['test_date'];
              $todays_date = date("Y-m-d");
              
              /* OLD Code Based on Date
              if($test_date < $todays_date){
                echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#start_test_page' data-backdrop='static' data-keyboard='false' onClick='start_test_page(".$course_id.",\"$subject_name\",".$test_id.",\"$test_name\");' tabindex='4'>Start Test</button>";
                echo"&nbsp";
                echo"&nbsp";
                echo "<button type='button' class='btn btn-success'onClick='show_answer_key(".$course_id.",\"$subject_name\",".$test_id.",\"$test_name\");' >Show Answer Key </button>";
              } else{
                echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#start_test_page' data-backdrop='static' data-keyboard='false' onClick='start_test_page(".$course_id.",\"$subject_name\",".$test_id.",\"$test_name\");' tabindex='4'>Start Test</button>";
              }*/

              if($answer_key_status == 'true'){
                echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#start_test_page' data-backdrop='static' data-keyboard='false' onClick='start_test_page(".$course_id.",\"$subject_name\",".$test_id.",\"$test_name\");' tabindex='4'>Start Test</button>";
                // echo"&nbsp";
                // echo"&nbsp";
                // echo "<button type='button' class='btn btn-success'onClick='show_answer_key(".$course_id.",\"$subject_name\",".$test_id.",\"$test_name\");' >Show Answer Key </button>";
              } else{
                echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#start_test_page' data-backdrop='static' data-keyboard='false' onClick='start_test_page(".$course_id.",\"$subject_name\",".$test_id.",\"$test_name\");' tabindex='4'>Start Test</button>";
              }
                
              ?>
            </center>

              <!-- <button type="button" class="btn btn-success" onClick="start_test_page('<?php echo $course_id; ?>','','','');" tabindex='4'>Start test</button> -->
           <!--</div> -->
   </div>
        <br>
        <div class="box">
          
          <div class="box-body table-responsive">
            <table id="attempt_list" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Attempt No</th>
                  <th>Test No</th>
                  <th>Test Name</th>
                  <th>Test Date & Time</th>
                  <th>Marks</th>
                  <th>Percentage</th>
                  <th>Manage Attempts</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 1;
                  if(isset($attempt_details)){
                    foreach ($attempt_details as $res) {
                      echo "<tr>";
                        echo "<td>".$count++."</td>";
                        echo "<td>".$res->test_no."</td>";
                        echo "<td>".$res->test_name."</td>";
                        echo "<td>".$res->test_date."</td>";
                        echo "<td>".$res->test_score."</td>";
                        echo "<td>".$res->test_percentage." %</td>";
                        echo "<td>
                        <center> 
                              <button type='button' class='btn btn-success' onClick='view_test_attempts(".$res->course_id.",\"$subject_name\",".$test_id.",\"$res->test_name\",".$res->attempt_id.");' > View Attempts </button>
                        </center>
                              </td>"; 
                      echo "</tr>";
                    }
                  }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Attempt No</th>
                  <th>Test No</th>
                  <th>Test Name</th>
                  <th>Test Date & Time</th>
                  <th>Marks</th>
                  <th>Percentage</th>
                  <th>Manage Attempts</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
 	<!--	</section> -->

        <!-- =========  Modal Start =========== -->
        <div class="modal fade" id="start_test_page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                                    

                    <div class="modal-header">
                      <?php echo "<button type='button' class='close' onClick='submit_close_test(\"$course_id\",\"$module_name\",\"$group_name\",\"$subject_name\",\"$test_id\",\"$test_name\");' tabindex='4'>
                                    <span aria-hidden='true'>&times;</span>
                                    <span class='sr-only'>Close</span>
                                  </button>" ?>
                        <!-- <button type="button" class='close' onClick="general_submit();">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button> -->
                        <h4 class="modal-title" id="myModalLabel"><i class="hidden-lg">Your Answer Sheet</i> <?php echo $test_name; ?> Assessment Sheet </h4>
                    </div>
                                    
                    <div class="modal-body" id="body-start_test_page" style="padding: 1%; max-height:650px;">
                        <!-- <iframe id="test_page_frame" src="/student/start_test_page"></iframe> -->
                        <!-- AJAX Call Show Course Batch Modal -->
                    
                    </div>
                                    
                    <div class="modal-footer">
                        <center>
                          <!-- <button type="button" class="btn btn-success" onClick="submit_close_test();" tabindex='4'>Submit</button> -->
                          <?php echo "<button type='button' class='btn btn-success' onClick='submit_close_test(\"$course_id\",\"$module_name\",\"$group_name\",\"$subject_name\",\"$test_id\",\"$test_name\");' tabindex='4'>Submit</button>" ?>
                        </center>
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <!-- <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal">Close</button> -->
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- =============  Modal Ended =========== -->


                   
  <!-- DATA TABLES SCRIPT -->
        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
        //  Calling Window Funciton 
        window.closeModal = function(){
            console.log('i am called from iframe');
            $('#body-start_test_page').html('');
            $('#start_test_page').modal('hide');
            <?php echo "open_test_page(\"$course_id\",\"$module_name\",\"$group_name\",\"$subject_name\",\"$test_id\",\"$test_name\");";?>
        };
        </script>