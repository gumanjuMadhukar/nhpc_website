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
 * District_mvs
 *
 * Extends the Public_Controller class
 * 
 */

class District_mvs extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('District Mvs');

        $this->load->model('district_mvs/district_mv_model');
        $this->lang->load('district_mvs/district_mv');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('district_mvs');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'district_mvs';
		$this->load->view($this->_container,$data);
	}
}