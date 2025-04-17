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
 * Provinces
 *
 * Extends the Public_Controller class
 * 
 */

class Provinces extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Provinces');

        $this->load->model('provinces/province_model');
        $this->lang->load('provinces/province');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('provinces');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'provinces';
		$this->load->view($this->_container,$data);
	}
}