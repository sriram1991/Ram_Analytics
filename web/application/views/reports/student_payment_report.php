        <!-- DATA TABLES -->
        <link href="/static/theme/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4><p>User Payment Reports</p></h4>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- TAB PANEL -->
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#paid_students" onClick="paid_students();" aria-controls="students" role="tab" data-toggle="tab">Paid List</a></li>
                    <!-- Needed for future use -->
                    <!-- <li role="presentation"><a href="#unpaid_students" onClick="unpaid_students();" aria-controls="students" role="tab" data-toggle="tab">Pending List</a></li> -->
                    <li role="presentation"><a href="#payment_not_verified_students" onClick="payment_not_verified_students();" aria-controls="students" role="tab" data-toggle="tab">Not Verified List</a></li>
                </ul>
                <!-- Nav tabs -->
               
            </div>

            <div class="tab-content">
                <!-- Displays the List of Paid Students -->
                <div role="tabpanel" class="tab-pane active" id="paid_students">
                
                </div>
                    
                <!-- Displays the list of UnPaid Students -->
                <div role="tabpanel" class="tab-pane active" id="unpaid_students">
                        
                
                </div>

                <!-- Displays the list of Payment Not Verified Students -->
                <div role="tabpanel" class="tab-pane active" id="payment_not_verified_students">
                        

                </div>        
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
                paid_students();
                
            });
        </script>        