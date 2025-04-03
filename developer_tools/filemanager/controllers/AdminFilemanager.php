<?php

class AdminFilemanager extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		set_time_limit(0);
	}

	public function index()
	{
		$data['header']='File Manager';
		$data['page']= $this->config->item('template_admin') .'index';
		$data['module']='filemanager';
		$this->load->view($this->_container,$data);		
	}


}

	