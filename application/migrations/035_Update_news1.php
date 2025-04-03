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
* Migration_Update_news1
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_news1 extends CI_Migration {

    function up() 
    {   
        $this->dbforge->drop_column('mst_news', 'month_name');
        $fields = array(
            'month_name'                  => array('type' => 'varchar',   'constraint' => 255,    'null' => TRUE),
        );
        $this->dbforge->add_column('mst_news', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_news', 'month_name');
        $fields = array(
            'month_name'                 => array('type' => 'int',       'constraint' => 11),
        );
        $this->dbforge->add_column('mst_news', $fields);
    }
}