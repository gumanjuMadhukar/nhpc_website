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
 * Subject_committee_types
 *
 * Extends the Public_Controller class
 * 
 */

class Subject_committee_types extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Subject Committee Types');

        $this->load->model('subject_committee_types/subject_committee_type_model');
        $this->lang->load('subject_committee_types/subject_committee_type');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('subject_committee_types');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'subject_committee_types';
		$this->load->view($this->_container,$data);
	}
}