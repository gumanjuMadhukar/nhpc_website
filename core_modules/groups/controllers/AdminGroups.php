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

class AdminGroups extends Project_Controller
{
	public function __construct(){
		parent::__construct();

		control('Groups');

		$this->load->model('groups/group_model');
        $this->load->model('users/user_group_model');
        $this->load->model('users/user_model');
		$this->lang->load('groups/group');
	}

	public function index()
	{
		// Display Page
		$data['header'] = lang('groups');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'groups';
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
        $where = array();

        $params = $this->input->post(); 
		// $this->_get_search_param();
        
        $this->db->where('id >', 2);
		
        $total=$this->group_model->find_count();


        $this->_get_search_params($params);

        $this->db->where('id >', 2);
        
        $filter_total=$this->group_model->find_count();
		
        // paging('id');
		
        $this->_get_search_params($params);
        
        $this->db->where('id >', 2);

        $rows=$this->group_model->find_all(null,null,null,$this->input->post('start'),$this->input->post('length'));
		// echo json_encode(array('total'=>$total,'rows'=>$rows));
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
        // print_r($data); exit;
        extract($data);

        $this->db->trans_begin();
        $mode = $this->input->post('mode');
        if($mode == 'insert')
        {
        	$success=$this->aauth->create_group($id,$name,$definition);
        }
        else
        {
        	$success=$this->aauth->update_group($id,$name,$definition);
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
    	$data['name'] = $this->input->post('name');
    	$data['definition'] = $this->input->post('definition');

    	return $data;
    }

	public function delete_group()
    {
        $this->db->trans_begin();

        $this->aauth->delete_group($this->input->post('id'));

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

    public function get_group_users()
    {
        $jsonArray = array();

        $group_id = $this->input->post('id');
        
        //following group has user to $user_id
        $this->db->where('group_id', $group_id);
         // $this->db->where('user_id <>', 1);

        
        $this->user_group_model->_table = 'view_user_groups';
        
        $results = $this->user_group_model->find_all();

        $jsonArray['involved_users'] = $results;

        $group_users_array = array();

        if (count($results) > 0){
            foreach($results as $row) {
                $group_users_array[]= $row->user_id;
            }
            $this->db->where_not_in('id', $group_users_array);
        }

        //following group has no user to $user_id
        $this->db->where_not_in('id', array(1));
        $results = $this->user_model->find_all(null, array('id','username','email'));
        $jsonArray['not_involved_users'] = $results;

        echo json_encode($jsonArray);
        exit;
    }

    public function save_group_users() {
        $group_id = $this->input->post('group_id');
        $users = $this->input->post('involved_users_ids');

        $this->db->trans_begin();

        $this->user_group_model->delete_by(array('group_id' => $group_id));

        if ($users != '') {
            $users = explode(",", $users);
            $insertArray = array();

            foreach ($users as $user) {
                $temp = array();
                $temp['group_id'] = $group_id;
                $temp['user_id'] = $user;
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

     public function delete_json()
    {
        $id = $this->input->post('id');
        $this->group_model->delete($id[0]);
        echo json_encode(true);
    }
}