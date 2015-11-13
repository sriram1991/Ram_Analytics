<table class="table table-bordered table-striped">
    <tr>
        <th>Registration NO</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Course Name</th>
        <th>SPOC RegNo</th>
        <th>SPOC Name</th>
        <th>Manage Action</th>
    </tr>
    <!-- <tr> -->
        <?php 
            if(isset($associates_student_links)){
                foreach ($associates_student_links as $res) {
                    $student_id = $res->student_id;
                    $batch_id   = $res->batch_id;
                    echo "<tr>";
                    echo "<td>".$res->student_regno."</td>";
                    echo "<td>".$res->student_fname."</td>";
                    echo "<td>".$res->student_email."</td>";
                    echo "<td>".$res->course_name."</td>";
                    echo "<td>".$res->associate_regno."</td>";
                    echo "<td>".$res->associate_fname."</td>";
                    echo "<td><button class='btn btn-danger' onclick='unlink_student_associate(\"$student_id\",\"$batch_id\");' type='button'> Un-Link</button></td>";
                    echo "</tr>";
                }
            }
            /*if(isset($linked_student_details)){
                echo "<td>".$linked_student_details['registration_no']."</td>";
                echo "<td>".$linked_student_details['user_fname']."</td>";
                echo "<td>".$linked_student_details['user_email']."</td>";
            }
            if(isset($linked_associate_details)){
                echo "<td>".$linked_associate_details['registration_no']."</td>";
                echo "<td>".$linked_associate_details['user_fname']."</td>";
                $student_id = $linked_student_details['user_id'];
                echo "<td><button class='btn btn-danger' onclick='unlink_student_associate(\"$student_id\");' type='button'> Un-Link </button></td>";
            }*/
        ?>
    <!-- </tr> -->
</table>

































<!-- <center><h4>Please enter your Email id or Registration id to get the student details</h4></center> -->