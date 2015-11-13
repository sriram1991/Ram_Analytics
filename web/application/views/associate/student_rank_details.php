        <div class="sometype">
        </div>
        <br>
        <?php
        if(count($national_ranks)>0)
            {
        ?> 
        <div class = "tab-content box" id="national_level_ranks">
            <div class="box-body table-responsive">
                <table id="rank_list1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody> 
                            <?php  
                            $count = 1;
                            if(isset($mystudents)){
                                foreach ($national_ranks as $res) {
                                    $found = false;
                                    foreach ($mystudents as $student){

                                        if($res->user_id == $student['user_id']){
                                            $found = true;
                                            break;
                                        }
                                    }
                                    if($found){
                                            echo "<tr>";
                                            echo "<td>".$count."</td>";
                                            echo "<td>".$res->registration_no."</td>";
                                            echo "<td>".$res->user_fname."</td>";
                                            echo "<td>".$res->test_no."</td>";
                                            echo "<td>".$res->test_name."</td>";
                                            echo "<td>".$res->test_date."</td>";
                                            echo "<td>".($res->no_of_questions*4)."</td>";
                                            echo "<td>".$res->test_score."</td>";
                                            echo "<td>".$res->test_percentage."</td>";
                                            echo "</tr>";
                                            $count++;
                                    }else{
                                        $count ++;
                                    }
                                }
                            }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rank</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php
        }
        if(count($batchwise_ranks)>0){
        ?>    
        <div class = "tab-content box" id="batch_level_ranks">
            <div class="box-body table-responsive">
                <table id="rank_list2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody> 
                            <?php
                            $count = 1;
                            $test_taken_student = 0;
                            if(isset($mystudents)){
                                foreach ($batchwise_ranks as $res) {
                                    $found = false;
                                    foreach ($mystudents as $student){

                                        if($res->user_id == $student['user_id']){
                                            $found = true;
                                            $test_taken_student++;
                                            break;
                                        }
                                    }
                                    if($found){
                                            echo "<tr>";
                                            echo "<td>".$count."</td>";
                                            echo "<td>".$res->registration_no."</td>";
                                            echo "<td>".$res->user_fname."</td>";
                                            echo "<td>".$res->test_no."</td>";
                                            echo "<td>".$res->test_name."</td>";
                                            echo "<td>".$res->test_date."</td>";
                                            echo "<td>".($res->no_of_questions*4)."</td>";
                                            echo "<td>".$res->test_score."</td>";
                                            echo "<td>".$res->test_percentage."</td>";
                                            echo "</tr>";
                                            $count++;
                                    }else{
                                        $count ++;
                                    }
                                }
                                if($test_taken_student == 0){
                                    echo "Your Students didn't take this test yet";
                                }
                            }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rank</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php
        }
        if(count($batchwise_ranks)>0)
        {
        ?>
        <div class = "tab-content box" id="mybatch_level_ranks">
            <div class="box-body table-responsive">
                <table id="rank_list3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody> 
                            <?php  
                            $count = 1;
                            if(isset($mystudents)){
                                foreach ($batchwise_ranks as $res) {
                                    $found = false;
                                    foreach ($mystudents as $student){

                                        if($res->user_id == $student['user_id']){
                                            echo "<tr>";
                                            echo "<td>".$count."</td>";
                                            echo "<td>".$res->registration_no."</td>";
                                            echo "<td>".$res->user_fname."</td>";
                                            echo "<td>".$res->test_no."</td>";
                                            echo "<td>".$res->test_name."</td>";
                                            echo "<td>".$res->test_date."</td>";
                                            echo "<td>".($res->no_of_questions*4)."</td>";
                                            echo "<td>".$res->test_score."</td>";
                                            echo "<td>".$res->test_percentage."</td>";
                                            echo "</tr>";
                                            $count++;
                                            break;
                                        }
                                    }
                                }
                            }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rank</th>
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php
        }else{
            echo "<h3>Your students didn't take this test yet</h3>";
        }
        ?>