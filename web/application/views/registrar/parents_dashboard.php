        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>Parent Management</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#parents" onClick="get_all_parents();" aria-controls="parents" role="tab" data-toggle="tab">Parent List</a></li>
                  </ul>
                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Resource -->
                    <div role="tabpanel" class="tab-pane active" id="parents">  </div>
                    
                    <!-- assessment -->
                    <div role="tabpanel" class="tab-pane" id="parents_children">
                        
                        <!-- Assessment View Page in Ajax -->
                        <center><h3>Work in progress .. </h3></center>
                    </div>

                </div>
                <!-- Tab panes -->

            </div>
            <!-- ./TAB PANEL -->

        </section>

        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                get_all_parents();           
            });
        </script>        