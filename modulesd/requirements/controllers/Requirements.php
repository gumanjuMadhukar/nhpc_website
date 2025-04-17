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
 * Requirements
 *
 * Extends the Public_Controller class
 * 
 */

class Requirements extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Requirements');

        $this->load->model('requirements/requirement_model');
        $this->lang->load('requirements/requirement');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('requirements');
		$data['page'] = $this->config->item('template_public') . "requirements/index";
		$data['module'] = 'requirements';
		// $data['requirements'] = $this->requirement_model->find_all();

        $level = array(
            array('id'=>3, 'level'=> 'Masters'),
            array('id'=>2, 'level'=> 'Bachelors'),
            array('id'=>1, 'level'=> 'PCL'),
        );

        foreach($level as $key => $value){
            $where = array(
                'level_id' => $value['id'],
            );
            $this->db->order_by('rank','asc');
            $data['requirements'][$value['level']] = $this->requirement_model->find_all($where);
        }

		$this->load->view($this->_container,$data);
	}
}