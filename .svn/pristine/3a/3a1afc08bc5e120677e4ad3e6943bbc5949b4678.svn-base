            <style type="text/css">
                #pdf { height: 100%; width:100%; }
                /*#alink { text-decoration: none; }*/
                #myframe { height: 600px; width: 100%; display: inline-block; }
                .panel-body{ height: 500px; }
                .answer_sheet{ overflow-y: auto; height: inherit;}
            </style>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h3>
                      <?php if(isset($assessment_details)) echo $test_name ; ?> Test Attempt View 
                    </h3>
              <!--     <ol class="breadcrumb">
                        <?php 
                       //     echo "<li><a href='#' onClick='get_course_menu(".$course_id."); get_course_modules(".$course_id.");'><i class='fa fa-dashboard'></i>".$course_name."</a></li>"; 
                        //    echo "<li><a href='#' onClick='get_course_menu(".$course_id."); get_course_groups(\"$course_id\",\"$module_name\");'>".$module_name."</a></li>"; 
                        //    echo "<li><a href='#' onClick='get_course_groups(\"$course_id\",\"$module_name\",\"$group_name\");'>".$group_name."</a></li>"; 
                        //    echo "<li><a href='#' data-course_id=".htmlspecialchars($course_id)." data-subject_name=".htmlspecialchars($subject_name)."
                          //                      onClick='open_resources(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"));'>".$subject_name."</a></li>";
                          //  echo "<li><a href='#' onClick='open_test_page(\"$course_id\",\"$module_name\",\"$group_name\",\"$subject_name\",\"$test_id\",\"$test_name\");'>".$assessment_details['test_name']."</a></li>";
                          //  echo "<li class='active'>".$attempt_details['attempt_count']."</li>";
                        ?>
                    </ol> -->
                    <!-- course_id,module,group,subject,test_id,test_name -->
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                    
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <?php 
                        $pageno = 1; 
                        $question_paper = "NULL";
                        if(isset($assessment_details)){
                          $question_paper = $assessment_details['upload_ques_paper'];
                        }
                      ?>
                      <div id="pdf">
                        <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html"  onLoad="open_ques_paper('<?php if(isset($assessment_details)) echo $question_paper;?>');"></iframe>
                      </div>
                    </div>

                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <form action="POST" action="#" name="StuAnsForm" id="StuAnsForm" role="form">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <div class="panel-title">Answer Sheet</div>
                        </div>
                        
                        <div class="panel-body">
                          <div class="answer_sheet">
                            <table>
                              <tr>
                                <td align='middle' style='height:40px; width:45px;'>&nbsp;</td>
                                <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>1</label></td>
                                <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>2</label></td>
                                <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>3</label></td>
                                <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>4</label></td>
                              </tr>
                              <?php
                                $ans_key = explode(",",$assessment_details['answer_key']);
                                $stu_ans = explode(",",$attempt_details['student_answer']);
                                for($i=1; $i<=$assessment_details['no_of_questions'];$i++){
                                  echo "<tr><td>$i</td>";
                                    for($j=1; $j<=4; $j++){
                                      if($j == $stu_ans[$i-1])
                                      echo "<td style='height: 40px; width:45px;'><input type='radio' style='width: 1.5em; height: 1.5em; style='background-color:green;' name='question[".$i."]' id='option_".$j."' value='$j' checked disabled></td>";
                                    else
                                      echo "<td style='height: 40px; width:45px;'><input type='radio' style='width: 1.5em; height: 1.5em; ' name='question[".$i."]' id='option_".$j."' value='$j' disabled></td>";
                                    }
                                    if($ans_key[$i-1] == $stu_ans[$i-1])
                                      echo "<td style='height: 40px; width:45px;'><span class='glyphicon glyphicon-ok'  style='color:green'></span></td>";
                                    else
                                      echo "<td style='height: 40px; width:45px;'><span class='glyphicon glyphicon-remove'  style='color:red'></span></td>";
                                  echo  "</tr>";
                                } 
                              ?>
                            </table>
                          
                          </div>
                        </div>
                        
                        <div class="panel-footer">
                          <center>
                            <!-- course_id,subject_name,test_id,test_name -->
                            <?php
                              echo "<button type='button' class='btn btn-danger' onClick='open_test_page(\"$course_id\",\"$module_name\",\"$group_name\",\"$subject_name\",\"$test_id\",\"$test_name\");'>Close</button>";
                            ?>
                            <!-- <button type="button" class="btn btn-success" onClick="save_student_answers();" >Submit</button> -->
                          </center>
                        </div>
                      
                      </div>
                    </form>
                  </div>
                </div>
              </section>

                <script type="text/javascript">
                function open_ques_paper(mypath){
                    document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/questions/'+mypath);
                    console.log(" open node pdf called "+mypath);
                //     setTimeout(function() { pdf_page(<?php //echo $seekpos; ?>); }, 1000);
                //     console.log("PDF Opended "+mypath+".pdf  at seekpos "+"<?php //echo $seekpos; ?>");
                }
                </script>
                <script type="text/javascript">
                  function collect_student_answer() {
                    return get_student_answers('<?php echo $assessment_details["no_of_questions"]; ?>');
                  }
                </script>