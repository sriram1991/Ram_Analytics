    <div class="sometype"> <br>
        
    </div>
        <br>
        <div class="box">
           
            <div class="box-body table-responsive">

                <table id="not_verified_offline_list" class="table table-bordered table-striped table-responsive">
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
                            <th>Manage Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $count = 1;
                        if(isset($offline_not_verified_payment_list)){
                            foreach ($offline_not_verified_payment_list as $res) {
                                if($res->payment_status == 8){
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
                                    echo "<td> <small class='badge ".bgcolor1($res->payment_status)."'>".set_status1($res->payment_status)."</small></td>";
                                    echo "<td>".set_button1($res->transaction_id,$res->payment_status,$res->user_id,$res->transaction_description)."</td>"; 
                                    echo "</tr>";    
                                }
                                
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

                        function set_button1($transaction_id,$payment_status,$user_id,$transaction_description) {
                            log_message('debug','####### Description is '.$transaction_description);
                            switch ($payment_status) {
                                case '8':
                                    return "<center> <button type='button' class='btn-sm btn-success' onClick='do_paid(\"$transaction_id\",\"2\",\"$user_id\",\"$transaction_description\");'>Paid</button> </center>";
                                    break;
                                case '2':
                                    return "<center> <small class='badge bg-green'> Paid </small> </center>";
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
                            <th>Manage Payment</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>