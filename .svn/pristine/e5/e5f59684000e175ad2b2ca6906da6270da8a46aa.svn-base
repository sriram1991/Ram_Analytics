    <div class="row">                                           
         <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="control"> 
                    <select id="course_id" class="form-control input" tabindex="5" placeholder="Course" onchange="get_my_tests(value);">
                        <option value="">Select Course</option>
                        <?php 
                            if(isset($my_courses)){
                                foreach($my_courses as $res){
                                    echo "<option value=\"$res->course_id\">".$res->course_name."</option>";
                                } 
                            } 
                        ?>
                    </select>            
                
                </div>
                <span class="help-block"></span>
        </div>
    
        <div id="my_test_names"> </div>
    
    </div>
