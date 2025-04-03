<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Welcome extends CI_Controller {
 
    public function  __construct() 
    { 
        parent:: __construct();
        error_reporting(E_ALL ^ E_NOTICE);  
        $this->load->model(array('sms_model'));
    } 
     
    /* * *********************************************************************
     * * Function name : index
     * * Developed By : Tejaswi
     * * Purpose  : This function used for SMS
     * * Date : 09 August 2021
     * * **********************************************************************/
    public function index()
    {   
        $fields = array('name','mobile');
        $whereCon = 'mobile != ""'; 
 
        $usersData = $this->sms_model->getData($fields,'users',$whereCon);
 
        $totalUsers = count($usersData );
        if($totalUsers > 0):
          foreach($totalUsers as $users):
            $param['mobile']    =   $users['mobile'];
            $param['name']      =   $users['name'];
 
            $message = 'Hello '.$users['name'].' Thankyou for visiting us.';
 
            $this->sms_model->sendSMS($params,$message );
          endforeach;
        endif;
 
        $this->load->view('users',array(),$data);
    }
}