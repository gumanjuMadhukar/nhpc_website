<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PROJECT
 *
 * @package         PROJECT
 * @author          <AUTHOR_NAME>
 * @copyright       Copyright (c) 2016
 */

// ---------------------------------------------------------------------------

/**
 * Pages
 *
 * Extends the Public_Controller class
 * 
 */

class Pages extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Pages');

        $this->load->model('pages/page_model');
        $this->lang->load('pages/page');
    }

    public function index($id)
	{
		// Display Page
		$data['header'] = lang('pages');
		$data['page'] = $this->config->item('template_public') . "page/index";
		$data['pages'] = $this->page_model->find_all(array('id'=>$id));

		if($data['pages'][0]->name == 'Functions')
		{
			$data['pages'][0]->parent = 'ABOUT US';
		}
		if($data['pages'][0]->name == 'Act and Formation')
		{
			$data['pages'][0]->parent = 'ABOUT US';
			$data['pages'][0]->name = 'Act & Foundation';
		}
		if($data['pages'][0]->name == 'License Renewal')
		{
			$data['pages'][0]->parent = 'LICENSE RENEWAL';
		}
		if($data['pages'][0]->name == 'Code Of Ethics')
		{
			$data['pages'][0]->parent = 'COE';
			$data['pages'][0]->name = 'Code of Ethics';
		}
		if($data['pages'][0]->name == 'Registration For Institutions')
		{
			$data['pages'][0]->parent = 'REGISTRATION';
			$data['pages'][0]->name = 'For Institutions';
		}
		if($data['pages'][0]->name == 'Registration For Health Professionals')
		{
			$data['pages'][0]->parent = 'REGISTRATION';
			$data['pages'][0]->name = 'For Health Professional';
		}
		// echo '<pre>';
		// print_r($data);
		// exit;
		$data['module'] = 'pages';
		$this->load->view($this->_container,$data);
	}
}