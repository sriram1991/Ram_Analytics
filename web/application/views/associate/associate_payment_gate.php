
    <!-- Content Header (Page header) -->
	<section class="content-header">
	   <h2>
	       Payment Summery
	   </h2>
	</section>

    <!-- info bar 
	<div class="pad margin no-print">
	   <div class="alert alert-info" style="margin-bottom: 0!important;">
	       <i class="fa fa-info"></i>
	       <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
	   </div>
	</div>
    -->

    <!-- Main content -->
    <section class="content invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Affiliate
                </h2>
            </div><!-- /.col -->
        </div>
        
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong><?php echo $user_details['user_fname']; ?></strong><br>
                    <?php echo $user_details['user_address'].",".$user_details['user_city']; ?><br>
                    <?php echo $user_details['user_state'].",".$user_details['user_country'].",".$user_details['user_pin'].".";?><br>
                    Phone: <?php echo $user_details['user_phone']; ?><br/>
                    Email: <?php echo $user_details['user_email']; ?><br>                        
                </address>
            </div><!-- /.col -->
    
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>SKOL System</strong><br>
                    JankPuri Road,<br>
                    Dheli, INDIA 94107<br>
                    Phone: 09454656576<br/>
                    Email: admin@skol.com
                </address>
            </div><!-- /.col -->
            
            <div class="col-sm-4 invoice-col">                     
                <!-- <b>Purchase Order No:</b> 4F3S8J<br/> -->
                <b>Date:</b><?php echo date('d/m/Y'); ?><br/>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <?php
            if ($subject_registration){?>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Affiliate Name</th>
                                    <th>Subject</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php  
                                for ($i=0;$i<$length;$i++){ ?> 
                                <tr>  
                                    <td><?php echo $associate_name; ?></td>  
                                    <td><?php echo $subjects[$i]; ?></td>  
                                    <td><?php echo $amount[$i]; ?></td>  
                                </tr>  
                                <?php } ?>                                         
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            <?php } else { ?>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Parent Name</th>
                                    <th>Course</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
							        foreach ($user_details as $row){ ?> 
							         <tr>  
							        	<td><?php echo $row->first_name;?></td>  
							            <td><?php echo $row->email;?></td>  
							            <td><?php echo $row->parent_name;?></td>  
							            <td><?php echo $row->course;?></td>  
							            <td><?php echo $row->cost;?></td>  
							         </tr>  
							    <?php } ?>  							           
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            <?php } ?>

            <hr>
            <br>             
            <div class="row">
                
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Order Summary</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                               <tr>
                                   <th style="width:50%">Subtotal:</th>
                                    <?php if ($subject_registration){?>
                                           <td> &#x20B9; <?php echo $total_amount; ?></td>
                                    <?php } else {?>
                                           <td> &#x20B9; <?php echo $total_cost['cost']; ?></td>
                                    <?php } ?>
                                </tr>
                                
                                <tr>
                                   <th>Tax (0%)</th>
                                   <td>&#x20B9; 0</td>
                                </tr>                           
                                <tr>
                                   <th>Total Amount:</th>
                                   <?php if ($subject_registration){?>
                                        <td> &#x20B9; <?php echo $total_amount; ?></td>
                                    <?php } else {?>
                                        <td> &#x20B9; <?php echo $total_cost['cost']; ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.col -->

                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <!-- <img src="/static/theme/img/credit/visa.png" alt="Visa"> -->
                            <!-- <img src="/static/theme/img/credit/mastercard.png" alt="Mastercard"> -->
                            <!-- <img src="/static/theme/img/credit/american-express.png" alt="American Express"> -->
                            <!-- <img src="/static/theme/img/credit/paypal2.png" alt="Paypal"> <br><br> -->
                            <button class="btn btn-success pull-left"><i class="fa fa-credit-card"></i> Pay Online</button><br><br>
                        </div>
                        <div class="col-xs-3">
                            <center><label>OR</label></center>
                        </div>
                        <div class="col-xs-3">
                            <button class="btn btn-primary pull-left" onclick="offline_mode_payment();"><i class="fa fa-credit-card"></i> Pay Offline</button>
                        </div>
                    </div>
                    
                </div>
                 
            </div>

            <!-- this row will not appear when printing 
            <div class="row no-print">
                <div class="col-xs-12">
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button   >
                </div>
            </div>
            -->

        </section><!-- /.content -->
        
        <script src="/static/js/common/validate.js" type="text/javascript"></script>
        <script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
        <script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
        <script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
        <script type="text/javascript">
            $('#paid_date').pickadate({
                format: 'yyyy-mm-dd',
                // selectYears: true,
                // selectMonths: true,
                min: true
            });
        </script>