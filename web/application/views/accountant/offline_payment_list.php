    <div class="sometype"> <br>
        
    </div>
        <br>
        <div class="box">
            
            <div class="box-body table-responsive">

                <table id="offline_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Transaction No</th>
                            <th style="width: 75px;">Bank Name</th>
                            <th>Description</th>
                            <th>Total Amount</th>
                            <th>Amount Paid</th>
                            <th style="width: 95px;">Paid Date</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $count = 1;
                        if(isset($offline_payment_list)){
                            foreach ($offline_payment_list as $res) {
                                echo "<tr>";
                                echo "<td>".$count++."</td>";                                
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->user_email."</td>";
                                echo "<td>".$res->transaction_number."</td>";
                                echo "<td>".$res->bank_name."</td>";
                                echo "<td>".$res->transaction_description."</td>";
                                echo "<td>".$res->total_amount."</td>";
                                echo "<td>".$res->amount_paid."</td>";
                                echo "<td>".$res->paid_date."</td>";
                                echo "<td> <center><small class='badge ".bgcolor1($res->payment_status)."'>".set_status1($res->payment_status)."</small></center></td>";
                                echo "</tr>";                                    
                            }
                        }

                        function set_status1($payment_status) {
                            switch ($payment_status) {
                                case '8':
                                    return 'Payment Not Verified';
                                    break;
                                case '2':
                                    return 'Paid';
                                    break;
                                case '3':
                                    return 'Payment Pending';
                                    break;
                                default:
                                    return '';
                                    break;
                            }
                        }

                        function bgcolor1($value) {
                            switch ($value) {
                                case '8':
                                    return 'bg-yellow';
                                    break;
                                case '2':
                                    return 'bg-green';
                                    break;
                                case '3':
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Transaction No</th>
                            <th style="width: 75px;">Bank Name</th>
                            <th>Description</th>
                            <th>Total Amount</th>
                            <th>Amount Paid</th>
                            <th style="width: 95px;">Paid Date</th>
                            <th>Payment Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->