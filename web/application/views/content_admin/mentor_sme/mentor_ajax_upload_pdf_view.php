<form method="post" action="#" id="ajax_mentor_pdf_upload" name="ajax_mentor_pdf_upload">
	<div class="row">
        
        <div class="col-xs-12 col-sm-4 col-md-4">   
            <div class="form-group control-group">
                <div class="control">
                    <select required="" autocomplete="off" name="subject_name" id="subject_name" class="form-control input" size="1" tabindex="1" aria-required="true">
                        <option value="" selected>Select Area of Interest</option>
                        <?php
                         if(isset($subject_list)){
                            foreach ($subject_list as $res) {
                                echo "<option value='".$res->subject_name."'>".$res->subject_name."</option>";
                            }
                         } 
                        ?>
                    </select>
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="2"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="file" required autocomplete="off" name="resource_pdf_link" id="resource_pdf_link" class="form-control input" placeholder="Select File" tabindex="3"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" required autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource TAG" tabindex="4"> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

    </div>
	<div id="files" class="error_file"></div>
    <input id="file_type" type="hidden" value="PDF">
<!-- <input type="file" name="userfile" id="userfile" size="20" /> -->
</form>
<script src="/static/js/common/ajaxfileupload.js"></script>
<script src="/static/js/common/ajax_pdf_file_upload.js"></script>
<script src="/static/js/common/validate.js"></script>