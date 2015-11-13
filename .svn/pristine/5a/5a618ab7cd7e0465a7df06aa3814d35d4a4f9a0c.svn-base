    <style type="text/css">
        .error {
            color: #b94a48;
            border-color: #b94a48;
            font-size: 12px;
            font-family: inherit;
            font-style: italic;
      }
    </style>
    <div class="sometype"> <br>
        
    </div>
        <br>
        <div class="box">
            <form name="license_granting" id="license_granting" method="post" action="#" role="form" novalidate="novalidate">
            <div class="box-body table-responsive">

                <table id="scholarship_not_verified_students" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration No</th>
                            <th>Name</th>
                            <th>Area of Interest</th>
                            <th>Fee</th>
                            <th>License Count</th>
                            <th>Final Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $count = 1;
                        if(isset($scholarship_students)){
                            foreach ($scholarship_students as $res) {
                                echo "<tr>";
                                echo "<td>".$count."</td>";                                
                                echo "<td>".$res->registration_no."</td>";
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->subject_name."</td>";
                                echo "<td>".$res->subject_fee."</td>";
                                echo "<td><input type='text' name='license_count_".$count."' id='license_count_".$count."' value='0' maxlength='10' min='1' title='license count should not be 0' minlength='1' size='7' required disabled/></td>";
                                echo "<td><input type='text' name='discount_amount_".$count."' id='discount_amount_".$count."' size='7' min='1' required disabled/>
                                            <button type='button' class='btn btn-success' id='apply_quote_request_".$count."' onclick='update_quote_amount(".$res->user_id.",".$res->subject_id.",".$count.",".$res->subject_fee.")' tabindex='5' disabled>Apply</button>
                                            <h5 id='spoc_quote_error' style='color:red'></h5>
                                            </td>";
                                // echo "<td> <center><small class='badge ".bgcolor($res->status_id)."'>".set_status($res->status_id)."</small></center></td>";
                                echo "<td><button type='button' class='btn btn-success' onclick='approve_this_request(".$count.")' tabindex='5'>Approve</button>
                                            <button type='button' class='btn btn-danger' onclick='reject_spoc_quote(".$res->user_id.",".$res->subject_id.")'>Reject</button></td>";
                                echo "</tr>";
                                $count++;

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
                            <th>License Count</th>
                            <th>Final Amount</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </form>
        </div><!-- /.box -->

        <script type="text/javascript">
            function approve_this_request(id){    
                document.getElementById('discount_amount_'+id).disabled=false;
                document.getElementById('apply_quote_request_'+id).disabled=false;
                document.getElementById('license_count_'+id).disabled=false;
            }

            function update_quote_amount(user_id,subject_id,count,subject_fee){
               
                var discount_amount = $('#discount_amount_'+count).val();
                var license_count   = $('#license_count_'+count).val();
                if($('#license_granting').valid()){
                    // if (discount_amount < subject_fee){
                        $.ajax({
                            type:"POST",
                            url:"registrar/give_spoc_quote",
                            data:{
                                user_id:user_id,
                                subject_id :subject_id,
                                discount_amount:discount_amount,
                                license_count:license_count
                            }, success:function(response){
                                get_not_verified_spoc_quotes();                    
                            }
                        });
                    // } else {                    
                        // $('#spoc_quote_error').text('Final Amount should not be greater than Actual Course fee');
                    // }
                }

            }
            // Action Reject SPOC's Quote
            function reject_spoc_quote(user_id,subject_id){

                if(confirm("Do you want to reject the request ?")){ 
                    $.ajax({
                        type:"POST",
                        url:"registrar/reject_spoc_quote",
                        data:{
                            user_id:user_id,
                            subject_id :subject_id
                        },success:function(response){
                            get_not_verified_spoc_quotes();
                        }
                    });
                }
            }
        </script>  