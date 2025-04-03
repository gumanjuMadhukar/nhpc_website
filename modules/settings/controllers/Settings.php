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
 * Settings
 *
 * Extends the Public_Controller class
 * 
 */

class Settings extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Settings');

        $this->load->model('settings/setting_model');
        $this->lang->load('settings/setting');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('settings');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'settings';
		$this->load->view($this->_container,$data);
	}
}