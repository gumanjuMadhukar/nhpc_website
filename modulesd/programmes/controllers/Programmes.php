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
 * Programmes
 *
 * Extends the Public_Controller class
 * 
 */

class Programmes extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Programmes');

        $this->load->model('programmes/programme_model');
        $this->lang->load('programmes/programme');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('programmes');
		$data['page'] = $this->config->item('template_public') . "programmes/index";
		$data['module'] = 'programmes';
		$data['programmes'] = $this->programme_model->find_all();
		$this->load->view($this->_container,$data);
	}
}