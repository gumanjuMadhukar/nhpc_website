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


class College_model extends MY_Model
{
	public $_joins = array();

    public $_table = 'mst_colleges';

    public $_JOINS = array(
    	'DB_TABLE'=>array('table'=>'db_table','join_type' => 'LEFT', 'join_field'=>'join_field','select'=>'select_field','alias'=>'alias')
    );

    protected $blamable = TRUE;

}