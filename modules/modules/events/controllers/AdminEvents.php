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
 * Events
 *
 * Extends the Project_Controller class
 * 
 */

class AdminEvents extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Events');

        $this->load->model('events/event_model');
        $this->load->model('months/month_model');
        $this->lang->load('events/event');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('events');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'events';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->event_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->event_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->event_model->find_all($where,'*',null,$this->input->post('start'),$this->input->post('length'));
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
$this->db->or_like('mst_events.name', $params['search']['value']);
			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->event_model->insert($data);
        }
        else
        {
            $success=$this->event_model->update($data['id'],$data);
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
		$data['name'] = $this->input->post('name');
		$data['description'] = $this->input->post('description');
		$data['date'] = $this->input->post('date');
		$date = explode("-",$data['date']);
		$data['year'] = $date[0];
		$data['month'] = $date[1];
		$data['day'] = $date[2];
		$where['rank'] = $date[1];
		$month_name = $this->month_model->find($where);
		$data['month_name'] = $month_name->name;
        return $data;
   }

    public function delete_json()
    {
        $id = $this->input->post('id');
        $this->event_model->delete($id[0]);
        echo json_encode(true);
    }
}