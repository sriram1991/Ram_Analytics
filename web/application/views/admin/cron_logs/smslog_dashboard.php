        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>SMS LOG Management</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#smslog_list" onClick="get_smslog_list();" aria-controls="smslog_list" role="tab" data-toggle="tab">SMS log list</a></li>
                    <!-- <li role="presentation"><a href="#send_email_log" onClick="get_smslog_list();" aria-controls="send_email_log" role="tab" data-toggle="tab">EMAIL log list</a></li> -->
                  </ul>
                <!-- Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- SMS LOG LIST -->
                    <div role="tabpanel" class="tab-pane active" id="smslog_list">  
                        <!-- AJAX will load smslog_list -->
                    </div>
                    
                    <!-- EMAIL SENT LOG  -->
                    <div role="tabpanel" class="tab-pane" id="send_email_log">
                        <!-- AJAX will load email_log_list -->
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
                get_smslog_list();          
            });
        </script>        