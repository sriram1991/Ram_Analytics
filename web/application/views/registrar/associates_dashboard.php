        <!-- DATA TABLES -->
        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>SPOC Management</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#associates" onClick="get_all_associates();" aria-controls="resource" role="tab" data-toggle="tab">SPOC Registration List</a></li>
                    <li role="presentation"><a href="#associate_subjects" onClick="get_all_associates_subjects();" aria-controls="associate_subjects" role="tab" data-toggle="tab">SPOC Area of Interest Subscription </a></li>
                    <li role="presentation"><a href="#associate_doc_list" onClick="get_all_associates_docs();" aria-controls="assessment" role="tab" data-toggle="tab">SPOC Details</a></li>
                    <!-- <li role="presentation"><a href="#course" onClick="" aria-controls="course" role="tab" data-toggle="tab">Course</a></li> -->
                    <!-- <li role="presentation"><a href="#batch" onClick="" aria-controls="batch" role="tab" data-toggle="tab"></a></li> -->
                </ul>
                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Resource -->
                    <div role="tabpanel" class="tab-pane active" id="associates">
                        
                        <!-- Resource View Page in Ajax -->

                    </div>
                    
                    <!-- assessment -->
                    <div role="tabpanel" class="tab-pane" id="associate_doc_list">
                        
                        <!-- Assessment View Page in Ajax -->
                   <!--      <center><h3>Work in progress .. </h3></center> -->
                    </div>

                    <!-- Subject -->
                    <div role="tabpanel" class="tab-pane" id="associate_subjects">
                        
                        <!-- Subject View Page in Ajax -->
                        <!-- <center><h3>Work in progress .. </h3></center> -->
                    </div>
                    
                    <!-- Course -->
                    <div role="tabpanel" class="tab-pane" id="course">
                        
                        <!-- Course View Page in Ajax -->
                        <center><h3>Work in progress .. </h3></center>
                    </div>
                    
                    <!-- Batch -->
                    <div role="tabpanel" class="tab-pane" id="batch">
                        
                        <!-- Batch View Page in Ajax -->
                        <center><h3>Work in progress .. </h3></center>
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
            $(function() {
                get_all_associates();
                // $("#resource_list").dataTable();
                // $("#subject_list").dataTable();
                // $("#course_list").dataTable();
                // $("#batch_list").dataTable();
                // Refer how to use data table and customize
                // $('#example2').dataTable({
                //     "bPaginate": true,
                //     "bLengthChange": false,
                //     "bFilter": false,
                //     "bSort": true,
                //     "bInfo": true,
                //     "bAutoWidth": false
                // });
            });
        </script>        

