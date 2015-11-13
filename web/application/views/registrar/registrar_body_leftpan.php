            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <!-- Dashboard -->
                <li>
                    <a href="#Dashboard" onClick="open_registrar();">
                        <i class="fa icon-tachometer"></i>
                        <span>Dashboard</span> 
                        <!--<small class="badge pull-right bg-green">new</small>-->
                    </a>
                </li>
                
                <!-- User -->
                <li>
                    <a href="#User" onClick="open_student();">
                        <i class="fa icon-students"></i>
                        <span>Users</span> 
                    </a>
                </li>

                <!-- SCholarship -->
                <li>
                    <a href="#Scholarships" onClick="open_applied_scholarships();">    
                            <i class="fa icon-students"></i> 
                            <span>Scholarships</span> 
                            <!-- <small class="badge pull-right bg-green">new</small> -->
                    </a>
                </li>

                <!-- SPOC -->
                <li>
                    <a href="#SPOC" onClick="open_associate();">
                        <i class="fa icon-broadcast"></i> 
                        <span>SPOC</span> 
                    </a>
                </li>

                <!-- Mentor/SME                 
                <li>
                    <a href="#MentorSME" onClick="open_directors();">
                        <i class="fa icon-male-rounded-1"></i> 
                        <span>Mentor/SME</span> 
                    </a>
                </li>
                -->
                
                <!-- Affilate -->
                <li>
                    <a href="#Affiliate" onClick="open_affilate();">
                        <i class="fa icon-students"></i>
                        <span>Affiliate's</span> 
                    </a>
                </li>
                

                <!-- Parents
                <li>
                    <a href="#Parents" onClick="open_parent();">
                        <i class="fa icon-users"></i>
                        <span>Parent</span> 
                    </a>
                </li>
                -->

                

                

               

            </ul>
<script type="text/javascript">
$(document).ready(function(){
    open_registrar();
});
</script>