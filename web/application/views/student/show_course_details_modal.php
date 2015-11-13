<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title"><h4>Course Subscription</h4></div>
    </div>
    
    <div class="panel-body">

        <div class="row"> 
            <div class="col-xs-12 col-sm-6 col-md-6">
                <?php
                    if(isset($course_details)) echo "Course Name: ".$course_details['course_name'];
                ?>
            </div>
        </div>

        <div class="row"> 
            <div class="col-xs-12 col-sm-6 col-md-6">
                <?php 
                    if(isset($course_details)){
                        echo "Course Description : ".$course_details['course_description']." | "; 
                        echo "Course Duration : ".$course_details['course_duration']." Months";    
                    }
                ?>
            </div>
        </div>

        <div class="row"> 
            <div class="col-xs-12 col-sm-6 col-md-6">
                <?php 
                    if(isset($course_details)){
                        echo "Course Fee : <i class='fa fa-rupee'></i> ".$course_details['course_fee']; 
                    }
                ?>
            </div>
        </div>

    </div>

    <div class="panel-footer" style="height: 50px;">
        <?php
            if(isset($course_details)){
                $course_id  = $course_details['course_id'];
                $course_fee = $course_details['course_fee'];
                echo "<button class='btn btn-info pull-left' title='pay offline' onclick='join_course_offline($course_id,$course_fee);' ><i class='fa fa-credit-card'></i> Pay Offline</button>";
            }
        ?>
        <button class="btn btn-success pull-right" title="Work in Process"><i class="fa fa-credit-card"></i> Pay On-Line</button>
    </div>

</div>