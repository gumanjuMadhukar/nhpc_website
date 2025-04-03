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
* Migration_Create_mst_setting
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_mst_setting extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('mst_setting'))
        {
            // Setup Keys 
            $this->dbforge->add_key('id', TRUE);

            $this->dbforge->add_field(array(
                'id'                    => array('type' => 'int',       'constraint' => 11,     'auto_increment' => TRUE),
                'code'                  => array('type' => 'varchar',   'constraint' => 255,    'null' => TRUE),
                'key'                  => array('type' => 'varchar',   'constraint' => 255,    'null' => TRUE),
                'value'                 => array('type' => 'longtext',  'null' => TRUE),
                ));

            $this->dbforge->create_table('mst_setting', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('mst_setting');
    }
}