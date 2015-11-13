<form method="POST" action="#" name="AddSyllabusForm" id="AddSyllabusForm" role="form">
    <div class="row"> 
                                                
        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="subject_name" id="subject_name" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="" selected="">Select Area of interest</option>
                        <?php
                        if(isset($subject_list)){
                            foreach ($subject_list as $res) {
                                echo "<option value='".$res->subject_name."'>".$res->subject_name."</option>";
                            }
                        } 
                        ?>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="resource_id" id="resource_id" class="form-control input" size="1" tabindex="2" aria-required="true">
                        <option value="" selected="">Select Resource</option>
                        <?php
                        if(isset($assessment_list)){
                            foreach ($assessment_list as $ress) {
                                echo "<option value='".$ress->resource_id."'>".$ress->resource_name."</option>";
                            }
                        } 
                        ?>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required="" autocomplete="off" name="schedule" id="schedule" class="form-control input" placeholder="Syllabus schedule" tabindex="3" aria-required="true"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="box">
           
            <div class="box-body table-responsive">

                <table id="resource_browser" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Assessment Name</th>
                            <th>Resource Link</th>
                            <th>Assessment Type</th>
                            <th>Assessment TAG</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php  $count = 1;
                            foreach ($assessment_list as $res) {
                                echo "<tr>";
                                    echo "<td>".$count++."</td>";
                                    echo "<td>".$res->resource_name."</td>";
                                    echo "<td>".$res->resource_link."</td>";
                                    echo "<td>".$res->resource_type."</td>";
                                    echo "<td>".$res->resource_tag."</td>";
                                    // echo "<td> 
                                    //         <button type='button' class='btn-sm btn-info'><i class='glyphicon glyphicon-edit text-white'></i></button>
                                    //         <button type='button' class='btn-sm btn-danger' onClick='delete_resource(".$res->resource_id.");'><i class='glyphicon glyphicon-trash text-white'></i></button>
                                    //       </td>"; 
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <th>SL.NO</th>
                            <th>Assessment Name</th>
                            <th>Resource Link</th>
                            <th>Assessment Type</th>
                            <th>Assessment TAG</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</form>

<script src="/static/js/common/validate.js" type="text/javascript"></script>