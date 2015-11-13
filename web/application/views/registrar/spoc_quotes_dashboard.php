        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>SPOC Quotes Management</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" ><a href="#students1" onClick="get_not_verified_spoc_quotes();" aria-controls="students1" role="tab" data-toggle="tab">Quotes Not Verified SPOC </a></li>
                    <li role="presentation"><a href="#students" onClick="get_all_spoc_quotes();" aria-controls="students" role="tab" data-toggle="tab">Quotes Applied SPOC </a></li>                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="not_verified_students">  </div>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="students">   </div>
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
               get_not_verified_spoc_quotes();
            });
        </script>        