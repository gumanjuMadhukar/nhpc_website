<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <p class="navbar-brand-logo" ><?php echo config_item('site_name_short') ?></p>
            <span class="navbar-brand-text hidden-xs-down"><?php echo config_item('site_name') ?></span>
        </div>
        
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
       
        <!-- End Navbar Toolbar -->
  
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
                aria-expanded="false" role="button">
                  <span><?php echo $this->session->userdata('username'); ?></span>
                
              </a>
              <div class="dropdown-menu" role="menu">
                
                <a href="<?php echo site_url('admin/account/change_password'); ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem">Change Password</a>
                <a href="<?php echo site_url('logout'); ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem">Logout</a>
              </div>
            </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
  
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
</nav>