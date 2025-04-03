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

    function get_registration_id($email){
        $DB2 = $this->load->database('app', TRUE);
        $DB2->select('id'); 
        $DB2->from($this->table); 
        $DB2->where('email',$email);
        $query = $DB2->get('registration'); 
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
