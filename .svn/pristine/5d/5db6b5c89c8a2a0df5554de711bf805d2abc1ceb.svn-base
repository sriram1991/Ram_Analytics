<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
<style type="text/css">
.error {
	color: #b94a48;
	border-color: #b94a48;
	font-size: 12px;
	font-family: inherit;
	font-style: italic;
}
</style>
<form method="POST" action="#" name="editprofileform" id="editprofileform" role="form">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8">
			<div class="form-group control-group">
                <div class="control">
                	Subject:
                	<input type="text" name="email_subject" id="email_subject" required="" autocomplete="off" value="<?php  if(isset($user_details))echo $user_details['registration_no'].' - Request for profile Edit';?>" name="registration_no" id="registration_no" class="form-control input"  tabindex="1" aria-required="true" disabled> 
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group control-group">
				<div class="control">
					Message:
					<textarea title="Please Fill the Details" required autofocus id="message_body" name="message_body" rows="4" class="form-control input col-md-12" tabindex="3"></textarea>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" value="<?php if(isset($user_details)) echo $user_details['user_id'];?>" name="edit_user_id" id="edit_user_id" >
</form>
<script src="/static/js/common/validate.js" type="text/javascript"></script>