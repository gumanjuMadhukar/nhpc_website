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
 * Transactions
 *
 * Extends the Project_Controller class
 * 
 */

class AdminTransactions extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Transactions');

        $this->load->model('transactions/transaction_model');
        $this->lang->load('transactions/transaction');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('transactions');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'transactions';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->transaction_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->transaction_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->transaction_model->find_all($where);
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
			$this->db->or_where('payment_transactions.id', $params['search']['value']);
$this->db->or_where('payment_transactions.created_by', $params['search']['value']);
$this->db->or_where('payment_transactions.updated_by', $params['search']['value']);
$this->db->or_where('payment_transactions.deleted_by', $params['search']['value']);
$this->db->or_like('payment_transactions.gateway', $params['search']['value']);
$this->db->or_like('payment_transactions.ru', $params['search']['value']);
$this->db->or_like('payment_transactions.pid', $params['search']['value']);
$this->db->or_like('payment_transactions.prn', $params['search']['value']);
$this->db->or_like('payment_transactions.amt', $params['search']['value']);
$this->db->or_like('payment_transactions.currency', $params['search']['value']);
$this->db->or_like('payment_transactions.time', $params['search']['value']);
$this->db->or_like('payment_transactions.R1', $params['search']['value']);
$this->db->or_like('payment_transactions.R2', $params['search']['value']);
$this->db->or_like('payment_transactions.md', $params['search']['value']);
$this->db->or_like('payment_transactions.dv', $params['search']['value']);
$this->db->or_like('payment_transactions.bc', $params['search']['value']);
$this->db->or_like('payment_transactions.ini', $params['search']['value']);
$this->db->or_like('payment_transactions.uid', $params['search']['value']);
$this->db->or_like('payment_transactions.bid', $params['search']['value']);
$this->db->or_like('payment_transactions.status', $params['search']['value']);

			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->transaction_model->insert($data);
        }
        else
        {
            $success=$this->transaction_model->update($data['id'],$data);
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
		$data['created_at'] = $this->input->post('created_at');
		$data['updated_at'] = $this->input->post('updated_at');
		$data['deleted_at'] = $this->input->post('deleted_at');
		$data['created_by'] = $this->input->post('created_by');
		$data['updated_by'] = $this->input->post('updated_by');
		$data['deleted_by'] = $this->input->post('deleted_by');
		$data['gateway'] = $this->input->post('gateway');
		$data['ru'] = $this->input->post('ru');
		$data['pid'] = $this->input->post('pid');
		$data['prn'] = $this->input->post('prn');
		$data['amt'] = $this->input->post('amt');
		$data['currency'] = $this->input->post('currency');
		$data['date'] = $this->input->post('date');
		$data['time'] = $this->input->post('time');
		$data['R1'] = $this->input->post('R1');
		$data['R2'] = $this->input->post('R2');
		$data['md'] = $this->input->post('md');
		$data['dv'] = $this->input->post('dv');
		$data['bc'] = $this->input->post('bc');
		$data['ini'] = $this->input->post('ini');
		$data['uid'] = $this->input->post('uid');
		$data['bid'] = $this->input->post('bid');
		$data['status'] = $this->input->post('status');

        return $data;
   }
}