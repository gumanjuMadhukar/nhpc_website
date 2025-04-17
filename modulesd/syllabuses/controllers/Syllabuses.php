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
 * Syllabuses
 *
 * Extends the Public_Controller class
 * 
 */

class Syllabuses extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Syllabuses');

        $this->load->model('syllabuses/syllabus_model');
        $this->lang->load('syllabuses/syllabus');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('syllabuses');
		$data['page'] = $this->config->item('template_public') . "syllabuses/index";
		$data['module'] = 'syllabuses';

        $level = array(
            array('id'=>3, 'level'=> 'Master Level'),
            array('id'=>2, 'level'=> 'Bachelor Level'),
            array('id'=>1, 'level'=> 'PCL'),
        );

        foreach($level as $key => $value){
            $where = array(
                'status' => 1,
                'level' => $value['id'],
            );
            $this->db->order_by('rank','asc');
    		$data['syllabuses'][$value['level']] = $this->syllabus_model->find_all($where);
        }
		$this->load->view($this->_container,$data);
	}
}