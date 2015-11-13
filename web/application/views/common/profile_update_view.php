        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4><p>
                        <?php 
                            //if(isset($user_details)) { 
                            //    echo $user_details['user_type']; }
                        ?> Profile Page 
                        </p></h4>
                    </div>
                </div>
            </div>
        </section> -->
        
        <!-- Main content -->
        <section class="content-header">
            <form name="ajax_profile_update" id="ajax_profile_update" method="POST" action="/profile/ajax_profile_update" role="form">
            <!-- Constrtucn UI Here -->
            <div class="content-header">
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <fieldset><legend><?php if(isset($user_details)) echo $user_details['user_fname']." ".$user_details['user_lname']; else echo "User Picture"; ?></legend>
                              <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="pull-left image">
                                        <!-- <img src="/static/theme/img/avatar5.png" class="img-circle" alt="User Image" /> -->
                                            <img class="img-circle" style="width: 90%;" alt="User Image" src="<?php if($user_details['user_photo'] != 'NULL' ) echo '/static/img/user_photo/'.$user_details['user_photo']; else echo '/static/img/user_photo/default_photo.png'; ?>">
                                    </div>
                                </div>

                              </div>  
                            </fieldset>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <fieldset><legend><?php if(isset($user_details)) { echo $user_details['user_type']; } ?> Details</legend>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <label>Name:</label>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-8 col-md-8">
                                        <label> <?php echo $user_details['user_fname']." ".$user_details['user_lname']; ?> </label>
                                    </div>
                                </div>
                                    
                                <div class="row">

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <label>Reg ID:</label>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-8 col-md-8">
                                        <label> <?php echo $user_details['registration_no']; ?> </label>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <label>Email ID:</label>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-8 col-md-8">
                                        <input id="user_email" name="user_email" value="<?php echo $user_details['user_email']; ?>" class="form-control input-large" disabled > </input>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="content-header">
                <div class="panel-body">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <fieldset><legend>Profile Picture</legend>
                              <div class="row">

                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <label>File:</label>
                                        </div>
                                    </div>
                                </div>
                                            
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div class="form-group control-group">
                                        <div class="control">
                                            <input type="file" id="user_photo" name="user_photo" value="<?php echo $user_details['user_photo']; ?>"autocomplete="off" class="form-control input" >
                                            <h6 class="text-green">*max size: 600 X 480</h6>
                                        </div>
                                        <span class="help-block"></span>
                                        <span id="files"></span>
                                    </div>
                                </div>
                                <input type="hidden" id="profile_picture" value="<?php if($user_details['user_photo'] != 'NULL' ) echo $user_details['user_photo']; else echo 'default_photo.png'; ?>"/>
                              </div>  
                            </fieldset>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <fieldset><legend>Contact</legend>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-2 col-md-2">
                                        <div class="form-group control-group">
                                            <div class="control">
                                                <label>Phone:</label>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="col-xs-12 col-sm-8 col-md-8">
                                        <div class="form-group control-group">
                                            <div class="control">
                                                <input type="text" name="user_phone" id="user_phone" value="<?php echo $user_details['user_phone']; ?>"autocomplete="off" class="form-control input">
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>  
                            </fieldset>
                        </div>

                    </div>

                </div>
            </div>

            <div class="content-header">
                <div class="panel-body">
                <fieldset><legend>Address Details</legend>
                
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <label>Street</label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <input autocomplete="off" name="user_address" id="user_address" value="<?php echo $user_details['user_address']; ?>" class="form-control input-large" disabled></input>
                        </div>
                        
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <label>District</label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <input autocomplete="off" name="user_district" id="user_district" value="<?php echo $user_details['user_district']; ?>" class="form-control input-large" disabled></input>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <label>City</label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <input autocomplete="off" name="user_city" id="user_city" value="<?php echo $user_details['user_city']; ?>" class="form-control input-large" disabled></input>
                        </div>

                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <label>State</label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <input autocomplete="off" name="user_state" id="user_state" value="<?php echo $user_details['user_state']; ?>" class="form-control input-large" disabled></input>
                        </div>
                    
                    </div>

                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <label>Country</label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <input autocomplete="off" name="user_counrty" id="user_counrty" value="<?php echo $user_details['user_country']; ?>" class="form-control input-large" disabled></input>
                        </div>

                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <label>Pin/Zip</label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <input autocomplete="off" name="user_pincode" id="user_pincode" value="<?php echo $user_details['user_pin']; ?>" class="form-control input-large" disabled></input>
                        </div>

                    </div>

                </fieldset>
                </div>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-info" onClick="edit_profile_modal();">Edit Disabled Details</button>
                <button onClick="update_profile('#ajax_profile_update');" type="button" id='update_profile_btn' data-loading-text="Processing..." class='btn btn-success'>Update</button>
                <a href="<?php echo $user_home;?>" class="btn btn-danger">Cancel</a>
            </div>
            <!-- Constrtucn UI Here -->
            </form>
        </section><!-- /.content -->

<!--====================Edit Profile(disabled fields) -->
<div class="modal fade" id="EditProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onClick="$('#EditProfileModal').find('textarea').val('');">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Send Email to Admin </h4>
            </div>
            
            <div class="modal-body" id="body-edit_profile">
                <!-- AJAX Call Will Load Profile Modal -->
            </div>
            
            <div class="modal-footer">
                <?php
               echo"<button type='button' class='btn btn-success' onClick='send_profile_update_mail();' >Send Email</button>";
                ?>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="$('#EditProfileModal').find('textarea').val('');">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--====================Edit profile ended============-->        

<script src="/static/js/common/ajaxfileupload.js"></script>
<script src="/static/js/common/ajax_profile_update.js"></script>
<script src="/static/js/common/validate.js"></script>