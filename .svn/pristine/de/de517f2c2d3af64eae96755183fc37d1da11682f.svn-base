                        <div class="sometype">
                            <br>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle ion-university" data-toggle="dropdown" aria-expanded="false">
                                  Select Course
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu" role="menu">
                                    <?php
                                        if($course_details!= null){
                                            foreach ($course_details as $res) {
                                                echo "<li role='presentation'><a href='#' role='menuitem' tabindex='-1' onClick='get_course_test_map_list(".$res->course_id.");'>".$res->course_name."</a></li>";
                                            }    
                                        } else {
                                            echo "<li role='presentation' class='disabled'><a href='#' role='menuitem' tabindex='-1'>Please create a Course </a></li>";         
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        
                        <br>
                        <div id="ctest_map_list" class="box">
                            <!-- AJAX Call Will Fill Syllabus List -->
                            <div class="box-header">
                                <?php
                                    if($course_details!= null){
                                        echo "<h3 class='text-center'><p><br><br><br>Please select a course to map Course & Assessment </p><br><br><br></h3>";        
                                    } else {
                                        echo "<h3 class='text-center'><br><br><br><p>Please create a Course and come back !</p><br><br><br></h3>";
                                    }
                                ?>
                                
                            </div><!-- /.box-header -->
                        </div><!-- /.box -->