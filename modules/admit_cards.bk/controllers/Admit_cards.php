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
 * Admin_cards
 *
 * Extends the Public_Controller class
 * 
 */

class Admit_cards extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('Admin_cards');

        $this->load->model('banners/banner_model');
        $this->load->model('AdmitCard_model');
        $this->load->model('Registration_model');
        $this->load->model('RegistrationProcessing_model');

        $this->lang->load('banners/banner');
        $this->load->library('Zend');
        $this->load->library('phpqrcode/qrlib');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        

    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('admit-card');
		$data['page'] = $this->config->item('template_public') . "admit_cards/index";
		$data['module'] = 'admint_card';
        // print_r($data);
        // exit();
		$this->load->view($this->_container,$data);
	}

    public function download()
    {
        $first_name = $this->input->get('first_name');
        $last_name = $this->input->get('last_name');
        $dob = $this->input->get('dob');
        list($year,$month,$date) = explode('-', $dob);
        $this->db->like('first_name',strtoupper($first_name));
        $this->db->like('last_name',strtoupper($last_name));
        // $this->db->where('DOB',$dob);
        $this->db->where('year_dob_nepali_date', $year);
        $this->db->where('month_dob_nepali_date', $month);
        $this->db->where('day_dob_nepali_date', $date);
        // $this->db->where('registration_processing.current_state','exam_committee');
        // $this->db->where('registration_processing.current_status','progress');
        // $fields = '*, program.name AS program, level.name AS level, document_information.document_link as student_signature,college.name as college_name';
        // $this->db->select($fields);
        // // $this->db->join('registration', 'registration.id = user_student.registration_id','left');
        // $this->db->join('registration_processing', 'registration.id = registration_processing.registration_id','left');
        // $this->db->join('program', 'registration.program_id = program.id','left');
        // $this->db->join('level', 'registration.level_id = level.id','left');
        // $this->db->join('document_information', "registration.id = document_information.registration_id AND type = 'student_signature'",'left');
        // $this->db->join('college', "registration.college_id = college.id",'left');
        $data['student_record'] = $this->db->get('mst_admitcard')->row_array();
        // $data['symbol_number'] = $this->generate_symbol_number($data['student_record']);
        // $first_name = strtoupper($first_name);
        // $data['student_record']['middle_name'] = strtoupper($data['student_record']['middle_name']);
        // $last_name = strtoupper($last_name);
        // $data['student_record']['program'] = strtoupper($data['student_record']['program']);
        // $data['student_record']['level'] = strtoupper($data['student_record']['level']);
        // $data['student_record']['symbol_number'] = strtoupper($data['symbol_number']);
        
        // if($data['student_record']['middle_name'])
        // {
        //     $qrtext = 'Name:' . $first_name . ' ' . $data['student_record']['middle_name'] . ' ' . $last_name;
        // }
        // else
        // {
        //     $qrtext = 'Name:' . $first_name . ' ' . $last_name;
        // }

        // $qrtext .= '\n';
        // $qrtext .= 'Subject:' . $data['student_record']['program'];
        // $qrtext .= '\n';
        // $qrtext .= 'Level:' . $data['student_record']['level'];
        // $qrtext .= '\n';
        // $qrtext .= 'Roll No:' . $data['symbol_number'];
        // // echo '<pre>';
        // // print_r($qrtext);
        // // exit;
        // $data['barcode'] = $this->generate_barcode($qrtext);

        $data['header'] = lang('admit-card');
        $data['page'] = $this->config->item('template_public') . "admit_cards/result";
        $data['module'] = 'admint_card';
        $this->load->view($this->config->item('template_public') . "admit_cards/result",$data);
    }

    private function generate_symbol_number($student_record)
    {
        $this->otherdb = $this->load->database('app', TRUE);
        // $this->otherdb->join('registration', 'registration.id = user_student.registration_id','left');
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id','left');
        $this->otherdb->where('program_id',$student_record['program_id']);
        $this->otherdb->where('registration_processing.current_state','exam_committee');
        $this->otherdb->where('registration_processing.current_status','progress');
        $this->otherdb->order_by('registration.first_name');
        $this->otherdb->order_by('registration.middle_name');
        $this->otherdb->order_by('registration.last_name');
        $students = $this->otherdb->get('registration')->result_array();
        $key = array_search($student_record['first_name'], array_column($students, 'first_name'));
        if(is_numeric($key)){
            $symbol = date('y-m') . $student_record['program_id'] . ($key+1);
        }else{
            $symbol = 'not generated';
        }
        return($symbol);
    }

    private function generate_barcode($no)
    {
        if($no)
        {
            $this->load->library('phpqrcode/qrlib');
            $this->load->helper('url');
            $text = $no;
            $text1= substr($text, 0,11);
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

    public function generate_all_symbol_number()
    {
        $this->otherdb = $this->load->database('app', TRUE);
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id','left');
        // $this->otherdb->where('program_id',$student_record['program_id']);
        $this->otherdb->where('registration_processing.current_state','exam_committee');
        $this->otherdb->where('registration_processing.current_status','progress');
        $this->otherdb->order_by('registration.first_name');
        $this->otherdb->order_by('registration.middle_name');
        $this->otherdb->order_by('registration.last_name');
        $this->otherdb->group_by('program_id');
        $students = $this->otherdb->get('registration')->result_array();
        echo '<pre>';
        print_r($students);
        exit;
        $key = array_search($student_record['first_name'], array_column($students, 'first_name'));

        if(is_numeric($key)){
            $symbol = date('y-m') . $student_record['program_id'] . ($key+1);
        }else{
            $symbol = 'not generated';
        }
        return($symbol);
    }

    public function result()
    {
 		
        // Display Page
        $data['header'] = 'Result';
        $data['page'] = $this->config->item('template_public') . "admit_cards/exam_result";
        $data['module'] = 'admit_card';
        $this->load->view($this->_container,$data);
    }
    public function result_json()
    {
        $dob = $this->input->post('dob');
        list($year,$month,$date) = explode('-', $dob);
        $where = array(
            'symbol_number' => $this->input->post('symbol_number'),
            'year_dob_nepali_date' => $year,
            'month_dob_nepali_date' => $month,
            'day_dob_nepali_date' => $date, 
        );
        $this->db->where($where);
        $this->db->select('first_name, middle_name, last_name, symbol_number, level, program, photo_link, result');
        $data['result'] = $this->db->get('mst_admitcard')->row_array();

        $this->load->view($this->config->item('template_public') . "admit_cards/exam_result_display",$data);
    }
   public function re_exam()
    {
        $data['header'] = 'Re-exam';
        $data['page'] = $this->config->item('template_public') . "admit_cards/re_exam";
        $data['module'] = 'admit_card';
        $this->load->view($this->_container,$data);
 		
         
    }
    public function re_exam_json()
    {
        $dob = $this->input->post('dob');
        list($year,$month,$date) = explode('-', $dob);
        $where = array(
            'symbol_number' => $this->input->post('symbol_number'),
            'year_dob_nepali_date' => $year,
            'month_dob_nepali_date' => $month,
            'day_dob_nepali_date' => $date, 
        );
        $this->db->where($where);
        $this->db->select('first_name, middle_name, last_name, symbol_number,email, level, program, photo_link, result');
        $data['result'] = $this->db->get('mst_admitcard')->row_array();
       

        if ( $data['result']['result'] == 'PASSED'){
            $this->load->view($this->config->item('template_public') . "admit_cards/exam_result_display",$data);
        }else{
            $this->load->view($this->config->item('template_public') . "admit_cards/re_exam_form_display",$data);

            

        }
        

    }
   

    public function image_upload(){
       
        if($_FILES["file"]["name"] != '')
            {
            $test = explode('.', $_FILES["file"]["name"]);
            // print_r($test['0']);exit();
            $ext = end($test);
            $name = $test['0'] . '.' . $ext;
            $location = './uploads/re_exam_voucher/' . $name; 
           
             
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            
            echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
            }
    }

    public function save_re_exam_voucher() {  
        $symbol_number = $this->input->post('symbol_number');
        $voucher_image = $this->input->post('voucher_image');

        $data['email'] = $this->AdmitCard_model->get_email($symbol_number);
        $email= $data['email'][0]['email'];

        $data['registration_id'] = $this->Registration_model->get_registration_id($email);
        $registration_id = $data['registration_id'][0]['id'];

        $data['result'] = $this->RegistrationProcessing_model->save_re_exam($registration_id,$voucher_image);
        
        if ( $data['result']== 1){
        $data['result']== 1;
        $data['header'] = 'Re-exam-success';
        $data['page'] = $this->config->item('template_public') . "admit_cards/re_exam_success";
        $data['module'] = 'admit_card';
        $this->load->view($this->_container,$data);

        }else{
            $data['result']== 0;
            $data['header'] = 'Re-exam-success';
            $data['page'] = $this->config->item('template_public') . "admit_cards/re_exam_success";
            $data['module'] = 'admit_card';
            $this->load->view($this->_container,$data);
        }
    
    }
    public function voucher_list(){
        $data['students'] = $this->RegistrationProcessing_model->get_all_re_exam_users();
        // print_r($data['students'] );
        // exit();
        $this->load->view($this->config->item('template_public') . "re_exam_voucher/re_exam_voucher_list",$data);
    }

    public function is_valid(){
        
        $reg_id = $this->input->post('userId'); 
        
        if($this->input->post('aId') == '0'){
        //     print_r('inside 0');
        // exit();
            $id = $this->input->post('aId'); 
            $this->RegistrationProcessing_model->updateStatus($id,$reg_id);
            return '1';
        }else{
        //     print_r('inside 1');
        // exit();
            $id = $this->input->post('dId'); 
            $this->RegistrationProcessing_model->updateStatus($id,$reg_id);
            return '0';
        }

    }
    
    public function re_exam_sms()
    {   
        $result = 'FAILED';
        $phone =    $this->AdmitCard_model->get_phone($result);
        foreach ($phone as $p){
            print_r($p['phone_no']);
             
        
        $text= "Dear Student Please go through 'https://nhpc.gov.np/re_exam' to upload Re-Exam voucher. Thank you ! NHPC" ;
        $args = http_build_query(array(
            'token' => 'v2_QzbYxWRfswZuaIS9x5I7Ns6u3mU.56S0',
            'from'  => 'NHPC',
            'to'    => $p['phone_no'],
            'text'  => $text
        ));
        
    
        $url = "http://api.sparrowsms.com/v2/sms/";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $sub = 'OTP';
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        echo $response;
    }
    exit();
    }

  
}