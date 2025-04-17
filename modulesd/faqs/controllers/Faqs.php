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
 * Faqs
 *
 * Extends the Public_Controller class
 * 
 */

class Faqs extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Faqs');

        $this->load->model('faqs/faq_model');
        $this->lang->load('faqs/faq');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('faqs');
		$data['page'] = $this->config->item('template_public') . "faqs/index";
		$data['module'] = 'faqs';
		$data['faqs'] = $this->faq_model->find_all();
		$this->load->view($this->_container,$data);
	}
}