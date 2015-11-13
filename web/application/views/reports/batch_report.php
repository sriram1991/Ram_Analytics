        <!-- DATA TABLES -->
        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>Batch Wise Reports</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#batchwise_students" id="students" onClick="student_change(id);" aria-controls="students" role="tab" data-toggle="tab">User List</a></li>
                    <li role="presentation"><a href="#batchwise_associates" id="associates" onClick="associate_change(id);" aria-controls="students" role="tab" data-toggle="tab">SPOC List</a></li>
                    <!-- <li role="presentation"><a href="#payment_not_verified_students" onClick="payment_not_verified_students();" aria-controls="students" role="tab" data-toggle="tab">Payment not Verified Students</a></li> -->
                </ul>
                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <br>
                    <br>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group control-group">
                            <div class="control">
                            <select name="state" autocomplete="off" id="state" class="form-control input" size="1" placeholder="State" tabindex="13" onchange="batchname_change(value)">
                            <option value="" selected="">Batch Name</option>
                            <?php 
                                if(isset($batches)){
                                    foreach ($batches as $ress) {
                                        if($ress->user_state != 'State'){
                                            echo "<option value='".$ress->user_state."'>".$ress->user_state."</option>";    
                                        }   
                                    }
                                } 

                            ?>
                            </select>
                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <!-- Resource -->
                    <div role="tabpanel" class="tab-pane active" id="batchwise_students">
                        
                        <!-- Resource View Page in Ajax -->

                    </div>
                    
                    <!-- assessment -->
                    <div role="tabpanel" class="tab-pane active" id="batchwise_associates">
                        
                        <!-- Assessment View Page in Ajax -->
                   <!--      <center><h3>Work in progress .. </h3></center> -->
                    </div>

                    <!-- Subject -->
                    <div role="tabpanel" class="tab-pane active" id="payment_not_verified_students">
                        
                        <!-- Subject View Page in Ajax -->
                        <!-- <center><h3>Work in progress .. </h3></center> -->
                    </div>                
                </div>
                <!-- Tab panes -->
            </div>
            <!-- ./TAB PANEL -->

        </section>
        <!-- ./Main content -->

        <!-- Content Header (Page footer) -->
        <!-- DATA TABES SCRIPT -->
        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            var student = true;
            var associate = false;
            function student_change(){
                student = true;
                associate = false;
                $("#state").val('');
                batchwise_students(null);
            }
            function associate_change(){
                student =false;
                associate = true;
                $("#state").val('');
                batchwise_associates(null);
            }
            $(function() {
                batchwise_students(null);
            });
            function batchname_change(batch_name){
                if(student){
                    batchwise_students(batch_name);
                }else if(associate){
                    batchwise_associates(batch_name);
                }
            }
        </script>        

