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
 * Services
 *
 * Extends the Public_Controller class
 * 
 */

class Services extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Services');

        $this->load->model('services/service_model');
        $this->lang->load('services/service');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('services');
		$data['page'] = $this->config->item('template_public') . "services/index";
		$data['module'] = 'services';
		$data['services'] = $this->service_model->find_all();
		$this->load->view($this->_container,$data);
	}
}