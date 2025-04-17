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


class AdmitCard_model extends MY_Model
{
	public $_joins = array();

    protected $_table = 'mst_admitcard';

    function __construct() { 
        // Set table name 
        $this->table = 'mst_admitcard'; 
    } 

    function get_email($symbol_number){
        
        $this->db->select('email'); 
        $this->db->from($this->table); 
        $this->db->where('symbol_number',$symbol_number);
        $query = $this->db->get(); 
        $result = $query->result_array(); 
       
       
        if($result){
            return $result;
        }else{
            $result = null;
            return $result;
        }
        

    }
    function get_phone_no($symbol_number){
        
        $this->db->select('phone_no'); 
        $this->db->from($this->table); 
        $this->db->where('symbol_number',$symbol_number);
        $query = $this->db->get(); 
        $result = $query->result_array(); 
       
       
        if($result){
            return $result;
        }else{
            $result = null;
            return $result;
        }
        

    }
    // function get_phone_number($symbol_number){

    //     $this->db->select('email','phone_no'); 
    //     $this->db->from($this->table); 
    //     $this->db->where('symbol_number',$symbol_number);
    //     $query = $this->db->get(); 
    //     $result = $query->result_array(); 
       
    //     if($result){
    //         return $result;
    //     }else{
    //         $result = null;
    //         return $result;
    //     }
        

    // }
    function get_phone($result){
        
        $this->db->select('phone_no'); 
        $this->db->from($this->table); 
        $this->db->where('result',$result);
        $query = $this->db->get(); 
        $result = $query->result_array(); 
       
        if($result){
            return $result;
        }else{
            $result = null;
            return $result;
        }
        

    }
    // protected $blamable = TRUE;

}
