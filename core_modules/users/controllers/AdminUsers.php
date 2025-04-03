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
 * Admin
 *
 * Extends the Project_Controller class
 * 
 */

class AdminUsers extends Project_Controller
{
	public function __construct(){
		parent::__construct();

		control('Users');

        $this->load->model('groups/group_model');
		$this->load->model('users/user_model');
        $this->load->model('users/user_group_model');
		$this->lang->load('users/user');
        $this->load->model('permissions/permission_model');

	}

	public function index()
	{
		// Display Page
		$data['header'] = lang('users');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'users';

        $this->db->where('id <>', 1);
		$data['groups'] = $this->group_model->find_all();
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
        
        $where = array();

        $params = $this->input->post(); 

        $this->user_model->_table = 'view_users';

        if($this->session->userdata('id') != 1) 
        {
            $this->db->where('id <>', 1);
        }
        
        $total=$this->user_model->find_count();
       

		$this->_get_search_param($params);

        $this->user_model->_table = 'view_users';

        if($this->session->userdata('id') != 1) 
        {
            $this->db->where('id <>', 1);
        }
        
        $filter_total=$this->user_model->find_count();

        $this->_get_search_param($params);
        
        if($this->session->userdata('id') != 1) 
        {
            $this->db->where('id <>', 1);
        }

        $this->user_model->as_array();
		$rows=$this->user_model->find_all(null,null,null,$this->input->post('start'),$this->input->post('length'));
        echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
		
		exit;
	}


    public function _get_search_params($params)
    {

        foreach ($params['columns'] as $value) {
            if($value['searchable'] == 'true'){
                if($params['search']['value'] != '')
                {
                    $this->db->or_where(array($value["name"].' like'=>'%'.$params['search']['value'].'%'));
                }

                if($value['search']['value'] != '')
                {
                    $temp = explode(',', $value['search']['value']);
                    $this->db->where_in($value['name'],$temp);
                }
            }
        }
                       
        
    }

	public function save()
	{

        $data=$this->_get_posted_data(); //Retrive Posted Data

        extract($data);

        $this->db->trans_begin();

        if(!$this->input->post('id'))
        {
            if(!$password){
                $password = DEFAULT_PASSWORD;
            }
        	$user_id = $success = $this->aauth->create_user($email, $password, $username, $fullname);

            if (is_numeric($success)) {
                if ($this->input->post('groups')) {
                    $groups = $this->input->post('groups');
                    $groupInsertArray = array();
                    foreach($groups as $group) {
                        $temp = array();
                        $temp['user_id'] = $success;
                        $temp['group_id'] = $group;
                        $groupInsertArray[] = $temp;
                    }
                    $this->user_group_model->insert_many($groupInsertArray);
                }
            }
        }
        else
        {
        	$user_id = $success = $this->aauth->update_user($id, $email, FALSE, $username, $fullname );

            if ($success) {
                if ($this->input->post('groups')) {

                    $groups = $this->input->post('groups');

                    if (count($groups) > 0) {
                        $this->user_group_model->delete_by(array('user_id' => $id, 'group_id <>' => 1));
                        $groupInsertArray = array();
                        foreach($groups as $group) {
                            $temp = array();
                            $temp['user_id'] = $id;
                            $temp['group_id'] = $group;
                            $groupInsertArray[] = $temp;
                        }
                        $this->user_group_model->insert_many($groupInsertArray);
                    }
                }
            }
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $success = FALSE;
            $msg=lang('general_failure');
        }
        else
        {
            $this->db->trans_commit();
            $success = TRUE;
            $msg=lang('general_success');
        }

        echo json_encode(array('msg'=>$msg,'success'=>$success));
        exit;

    }

    private function _get_posted_data()
    {
    	$data=array();
    	$data['id'] = $this->input->post('id');
    	$data['email'] = $this->input->post('email');
    	$data['username'] = $this->input->post('username');
        $data['fullname'] = $this->input->post('fullname');
        $data['password'] = $this->input->post('password');
    	return $data;
    }

    public function get_user_permission()
    {
        $user = $this->input->post('user_id');
        $rows = $this->user_group_model->find_all(array('user_id'=>$user));
        $success = false;
        if($rows){
            $success = true;
        }
        echo json_encode(array('success' => $success, 'data'=>$rows));

    }

    public function reset_login_attempts() 
    {
        if ($this->aauth->reset_login_attempts($this->input->post('id')))
            echo json_encode(array('success' => true));
        else
            echo json_encode(array('success' => false));
    }

    public function reset_password() 
    {
        if ($this->aauth->reset_password($this->input->post('id'), 'ADMIN'))
            echo json_encode(array('success' => true));
        else
            echo json_encode(array('success' => false));
    }

    public function toggle_user() 
    {
        if ($this->aauth->toggle_user($this->input->post('id'), $this->input->post('toggle')))
            echo json_encode(array('success' => true));
        else
            echo json_encode(array('success' => false));
    }

    public function verify_user() 
    {
        if ($this->aauth->verify_user($this->input->post('id'), 'ADMIN'))
            echo json_encode(array('success' => true));
        else
            echo json_encode(array('success' => false));
    }

    public function get_user_groups()
    {
        $jsonArray = array();

        $user_id = $this->input->post('id');
        
        //following group has user to $user_id
        $this->db->where('user_id', $user_id);
        $this->db->where_not_in('group_id', array(1,2));
        $this->user_group_model->_table = 'view_user_groups';
        $results = $this->user_group_model->find_all();

        $jsonArray['involved_groups'] = $results;

        $user_groups_array = array();
        
        if (count($results) > 0){
            foreach($results as $row) {
                $user_groups_array[]= $row->group_id;
            }
            $this->db->where_not_in('id', $user_groups_array);
        }

        //following group has no user to $user_id
        $this->db->where_not_in('id', array(1,2));
        $results = $this->group_model->find_all(null, array('id', 'name as group_name'));
        $jsonArray['not_involved_groups'] = $results;

        echo json_encode($jsonArray);
        exit;
    }

    public function save_user_groups() {
        
        $user_id = $this->input->post('user_id');
        $groups = $this->input->post('involved_groups_ids');

        $this->db->trans_begin();

        $this->user_group_model->delete_by(array('user_id' => $user_id, 'group_id <>' => 1));

        if ($groups != '') {
            $groups = explode(",", $groups);
            $insertArray = array();

            foreach ($groups as $group) {
                $temp = array();
                $temp['user_id'] = $user_id;
                $temp['group_id'] = $group;
                $insertArray[] = $temp;
            }

            if (count($insertArray) > 0) {
                $this->user_group_model->insert_many($insertArray);
            }
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo json_encode(array('success' => false));
        }
        else
        {
            $this->db->trans_commit();
            echo json_encode(array('success' => true));
        } 
    }

    public function setPermission()
    {
        $this->load->model('permissions/user_permission_model');
        $this->load->model('permissions/group_permission_model');

        $user_id = $this->input->get('user_id');
        $group_id = $this->input->get('group_id');
        if($user_id){
           $rows = $this->user_permission_model->find_all(array('user_id'=>$user_id)); 
           $data['user_id'] = $user_id;
           $data['group_id'] = NULL;
           $data['permission_type'] = 'USER';
        }else{
           $rows = $this->group_permission_model->find_all(array('group_id'=>$group_id)); 
           $data['user_id'] = NULL;
           $data['group_id'] = $group_id;
           $data['permission_type'] = 'GROUP';
        }

        $data['selected'] = array();
        if($rows){
            foreach ($rows as $key => $value) {
                $data['selected'][$key] = $value->perm_id; 
            }
        }

        $data['header'] = lang('users');
        $data['page'] = $this->config->item('template_admin') . "assign_permission";
        $data['module'] = 'users';

        $this->db->where('id <>', 1);
        $data['permissions'] = $this->permission_model->find_all();

        // echo '<pre>'; print_r($data); exit;
        $this->load->view($this->_container,$data);
    }

    public function save_group_or_user_permission_custom()
    {
        // echo '<pre>'; print_r($this->input->post()); exit;
        $type = $this->input->post('type');
        $user_id = $this->input->post('user_id');
        $group_id = $this->input->post('group_id');
        $permissions = $this->input->post('permissions');
        $table = '';
        if($type == 'USER'){
            $this->db->where('user_id',$user_id);
            $this->db->delete('aauth_user_permissions');
            $table = 'aauth_user_permissions';
            $index = 'user_id';
            $index_value = $user_id;
        }else{
            $this->db->where('group_id',$group_id);
            $this->db->delete('aauth_group_permissions');
            $table = 'aauth_group_permissions';
            $index = 'group_id';
            $index_value = $group_id;
        }
        $data = [];
        if($permissions){
            foreach ($permissions as $key => $value) {
                $data[] = array(
                    'perm_id' => $value,
                    $index    => $index_value
                );
            }

            $this->db->insert_batch($table,$data);
            
        }
        echo "<script>window.close();</script>";
    }

    public function delete_json()
    {
        $id = $this->input->post('id');
        $this->user_model->delete($id[0]);
        echo json_encode(true);
    }

        public function get_data()
        {
        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $this->db->select('id');
        $this->db->from('aauth_users');
        $this->db->where('email',$email);
        $this->db->where('id<>',$id);
        $q = $this->db->get();
        $email1 = $q->row();
        $this->db->select('id');
        $this->db->from('aauth_users');
        $this->db->where('username',$username);
        $this->db->where('id<>',$id);
        $q = $this->db->get();
        $user = $q->row();
        if($email1 && $user)
        {
            $success = "emailuser" ;
        }
        else if($email1)
        {
            $success = "email" ;
        }
        else if($user)
        {
            $success = "username";
        }
        else
        {
            $success = true;
        }
        echo json_encode(array('success'=>$success));
        exit();
    }

}