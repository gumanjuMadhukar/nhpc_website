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
* Migration_Update_colleges
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_colleges extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'slug'                  => array('type' => 'varchar',       'constraint' => '100'),
            'development_region_id'                 => array('type' => 'int',       'constraint' => 11),
            'zone_id'                 => array('type' => 'int',       'constraint' => 11),
            'district_id'                 => array('type' => 'int',       'constraint' => 11),
            'vdc_municipality_nepali'                  => array('type' => 'varchar',       'constraint' => '100'),
            'vdc_municipality_english'                  => array('type' => 'varchar',       'constraint' => '100'),
            'ward_number_nepali'                  => array('type' => 'varchar',       'constraint' => '100'),
            'ward_number'                 => array('type' => 'int',       'constraint' => 11),
            'tol'                  => array('type' => 'varchar',       'constraint' => '100'),
            'phone_number'                  => array('type' => 'varchar',       'constraint' => '100'),
            'university_id'                 => array('type' => 'int',       'constraint' => 11),
            'approved_by'                 => array('type' => 'int',       'constraint' => 11),
            'approved_date'       => array('type' => 'datetime',      'null'       => TRUE),
            'created_date'       => array('type' => 'datetime',      'null'       => TRUE),
            'college_type'                  => array('type' => 'varchar',       'constraint' => '100'),
            'registration_status'                  => array('type' => 'varchar',       'constraint' => '100'),
        );
        $this->dbforge->add_column('mst_colleges', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_colleges', 'slug');
        $this->dbforge->drop_column('mst_colleges', 'development_region_id');
        $this->dbforge->drop_column('mst_colleges', 'zone_id');
        $this->dbforge->drop_column('mst_colleges', 'district_id');
        $this->dbforge->drop_column('mst_colleges', 'vdc_municipality_nepali');
        $this->dbforge->drop_column('mst_colleges', 'vdc_municipality_english');
        $this->dbforge->drop_column('mst_colleges', 'ward_number_nepali');
        $this->dbforge->drop_column('mst_colleges', 'ward_number');
        $this->dbforge->drop_column('mst_colleges', 'tol');
        $this->dbforge->drop_column('mst_colleges', 'phone_number');
        $this->dbforge->drop_column('mst_colleges', 'university_id');
        $this->dbforge->drop_column('mst_colleges', 'approved_by');
        $this->dbforge->drop_column('mst_colleges', 'approved_date');
        $this->dbforge->drop_column('mst_colleges', 'created_date');
        $this->dbforge->drop_column('mst_colleges', 'college_type');
        $this->dbforge->drop_column('mst_colleges', 'registration_status');
    }
}