 <div class="sometype">
         <br>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary icon-students" data-toggle="modal" data-target="#CourseLinkModal" onClick="link_course_sme_modal();" >
                  Link Course
                </button>             
            </div>
        </div> <br>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
            
            <div class="box-body table-responsive">

                <table id="mentor_course_link_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration NO</th>
                            <th>Mentor Name</th>
                            <th>Mentor Email</th>
                            <th>Course Name</th>
                            <th>User's</th>
                            <th>Manage Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $count = 1;
                            if(isset($mentor_details)){
                               foreach ($mentor_details as $res) {
                                    echo "<tr>";
                                    echo "<td>".$count++."</td>";
                                    echo "<td>".$res->registration_no."</td>";
                                    echo "<td>".$res->user_fname."</td>";
                                    echo "<td>".$res->user_email."</td>";
                                    echo "<td>".$res->course_name."</td>";
                                    echo "<td><small class='badge ".bgcolor(2)."'>".$res->sub_count."</small></td>";
                                    echo "<td><button type='button' class='btn btn-danger' onClick='unlink_mentor_course(\"$res->user_id\",\"$res->map_id\");'>Un-Link</button></td>";
                                    echo "</tr>";
                                } 
                            }
                            function bgcolor($value){
                                switch ($value) {
                                    case '2':
                                        return 'bg-green';
                                        break;
                                    case '8':
                                        return 'bg-yellow';
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
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Course Name</th>
                            <th>User's</th>
                            <th>Manage Course</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    <!-- ============= Course Link Modal =========== -->
    <div class="modal fade" id="CourseLinkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="$('.input').val('');">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Link Course with Mentor/SME </h4>
                </div>
                
                <div class="modal-body" id="body-sme-course_link">
                   <!--Ajax call load add course with student form -->
                </div>
                
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('.input').val('');">Close</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- ============= Course Link Modal =========== -->