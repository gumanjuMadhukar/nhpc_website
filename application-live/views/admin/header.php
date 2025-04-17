<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               <?php echo $this->session->userdata('username'); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?php echo site_url('admin/Account/change_password'); ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem">Change Password</a>
                <a href="<?php echo site_url('logout'); ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem">Logout</a>
            </div>
        </li>
       
    </ul>
</nav>
<!-- /.navbar -->