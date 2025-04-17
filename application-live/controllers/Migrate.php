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
 * Migrate
 *
 * Extends the MX_Controller class
 * 
 */

class Migrate extends MX_Controller
{

    public function __construct() {

        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
        print "Migration Started\r\nExecuting......";
        if ($this->migration->latest() === FALSE)
        {
            show_error($this->migration->error_string());
        } 
    }

    public function downgrade($version = 0)
    {
        if ($this->migration->version($version) === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }

    public function seed() {
        $this->load->library('auth/Aauth', 'mail');
        $this->load->config('project');
        $this->load->config('mail');

        // EMAIL CONFIG
        $email_config = $this->config->item('mail');
        $this->email->initialize($email_config);

        $this->aauth->create_perm('Control Panel', 'Control Panel');
        $this->aauth->create_perm('System', 'System');
        $this->aauth->create_perm('Users', 'Users');
        $this->aauth->create_perm('Groups', 'Groups');
        $this->aauth->create_perm('Permissions', 'Permissions');

        $this->db->query('ALTER TABLE aauth_permissions AUTO_INCREMENT = 1001');

        $this->aauth->create_group(1,   'Member',               'Member Default Access Group');
        $this->aauth->create_group(2,   'Super Administrator',  'Super Administrator Access Group');
        $this->aauth->create_group(100, 'Administrator',        'Administrator Access Group');

        $this->db->query('ALTER TABLE aauth_groups AUTO_INCREMENT = 1001');    

        //Add Permission to Member Group
        $this->aauth->allow_group('Member', 'Control Panel');
                
        //Create Super Administrator User
        $user_id = $this->aauth->create_user('superadmin@gmail.com', DEFAULT_PASSWORD, 'superadmin', 'Super Administrator');
        $this->aauth->add_member($user_id, 'Super Administrator');

        $user_id = $this->aauth->create_user('admin@no.com', DEFAULT_PASSWORD, 'admin', 'Administrator');
        $this->aauth->add_member($user_id, 'Administrator');

        $this->db->query('ALTER TABLE aauth_users AUTO_INCREMENT = 1001');

        $view_sql = file_get_contents(FCPATH . 'sql/000_db_views.sql');
        $view_sql = str_replace('\r\n', ' ', $view_sql);
        
        $queries = explode(';', $view_sql);

        foreach ($queries as $q) {
            if (trim($q) != '') {
                $this->db->query($q);
            }
        }
    }

    public function upload_data($file_name)
    {
        $this->run_query(FCPATH . 'sql/data/'.$file_name.'.sql');
    }

    public function update_views()
    {
        $this->load->helper('directory');
        // get files
        $map = directory_map(FCPATH . 'sql/views', 1);
        // run queries in each files
        foreach ($map as $key => $value) {
            /*// get quires
            $view_sql = file_get_contents(FCPATH . 'sql/views/'.$value);
            $view_sql = str_replace('\r\n', ' ', $view_sql);

            // separate quires
            $queries = explode(';', $view_sql);
            // run each quires
            foreach ($queries as $q) {
                if (trim($q) != '') {
                    $this->db->query($q);
                }
            }*/
            $this->run_query(FCPATH . 'sql/views/'.$value);
        }
    }

     private function run_query($file_name)
    {
        // get quires
        $view_sql = file_get_contents($file_name);
        $view_sql = str_replace('\r\n', ' ', $view_sql);

        // separate quires
        $queries = explode(';', $view_sql);
        // run each quires
        foreach ($queries as $q) {
            if (trim($q) != '') {
                $this->db->query($q);
            }
        }
    }
}