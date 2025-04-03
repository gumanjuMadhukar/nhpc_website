<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('groups/group_model');
        $this->load->model('users/user_model');
        $this->load->model('users/user_group_model');
        $this->lang->load('users/user');

        $this->config_vars = $this->config->item('aauth');
        // $this->aauth_db = $this->load->database($this->config_vars['db_profile'], TRUE); 

    } 

    private function check_token()
    {
        $token='';
        foreach (getallheaders() as $name => $value) {
            if($name == 'user_token'){
                $token = $value;
            }
        }
        if(!$token){
            echo json_encode(array('code'=>'101','success'=>false,'msg'=>'Access denied'));
            exit;
        }else{
            $where_token['token'] = $token;
            $user = $this->user_model->find_all($where_token);
            if(count($user)){
                return true;                
            }else{
                echo json_encode(array('code'=>'101','success'=>false,'msg'=>'Access denied'));
                exit;
            }
        }
    }

    public function user_post()
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
        if($this->input->post('id')){
            $data['id'] = $this->input->post('id');
        }
        $data['email'] = $this->input->post('email');
        $data['username'] = $this->input->post('username');
        $data['fullname'] = $this->input->post('fullname');
        $data['password'] = $this->input->post('password');
        return $data;
    }
}