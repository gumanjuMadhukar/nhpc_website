<?php

class AdminDatabase extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		set_time_limit(0);
		// $this->bep_assets->load_asset_group('FILETREE');
	}
	
	public function index()
	{

		$data['tables'] = $this->db->list_tables();

		// $data['header'] = 'Code Editor';
		$data['header'] = "Database";
		$data['page'] = $this->config->item('template_admin')  . 'index';
		// $data['module'] = 'codes';
		$data['module'] = 'database';
	
		$this->load->view($this->_container, $data);

		// $data['page'] = $this->config->item('template_admin') . 'feditor/index';
		// $this->load->view($this->_container,$data);
	}

	public function get_table()
	{
		$data['table'] = $this->input->post('table');
		// $data['structures'] = $this->db->list_fields($data['table']);
		$data['structures'] = $this->db->field_data($data['table']);

		// exit;

		$data['module'] = 'database';
		$this->load->view('admin/table',$data);
	}

	public function table_data_json($table)
	{
		$where = array();
		$params = $this->input->post(); 
		$data['table'] = $table;
		// $data['limit'] = $this->input->post('limit');
		// print_r($data);

		// if($data['limit']){
			// $this->db->limit($data['limit']);
		// }

		$total=count($this->db->get($table)->result_array());
		$filter_total=count($this->db->get($table)->result_array());
		$this->db->limit($params['length'],$params['start']);

		if(count($params['columns']) > $params['order'][0]['column'] + 1){
			$this->db->order_by($params['order'][0]['column'] + 1 ." ".$params['order'][0]['dir']);
		}

		$rows = $this->db->get($data['table'])->result_array();
		// print_r($)
		// echo $this->db->last_query();

		echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
		// echo json_encode($data['records']);
		exit;

		$total=$this->gateway_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->gateway_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->gateway_model->find_all($where);
		$rows = json_decode(json_encode($rows),TRUE);

		echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
	}

	// delect table data
	public function delete_record()
	{
		$where['id'] = $this->input->post('id');
		$table = $this->input->post('table');

		$success = $this->db->delete($table,$where);

		if($success){
			$msg = false;
		}else{
			$msg = 'error occured';
		}

		echo json_encode(array('success'=>$success,'msg'=>$msg));
	}

	public function save()
	{
		// echo '<pre>';
		// print_r($this->input->post());
		$inputs = $this->input->post();
		$table = $inputs['database_table_name'];
		$primary_key = $inputs['database_primary_key'];
		// removing table name and empty fields
		unset($inputs['database_table_name']);
		unset($inputs['database_primary_key']);
		$inputs = array_filter($inputs);

		if(array_key_exists($primary_key, $inputs)){
			// update data
			$this->db->where($primary_key,$inputs[$primary_key]);
			$success = $this->db->update($table,$inputs);
		}else{
			$success = $this->db->insert($table,$inputs);
		}

		if($success){
			$success = TRUE;
			$msg = FALSE;
		}else{
			$success = FALSE;
			$msg = 'error occured';
		}
		echo json_encode(array('success' => $success, 'msg' => $msg));
		exit;

	}

	public function get_table_form()
	{
		$data['table_name'] = $this->input->post('table');
		// $data['table_name'] = 'mst_gateways';

		$data['structures'] = array();
		if($data['table_name']){
			$data['structures'] = $this->db->field_data($data['table_name']);
		}
		// echo '<pre>';
		// print_r($data['structures']);exit;

		$this->load->view('admin/table_form',$data);
	}

	public function save_table()
	{
		print_r($this->input->post());
	}

}