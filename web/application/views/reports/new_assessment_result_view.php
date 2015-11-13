        <!-- <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>Assessment Reports</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#all_student_test_reports" onClick="all_student_test_reports();" aria-controls="link" role="tab" data-toggle="tab">Users Rank List</a></li>
                    <!-- <li role="presentation"><a href="#unlink" onClick="unlink_associate();" aria-controls="unlink" role="tab" data-toggle="tab">Unlink</a></li> -->
                </ul>

                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    
                    <!-- Course -->
                    <div role="tabpanel" class="tab-pane active" id="all_student_test_reports">                        
                        <!-- Ajax to load with student rank list page -->                        
                    </div>

                    <!-- unlink -->
                    <div role="tabpanel" class="tab-pane" id="unlink">                        
                        <!-- Subject View Page in Ajax -->
                    </div>
                    
                </div>
                <!-- Tab panes -->

            </div>
            <!-- ./TAB PANEL -->

        </section>
        <!-- ./Main content -->

        <!-- Content Header (Page footer) -->
        <!-- DATA TABES SCRIPT -->
        <!-- 
        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        -->

        <!-- page script -->
        <script type="text/javascript">
            $(document).ready(function(){
                // alert('i am beeing called');
                // all_student_test_reports();
            })
        </script>