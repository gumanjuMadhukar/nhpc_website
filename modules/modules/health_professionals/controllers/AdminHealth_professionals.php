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
 * Health_professionals
 *
 * Extends the Project_Controller class
 * 
 */

class AdminHealth_professionals extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Health Professionals');

        $this->load->model('health_professionals/health_professional_model');
        $this->lang->load('health_professionals/health_professional');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('health_professionals');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'health_professionals';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->health_professional_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->health_professional_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->health_professional_model->find_all($where,'*',null,$this->input->post('start'),$this->input->post('length'));
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
$this->db->or_like('mst_health_professionals.first_name', $params['search']['value']);
// $this->db->or_like('mst_health_professionals.middle_name', $params['search']['value']);

			$this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->health_professional_model->insert($data);
        }
        else
        {
            $success=$this->health_professional_model->update($data['id'],$data);
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
		$data['first_name'] = $this->input->post('first_name');
		$data['middle_name'] = $this->input->post('middle_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['first_name_nepali'] = $this->input->post('first_name_nepali');
		$data['middle_name_nepali'] = $this->input->post('middle_name_nepali');
		$data['last_name_nepali'] = $this->input->post('last_name_nepali');
		$data['sex'] = $this->input->post('sex');
		$data['father_name'] = $this->input->post('father_name');
		$data['father_name_nepali'] = $this->input->post('father_name_nepali');
		$data['mother_name'] = $this->input->post('mother_name');
		$data['mother_name_nepali'] = $this->input->post('mother_name_nepali');
		$data['grand_father_name_nepali'] = $this->input->post('grand_father_name_nepali');
		$data['grand_father_name'] = $this->input->post('grand_father_name');
		$data['DOB'] = $this->input->post('DOB');
		$data['year_dob_nepali_date'] = $this->input->post('year_dob_nepali_date');
		$data['month_dob_nepali_date'] = $this->input->post('month_dob_nepali_date');
		$data['day_dob_nepali_date'] = $this->input->post('day_dob_nepali_date');
		$data['marital_status'] = $this->input->post('marital_status');
		$data['husband_wife_name'] = $this->input->post('husband_wife_name');
		$data['email'] = $this->input->post('email');
		$data['phone_id'] = $this->input->post('phone_id');
		$data['development_region_id'] = $this->input->post('development_region_id');
		$data['zone_id'] = $this->input->post('zone_id');
		$data['district_id'] = $this->input->post('district_id');
		$data['vdc_municipality_nepali'] = $this->input->post('vdc_municipality_nepali');
		$data['vdc_municipality_english'] = $this->input->post('vdc_municipality_english');
		$data['ward_number_nepali'] = $this->input->post('ward_number_nepali');
		$data['ward_number'] = $this->input->post('ward_number');
		$data['tol'] = $this->input->post('tol');
		$data['photo_link'] = $this->input->post('photo_link');
		$data['student_id'] = $this->input->post('student_id');
		$data['level_id'] = $this->input->post('level_id');
		$data['program_id'] = $this->input->post('program_id');
		$data['hospital'] = $this->input->post('hospital');
		$data['academic_year'] = $this->input->post('academic_year');
		$data['board_registration_number'] = $this->input->post('board_registration_number');
		$data['college_id'] = $this->input->post('college_id');
		$data['ethinic_id'] = $this->input->post('ethinic_id');
		$data['cast_id'] = $this->input->post('cast_id');
		$data['current_status'] = $this->input->post('current_status');
		$data['applied_date'] = $this->input->post('applied_date');
		$data['applied_date_nepali'] = $this->input->post('applied_date_nepali');
		$data['crn'] = $this->input->post('crn');
		$data['temp_registration_number'] = $this->input->post('temp_registration_number');
		$data['registration_number'] = $this->input->post('registration_number');
		$data['status'] = $this->input->post('status');
		$data['created_date'] = $this->input->post('created_date');
		$data['approved_level'] = $this->input->post('approved_level');
		$data['international_college'] = $this->input->post('international_college');
		$data['category_id'] = $this->input->post('category_id');
		$data['citizenship_number'] = $this->input->post('citizenship_number');
		$data['updated_date'] = $this->input->post('updated_date');
		$data['date_'] = $this->input->post('date_');

        return $data;
   }

    public function delete_json()
    {
        $id = $this->input->post('id');
        $this->health_professional_model->delete($id[0]);
        echo json_encode(true);
    }
}