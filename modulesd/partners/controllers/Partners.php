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
 * Partners
 *
 * Extends the Public_Controller class
 * 
 */

class Partners extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	//control('Partners');

        $this->load->model('partners/partner_model');
        $this->lang->load('partners/partner');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('partners');
		$data['page'] = $this->config->item('template_public') . "partners/index";
		$data['module'] = 'partners';
		$data['partners'] = $this->partner_model->find_all();
		$this->load->view($this->_container,$data);
	}
}