        <div class="sometype"> <br>
            <div class="btn-group" role="group"> 
                <button type="button" class="btn btn-primary"  onclick="tableToExcel1('associate_list','Skol Table','SPOC_payment_report.xlsx')">Download</button>        
                <a id="dlink"  style="display:none;"></a> 
            </div>
        </div>  <br>

        <div class="box">
                      
            <div class="box-body table-responsive">

                <table id="associate_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Registration NO</th>
                            <th>SPOC Name</th>
                            <th>SPOC Email</th>
                            <th>SPOC Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php  $count = 1;
                            if(isset($associates)){
                                foreach ($associates as $res) {
                                    echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$res->registration_no."</td>";
                                        echo "<td>".$res->user_fname."</td>";
                                        echo "<td>".$res->user_email."</td>";
                                        echo "<td>".$res->user_phone."</td>";
                                        echo "<td><small class='badge ".bgcolor($res->payment_status)."'>".status($res->payment_status)."</small></td>";
                                    echo "</tr>";
                                }
                            }

                            function bgcolor($value)
                            {
                                switch ($value) {
                                    case '2':
                                        return 'bg-green';
                                        break;
                                    case '8':
                                        return 'bg-yellow';
                                        break;
                                    case '3':
                                        return 'bg-red';
                                        break;
                                    default:
                                        return '';
                                        break;
                                }
                            }
                            function status($value){
                                switch ($value) {
                                    case '2':
                                        return 'Paid';
                                        break;
                                    case '8':
                                        return 'Payment Not Verified';
                                        break;
                                    case '3':
                                        return 'Not Paid';
                                        break;
                                    default:
                                        return '';
                                        break;
                                }   
                            }
                            ?>
                    </tbody>

                </table>
            </div>
        </div>

<script type="text/javascript">

     var tableToExcel1 = (function() {
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