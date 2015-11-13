<style type="text/css">
     #pdf { height: 100%; width:100%; }
     /*#alink { text-decoration: none; }*/
     #myframe { height: 600px; width: 200%; display: inline-block; }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h4>PDF View<small><?php if(isset($resource_details)) echo $resource_details['resource_name']; ?></small></h4>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<?php 
            $pageno = 1; 
            if(isset($resource_details)){
              $view_pdf = $resource_details['resource_link'];
            }
          ?>
          <div id="pdf" class="hidden-xs">
            <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html"  onLoad="view_pdf_content('<?php if(isset($resource_details)) echo $view_pdf;?>');"></iframe>
          </div>
		
	</div>
</section>

<script type="text/javascript">
function view_pdf_content(mypath){
        document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/pdf/'+mypath);
        console.log(" open node pdf called "+mypath);
        
    }
</script>

