<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo $header . ' | ' . config_item('site_name'); ?></title>

		<link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/thestyle.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/assets/css/site.min.css">
    
        <!-- Plugins -->
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/slidepanel/slidePanel.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/jquery-mmenu/jquery-mmenu.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/assets/examples/css/dashboard/v1.css">
    
    
        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/font-awesome/font-awesome.min.css">
        
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/material-design/material-design.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/assets/examples/css/tables/datatable.min.css" >
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/assets/examples/css/tables/dataTables.bootstrap4.css" >
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/project.css" >
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/jquery-wizard/jquery-wizard.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/formvalidation/formValidation.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/jquery-steps-master\demo\css/jquery.steps.css">


		<script src="<?php echo base_url() ?>assets/vendor/breakpoints/breakpoints.js"></script>
	    <script>
	        Breakpoints();
	    </script>

	    <script src="<?php echo base_url('assets') ?>/vendor/babel-external-helpers/babel-external-helpers.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	        <![endif]-->
		<script>
			var _baseUrl = '<?php echo site_url();?>';
		</script>
	</head>
	<body class="animsition site-navbar-small dashboard">
		<?php print $this->load->view($this->config->item('template_admin') . 'header');?>
		<?php print $this->load->view($this->config->item('template_admin') . 'menu');?>
	      	<div class="page">
		    	<?php print $this->load->view($this->config->item('template_admin') . 'content');?>
	    		<!-- /.container-fluid --> 
			</div>
  		<!-- /#page-wrapper --> 
		<!-- /#wrapper --> 
		<?php print $this->load->view($this->config->item('template_admin') . 'footer');?>


		<script src="<?php echo base_url('assets') ?>/vendor/popper-js/umd/popper.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/bootstrap.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/animsition/animsition.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/asscrollbar/jquery-asScrollbar.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/asscrollable/jquery-asScrollable.js"></script>
        
        <!-- Plugins -->
        <script src="<?php echo base_url('assets') ?>/vendor/jquery-mmenu/jquery.mmenu.min.all.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/switchery/switchery.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/intro-js/intro.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/screenfull/screenfull.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/chartist/chartist.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/matchheight/jquery.matchHeight-min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/peity/jquery.peity.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jsgrid/jsgrid.js"></script>
        
        <!-- Scripts -->
        <script src="<?php echo base_url('assets') ?>/js/Component.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/select2.full.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Base.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Config.js"></script>
        
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/Menubar.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/Sidebar.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/PageAside.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/GridMenu.js"></script>
        
        <!-- Config -->
        <script src="<?php echo base_url('assets') ?>/js/config/colors.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/config/tour.js"></script>
        <script>Config.set('assets', '<?php echo base_url('assets') ?>/assets');</script>
        
        <!-- Page -->
        <script src="<?php echo base_url('assets') ?>/assets/js/Site.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/asscrollable.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/slidepanel.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/switchery.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/matchheight.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/jvectormap.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/peity.js"></script>

        <script src="<?php echo base_url('assets') ?>/assets/examples/js/dashboard/v1.js"></script>

        <script src="<?php echo base_url('assets') ?>/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/buttons.print.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jquery-wizard/jquery-wizard.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/formvalidation/formValidation.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/formvalidation/framework/bootstrap.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jquery-steps-master/build/jquery.steps.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.ajaxuploader.js"></script>
        
        <script src="<?php echo base_url('assets') ?>/js/project.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <script src="<?php echo base_url('assets') ?>/vendor/bootstrap-treeview/bootstrap-treeview.min.js"></script>

        <script src="<?php echo base_url('assets') ?>/js/Plugin/bootstrap-treeview.js"></script>
        <!-- <script src="<?php echo base_url('assets') ?>/js/code-editor.js"></script> -->
        
	</body>
</html>