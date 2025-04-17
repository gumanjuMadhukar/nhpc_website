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
* Migration_Update_mst_admitcard
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_mst_admitcard extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'college'                  => array('type' => 'varchar',       'constraint' => '100'),
        );
        $this->dbforge->add_column('mst_admitcard', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_admitcard', 'college');
    }
}