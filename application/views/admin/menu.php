<!-- Main Sidebar Container -->
<?php $uri = explode("/", $this->uri->uri_string());  ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo base_url('assets') ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo config_item('site_name') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets') ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo site_url('admin') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- <?php if(control('System', FALSE)):?>
                    <?php $css = (isset($uri[2]) && in_array($uri[2], array('Users', 'Groups'))) ? 'active' : ''; ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link <?php echo $css ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                <?php echo lang('menu_system') ?>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(control('Users', FALSE)):?>
                                <?php $css = (isset($uri[2]) && $uri[2] == 'Users') ? 'active' : ''; ?> 
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/Users') ?>" class="nav-link <?php echo $css ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo lang('menu_users') ?></p>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(control('Groups', FALSE)):?>
                                <?php $css = (isset($uri[2]) && $uri[2] == 'Groups') ? 'active' : ''; ?>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/Groups') ?>" class="nav-link <?php echo $css ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo lang('menu_groups') ?></p>
                                    </a>
                                </li>
                            <?php endif;?>

                        </ul>
                    </li>
                <?php endif;?> -->
                <?php if(control('Pages', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Pages')?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Publications', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Publications')?>" class="nav-link">
                            <i class="fas fa-expand nav-icon"></i>
                            <p>Publications</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Faqs', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Faqs')?>" class="nav-link">
                            <i class="far fa-square nav-icon"></i>
                            <p>Faqs</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Staffs', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Staffs')?>" class="nav-link">
                            <i class="fal fa-eject nav-icon"></i>
                            <p>Staffs</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Boardmembers', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Boardmembers')?>" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Boardmembers</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Settings', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Settings')?>" class="nav-link">
                            <i class="fal fa-file-archive nav-icon"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Colleges', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Colleges')?>" class="nav-link">
                            <i class="fas fa-adjust nav-icon"></i>
                            <p>Colleges</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('News', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/News')?>" class="nav-link">
                            <i class="fas fa-bolt nav-icon"></i>
                            <p>News</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Photos', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Photos')?>" class="nav-link">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Photos</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Partners', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Partners')?>" class="nav-link">
                            <i class="fas fa-save nav-icon"></i>
                            <p>Partners</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Programmes', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Programmes')?>" class="nav-link">
                            <i class="fas fa-tint nav-icon"></i>
                            <p>Programmes</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Requirements', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Requirements')?>" class="nav-link">
                            <i class="fas fa-clone nav-icon"></i>
                            <p>Requirements</p>
                        </a>
                    </li>
                <?php endif;?>
                 <?php if(control('Subject Committees', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Subject_committees')?>" class="nav-link">
                            <i class="far fa-file nav-icon"></i>
                            <p>Subject Committees</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Subject Committee Types', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Subject_committee_types')?>" class="nav-link">
                            <i class="far fa-copy nav-icon"></i>
                            <p>Subject Committee Types</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Syllabuses', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Syllabuses')?>" class="nav-link">
                            <i class="far fa-folder-open nav-icon"></i>
                            <p>Syllabuses</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Events', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Events')?>" class="nav-link">
                            <i class="fal fa-sticky-note nav-icon"></i>
                            <p>Events</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Messages', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Messages')?>" class="nav-link">
                            <i class="fas fa-archive nav-icon"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Degrees', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Degrees')?>" class="nav-link">
                            <i class="fas fa-file-code nav-icon"></i>
                            <p>Degrees</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Banners', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Banners')?>" class="nav-link">
                            <i class="fas fa-file-image nav-icon"></i>
                            <p>Banners</p>
                        </a>
                    </li>
                <?php endif;?>
                <?php if(control('Expertises', FALSE)):?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Expertises')?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Experts List</p>
                        </a>
                    </li>
                <?php endif;?>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Admitcards')?>" class="nav-link">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Admit Card List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Admitcards/search')?>" class="nav-link">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Search Admit Card</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/Admitcards/voucher')?>" class="nav-link">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Re-exam Voucher</p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>