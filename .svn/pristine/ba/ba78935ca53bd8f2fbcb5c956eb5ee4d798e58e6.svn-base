                    <div class="sometype">
                            <br>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary icon-male-rounded-1" onClick="add_director_modal();" >
                                  Add Mentor/SME
                                  <!-- <span class="caret"></span> -->
                                </button>                           
                            </div>
                        </div>
                        <br>
                        <div class="box">
                           
                            <div class="box-body table-responsive">

                                <table id="directors_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Registration NO</th>
                                            <th>Mentor Name</th>
                                            <th>Mentor Email</th>
                                            <th>Mentor Phone</th>
                                            <th>Area of Interest </th>
                                            <th>Status</th>
                                            <th>Manage Mentor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $count = 1;
                                            if(isset($director_details)){
                                                foreach ($director_details as $res) {
                                                    echo "<tr>";
                                                        echo "<td>".$count++."</td>";
                                                        echo "<td>".$res->registration_no."</td>";
                                                        echo "<td>".$res->user_fname."</td>";
                                                        echo "<td>".$res->user_email."</td>";
                                                        echo "<td>".$res->user_phone."</td>";
                                                        echo "<td>".$res->group_subject_name."</td>";
                                                        echo "<td><small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                                                        echo "<td>"."<button type='button' class='btn-sm btn-info' onClick='edit_director_modal(".$res->user_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>"." ".set_button($res->status_name,$res->user_id,$res->user_role)."</td>";
                                                        
                                                    echo "</tr>";
                                                }    
                                            }

                                            function set_button($status_name,$user_id,$user_role)
                                            {
                                                // log_message('debug','#################### Role'.$user_role." User_id ".$user_id);
                                                switch ($status_name) {
                                                    case 'Active':
                                                        return "<button type='button' class='btn-sm btn-danger' onClick='de_activate_user(".$user_id.",".$user_role.");'>De-Activate</button>";
                                                        break;
                                                    case 'Paid':
                                                        return "";
                                                        break;
                                                    case 'Pending Payment':
                                                        return "";
                                                        break;
                                                    case 'Email Not Verified':
                                                        return "<button type='button' class='btn-sm btn-danger' onClick='delete_unverified_user(".$user_id.",".$user_role.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";
                                                        // log_message('debug','()()()()()()()())()()()()(()() Role'.$user_role." User_id ".$user_id);
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
                                            <th>Mentor Name</th>
                                            <th>Mentor Email</th>
                                            <th>Mentor Phone</th>
                                            <th>Area of Interest</th>
                                            <th>Status</th>
                                            <th>Manage Mentor</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

<!-- ============= ADD Director Modal =========== -->
    <div class="modal fade" id="add_director_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Mentor/SME</h4>
                </div>
                                    
                <div class="modal-body" id="body-add_director">
                    
                    <!-- AJAX CALL Will LOAD Add Course Director Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='register_user("#directorRegistrationFrom");' id='add_user_btn' data-loading-text="Processing..." tabindex='12'>Add Mentor/SME </button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex="13">Reset</button>
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='14'>Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
<!-- ============= ADD Director Modal =========== -->

<!-- ============= Edit Director Modal =========== -->
    <div class="modal fade" id="edit_director_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Edit Mentor/SME</h4>
                </div>
                                    
                <div class="modal-body" id="body-edit_director">
                    
                    <!-- AJAX CALL Will LOAD Edit Course Director Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='save_changes("#EditdirectorRegistrationForm");' id='edit_user_btn' data-loading-text="Processing..." tabindex='12'>save Changes</button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex="13">Reset</button>
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='14'>Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
<!-- ============= Edit Director Modal =========== -->