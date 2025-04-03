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
 * Popups
 *
 * Extends the Public_Controller class
 * 
 */

class Popups extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Popups');

        $this->load->model('popups/popup_model');
        $this->lang->load('popups/popup');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('popups');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'popups';
		$this->load->view($this->_container,$data);
	}
}