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
        $this->lang->load('banners/banner');
        $this->load->library('Zend');
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
        // echo '<pre>';
        // print_r($this->input->post());
        $username = $this->input->get('username');
        $dob = $this->input->get('dob');
        $this->otherdb = $this->load->database('app', TRUE);
        $this->otherdb->where('username',$username);
        $this->otherdb->where('DOB',$dob);
        // echo $this->otherdb->last_query();
        // exit;
        // $this->otherdb->where('registration_processing.current_state','exam_committee');
        // $this->otherdb->where('registration_processing.current_status','accepted');
        $fields = 'user_student.id, username, user_student.first_name, user_student.middle_name, user_student.last_name, user_student.registration_id, user_student.phone_id, auth_key, password_hash, password_reset_token, user_student.email, location_id, user_student.status, post, user_student.created_at, user_student.updated_at, user_student.created_by, raw_password, first_name_nepali, middle_name_nepali, last_name_nepali, sex, father_name, father_name_nepali, mother_name, mother_name_nepali, grand_father_name_nepali, grand_father_name, DOB, year_dob_nepali_date, month_dob_nepali_date, day_dob_nepali_date, marital_status, husband_wife_name, registration.vdc_municipality_nepali, registration.vdc_municipality_english, registration.ward_number_nepali, registration.ward_number, registration.tol, photo_link, student_id, registration.level_id, program_id, hospital, academic_year, board_registration_number, college_id, ethinic_id, cast_id, registration.current_status, applied_date, applied_date_nepali, crn, temp_registration_number, registration_number, approved_level, international_college, registration.category_id, citizenship_number, darta_number, registration_type, current_state, comment, approval_subject, approval_exam, approval_council, approval_levels, check_state, subject_committee_minute, routing_number, subject_committee_accepted_date, council_accepted_date, exam_committee_minute, council_minute, program.name AS program, level.name AS level, document_information.document_link as student_signature,college.name as college_name';
        $this->otherdb->select($fields);
        $this->otherdb->join('registration', 'registration.id = user_student.registration_id');
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id');
        $this->otherdb->join('program', 'registration.program_id = program.id');
        $this->otherdb->join('level', 'registration.level_id = level.id');
        $this->otherdb->join('college', 'registration.college_id = college.id');
        $this->otherdb->join('document_information', "registration.id = document_information.registration_id AND type = 'student_signature'");
        $data['student_record'] = $this->otherdb->get('user_student')->row_array();
        $data['symbol_number'] = $this->generate_symbol_number($data['student_record'],$username);
        $data['barcode'] = $this->generate_barcode($data['symbol_number']);

        $data['header'] = lang('admit-card');
        $data['page'] = $this->config->item('template_public') . "admit_cards/result";
        $data['module'] = 'admint_card';
        $this->load->view($this->config->item('template_public') . "admit_cards/result",$data);
    }

    private function generate_symbol_number($student_record,$username)
    {
        $this->otherdb = $this->load->database('app', TRUE);
        $this->otherdb->join('registration', 'registration.id = user_student.registration_id');
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id');
        $this->otherdb->where('program_id',$student_record['program_id']);
        // $this->otherdb->where('registration_processing.current_state','exam_committee');
        // $this->otherdb->where('registration_processing.current_status','accepted');
        $this->otherdb->order_by('user_student.first_name');
        $this->otherdb->order_by('user_student.middle_name');
        $this->otherdb->order_by('user_student.last_name');
        $students = $this->otherdb->get('user_student')->result_array();
        $key = array_search($username, array_column($students, 'username'));
        // echo '<pre>';
        // echo $key;
        if(is_numeric($key)){
            $symbol = date('y-m') . '-' . $student_record['program_id'] . '-' . ($key+1);
        }else{
            $symbol = 'not generated';
        }
        return($symbol);
        // print_r($students);
        // exit;
    }

    private function generate_barcode($no)
    {
        $this->zend->load('Zend/Barcode');
        $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$no), array())->draw();
        imagepng($imageResource, 'uploads/barcodes/'.$no.'.png');
        $barcode = 'uploads/barcodes/'.$no.'.png';
        return $barcode;
    }
}