        <div class="sometype">
                <br>
                <!-- <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary ion-university" onClick="add_associate_modal();" >
                      Add Associate                
                    </button>                           
                </div> -->
        </div>
        <br>

        <div class="box">
                    
            <div class="box-body table-responsive">

                <table id="associate_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration NO</th>
                            <th>Associate Name</th>
                            <th>Associate Email</th>
                            <th>Associate Phone</th>
                            <th>Status</th>
                       <!--      <th>Manage Associate</th> -->
                        </tr>
                    </thead>
                    <tbody>
                            <?php  $count = 1;
                            if(isset($notvarified_associates_details)){
                                foreach ($notvarified_associates_details as $res) {
                                    echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$res->registration_no."</td>";
                                        echo "<td>".$res->user_fname."</td>";
                                        echo "<td>".$res->user_email."</td>";
                                        echo "<td>".$res->user_phone."</td>";
                                        echo "<td><small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                                        // echo "<td>".set_button($res->status_name,$res->user_id,$res->user_role)."</td>"; 
                                    echo "</tr>";
                                }
                            }

                            // function set_button($status_name,$user_id,$user_role)
                            // {
                            //     switch ($status_name) {
                            //         case 'Active':
                            //             return "<button type='button' class='btn-sm btn-danger' onClick='de_activate_user(".$user_id.",".$user_role.");'>De-Activate</button>";
                            //             break;
                            //         case 'Paid':
                            //             return "";
                            //             break;
                            //         case 'Pending Payment':
                            //             return "";
                            //             break;
                            //         case 'Email Not Verified':
                            //             return "<button type='button' class='btn-sm btn-danger' onClick='delete_unverified_user(".$user_id.",".$user_role.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";
                            //             break;
                            //         case 'Inactive':
                            //             return "<button type='button' class='btn-sm btn-info' onClick='activate_user(".$user_id.",".$user_role.");'>Activate</button>";
                            //             break;
                            //         default:
                            //             return '';
                            //             break;
                            //     }
                            // }

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
                            <th>Associate Name</th>
                            <th>Associate Email</th>
                            <th>Associate Phone</th>
                            <th>Status</th>
                           <!--  <th>Manage Associate</th> -->
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

<!-- ============= ADD Associate Modal =========== -->
  