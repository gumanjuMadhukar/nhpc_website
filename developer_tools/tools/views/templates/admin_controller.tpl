{PHP_TAG} 
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
 * {CONTROLLER_NAME}
 *
 * Extends the Project_Controller class
 * 
 */

class Admin{CONTROLLER_NAME} extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('{MODULE_UCFIRST}');

        $this->load->model('{MODULE}/{MODEL}');
        $this->lang->load('{MODULE}/{LANG}');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('{MODULE}');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = '{MODULE}';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->{MODEL}->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->{MODEL}->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->{MODEL}->find_all($where);
		$rows = json_decode(json_encode($rows),TRUE);

		echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
		exit;
	}

	public function _get_search_params($params)
	{
		/*$where =  NULL;
		foreach ($params['columns'] as $value) {
			if($value['searchable'] == 'true'){
				if($params['search']['value'] != '')
				{
					$where .= $value["name"].' like "%'.$params['search']['value'].'%" '.' OR ';
					// $this->db->or_where(array($value["name"].' like'=>'%'.$params['search']['value'].'%'));
				}

				// if($value['search']['value'] != '')
				// {
				// 	$temp = explode(',', $value['search']['value']);
				// 	$this->db->where_in($value['name'],$temp);
				// }
			}
		}

		if($where != NULL){
			$where = preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
			$where = '('.$where.')';

		}

		return $where;   	           
		// echo '<pre>'; print_r($where); exit;*/

		if($params['search']['value'] != ''){
			$this->db->group_start();
			{SEARCH_PARAMS}
			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('{PRIMARY_KEY}'))
        {
            $success=$this->{MODEL}->insert($data);
        }
        else
        {
            $success=$this->{MODEL}->update($data['{PRIMARY_KEY}'],$data);
        }

		if($success)
		{
			$success = TRUE;
			$msg=lang('general_success');
		}
		else
		{
			$success = FALSE;
			$msg=lang('general_failure');
		}

		 echo json_encode(array('msg'=>$msg,'success'=>$success));
		 exit;
	}

   private function _get_posted_data()
   {
   		$data=array();
   		if($this->input->post('id')) {
			$data['id'] = $this->input->post('id');
		}
{POSTED_DATA}
        return $data;
   }
}