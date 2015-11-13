                        <div class="sometype">
                            <br>
                            <div class="btn-group" role="group">
                            </div>
                        </div>
                        <br>
                        <div class="box">
                           
                            <div class="box-body table-responsive">

                                <table id="associate_document_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG.NO</th>
                                            <th>Organization Name</th>
                                            <th>Users Count</th>
                                            <th>Letter of Intent</th>
                                            <!-- <th>Status</th> -->
                                            <!-- <th>Manage Associate</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  $count = 1;
                                            foreach($associates_details as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->registration_no."</td>";
                                                    echo "<td>".$res->organization_name."</td>";
                                                    echo "<td>".$res->student_count."</td>";
                                                    echo "<td>".$res->intent_letter."</td>";
                                                    //echo "<td><small class='badge ".set_status($res->status)."'>".set_doc_status($res->status)."</small></td>";
                                                    //echo "<td>".set_button1($res->status,$res->user_id)."</td>"; 
                                                echo "</tr>";
                                            }

                                            function set_button1($status,$user_id)
                                            {
                                                switch ($status) {
                                                    case '0':
                                                        return "<button type='button' class='btn-sm btn-success' onClick='open_associate_varify_modal(".$user_id.");'>Verify</button>";
                                                        break;
                                                    case '1':
                                                        return "Verified";
                                                        break;
                                                    default:
                                                        return '';
                                                        break;
                                                }
                                            }

                                            function set_status($value)
                                            {
                                                switch ($value) {
                                                    case '0':
                                                        return 'bg-red';
                                                        break;
                                                    case '1':
                                                        return 'bg-green';
                                                        break;
                                                    default:
                                                        return '';
                                                        break;
                                                }
                                            }
                                            // for associate document varification..
                                            function set_doc_status($value)
                                            {
                                                switch ($value) {
                                                    case '0':
                                                        return 'Docs Not Verified';
                                                        break;
                                                    case '1':
                                                        return 'Docs Verified';
                                                        break;
                                                    default:
                                                        return '';
                                                        break;
                                                }
                                            }
                                       ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG.NO</th>
                                            <th>Organization Name</th>
                                            <th>Users Count</th>
                                            <th>Letter of Intent</th>
                                            <!-- <th>Status</th> -->
                                            <!-- <th>Manage Associate</th> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    <!-- ============= Verify Associate Modal =========== -->

                        <div class="modal fade" id="varify_asso_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                                        
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Associate Details </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-associate_varify_details">
                                        <!-- AJAX Will Fill Verify Associate Modal -->
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" title='Work in process...' tabindex='3'>Verify</button>
                                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='4'>Reset</button> -->
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Cancel</button>
                                        
                                    </div>                                    

                                </div>
                            </div>
                        </div>

                        <!-- ============= Varify Associate Modal =========== -->