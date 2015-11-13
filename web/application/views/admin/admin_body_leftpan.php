            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <!-- Dashboard -->
                <li>
                    <a href="#Dashboard" onClick="open_dashboard();">
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

                <!-- User -->
                <li>
                    <a href="#User" onClick="open_student();">
                        <i class="fa fa-user"></i>
                        <span>Users</span> 
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
                 
                <!-- SPOC -->
                <li>
                    <a href="#SPOC" onClick="open_associate();">
                        <i class="fa icon-broadcast"></i> 
                        <span>SPOC</span> 
                    </a>
                </li>

                <!-- Mentor -->
                <li>
                    <a href="#Mentor" onClick="open_directors();">
                        <i class="fa icon-male-rounded-1"></i> 
                        <span>Mentor/SME</span> 
                    </a>
                </li>

                <!-- Affilate -->
                <li>
                    <a href="#Affiliate" onClick="open_affilate();">
                        <i class="fa icon-students"></i>
                        <span>Affiliate's</span> 
                    </a>
                </li>

                <!-- Batches 
                <li>
                    <a href="#Batches" onClick="open_batch();">
                        <i class="fa icon-organization"></i>
                        <span>Batches</span> 
                    </a>
                </li>
                -->
                <!-- Commented as of now.Will be displayed later -->
                <!-- Promo Code adn Coupon code are same -->
                <li>
                    <a href="#Promo Code" onClick="coupon_code_dashboard();">
                        <i class="fa fa-bookmark"></i>
                        <span>Promo Code</span> 
                    </a>
                </li>

                <li>
                    <a href="#Scholarships" onClick="open_applied_scholarships();">    
                            <i class="fa fa-file-text-o"></i> 
                            <span>Scholarships</span> 
                            <!-- <small class="badge pull-right bg-green">new</small> -->
                    </a>
                </li>
                <!-- Orginization Area of interest Quote's -->
                <li>
                    <a href="#SPOC-Quotes" onClick="open_spoc_quotes_dashboard();">    
                            <i class="fa icon-students"></i> 
                            <span>SPOC Quotes</span> 
                            <!-- <small class="badge pull-right bg-green">new</small> -->
                    </a>
                </li>
                <!-- Reports -->
                <li>
                    <!-- <a href="#Reports" onClick="student_report();"> -->
                    <a href="#Reports" onClick="report_dashboard();">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Reports</span> 
                    </a>
                </li>
                <!-- Link -Unlink -->
                <li>
                    <a href="#Link-UnLink" onClick="link_unlink_associate_student();">
                        <i class="fa fa-link"></i>
                        <span>Link - Unlink</span> 
                    </a>
                </li>
                <!-- SMS Log -->
                <li>
                    <a href="#SMSLog" onClick="open_smslog_dashboard();">
                        <i class="fa fa-tasks"></i>
                        <span>SMS Logs</span> 
                    </a>
                </li>

            </ul>
<script type="text/javascript">
$(document).ready(function(){
    open_dashboard();
});
</script>