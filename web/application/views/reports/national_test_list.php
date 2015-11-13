

    <div class="form-group control-group">
        <div class="control"> 
            <select id="test_no" class="form-control input" tabindex="5" placeholder="Course" onchange="assessment_selected(value)">
                <option value="">Select Test</option>
                <?php
                    if(isset($course_tests)){
                        foreach($course_tests as $res){
                            echo "<option value=".$res->test_no.">".$res->test_name."</option>";
                        } 
                    }
                ?>
            </select>   

        </div>
            <span class="help-block"></span>
    </div>
