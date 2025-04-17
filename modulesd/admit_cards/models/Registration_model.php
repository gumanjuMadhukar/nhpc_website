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


class Registration_model extends MY_Model
{
	// public $_joins = array();

    // protected $_table = 'mst_admitcard';

    function __construct() { 
        

    } 

    function get_registration_id($phone_id){
        $DB2 = $this->load->database('app', TRUE);
        $DB2->select('id'); 
        // $DB2->from($this->table); 
        $DB2->where('phone_id',$phone_id);
        $query = $DB2->get('registration'); 
        $result = $query->result_array(); 
        // print_r($result);exit();
        
        if($result){
            return $result;
        }else{
            $result = null;
            return $result;
        }

    }

    function get_phone_id($phone){
        $DB2 = $this->load->database('app', TRUE);
        $DB2->select('id'); 
        $DB2->from($this->table); 
        $DB2->where('mobile_num',$phone);
        $DB2->or_where('phone_num',$phone);

        $query = $DB2->get('phone'); 
        $result = $query->result_array(); 
        // print_r($result);
        // exit();
        
        if($result){
            return $result;
        }else{
            $result = null;
            return $result;
        }

    }
	
	function get_phone_id2($phone, $first_name){
        $DB2 = $this->load->database('app', TRUE);
        $DB2->select('phone.id'); 
        $DB2->from($this->table); 
		$DB2->join('registration', 'registration.phone_id = phone.id');
        $DB2->where('mobile_num',$phone);
		$DB2->where('first_name',$first_name);
        $DB2->or_where('phone_num',$phone);

        $query = $DB2->get('phone'); 
        $result = $query->result_array(); 
        // print_r($result);
        // exit();
        
        if($result){
            return $result;
        }else{
            $result = null;
            return $result;
        }

    }
	
    function get_phone_id_message($userID){
        $DB2 = $this->load->database('app', TRUE);
        $DB2->select('phone_id'); 
        // $DB2->from($this->table); 
        $DB2->where('id',$userID);
        $query = $DB2->get('registration'); 
        $phone_id = $query->result_array(); 
        $phone_id = $phone_id[0]['phone_id'];

        $DB2 = $this->load->database('app', TRUE);
        $DB2->select('mobile_num'); 
        // $DB2->from($this->table); 
        $DB2->where('id',$phone_id);
        $query = $DB2->get('phone'); 
        $mobile_num = $query->result_array(); 
        $mobile_num = $mobile_num[0]['mobile_num'];

       
        
        if($mobile_num){
            return $mobile_num;
        }else{
            $mobile_num = null;
            return $mobile_num;
        }
    }
    // protected $blamable = TRUE;

}
