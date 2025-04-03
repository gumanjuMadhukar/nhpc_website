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
 * Colleges
 *
 * Extends the Public_Controller class
 * 
 */

class Colleges extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Colleges');

        $this->load->model('colleges/college_model');
        $this->lang->load('colleges/college');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('colleges');
		$data['page'] = $this->config->item('template_public') . "colleges/index";
		$data['module'] = 'colleges';
		$this->college_model->_table = 'mst_province';
		$province = $this->college_model->find_all();
		$this->college_model->_table = 'view_college';
		foreach($province as $key => $value){
			$where = array(
                'province_id' => $value->id,
            );
			$data['colleges'][$value->name] = $this->college_model->find_all($where);
		}
		$this->load->view($this->_container,$data);
	}
}