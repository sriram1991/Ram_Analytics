
    <!-- Content Header (Page header) -->
	<section class="content-header">
	   <h2>
	       Payment Summary
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
                    <i class="fa fa-globe"></i> <?php echo $user_details['user_type'];?> Transaction 
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



                    <strong>Ask Analytics </strong><br>
                    #1, BC 202, Rajathadri, 2nd Floor,<br>
                    2nd Main, East NGEF, Kasturi Nagar, <br> Bangalore - 560043
                    <br>Phone: +91-8964786756/24/25<br/>
                    Email: info@ask_analytics.com
                </address>
            </div><!-- /.col -->
            
            <div class="col-sm-4 invoice-col">                     
                <!-- <b>Purchase Order No:</b> 4F3S8J<br/> -->
                <b>Date:</b><?php echo date('d/m/Y'); ?><br/>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <?php
            if(isset($student_course_subscription) && $student_course_subscription == true){?>
            <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course Description</th>
                                    <th>Course Duration(Months)</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>  
                                    <td><?php echo $course_name; ?></td>  
                                    <td><?php echo $course_description; ?></td>  
                                    <td><?php echo $course_duration; ?></td>
                                    <td>&#x20B9; <?php echo $total_amount; ?></td> 
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div><!-- /.row -->

            <?php if(isset($scholarship_status) && $scholarship_status == 6){ ?>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- <input type="checkbox" id="enable_scholarship" name="enable_scholarship" onchange="enable_scholarship()" checked="checked" disabled>&nbsp;&nbsp;I want to take Scholarship</input> -->
                    </div>
                    <div class="col-xs-6">
                        <h5 id="scholarship_text" style="color:green;"> Congrat's you got a Scholarship of Rs : <b style="color:black;"> &#x20B9; <?php echo $discount_amount; ?> <b></h5> 
                    </div>
                </div>
                <hr>
            <?php }
                else if(isset($scholarship_status) && $scholarship_status ==7 ){?>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- <input type="checkbox" id="enable_scholarship" name="enable_scholarship" onchange="enable_scholarship()" checked="checked" disabled>&nbsp;&nbsp;I want to take Scholarship</input> -->
                    </div>
                    <div class="col-xs-6">
                        <h5 id="scholarship_text" style="color:red;">Sorry you didn't recieve any Scholarship from Ask Analytics </h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="checkbox" id="enable_couponcode" name="enable_couponcode" onchange="enable_coupon_code()">&nbsp;&nbsp;I have a Promo Code</input>
                        <h5 id="coupon_code_text"></h5>
                    </div>
                    <div class="col-xs-6">
                        <div class="pull-right" id="coupon_code_div" style="visibility:hidden;">
                            <input class="" type="text" id="coupon_code" name ="coupon_code" placeholder="Enter Promo Code"/>
                            <button type="button" id="apply_couponcode" class="btn btn-success" onclick="this.disabled=true;apply_coupon_code()" ></i>Apply</button>
                        </div>
                    </div>
                </div>
            <?php }
                else if(isset($scholarship_status) && $scholarship_status == 9){?>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- <input type="checkbox" id="enable_scholarship" name="enable_scholarship" onchange="enable_scholarship()" checked="checked" disabled>&nbsp;&nbsp;I want to take Scholarship</input> -->
                    </div>
                    <div class="col-xs-6">
                        <h5 id="scholarship_text" style="color:darkorange;">Your Scholarship application didn't get verified.<br>Come back after Ask Analytics had responded to your appliation</h5>
                    </div>
                </div>
                <hr>
                 <script type="text/javascript">
                    document.getElementById('online_payment_button').disabled=true;
                    document.getElementById('offline_payment_button').disabled=true;
                 </script>
            <?php }else{?>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- <input type="checkbox" id="enable_scholarship" name="enable_scholarship" onchange="enable_scholarship()" >&nbsp;&nbsp;I want to take Scholarship</input> -->
                    </div>
                    <div class="col-xs-6">
                        <h5 id="scholarship_text"></h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="checkbox" id="enable_couponcode" name="enable_couponcode" onchange="enable_coupon_code()">&nbsp;&nbsp; I have a Promo Code</input>
                        <h5 id="coupon_code_text"></h5>
                    </div>
                    <div class="col-xs-6">
                        <div class="pull-right" id="coupon_code_div" style="visibility:hidden;">
                            <input class="" type="text" id="coupon_code" name ="coupon_code" placeholder="Enter Promo Code"/>
                            <button type="button" id="apply_couponcode" class="btn btn-success" onclick="this.disabled=true;apply_coupon_code()" ></i>Apply</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <?php } else if (isset($subject_registration)&& $subject_registration == true){ ?>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SPOC Name</th>
                                    <th>Subject</th>
                                    <th>Amount (in &#x20B9;)</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>  
                                    <td><?php echo $user_fname; ?></td>  
                                    <td><?php echo $subject; ?></td>  
                                    <td><?php echo $total_amount; ?></td>  
                                </tr>  
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- Below code id for Promocode -->
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="checkbox" id="enable_couponcode" name="enable_couponcode" onchange="enable_coupon_code()">&nbsp;&nbsp;I have a Promo Code</input>
                        <h5 id="coupon_code_text"></h5>
                    </div>
                    <div class="col-xs-6">
                        <div class="pull-right" id="coupon_code_div" style="visibility:hidden;">
                            <input class="" type="text" id="coupon_code" name ="coupon_code" placeholder="Enter Promo Code"/>
                            <button type="button" id="apply_couponcode" class="btn btn-success" onclick="this.disabled=true;apply_coupon_code()" ></i>Apply</button>
                        </div>
                    </div>
                </div>
            <?php } else {?>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Organization Name</th>
                                    <th>Course</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($students)){
    							        foreach ($students as $row){ ?> 
    							         <tr>  
    							        	<td><?php echo $row->first_name;?></td>  
    							            <td><?php echo $row->email;?></td>  
    							            <td><?php echo $row->parent_name;?></td>  
    							            <td><?php echo $row->course;?></td>  
    							         </tr>  
							    <?php   } 
                                    }
                                ?>  							           
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- Below code id for Promocode -->
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="checkbox" id="enable_couponcode" name="enable_couponcode" onchange="enable_coupon_code()">&nbsp;&nbsp;I have a Promo Code</input>
                        <h5 id="coupon_code_text"></h5>
                    </div>
                    <div class="col-xs-6">
                        <div class="pull-right" id="coupon_code_div" style="visibility:hidden;">
                            <input class="" type="text" id="coupon_code" name ="coupon_code" placeholder="Enter Promo Code"/>
                            <button type="button" id="apply_couponcode" class="btn btn-success" onclick="this.disabled=true;apply_coupon_code()" ></i>Apply</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <hr>
            <br>             
            <div class="row">
                
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead"><label>Order Summary</label></p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                
                               <tr>
                                    <th style="width:50%">Subtotal :</th>
                                    <td>&#x20B9;<input type="text" id="sub_total" name="sub_total" style="width:75%" readonly placeholder="Subtotal amount" value="<?php echo $total_amount; ?>"></input></td> <!-- echo $total_amount; -->
                                </tr>
                                
                                <tr>
                                   <th>Tax (0%) :</th>
                                   <td>&#x20B9; 0 </td>
                                </tr>                           
                                <tr>
                                    <th>Total Amount :</th>
                                    <td>&#x20B9;<input type="text" id="total_amount" name="total_amount" style="width:75%" readonly placeholder="Total amount" value="<?php echo $total_amount; ?>"></input></td> <!-- echo $total_amount; -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.col -->

                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead"><label>Payment Methods:</label></p>
                    <div class="row">
                        <div class="col-xs-3">
                            <!-- <img src="/static/theme/img/credit/visa.png" alt="Visa"> -->
                            <!-- <img src="/static/theme/img/credit/mastercard.png" alt="Mastercard"> -->
                            <!-- <img src="/static/theme/img/credit/american-express.png" alt="American Express"> -->
                            <!-- <img src="/static/theme/img/credit/paypal2.png" alt="Paypal"> <br><br> -->
                            <button class="btn btn-success pull-left" data-toggle="modal" data-target="#online_payment_button"><i class="fa fa-credit-card"></i> Pay Online</button><br><br>
                        </div>
                        <div class="col-xs-3">
                            <center><label>OR</label></center>
                        </div>
                        <?php 
                        // if($discount_amount < 1){
                            ?>
<!--                         <div class="col-xs-3">
                            <button class="btn btn-primary pull-left" id="offline_payment_button" onclick="#" disabled><i class="fa fa-credit-card"></i> Pay Offline</button>
                        </div>
 -->                        <?php 
                                // } else {
                            ?>
                        <div class="col-xs-3">
                            <button class="btn btn-primary pull-left" id="offline_payment_button" onclick="offline_mode_payment();"><i class="fa fa-credit-card"></i> Pay Offline</button>
                        </div>
                        <?php //}?>
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

            <div class="modal fade" id="scholarship_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onclick="window.location.reload('/');">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload('/');">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"> Scholarship Details </h4>
                        </div>
                        <div class="modal-body" id="body-associate_course_info">
                            <center><h4> You have successfully applied for Scholarship.<br>Ask Analytics Team will get back to you.</h4></center>
                        
                        </div>          
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                            <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                            <button type="button" class="btn btn-danger" onClick="window.location.reload('/');" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Online payment -->
             <div class="modal fade" id="online_payment_button" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onclick="window.location.reload('/');">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload('/');">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"> Online Payment </h4>
                        </div>
                        <div class="modal-body" id="body-associate_course_info">
                            <center><h4> Currently Online Payment is not available .</h4></center>
                        
                        </div>          
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-success" onClick="update_batch();" tabindex='4'>Save</button> -->
                            <!-- <button type="button" class="btn btn-warning" onClick="$('.input').val('');" tabindex='5'>Reset</button> -->
                            <button type="button" class="btn btn-danger" onClick="window.location.reload('/');" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

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