                        <div class="sometype">
                            <br>
                            <div class="btn-group" role="group">
                            </div>
                        </div>
                        <br>
                        <div class="box">
                           
                            <div class="box-body table-responsive">

                                <table id="associate_subjects_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG.NO</th>
                                            <th>SPOC Name</th>
                                            <th>SPOC Email</th>
                                            <th>SPOC Phone</th>
                                            <th>Subscribed Area of Interest</th>
                                            <th>Status</th>
                                            <!-- <th>Manage Associate</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  $count = 1;
                                            if(isset($associates_details)){
                                                function bgcolor($value) {
                                                    switch ($value) {
                                                        case 'Active':
                                                            return 'bg-green';
                                                            break;
                                                        case 'Paid':
                                                            return 'bg-green';
                                                            break;
                                                        case 'Pending Payment':
                                                            return 'bg-yellow';
                                                            break;
                                                        case 'Email Not Verified':
                                                            return 'bg-yellow';
                                                            break;
                                                        case 'Inactive':
                                                            return 'bg-red';
                                                            break;
                                                        default:
                                                            return '';
                                                            break;
                                                    }
                                                }

                                                foreach($associates_details as $res) {
                                                    echo "<tr>";
                                                        echo "<td>".$count++."</td>";
                                                        echo "<td>".$res->registration_no."</td>";
                                                        echo "<td>".$res->user_fname."</td>";
                                                        echo "<td>".$res->user_email."</td>";
                                                        echo "<td>".$res->user_phone."</td>";
                                                        echo "<td>".$res->associate_subjects."</td>";
                                                        // echo "<td>".$res->status_name."</td>";
                                                        echo "<td> <small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                                                        //echo "<td>".set_button1($res->status,$res->user_id)."</td>"; 
                                                    echo "</tr>";
                                                }
                                            }
                                       ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG.NO</th>
                                            <th>SPOC Name</th>
                                            <th>SPOC Email</th>
                                            <th>SPOC Phone</th>
                                            <th>Subscribed Area of Interest</th>
                                            <th>Status</th>
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