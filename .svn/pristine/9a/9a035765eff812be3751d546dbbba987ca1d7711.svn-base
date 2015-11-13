                <style type="text/css">
                #pdf { height: 100%; width:100%; }
                /*#alink { text-decoration: none; }*/
                #myframe { height: 750px; width: 100%; display: inline-block; }
                </style>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        PDF VIEW
                        <small>Start <?php if(isset($resource_detail)) echo $resource_detail['resource_name']; ?> </small> 
                    </h1>
                    <ol class="breadcrumb">
                        <?php 
                            echo "<li><a href='#' onClick='get_student_course_tree(".$course_id."); get_student_course_modules(".$course_id.");'><i class='fa fa-dashboard'></i>".$course_name."</a></li>"; 
                            // echo "<li><a href='#' onClick='get_student_course_groups(\"$course_id\",\"$module_name\");'>".$module_name."</a></li>"; 
                            echo "<li><a href='#' onClick='get_student_course_subjects(\"$course_id\",\"$module_name\",\"$group_name\");'>".$module_name."</a></li>"; 
                            echo "<li><a href='#' onClick='get_student_cmgs_resources(\"$course_id\",\"$subject_name\");'>".$subject_name."</a></li>";
                            echo "<li class='active'>".$resource_detail['resource_name']."</li>";
                        ?>
                        
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- This is PDF view -->
                    <?php $pageno = 1; ?>
                    <div id="pdf">
                        <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html" onLoad="open_node_pdf('<?php if(isset($resource_link)) echo $resource_link;?>');"></iframe>
                    </div>


                </section><!-- /.content -->

                <script type="text/javascript">
                function open_node_pdf(mypath){
                    document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/pdf/'+mypath);
                //     console.log(" open node pdf called "+mypath+".pdf");
                //     setTimeout(function() { pdf_page(<?php //echo $seekpos; ?>); }, 1000);
                //     console.log("PDF Opended "+mypath+".pdf  at seekpos "+"<?php //echo $seekpos; ?>");
                }
                </script>