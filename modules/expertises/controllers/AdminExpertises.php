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
 * Expertises
 *
 * Extends the Project_Controller class
 * 
 */

class AdminExpertises extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Expertises');

        $this->load->model('expertises/expertise_model');
        $this->lang->load('expertises/expertise');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('expertises');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'expertises';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->expertise_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->expertise_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$offset = $this->input->post('start');
		$limit = $this->input->post('length');
		if($limit < 0){
			$limit = NULL;
		}
		$order_col = $this->input->post('order[0][column]');
		$order_dir = $this->input->post('order[0][dir]');
		$orderable = $this->input->post('columns['. $order_col . '][orderable]');
		if($orderable == 'true'){
			$order_col_name = $this->input->post('columns['. $order_col . '][name]');
		}else{
			$order_col_name = 'first_name';
			$order_dir = 'asc';
		}
		$order = $order_col_name . ' ' . $order_dir;
		$rows=$this->expertise_model->find_all($where, '*', $order, $offset, $limit);
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
			$this->db->or_where('data_expertise.id', $params['search']['value']);
			$this->db->or_like('data_expertise.first_name', $params['search']['value']);
			$this->db->or_like('data_expertise.middle_name', $params['search']['value']);
			$this->db->or_like('data_expertise.last_name', $params['search']['value']);
			$this->db->or_like('data_expertise.first_name_np', $params['search']['value']);
			$this->db->or_like('data_expertise.middle_name_np', $params['search']['value']);
			$this->db->or_like('data_expertise.last_name_np', $params['search']['value']);
			$this->db->or_where('data_expertise.province_id', $params['search']['value']);
			$this->db->or_where('data_expertise.district_id', $params['search']['value']);
			$this->db->or_where('data_expertise.city_place_id', $params['search']['value']);
			$this->db->or_where('data_expertise.ward', $params['search']['value']);
			$this->db->or_like('data_expertise.address', $params['search']['value']);
			$this->db->or_where('data_expertise.temp_province_id', $params['search']['value']);
			$this->db->or_where('data_expertise.temp_district_id', $params['search']['value']);
			$this->db->or_where('data_expertise.temp_city_place_id', $params['search']['value']);
			$this->db->or_where('data_expertise.temp_ward', $params['search']['value']);
			$this->db->or_like('data_expertise.temp_address', $params['search']['value']);
			$this->db->or_like('data_expertise.phone', $params['search']['value']);
			$this->db->or_like('data_expertise.mobile', $params['search']['value']);
			$this->db->or_like('data_expertise.email', $params['search']['value']);
			$this->db->or_like('data_expertise.level', $params['search']['value']);
			$this->db->or_like('data_expertise.qualification', $params['search']['value']);
			$this->db->or_like('data_expertise.registration_no', $params['search']['value']);
			$this->db->or_like('data_expertise.subject', $params['search']['value']);
			$this->db->or_like('data_expertise.experiance', $params['search']['value']);
			$this->db->or_like('data_expertise.doc_cv', $params['search']['value']);
			$this->db->or_like('data_expertise.doc_certificate', $params['search']['value']);

			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->expertise_model->insert($data);
        }
        else
        {
            $success=$this->expertise_model->update($data['id'],$data);
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
		$data['created_at'] = $this->input->post('created_at');
		$data['updated_at'] = $this->input->post('updated_at');
		$data['deleted_at'] = $this->input->post('deleted_at');
		$data['created_by'] = $this->input->post('created_by');
		$data['updated_by'] = $this->input->post('updated_by');
		$data['deleted_by'] = $this->input->post('deleted_by');
		$data['first_name'] = $this->input->post('first_name');
		$data['middle_name'] = $this->input->post('middle_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['first_name_np'] = $this->input->post('first_name_np');
		$data['middle_name_np'] = $this->input->post('middle_name_np');
		$data['last_name_np'] = $this->input->post('last_name_np');
		$data['province_id'] = $this->input->post('province_id');
		$data['district_id'] = $this->input->post('district_id');
		$data['city_place_id'] = $this->input->post('city_place_id');
		$data['ward'] = $this->input->post('ward');
		$data['address'] = $this->input->post('address');
		$data['temp_province_id'] = $this->input->post('temp_province_id');
		$data['temp_district_id'] = $this->input->post('temp_district_id');
		$data['temp_city_place_id'] = $this->input->post('temp_city_place_id');
		$data['temp_ward'] = $this->input->post('temp_ward');
		$data['temp_address'] = $this->input->post('temp_address');
		$data['phone'] = $this->input->post('phone');
		$data['mobile'] = $this->input->post('mobile');
		$data['email'] = $this->input->post('email');
		$data['profile_image'] = $this->input->post('profile_image');
		$data['level'] = $this->input->post('level');
		$data['qualification'] = $this->input->post('qualification');
		$data['registration_no'] = $this->input->post('registration_no');
		$data['subject'] = $this->input->post('subject');
		$data['experiance'] = $this->input->post('experiance');
		$data['doc_cv'] = $this->input->post('doc_cv');
		$data['doc_certificate'] = $this->input->post('doc_certificate');
		$data['remark'] = $this->input->post('remark');

        return $data;
   	}

   	public function profile($id='')
   	{
   		$this->otherdb = $this->load->database('app', TRUE);

   		$this->expertise_model->_table = 'view_experts';
   		$where['id'] = $id;
   		$data['row'] = $this->expertise_model->find($where);

   		$this->otherdb->where('id', $data['row']->level);
   		$data['level'] = $this->otherdb->get('level')->row_array();
   		$this->otherdb->where('id', $data['row']->subject);
        $data['subject'] = $this->otherdb->get('program')->row_array();
   		$this->otherdb->where('id', $data['row']->qualification);
        $data['qualification'] = $this->otherdb->get('program')->row_array();

   		// Display Page
		$data['header'] = lang('expertises');
		$data['page'] = $this->config->item('template_admin') . "profile";
		$data['module'] = 'expertises';
		$this->load->view($this->_container,$data);
   	}

   	public function export_excel()
   	{
   		$where = array();
    	$data = $this->expertise_model->find_all($where);
    	/*echo '<pre>';
    	print_r($data);
    	exit;*/

    	$output = "
	    	<table border='1'>
	    		<tr>
	    			<td colspan=13 style='text-align:center'>LISTS of  EXPERTS </td>
	    		</tr>
	    		<tr>
	    			<td></td>
	    			<td>Academic Program</td>
	    			<td colspan=2></td>
	    			<td>Level</td>
	    			<td colspan=2>PCL/BACHELOR/MASASTER </td>
	    		</tr>
    			<thead>
    				<th>SN</th>
    				<th>Name of Expert memeber</th>
    				<th>Verified Position</th>
    				<th>Institutional Affiliation</th>
    				<th>Institutional Address</th>
    				<th>Academic Qualification</th>
    				<th>Specialization</th>
    				<th>Courses involved/area of expertise</th>
    				<th>Years of academic/reseach /service experiences</th>
    				<th>Academic Program</th>
    				<th>Academic Level (PCL, Bachelor, Master)</th>
    				<th>Contact number</th>
    				<th>Contact mail</th>
    				<th>Applied Date</th>
				</thead>
				<tbody>";
		foreach ($data as $key => $value) {
			$output .= "
				<tr>
					<td>". ($key + 1) ."</td>
					<td>". $value->first_name. ' ' . $value->middle_name . ' ' . $value->last_name ."</td>
					<td>". $value->verified_position ."</td>
					<td>". $value->institutional_affilation ."</td>
					<td>". $value->institutional_address ."</td>
					<td>". $value->subject ."</td>
					<td>". $value->specialization ."</td>
					<td>". $value->area_of_expertise ."</td>
					<td>". $value->experiance ."</td>
					<td>". $value->subject ."</td>
					<td>". $value->level ."</td>
					<td>". $value->mobile ."</td>
					<td>". $value->email ."</td>
					<td>". $value->created_at ."</td>
				</tr>
			";
		}
		$output .= "
					<tr>
						<td colspan=13>Remarks	Verified Position-  Must be verified by the respective university for bachelor and master degree programs and from CTEVT for the PCL Level Courses;or  Level defined by MOHP/freelancer</td>
					</tr>
					<tr>
						<td></td>
						<td colspan=2>Institutional Affiliation :</td>
						<td colspan=10>Working institution and the university/CTEVT, MOHP and/ or Freelancer  </td>
					</tr>
					<tr>
						<td></td>
						<td colspan=2>Academic Qualification: </td>
						<td colspan=10>Master and Above for University level Program and Bachelor and Above for PCL level Programs</td>
					</tr>
					<tr>
						<td></td>
						<td colspan=2>Course involved/expertise  </td>
						<td colspan=10>Enlist the courses in which you are involved in teaching/learning and training/research</td>
					</tr>
					<tr>
						<td>Note: </td>
						<td colspan=12>Separate sheet has to be filled  by a sngle candidate in case he/she is the faculy member/involvement in  multiple programs</td>
					</tr>
				</tbody>
			</table>";
		

		header("Content-Type: application/force-download"); //application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=expertises.xls");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		echo $output;

   	}
}