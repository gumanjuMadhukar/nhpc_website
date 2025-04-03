<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        // $this->load->model('customers/customer_model');
        $this->load->library('form_validation');
        $this->load->library('auth/authenticate');
        $this->config->load('auth/aauth');
        // $this->load->helper('project');

        $this->config_vars = $this->config->item('aauth');
        $this->aauth_db = $this->load->database($this->config_vars['db_profile'], TRUE); 

    } 

    // public function customer_get()
    // {

    // }

    private function permission_set()
    {
        $permissions = array('Foc Requests','Discount Schemes','Customers','Dealer Orders','Create Dealer Orders');
        return $permissions;
    }

    public function login_post()
    {
        // echo 'here'; exit;
        $email=$this->input->post('email');
        $pass=$this->input->post('pass');
         // print_r($result);
         // exit;
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');

        if ($this->form_validation->run() == true) 
        {
            $result = $this->authenticate->login($email,$pass);  
            if($result)
            {                
                $res = $result->id;
                $content = $result;
                $token=$this->authenticate->generate_token();
                $this->authenticate->update_token($result->id,$token);
                $status = true;
                $message = 'User Found';
                $account_detail = $this->getAccountDetail($result->id);
                $permission_set = $this->permission_set();
                $permission_array = [];
                $group_id = $this->getGroup($result->id);
                // if($permission_set){
                //     foreach ($permission_set as $key => $value) {
                //         $permission_array[$value] = $this->control_api($value,$content->id);
                //     }
                // }
                // echo '<pre>'; print_r($content); print_r($permission_array); exit;
                $this->response(array('content'=>$content,'token'=>$token,'status'=>$status,'message'=>$message,'user_id'=>$result->id,'group_id'=>$group_id));
            }
            else
            {
                $status = false;
                $message = 'User not Found';
                $this->response(array('status'=>$status,'message'=>$message));
            }
        }
        else
        {
            $status = false;
            $message = validation_errors();
            $this->response(array('status'=>$status,'message'=>$message));
        }
     


    }

    public function getAccountDetail($user_id)
    {
        $this->load->model('account_details/account_detail_model');
        $account_detail = $this->account_detail_model->find(array('user_id'=>$user_id));
        return $account_detail;
        
    }

    public function getGroup($user_id)
    {
        $this->load->model('users/user_group_model');
        $this->db->order_by('group_id','asc');
        $group = $this->user_group_model->find(array('user_id'=>$user_id,'group_id <> 1'=>NULL));
        return $group->group_id;
    }

    public function getDealer()
    {
        $this->load->model('dealers/dealer_model');
        $dealer = $this->dealer_model->find(array('incharge_id'=>$id));
        return $dealer;
    }

    public function generate_token()
    {
        return md5(time().rand());

    }

    public function update_token($id,$token)
    {
        $this->db->set('token',$token);
        $this->db->where('id',$id);
        $this->db->update('aauth_users');
    }

    public function control_api( $perm_par = FALSE, $user_id ){
        // if($this->session->userdata('totp_required')){
        //     flashMsg('error', $this->lang->line('aauth_error_totp_verification_required'));
        //     $this->error($this->lang->line('aauth_error_totp_verification_required'));
        //     redirect($this->config_vars['totp_two_step_login_redirect']);           
        // }

        $perm_id = $this->get_perm_id_api($perm_par);
        // $this->update_activity();
        if ( ! $this->is_allowed_api($perm_id,$user_id) OR ! $this->is_group_allowed_api($perm_id,false,$user_id) ){
            return false;
        } 
        return TRUE;
    }

    public function get_perm_id_api($perm_par) {

        if( is_numeric($perm_par) ) { return $perm_par; }

        $query = $this->aauth_db->where('name', $perm_par);
        $query = $this->aauth_db->get('aauth_permissions');

        if ($query->num_rows() == 0)
            return FALSE;

        $row = $query->row();
        return $row->id;
    }

    public function is_allowed_api($perm_par, $user_id=FALSE){

        

        if($this->is_admin_api($user_id))
        {
            return true;
        }

        $perm_id = $this->get_perm_id_api($perm_par);
        
        $query = $this->aauth_db->where('perm_id', $perm_id);
        $query = $this->aauth_db->where('user_id', $user_id);
        $query = $this->aauth_db->get('aauth_user_permissions' );

        if( $query->num_rows() > 0){
            return TRUE;
        } else {
            $g_allowed=FALSE;
            foreach( $this->get_user_groups_api($user_id) as $group ){
                if ( $this->is_group_allowed_api($perm_id, $group->id,$user_id) ){
                    $g_allowed=TRUE;
                }
            }
            return $g_allowed;
        }
    }

    public function is_group_allowed_api($perm_par, $group_par=FALSE,$user_id){

        $perm_id = $this->get_perm_id_api($perm_par);

        // if group par is given
        if($group_par != FALSE){

            $subgroup_ids = $this->get_subgroups_api($group_par);
            $group_par = $this->get_group_id_api($group_par);
            $query = $this->aauth_db->where('perm_id', $perm_id);
            $query = $this->aauth_db->where('group_id', $group_par);
            $query = $this->aauth_db->get( 'aauth_group_permissions');
            
            $g_allowed=FALSE;
            if(is_array($subgroup_ids)){
                foreach ($subgroup_ids as $g ){
                    if($this->is_group_allowed_api($perm_id, $g->subgroup_id, $user_id)){
                        $g_allowed=TRUE;
                    }
                }
            }

            if( $query->num_rows() > 0){
                $g_allowed=TRUE;
            }
            return $g_allowed;
        }
        // if group par is not given
        // checks current user's all groups
        else {
            // if public is allowed or he is admin
            if ( $this->is_admin_api( $user_id) )
            {return TRUE;}
            /* ORIGINAL
            if ( $this->is_admin( $this->session->userdata('id')) OR
                $this->is_group_allowed($perm_id, $this->config_vars['public_group']) )
            {return TRUE;}
            */
            // if is not login

            $group_pars = $this->get_user_groups_api($user_id);
            foreach ($group_pars as $g ){
                if($this->is_group_allowed_api($perm_id, $g->id,$user_id)){
                    return TRUE;
                }
            }
            return FALSE;
        }
    }

    public function get_user_groups_api($user_id = FALSE){

        if($user_id){
            $this->aauth_db->join('aauth_groups', "id = group_id");
            $this->aauth_db->where('user_id', $user_id);
            //added
            $this->aauth_db->order_by('group_id asc');
            $query = $this->aauth_db->get('aauth_user_groups');

        }
        return $query->result();
    }

    public function get_subgroups_api ( $group_par ) {

        $group_id = $this->get_group_id_api($group_par);

        $query = $this->aauth_db->where('group_id', $group_id);
        $query = $this->aauth_db->select('subgroup_id');
        $query = $this->aauth_db->get('aauth_sub_groups');

        if ($query->num_rows() == 0)
            return FALSE;

        return $query->result();
    }

    public function get_group_id_api ( $group_par ) {

        if( is_numeric($group_par) ) { return $group_par; }

        $query = $this->aauth_db->where('name', $group_par);
        $query = $this->aauth_db->get('aauth_groups');

        if ($query->num_rows() == 0)
            return FALSE;

        $row = $query->row();
        return $row->id;
    }

    public function is_admin_api( $user_id = FALSE ) {

        return $this->is_member_api('Administrator', $user_id);
    }

    public function is_member_api( $group_par, $user_id = FALSE ) {

        // if user_id FALSE (not given), current user
        // if( ! $user_id){
        //     $user_id = $this->CI->session->userdata('id');
        // }

        $group_id = $this->get_group_id_api($group_par);

        $query = $this->aauth_db->where('user_id', $user_id);
        $query = $this->aauth_db->where('group_id', $group_id);
        $query = $this->aauth_db->get($this->config_vars['user_to_group']);

        $row = $query->row();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    // public function customer_delete()
    // {
	   //  //TODO
    // }


    


}