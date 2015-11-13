    <div class="sometype"> <br> 
    </div>
        <br>
        <div class="box">
            
            <div class="box-body table-responsive">

                <table id="all_scholarship_students" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration No</th>
                            <th>Name</th>
                            <th>Area of Interest</th>
                            <th>Fee</th>
                            <th>Final Amount</th>
                            <th>License</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $count = 1; 
                        if(isset($scholarship_students)){
                            foreach ($scholarship_students as $res) {
                                $quote_id = $res->quote_id;
                                $user_id  = $res->user_id;
                                $subject  = $res->subject_name;
                                $license  = $res->no_of_license;
                                $cost     = $res->discount_amount;
                                $status   = $res->status_id;
                                echo "<tr>";
                                echo "<td>".$count++."</td>";                                
                                echo "<td>".$res->registration_no."</td>";
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->subject_name."</td>";
                                echo "<td>".$res->subject_fee."</td>";
                                echo "<td>".$res->discount_amount."</td>";
                                echo "<td>".$res->no_of_license."</td>";
                                echo "<td> <center><small class='badge ".bgcolor($res->status_id)."'>".set_status($res->status_id)."</small></center></td>";
                                echo "<td>".set_action_button($status,$quote_id,$user_id,$subject,$license,$cost)."</td>";
                                // echo "<td> 
                                //             <center>
                                //             <button type='button' class='btn-sm btn-info' onClick='edit_license_modal(\"$quote_id\",\"$user_id\",\"$subject\",\"$license\",\"$cost\");'> <i class='glyphicon glyphicon-edit text-white'></i></button>
                                //             <button type='button' class='btn-sm btn-danger' onClick='delete_spoc_quote(\"$user_id\",\"$quote_id\",\"$subject\");'> <i class='glyphicon glyphicon-trash text-white'></i></button>
                                //             </center>
                                //       </td>";
                                echo "</tr>";
                            }
                          
                        }

                        function set_action_button($status,$quote_id,$user_id,$subject,$license,$cost){
                            switch ($status) {
                                case '9':
                                    return "<center>
                                            <button type='button' class='btn-sm btn-info' onClick='edit_license_modal(\"$quote_id\",\"$user_id\",\"$subject\",\"$license\",\"$cost\");'> <i class='glyphicon glyphicon-edit text-white'></i></button>
                                            <button type='button' class='btn-sm btn-danger' onClick='delete_spoc_quote(\"$user_id\",\"$quote_id\",\"$subject\");'> <i class='glyphicon glyphicon-trash text-white'></i></button>
                                            </center>";
                                    break;
                                case '6':
                                    return "<center>
                                            <button type='button' class='btn-sm btn-info' onClick='edit_license_modal(\"$quote_id\",\"$user_id\",\"$subject\",\"$license\",\"$cost\");'> <i class='glyphicon glyphicon-edit text-white'></i></button>
                                            </center>";
                                    break;
                                case '7':
                                    return "<center>
                                            <button type='button' class='btn-sm btn-danger' onClick='delete_spoc_quote(\"$user_id\",\"$quote_id\",\"$subject\");'> <i class='glyphicon glyphicon-trash text-white'></i></button>
                                            </center>";
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        }

                        function set_status($status) {
                            switch ($status) {
                                case '9':
                                    return 'Applied';
                                    break;
                                case '6':
                                    return 'Approved';
                                    break;
                                case '7':
                                    return 'Work in progress';
                                    break;
                                default:
                                    return '';
                                    break;
                            }
                        }

                        function bgcolor($value) {
                            switch ($value) {
                                case '9':
                                    return 'bg-yellow';
                                    break;
                                case '6':
                                    return 'bg-green';
                                    break;
                                case '7':
                                    return 'bg-red';
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
                            <th>Registration No</th>
                            <th>Name</th>
                            <th>Area of Interest</th>
                            <th>Fee</th>
                            <th>Final Amount</th>
                            <th>License</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    <div class="modal fade" id="grantLicense" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">  
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Grant no of user License</h4>
                </div>

                <div class="modal-body" id="grant_license">
                    <!-- Load Ajax Here -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" autofocus onclick="update_license_request();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" onClick="$('#grantLicenseForm').trigger('reset');" >Reset</button>
                </div> 
            </div>
        </div>
    </div>
