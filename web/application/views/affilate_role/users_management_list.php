        <div class="sometype">
         <br>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary icon-students" data-toggle="modal" data-target="#addStudentModal" onClick="add_user_byaffilate_modal();" >
                  Add User
                </button>             
            </div>
        </div> <br>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
            
            <div class="box-body table-responsive">

                <table id="students_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Status</th>
                            <!-- <th>Manage User</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $count = 1;
                            $cr_user_role = $user_details['user_role'];
                            foreach ($students_details as $res) {
                                echo "<tr>";
                                echo "<td>".$count++."</td>";
                                echo "<td>".$res->registration_no."</td>";
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->user_email."</td>";
                                echo "<td>".$res->user_phone."</td>";
                                echo "<td><small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                                //echo "<td>".set_button($res->status_name,$res->user_id,$res->user_role,$cr_user_role). "</td>"; 
                                echo "</tr>";
                            }

                            function set_button($status_name,$user_id,$user_role,$cr_user_role) {
                                switch ($status_name) {
                                    case 'Active':
                                        if($cr_user_role == '7' || $cr_user_role == '4'){
                                            return "<button type='button' class='btn-sm btn-info' onClick='edit_student_modal(".$user_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>"." "."<button type='button' class='btn-sm btn-danger' onClick='de_activate_user(".$user_id.",".$user_role.");'>De-Activate</button>";
                                        } else {
                                            return "<button type='button' class='btn-sm btn-danger' onClick='de_activate_user(".$user_id.",".$user_role.");'>De-Activate</button>";
                                        }
                                        break;
                                    case 'Paid':
                                        return 'bg-green';
                                        break;
                                    case 'Pending Payment':
                                        return 'bg-yellow';
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
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Status</th>
                            <!-- <th>Manage User</th> -->
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    <!-- ============= ADD Student Modal =========== -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Add User</h4>
                </div>
                
                <div class="modal-body" id="body-add_student">
                   <!--Ajax call load add student form -->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick="register_user('#associateRegistrationFrom');" id='add_user_btn' data-loading-text="Processing..." >Add User</button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" >Reset</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============= ADD Student Modal =========== -->

    <!-- ============= Edit Student Modal =========== -->
    <div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Edit User Details</h4>
                </div>
                
                <div class="modal-body" id="body-edit_student">
                   <!--Ajax call load Edit student form -->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick="edit_student();">Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============= Edit Student Modal =========== -->