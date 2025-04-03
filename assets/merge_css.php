<?php
$css = array(
	'css/bootstrap.min',
	'css/bootstrap-extend.min',
	'css/thestyle',
	'assets/css/site.min',	
	// 'startmin',

	'vendor/animsition/animsition',
	'vendor/asscrollable/asScrollable',
	'vendor/switchery/switchery',
	'vendor/intro-js/introjs',
	'vendor/slidepanel/slidePanel',
	'vendor/jquery-mmenu/jquery-mmenu',
	'vendor/flag-icon-css/flag-icon',
	// 'vendor/waves/waves',
	'vendor/chartist/chartist',
	'vendor/jvectormap/jquery-jvectormap',
	'assets/examples/css/dashboard/v1',
	'fonts/web-icons/web-icons.min',
	'fonts/material-design/material-design.min',
	'fonts/brand-icons/brand-icons.min',
	'vendor/datatables.net-bs4/dataTables.bootstrap4',
	'vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4',
	'vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4',
	'vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4',
	'vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4',
	'vendor/datatables.net-select-bs4/dataTables.select.bootstrap4',
	'vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4',
	'vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4',
	'assets/examples/css/tables/datatable.min',
	'assets/examples/css/tables/dataTables.bootstrap4',
	
);

$c = '';
$dir = dirname(__FILE__);
foreach ($css as $f) {
	$c .= file_get_contents($dir. "/" . $f.'.css');
	//print $c;
}

$h = fopen($dir .'/all.css', 'w');
fwrite($h, $c);
fclose($h);