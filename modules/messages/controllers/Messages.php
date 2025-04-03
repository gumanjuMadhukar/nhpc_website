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
 * Messages
 *
 * Extends the Public_Controller class
 * 
 */

class Messages extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Messages');

        $this->load->model('messages/message_model');
        $this->lang->load('messages/message');
    }

    public function index()
	{
        $where['id'] = $this->input->get('id');
        $data['message_detail'] = $this->message_model->find($where);

		// Display Page
		$data['header'] = lang('messages');
		$data['page'] = $this->config->item('template_public') . "message/index";
		$data['module'] = 'messages';
		$this->load->view($this->_container,$data);
	}
}