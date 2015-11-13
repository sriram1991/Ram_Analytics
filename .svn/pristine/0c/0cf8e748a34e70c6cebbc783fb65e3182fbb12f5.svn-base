                            <style type="text/css">
                            .resource_btn {
                                width: 100%;
                                text-align: center;
                            }
                            </style>
                            <div class="box-header">
                                <h3 class="box-title pull-left">
                                    <?php 
                                    if(isset($course_details)){ 
                                        echo $course_details['course_name']." Syllabus List"; 
                                    } else { 
                                        echo "Syllabus List";
                                    } 
                                    ?>
                                </h3>
                                <h3 class="box-title pull-right">
                                    <div class="btn-group" role="group" aria-label="manage-syllabus">
                                        <button type="button" class="btn btn-success ion-university" onClick="load_cres_map_modal();">Add Resource</button>
                                        <!-- <button type="button" class="btn btn-primary ion-university" data-toggle="modal" data-target="#add_test_syllabus_modal" data-whatever="Add Assessment" onClick="load_csa_modal();">Add Assessment</button> -->
                                        <!-- <button type="button" class="btn btn-warning">Change Order</button> -->
                                        <!-- <button type="button" class="btn btn-danger">Delete All Resource</button> -->
                                    </div>
                                </h3>
                            </div><!-- /.box-header -->
                            
                            <div class="box-body table-responsive">
                                <table id="course_syllabus_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Module</th>
                                            <!-- <th>Group</th> -->
                                            <th>Area of Interest Name</th>
                                            <th>Syllabus Type</th>
                                            <th>Resource Name</th>
                                            <th>Schedule</th>
                                            <th>Resource Type</th>
                                            <!-- <th>Resource Order</th> -->
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $count = 1;
                                            foreach ($syllabus_list as $res) {
                                                $syllabus_type = $res->syllabus_type;
                                                $res_type      = $res->resource_type;
                                                $res_id        = $res->resource_id;
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td>".$res->module_name."</td>";
                                                    // echo "<td>".$res->group_name."</td>";
                                                    echo "<td>".$res->subject_name."</td>";
                                                    echo "<td>".$res->syllabus_type."</td>";
                                                    echo "<td>".$res->resource_name."</td>";
                                                    echo "<td>".$res->schedule."</td>";
                                                    // echo "<td>
                                                    //         <button type='button' class='btn-sm btn-info resource_btn'  onClick='view_pdf_modal(\"$syllabus_type\",\"$res_type\",\"$res_id\");'>View ".$res->resource_type."</button>
                                                    //      </td>";
                                                    echo "<td>".set_view_button($syllabus_type,$res_type,$res_id)."</td>";
                                                    //echo "<td>".$res->res_order."</td>";
                                                    echo "<td>".get_button($res->map_id,$res->course_id,$res->resource_status,$user_details['user_role'])."</td>";
                                                    //echo "<td> 
                                                    //        <button type='button' class='btn-sm btn-info' onClick='edit_cres_map_modal(".$res->map_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                    //        <button type='button' class='btn-sm btn-danger' onClick='delete_syllabus(".$res->map_id.",".$res->course_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                    //      </td>"; 
                                                echo "</tr>";
                                            }

                                            function set_view_button($syllabus_type,$res_type,$res_id){
                                                switch ($res_type) {
                                                    case 'PDF':
                                                        return "<button type='button' class='btn-sm btn-info resource_btn'  onClick='view_pdf_modal(\"$syllabus_type\",\"$res_type\",\"$res_id\");'>View ".$res_type."</button>";
                                                        break;
                                                    case 'VIDEO':
                                                        return "<button type='button' class='btn-sm btn-info resource_btn'  onClick='view_pdf_modal(\"$syllabus_type\",\"$res_type\",\"$res_id\");'>View ".$res_type."</button>";
                                                        break;
                                                    case 'TEST':
                                                        return "<button type='button' class='btn-sm btn-info resource_btn'  onClick='view_pdf_modal(\"$syllabus_type\",\"$res_type\",\"$res_id\");'>View ".$res_type."</button>";
                                                        break;
                                                    case 'CAPTIVA':
                                                        return "<center>".$res_type."</center>";
                                                        break;
                                                    case 'CAPTIVA_QUIZ':
                                                        return "<center>".$res_type."</center>";
                                                        break;
                                                    default:
                                                        # code...
                                                        break;
                                                }

                                            }

                                            function get_button($map_id,$course_id,$resource_status,$user_role){
                                                log_message('debug','what i get is '.$resource_status);
                                                // Content Admin
                                                if($user_role == '6'){
                                                    switch ($resource_status) {
                                                        case 'UnPublished':
                                                            return "<button type='button' class='btn-sm btn-info' onClick='edit_cres_map_modal(".$map_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                    <button type='button' class='btn-sm btn-danger' onClick='delete_syllabus(".$map_id.",".$course_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                                    ";
                                                            break;
                                                        case 'Published':
                                                            return "Published";
                                                            break;
                                                        default:
                                                            return "Un Known Error";
                                                            break;
                                                    }    
                                                }
                                                // Admin User
                                                if($user_role == '7'){
                                                    switch ($resource_status) {
                                                        case 'UnPublished':
                                                            $status = "Published";
                                                            $type   = "RESOURCE";
                                                            return "<button type='button' class='btn-sm btn-info' onClick='edit_cres_map_modal(".$map_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                    <button type='button' class='btn-sm btn-success' title='Publish' onClick='manage_resource_syllabus(".$map_id.",".$course_id.",\"$status\");'><i class='glyphicon glyphicon-eye-open text-white'></i></button>
                                                                    <button type='button' class='btn-sm btn-danger' onClick='delete_syllabus(".$map_id.",".$course_id.",\"$type\");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                                    ";
                                                            break;
                                                        case 'Published':
                                                            $status = "UnPublished";
                                                            return "<button type='button' class='btn-sm btn-warning' title='UnPublish' onClick='manage_resource_syllabus(".$map_id.",".$course_id.",\"$status\");'><i class='glyphicon glyphicon-eye-close text-white'></i></button>";
                                                            break;
                                                        default:
                                                            return "Un Known Error";
                                                            break;
                                                    }
                                                }
                                                // Content Admin User
                                                if($user_role == '8'){
                                                    switch ($resource_status) {
                                                        case 'UnPublished':
                                                            $status = "Published";
                                                            $type   = "RESOURCE";
                                                            return "<button type='button' class='btn-sm btn-info' onClick='edit_cres_map_modal(".$map_id.");'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                                                    <button type='button' class='btn-sm btn-success' title='Publish' onClick='manage_resource_syllabus(".$map_id.",".$course_id.",\"$status\");'><i class='glyphicon glyphicon-eye-open text-white'></i></button>
                                                                    <button type='button' class='btn-sm btn-danger' onClick='delete_syllabus(".$map_id.",".$course_id.",\"$type\");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                                                    ";
                                                            break;
                                                        case 'Published':
                                                            $status = "UnPublished";
                                                            return "<button type='button' class='btn-sm btn-warning' title='UnPublish' onClick='manage_resource_syllabus(".$map_id.",".$course_id.",\"$status\");'><i class='glyphicon glyphicon-eye-close text-white'></i></button>";
                                                            break;
                                                        default:
                                                            return "Un Known Error";
                                                            break;
                                                    }
                                                }
                                            }
                                        ?>                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Module</th>
                                            <!-- <th>Group</th> -->
                                            <th>Area of Interest Name</th>
                                            <th>Syllabus Type</th>
                                            <th>Resource Name</th>
                                            <th>Schedule</th>
                                            <th>Resource Type</th>
                                            <!-- <th>Resource Order</th> -->
                                            <th>Manage</th>                                        
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->

<!-- ============= ADD Map B/W Course Resource Modal =========== -->
    <div class="modal fade" id="add_course_resource_modal" tabindex="-1" role="dialog" aria-labelledby="add_syllabus_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="add_course_resource_mapLabel">Add Course With Resource</h4>
                </div>
                                    
                <div class="modal-body" id="body-add_course_resource_map">
                
                    <!-- AJAX CALL Will LOAD Add Map B/W Course Resource Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='add_course_resource("<?php if(isset($course_details)){ echo $course_details['course_id']; } ?>","RESOURCE");' tabindex='3'>Add Resource</button>
                    <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button>
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Cancel</button>
                </div>

            </div>
        </div>
    </div>
<!-- ============= ADD Map B/W Course Resource Modal =========== -->



<!-- ============= Edit Map B/W Course Resource Modal =========== -->
    <div class="modal fade" id="edit_course_resource_modal" tabindex="-1" role="dialog" aria-labelledby="add_syllabus_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="edit_course_resource_mapLabel">Edit Course With Resource</h4>
                </div>
                                    
                <div class="modal-body" id="body-edit_course_resource_map">
                
                    <!-- AJAX CALL Will LOAD Edit Map B/W Course Resource Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick='update_course_resource_map("<?php if(isset($course_details)){ echo $course_details['course_id']; } ?>","RESOURCE");' tabindex='3'>Update Resource</button>
                    <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Cancel</button>
                </div>

            </div>
        </div>
    </div>
<!-- ============= Edit Map B/W Course Resource Modal =========== -->

<!-- =============view PDF Modal =========== -->
    <div class="modal fade" id="ViewPdfModal" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="MyModalLabel">View Resource</h4>
                </div>
                                    
                <div class="modal-body" id="body-view_pdf">
                
                    <!-- AJAX CALL Will LOAD view pdf Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- ============= View pdf Modal =========== -->


<!-- =============view Video Modal =========== -->
    <div class="modal fade" id="ViewVideoModal" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="MyModalLabel">Resource-Video</h4>
                </div>
                                    
                <div class="modal-body" id="body-view_video">
                
                    <!-- AJAX CALL Will LOAD view video Modal -->

                </div>
                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onClick="$('.input').val('');" data-dismiss="modal" tabindex='4'>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- ============= View video Modal =========== -->

