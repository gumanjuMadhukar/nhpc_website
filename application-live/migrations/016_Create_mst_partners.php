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
* Migration_Create_mst_partners
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_mst_partners extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('mst_partners'))
        {
            // Setup Keys 
            $this->dbforge->add_key('id', TRUE);

            $this->dbforge->add_field(array(
                'id'                    => array('type' => 'int',           'constraint' => 11,     'unsigned' => TRUE, 'auto_increment' => TRUE),
                'created_at'            => array('type' => 'datetime',      'default'    => null),
                'updated_at'            => array('type' => 'datetime',      'default'    => null),
                'deleted_at'            => array('type' => 'datetime',      'default'    => null),
                'created_by'            => array('type' => 'int',           'constraint' => 11),
                'updated_by'            => array('type' => 'int',           'constraint' => 11),
                'deleted_by'            => array('type' => 'int',           'constraint' => 11),
                'name'                  => array('type' => 'varchar',       'constraint' => '100'),
                'link'                  => array('type' => 'varchar',       'constraint' => '100'),
            ));

            $this->dbforge->create_table('mst_partners', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('mst_partners');
    }
}