                        
                        <div class="sometype">
                            <br>
                            <?php 
                            /*
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary ion-university" data-toggle="modal" data-target="#load-assmodal" onClick="add_assessment_modal();">
                                  Add Assessment
                                  <!-- <span class="caret"></span> -->
                                </button>
                                <!-- <ul class="dropdown-menu" role="menu"> -->
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addAssessmentRes" onClick="add_assessment_modal();">Assessment</a></li> -->
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addURLRes">URL</a></li> -->
                                <!-- </ul> -->
                            </div>
                            */
                            ?>
                        </div>
                        <br>
                        <div class="box">
                          
                            <div class="box-body table-responsive">

                                <table id="mentor_assessments_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG NO</th>
                                            <th>User Role</th>
                                            <th>Test No</th>
                                            <th>Area of Interest Name</th>
                                            <th>Test Name</th>
                                            <!-- <th>No.of Questions</th> -->
                                            <!-- <th>Test Duration</th> -->
                                            <th>Manage Resource</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  $count = 1;
                                            if(isset($assessment_details)){
                                                function set_button($role_id,$res_test_id){
                                                    switch ($role_id) {
                                                        case '6':
                                                            return "
                                                                    <button type='button' class='btn-sm btn-success' onClick='ans_key_modal(".$res_test_id.");'>Answer Key</button>
                                                                    <button type='button' class='btn-sm btn-info' onClick='edit_assessment_modal(".$res_test_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button> 
                                                                    <a href='/resource/mentor_assessment_download_file/?file_id=".$res_test_id."'> <button type='button' class='btn-sm btn-success'> <i class='glyphicon glyphicon-download-alt'></i> </button></a> ";
                                                            break;
                                                        case '7':
                                                            return "
                                                                    <button type='button' class='btn-sm btn-success' onClick='ans_key_modal(".$res_test_id.");'>Answer Key</button>
                                                                    <button type='button' class='btn-sm btn-info' onClick='edit_assessment_modal(".$res_test_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button> 
                                                                    <button type='button' class='btn-sm btn-danger' onClick='delete_assessment(".$res_test_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button> 
                                                                    
                                                                    <a href='/resource/mentor_assessment_download_file/?file_id=".$res_test_id."'> <button type='button' class='btn-sm btn-success'> <i class='glyphicon glyphicon-download-alt'></i> </button></a> ";
                                                            break;
                                                        case '8':
                                                            return "
                                                                    <button type='button' class='btn-sm btn-success' onClick='ans_key_modal(".$res_test_id.");'>Answer Key</button>
                                                                    <button type='button' class='btn-sm btn-info' onClick='edit_assessment_modal(".$res_test_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button> 
                                                                    <button type='button' class='btn-sm btn-danger' onClick='delete_assessment(".$res_test_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button> 
                                                                    
                                                                    <a href='/resource/mentor_assessment_download_file/?file_id=".$res_test_id."'> <button type='button' class='btn-sm btn-success'> <i class='glyphicon glyphicon-download-alt'></i> </button></a> ";
                                                            break;
                                                        default:
                                                            return "some thing went wrong !";
                                                            break;
                                                    }
                                                }

                                                foreach ($assessment_details as $res) {
                                                    echo "<tr>";
                                                        echo "<td>".$count++."</td>";
                                                        echo "<td>".$res->registration_no."</td>";
                                                        echo "<td>".$res->role_name."</td>";
                                                        echo "<td>".$res->test_no."</td>";
                                                        echo "<td>".$res->test_subject."</td>";
                                                        echo "<td>".$res->test_name."</td>";
                                                        // echo "<td>".$res->no_of_questions."</td>";
                                                        // echo "<td>".$res->test_duration." "."Mins</td>";
                                                        echo "<td>".set_button($user_role,$res->test_id)."</td>";
                                                        // echo "<td> 
                                                        //          <button type='button' class='btn-sm btn-success' onClick='ans_key_modal(".$res->test_id.");'>Answer Key</button>
                                                        //          <button type='button' class='btn-sm btn-info' onClick='edit_assessment_modal(".$res->test_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button> 
                                                        //          <button type='button' class='btn-sm btn-danger' onClick='delete_assessment(".$res->test_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button> 
                                                        //       </td>"; 
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG NO</th>
                                            <th>User Role</th>
                                            <th>Test No</th>
                                            <th>Area of Interest Name</th>
                                            <th>Test Name</th>
                                            <!-- <th>No.of Questions</th> -->
                                            <!-- <th>Test Duration</th> -->
                                            <th>Manage Resource</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <!-- ============= ADD Assessment Modal =========== -->

                        <div class="modal fade" id="load-assmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg  ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Assessment </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_assessment">
                                        <!-- AJAX Call Will Load Assessment Modal -->
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="upload_ass_pdf('#ass_file_upload');" id="assessment_pdf" data-loading-text="Processing..." >Add Assessment</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Assessment Modal =========== -->

                        <!-- ============= EDIT Assessment Modal start=========== -->

                        <div class="modal fade" id="edit-assmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg  ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Edit Assessment </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-edit_assessment">
                                        <!-- AJAX Call Will Load Edit Assessment Modal -->
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success edit_assessment_btn" onClick="update_assessment();" >Save Changes</button>
                                        <button type="button" class="btn btn-warning edit_assessment_btn" onClick="$('.input').val('');">Reset</button>
                                        <button type="button" class="btn btn-danger edit_assessment_btn" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>
                                        <button type='button' class='btn btn-danger close_assessment_btn' data-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============= EDIT Assessment Modal end =========== -->

                        <!-- =============answer key modal start ==========-->
                        <div class="modal fade" id="AnsKeyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Answer Key</h4>
                                
                              </div>

                              <div class="modal-body" id="body-ans_key">

                                <!-- AJAX Call will load Answer Key Modal -->

                              </div>

                              <div class="modal-footer">

                                <button type="button" class="btn btn-success" onClick="save_answer();" >Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>

                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- =============answer key modal end ==========-->



