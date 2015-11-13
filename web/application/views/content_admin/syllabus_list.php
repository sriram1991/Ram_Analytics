                            <div class="box-header">
                                <h3 class="box-title pull-left">
                                    <?php 
                                    if(isset($course_details)){ 
                                        echo $course_details['course_name']." Syllabus List"; 
                                    } else { 
                                        echo "Syllabus List";
                                    } 
                                    ?>
                                </h3>
                                <h3 class="box-title pull-right">
                                    <div class="btn-group" role="group" aria-label="manage-syllabus">
                                        <button type="button" class="btn btn-success ion-university" data-toggle="modal" data-target="#add_syllabus_modal" data-whatever="Add Resource" onClick="load_csr_modal();">Add Resource</button>
                                        <!-- <button type="button" class="btn btn-primary ion-university" title="Work in Progress ...">Add Assessment</button> -->
                                        <button type="button" class="btn btn-primary ion-university" data-toggle="modal" data-target="#add_test_syllabus_modal" data-whatever="Add Assessment" onClick="load_csa_modal();">Add Assessment</button>
                                        <!-- <button type="button" class="btn btn-warning">Change Order</button> -->
                                    <!-- <button type="button" class="btn btn-danger">Delete All Resource</button> -->
                                    </div>
                                </h3>
                            </div><!-- /.box-header -->
                            
                            <div class="box-body table-responsive">
                                <table id="course_syllabus_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Module</th>
                                            <th>Group</th>
                                            <th>Subject Name</th>
                                            <th>Syllabus Type</th>
                                            <th>Resource Name</th>
                                            <th>Resource Type</th>
                                            <th>Schedule</th>
                                            <!-- <th>Resource Order</th> -->
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $count = 1;
                                            foreach ($syllabus_list as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->module_name."</td>";
                                                    echo "<td>".$res->group_name."</td>";
                                                    echo "<td>".$res->subject_name."</td>";
                                                    echo "<td>".$res->syllabus_type."</td>";
                                                    echo "<td>".$res->resource_name."</td>";
                                                    echo "<td>".$res->resource_type."</td>";
                                                    echo "<td>".$res->schedule." Week</td>";
                                                    //echo "<td>".$res->res_order."</td>";
                                                    echo "<td> 
                                                            <button type='button' class='btn-sm btn-info'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                            <button type='button' class='btn-sm btn-danger' onClick='delete_syllabus(".$res->map_id.",".$res->course_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                          </td>"; 
                                                echo "</tr>";
                                            }
                                        ?>                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Module</th>
                                            <th>Group</th>
                                            <th>Subject Name</th>
                                            <th>Syllabus Type</th>
                                            <th>Resource Name</th>
                                            <th>Resource Type</th>
                                            <th>Schedule</th>
                                            <!-- <th>Resource Order</th> -->
                                            <th>Manage</th>                                        
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->

<!-- ============= ADD Syllabus Resource Modal =========== -->
    <div class="modal fade" id="add_syllabus_modal" tabindex="-1" role="dialog" aria-labelledby="add_syllabus_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="add_syllabus_modalLabel">Add Syllabus</h4>
                </div>
                                    
                <div class="modal-body" id="body-add_syllabus">
                
                    <!-- AJAX CALL Will LOAD Add Course Syllabus Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='add_syllabus("<?php if(isset($course_details)){ echo $course_details['course_id']; } ?>","RESOURCE");' tabindex='3'>Add Resource</button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Cancel</button>
                    
                </div>

            </div>
        </div>
    </div>
<!-- ============= ADD Syllabus Resource Modal =========== -->


<!-- ============= ADD Syllabus Resource Modal =========== -->
    <div class="modal fade" id="add_test_syllabus_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Assessment</h4>
                </div>
                                    
                <div class="modal-body" id="body-add_test_syllabus">
                    
                    <!-- AJAX CALL Will LOAD Add Course Syllabus Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='add_syllabus("<?php if(isset($course_details)){ echo $course_details['course_id']; } ?>","ASSESSMENT");' tabindex='3'>Add Assessment</button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Cancel</button>
                    
                </div>
            
            </div>
        </div>
    </div>
<!-- ============= ADD Syllabus Resource Modal =========== -->