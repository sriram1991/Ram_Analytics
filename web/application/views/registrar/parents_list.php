                        
                        <div class="sometype">
                            <br>
                            <!-- <div class="btn-group" role="group"> -->
                            <!--    <button type="button" class="btn btn-primary ion-university" >  -->
                             <!--     Add Parent -->
                                  <!-- <span class="caret"></span> -->
                             <!--   </button> -->
                                <!-- <ul class="dropdown-menu" role="menu"> -->
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addPDFRes" onClick="ajax_pdf_request();" >PDF</a></li> -->
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addVideoRes">Video</a></li> -->
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addParentsRes">Parents</a></li> -->
                                  <!-- <li><a href="#" data-toggle="modal" data-target="#addURLRes">URL</a></li> -->
                                <!-- </ul> -->
                            </div>
                        </div>
                        <br>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"></h3>
                            </div><!-- /.box-header -->
                            
                            <div class="box-body table-responsive">

                                <table id="parents_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Registration NO</th>
                                            <th>Parent Name</th>
                                            <th>Parent Email</th>
                                            <th>Parent Phone</th>
                                            <th>Status</th>
                                            <th>Manage Parent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  $count = 1;
                                            foreach ($parents_details as $res) {
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->registration_no."</td>";
                                                    echo "<td>".$res->user_fname."</td>";
                                                    echo "<td>".$res->user_email."</td>";
                                                    echo "<td>".$res->user_phone."</td>";
                                                    echo "<td><small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                                                    echo "<td>". set_button($res->status_name,$res->user_id,$res->user_role). "</td>"; 
                                                echo "</tr>";
                                            }
                                            function set_button($status_name,$user_id,$user_role)
                                            {
                                                switch ($status_name) {
                                                    case 'Active':
                                                        return '';
                                                        break;
                                                    case 'Paid':
                                                        return 'bg-green';
                                                        break;
                                                    case 'Pending Payment':
                                                        return 'bg-yellow';
                                                        break;
                                                    case 'Email Not Verified':
                                                        return "<button type='button' class='btn-sm btn-danger' onClick='delete_unverified_user(".$user_id.",".$user_role.");'><i class='glyphicon glyphicon-trash text-white'></i></button>";
                                                        break;
                                                    case 'Inactive':
                                                        return '';
                                                        break;
                                                    default:
                                                        return '';
                                                        break;
                                                }
                                            }

                                            function bgcolor($value)
                                            {
                                                switch ($value) {
                                                    case 'Active':
                                                        return 'bg-green';
                                                        break;
                                                    case 'Paid':
                                                        return 'bg-green';
                                                        break;
                                                    case 'Pending Payment':
                                                        return 'bg-yellow';
                                                        break;
                                                    case 'Email Not Verified':
                                                        return 'bg-yellow';
                                                        break;
                                                    case 'Inactive':
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
                                            <th>Registration NO</th>
                                            <th>Parent Name</th>
                                            <th>Parent Email</th>
                                            <th>Parent Phone</th>
                                            <th>Status</th>
                                            <th>Manage Parent</th>
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
                                        <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='6'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        <button type="button" class="btn btn-primary" onClick="upload_pdf();" tabindex='4'>Add Resource</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD PDF Modal =========== -->


                        <!-- ============= ADD Video Modal =========== -->

                        <div class="modal fade" id="addVideoRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="POST" action="/admin/resource/add_video" name="VideoForm" id="VideoForm" role="form">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Video Resource </h4>
                                    </div>
                                    
                                    <div class="modal-body" id="body-add_video">
                                        
                                        <div class="row">
                                            
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group control-group">
                                                    <div class="control">
                                                        <input type="text" autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="1" required> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group control-group">
                                                    <div class="control">
                                                        <input type="url" autocomplete="off" name="resource_link" id="resource_link" class="form-control input" placeholder="Video URL:" tabindex="2" required> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group control-group">
                                                    <div class="control">
                                                        <input type="text" autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource TAG" tabindex="3" required> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        
                                        </div>

                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-warning" tabindex='6'>Reset</button>
                                        <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='5'>Cancel</button>
                                        <button type="button" class="btn btn-primary" onClick="add_video_resource();" tabindex='4'>Add Resource</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Video Modal =========== -->


                        <!-- ============= ADD Parents Modal =========== -->

                        <div class="modal fade" id="addParentsRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> Add Resource </h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <form method="POST" action="#ResourceForm" name="Parents_reg_form" id="BasicForm" role="form">
                                            
                                                <div class="row">
                                            
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group control-group">
                                                            <div class="control">
                                                                <input type="text" autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="1">
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group control-group">
                                                            <div class="control">
                                                                <input type="text" autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource Tag" tabindex="3">
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group control-group">
                                                            <div class="control">
                                                                <input type="text" autocomplete="off" name="resource_file" id="resource_file" class="form-control input"  tabindex="2">
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>

                                                </div>

                                        </form>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="$('.input').val('');">Cancel</button>
                                        <button type="button" class="btn btn-primary" >Add Resource</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============= ADD Parents Modal =========== -->

