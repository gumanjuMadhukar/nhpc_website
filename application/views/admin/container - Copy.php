<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/adminlte.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/__old/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/nepali.datepicker.v2.2.min.css" >
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap-datetimepicker.min.css">
   
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/custom.css">
    <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <?php print $this->load->view($this->config->item('template_admin') . 'header');?>
    <?php print $this->load->view($this->config->item('template_admin') . 'menu');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php print displayStatus();?>
        <?php print $this->load->view($this->config->item('template_admin') . 'content');?>
    </div>
    <!-- /.content-wrapper -->
    <?php print $this->load->view($this->config->item('template_admin') . 'footer');?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets') ?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url('assets') ?>/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- <script src="<?php echo base_url('assets') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script> -->
<!-- <script src="<?php echo base_url('assets') ?>/vendor/jquery-wizard/jquery-wizard.js"></script> -->
<script src="<?php echo base_url('assets') ?>/vendor/formvalidation/formValidation.js"></script>
<script src="<?php echo base_url('assets') ?>/vendor/formvalidation/framework/bootstrap.js"></script>
<!-- <script src="<?php echo base_url('assets') ?>/vendor/jquery-steps-master/build/jquery.steps.min.js"></script> -->
<script src="<?php echo base_url('assets') ?>/js/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.ajaxuploader.js"></script>
<script src="<?php echo base_url('assets') ?>/js/project.js"></script>
<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/nepali.datepicker.v2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()."assets/ckeditor/ckeditor.js" ;?>"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</body>
</html>
