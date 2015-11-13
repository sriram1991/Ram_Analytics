<form method="POST" action="/admin/resource/add_video" name="VideoForm" id="VideoForm" role="form">
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
                    <input type="text" autocomplete="off" name="resource_name" id="resource_name" class="form-control input" placeholder="Resource Name" tabindex="2" required> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                    <div class="control">
                        <input type="url" autocomplete="off" name="resource_link" id="resource_link" class="form-control input" placeholder="Video URL:" tabindex="3" required> 
                    </div>
                    <span class="help-block"></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group control-group">
                <div class="control">
                    <input type="text" autocomplete="off" name="resource_tag" id="resource_tag" class="form-control input" placeholder="Resource TAG" tabindex="4" required> 
                </div>
                <span class="help-block"></span>
            </div>
        </div>
        
    </div>
</form>
<!-- Validation Script To Make Enable in Ajax Call -->
<script src="/static/js/common/validate.js" type="text/javascript"></script>