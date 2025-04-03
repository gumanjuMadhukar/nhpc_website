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
* Migration_Create_expertise
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_expertise extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('data_expertise'))
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
                'first_name'            => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'middle_name'           => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'last_name'             => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'first_name_np'         => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'middle_name_np'        => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'last_name_np'          => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'province_id'           => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'district_id'           => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'city_place_id'         => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'ward'                  => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'address'               => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'temp_province_id'      => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'temp_district_id'      => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'temp_city_place_id'    => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'temp_ward'             => array('type' => 'int',           'constraint' => '10',   'null'=>TRUE),
                'temp_address'          => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'phone'                 => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'mobile'                => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'email'                 => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'profile_image'         => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'level'                 => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'qualification'         => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'registration_no'       => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'subject'               => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'experiance'            => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'doc_cv'                => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'doc_certificate'       => array('type' => 'varchar',       'constraint' => '100',  'null'=>TRUE),
                'remark'                => array('type' => 'text',          'null'=>True),
            ));

            $this->dbforge->create_table('data_expertise', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('data_expertise');
    }
}