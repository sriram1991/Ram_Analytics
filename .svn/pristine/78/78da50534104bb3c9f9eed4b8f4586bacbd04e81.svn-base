<style type="text/css">
.error{
	color: red !important;
}
.success{
	color: green !important;
}
</style>

<form method="POST" action="#" name="AnsKeyForm" id="AnsKeyForm" role="form">
	<div class="panel panel-info">
        	<div class="panel-heading">
        		<div class="panel-title">
        			<div class="row">
        					<?php 
        						// Answer KEY's 
        						if($assessment_detail['answer_key'] != null){
        							$answer_keys = explode(',', $assessment_detail['answer_key']);	
        						}
        					?>
		                    <div class="col-xs-12 col-sm-4 col-md-4"><label><?php echo "Test No : ".$assessment_detail['test_no']; ?></label></div>
		                    <div class="col-xs-12 col-sm-4 col-md-4"><label><?php echo "Test Name : ".$assessment_detail['test_name']; ?></label></div>
		                    <div class="col-xs-12 col-sm-4 col-md-4"><label><?php echo "No of Questions : ".$assessment_detail['no_of_questions']; ?></label></div>
					</div>
				</div>
			</div>
		
		<div class="panel-body">
			<table>

			<?php  
			   
				//echo "<table>";
				$cnt=0;
				while($cnt<$assessment_detail['no_of_questions']){
					echo "<tr>";  
					for($i=1; $i<=10; $i++){
						if(isset($answer_keys)){
								echo "<td align='middle' style='height: 40px; width:30px;' ><label style='line-height:10px;' >".($cnt+1)."</label></td><td style='height: 40px; width:30px;'> <input name='data[".$cnt."]' maxlength='1' type='number' id='ans".$cnt."'  size='1' max='4' min='1'  style='width:50px;' value='".$answer_keys[$cnt]."' tabindex='".($cnt+1)."'></td>";
							} else {
								echo "<td align='middle' style='height: 40px; width:30px;' ><label style='line-height:10px;' >".($cnt+1)."</label> </td><td style='height: 40px; width:30px;'><input name='data[".$cnt."]' maxlength='1' type='number' id='ans".$cnt."'  size='1' max='4' min='1'  style='width:50px;' value='' tabindex='".($cnt+1)."'></td>";
							}
							$cnt++;
							if($cnt+1>$assessment_detail['no_of_questions']) break;
					}
					echo "</tr>";  
				}
				//for($i=1; $i <= $assessment_detail['no_of_questions']; $i++) {
					//if($i%9 == 0){
						//echo "<tr>";
				//		if(isset($answer_keys)){
				//			echo "<label>".$i."</label> <input name='data[".$i."]' type='number' id='ans".$i."'  size='1' max='4' min='1' required='' style='width:50px;' value='".$answer_keys[$i-1]."' tabindex='".$i."'>";
				//		} else {
				//			echo "<label>".$i."</label> <input name='data[".$i."]' type='number' id='ans".$i."'  size='1' max='4' min='1' required='' style='width:50px;' value='' tabindex='".$i."'>";
				//		}
						//echo "</tr>";
					//}
					// else {
					//	echo "<tr>";
					//	if(isset($answer_keys)){
					//		echo "<td><label>".$i."</label> <input name='data[".$i."]' type='number' id='ans ".$i."'  size='1' max='4' min='1' required='' style='width:50px;' value='".$answer_keys[$i-1]."' tabindex='".$i."'></td>";	
					//	} else {
					//		echo "<td><label>".$i."</label> <input name='data[".$i."]' type='number' id='ans ".$i."'  size='1' max='4' min='1' required='' style='width:50px;' value='' tabindex='".$i."'></td>";	
					//	}
					//	echo "</tr>";
					//}	
				//}
				//echo "</table>";
			?>	
		</table>
		
		</div>

	<!--	<div class="panel-footer">
			<div class="panel-title">                                                               	
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3"><label> A=1 </label></div>	                    	
	                <div class="col-xs-12 col-sm-3 col-md-3"><label> B=2 </label></div>	                    	
		            <div class="col-xs-12 col-sm-3 col-md-3"><label> C=3 </label></div>	                    	
		            <div class="col-xs-12 col-sm-3 col-md-3"><label> D=4 </label></div>	                    	
				</div>                                                                          
			</div>
        </div> -->
        <input type="hidden" id="test_id" value="<?php echo $assessment_detail['test_id']; ?>"/>
	</div>
</form>
<script src="/static/js/common/validate.js" type="text/javascript"></script>
<script type="text/javascript">
	function collect_answer() {
		return get_answers('<?php echo $assessment_detail["no_of_questions"]; ?>');
	}
</script>