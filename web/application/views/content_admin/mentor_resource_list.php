                        
                        <div class="sometype">
                            <br>
                            <?php
                            /*
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle ion-university" data-toggle="dropdown" aria-expanded="false">
                                  Add Resource
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" data-toggle="modal" data-target="#addPDFRes" onClick="ajax_pdf_request();" >PDF</a></li>
                                  <li><a href="#" data-toggle="modal" data-target="#addVideoRes" onClick="add_video_modal();">Video</a></li>
                                  <li><a href="#" data-toggle="modal" data-target="#addCaptivaRes" onClick="ajax_captiva_request();" >Captiva</a></li>
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addURLRes">URL</a></li> -->
                                </ul>
                            </div>
                            */
                            ?>
                        </div>
                        <br>
                        <div class="box">
                          
                            <div class="box-body table-responsive">

                                <table id="mentor_resources_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG NO</th>
                                            <th>User Role</th>
                                            <th>Resource Name</th>
                                            <th>Resource Link</th>
                                            <th>Resource Type</th>
                                            <!-- <th>Resource TAG</th> -->
                                            <th>Manage Resource</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  $count = 1;
                                            if (isset($resource_details)) {
                                                function set_button($role_id,$res_resource_id,$res_type){
                                                    switch ($role_id) {
                                                        case '6':
                                                            if($res_type== 'VIDEO'){
                                                                return "<button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res_resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>";                                                                
                                                            } else {
                                                                return "<button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res_resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                        <a href='/resource/mentor_download_file/?res_id=".$res_resource_id."'> <button type='button' class='btn-sm btn-success'> <i class='glyphicon glyphicon-download-alt'></i> </button></a> ";
                                                            }
                                                            break;
                                                        case '7':
                                                            if($res_type== 'VIDEO'){
                                                                return "<button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res_resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                        <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res_resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";
                                                            } else {
                                                                return "<button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res_resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                        <a href='/resource/mentor_download_file/?res_id=".$res_resource_id."'> <button type='button' class='btn-sm btn-success'> <i class='glyphicon glyphicon-download-alt'></i></button></a>
                                                                        <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res_resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";                                                                
                                                            }
                                                            break;
                                                        case '8':
                                                            if($res_type== 'VIDEO'){
                                                                return "<button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res_resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                        <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res_resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";
                                                            } else {
                                                                return "<button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res_resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                        <a href='/resource/mentor_download_file/?res_id=".$res_resource_id."'> <button type='button' class='btn-sm btn-success'> <i class='glyphicon glyphicon-download-alt'></i></button></a>
                                                                        <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res_resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";                                                                
                                                            }
                                                            break;
                                                        default:
                                                            return "some thing went wrong !";
                                                            break;
                                                    }
                                                }
                                                foreach ($resource_details as $res) {
                                                    echo "<tr>";
                                                        echo "<td>".$count++."</td>";
                                                        echo "<td>".$res->registration_no."</td>";
                                                        echo "<td>".$res->role_name."</td>";
                                                        echo "<td>".$res->resource_name."</td>";
                                                        echo "<td>".$res->resource_link."</td>";
                                                        echo "<td>".$res->resource_type."</td>";
                                                        // echo "<td>".$res->resource_tag."</td>";
                                                        echo "<td>".set_button($user_role,$res->resource_id,$res->resource_type)."</td>";
                                                        // echo "<td> 
                                                        //         <button type='button' class='btn-sm btn-info' onClick='edit_res_modal(".$res->resource_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                        //         <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res->resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                        //       </td>"; 
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>REG NO</th>
                                            <th>User Role</th>
                                            <th>Resource Name</th>
                                            <th>Resource Link</th>
                                            <th>Resource Type</th>
                                            <!-- <th>Resource TAG</th> -->
                                            <th>Manage Resource</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <!-- ============= ADD PDF Modal =========== -->

                        <div class="modal fade" id="addPDFRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add PDF Resource </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_pdf">
                                        
                                        <!-- AJAX CALL Fill with: add_pdf_modal_view -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="upload_pdf('#ajax_file_upload');" id="add_pdf_btn" data-loading-text="Processing..." tabindex='4'>Add Resource</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='6'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD PDF Modal =========== -->


                        <!-- ============= ADD Video Modal =========== -->

                        <div class="modal fade" id="addVideoRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Video Resource </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_video">
                                        
                                        <!-- AJAX Call Add Video Modal -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="add_video_resource();" tabindex='4'>Add Resource</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='6'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Video Modal =========== -->



                        
                        <!-- ========= Edit Resource Modal Start======-->

                        <div class="modal fade" id="EditResource" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Edit Resource </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-edit_resource">
                                        
                                        <!-- AJAX Call Edit Resource Modal -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onClick="update_resource();" tabindex='4'>Save</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='6'>Cancel</button>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= Edit Resource Modal End =========== -->


                        <!-- ============= ADD Video Modal =========== -->

                        <div class="modal fade" id="addCaptivaRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Captiva Resource Zip</h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_captiva">
                                        
                                        <!-- AJAX Call Add Video Modal -->
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="add_captiva_file_btn" onClick="upload_pdf('#ajax_captiva_upload');" tabindex='4'>Add Resource</button>
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='6'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Video Modal =========== -->