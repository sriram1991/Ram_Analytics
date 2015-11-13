    <section class="content-header">
        <h3><p>My User Details </p>
        </h3>
    </section>

    <section class="content">
    <div class="row">
        <?php 
        if ($mystudents != null) {

            foreach ($mystudents as $res) {
                $title      = $res->registration_no;
                $schedule   = $res->user_fname;
                $user_id    = $res->user_id;
                $user_photo = "/static/img/user_photo/".$res->user_photo;
                $user_status = $res->user_status;
                if ($user_status == 4) {
                    $small_box  = "
                         <div class='small-box bg-yellow' data-user_id='".htmlspecialchars($user_id)."' data-subject_name='".htmlspecialchars($title)."' data-toggle='modal' data-target='#Email_not_varified_user'>
                            <div class='inner'><h3><i class='text-size-15'>".$schedule."</i></h3><p>".$title."</p></div>
                            <div class='icon image'><img src=\"$user_photo\" class='img-circle student_image' alt='User Image' ></div>
                         <a href='#'' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                         </div> ";    // open_parent_child_details(); replaced open_spoc_user_details()
                    echo "<div class='col-lg-3 col-xs-6'>";
                    echo $small_box;
                    echo "</div>";
                }elseif ($user_status == 1) {
                    $small_box  = "
                         <div class='small-box bg-green' data-user_id='".htmlspecialchars($user_id)."' data-subject_name='".htmlspecialchars($title)."' onClick='open_spoc_user_details(this.getAttribute(\"data-user_id\"),this.getAttribute(\"data-subject_name\"));'>
                            <div class='inner'><h3><i class='text-size-15'>".$schedule."</i></h3><p>".$title."</p></div>
                            <div class='icon image'><img src=\"$user_photo\" class='img-circle student_image' alt='User Image' ></div>
                         <a href='#'' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                         </div> "; 
                    echo "<div class='col-lg-3 col-xs-6'>";
                    echo $small_box;
                    echo "</div>";
                }elseif ($user_status == 5) {
                    $small_box  = "
                         <div class='small-box bg-red' data-user_id='".htmlspecialchars($user_id)."' data-subject_name='".htmlspecialchars($title)."' data-toggle='modal' data-target='#Inactive_user'> <div class='inner'><h3><i class='text-size-15'>".$schedule."</i></h3><p>".$title."</p></div>
                            <div class='icon image'><img src=\"$user_photo\" class='img-circle student_image' alt='User Image' ></div>
                         <a href='#' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                         </div> "; 
                    echo "<div class='col-lg-3 col-xs-6'>";
                    echo $small_box;
                    echo "</div>";
                }
            }
        } else{
            echo "<h4><center>No User exist under you !</center></h4>";
        }
        ?>        
    </div>
    </section>

    <!-- ========== Association Request for quotation Modal start ============================== -->        
        <div class="modal fade" id="Email_not_varified_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Infomation for Email not verified </h4>
                    </div>
                    <div class="modal-body" id="body-associate_course_info">
                        <center><h4> This user email is not verified.</h4></center>
                    
                    </div>          
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- ========== Association Request for quotation Modal start ============================== -->        
    
    <!-- ========== Association Request for quotation Modal start ============================== -->        
        <div class="modal fade" id="Inactive_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onclick="#">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onClick="load_associate_subject_reg();">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" style="color:red"> Infomation of Blocking </h4>
                    </div>
                    <div class="modal-body" id="body-associate_course_info">
                        <center><h4> This user is Blocked/Inactive.</h4></center>
                    
                    </div>          
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                        <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- ========== Association Request for quotation Modal start ============================== -->        
