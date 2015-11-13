            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <!-- Dashboard -->
                <li>
                    <a href="#Dashboard" onClick="open_contents_ca();">
                        <i class="fa icon-tachometer"></i>
                        <span>Dashboard</span> 
                        <!--<small class="badge pull-right bg-green">new</small>-->
                    </a>
                </li>
                
                <!-- Content Management -->
                <li>
                    <a href="#Contents" onClick="open_content_management();">
                        <i class="fa fa-edit"></i>
                        <span>Content Management</span> 
                    </a>
                </li>
                
                <!-- Course -->
                <li>
                    <a href="#Course" onClick="open_course();">
                        <i class="fa fa-laptop"></i>
                        <span>Course Management</span> 
                    </a>
                </li>

                <!-- Mentor/SME -->
                <li>
                    <a href="#Mentor" onClick="open_directors();">
                        <i class="fa icon-male-rounded-1"></i> 
                        <span>Mentor / SMEs</span> 
                    </a>
                </li>
                
                <!-- Affilate -->
                <li>
                    <a href="#Affiliate" onClick="open_affilate();">
                        <i class="fa icon-students"></i>
                        <span>Affiliate's</span> 
                    </a>
                </li>

            </ul>
<script type="text/javascript">
$(document).ready(function(){
    open_contents_ca();
});
</script>