<?php echo validation_errors(); ?>
<?php echo $error;?>

<?php echo form_open_multipart('admin/resource/add_pdf');?>

    <div class="row">
                                            
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" value="<?php echo set_value('resource_name'); ?>" tabindex="1"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="file" autocomplete="off" name="resource_link" id="resource_link" class="form-control input" placeholder="Select File" value="<?php echo set_value('resource_link'); ?>" tabindex="2"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource TAG" value="<?php echo set_value('resource_tag'); ?>" tabindex="3"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <button type="submit"  class="btn btn-info">Upload </button>
                </div>
                <span class="help-block"></span>
            </div>
        </div>


        
    </div>

<?php echo form_close(); ?>

























                                   <!--  
                                   <form method="POST" action="/admin/resource/add_pdf" name="associate_reg_form" id="BasicForm" role="form">
                                        <div class="row">
                                            
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group control-group">
                                                    <div class="control">
                                                        <input type="text" autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="1"> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group control-group">
                                                    <div class="control">
                                                        <input type="file" autocomplete="off" name="resource_link" id="resource_link" class="form-control input" placeholder="Video URL:" tabindex="2"> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group control-group">
                                                    <div class="control">
                                                        <input type="text" autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource TAG" tabindex="3"> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        
                                        </div> 
                                        </form>
                                        -->