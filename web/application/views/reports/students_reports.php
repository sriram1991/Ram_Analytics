        <!-- DATA TABLES -->
        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>User Reports</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#students" onClick="get_unverified_students();" aria-controls="assessment" role="tab" data-toggle="tab">User List</a></li>
                  <!--  <li role="presentation"><a href="#subject" onClick="#" aria-controls="subject" role="tab" data-toggle="tab">Associate Test</a></li> -->
                    <!-- <li role="presentation"><a href="#course" onClick="" aria-controls="course" role="tab" data-toggle="tab">Course</a></li> -->
                    <!-- <li role="presentation"><a href="#batch" onClick="" aria-controls="batch" role="tab" data-toggle="tab"></a></li> -->
                </ul>
                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Resource -->
                    <div role="tabpanel" class="tab-pane active" id="students">
                        
                        <!-- Resource View Page in Ajax -->
                    </div>
                    
                    <!-- assessment -->
                    <!-- <div role="tabpanel" class="tab-pane" id="associate_doc_list"> -->
                        
                        <!-- Assessment View Page in Ajax -->
                   <!--      <center><h3>Work in progress .. </h3></center> -->
                    <!-- </div> -->

                    <!-- Subject -->
                    <!-- <div role="tabpanel" class="tab-pane" id="subject"> -->
                        
                        <!-- Subject View Page in Ajax -->
                        <!-- <center><h3>Work in progress .. </h3></center> -->
                    <!-- </div> -->
                    
                    <!-- Course -->
                    <!-- <div role="tabpanel" class="tab-pane" id="course"> -->
                        
                        <!-- Course View Page in Ajax -->
                        <!-- <center><h3>Work in progress .. </h3></center> -->
                    <!-- </div> -->
                    
                    <!-- Batch -->
                    <!-- <div role="tabpanel" class="tab-pane" id="batch"> -->
                        
                        <!-- Batch View Page in Ajax -->
                        <!-- <center><h3>Work in progress .. </h3></center> -->
                    <!-- </div> -->
                
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
            $(function() {
                get_unverified_students();

            });
        </script>        