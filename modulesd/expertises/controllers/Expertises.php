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
 * Extends the Public_Controller class
 * 
 */

class Expertises extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Expertises');

        $this->load->model('expertises/expertise_model');
        $this->load->model('provinces/province_model');
        $this->load->model('district_mvs/district_mv_model');
        $this->load->model('city_places/city_place_model');
        $this->lang->load('expertises/expertise');
    }

    public function index()
	{
        $this->otherdb = $this->load->database('app', TRUE);
        $data['provinces'] = $this->province_model->find_all();
        $data['district_mvs'] = $this->district_mv_model->find_all(array('type'=>'district'));
        // echo $this->db->last_query();
        // exit;
        $data['city_places'] = $this->district_mv_model->find_all(array("type = 'VDC' OR type = 'MUNICIPALITY'"=> NULL));
        $this->otherdb->where('id <> 3 ');
        $this->otherdb->order_by('id DESC');
        // $data['level'] = $this->otherdb->get('level')->result_array();
        $this->otherdb->where('level_id <> 3');
        // $this->otherDB->where('id not in(40, 41,42,43,44,45,46,)');
        $this->otherdb->order_by('level_id DESC');
        $data['subject'] = $this->otherdb->get('program')->result_array();
        // echo '<pre>';
        // echo $this->otherdb->last_query();
        // print_r($data['subject']);
        // exit;
		// Display Page
		$data['header'] = lang('expertises');
		$data['page'] = $this->config->item('template_public') . "expertises/index";
		$data['module'] = 'expertises';
		$this->load->view($this->_container,$data);
	}

    public function save()
    {
        $data=$this->_get_posted_data(); //Retrive Posted Data
        // $data['profile_image'] = $this->do_upload('profile_image', 'jpg|png|jpeg|JPG|PNG|JPEG|pdf|PDF', 'profile_image');
        // $data['doc_cv'] = $this->do_upload('doc_cv', 'jpg|png|jpeg|JPG|PNG|JPEG|pdf|PDF', 'doc_cv');
        // $data['doc_certificate'] = $this->do_upload('doc_certificate', 'jpg|png|jpeg|JPG|PNG|JPEG|pdf|PDF', 'doc_certificate');
        // $data['certificate_back'] = $this->do_upload('certificate_back', 'jpg|png|jpeg|JPG|PNG|JPEG|pdf|PDF', 'certificate_back');

        if(!$this->input->post('id'))
        {
            // $success=$this->expertise_model->insert($data);
            $success = $this->db->insert('data_expertise', $data);
        }
        else
        {
            // $success=$this->expertise_model->update($data['id'],$data);
            $this->db->where('id', $data['id']);
            $success=$this->db->update('data_expertise',$data['id'],$data);
        }

        if($success)
        {
            $success = TRUE;
            $msg=lang('general_success');

            // Display Page
            $data['header'] = lang('expertises');
            $data['page'] = $this->config->item('template_public') . "expertises/success";
            $data['module'] = 'expertises';
            $this->load->view($this->_container,$data);
        }
        else
        {
            $success = FALSE;
            $data['msg']=lang('general_failure');
            // Display Page
            $data['header'] = lang('expertises');
            $data['page'] = $this->config->item('template_public') . "expertises/failure";
            $data['module'] = 'expertises';
            $this->load->view($this->_container,$data);
        }


         // echo json_encode(array('msg'=>$msg,'success'=>$success));
         // exit;
    }

    private function _get_posted_data()
   {
        $data=array();
        if($this->input->post('id')) {
            $data['id'] = $this->input->post('id');
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        // $data['deleted_at'] = $this->input->post('deleted_at');
        // $data['created_by'] = $this->input->post('created_by');
        // $data['updated_by'] = $this->input->post('updated_by');
        // $data['deleted_by'] = $this->input->post('deleted_by');
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
        $data['subject'] = implode(', ', $this->input->post('subject'));
        $data['experiance'] = $this->input->post('experiance');
        $data['doc_cv'] = $this->input->post('doc_cv');
        $data['doc_certificate'] = $this->input->post('doc_certificate');
        $data['remark'] = $this->input->post('remark');
        $data['verified_position'] = $this->input->post('verified_position');
        $data['institutional_affilation'] = $this->input->post('institutional_affilation');
        $data['institutional_address'] = $this->input->post('institutional_address');
        $data['applied_qualification'] = $this->input->post('applied_qualification');
        $data['specialization'] = $this->input->post('specialization');
        $data['area_of_expertise'] = $this->input->post('area_of_expertise');

        return $data;
   }

   public function do_upload($input_file, $accepted_type = 'jpg|png|pdf|jpeg|JPG|PNG|PDF|JPEG', $doc_type=NULL)
    {
        $folder_name = ($doc_type)?'./uploads/experties/'.$doc_type.'/':'./uploads/experties/';
        $thumb_folder = $folder_name.'thumb';
        if (!file_exists($folder_name)) {
            mkdir($folder_name, 777, true);
        }
        if (!file_exists($thumb_folder)) {
            mkdir($thumb_folder, 777, true);
        }
        $config['upload_path']          = $folder_name;
        $config['allowed_types']        = $accepted_type;
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $config['file_name']         = $input_file;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($input_file))
        {
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
                exit;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $file_ext = $this->upload->data('file_ext');
            if(in_array($file_ext, array('.jpg', '.png', '.jpeg', '.JPG', '.PNG', '.JPEG'))){
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->data('full_path');
                // $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['height']       = 100;
                $config['new_image']       = $thumb_folder;

                $this->load->library('image_lib', $config);

                if ( ! $this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                    exit;
                }
            }
            return $this->upload->data('file_name'); 
        }
    }
}