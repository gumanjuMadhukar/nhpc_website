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
 * Admitcards
 *
 * Extends the Project_Controller class
 * 
 */

class AdminAdmitcards extends Admin_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('Admitcards');

        $this->load->model('admitcards/admitcard_model');
        $this->lang->load('admitcards/admitcard');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('admitcards');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'admitcards';
		$this->load->view($this->_container,$data);
	}


	public function json()
	{
		$where = array();
		$params = $this->input->post(); 

		$total=$this->admitcard_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->admitcard_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$rows=$this->admitcard_model->find_all($where);
		$rows = json_decode(json_encode($rows),TRUE);

		echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
		exit;
	}

	public function _get_search_params($params)
	{
		// $where =  NULL;
		// foreach ($params['columns'] as $value) {
		// 	if($value['searchable'] == 'true'){
		// 		if($params['search']['value'] != '')
		// 		{
		// 			$where .= $value["name"].' like "%'.$params['search']['value'].'%" '.' OR ';
		// 			// $this->db->or_where(array($value["name"].' like'=>'%'.$params['search']['value'].'%'));
		// 		}

		// 		// if($value['search']['value'] != '')
		// 		// {
		// 		// 	$temp = explode(',', $value['search']['value']);
		// 		// 	$this->db->where_in($value['name'],$temp);
		// 		// }
		// 	}
		// }

		// if($where != NULL){
		// 	$where = preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
		// 	$where = '('.$where.')';

		// }

		// return $where;   	           
		// echo '<pre>'; print_r($where); exit;

		if($params['search']['value'] != ''){
			$this->db->group_start();
//			$this->db->or_like('mst_admitcard.first_name', $params['search']['value']);
//			$this->db->or_like('mst_admitcard.middle_name', $params['search']['value']);
//			$this->db->or_like('mst_admitcard.last_name', $params['search']['value']);
//			$this->db->or_like('mst_admitcard.symbol_number', $params['search']['value']);
//			$this->db->or_like('mst_admitcard.gender', $params['search']['value']);
//			$this->db->or_like('mst_admitcard.program', $params['search']['value']);
//			$this->db->or_like('mst_admitcard.level', $params['search']['value']);

            $this->db->or_like('new_app_admit_card.first_name', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.middle_name', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.last_name', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.symbol_number', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.gender', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.program', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.level', $params['search']['value']);


            $this->db->group_end();
		}
       	 
	}

	public function save()
	{
        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
            $success=$this->admitcard_model->insert($data);
        }
        else
        {
            $success=$this->admitcard_model->update($data['id'],$data);
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

        return $data;
   }

   public function generate_all_symbol_number()
    {
        $this->otherdb = $this->load->database('app', TRUE);
        $fields = '*, program.name AS program, level.name AS level, document_information.document_link as student_signature,college.name as college';
        $this->otherdb->select($fields);
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id','left');
        $this->otherdb->join('program', 'registration.program_id = program.id','left');
        $this->otherdb->join('level', 'registration.level_id = level.id','left');
        $this->otherdb->join('document_information', "registration.id = document_information.registration_id AND type = 'student_signature'",'left');
        $this->otherdb->join('college', "registration.college_id = college.id",'left');
        $this->otherdb->where('registration_processing.current_state','exam_committee');
        $this->otherdb->where('registration_processing.current_status','progress');
        $this->otherdb->order_by('program_id');
        $this->otherdb->order_by('registration.first_name');
        $this->otherdb->order_by('registration.middle_name');
        $this->otherdb->order_by('registration.last_name');
        $students = $this->otherdb->get('registration')->result_array();
        $this->db->truncate('mst_admitcard');
        if(count($students)){
        	$program_id = $students[0]['program_id'];
        	$count = 1;
	        foreach($students as $k => $v)
	        {
	        	if($program_id != $v['program_id']){
        			$program_id = $v['program_id'];
        			$count = 1;
	        	}
	        	$key = array_search($v['first_name'], array_column($students, 'first_name'));
	        	$v['day_dob_nepali_date'] = sprintf("%02d", $v['day_dob_nepali_date']);
	        	$v['month_dob_nepali_date'] = sprintf("%02d", $v['month_dob_nepali_date']);
	        	$data = array(
	        		'first_name' => strtoupper($v['first_name']),
	        		'middle_name' => strtoupper($v['middle_name']),
	        		'last_name' => strtoupper($v['last_name']),
	        		'gender' => strtoupper($v['sex']),
	        		'program' => strtoupper($v['program']),
	        		'level' => strtoupper($v['level']),
	        		'photo_link' => ($v['photo_link']),
	        		'vdc_municipality_english' => strtoupper($v['vdc_municipality_english']),
	        		'DOB' => ($v['DOB']),
	        		'year_dob_nepali_date' => ($v['year_dob_nepali_date']),
	        		'month_dob_nepali_date' => ($v['month_dob_nepali_date']),
	        		'day_dob_nepali_date' => ($v['day_dob_nepali_date']),
	        		'college' => ($v['college']),
	        		// 'student_signature' => ($v['student_signature']),
	        	);
		        $data['symbol_number'] = date('ym') . sprintf("%02d", $v['program_id']) . sprintf("%02d", $v['level_id']) . sprintf("%04d", $count);

		        if($v['middle_name'])
		        {
		            $qrtext = 'Name:' . $v['first_name'] . ' ' . $v['middle_name'] . ' ' . $v['middle_name'];
		        }
		        else
		        {
		            $qrtext = 'Name:' . $v['first_name'] . ' ' . $v['last_name'];
		        }

		        $qrtext .= ' ';
		        $qrtext .= 'Subject:' . $v['program'];
		        $qrtext .= ' ';
		        $qrtext .= 'Level:' . $v['level'];
		        $qrtext .= ' ';
		        $qrtext .= 'Roll No:' . $data['symbol_number'];
		        $data['barcode'] = $this->generate_barcode($qrtext);
	        	$this->admitcard_model->insert($data);
	        	$count++;
	        }

        }
        redirect('admin/Admitcards');
    }

    private function generate_barcode($no)
    {
        if($no)
        {
            $this->load->library('phpqrcode/qrlib');
            $this->load->helper('url');
            $text = $no;
            $text1= substr($text, 0,11);
            // $folder = 'C:xampp/htdocs/beta/uploads/qrcode/';
            $folder = '/home/june2021/public_html/beta/uploads/qrcode/';
            $file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";
            $file_name = $folder.$file_name1;
            QRcode::png($text,$file_name);
            return $file_name1;
        }
        else
        {
            echo 'No QR code';
        }
    }

    public function detail($id = false)
    {
		$data['header'] = lang('admitcards');
		$data['page'] = $this->config->item('template_admin') . "edit";
		$data['module'] = 'admitcards';
		if($id)
		{
			$data['edit_data'] = $this->admitcard_model->find(array('id'=>$id));
			$data['id'] = $id;
			$data['form'] = "Edit";
		}
		$this->load->view($this->_container,$data);
    }

    public function save_image()
    {
    	$data['id'] = $this->input->post('id');
    	$image = $this->input->post('webcam');
    	list($image_name,$image_ext) = explode('.',$image);
    	print_r($this->input->post());
    	echo $image_name;
    	echo $image_ext;
    	exit;

    	if($image_ext != 'jpeg'){
	    	$explodeddata = explode(';base64,',$image);
	    	$explodedimagetype = explode('image/',$explodeddata[0]);
	    	$imagetype = $explodedimagetype[1];
	    	$base64image = $explodeddata[1];
	    	$random = date('YmdHis');
	    	$filename = $random . ' . ' . $imagetype;
	    	$ifp = fopen( './uploads/webcam/'.$filename, 'wb' ); 
	    	fwrite( $ifp, base64_decode( $base64image ) );
		    fclose( $ifp ); 
		    $data['webcam'] = $filename;
    	}
	    $data['thumb'] = 'thumb';
	    $data['thumb2'] = 'thumb2';
    	$this->admitcard_model->update($data['id'],$data);
    	redirect('admin/Admitcards');
    }

    public function downloadExcel()
	{
		// $this->member_model->_table = 'view_members';
		$rows=$this->admitcard_model->find_all();
 		$this->load->library('Excel');		
		$objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('Admicards');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        
      


        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'First Name')
        ->setCellValue('B1', 'MiddleName')
        ->setCellValue('C1', 'Last Name')
        ->setCellValue('D1', 'Symbol Number')
        ->setCellValue('E1', 'Gender')
        ->setCellValue('F1', 'DOB')
        ->setCellValue('G1', 'Program')
        ->setCellValue('H1', 'Level')
        ->setCellValue('I1', 'College');
        ->setCellValue('J1', 'Photo Link');

        $row = 2;
        $col = 0; 


        foreach ($rows as  $values) {
        	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->first_name);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->middle_name);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->last_name);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->symbol_number);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->gender);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->DOB);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->program);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->level);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->college);
            $col++;
             $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->photo_link);
            $col++;

         	$row++;
            $col = 0;
        }


        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="admitcards.xls"'); 
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        // if (ob_get_length()) ob_end_clean();
        $objWriter->save('php://output');
	}
}