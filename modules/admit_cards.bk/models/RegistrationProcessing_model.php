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
    // public function save_re_exam($reg_id,  $voucher_image)
    // {
    //     $DB2 = $this->load->database('app', TRUE);
    //     $re_exam = 1;
    //     print_r($reg_id);
    //     print_r($voucher_image);
    //     exit();
    //     $query="INSERT INTO `$this->$DB2.rating`( `re_exam`, `re_exam_voucher_image`) 
	// 	VALUES ('$re_exam','$voucher_image')";
     
	// 	$this->db->query($query);   

        
    // }

    public function save_re_exam($reg_id,  $voucher_image){
        // print_r($car);
        
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
