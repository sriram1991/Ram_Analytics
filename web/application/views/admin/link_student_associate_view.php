<table class="table table-bordered table-striped">
    <tr>
        <th>Registration NO</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>SPOC RegNo</th>
        <th>SPOC Name</th>
        <th>Course Name</th>
        <th>Manage Action</th>
    </tr>
        <?php foreach ($course_details as $res) { ?>
    <tr>
        <?php 
            if(isset($student_data)){
                echo "<td>".$student_data['registration_no']."</td>";
                echo "<td>".$student_data['user_fname']."</td>";
                echo "<td>".$student_data['user_email']."</td>";
            }
            if(isset($associate_data)){
                echo "<td>".$associate_data['registration_no']."</td>";
                echo "<td>".$associate_data['user_fname']."</td>";
                echo "<td>".$res['course_name']."</td>";
                $batch_id     = $res['batch_id'];
                $student_id   = $student_data['user_id'];
                $associate_id = $associate_data['user_id'];
                echo "<td><button class='btn btn-success' onclick='link_student_associate(\"$student_id\",\"$associate_id\",\"$batch_id\");' type='button'> Link </button></td>";
            }
        }
        ?>
    </tr>
</table>

































<!-- <center><h4>Please enter your Email id or Registration id to get the student details</h4></center> -->