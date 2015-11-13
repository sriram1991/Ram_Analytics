        </div><!-- ./wrapper -->
        
        <!-- BootStrap  -->
        <script src="/static/theme/common/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="/static/theme/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- jquery-oLoader for progressbar -->
        <script src="/static/js/jquery-oLoader/js/jquery.oLoader.min.js" type="text/javascript"></script>
        <!-- Common SKOL Script -->
        <script src="/static/js/common/skol.js" type="text/javascript"></script>

        <script type="text/javascript">
        
        // Action : open course 
        function open_course() {
            // $('#right-side-content').html("<h1> Couse Management</h1>");
            $.ajax({
                type:"GET",                                               
                url:"/resource/course_dashboard/",
                success:function(response) {
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(response);
                }           
            });
        }


        // Action : open student
        function open_student() {
            $.ajax({
                type:"GET",
                url: "/registrar/students_dashboard/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }

        // Action : Open Parent
        function open_parent() {
            $.ajax({
                type:"GET",
                url: "/registrar/parents_dashboard/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }

        // Action : open Associate 
        function open_associate() {
            $.ajax({
                type:"GET",
                url: "/registrar/associates_dashboard/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }

        // Action : open Directors     
        function open_directors() {
            $.ajax({
                type:"GET",
                url: "/admin/directors_page/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }

        // Action : open batch
        function open_batch() {
            $.ajax({
                type:"GET",                                               
                url:"/batch/batch_view",
                success:function(response) {
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(response);
                    //console.log(response);
                }           
            });
        }

        // function open_contents_ca() {
        //     $('#right-side-content').html("<h1> Content Admin Dashboard </h1>");
        // }

        function open_dashboard() {
            $.ajax({
                type:"GET",                                               
                url:"/admin/AH_Controller/admin_dashboard/",
                success:function(response) {
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(response);
                }           
            });             
        }

        function get_leftpan() {
            $.ajax({
                type:"GET",                                               
                url:"/test/get_leftpan",                        // Change the URL in production 
                success:function(response) {
                    $('#left-side-content').html("");                     
                    $('#left-side-content').html(response);
                    $(".sidebar .treeview").tree();
                }           
            });             
        }

        function get_rightpan() {
            $.ajax({
                type:"GET",                                               
                url:"/test/get_rightpan",                        // Change the URL in production 
                success:function(response) {
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(response);
                }           
            });             
        }

        function open_profile(user_id) {
            console.log('Getting profile page for user_id '+user_id);
            $.ajax({
                type:"POST",                                               
                url:"/profile",
                data: { user_id:user_id },
                success:function(response) {
                    $('#right-side-content').html("");                     
                    $('#right-side-content').html(response);
                    // console.log('Responce '+response);
                }
            });
        }
        
        function associate_report() {
            $.ajax({
                type:"GET",
                url: "/reports/associates_reports/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }    

        function student_report() {
            $.ajax({
                type:"GET",
                url: "/reports/students_reports/",
                success:function(response) {
                    $('#right-side-content').html("");
                    $('#right-side-content').html(response);
                }
            });
        }
        
        </script>
    </body>
</html>
