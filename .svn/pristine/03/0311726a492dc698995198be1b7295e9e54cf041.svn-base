    <div class="sometype"> <br>
        
    </div>
        <br>
        <div class="box">
            
            <div class="box-body table-responsive">

                <table id="scholarship_not_verified_students" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration No</th>
                            <th>Name</th>
                            <th style="width:25%;">Course Name</th>
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
                                echo "<td>".$count."</td>";                                
                                echo "<td>".$res->registration_no."</td>";
                                echo "<td>".$res->user_fname."</td>";
                                echo "<td>".$res->course_name."</td>";
                                echo "<td>".$res->course_fee."</td>";
                                echo "<td><input type='text' name='discount_amount_".$count."' id='discount_amount_".$count."' disabled/>
                                            <button type='button' class='btn btn-success' id='apply_scholarship_".$count."' onclick='apply_scholarship(".$res->user_id.",".$res->course_id.",".$count.",".$res->course_fee.")' tabindex='5' disabled>Apply</button>
                                            <h5 id='scholarship_error' style='color:red'></h5>
                                            </td>";
                                // echo "<td> <center><small class='badge ".bgcolor($res->status_id)."'>".set_status($res->status_id)."</small></center></td>";
                                echo "<td><button type='button' class='btn btn-success' onclick='approve_scholarship(".$count.")' tabindex='5'>Approve</button>
                                            <button type='button' class='btn btn-danger' onclick='reject_scholarship(".$res->user_id.",".$res->course_id.")'>Reject</button></td>";
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
                            <th>Course Name</th>
                            <th>Course Fee</th>
                            <th>Discount Amount</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

        <script type="text/javascript">
            function approve_scholarship(id){    
                document.getElementById('discount_amount_'+id).disabled=false;
                document.getElementById('apply_scholarship_'+id).disabled=false;
            }
            function apply_scholarship(user_id,course_id,count,course_fee){
               
                var discount_amount = $('#discount_amount_'+count).val();
                
                if (discount_amount < course_fee){
                    $.ajax({
                        type:"POST",
                        url:"registrar/give_scholarship",
                        data:{
                            student_id:user_id,
                            course_id :course_id,
                            discount_amount:discount_amount
                        },
                        success:function(response){
                            get_not_verified_scholarships();                    }
                    });
                }else{                    
                    $('#scholarship_error').text('Discount amount should not be greater than Actual Course fee');
                }

            }

            function reject_scholarship(user_id,course_id){

                if(confirm("Do you want to Reject Scholarship for this student ?")){ 
                    $.ajax({
                        type:"POST",
                        url:"registrar/reject_scholarship",
                        data:{
                                user_id:user_id,
                                course_id :course_id
                            },
                        success:function(response){
                            get_not_verified_scholarships();
                        }
                    });
                }
            }
        </script>  