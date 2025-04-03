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
* Migration_Update_mst_admicard1
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_mst_admitcard1 extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'webcam'                  => array('type' => 'varchar',       'constraint' => '100'),
            'thumb'                  => array('type' => 'varchar',       'constraint' => '100'),
        );
        $this->dbforge->add_column('mst_admitcard', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_admitcard', 'webcam');
        $this->dbforge->drop_column('mst_admitcard', 'thumb');
    }
}