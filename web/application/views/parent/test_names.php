<div class="col-xs-6 col-sm-6 col-md-3" id="test_names">

    <div class="form-group control-group">
        <div class="control"> 
            <select id="test_no" class="form-control input" tabindex="5" placeholder="Course" onchange="my_child_rank(value)">
                <option value="">Select Test</option>
                <?php
                    if(isset($get_students_test)){
                        foreach($get_students_test as $res){
                            echo "<option value=".$res->test_no.">Test ".$res->test_no."</option>";
                        } 
                    }
                ?>
            </select>   

        </div>
            <span class="help-block"></span>
    </div>
</div>