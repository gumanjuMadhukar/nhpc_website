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
            'DOB' => $dob,
//            'year_dob_nepali_date' => $year,
//            'month_dob_nepali_date' => $month,
//            'day_dob_nepali_date' => $date,
        );
        $this->db->where($where);
        $this->db->cache_on();
        $this->db->select('first_name, middle_name, last_name, symbol_number, level, program, photo_link, result');
        $data['result'] = $this->db->get('new_app_admit_card')->row_array();

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
            $name = preg_replace('/\s+/', '', $name);
            // print_r($name);
            // exit();

            $location = './uploads/re_exam_voucher/' . $name; 
           
             
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            
            echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
            }
    }

    public function save_re_exam_voucher() {  
        $symbol_number = $this->input->post('symbol_number');
        $voucher_image = $this->input->post('voucher_image');
        $test = explode('.', $voucher_image);
        // print_r($test['0']);exit();
        $ext = end($test);
        $voucher_image = $test['0'] . '.' . $ext;
            
        $voucher_image = preg_replace('/\s+/', '', $voucher_image);
        // print_r($voucher_image);exit();

        $data['email'] = $this->AdmitCard_model->get_email($symbol_number);
        $email= $data['email'][0]['email'];
        $data['phone'] = $this->AdmitCard_model->get_phone_no($symbol_number);
        $phone_no= $data['phone'][0]['phone_no'];
		$where = array('symbol_number'=> $symbol_number);
		$this->db->where($where);
		$student = $this->db->get('mst_admitcard')->row_array();
        //  print_r(($phone_no));
        $data['phone_id'] = $this->Registration_model->get_phone_id2($phone_no,$student['first_name']);
        $phone_id = $data['phone_id'][0]['id'];
        // print_r(($data['phone_id']));
        // exit();
        $data['registration_id'] = $this->Registration_model->get_registration_id($phone_id);

        // $data['registration_id'] = $this->Registration_model->get_registration_id($email);
        $registration_id = $data['registration_id'][0]['id'];
        //  print_r(($registration_id));
        // exit();

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
    public function unaccept_message(){
        
        $userID = $this->input->post('userId'); 
        $mobile_num =$this->Registration_model->get_phone_id_message($userID);

        // print_r($mobile_num);
        // exit();

        
        $text= "Dear Student you haven't uploaded your voucher properly. Please go through 'https://nhpc.gov.np/re_exam' to upload your Re-Exam voucher. Thank you ! NHPC" ;
        $args = http_build_query(array(
            'token' => 'v2_QzbYxWRfswZuaIS9x5I7Ns6u3mU.56S0',
            'from'  => 'NHPC',
            'to'    => $mobile_num,
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
    public function accept_message(){
        $userID = $this->input->post('userId'); 
        $this->RegistrationProcessing_model->update_voucher_uploaded($userID);

        $mobile_num =$this->Registration_model->get_phone_id_message($userID);

        // print_r($mobile_num);
        // exit();

        
        $text= "Dear Student your re-exam voucher has been uploaded successfully. Thank you ! NHPC" ;
        $args = http_build_query(array(
            'token' => 'v2_QzbYxWRfswZuaIS9x5I7Ns6u3mU.56S0',
            'from'  => 'NHPC',
            'to'    => $mobile_num,
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
    
    public function re_exam_sms()
    {   
    //     $phone_no=[
    //         9845595784
    //         ,9861682987
    //         ,9802803717
    //         ,9814885501
    //         ,9847098572
    //         ,9843164900
    //         ,9844110720
    //         ,9816813943
    //         ,9867336578
    //         ,9823681045
    //         ,9868023402
    //         ,9868342547
    //         ,9865494088
    //         ,9824335921
    //         ,9842159073
    //         ,9843922830
    //         ,9826701176
    //         ,9843336713
    //         ,9849558094
    //         ,9807799345
    //         ,9824494823
    //         ,9822460518
    //         ,9865549013
    //         ,9869647706
    //         ,9817765994
    //         ,9822634215
    //         ,9848299915
    //         ,9865001329
    //         ,9865195315
    //         ,9810849084
    //         ,9818526863
    //         ,9862820955
    //         ,9869334527
    //         ,9814813466
    //         ,9817359696
    //         ,9816157890
    //         ,9804203345
    //         ,9827349416
    //         ,9823599425
    //         ,9867674515
    //         ,9869078171
    //         ,9826739478
    //         ,9866102358
    //         ,9816584195
    //         ,9804722398
    //         ,9815574367
    //         ,9845905299
    //         ,9827459991
    //         ,9800713696
    //         ,9807502981
  
    // ];
    //     foreach($phone_no as $p){
    //         // print_r('sms');exit();
    //         $link = "<a href='https://nhpc.gov.np/re_exam' target='_blank'>Click here</a>";
    //         $text= " Important!!!  Dear Student you haven't properly uploaded your voucher's image So, Contact 9860059131 so that he can support you to upload your voucher. Please go through 'https://nhpc.gov.np/re_exam' to upload Re-Exam voucher.  Thank you ! NHPC" ;
    //         $args = http_build_query(array(
    //             'token' => 'v2_QzbYxWRfswZuaIS9x5I7Ns6u3mU.56S0',
    //             'from'  => 'NHPC',
    //             'to'    => $p,
    //             'text'  => $text,
    //         ));
        
    //         $url = "http://api.sparrowsms.com/v2/sms/";
        
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, $url);
    //         curl_setopt($ch, CURLOPT_POST, 1);
    //         curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //         $sub = 'OTP';
    //         // Response
    //         $response = curl_exec($ch);
    //         $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //         curl_close($ch);
    //         echo $response;

    //     }

        print_r('sms');exit();
        $link = "<a href='https://nhpc.gov.np/re_exam' target='_blank'>Click here</a>";
        $text= "Dear Student Please go through 'https://nhpc.gov.np/re_exam' to upload Re-Exam voucher. Thank you ! NHPC" ;
        $args = http_build_query(array(
            'token' => 'v2_QzbYxWRfswZuaIS9x5I7Ns6u3mU.56S0',
            'from'  => 'NHPC',
            'to'    => '9848236528',
            'text'  => 'You Symbol No. is 210833030391 , Date of birth:2052-04-02.NHPC'
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

  
}