<table class="table table-bordered table-striped">
    <tr>
        <th>Registration NO</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Course list</th>
        <!-- <th>Amount Paid</th> -->
        <th>Link Course</th>
    </tr>
    <tr>
        <?php 
        $student_id = "";
        if(isset($mentor_details)){
            $student = array_shift($mentor_details);
            $student_id = $student['user_id'];
            echo "<td>".$student['registration_no']."</td>";
            echo "<td>".$student['user_fname']."</td>";
            echo "<td>".$student['user_email']."</td>";
        }


        if(isset($course_list)){
            echo "<td>";
            echo "<div class='form-group control-group'>
                    <div class='control'>
                    <select required autocomplete='off' name='link_course' id='link_course' class='form-control input' size='1' tabindex='1' aria-required='true'>
                        <option value='' selected>Select Course </option>";
                foreach ($course_list as $res) {
                    $course_id = $res['course_id'];
                    echo "<option value='$course_id'>".$res['course_name']."</option>";
                }
            echo "</select>
                    </div>
                    <span class='help-block'></span>
                    </div>
                    ";
            echo "</td>";
        }
            // echo "<td>";
            // echo "<div class='form-group control-group'>
                    // <div class='control'>";
            // echo "<input type='text' required'' name='amount_paid' id='amount_paid' class='form-control input' placeholder='Enter The Amount Paid' tabindex='2'></input>";
            // echo "</div>
                    // <span class='help-block'></span>
                    // </div>
                    // ";
            // echo "</td>";
        if(isset($student_id)){
            echo "<td><button class='btn btn-primary' type='button' onClick='link_mentor_course(\"$student_id\");'>Link</button></td>";
        }
        ?>
    </tr>
</table>

<!-- <center><h4>Please enter your Email id or Registration id to get the student details</h4></center> -->