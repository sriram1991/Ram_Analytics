        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>Offline Pay Management</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#students" onClick="get_all_offline_payment();" aria-controls="students" role="tab" data-toggle="tab">All Payment List</a></li>
                    <li role="presentation"><a href="#students1" onClick="get_not_verified_offline_payment();" aria-controls="students1" role="tab" data-toggle="tab">Payment Not Verified List</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="students">  </div>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="students1">   </div>
                </div>
                <!-- Tab panes -->
            </div>
            <!-- ./TAB PANEL -->

        </section>
        <!-- ./Main content -->

        <script src="/static/theme/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
               get_all_offline_payment();
            });
        </script>        