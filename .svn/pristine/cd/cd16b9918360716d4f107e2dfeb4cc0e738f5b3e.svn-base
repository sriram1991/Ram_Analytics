<br>
    <div class="box">
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL.No</th>
                        <th>User Name</th>
                        <th>Registration No</th>
                        <th>Area Of Interest</th>
                        <th>License Request</th>
                        <th>Area Of Interest Fee</th>
                        <th>Status</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($my_quotes_list)){
                            $count = 1;
                            foreach ($my_quotes_list as $res) {
                                $user_id         = $res->user_id;
                                $quote_id        = $res->quote_id;
                                $user_fname      = $res->user_fname;
                                $registration_no = $res->registration_no;
                                $subject_name    = $res->subject_name;
                                $status          = $res->status_id; 
                                echo "<tr>";
                                echo "<td>".$count++."</td>";
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->registration_no."</td>";
                                echo "<td>".$res->subject_name."</td>";
                                echo "<td> <center> $res->no_of_license  ".set_add_button($user_fname,$registration_no,$subject_name,$status)."</center></td>";
                                echo "<td>".$res->discount_amount."</td>";
                                echo "<td> <center><small class='badge ".bgcolor($status)."'>".set_status($status)."</small></center></td>";
                                // echo "<td> <button type='button' class='btn btn-success' onclick='associate_subscribe_subject(\"$quote_id\");'> Pay </button>";
                                // echo "<button type='button' class='btn btn-danger' onclick='remove_aoi(\"$quote_id\");'> Delete </button> </td>";
                                echo "</tr>";
                            }
                        }

                        function set_add_button($user_fname,$registration_no,$subject_name,$status) {
                            switch ($status) {
                                case '6':
                                    return "<button class='btn btn-success' data-toggle='modal' data-target='#addLicense' onClick='request_license(\"$user_fname\",\"$registration_no\",\"$subject_name\")'> <i class='fa fa-plus'></i></button>";
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
            </table>
        </div>
    </div>

    <div class="modal fade" id="addLicense" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">  
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Enter No. of user License required</h4>
                </div>

                <div class="modal-body" id="request_license">
                    <!-- Load Ajax Here -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" autofocus onclick="send_license_request();">Send Email</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> 
            </div>
        </div>        
    </div>
