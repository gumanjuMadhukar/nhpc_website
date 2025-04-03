<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PROJECT
 *
 * PACKAGE DESCRIPTION
 *
 * @package         PROJECT
 * @author          <AUTHOR_NAME>
 * @copyright       Copyright (c) 2016
 */

// ---------------------------------------------------------------------------

/** @defgroup module_project_controller Project Controller Module
 * \brief Master Module for Project Controller
 * \details This module is used for managing data as master records for taxable and non taxable item of different project controller
 */

/**
 * @addtogroup module_project_controller 
 * @{
 */

/**
 * \class Project Controller
 * \brief Controller Class for managing master items of different project controller 
 */

/**
 *@}
 */

class Project_Controller extends Admin_Controller {

    /**
    *
    * Constructor of Project_Contoller Controller
    *
    * @access  public
    * @param   null
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    *
    * Search in index page
    *
    * @access  public
    * @param   null
    * @return  null
    */
    public function _get_search_param()
    {
        //search_params helper (project_helper);
        search_params();
    }

    public function get_groups_combo_json() 
    {
        $this->load->model('groups/group_model');

        // $this->db->where_not_in('id', array(1,2));
        $current_user_groups = $this->aauth->get_user_groups();
        if(isset($current_user_groups[1])) {
            $this->db->where('id >', $current_user_groups[1]->group_id);
        }

        $this->group_model->order_by('group_name asc');
        
        $rows=$this->group_model->find_all(null, array('id','group_name'));

        array_unshift($rows, array('id' => '0', 'name' => 'Select Group'));

        echo json_encode($rows);
        exit;
    }

    public function check_duplicate() 
    {
        list($module, $model) = explode("/", $this->input->post('model'));
        $field = $this->input->post('field');
        $value = $this->input->post('value');
        
        $this->db->where($field, $value);

        $this->load->model($this->input->post('model'));

        if ($this->input->post('id')) {
            $this->db->where('id <>', $this->input->post('id'));
        }

        $total=$this->$model->find_count();

        if ($total == 0) 
            echo json_encode(array('success' => true));
        else
            echo json_encode(array('success' => false));
    }
    protected function paginationStylesheet()
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '&lt;&lt;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="prev"><span>';
        $config['prev_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li class="next"><span>';
        $config['next_tag_close'] = '</span></li>';

        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        return $config;
    }

    public function get_english_date()
    {
        $nepali_date = null;
        
        if ($this->input->post('nepali_date')) {
            $nepali_date = $this->input->post('nepali_date');
        }
        
        //HELPER FUNCTION
        get_english_date($nepali_date);
    }

    /**
    *
    * Convert  English Date into Nepali Date
    *
    * @access  public
    * @param   null
    * @return  null
    */

     public function get_nepali_date($english_date = NULL)
     {
        // $english_date = null;
        
        if ($this->input->post('english_date')) {
            $english_date = $this->input->post('english_date');
        }
        
        //HELPER FUNCTION
        get_nepali_date($english_date);
    }
    
    public function nepali_month_detail($english_date)
    {
        // $english_date = null;
        
        if ($this->input->post('english_date')) {
            $english_date = $this->input->post('english_date');
        }
        
        //HELPER FUNCTION
        nepali_month_detail($english_date);
    }
}