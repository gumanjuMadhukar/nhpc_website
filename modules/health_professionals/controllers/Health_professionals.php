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
 * Health_professionals
 *
 * Extends the Public_Controller class
 * 
 */

class Health_professionals extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Health Professionals');

        $this->load->model('health_professionals/health_professional_model');
        $this->lang->load('health_professionals/health_professional');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('health_professionals');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'health_professionals';
		$this->load->view($this->_container,$data);
	}
}