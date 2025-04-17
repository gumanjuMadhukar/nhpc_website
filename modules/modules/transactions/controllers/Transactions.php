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
 * Extends the Public_Controller class
 * 
 */

class Transactions extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Transactions');

        $this->load->model('transactions/transaction_model');
        $this->load->model('gateways/gateway_model');
        $this->lang->load('transactions/transaction');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('transactions');
		$data['page'] = "transction/index";
		$data['module'] = 'transactions';
		$this->load->view($this->_container,$data);
	}

	/*
	*
	* select the payment module and initilize it
	*
	*/
	public function step_1()
	{
		$payment_type = $this->input->post('gateway');
		$where['id'] = $this->input->post('gateway_id');
		$merchant_detail = $this->gateway_model->find($where);

		$this->load->library('payment_gateway/'.$payment_type);
		
		$payment_info = $this->input->post();
		$this->$payment_type->initilize($payment_info,$merchant_detail);

	}

	public function fonepay_return_url($gateway_id)
	{
		$response = $this->input->get();
		$where_gateway['id'] = $gateway_id;
		$merchant_detail = $this->gateway_model->find($where_gateway);
		// echo '<pre>';
		// var_dump($response);
		$where['prn'] = $response['PRN'];
		$db_data = $this->transaction_model->find($where);

		$data['bid'] = $response['BID'];
		$data['uid'] = $response['UID'];
		$data['bc'] = $response['BC'];
		$data['ini'] = $response['INI'];
		// print_r($data);

		$success = $this->db->update($this->transaction_model->table,$data,array('id'=>$db_data->id));
		// echo $this->db->last_query();


		$PID = $merchant_detail->test_merchant_id;//'XRORSU';
		$sharedSecretKey = $merchant_detail->test_secretkey;//
		'f9b69f4efd2641a8979df5c7a46c941a';
		$requestData = [
		 	'PRN' => $response['PRN'],
		 	'PID' => $PID,
		 	'BID' => $response['BID'],
		 	'AMT' => $db_data->amt, // original payment amount
		 	'UID' => $response['UID'],
		 	'DV' => hash_hmac('sha512',$PID.','.$db_data->amt.','.$response['PRN'].','.$response['BID'].','.$response['UID'],$sharedSecretKey),
		];
		// for test server
		$verifyDevUrl ='https://dev-clientapi.fonepay.com/api/merchantRequest/verificationMerchant';
		// for live server
		$verifyLiveUrl = 'https://clientapi.fonepay.com/api/merchantRequest/verificationMerchant';
		// $verifyLiveUrl = site_url('transactions/json');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$verifyLiveUrl.'?'.http_build_query($requestData));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$responseXML = curl_exec($ch);
		if (curl_errno($ch)) {
			echo curl_error($ch);
		}

		if($verification_response = simplexml_load_string($responseXML)){
	 		$verify_data = array('status' => strtoupper($verification_response->response_code));
	 		$this->db->update($this->transaction_model->table,$verify_data,array('id'=>$db_data->id));
		 	if($verification_response->success == 'true'){
		 		echo "Payment Verifcation Completed: ".$verification_response->response_code;
		 		// call recharge api
		 	}else{
		 		$data['message'] = $verification_response->message;
		 		// echo $data['message'];
		 		// call error page

		 		// Display Page
				$data['header'] = 'Home';
				$data['page'] = "home/index";
				$where = array('status' => 1);
				$data['gateways'] = $this->gateway_model->find_All($where);
				// $data['module'] = 'transactions';
				$this->load->view($this->_container,$data);
		 	}
		}
	}
}