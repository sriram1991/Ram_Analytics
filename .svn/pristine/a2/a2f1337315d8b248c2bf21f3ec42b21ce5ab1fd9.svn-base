<style type="text/css">
     #pdf { height: 100%; width:100%; }
     /*#alink { text-decoration: none; }*/
     #myframe { height: 600px; width: 200%; display: inline-block; }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h4>PDF View<small><?php if(isset($assessment_details)) echo $assessment_details['test_name']; ?></small></h4>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<?php 
            $pageno = 1; 
            if(isset($assessment_details)){
              $view_pdf = $assessment_details['upload_ques_paper'];
            }
          ?>
          <div id="pdf" class="hidden-xs">
            <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html"  onLoad="view_ass_pdf('<?php if(isset($assessment_details)) echo $view_pdf;?>');"></iframe>
          </div>
		
	</div>
</section>

<script type="text/javascript">
function view_ass_pdf(mypath){
        document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/questions/'+mypath);
        console.log(" open node pdf called "+mypath);
    }
</script>

