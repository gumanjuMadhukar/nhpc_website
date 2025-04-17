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
 * Months
 *
 * Extends the Public_Controller class
 * 
 */

class Months extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Months');

        $this->load->model('months/month_model');
        $this->lang->load('months/month');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('months');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'months';
		$this->load->view($this->_container,$data);
	}
}