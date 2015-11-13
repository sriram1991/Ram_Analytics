                    <div class="sometype">
                            <br>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary icon-broadcast" onClick="add_associate_modal();" >
                                  Add SPOC
                                  <!-- <span class="caret"></span> -->
                                </button>                           
                            </div>
                        </div>
                        <br>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"></h3>
                            </div><!-- /.box-header -->
                            
                            <div class="box-body table-responsive">

                                <table id="associate_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Registration NO</th>
                                            <th>SPOC Name</th>
                                            <th>SPOC Email</th>
                                            <th>SPOC Phone</th>
                                            <th>Status</th>
                                            <th>Manage SPOC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $count = 1;
                                            $cr_user_role = $user_details['user_role'];
                                            $cr_user_role = $user_details['user_role'];
                                            foreach ($associates_details as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->registration_no."</td>";
                                                    echo "<td>".$res->user_fname."</td>";
                                                    echo "<td>".$res->user_email."</td>";
                                                    echo "<td>".$res->user_phone."</td>";
                                                    echo "<td> <small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                                                    echo "<td>".set_button($res->status_name,$res->user_id,$res->user_role,$cr_user_role)."</td>"; 
                                                echo "</tr>";
                                            }

                                            function set_button($status_name,$user_id,$user_role,$cr_user_role)
                                            {
                                                switch ($status_name) {
                                                    case 'Active':
                                                        if($cr_user_role == '7' || $cr_user_role == '4'){
                                                            return "<button type='button' class='btn-sm btn-info' onClick='edit_associate_modal(".$user_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>"." "."<button type='button' class='btn-sm btn-danger' onClick='de_activate_user(".$user_id.",".$user_role.");'>De-Activate</button>";
                                                        } else {
                                                            return "<button type='button' class='btn-sm btn-danger' onClick='de_activate_user(".$user_id.",".$user_role.");'>De-Activate</button>";
                                                        }
                                                        break;
                                                    case 'Paid':
                                                        return "";
                                                        break;
                                                    case 'Pending Payment':
                                                        return "";
                                                        break;
                                                    case 'Email Not Verified':
                                                        return "<button type='button' class='btn-sm btn-danger' onClick='delete_unverified_user(".$user_id.",".$user_role.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";
                                                        break;
                                                    case 'Inactive':
                                                        return "<button type='button' class='btn-sm btn-info' onClick='activate_user(".$user_id.",".$user_role.");'>Activate</button>";
                                                        break;
                                                    default:
                                                        return '';
                                                        break;
                                                }
                                            }

                                            function bgcolor($value)
                                            {
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
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Registration NO</th>
                                            <th>SPOC Name</th>
                                            <th>SPOC Email</th>
                                            <th>SPOC Phone</th>
                                            <th>Status</th>
                                            <th>Manage SPOC</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

<!-- ============= ADD Affiliate Modal =========== -->
    <div class="modal fade" id="add_associate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add SPOC</h4>
                </div>
                                    
                <div class="modal-body" id="body-add_associat">
                    
                    <!-- AJAX CALL Will LOAD Add Course Associate Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='register_user("#associateRegistrationFrom");' id='add_user_btn' data-loading-text="Processing..." tabindex='3'>Add SPOC</button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" >Reset</button>
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
<!-- ============= ADD Syllabus Resource Modal =========== -->

<!-- ============= Edit Associate Modal =========== -->
    <div class="modal fade" id="EditAssociateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Edit SPOC Details</h4>
                </div>
                
                <div class="modal-body" id="body-edit_associate">
                   <!--Ajax call load Edit Associate form -->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick="edit_associate();">Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============= Edit Associate Modal =========== -->