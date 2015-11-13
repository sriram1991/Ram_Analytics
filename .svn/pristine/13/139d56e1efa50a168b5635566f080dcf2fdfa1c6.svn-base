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
                            <th>Course Name</th>
                            <th>Course Fee</th>
                            <th>Discount Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $count = 1;
                        if(isset($scholarship_students)){
                            foreach ($scholarship_students as $res) {
                                echo "<tr>";
                                echo "<td>".$count++."</td>";                                
                                echo "<td>".$res->registration_no."</td>";
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->course_name."</td>";
                                echo "<td>".$res->course_fee."</td>";
                                echo "<td>".$res->discount_amount."</td>";
                                echo "<td> <center><small class='badge ".bgcolor($res->status_id)."'>".set_status($res->status_id)."</small></center></td>";
                                echo "</tr>";                                    
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
                            <th>Course Name</th>
                            <th>Course Fee</th>
                            <th>Discount Amount</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->