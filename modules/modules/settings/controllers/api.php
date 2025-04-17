<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('setting/setting_model');
    }

    public function setting_get()
    {
    	//TODO
    }

    public function setting_post()
    {
	    //TODO
    }

    public function setting_delete()
    {
	    //TODO
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


}