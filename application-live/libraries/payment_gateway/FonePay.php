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
* Project
*
*/
class FonePay {

    public $CI;

    public $merchant_id = NULL;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->load->model('transactions/transaction_model');
    }

    public function initilize($payment_info,$merchant_detail)
    {
    	$data['AMT'] = $db_data['amt'] = $this->CI->input->post('amount');
    	$data['MD'] = $db_data['md'] = 'p';
    	$data['CRN'] = $db_data['currency'] = 'NRP';
    	$data['DT'] = $db_data['date'] = date('m/d/Y');
    	$data['R1'] = $db_data['r1'] = $this->CI->input->post('number');
    	$data['R2'] = $db_data['r2'] = 'Phone Recharge';
    	$data['PRN'] = $db_data['prn'] = uniqid();
    	$data['status'] = $db_data['status'] = 'PENDING';
    	$db_data['time'] = date('H:i:s');

    	$success = $this->CI->db->insert($this->CI->transaction_model->table,$db_data);

    	$data['RU'] = site_url('transactions/fonepay_return_url/'.$merchant_detail->id);
    	$data['PID'] = $merchant_detail->test_merchant_id;
    	$data['sharedSecretKey'] = $merchant_detail->test_secretkey;
    	// $data['PID'] = $merchant_detail->live_merchant_id;
    	// $data['sharedSecretKey'] = $merchant_detail->live_secretkey;

    	// $data['PID'] = 'YXSB';
    	// $data['PID'] = 'XRORSU';
    	// $data['sharedSecretKey'] = '158324969d9240f8bf8d85017bc77f67';
    	// $data['sharedSecretKey'] = 'f9b69f4efd2641a8979df5c7a46c941a';

    	$data['DV'] = hash_hmac('sha512',$data['PID'].','.$data['MD'].','.$data['PRN'].','.$data['AMT'].','.$data['CRN'].','.$data['DT'].','.$data['R1'].','.$data['R2'].','.$data['RU'], $data['sharedSecretKey']);
    	$data['autosubmission'] = true;
    	$data['paymentLiveUrl'] = "https://clientapi.fonepay.com/api/merchantRequest";
    	$data['paymentDevUrl'] = "https://dev-clientapi.fonepay.com/api/merchantRequest";

    	// echo '<pre>';
    	// print_r($data);
    	// exit;

    	$this->CI->load->view('payment_gateway/fonePay',$data);
    }
}
?>