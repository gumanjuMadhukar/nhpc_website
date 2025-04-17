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
 * Subject_committees
 *
 * Extends the Public_Controller class
 * 
 */

class Subject_committees extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Subject Committees');

        $this->load->model('subject_committees/subject_committee_model');
        $this->load->model('subject_committee_types/subject_committee_type_model');
        $this->lang->load('subject_committees/subject_committee');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('subject_committees');
		$data['page'] = $this->config->item('template_public') . "subject_committees/index";
		$data['module'] = 'subject_committees';
		$data['subject_committee_types'] = $this->subject_committee_type_model->find_all();
		$type = array();
		$data['subject_committees'] = array();
		foreach($data['subject_committee_types']  as $k=>$v)
		{
			$type[] = $v->name;
		}
		$this->subject_committee_model->_table = 'view_subject_committee_types';
		foreach($type as $k1=>$v1)
		{
			$this->db->where('subject_committee_type_name',$v1);
			$this->db->order_by('rank');
			$data['subject_committees'][$v1] = $this->subject_committee_model->find_all();
		}
		$this->load->view($this->_container,$data);
	}
}