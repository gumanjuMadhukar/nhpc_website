<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('assets') ?>/index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo config_item('site_name_short') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/img/logo.png') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('admin')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                CMS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Pages')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Banners')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Faqs')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Partners')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Services')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Events')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Events</p>
                </a>
              </li>
            </ul>
          </li>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                About Us
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Boardmembers')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Board Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Subject_committees')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject Committees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Staffs')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staffs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Photos')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Photos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Exams
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Syllabuses')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Syllabuses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Expertises')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expertises</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Publications')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Publication
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Settings')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Colleges')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Colleges
              </p>
            </a>
          </li><li class="nav-item">
            <a href="<?php echo site_url('admin/News')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                News
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Programmes')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Programms
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Requirements')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Requirements
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Messages')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Messages From
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Degrees')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Degreees
              </p>
            </a>
          </li>
          
          <li class="nav-header">Biometrics</li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Admitcards') ?>" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Admitcard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Admitcards/search')?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Search Admitcard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Admitcards/voucher')?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Re-exam Voucher</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>