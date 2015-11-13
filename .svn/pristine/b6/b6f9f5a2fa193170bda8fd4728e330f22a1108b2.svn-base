	<div class="col-xs-12 col-sm-6 col-md-3">   
        <div class="control">                  
            <select id="subject_name" class="form-control input" tabindex="5" placeholder="Course" onchange="load_subject_score_graph(value)">
                <option value="">Select Area of interest</option>
                <?php 
                    if (isset($list_subjects)) {
                    	foreach($list_subjects as $subject){
			                $subject_name = $subject->subject_name;
                            echo "<option value=".$subject_name.">".$subject_name."</option>";
			            }
                    }
                ?>
                   
            </select>
       </div>
        <span class="help-block"></span>
    </div>
