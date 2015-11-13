<?php 
    if(sizeof($course_list) > 0){
        foreach ($course_list as $res) {
            // $course_id      = $res['course_id'];
            $course_name    = $res['course_name'];
            // $course_fee     = $res['course_fee'];
            // $course_string  = $course_name."#".$course_fee;
            $course_string  = $course_name;
            echo "<option value=\"$course_string\">".$res['course_name']."</option>";
        }
    } else {
        echo "<option value='' disabled>No Course Available </option>";
    }
?>