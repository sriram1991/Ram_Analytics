        <div class="sometype">
        </div>
        <?php 
            if($national_level_my_rank == 0){
                echo "<h4> No rank available</h4>";
            }else{
        ?>
        <h3>Your Rank</h3> <hr>
        <div class="box">
             <div class="box-body table-responsive">

                <table id="rank_list1" class="table table-bordered table-striped">
            <tr>
                <td>Test Score</td><td>Internation Level Rank</td> <td>Nation Level Rank</td><td>State Level Rank</td>
            </tr>
            <tr>
                <?php
                    echo "<td>".$test_score."</td>";
                    echo "<td>".$national_level_my_rank." / ".$national_total_ranks."</td>"; // $national_total_ranks is gets international level rank of User dont confuse
                    echo "<td>".$country_level_my_rank." / ".$country_wise_total_ranks."</td>";
                    echo "<td>".$batch_level_my_rank." / ".$batchwise_total_ranks."</td>";
                ?>
            </tr>
            </table>
             </div>
        </div>
        <br>
        <h4>National / State Level Rank</h4>
        <hr>
        <div class="box">
           
            <div class="box-body table-responsive">

                <table id="rank_list2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            <th>Registration NO</th>
                            <th>User Name</th>
                            <th>Test No</th>
                            <th>Test Name</th>
                            <th>Test Taken Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                            <th>Inter-National Level Rank</th>
                            <th>National Level Rank</th>
                            <th>State Level Rank</th>
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            echo "<tr>";
                            echo "<td>".$registration_no."</td>";
                            echo "<td>".$user_fname."</td>";
                            echo "<td>".$test_no."</td>";
                            echo "<td>".$test_name."</td>";
                            echo "<td>".$test_date."</td>";
                            echo "<td>".$total_marks."</td>";
                            echo "<td>".$test_score."</td>";
                            echo "<td>".$test_percentage."</td>";
                            echo "<td>".$national_level_my_rank."</td>";
                            echo "<td>".$country_level_my_rank."</td>";
                            echo "<td>".$batch_level_my_rank."</td>";
                            // echo "<td><small class='badge ".bgcolor($res->payment_status)."'>".$res->payment_status."</small></td>";
                            echo "</tr>";    
                           ?> 
                    </tbody>
<!--                     <tfoot>
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
                            <th>Status</th>
                            <th>Manage Associate</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
        <!-- will need it, If they ask for Batchwise ranking seperately        -->
        <!-- <br>
        <h4>State Level Rank</h4>
        <hr>
        <div class="box">
           
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            echo "<tr>";
                            echo "<td>".$batch_level_my_rank."</td>";
                            echo "<td>".$registration_no."</td>";
                            echo "<td>".$user_fname."</td>";
                            echo "<td>".$test_no."</td>";
                            echo "<td>".$test_name."</td>";
                            echo "<td>".$test_date."</td>";
                            echo "<td>".$total_marks."</td>";
                            echo "<td>".$test_score."</td>";
                            echo "<td>".$test_percentage."</td>";
                            // echo "<td><small class='badge ".bgcolor($res->payment_status)."'>".$res->payment_status."</small></td>";
                            echo "</tr>";    
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
                            <th>Status</th>
                            <th>Manage Associate</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div> -->
        <?php }?>