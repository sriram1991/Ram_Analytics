<style type="text/css">
    #pdf { height: 100%; width:100%; }
    /*#alink { text-decoration: none; }*/
    #myframe { height: 600px; width: 100%; display: inline-block; }
    .panel-body{ height: 500px; }
    .answer_sheet{ overflow-y: auto; height: inherit;}
</style>

<section class="content-header">
  <div id="pdf">
    <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html"  onLoad="open_syllabus_file('<?php if(isset($course_details)) echo $file_name; ?>');"></iframe>
  </div>
</section>



<script type="text/javascript">
function open_syllabus_file(mypath){
  document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/course_syllabus/'+mypath);
  console.log(" open node pdf called "+mypath);
  //     setTimeout(function() { pdf_page(<?php //echo $seekpos; ?>); }, 1000);
  //     console.log("PDF Opended "+mypath+".pdf  at seekpos "+"<?php //echo $seekpos; ?>");
}
</script>