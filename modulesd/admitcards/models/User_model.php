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


class User_model extends MY_Model
{
	// public $_joins = array();

    // protected $_table = 'mst_admitcard';

    function __construct() { 
        // Set table name 
        $this->table = 'users'; 
    } 

    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 
    
    public function get_all_re_exam_users()
    {   
        $re_exam= 1;
        $this->otherdb = $this->load->database('app', TRUE);
        $this->otherdb->select(
            'registration.id,
            registration.first_name,
            registration.middle_name,
            registration.last_name,
            registration_processing.re_exam,
            registration_processing.re_exam_voucher_accept,
            registration_processing.re_exam_voucher_image,
            registration_processing.voucher_uploaded'
                        );        $this->otherdb->from('registration');
        $this->otherdb->join('registration_processing', 'registration_processing.registration_id = registration.id');
        // $this->db->where('rating.user_id', $reviewing_customer_id);
        $this->otherdb->where('registration_processing.re_exam',$re_exam);

        $query = $this->otherdb->get(); 
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
