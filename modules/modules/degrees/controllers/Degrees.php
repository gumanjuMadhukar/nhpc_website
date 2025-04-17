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
 * Degrees
 *
 * Extends the Public_Controller class
 * 
 */

class Degrees extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Degrees');

        $this->load->model('degrees/degree_model');
        $this->load->model('health_professionals/health_professional_model');
        $this->load->model('colleges/college_model');
        $this->lang->load('degrees/degree');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('degrees');
		$data['page'] = $this->config->item('template_public') . "search/index";
		$data['degrees'] = $this->degree_model->find_all();
		$data['module'] = 'degrees';
		$this->load->view($this->_container,$data);
	}

	public function search_health_professional()
	{
		$this->health_professional_model->_table = 'view_health_professionals';
		$where = array();
		$program_id = $this->input->post('degree');
		$name = $this->input->post('professional_name');
		$where['program_id'] = $program_id;
		$this->db->or_like('view_health_professionals.full_name', $name);
		$rows=$this->health_professional_model->find_all($where,'full_name,email');
		$rows = json_decode(json_encode($rows),TRUE);
		echo json_encode($rows);
		exit;
	}

	public function search_institute()
	{
		$where = array();
		$name = $this->input->post('institution_name');
		$this->db->or_like('mst_colleges.name', $name);
		$rows=$this->college_model->find_all($where,'name');
		$rows = json_decode(json_encode($rows),TRUE);
		echo json_encode($rows);
		exit;
	}
}