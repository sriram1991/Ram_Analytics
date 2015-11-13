    <div class="sometype"> <br>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary"  onclick="tableToExcel('associate_list','Skol Table','Email_not_verified_SPOC_report.xlsx')">Download</button>        
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
                    if(isset($not_varified_associates_details)){
                        foreach ($not_varified_associates_details as $res) {
                            echo "<tr>";
                            echo "<td>".$count++."</td>";
                            echo "<td>".$res->registration_no."</td>";
                            echo "<td>".$res->user_fname."</td>";
                            echo "<td>".$res->user_email."</td>";
                            echo "<td>".$res->user_phone."</td>";
                            echo "<td><small class='badge ".bgcolor($res->status_name)."'>".$res->status_name."</small></td>";
                            echo "</tr>";
                        }
                    }

                    function bgcolor($value)
                    {
                        switch ($value) {
                            case 'Active':
                                return 'bg-green';
                                break;
                            case 'Paid':
                                return 'bg-green';
                                break;
                            case 'Pending Payment':
                                return 'bg-yellow';
                                break;
                            case 'Email Not Verified':
                                return 'bg-yellow';
                                break;
                            case 'Inactive':
                                return 'bg-red';
                                break;
                            default:
                                return '';
                                break;
                        }
                    }
                    ?>
                </tbody>
             <!--    <tfoot>
                    <tr>
                        <th>SL.NO</th>
                        <th>Registration NO</th>
                        <th>Associate Name</th>
                        <th>Associate Email</th>
                        <th>Associate Phone</th>
                        <th>Status</th>
                    </tr>
                </tfoot> -->
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

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