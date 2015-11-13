                        <style type="text/css">
                        td.description{
                            width: 50%;
                            word-wrap: break-word;
                            text-align: justify;
                        }
                        </style>
                        <div class="sometype">
                            <br>
                            <button type="button" class="btn btn-primary ion-university" data-toggle="modal" data-target="#addSubjectModal" onClick="add_subject_modal();" >
                                Add Area of Interest
                            </button>
                        </div>
                        <br>
                        <div class="box">
                            
                            <div class="box-body table-responsive">
                                <table id="subject_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Area of Interest ID</th>
                                            <th>Area of Interest Name</th>
                                            <th>Area of Interest Description</th>
                                            <th>Area of Interest Fees</th>
                                            <th>Manage Area of Interests</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $count = 1;
                                            foreach ($subject_details as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->subject_name."</td>";
                                                    echo "<td class='description'>".$res->subject_description."</td>";
                                                    echo "<td><i class='fa fa-rupee'></i> ".$res->subject_fee."</td>";
                                                    echo "<td>".set_button($res->subject_id,$res->resource_status)."</td>";
                                                    // echo "<td> 
                                                    //         <button type='button' class='btn-sm btn-info' onClick='edit_sub_modal(".$res->subject_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                    //         <button type='button' class='btn-sm btn-danger' onClick='delete_subject(".$res->subject_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                    //       </td>"; 
                                                echo "</tr>";
                                            }
                                            function set_button($subject_id,$resource_status){
                                                switch ($resource_status) {
                                                    case NULL:
                                                        return "<button type='button' class='btn-sm btn-info' onClick='edit_sub_modal(".$subject_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                <button type='button' class='btn-sm btn-danger' onClick='delete_subject(".$subject_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                                ";
                                                        break;
                                                    case 'UnPublished':
                                                        return " Area of Interest Mapped With Course ";
                                                        break;
                                                    case 'Published':
                                                        return " Area of Interest Mapped With Course ";
                                                        break;
                                                    default:
                                                        // return print_r($resource_status);
                                                        return "Some Thing Wrong !";
                                                        break;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Area of Interest ID</th>
                                            <th>Area of Interest Name</th>
                                            <th>Area of Interest Description</th>
                                            <th>Area of Interest Fees</th>
                                            <th>Manage Area of Interest</th>                                        
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->


                        <!-- ============= ADD Subject Modal =========== -->

                        <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Area of Interest </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_subject">
                                        <!-- AJAX Will Fill Add Subject Modal -->
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="add_subject();" tabindex='3'>Add Area of Interest</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='4'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Subject Modal =========== -->


                        <!-- ========= Edit Subject Modal Start======-->

                        <div class="modal fade" id="EditSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Edit Area of Interest </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-edit_subject">
                                        
                                        <!-- AJAX Call Edit Subject Modal -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="update_subject();" tabindex='4'>Save</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='6'>Cancel</button>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= Edit Subject Modal End =========== -->