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
 * Events
 *
 * Extends the Public_Controller class
 * 
 */

class Events extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Events');

        $this->load->model('events/event_model');
        $this->lang->load('events/event');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('events');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'events';
		$this->load->view($this->_container,$data);
	}
}