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
* Migration_Update_degrees
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_degrees extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'category_id'                 => array('type' => 'int',       'constraint' => 11),
            'certificate_name'                  => array('type' => 'varchar',       'constraint' => '100'),
            'code_'                  => array('type' => 'varchar',       'constraint' => '100'),
            'qualification'                  => array('type' => 'varchar',       'constraint' => '100'),
            'level_id'                 => array('type' => 'int',       'constraint' => 11),
            'program_duration'                 => array('type' => 'int',       'constraint' => 11),
            'duration_type'                  => array('type' => 'varchar',       'constraint' => '100'),
            'program_type'                  => array('type' => 'varchar',       'constraint' => '100'),
            'vacancy_number'                 => array('type' => 'int',       'constraint' => 11),
            'created_date'       => array('type' => 'datetime',      'null'       => TRUE),
            'sub_delete'                 => array('type' => 'tinyint',       'constraint' => 11),
        );
        $this->dbforge->add_column('mst_degrees', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_degrees', 'category_id');
        $this->dbforge->drop_column('mst_degrees', 'certificate_name');
        $this->dbforge->drop_column('mst_degrees', 'code_');
        $this->dbforge->drop_column('mst_degrees', 'qualification');
        $this->dbforge->drop_column('mst_degrees', 'level_id');
        $this->dbforge->drop_column('mst_degrees', 'program_duration');
        $this->dbforge->drop_column('mst_degrees', 'duration_type');
        $this->dbforge->drop_column('mst_degrees', 'program_type');
        $this->dbforge->drop_column('mst_degrees', 'vacancy_number');
        $this->dbforge->drop_column('mst_degrees', 'created_date');
        $this->dbforge->drop_column('mst_degrees', 'sub_delete');
    }
}