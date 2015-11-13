    <ul class="sidebar-menu">

        <li>
            <a href="#" onClick="open_parent_dashboard();">
                    <i class="fa icon-device-desktop text-white"></i> 
                    <span>Dashboard</span> 
                    <!-- <small class="badge pull-right bg-green">new</small> -->
            </a>
        </li>

        <li>
            <a href="#" onClick="child_of_parents();">
                
                    <i class="fa icon-sitemap"></i> 
                    <span>User Details</span> 
                    <!-- <small class="badge pull-right bg-green">new</small> -->
                
            </a>
        </li>

    </ul>
    <script type="text/javascript">
        $(document).ready(function(){
            open_parent_dashboard();
        });
    </script>