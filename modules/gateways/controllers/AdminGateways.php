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
 * Gateways
 *
 * Extends the Project_Controller class
 * 
 */

class AdminGateways extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Gateways');

        $this->load->model('gateways/gateway_model');
        $this->lang->load('gateways/gateway');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('gateways');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'gateways';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 
		// echo '<pre>';
		// print_r($params);

		$total=$this->gateway_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->gateway_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->gateway_model->find_all($where);
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
			// $this->db->or_where('mst_gateways.id', $params['search']['value']);
			$this->db->or_like('mst_gateways.name', $params['search']['value']);
			$this->db->or_like('mst_gateways.live_merchant_id', $params['search']['value']);
			$this->db->or_like('mst_gateways.test_merchant_id', $params['search']['value']);
			$this->db->or_like('mst_gateways.live_secretkey', $params['search']['value']);
			$this->db->or_like('mst_gateways.test_secretkey', $params['search']['value']);
			$this->db->or_where('mst_gateways.status', $params['search']['value']);

			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->gateway_model->insert($data);
        }
        else
        {
            $success=$this->gateway_model->update($data['id'],$data);
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
		$data['image'] = $this->input->post('image');
		$data['live_merchant_id'] = $this->input->post('live_merchant_id');
		$data['test_merchant_id'] = $this->input->post('test_merchant_id');
		$data['live_secretkey'] = $this->input->post('live_secretkey');
		$data['test_secretkey'] = $this->input->post('test_secretkey');
		$data['status'] = $this->input->post('status');

        return $data;
   	}

   	public function upload()
   	{
   		$config['upload_path']="./uploads/gateways";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload()){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name']; 

            $config['image_library'] = 'gd2';
            $config['new_image'] = './uploads/gateways/thumbs/'.$image;
			$config['source_image'] = './uploads/gateways/'.$image;
			// $config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 100;
			$config['height']        = 100;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
             
            // $result= $this->upload_model->save_upload($title,$image);
            echo json_encode(array('file_name'=>$image, 'error'=>NULL));
        }else{
        	echo json_encode(array('error'=>$this->upload->display_errors()));
        }
   	}
}