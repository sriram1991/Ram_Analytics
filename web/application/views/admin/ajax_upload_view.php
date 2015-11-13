<script src="/static/js/common/skol.js" type="text/javascript"></script>
<script src="/static/js/common/ajaxfileupload.js"></script>
<form method="post" action="#" id="VideoForm">
	<div class="row">
                                            
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="1"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="file" required autocomplete="off" name="resource_link" id="resource_link" class="form-control input" placeholder="Select File" tabindex="2"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource TAG" tabindex="3"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>
	<div id="files" class="error_file"></div>
<!-- <input type="file" name="userfile" id="userfile" size="20" /> -->
</form>
 