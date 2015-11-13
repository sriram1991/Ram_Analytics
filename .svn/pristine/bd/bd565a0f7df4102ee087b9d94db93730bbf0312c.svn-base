    <div class="sometype"> <br>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary"  onclick="tableToExcel('parents_list','W3C Example Table','ask_analytics_report.xlsx')">Download</button>        
            <a id="dlink"  style="display:none;"></a> 
        </div>
    </div>
    <br>

    <div class="box">
             
        <div class="box-body table-responsive">
            <table id="parents_list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL.NO</th>
                        <th>User Name</th>
                        <th>Course Name</th>
                        <th>Assesment Name</th>
                        <th>Test Date</th>
                        <th>Total Marks</th>
                        <th>Score</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $count = 1;
                    if(isset($parents_details)){
                        foreach ($parents_details as $res) {
                            echo "<tr>";
                            echo "<td>".$count++."</td>";
                            echo "<td>".$res->user_fname."</td>";
                            echo "<td>".$res->course_name."</td>";
                            echo "<td>".$res->test_name."</td>";
                            echo "<td>".$res->test_date."</td>";
                            echo "<td>".($res->no_of_questions*4)."</td>";
                            echo "<td>".$res->test_score."</td>";
                            echo "<td>".$res->test_percentage."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL.NO</th>
                        <th>User Name</th>
                        <th>Course Name</th>
                        <th>Assesment Name</th>
                        <th>Test Date</th>
                        <th>Total Marks</th>
                        <th>Score</th>
                        <th>Percentage</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="text/javascript">

        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,', 
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>', 
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }, format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
            return function(table, name, filename) {
                if (!table.nodeType)
                table = document.getElementById(table);
                        var x = "<?php echo $count; ?>";
                        if(x == 1){
                            alert('No data to Download');
                            return false;
                        }

                        var cln=table.cloneNode(true);
                        var paras = cln.getElementsByClassName('ignore');
                      
                        while(paras[0]) {
                            paras[0].parentNode.removeChild(paras[0]);
                        }

                        var ctx = {
                            worksheet : name || 'Worksheet',
                            table : cln.innerHTML
                        }            
                        
                        document.getElementById("dlink").href = uri + base64(format(template, ctx));
                        document.getElementById("dlink").download = filename;
                        document.getElementById("dlink").click();
                                  
            }

        })();
    </script>