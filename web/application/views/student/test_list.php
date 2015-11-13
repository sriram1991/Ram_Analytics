    <div class="row">                                           
        <div class="col-xs-12 col-sm-6 col-md-3">

            <div class="control"> 
                <select id="test_no" class="form-control input" tabindex="5" placeholder="Course" onchange="my_rank(value)">
                    <option value="">Select Test</option>
                    <?php
                        if(isset($my_tests)){
                            foreach($my_tests as $res){
                                echo "<option value=".$res->test_no.">".$res->test_name."</option>";
                            } 
                        }
                    ?>
                </select>   

            </div>
            <span class="help-block"></span>
        </div>
    </div>
