<?php 

$js = array(
	'vendor/babel-external-helpers/babel-external-helpers',
	'vendor/jquery/jquery',
	// 'bootstrap.min',
	// 'metisMenu.min',
	// 'bootstrap-toggle.min',
	// /*'raphael.min',*/
	// /*'morris.min',*/
	// /*'morris-data',*/
	// 'dataTables/jquery.dataTables.min',
	// 'dataTables/dataTables.bootstrap.min',
	// 'startmin',
	// 'helper',
	// 'tagsinput',
	// 'jquery-ui',
	// 'select2.full.min',
	// 'dropzone/dropzone.min',




	'vendor/popper-js/umd/popper.min',
	'vendor/bootstrap/bootstrap',
	'vendor/animsition/animsition',
	'vendor/mousewheel/jquery.mousewheel',
	'vendor/asscrollbar/jquery-asScrollbar',
	'vendor/asscrollable/jquery-asScrollable',
	// 'vendor/waves/waves',
	'vendor/jquery-mmenu/jquery.mmenu.min.all',
	'vendor/switchery/switchery',
	'vendor/intro-js/intro',
	'vendor/screenfull/screenfull',
	'vendor/slidepanel/jquery-slidePanel',
	'vendor/chartist/chartist.min',
	'vendor/jvectormap/jquery-jvectormap.min',
	'vendor/jvectormap/maps/jquery-jvectormap-world-mill-en',
	'vendor/matchheight/jquery.matchHeight-min',
	'vendor/peity/jquery.peity.min',
	'vendor/jsgrid/jsgrid',
	'js/Component',
	'js/Plugin',
	'js/Base',
	'js/Config',
	'assets/js/Section/Menubar',
	'assets/js/Section/Sidebar',
	'assets/js/Section/PageAside',
	'assets/js/Section/GridMenu',
	'js/config/colors',
	'assets/js/config/tour',
	'assets/js/Site',

	'js/Plugin/asscrollable',
	'js/Plugin/slidepanel',
	'js/Plugin/switchery',
	'js/Plugin/matchheight',
	'js/Plugin/jvectormap',
	'js/Plugin/peity',
	'assets/examples/js/dashboard/v1',

	'jquery-datatable/jquery.dataTables',
	'jquery-datatable/skin/bootstrap/js/dataTables.bootstrap',
	'jquery-datatable/extensions/export/dataTables.buttons.min',
	'jquery-datatable/extensions/export/buttons.flash.min',
	'jquery-datatable/extensions/export/jszip.min',
	'jquery-datatable/extensions/export/pdfmake.min',
	'jquery-datatable/extensions/export/vfs_fonts',
	'jquery-datatable/extensions/export/buttons.html5.min',
	'jquery-datatable/extensions/export/buttons.print.min'
);

$c = '';
$dir = dirname(__FILE__);
foreach ($js as $f) {
	$c .= file_get_contents($dir. "/" . $f.'.js');
}

$h = fopen($dir .'/all.js', 'w');
fwrite($h, $c);
fclose($h);