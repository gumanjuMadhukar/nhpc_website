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
* Migration_Update_news
*
* Extends the CI_Migration class
* 
*/
class Migration_Update_news extends CI_Migration {

    function up() 
    {      
        $fields = array(
            'year'                 => array('type' => 'int',       'constraint' => 11),
            'month'                 => array('type' => 'int',       'constraint' => 11),
            'day'                 => array('type' => 'int',       'constraint' => 11),
            'month_name'                 => array('type' => 'int',       'constraint' => 11),
        );
        $this->dbforge->add_column('mst_news', $fields);
    }

    function down() 
    {
        $this->dbforge->drop_column('mst_news', 'year');
        $this->dbforge->drop_column('mst_news', 'month');
        $this->dbforge->drop_column('mst_news', 'day');
        $this->dbforge->drop_column('mst_news', 'month_name');
    }
}