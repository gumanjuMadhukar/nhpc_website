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
* Migration_Create_mst_admitcard
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_mst_admitcard extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('mst_admitcard'))
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
                'first_name'                  => array('type' => 'varchar',       'constraint' => '100'),
                'middle_name'                  => array('type' => 'varchar',       'constraint' => '100'),
                'last_name'                  => array('type' => 'varchar',       'constraint' => '100'),
                'symbol_number'                  => array('type' => 'varchar',       'constraint' => '100'),
                'gender'                  => array('type' => 'varchar',       'constraint' => '100'),
                'program'                  => array('type' => 'varchar',       'constraint' => '100'),
                'level'                  => array('type' => 'varchar',       'constraint' => '100'),
                'photo_link'                  => array('type' => 'varchar',       'constraint' => '255'),
                'barcode'                  => array('type' => 'varchar',       'constraint' => '100'),
                'exam_centre'                  => array('type' => 'varchar',       'constraint' => '100'),
                'vdc_municipality_english'                  => array('type' => 'varchar',       'constraint' => '100'),
                'phone_id'                  => array('type' => 'varchar',       'constraint' => '100'),
                'DOB'       => array('type' => 'date',      'null'       => TRUE),
                'year_dob_nepali_date'                  => array('type' => 'varchar',       'constraint' => '100'),
                'month_dob_nepali_date'                  => array('type' => 'varchar',       'constraint' => '100'),
                'day_dob_nepali_date'                  => array('type' => 'varchar',       'constraint' => '100'),
                'student_signature'                  => array('type' => 'varchar',       'constraint' => '100'),
            ));

            $this->dbforge->create_table('mst_admitcard', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('mst_admitcard');
    }
}