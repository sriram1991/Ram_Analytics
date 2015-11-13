<div class="sometype">
                            <br>
                           <!-- <button type="button" class="btn btn-primary ion-university" data-toggle="modal" data-target="#addCourseModal" onClick="add_course_modal();" whatever="Create Resource">
                                Add Course
                            </button> -->
                        </div>
                        <br>
                        <div class="box">
                           
                            <div class="box-body table-responsive">
                                <table id="all_coupon_codes" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Promo Code</th>
                                            <th>Final Amount</th>
                                            <th>Valid Till</th>
                                            <th>Promo Code Status</th>
                                            <!-- <th>Used By</th>  -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $count = 1;
                                            foreach ($coupon_details as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->coupon_code."</td>";
                                                    echo "<td>".$res->discount_amount."</td>";
                                                    echo "<td>".$res->valid_till." </td>";
                                                    // echo "<td>".$res->coupon_status."</td>";
                                                    echo "<td><small class='badge ".bgcolor($res->coupon_status)."'>".bgtext($res->coupon_status)."</small></td>";
                                                    // echo "<td>Rs ".$res->course_fee."</td>";
                                                    // echo "<td>
                                                    //         <button type='button' class='btn-sm btn-info' onClick='edit_course_modal(".$res->course_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                    //         <button type='button' class='btn-sm btn-danger' onClick='delete_course(".$res->course_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                    //      </td>"; 
                                                echo "</tr>";
                                            }
                                            function bgcolor($value)
                                            {
                                                switch ($value) {
                                                    case '1':
                                                        return 'bg-green';
                                                        break;
                                                    case '2':
                                                        return 'bg-blue';
                                                        break;
                                                    case '7':
                                                        return 'bg-grey';
                                                        break;
                                                    case '5':
                                                        return 'bg-red';
                                                        break;
                                                    default:
                                                        return '';
                                                        break;
                                                }
                                            }
                                            function bgtext($value)
                                            {
                                                switch ($value) {
                                                    case '1':
                                                        return 'Active';
                                                        break;
                                                    case '2':
                                                        return 'Used';
                                                        break;
                                                    case '7':
                                                        return 'In Valid';
                                                        break;
                                                    case '5':
                                                        return 'Expired';
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
                                            <th>Promo Code</th>
                                            <th>Final Amount</th>
                                            <th>Valid Till</th>
                                            <th>Promo Code Status</th>
                                            <!-- <th>Used By</th>  -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <!-- ============= ADD Course Modal =========== -->

                        <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Course </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_course">
                                            
                                        <!-- AJAX CALL Will LOAD Add Course Modal -->

                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="add_course();" tabindex='4'>Add Course</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='6'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Course Modal =========== -->


                        <!-- ========= Edit Course Modal Start======-->

                        <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Edit Course</h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-edit_course">
                                        
                                        <!-- AJAX Call Edit Course Modal -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="update_course();" tabindex='4'>Save</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='6'>Cancel</button>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= Edit Course Modal End =========== -->