    <style type="text/css">
    #pdf { height: 100%; width:100%; }
    #myframe { height: 750px; width: 100%; display: inline-block; }
    </style>
    <!-- Display Associate Details and Document -->
    <div class="row">     
        
        <div class="col-xs-12 col-sm-3 col-md-3">   
            <label>
            Name:<?php if(isset($user_details)) echo $user_details['user_fname']." ".$user_details['user_lname']; ?>
            </label>
        </div>
        
        <div class="col-xs-12 col-sm-4 col-md-4">   
            <label>
            Higest Degree:<?php if(isset($associate_details)) echo $associate_details['higher_education']; ?>
            </label>
        </div>
        
        <div class="col-xs-12 col-sm-5 col-md-5">   
            <label>
            Subject Expertise:<?php if(isset($associate_details)) echo $associate_details['subject_expertise']; ?>
            </label>
        </div>
        
        <input type="hidden" value="<?php echo $associate_details['user_id']; ?>" id="user_id"/>
    </div>
    <!-- PDF Document -->
    <div class="row">     
        <?php $doc_link = $associate_details['certificate_location']; ?>        
        <div class="col-xs-12 col-sm-12 col-md-12">   
            <div id="pdf">
                <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html" onLoad="open_pdf_doc('<?php if(isset($doc_link)) echo $doc_link;?>');"></iframe>
            </div>
        </div>
    
    </div>

    <script type="text/javascript">
    function open_pdf_doc(mypath){
        document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/associate_record/'+mypath);
        //console.log(" open node pdf called "+mypath+".pdf");
        setTimeout(function() { pdf_page('myframe',1); }, 1000);
        //console.log("PDF Opended "+mypath+".pdf  at seekpos "+"<?php //echo $seekpos; ?>");
    }
    </script>