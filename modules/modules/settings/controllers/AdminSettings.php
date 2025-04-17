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
 * Settings
 *
 * Extends the Project_Controller class
 * 
 */

class AdminSettings extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Settings');

        $this->load->model('settings/setting_model');
        $this->lang->load('settings/setting');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('settings');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'settings';
		$rows = $this->setting_model->find_all();
		$new_row = array();
		foreach($rows as $key => $value)
		{
			if($value->key == 'contact_detail')
			{
				$new_row['contact_detail'] = $value->value;
			}
			if($value->key == 'announcement_title')
			{
				$new_row['announcement_title'] = $value->value;
			}
			if($value->key == 'announcement_description')
			{
				$new_row['announcement_description'] = $value->value;
			}
			if($value->key == 'announcement_link')
			{
				$new_row['announcement_link'] = $value->value;
			}
			if($value->key == 'facebook')
			{
				$new_row['facebook'] = $value->value;
			}
			if($value->key == 'twitter')
			{
				$new_row['twitter'] = $value->value;
			}
			if($value->key == 'covid_name')
			{
				$new_row['covid_name'] = $value->value;
			}
			if($value->key == 'covid_description')
			{
				$new_row['covid_description'] = $value->value;
			}
			if($value->key == 'covid_document')
			{
				$new_row['covid_document'] = $value->value;
			}
			if($value->key == 'contact_map')
			{
				$new_row['contact_map'] = $value->value;
			}
		}
		$data['setting_data'] = $new_row;
		$this->load->view($this->_container,$data);
	}


	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data
        $this->db->where('id',1);
        $data_cd['value'] = $data['contact_detail'];
        $this->db->update('mst_setting',$data_cd);
        $this->db->where('id',2);
        $data_fb['value'] = $data['facebook'];
        $this->db->update('mst_setting',$data_fb);
        $this->db->where('id',3);
        $data_tw['value'] = $data['twitter'];
        $this->db->update('mst_setting',$data_tw);
        $this->db->where('id',4);
        $data_at['value'] = $data['announcement_title'];
        $this->db->update('mst_setting',$data_at);
        $this->db->where('id',5);
        $data_ad['value'] = $data['announcement_description'];
        $this->db->update('mst_setting',$data_ad);
        $this->db->where('id',6);
        $data_al['value'] = $data['announcement_link'];
        $this->db->update('mst_setting',$data_al);
        $this->db->where('id',7);
        $data_cn['value'] = $data['covid_name'];
        $this->db->update('mst_setting',$data_cn);
        $this->db->where('id',8);
        $data_cd['value'] = $data['covid_description'];
        $this->db->update('mst_setting',$data_cd);
        $this->db->where('id',9);
        $data_cdo['value'] = $data['covid_document'];
        $this->db->update('mst_setting',$data_cdo);
        $this->db->where('id',10);
        $data_cm['value'] = $data['contact_map'];
        $this->db->update('mst_setting',$data_cm);
     	return redirect('admin/Settings');
        die();
	}

   private function _get_posted_data()
   {
   		$data=array();
		$data['contact_detail'] = $this->input->post('contact_detail');
		$data['announcement_title'] = $this->input->post('announcement_title');
		$data['announcement_link'] = $this->input->post('announcement_link');
		$data['announcement_description'] = $this->input->post('announcement_description');
		$data['covid_name'] = $this->input->post('covid_name');
		$data['covid_description'] = $this->input->post('covid_description');
		$data['covid_document'] = $this->input->post('documents');
		$data['contact_map'] = $this->input->post('contact_map');
		$data['facebook'] = $this->input->post('facebook');
		$data['twitter'] = $this->input->post('twitter');
        return $data;
   }

   	public function upload_pdf()
   	{
		$config['upload_path'] = "./uploads/covid_pdf";
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '80002400';
		//load upload library
		$this->load->library('upload');
		$this->upload->initialize($config);
		$uploaded = $this->upload->do_upload('document');
		if(!$uploaded)
		{
			$data['error'] = $this->upload->display_errors('','');
		}
		else
		{
			$data = $this->upload->data();
			echo json_encode($data);	
		}
	}

	function upload_delete()
	{
		//get filename
		$filename = $this->input->post('filename');
		@unlink('uploads/covid_pdf/' . $filename);
	}
}