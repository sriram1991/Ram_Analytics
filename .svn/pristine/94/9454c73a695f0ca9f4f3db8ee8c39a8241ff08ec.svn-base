    <section class="content-header">
        <h2><p>User Dashboard </p>
            <!-- <marquee><small>Flash Update</small></marquee> -->
        </h2>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <?php 
            if(isset($students_details)){
                foreach ($students_details as $res) {
                    $title      = $res->registration_no;
                    $schedule   = $res->user_fname;
                    $course_id  = $res->user_id;
                    $user_photo = "/static/img/user_photo/".$res->user_photo;
                    $small_box  = "
                         <div class='small-box bg-purple' data-course_id=".htmlspecialchars($course_id)." data-subject_name=".htmlspecialchars($title)."
                          onClick='open_parent_child_details(this.getAttribute(\"data-course_id\"),this.getAttribute(\"data-subject_name\"));'>
                         <div class='inner'><h3><i class='text-size-15'>".$schedule."</i></h3><p>".$title."</p></div>
                         <div class='icon image'><img src=\"$user_photo\" class='img-circle student_image' alt='User Image' ></div>
                         <a href='#'' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                         </div> ";    
                    echo "<div class='col-lg-3 col-xs-6'>";
                    echo $small_box;
                    echo "</div>";
                }
            }
        ?>        
    </div>
    </section><!-- /.content -->