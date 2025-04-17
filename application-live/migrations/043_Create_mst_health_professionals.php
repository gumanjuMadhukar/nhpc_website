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
* Migration_Create_mst_health_professionals
*
* Extends the CI_Migration class
* 
*/
class Migration_Create_mst_health_professionals extends CI_Migration {

    function up() 
    {       

        if ( ! $this->db->table_exists('mst_health_professionals'))
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
                'first_name_nepali'                  => array('type' => 'varchar',       'constraint' => '100'),
                'middle_name_nepali'                  => array('type' => 'varchar',       'constraint' => '100'),
                'last_name_nepali'                  => array('type' => 'varchar',       'constraint' => '100'),
                'sex'                 => array('type' => 'varchar',       'constraint' => '255'),
                'father_name'                 => array('type' => 'varchar',       'constraint' => '255'),
                'father_name_nepali'                 => array('type' => 'varchar',       'constraint' => '255'),
                'mother_name'                 => array('type' => 'varchar',       'constraint' => '255'),
                'mother_name_nepali'                 => array('type' => 'varchar',       'constraint' => '255'),
                'grand_father_name_nepali'                 => array('type' => 'varchar',       'constraint' => '255'),
                'grand_father_name'                 => array('type' => 'varchar',       'constraint' => '255'),
                'DOB'       => array('type' => 'date',      'null'       => TRUE),
                'year_dob_nepali_date'                 => array('type' => 'int',       'constraint' => 11),
                'month_dob_nepali_date'                 => array('type' => 'int',       'constraint' => 11),
                'day_dob_nepali_date'                 => array('type' => 'int',       'constraint' => 11),
                'marital_status'                 => array('type' => 'varchar',       'constraint' => '255'),
                'husband_wife_name'                 => array('type' => 'varchar',       'constraint' => '255'),
                'email'                 => array('type' => 'varchar',       'constraint' => '255'),
                'phone_id'                 => array('type' => 'int',       'constraint' => 11),
                'development_region_id'                 => array('type' => 'int',       'constraint' => 11),
                'zone_id'                 => array('type' => 'int',       'constraint' => 11),
                'district_id'                 => array('type' => 'int',       'constraint' => 11),
                'vdc_municipality_nepali'                 => array('type' => 'varchar',       'constraint' => '255'),
                'vdc_municipality_english'                 => array('type' => 'varchar',       'constraint' => '255'),
                'ward_number_nepali'                 => array('type' => 'varchar',       'constraint' => '255'),
                'ward_number'                 => array('type' => 'int',       'constraint' => 11),
                'tol'                 => array('type' => 'int',       'constraint' => 11),
                'photo_link'                 => array('type' => 'int',       'constraint' => 11),
                'student_id'                 => array('type' => 'int',       'constraint' => 11),
                'level_id'                 => array('type' => 'int',       'constraint' => 11),
                'program_id'                 => array('type' => 'int',       'constraint' => 11),
                'hospital'                 => array('type' => 'varchar',       'constraint' => '255'),
                'academic_year'                 => array('type' => 'int',       'constraint' => 11),
                'board_registration_number'                 => array('type' => 'varchar',       'constraint' => '255'),
                'college_id'                 => array('type' => 'int',       'constraint' => 11),
                'ethinic_id'                 => array('type' => 'int',       'constraint' => 11),
                'cast_id'                 => array('type' => 'int',       'constraint' => 11),
                'current_status'                 => array('type' => 'varchar',       'constraint' => '255'),
                'applied_date'       => array('type' => 'date',      'null'       => TRUE),
                'applied_date_nepali'                 => array('type' => 'varchar',       'constraint' => '255'),
                'crn'                 => array('type' => 'int',       'constraint' => 11),
                'temp_registration_number'                 => array('type' => 'varchar',       'constraint' => '255'),
                'registration_number'                 => array('type' => 'varchar',       'constraint' => '255'),
                'status'                 => array('type' => 'tinyint',       'constraint' => 11),
                'created_date'       => array('type' => 'datetime',      'null'       => TRUE),
                'approved_level'                 => array('type' => 'int',       'constraint' => 11),
                'international_college'                 => array('type' => 'varchar',       'constraint' => '255'),
                'category_id'                 => array('type' => 'int',       'constraint' => 11),
                'citizenship_number'                 => array('type' => 'varchar',       'constraint' => '255'),
                'updated_date'       => array('type' => 'datetime',      'null'       => TRUE),
                'date_'       => array('type' => 'date',      'null'       => TRUE),
            ));

            $this->dbforge->create_table('mst_health_professionals', TRUE);
        }
    }

    function down() 
    {
        $this->dbforge->drop_table('mst_health_professionals');
    }
}