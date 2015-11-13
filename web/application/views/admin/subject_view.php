<div class="sometype">
                            <br>
                            <button type="button" class="btn btn-primary ion-university" data-toggle="modal" data-target="#addResource" whatever="Create Resource">
                                Add Subject
                            </button>
                        </div>
                        <br>
                        <div class="box">
                            
                            <div class="box-body table-responsive">
                                <table id="subject_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject ID</th>
                                            <th>Subject Name</th>
                                            <th>Subject Link</th>
                                            <th>Subject Type</th>
                                            <th>Subject Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Maths</td>
                                            <td>RES1</td>
                                            <td>Easy</td>
                                            <td>30-12-2014</td>
                                        </tr>
                                        <?php  $count = 1;
                                            // foreach ($assessment_details as $res) {
                                            //     echo "<tr>";
                                            //         echo "<td>".$count++."</td>";
                                            //         echo "<td>".$res->resource_name."</td>";
                                            //         echo "<td>".$res->resource_link."</td>";
                                            //         echo "<td>".$res->resource_type."</td>";
                                            //         echo "<td>".$res->resource_tag."</td>";
                                            //         echo "<td> 
                                            //                 <button type='button' class='btn-sm btn-info'>Edit</button>
                                            //                 <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res->resource_id.");'>Delete</button>
                                            //               </td>"; 
                                            //     echo "</tr>";
                                            // }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Subject ID</th>
                                            <th>Subject Name</th>
                                            <th>Subject Link</th>
                                            <th>Subject Type</th>
                                            <th>Subject Created</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->