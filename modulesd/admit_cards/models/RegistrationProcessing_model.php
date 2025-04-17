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


class RegistrationProcessing_model extends MY_Model
{
	// public $_joins = array();

    // protected $_table = 'mst_admitcard';

    function __construct() { 
        // $DB2 = $this->load->database('app', TRUE);
        // $this->$DB2;
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
            registration_processing.re_exam_voucher_image'
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
    public function update_voucher_uploaded($reg_id){
        
        // $this->db->set('status', $id);
        // $this->db->where('id', $reg_id);
        // $this->db->update($this->table);
        

        $DB2 = $this->load->database('app', TRUE);
        $re_exam = true;
        $data=array(
            'voucher_uploaded' => $re_exam,
                     
        );
            $DB2->where('registration_id',$reg_id);
            $query=  $DB2->update('registration_processing',$data);                  
            return $query;


        // $re_exam = $id;
        // if($reg_id){
        //     $data=array(
        //         're_exam_voucher_accept' => $re_exam,
                         
        //     );
        //         $DB2->where('registration_id',$reg_id);
        //         $query=  $DB2->update('registration_processing',$data);                  
        //         return $query;
        // }else{
        //     return $query=0;
        // }
        

    }

    public function updateStatus($id,$reg_id){
        
        // $this->db->set('status', $id);
        // $this->db->where('id', $reg_id);
        // $this->db->update($this->table);
        

        $DB2 = $this->load->database('app', TRUE);
        $re_exam = $id;
        if($reg_id){
            $data=array(
                're_exam_voucher_accept' => $re_exam,
                         
            );
                $DB2->where('registration_id',$reg_id);
                $query=  $DB2->update('registration_processing',$data);                  
                return $query;
        }else{
            return $query=0;
        }
        

    }

    public function save_re_exam($reg_id,  $voucher_image){
      
        $DB2 = $this->load->database('app', TRUE);
        $re_exam = true;
        if($reg_id){
            $data=array(
                're_exam' => $re_exam,
                're_exam_voucher_image' => $voucher_image,            
            );
                $DB2->where('registration_id',$reg_id);
                $query=  $DB2->update('registration_processing',$data);                  
                return $query;
        }else{
            return $query=0;
        }
    }

    // protected $blamable = TRUE;

}
