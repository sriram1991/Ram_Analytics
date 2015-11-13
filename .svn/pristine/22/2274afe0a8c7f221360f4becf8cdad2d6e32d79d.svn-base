<br><br>

<div class="col-xs-12 col-sm-6 col-md-3" id="course">

    <div class="form-group control-group">
        <div class="control"> 
            <select id="course_id" class="form-control input" tabindex="5" placeholder="Course" onchange="get_students_test(value);">
                <option value="">Select Course</option>
                <?php if(isset($course_of_test_details)){
                         foreach($course_of_test_details as $res){
                            echo "<option value=".$res->course_id.">".$res->course_name."</option>";
                         } 
                       } 
                ?>
            </select>            
        
        </div>
          <span class="help-block"></span>
    </div>
</div>
<br> <br>

 <div class="col-xs-6 col-sm-8 col-md-3" id="test">

    <div class="form-group control-group">
        <div class="control"> 
            <select id="test_no" class="form-control input" tabindex="5" placeholder="Course" onchange="#">
                <option value="">Select Test</option>
                <?php if(isset($get_students_test)){
                         foreach($get_students_test as $res){
                            echo "<option value=".$res->test_no.">".$res->test_no."</option>";
                         } 
                      }
                ?>
            </select>   

        </div>
        <span class="help-block"></span>
    </div>
</div>
<br> <br> <br>
  <div class="sometype"> <br>
        
    </div>
    <br>

    <div class="box">
        
        <div class="box-body table-responsive">        
        <br>

            <table id="parents1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL.NO</th>
                        <th>User Name</th>
                        <th>Course Name</th>
                        <th>Assesment Name</th>
                        <th>Test Date</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                     // $count = 1;
                     // if(isset($course_of_test_details)){
                     //     foreach ($course_of_test_details as $res) {
                     //         echo "<td>".$res->test_percentage."</td>";
                     //         echo "</tr>";
                     //     }
                     // }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL.NO</th>
                        <th>User Name</th>
                        <th>Course Name</th>
                        <th>Assesment Name</th>
                        <th>Test Date</th>
                        <th>Rank</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <?php  ?>