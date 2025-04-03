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
* Migration_Create_transactions
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_transactions extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('payment_transactions'))
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
                'gateway'               => array('type' => 'varchar',       'constraint' => '100'),
                'ru'                    => array('type' => 'varchar',       'constraint' => '255'),
                'pid'                   => array('type' => 'varchar',       'constraint' => '255'),
                'prn'                   => array('type' => 'varchar',       'constraint' => '255'),
                'amt'                   => array('type' => 'varchar',       'constraint' => '255'),
                'currency'              => array('type' => 'varchar',       'constraint' => '255'),
                'date'                  => array('type' => 'date'),
                'time'                  => array('type' => 'varchar',       'constraint' => '255'),
                'R1'                    => array('type' => 'varchar',       'constraint' => '255'),
                'R2'                    => array('type' => 'varchar',       'constraint' => '255'),
                'md'                    => array('type' => 'varchar',       'constraint' => '255'),
                'dv'                    => array('type' => 'varchar',       'constraint' => '255'),
                'bc'                    => array('type' => 'varchar',       'constraint' => '255'),
                'ini'                   => array('type' => 'varchar',       'constraint' => '255'),
                'uid'                   => array('type' => 'varchar',       'constraint' => '255'),
                'bid'                   => array('type' => 'varchar',       'constraint' => '255'),
                'status'                => array('type' => 'varchar',       'constraint' => '255'),
            ));

            $this->dbforge->create_table('payment_transactions', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('payment_transactions');
    }
}