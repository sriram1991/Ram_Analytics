        <!-- DATA TABLES -->
        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>Content Management</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#resource" onClick="get_resource_list();" aria-controls="resource" role="tab" data-toggle="tab">Resource</a></li>
                    <li role="presentation"><a href="#assessment" onClick="get_assessment_list();" aria-controls="assessment" role="tab" data-toggle="tab">Assessment</a></li>
                    <li role="presentation"><a href="#course_resource_map_list" onClick="open_course_resource_mapview();" aria-controls="course_syllabus" role="tab" data-toggle="tab">Map Course & Resource </a></li>
                    <li role="presentation"><a href="#course_assessment_map_list" onClick="open_course_assessment_mapview();" aria-controls="course_syllabus" role="tab" data-toggle="tab">Map Course & Assessment </a></li>
                    <!-- <li role="presentation"><a href="#course" onClick="get_course_list();" aria-controls="course" role="tab" data-toggle="tab">Course</a></li> -->
                    <!-- <li role="presentation"><a href="#subject" onClick="get_subject_list();" aria-controls="subject" role="tab" data-toggle="tab">Subject</a></li> -->
                </ul>
                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Resource -->
                    <div role="tabpanel" class="tab-pane active" id="resource">
                        
                        <!-- Resource View Page in Ajax -->

                    </div>
                    
                    <!-- Assessment -->
                    <div role="tabpanel" class="tab-pane" id="assessment">
                        
                        <!-- Assessment View Page in Ajax -->

                    </div>

                    <!-- Map Course & Resource -->
                    <div role="tabpanel" class="tab-pane" id="course_resource_map_list">
                        
                        <!-- Map Course & Resource View Page in Ajax -->
                        
                    </div>

                    <!-- Map Course & Assessment -->
                    <div role="tabpanel" class="tab-pane" id="course_assessment_map_list">
                        
                        <!-- Map Course & Assessment View Page in Ajax -->
                        
                    </div>
                    <?php 
                    /*
                    <!-- Course -->
                    <div role="tabpanel" class="tab-pane" id="course">
                        
                        <!-- Course View Page in Ajax -->
                        
                    </div>

                    <!-- Subject -->
                    <div role="tabpanel" class="tab-pane" id="subject">
                        
                        <!-- Subject View Page in Ajax -->

                    </div>
                    */?>

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
                // get_resource_list();
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
