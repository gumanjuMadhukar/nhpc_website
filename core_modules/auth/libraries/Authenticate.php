<?php

class Authenticate
{
	/**
	 * The CodeIgniter object variable
	 * @access public
	 * @var object
	 */
	public $CI;

	/**
	 * Variable for loading the config array into
	 * @access public
	 * @var array
	 */
	public $config_vars;

	/**
	 * Array to store error messages
	 * @access public
	 * @var array
	 */
	public $errors = array();

	/**
	 * Array to store info messages
	 * @access public
	 * @var array
	 */
	public $infos = array();
	
	/**
	 * Local temporary storage for current flash errors
	 *
	 * Used to update current flash data list since flash data is only available on the next page refresh
	 * @access public
	 * var array
	 */
	public $flash_errors = array();

	/**
	 * Local temporary storage for current flash infos
	 *
	 * Used to update current flash data list since flash data is only available on the next page refresh
	 * @access public
	 * var array
	 */
	public $flash_infos = array();

	/**
     * The CodeIgniter object variable
	 * @access public
     * @var object
     */
    public $aauth_db;

	########################
	# Base Functions
	########################

	/**
	 * Constructor
	 */
		public function __construct()
	{

		$this->CI = & get_instance();	
		if(CI_VERSION >= 2.2){
			$this->CI->load->library('driver');
		}	
		$this->CI->load->library('encryption');
		$this->CI->load->library('session');
		$this->CI->load->library('email');
		$this->CI->load->helper('url');
		$this->CI->load->helper('string');
		$this->CI->load->helper('email');
		$this->CI->load->helper('language');
		$this->CI->load->helper('auth/recaptchalib');
		$this->CI->load->helper('auth/googleauthenticator');
		$this->CI->lang->load('auth/aauth');

		// $this->aauth_db = $this->CI->load->database($this->config_vars['db_profile'], TRUE); 
		

		$this->CI->config->load('auth/aauth');
		$this->config_vars = $this->CI->config->item('aauth');
	}

	public function member_register($username,$fullname,$email,$pass,$mobile,$address)
	{				
		   $data_profile = array(
            'email' => $email,
            'pass' => $this->hash_password($pass, 0), // Password cannot be blank but user_id required for salt, setting bad password for now
            'username' => $username,
            'mobile' => $mobile,
            'address' => $address,
            'date_created' => date("Y-m-d H:i:s"),
            'fullname' => $fullname,       
            'points' =>20,  
        );		  
		$this->CI->db->trans_start();
        $this->CI->db->insert('aauth_users', $data_profile);
        $id = $this->CI->db->insert_id();
        	$this->add_member($id);
            $update_data =array(
     			  'pass' => $this->hash_password($pass, $id),
        );    
             $cond=array(
                    'id' => $id
                   

                    );
             $this->CI->db->update('aauth_users',$update_data,$cond);
             $this->CI->db->trans_complete();        
             return $this->CI->db->trans_status();

	}

	public function login($email,$pass)
	{


		$this->CI->db->select("*");
        $this->CI->db->from('aauth_users u');
        $this->CI->db->where('u.username',$email);
        $query = $this->CI->db->get();
        if($query->num_rows() > 0)
        {
        $row = $query->row();        	
        }
        else
        {
        	return FALSE;
        }
        
		$password = ($this->config_vars['use_password_hash'] ? $pass : $this->hash_password($pass, $row->id));
		
		// print_r($this->config_vars['use_password_hash']);
		// print_r($password);
  //       exit();
		if($this->verify_password($password, $row->pass))
		{
			return $row;
		}
		else
		{
			// flashMsg('error', $this->CI->lang->line('aauth_error_login_failed_name'));
			// $this->error($this->CI->lang->line('aauth_error_login_failed_name'));
			return FALSE;
		}			
	}

	function hash_password($pass, $userid) {
		// var_dump($this->CI->config->item('aauth'));
		// exit();
		if($this->config_vars['use_password_hash']){
			return password_hash($pass, $this->CI->config_vars['password_hash_algo'], $this->config_vars['password_hash_options']);
		}else{
			$salt = md5($userid);		
			return hash($this->config_vars['hash'], $salt.$pass);
		}
	}

	function verify_password($password, $hash) {
		if($this->config_vars['use_password_hash']){
			return password_verify($password, $hash);
		}else{
			return ($password == $hash ? TRUE : FALSE);
		}
	}

	 public function generate_token()
    {
        return md5(time().rand());

    }

    public function update_token($id,$token)
    {
        $this->CI->db->set('token',$token);
        $this->CI->db->where('id',$id);
        $this->CI->db->update('aauth_users');
	}

	public function get_profiles($id)
	{
        $this->CI->db->select("*");
        $this->CI->db->from('aauth_users');
        $this->CI->db->where('id',$id);
        $query = $this->CI->db->get();
        if ($query->num_rows() > 0) 
        {
            return $query->row();
        }
        return false;
    }   

    public function update_profile($id,$email,$fullname,$mobile,$address,$image)
    {
    	$data_profile = array('email' => $email, 'fullname' => $fullname,'mobile' => $mobile,'address' => $address,'image' => $image);
    	$this->CI->db->where('id', $id);
        $query=$this->CI->db->update('aauth_users', $data_profile);
        if($query)
            return true;
        else
            return false;
    }

    public function get_outlets()
    {
    	$this->CI->db->select("*");
    	$this->CI->db->from('outlet');
    	$q = $this->CI->db->get();
    	if($q->num_rows() > 0)
    	{
    		return $q->result();
    	}
    	return false;
    }
    

    public function get_items($category_id)
    {
    	// print_r($category_id);
    	// exit();
    	$this->CI->db->select("*");
    	$this->CI->db->from('item');
    	$this->CI->db->where('category_id',$category_id);
    	$q = $this->CI->db->get();
    	if($q->num_rows() > 0)
    	{
    		return $q->result();
    	}
    	return false;
    }
    

    
    public function get_category()
    {
    	$this->CI->db->select("*");
    	$this->CI->db->from('category');
    	$q = $this->CI->db->get();
    	if($q->num_rows() > 0)
    	{
    		return $q->result();
    	}
    	return false;
    }
     public function get_transaction($id,$month_id)
    {
        $this->CI->db->select("*");
        $this->CI->db->from('view_transaction');
        $this->CI->db->where('customer_id',$id);
        $this->CI->db->where('month',$month_id);
        $this->CI->db->where('date >= DATE_SUB(NOW(), INTERVAL 12 MONTH)');
        $q = $this->CI->db->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return false;
    }
    
     public function get_transaction_month($id)
    {
        $this->CI->db->select("month");
        $this->CI->db->from('view_transaction');
        $this->CI->db->where('customer_id',$id);
        $this->CI->db->where('date >= DATE_SUB(NOW(), INTERVAL 12 MONTH)');
        $this->CI->db->group_by('month');
        $q = $this->CI->db->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return false;
    }

      public function get_transaction_detail($transaction_id)
    {
        $this->CI->db->select("*");
        $this->CI->db->from('view_itemtransaction');
        $this->CI->db->where('transaction_id',$transaction_id);
        $q = $this->CI->db->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return false;
    }
    public function add_member($id)
    {
    	$data = array(
    			'user_id' => $id,
    			'group_id' => 1
    	);
    	$this->CI->db->trans_start();
    	$this->CI->db->insert('aauth_user_groups',$data);
    	$data1 = array(
    			'user_id' => $id,
    			'group_id' => 102
    	);    	
    	$this->CI->db->insert('aauth_user_groups',$data1);
    	$this->CI->db->trans_complete();        
        return $this->CI->db->trans_status();



    }


}


?>