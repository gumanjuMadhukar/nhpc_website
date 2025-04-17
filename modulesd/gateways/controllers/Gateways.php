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
 * Gateways
 *
 * Extends the Public_Controller class
 * 
 */

class Gateways extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Gateways');

        $this->load->model('gateways/gateway_model');
        $this->lang->load('gateways/gateway');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('gateways');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'gateways';
		$this->load->view($this->_container,$data);
	}
}