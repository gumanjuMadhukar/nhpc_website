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
* Migration_Update_colleges
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_colleges extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'province_id'                 => array('type' => 'int',       'constraint' => 11),
        );
        $this->dbforge->add_column('mst_colleges', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_colleges', 'province_id');
    }
}