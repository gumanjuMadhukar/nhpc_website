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
 * Staffs
 *
 * Extends the Public_Controller class
 * 
 */

class Staffs extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Staffs');

        $this->load->model('staffs/staff_model');
        $this->lang->load('staffs/staff');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('staffs');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'staffs';
		$this->load->view($this->_container,$data);
	}
}