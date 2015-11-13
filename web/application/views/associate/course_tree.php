<?php 
    if(isset($course_tree)){
        
        // Course Name to be displayed
        echo "<a href='#'>
                <i class='fa icon-book'></i> 
                <span>".$course_details['course_name']."</span>
                <i class='fa fa-angle-left pull-right'></i>
                <small class='badge pull-right bg-green'>new</small>
             </a>";
        
        // Generate Subject List
        echo "<ul class='treeview-menu'>";
        foreach ($course_tree as $res) {
            $subject_name = $res->subject_name;
            $course_id    = $res->course_id;
            $subject_list = '<li><a href="#" 
                                    data-course_id='.htmlspecialchars($course_id).'
                                    data-subject_name='.htmlspecialchars($subject_name).'
                                    onClick="open_resources(this.getAttribute(\'data-course_id\'),this.getAttribute(\'data-subject_name\'));">
                                    <i class="fa fa-angle-double-right"></i>'.$subject_name.'</a></li>';
            echo $subject_list;
        }
        echo "</ul>";
        
    }
?>