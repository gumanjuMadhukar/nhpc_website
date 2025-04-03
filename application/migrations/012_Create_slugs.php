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
* Migration_Create_pms
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_slugs extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('slugs'))
        {
            // Setup Keys 
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key(array('id','sender_id','receiver_id','date_read'));

            $this->dbforge->add_field(array(
                'id'                    => array('type' => 'int',           'constraint' => 11,      'unsigned' => TRUE, 'auto_increment' => TRUE),               
                'slug_name'                 => array('type' => 'varchar',       'constraint' => 255,     'null'     => FALSE),
                'route'                 => array('type' => 'varchar',       'constraint' => 255,     'null'     => FALSE),
             ));

            $this->dbforge->create_table('slugs', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('slugs');
    }
}