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
 * District_mvs
 *
 * Extends the Project_Controller class
 * 
 */

class AdminDistrict_mvs extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('District Mvs');

        $this->load->model('district_mvs/district_mv_model');
        $this->lang->load('district_mvs/district_mv');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('district_mvs');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'district_mvs';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->district_mv_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->district_mv_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->district_mv_model->find_all($where);
		$rows = json_decode(json_encode($rows),TRUE);

		echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
		exit;
	}

	public function _get_search_params($params)
	{
		/*$where =  NULL;
		foreach ($params['columns'] as $value) {
			if($value['searchable'] == 'true'){
				if($params['search']['value'] != '')
				{
					$where .= $value["name"].' like "%'.$params['search']['value'].'%" '.' OR ';
					// $this->db->or_where(array($value["name"].' like'=>'%'.$params['search']['value'].'%'));
				}

				// if($value['search']['value'] != '')
				// {
				// 	$temp = explode(',', $value['search']['value']);
				// 	$this->db->where_in($value['name'],$temp);
				// }
			}
		}

		if($where != NULL){
			$where = preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
			$where = '('.$where.')';

		}

		return $where;   	           
		// echo '<pre>'; print_r($where); exit;*/

		if($params['search']['value'] != ''){
			$this->db->group_start();
			$this->db->or_where('mst_district_mvs.id', $params['search']['value']);
$this->db->or_where('mst_district_mvs.created_by', $params['search']['value']);
$this->db->or_where('mst_district_mvs.updated_by', $params['search']['value']);
$this->db->or_where('mst_district_mvs.deleted_by', $params['search']['value']);
$this->db->or_like('mst_district_mvs.created_at', $params['search']['value']);
$this->db->or_like('mst_district_mvs.updated_at', $params['search']['value']);
$this->db->or_like('mst_district_mvs.deleted_at', $params['search']['value']);
$this->db->or_like('mst_district_mvs.code', $params['search']['value']);
$this->db->or_like('mst_district_mvs.name', $params['search']['value']);
$this->db->or_where('mst_district_mvs.parent_id', $params['search']['value']);
$this->db->or_like('mst_district_mvs.type', $params['search']['value']);

			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->district_mv_model->insert($data);
        }
        else
        {
            $success=$this->district_mv_model->update($data['id'],$data);
        }

		if($success)
		{
			$success = TRUE;
			$msg=lang('general_success');
		}
		else
		{
			$success = FALSE;
			$msg=lang('general_failure');
		}

		 echo json_encode(array('msg'=>$msg,'success'=>$success));
		 exit;
	}

   private function _get_posted_data()
   {
   		$data=array();
   		if($this->input->post('id')) {
			$data['id'] = $this->input->post('id');
		}
		$data['created_by'] = $this->input->post('created_by');
		$data['updated_by'] = $this->input->post('updated_by');
		$data['deleted_by'] = $this->input->post('deleted_by');
		$data['created_at'] = $this->input->post('created_at');
		$data['updated_at'] = $this->input->post('updated_at');
		$data['deleted_at'] = $this->input->post('deleted_at');
		$data['code'] = $this->input->post('code');
		$data['name'] = $this->input->post('name');
		$data['parent_id'] = $this->input->post('parent_id');
		$data['type'] = $this->input->post('type');
		$data['boundary_coordinates'] = $this->input->post('boundary_coordinates');

        return $data;
   }
}