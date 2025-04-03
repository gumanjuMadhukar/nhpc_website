<?php $uri = explode("/", $this->uri->uri_string()); ?>
<div class="site-menubar">
    <ul class="site-menu">
        <li class="site-menu-item">
            <a class="animsition-link" href="<?php echo site_url('admin') ?>">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
            </a>
        </li>
        <?php if(control('Developer', FALSE)):?>
            <?php $css = (isset($uri[1]) && in_array($uri[1], array('feditor', 'groups'))) ? 'active' : ''; ?>
            <li class="site-menu-item has-sub <?php echo $css ?>">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon icon wb-code" aria-hidden="true"></i>
                    <span class="site-menu-title">Developer</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <?php if(control('Feditor', FALSE)):?>
                        <?php $css = (isset($uri[1]) && $uri[1] == 'feditor') ? 'class="active"' : ''; ?> 
                        <li class="site-menu-item <?php echo $css ?>">
                            <a class="animsition-link" href="<?php echo site_url('admin/Feditor') ?>">
                                <span class="site-menu-title">Editor</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php if(control('Database', FALSE)):?>
                        <?php $css = (isset($uri[1]) && $uri[1] == 'database') ? 'class="active"' : ''; ?>
                        <li class="site-menu-item <?php echo $css ?>">
                            <a class="animsition-link" href="<?php echo site_url('admin/Database') ?>">
                                <span class="site-menu-title">Database</span>
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
            </li>
        <?php endif?>
        <?php if(control('System', FALSE)):?>
            <?php $css = (isset($uri[1]) && in_array($uri[1], array('users', 'groups'))) ? 'active' : ''; ?>
            <li class="site-menu-item has-sub <?php echo $css ?>">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon icon wb-settings" aria-hidden="true"></i>
                    <span class="site-menu-title">System</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <?php if(control('Groups', FALSE)):?>
                        <?php $css = (isset($uri[1]) && $uri[1] == 'users') ? 'class="active"' : ''; ?> 
                        <li class="site-menu-item <?php echo $css ?>">
                            <a class="animsition-link" href="<?php echo site_url('admin/Users') ?>">
                                <span class="site-menu-title">Users</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php if(control('Users', FALSE)):?>
                        <?php $css = (isset($uri[1]) && $uri[1] == 'groups') ? 'class="active"' : ''; ?>
                        <li class="site-menu-item <?php echo $css ?>">
                            <a class="animsition-link" href="<?php echo site_url('admin/Groups') ?>">
                                <span class="site-menu-title">Groups</span>
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
            </li>
        <?php endif;?>
        <li class="site-menu-item">
            <a class="animsition-link" href="<?php echo site_url('admin/gateways') ?>">
                <i class="site-menu-icon wb-grid-4" aria-hidden="true"></i>
                <span class="site-menu-title">Payment Gateway Setting</span>
            </a>
        </li>
        
    </ul>
</div>    
