<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo config_item('site_name_short') ?> | <?php echo $header?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/adminlte.min.css">


  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/select2/css/select2.min.css">

<!-- jQuery -->
<script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php print $this->load->view($this->config->item('template_admin') . 'header');?>
  
    <?php print $this->load->view($this->config->item('template_admin') . 'menu');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <?php print displayStatus();?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $header?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $header?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?php print $this->load->view($this->config->item('template_admin') . 'content');?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php print $this->load->view($this->config->item('template_admin') . 'footer');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets') ?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets') ?>/js/demo.js"></script>


<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?php echo base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>

<script src="<?php echo base_url('assets') ?>/vendor/formvalidation/formValidation.js"></script>
<script src="<?php echo base_url('assets') ?>/vendor/formvalidation/framework/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.ajaxuploader.js"></script>
<script src="<?php echo base_url('assets') ?>/js/project.js"></script>

<script src="<?php echo base_url('assets') ?>/js/nepali.datepicker.v2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?php echo base_url()."assets/plugins/ckeditor/ckeditor.js" ;?>"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</body>
</html>
