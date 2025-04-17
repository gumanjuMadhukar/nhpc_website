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
 * Publications
 *
 * Extends the Public_Controller class
 * 
 */

class Publications extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Publications');

        $this->load->model('publications/publication_model');
        $this->lang->load('publications/publication');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('publications');
		$data['page'] = $this->config->item('template_public') . "publications/index";
		$data['module'] = 'publications';
		$data['publications'] = $this->publication_model->find_all();
		$this->load->view($this->_container,$data);
	}
}