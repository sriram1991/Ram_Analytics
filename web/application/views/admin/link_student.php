<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
	<!-- <section class="content"> -->
	<br> <br>
    <form name="linkstudent" id="linkstudent" method="post" action="#" role="form">
 	<div class="panel panel-info">
        
        <div class="panel panel-body">

        	<div class="alert alert-info alert-dismissable">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Note:</b> You can link only paid User with paid SPOC !.
            </div> 
            <br>
        	
        	<div class="row">	

		            <div class="col-xs-12 col-sm-6 col-md-4">
		                <div class="form-group control-group">
		                    <div class="control">
			                    <input type="text" onkeyup='$("#student_associate_link_details").html("");' autocomplete="off" name="student_registration_no" id="student_registration_no" class="form-control input" placeholder="User Registration No" tabindex="1" required>
		             	 	</div>		                 
		                  	<span class="help-block"></span>
		                </div>
		            </div>
		        	<div id="student_name" style="padding-left: 42%;">  </div>

	              	<div class="col-xs-12 col-sm-6 col-md-4">
	                	<div class="form-group control-group">
	                  		<div class="control">
	                    		<input type="text" onkeyup='$("#student_associate_link_details").html("");' autocomplete="off" name="associate_registration_no" id="associate_registration_no" class="form-control input" placeholder="SPOC Registration No" tabindex="2" required>
	                  		</div>	                  		
	                  	<span class="help-block"></span>
		                </div>
	                </div>

				    <div class="col-xs-12 col-sm-4 col-md-4">
				        <div class="form-group control-group">
				            <div class="control">
							    <button type="button" class="btn btn-primary" tabindex="19" onclick="load_student_associate_details();"> Search </button>
				     	    </div>
				            <span class="help-block"></span>
				        </div>
				    </div>

					<!-- <div id="associate_name" style="padding-left: 42%;">  </div> -->
		
			</div>

		    <div class="row">
		    	<div class="col-xs-12 col-sm-12 col-md-12" id="student_associate_link_details">
		    	<!-- ajax will load result -->

		    	</div>
        	</div>

		</div>
	</div>
	</form>

<!-- </section> -->

<script src="/static/js/common/validate.js" type="text/javascript"></script>


<?php /*
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">

<form name="student_reg_form" id="linkstudent" method="post" action="#" role="form">
<br>
    <div class="panel panel-body">
        <div class="row"><!-- OUTER ROW Start-->
          	<div class="col-xs-12 col-sm-6 col-md-6"><!-- OUTER Col Begin-->

            <fieldset>
            	<legend>Link Details</legend>
            	<h4 id="error" style="color:red;"></h4>
	            <div class="row">
		            <div class="col-xs-12 col-sm-6 col-md-4">
		                <div class="form-group control-group">
		                    <div class="control">
			                    <input type="text" autocomplete="off" name="registration_no" id="student_registration_no" class="form-control input" placeholder="Student Registration No" onChange="load_student_name(value);" tabindex="1" required>
		             	 	</div>		                 
		                  	<span class="help-block"></span>
		                </div>
		            </div>
		        	<div id="student_name" style="padding-left: 42%;">  </div>
		        </div>

		        <div class="row">
	              	<div class="col-xs-12 col-sm-6 col-md-4">
	                	<div class="form-group control-group">
	                  		<div class="control">
	                    		<input type="text" autocomplete="off" name="associate_id" id="associate_registration_no" class="form-control input" placeholder="Associate Registration No" onChange="load_associate_name(value);" tabindex="2" required>
	                  		</div>	                  		
	                  	<span class="help-block"></span>
		                </div>
	                </div>	                
					<div id="associate_name" style="padding-left: 42%;">  </div>
				</div>

			</fieldset>
		 	
		 	</div>
		</div>

		<div class="row">
                              
			<div class="col-xs-6 col-sm-6 col-md-2">
				<div class="form-group control-group">
				    <div class="control">
					    <button type="submit" class="btn btn-success" tabindex="19" onclick="link_student_associate();"> Link </button>
				    </div>
				</div>
			</div>

			<div class="col-xs-6 col-sm-3 col-md-2">
				<div class="form-group control-group">
			    	<div class="control">
			    		<a href="/admin_home" class="btn btn-danger" tabindex="20"> Cancel </a>
			   		</div>
				</div>
			</div>

	    </div>
	</div>
</form>

<script src="/static/js/common/validate.js" type="text/javascript"></script>
*/ ?>