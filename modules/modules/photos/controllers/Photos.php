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
 * Photos
 *
 * Extends the Public_Controller class
 * 
 */

class Photos extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Photos');

        $this->load->model('photos/photo_model');
        $this->lang->load('photos/photo');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('photos');
		$data['page'] = $this->config->item('template_public') . "photos/index";
		$data['module'] = 'photos';
		$data['photos'] = $this->photo_model->find_all();
		$this->load->view($this->_container,$data);
	}
}