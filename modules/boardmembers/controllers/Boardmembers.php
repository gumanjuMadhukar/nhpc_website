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
 * Boardmembers
 *
 * Extends the Public_Controller class
 * 
 */

class Boardmembers extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Boardmembers');

        $this->load->model('boardmembers/boardmember_model');
        $this->load->model('staffs/staff_model');
        $this->lang->load('boardmembers/boardmember');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('boardmembers');
		$data['page'] = $this->config->item('template_public') . "boardmembers/index";
		$data['module'] = 'boardmembers';
        $this->db->order_by('rank');
		$data['boardmembers'] = $this->boardmember_model->find_all();
		$data['staffs'] = $this->staff_model->find_all();
		$this->load->view($this->_container,$data);
	}
}