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
 * Admitcards
 *
 * Extends the Public_Controller class
 * 
 */

class Admitcards extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Admitcards');

        $this->load->model('admitcards/admitcard_model');
        $this->lang->load('admitcards/admitcard');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('admitcards');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'admitcards';
		$this->load->view($this->_container,$data);
	}
}