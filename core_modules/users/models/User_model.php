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
	public $_joins = array();

    public $_table = 'aauth_users';

    public $_JOINS = array(
    	'USER_GROUP'=>array('table'=>'aauth_user_groups','join_type' => 'LEFT', 'join_field'=>'aauth_users.id = aauth_user_groups.user_id','select'=>'aauth_user_groups.group_id','alias'=>'aauth_user_groups')
    );

    protected $blamable = TRUE;

}