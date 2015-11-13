<form method="POST" action="#" name="EditResForm" id="EditResForm" role="form">    
    <div class="row"> 

        <?php 
            if(isset($course_batches)){
                foreach ($course_batches as $res) {
                    // var_dump($res);
                    $course_name = $res->batch_name;
                    $batch_id    = $res->batch_id;
                    $course_id   = $res->course_id;
                    $duration    = $res->course_duration;
                    $small_box   = "
                    <div class='small-box bg-aqua' onClick='subscribe_course(".$batch_id.",".$course_id.");'>
                        <div class='inner'><h3>".$duration."<i class='text-size-15'>Months</i></h3><p>".$course_name."</p></div>
                        <a href='#'' class='small-box-footer'>Join This Batch <i class='fa fa-arrow-circle-right'></i></a>
                    </div>    
                    ";    
                    echo "<div class='col-lg-3 col-xs-6'>";
                    echo $small_box;
                    echo "</div>";
                }    
            } else {
                echo "<center><h4> We are Creating Courses please come back after some time ! </h4></center>";
            }
        ?>
    
        <div class="col-xs-12 col-sm-6 col-md-6">   
            <div class="form-group control-group">
                <div class="control">
                    <!-- <input type="text" value="<?php //echo $resource_details['resource_name']; ?>" required="" autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="1" aria-required="true">  -->
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        
    </div>
</form>
<!-- Validation Script To Make Enable in Ajax Call -->
<script src="/static/js/common/validate.js" type="text/javascript"></script>