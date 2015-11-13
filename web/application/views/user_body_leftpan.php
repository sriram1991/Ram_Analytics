<!-- Admin Page Left Side Bar -->
<div class="treedata">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <!-- <img src="/static/theme/img/avatar5.png" class="img-circle" alt="User Image" /> -->
                    <img src="<?php if($data['user_photo'] != 'NULL' ) echo '/static/img/user_photo/'.$data['user_photo']; else echo '/static/img/user_photo/default_photo.png'; ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo $data['user_fname']." ".$data['user_lname']." "; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i>Active</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php $this->load->view($role_view) ?>
        </section>
        <!-- /.sidebar -->
    </aside>
</div><!-- Tree Data -->
