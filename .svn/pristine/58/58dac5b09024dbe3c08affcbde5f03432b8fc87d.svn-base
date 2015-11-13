<!-- 
*********************************************************** 
|  Student Payment  : [ style - content - js ] by usk |
***********************************************************
 -->
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
<div class="container"><!-- /.container -->
	<div class="starter-template">
		<form name="ajax_profile_update" id="ajax_profile_update" method="POST" action="/profile/ajax_profile_update/" role="form">
		<!-- Offline Payment Details -->

		<div class="student_registration">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<h4>Profile</h4>
					</div>
				</div>

				<div class="panel-body">
					
    						<div class="row">

			                	<div class="col-xs-12 col-sm-6 col-md-6"><!-- 0uter col start -->
			                		<fieldset>
			                			<legend>Personal Details</legend>
			                		<div class="row">
			                			<div class="col-xs-12 col-sm-6 col-md-4">
			                			  <div class="form-group control-group">
				                    	    <div class="control">
				                              <input type="text" value="<?php echo $user_details['user_fname']; ?>"autocomplete="off" name="first_name" id="first_name" class="form-control input" value="<?php echo $user_details['user_fname']; ?>" placeholder="First Name" tabindex="1">
                                            </div>
                                           <span class="help-block"></span>
                                          </div>
                                        </div>
                                   

                                        <div class="col-xs-12 col-sm-6 col-md-4">
			                			  <div class="form-group control-group">
				                    	    <div class="control">
				                              <input type="text" value="<?php echo $user_details['user_mname']; ?>" autocomplete="off" name="middle_name" id="middle_name" class="form-control input" placeholder="Middle Name" tabindex="2">
                                            </div>
                                           <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
			                			  <div class="form-group control-group">
				                    	    <div class="control">
				                              <input type="text" value="<?php echo $user_details['user_lname']; ?>" autocomplete="off" name="last_name" id="last_name" class="form-control input" placeholder="Last Name" tabindex="3">
                                            </div>
                                           <span class="help-block"></span>
                                          </div>
                                        </div>
                                    </div>		
				                    <div class="row">
				                    	 <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group control-group">
                                                <div class="control input-group">
                                                     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                       <input type="text" value="<?php echo $user_details['user_phone']; ?>" autocomplete="off" name="phone" id="phone" class="form-control input" placeholder="Mobile no" tabindex="4">
                                                   </div>
                                                <span class="help-block"></span>
                                             </div>
                                         </div>
				            
								
										<div class="col-xs-12 col-sm-6 col-md-6">
                                           <div class="form-group control-group">
                                               <div class="control input-group">
                                                   <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                      <input type="text" value="<?php echo $user_details['user_email']; ?>" autocomplete="off" type="email" name="email" id="email" class="form-control input" placeholder="email" tabindex="5" disabled>
                                                      <input type="hidden" value="<?php echo $user_details['user_email']; ?>" autocomplete="off" type="email" name="user_email" id="user_email" class="form-control input" placeholder="email">
                                                 </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>	       
										        
								</div>
								</fieldset><!-- outer col ended -->
                                </div>
                                <div class="row">
							    <div class="col-xs-12 col-sm-6 col-md-6"> <!-- OUTER Col Start -->
                                        <!-- Start Address Details -->
                                <fieldset>
	                                <legend>Address</legend>
	                                
	                                <div class="row">
	                
	                                    <div class="col-xs-12 col-sm-6 col-md-4">
	                                      <div class="form-group control-group">
	                                        <div class="control">
	                                           <textarea autocomplete="off" name="address" id="address" class="form-control input-large" tabindex="6" placeholder="Street Address"><?php echo $user_details['user_address']; ?></textarea>
	                                        </div>
	                                      <span class="help-block"></span>
	                                     </div>	 
	                                   </div>
	                                </div>
                                
	                                <div class="row">

	                                    <div class="col-xs-12 col-sm-6 col-md-4">
	                                       <div class="form-group control-group">
	                                           <div class="control input-group">
	                                              <input type="text" value="<?php echo $user_details['user_city']; ?>" autocomplete="off" name="city" autofocus="off" id="city" class="form-control input" placeholder="City" tabindex="7">
	                                            </div>
	                                         <span class="help-block"></span>
	                                       </div>
	                                    </div>
							           
	                                     <div class="col-xs-12 col-sm-6 col-md-4">
	                                       <div class="form-group control-group">
	                                          <div class="control">
	                                          <select name="state" value="<?php echo $user_details['user_state']; ?>" autocomplete="off" id="state" class="form-control input" size="1" placeholder="State" tabindex="9">
						                        <option value="" selected="">State</option>
						                        <option value="Andaman and Nicobar Islands" <?php if(strcmp($user_details['user_state'],'Andaman and Nicobar Islands') == 0) { echo "selected='selected'"; }  ?> >Andaman and Nicobar Islands</option>
						                        <option value="Andhra Pradesh" <?php if(strcmp($user_details['user_state'],'Andhra Pradesh') == 0) { echo "selected='selected'"; }  ?> >Andhra Pradesh</option>
						                        <option value="Arunachal Pradesh"<?php if(strcmp($user_details['user_state'],'Arunachal Pradesh') == 0) { echo "selected='selected'"; }  ?> >Arunachal Pradesh</option>
						                        <option value="Assam"<?php if(strcmp($user_details['user_state'],'Assam') == 0) { echo "selected='selected'"; }  ?> >Assam</option>
						                        <option value="Bihar"<?php if(strcmp($user_details['user_state'],'Bihar') == 0) { echo "selected='selected'"; }  ?> >Bihar</option>
						                        <option value="Chandigarh" <?php if(strcmp($user_details['user_state'],'Chandigarh') == 0) { echo "selected='selected'"; }  ?> >Chandigarh</option>
						                        <option value="Chhattisgarh" <?php if(strcmp($user_details['user_state'],'Chhattisgarh') == 0) { echo "selected='selected'"; }  ?> >Chhattisgarh</option>
						                        <option value="Dadra and Nagar Haveli" <?php if(strcmp($user_details['user_state'],'Dadra and Nagar Haveli') == 0) { echo "selected='selected'"; }  ?> >Dadra and Nagar Haveli</option>
						                        <option value="Daman and Diu" <?php if(strcmp($user_details['user_state'],'Daman and Diu') == 0) { echo "selected='selected'"; }  ?> >Daman and Diu</option>
						                        <option value="Delhi"<?php if(strcmp($user_details['user_state'],'Delhi') == 0) { echo "selected='selected'"; }  ?> >Delhi</option>
						                        <option value="Goa" <?php if(strcmp($user_details['user_state'],'Goa') == 0) { echo "selected='selected'"; }  ?> >Goa</option>
						                        <option value="Gujarat" <?php if(strcmp($user_details['user_state'],'Gujarat') == 0) { echo "selected='selected'"; }  ?> >Gujarat</option>
						                        <option value="Haryana" <?php if(strcmp($user_details['user_state'],'Haryana') == 0) { echo "selected='selected'"; }  ?> >Haryana</option>
						                        <option value="Himachal Pradesh" <?php if(strcmp($user_details['user_state'],'Himachal Pradesh') == 0) { echo "selected='selected'"; }  ?> >Himachal Pradesh</option>
						                        <option value="Jammu and Kashmir" <?php if(strcmp($user_details['user_state'],'Jammu and Kashmir') == 0) { echo "selected='selected'"; }  ?>  >Jammu and Kashmir</option>
						                        <option value="Jharkhand" <?php if(strcmp($user_details['user_state'],'Jharkhand') == 0) { echo "selected='selected'"; }  ?> >Jharkhand</option>
						                        <option value="Karnataka" <?php if(strcmp($user_details['user_state'],'Karnataka') == 0) { echo "selected='selected'"; }  ?>>Karnataka</option>
						                        <option value="Kerala" <?php if(strcmp($user_details['user_state'],'Kerala') == 0) { echo "selected='selected'"; }  ?> >Kerala</option>
						                        <option value="Lakshadweep" <?php if(strcmp($user_details['user_state'],'Lakshadweep') == 0) { echo "selected='selected'"; }  ?> >Lakshadweep</option>
						                        <option value="Madhya Pradesh" <?php if(strcmp($user_details['user_state'],'Madhya Pradesh') == 0) { echo "selected='selected'"; }  ?>>Madhya Pradesh</option>
						                        <option value="Maharashtra" <?php if(strcmp($user_details['user_state'],'Maharashtra') == 0) { echo "selected='selected'"; }  ?>>Maharashtra</option>
						                        <option value="Manipur" <?php if(strcmp($user_details['user_state'],'Manipur') == 0) { echo "selected='selected'"; }  ?>>Manipur</option>
						                        <option value="Meghalaya" <?php if(strcmp($user_details['user_state'],'Meghalaya') == 0) { echo "selected='selected'"; }  ?>>Meghalaya</option>
						                        <option value="Mizoram" <?php if(strcmp($user_details['user_state'],'Mizoram') == 0) { echo "selected='selected'"; }  ?>>Mizoram</option>
						                        <option value="Nagaland" <?php if(strcmp($user_details['user_state'],'Nagaland') == 0) { echo "selected='selected'"; }  ?>>Nagaland</option>
						                        <option value="Orissa" <?php if(strcmp($user_details['user_state'],'Orissa') == 0) { echo "selected='selected'"; }  ?>>Orissa</option>
						                        <option value="Pondicherry" <?php if(strcmp($user_details['user_state'],'Pondicherry') == 0) { echo "selected='selected'"; }  ?>>Pondicherry</option>
						                        <option value="Punjab" <?php if(strcmp($user_details['user_state'],'Punjab') == 0) { echo "selected='selected'"; }  ?>>Punjab</option>
						                        <option value="Rajasthan" <?php if(strcmp($user_details['user_state'],'Rajasthan') == 0) { echo "selected='selected'"; }  ?>>Rajasthan</option>
						                        <option value="Sikkim" <?php if(strcmp($user_details['user_state'],'Sikkim') == 0) { echo "selected='selected'"; }  ?>>Sikkim</option>
						                        <option value="Tamil Nadu" <?php if(strcmp($user_details['user_state'],'Tamil Nadu') == 0) { echo "selected='selected'"; }  ?>>Tamil Nadu</option>
						                        <option value="Telangana" <?php if(strcmp($user_details['user_state'],'Telangana') == 0) { echo "selected='selected'"; }  ?>>Telangana</option>
						                        <option value="Tripura" <?php if(strcmp($user_details['user_state'],'Tripura') == 0) { echo "selected='selected'"; }  ?>>Tripura</option>
						                        <option value="Uttaranchal" <?php if(strcmp($user_details['user_state'],'Uttaranchal') == 0) { echo "selected='selected'"; }  ?>>Uttaranchal</option>
						                        <option value="Uttar Pradesh" <?php if(strcmp($user_details['user_state'],'Uttar Pradesh') == 0) { echo "selected='selected'"; }  ?>>Uttar Pradesh</option>
						                        <option value="West Bengal" <?php if(strcmp($user_details['user_state'],'West Bengal') == 0) { echo "selected='selected'"; }  ?>>West Bengal</option>
						                      </select>
						                      </div>
						                      <span class="help-block"></span>
						                  </div>
						                </div>
						              
						            </div>

					             	<div class="row">
						                
						                <div class="col-xs-12 col-sm-6 col-md-4">
						                  <div class="form-group control-group">
						                      <div class="control">
						                      <input type="text" value="<?php echo $user_details['user_country']; ?>"autocomplete="off" name="country" id="country" class="form-control input" placeholder="Country" tabindex="10">
						                      </div>
						                      <span class="help-block"></span>
						                  </div>
						                </div>
						                
						                <div class="col-xs-12 col-sm-6 col-md-4">
						                  <div class="form-group control-group">
						                      <div class="control">
						                      <input type="text" value="<?php echo $user_details['user_pin']; ?>" autocomplete="off" name="pincode" id="pincode" class="form-control input" placeholder="Pincode / Zip" tabindex="11">
						                      </div>
						                      <span class="help-block"></span>
						                  </div>
						                </div>
						              
						           	</div>
						        </div>
						    </div>
						</fieldset>

						<fieldset>
							<div class="row">

								<div class="col-xs-12 col-sm-3 col-md-3">
									<div class="form-group control-group">
						                <div class="control">
						                	<!-- <a class="btn btn-danger" href="<?php echo $user_home; ?>" value="cancel"> Cancel </a> -->
						                </div>
						            </div>
						        </div>

						        <div class="col-xs-12 col-sm-3 col-md-3">
									<div class="form-group control-group">
						                <div class="control">
						                	<button type="submit" onClick="doSubmit('#BasicForm');" class="btn btn-success"> Update </button>
						                	<button type="button" class="btn btn-warning" onClick="$('.input').val('');" >Reset</button>
						                	<a class="btn btn-danger" href="<?php echo $user_home; ?>" value="cancel"> Cancel </a>
						                </div>
						            </div>
						        </div>

							</div>
						</fieldset>
					</div>
				</div>
			</div>
			</div>
			</form>
			</div>

		</div>
	</div>
</div>
</div>

<script src="/static/js/common/validate.js" type="text/javascript"></script>