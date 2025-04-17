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
 * Banners
 *
 * Extends the Public_Controller class
 * 
 */

class Banners extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Banners');

        $this->load->model('banners/banner_model');
        $this->lang->load('banners/banner');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('banners');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'banners';
		$this->load->view($this->_container,$data);
	}
}