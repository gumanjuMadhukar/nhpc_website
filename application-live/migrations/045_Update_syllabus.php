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
* Migration_Update_syllabus
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_syllabus extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'level'                 => array('type' => 'int',       'constraint' => 11),
            'rank'                  => array('type' => 'int',       'constraint' => 11),
            'status'                => array('type' => 'int',       'constraint' => 11),
        );
        $this->dbforge->add_column('mst_syllabus', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_syllabus', 'level');
        $this->dbforge->drop_column('mst_syllabus', 'rank');
        $this->dbforge->drop_column('mst_syllabus', 'status');
    }
}