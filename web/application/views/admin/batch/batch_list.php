                        <div class="sometype">
                            <br>
                            <button type="button" class="btn btn-primary icon-organization text-white" data-toggle="modal" data-target="#add_batch_modal" onClick="load_batch_modal();" whatever="Create Batch">
                                Create Batch
                            </button>
                        </div>
                        <br>
                        <div class="box">
                           
                            <div class="box-body table-responsive">
                                <table id="batch_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Batch Name</th>
                                            <th>Batch Type</th>
                                            <th>Course Name</th>
                                            <th>Course Duration</th>
                                            <th>Course Fee</th>
                                            <th>Payment Status</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $count = 1;
                                            foreach ($batch_list as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->batch_name."</td>";
                                                    echo "<td>".$res->batch_type."</td>";
                                                    echo "<td>".$res->course_name."</td>";
                                                    echo "<td>".$res->course_duration." Months</td>";
                                                    echo "<td>".$res->course_fee."</td>";
                                                    echo "<td>".$res->payment_status."</td>";
                                                    echo "<td>
                                                           <button type='button' class='btn-sm btn-info' onClick='edit_batch_modal(".$res->batch_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                           <button type='button' class='btn-sm btn-danger' onClick='delete_batch(".$res->batch_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                          </td>"; 
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Batch Name</th>
                                            <th>Batch Type</th>
                                            <th>Course Name</th>
                                            <th>Course Duration</th>
                                            <th>Course Fee</th>
                                            <th>Payment Status</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <!-- ============= ADD Batch Modal Start =========== -->

                        <div class="modal fade" id="add_batch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Create Batch </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_batch">
                                                        
                                        <!-- AJAX CALL Fill with: load_batch_modal -->
                                                        
                                    </div>
                                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="add_batch('#ajax_file_upload');" id="add_pdf_btn" data-loading-text="Processing..." tabindex='4'>Create Batch</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='6'>Cancel</button>        
                                    </div>
                                                    
                                </div>
                            </div>
                        </div>

                    <!-- ============= ADD Batch Modal End =========== -->



                    <!-- ========= Edit Batch Modal Start =========== -->

                        <div class="modal fade" id="edit_batch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Edit Batch </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-edit_batch">
                                        
                                        <!-- AJAX Call Edit Batch Modal -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='6'>Cancel</button>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= Edit Batch Modal End =========== -->