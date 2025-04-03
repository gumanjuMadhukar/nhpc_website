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


if ( ! function_exists('paging'))
{
	function paging($default, $order = 'desc')
	{
		$CI = &get_instance();

		$input = $CI->input->get();
		
		$pagenum  = (isset($input['pagenum'])) ? $input['pagenum'] : 0;
		
		$pagesize  = (isset($input['pagesize'])) ? $input['pagesize'] : 100;
		
		$offset = $pagenum * $pagesize;

		$CI->db->limit($pagesize, $offset);

		//sorting
		if (isset($input['sortdatafield'])) {
			$sortdatafield = $input['sortdatafield'];
			$sortorder = (isset($input['sortorder'])) ? $input['sortorder'] :'asc';
			$CI->db->order_by($sortdatafield, $sortorder); 
		} else {
			$CI->db->order_by($default, $order);
		}
		
	}
}

if ( ! function_exists('search_params'))
{
	function search_params()
	{
		$CI = &get_instance();

		$input = $CI->input->get();

		if (isset($input['filterscount'])) {
			$filtersCount = $input['filterscount'];
			if ($filtersCount > 0) {
				for ($i=0; $i < $filtersCount; $i++) {
					// get the filter's column.
					$filterDatafield 	= $input['filterdatafield' . $i];

					// get the filter's value.
					$filterValue 		=  $input['filtervalue' 	. $i];

					// get the filter's condition.
					$filterCondition 	= $input['filtercondition' . $i];

					// get the filter's operator.
					$filterOperator 	= $input['filteroperator' 	. $i];

					$operatorLike = 'LIKE';

					switch($filterCondition) {
						case "CONTAINS":
                            if (strtoupper($filterValue) == 'BLANK') {
                                // $CI->db->where("{$filterDatafield} IS EMPTY", null, false);
                            } else if(strtoupper($filterValue) == 'NULL') {
                                $CI->db->where("{$filterDatafield} IS NULL", null, false);
                            } else {
                                $CI->db->like($filterDatafield, $filterValue);
                            }
							break;
						case "DOES_NOT_CONTAIN":
							$CI->db->inot_like($filterDatafield, $filterValue);
							break;
						case "EQUAL":
							$CI->db->where($filterDatafield, $filterValue);
							break;
						case "GREATER_THAN":
							$CI->db->where($filterDatafield . ' >', $filterValue);
							break;
						case "LESS_THAN":
							$CI->db->where($filterDatafield . ' <', $filterValue);
							break;
						case "GREATER_THAN_OR_EQUAL":
							$CI->db->where($filterDatafield . ' >=', $filterValue);
							break;
						case "LESS_THAN_OR_EQUAL":
							$CI->db->where($filterDatafield . ' <=', $filterValue);
							break;
						case "STARTS_WITH":
							$CI->db->like($filterDatafield, $filterValue, 'after'); 
							break;
						case "ENDS_WITH":
							$CI->db->like($filterDatafield, $filterValue, 'before'); 
							break;
					}
				}
			}
		}
	}
}

if ( ! function_exists('is_group'))
{
	function is_group($groupS)
	{
		$CI = &get_instance();
		$CI->load->model('users/user_group_model');

		foreach ($groupS as $key => $value) {
			$CI->db->where('user_id',  $CI->session->userdata('id'));
			$CI->db->where('group_id', $value);
			if($CI->user_group_model->find_count() > 0) {
				return TRUE;
			} 
		}
		return FALSE;
	}
}

if ( ! function_exists('get_english_date'))
{
	function get_english_date($nepali_date = null, $retType = 'json')
	{
		$CI = &get_instance();

		$date = null;
		$success = false;

		if ($nepali_date == null) {
			echo json_encode(array('success' => $success, 'date' => $date));
			exit;
		}

		$CI->load->library('nepali_calendar');

		list($y,$m,$d) = explode('-', $nepali_date);

		$converted_date = $CI->nepali_calendar->BS_to_AD($y,$m,$d);

		$date = date('Y-m-d',mktime(0,0,0, $converted_date['month'], $converted_date['date'], $converted_date['year']));

		if ($retType == 'json') {
			$success = true;
			echo json_encode(array('success' => $success, 'date' => $date));
		} else {
			return $date;
		}
	}

}

if ( ! function_exists('get_nepali_date'))
{
	function get_nepali_date($english_date = null, $retType = 'json')
	{
		$CI = &get_instance();

		$date = null;
		$success = false;

		if ($english_date == null) {
			echo json_encode(array('success' => $success, 'date' => $date));
			exit;
		}

		$CI->load->library('nepali_calendar');

		list($y,$m,$d) = explode('-', $english_date);

		$converted_date = $CI->nepali_calendar->AD_to_BS($y,$m,$d,'array');

		$date = $converted_date['year'] . '-' . sprintf("%02d", $converted_date['month'] ) . '-' . sprintf("%02d", $converted_date['date'] );

		if ($retType == 'json') {
			$success = true;
			echo json_encode(array('success' => $success, 'date' => $date));
		} else {
			return $date;
		}

	}

}

if ( ! function_exists('nepali_month_detail'))
{
	function nepali_month_detail($english_date = null, $retType = 'json')
	{
		$CI = &get_instance();

		$date = null;
		$success = false;

		if ($english_date == null) {
			echo json_encode(array('success' => $success, 'date' => $date));
			exit;
		}

		$CI->load->library('nepali_calendar');

		list($y,$m,$d) = explode('-', $english_date);

		$converted_date = $CI->nepali_calendar->AD_to_BS($y,$m,$d,'array');
		$date['date'] = $converted_date['year'] . '-' . sprintf("%02d", $converted_date['month'] ) . '-' . sprintf("%02d", $converted_date['date'] );
		$date['days'] = $CI->nepali_calendar->get_days_in_month($converted_date['year'],$converted_date['month']);
		$date['starting_date'] = $converted_date['year'] . '-' . sprintf("%02d", $converted_date['month'] ) . '-' . sprintf("%02d", 1 );
		$en_dates = explode('-',$date['starting_date']);
		$date['starting_en_date'] = $CI->nepali_calendar->BS_to_AD($en_dates[0],$en_dates[1],$en_dates[2],'array');

		$date['end_date'] = $converted_date['year'] . '-' . sprintf("%02d", $converted_date['month'] ) . '-' . sprintf("%02d", $date['days'] );
		$en_dates = explode('-',$date['end_date']);
		$date['ending_en_date'] = $CI->nepali_calendar->BS_to_AD($en_dates[0],$en_dates[1],$en_dates[2],'array');

		$start = new DateTime($date['starting_en_date']['year'] . '-' . sprintf("%02d", $date['starting_en_date']['month'] ) . '-' . sprintf("%02d", $date['starting_en_date']['date']));
		$end = new DateTime($date['ending_en_date']['year'] . '-' . sprintf("%02d", $date['ending_en_date']['month'] ) . '-' . sprintf("%02d", $date['ending_en_date']['date']));

		$days = $start->diff($end, true)->days;

		$saturday = intval($days / 7) + ($start->format('w') + $days % 7 >= 6);

		$date['number_of_saturday'] = $saturday;

		$start_pieces = array(
			'0' => $date['starting_en_date']['year'],
			'1' => $date['starting_en_date']['month'],
			'2' => $date['starting_en_date']['date'],
		);
		$english_date_start = implode('-', $start_pieces);
		$weekendstart = new DateTime($english_date_start);
		$weekendend = new DateTime(date('Y-m-d'));
		$weekendend = $weekendend->modify( '+1 day' );
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($weekendstart, $interval ,$weekendend);
		$saturdays = 0;
		foreach($daterange as $dates){
		    $weekenddays = $dates->format('D');
		    if ($weekenddays == 'Sat') {
		        $saturdays++;
		    }
		}

		$date['number_of_till_weekend'] = $saturdays;

		$date['this_year'] = $converted_date['year'];
		$date['this_month'] = sprintf("%02d", $converted_date['month'] );
		$date['today'] = sprintf("%02d", $converted_date['date'] );


		if ($retType == 'json') {
			$success = true;
			echo json_encode(array('success' => $success, 'date' => $date));
		} else {
			return $date;
		}

	}

}

if ( ! function_exists('get_nepali_month_detail_from_nepali_date'))
{
	function get_nepali_month_detail_from_nepali_date($nepali_date = null, $retType = 'json')
	{
		$CI = &get_instance();

		$date = null;
		$success = false;

		if ($nepali_date == null) {
			echo json_encode(array('success' => $success, 'date' => $date));
			exit;
		}

		$CI->load->library('nepali_calendar');

		list($y,$m) = explode('-', $nepali_date);
		$date['days'] = $CI->nepali_calendar->get_days_in_month($y,$m);
		// echo '<pre>'; echo 'here'; print_r($date); exit;
		return $date['days'];
		
		
	}

}

if(!function_exists('days_in_month')){
	function days_in_month($month, $year)
	{
	// calculate number of days in a month
	return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
	}
}

if(!function_exists('get_month_tithi_detail_json')){
    function get_month_tithi_detail_json($year,$json = FALSE) 
    {
        // $year = $this->input->get('year');

        $filename = CACHE_PATH . '/years/'.$year.'.json';

        if (file_exists($filename)) {
        	if($json == 'json'){
	            echo file_get_contents($filename);
	            exit;
        	}else{
        		$record = file_get_contents($filename);
        		return $record;
        	}
        }
    }
}

if ( ! function_exists('setting'))
{
	function setting()
	{
		$CI = &get_instance();
		$CI->load->model('settings/setting_model');
		$data['setting'] = $CI->setting_model->find_all();
		return $data;
	}
}

if ( ! function_exists('featured_news'))
{
	function featured_news($limit=NULL, $order='DESC')
	{
		$CI = &get_instance();
		$where = array();
		$where['is_featured'] = 1;
		$CI->load->model('news/news_model');
		if($limit){
			$CI->db->limit($limit);
		}
		$data = $CI->news_model->find_all($where, NULL, 'id '.$order);
		return $data;
	}
}

if ( ! function_exists('health_professional_count_male'))
{
	function health_professional_count_male()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$CI->load->model('health_professionals/health_professional_model');
		$data['male'] = $CI->health_professional_model->find_count($where);
		return $data['male'];
	}
}
if ( ! function_exists('health_professional_count_male1'))
{
	function health_professional_count_male1()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 1;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male1'] = $CI->health_professional_model->find_count($where);
		return $data['male1'];
	}
}
if ( ! function_exists('health_professional_count_male2'))
{
	function health_professional_count_male2()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 2;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male2'] = $CI->health_professional_model->find_count($where);
		return $data['male2'];
	}
}
if ( ! function_exists('health_professional_count_male3'))
{
	function health_professional_count_male3()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 3;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male3'] = $CI->health_professional_model->find_count($where);
		return $data['male3'];
	}
}
if ( ! function_exists('health_professional_count_male4'))
{
	function health_professional_count_male4()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 4;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male4'] = $CI->health_professional_model->find_count($where);
		return $data['male4'];
	}
}
if ( ! function_exists('health_professional_count_male5'))
{
	function health_professional_count_male5()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 5;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male5'] = $CI->health_professional_model->find_count($where);
		return $data['male5'];
	}
}
if ( ! function_exists('health_professional_count_male6'))
{
	function health_professional_count_male6()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 6;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male6'] = $CI->health_professional_model->find_count($where);
		return $data['male6'];
	}
}
if ( ! function_exists('health_professional_count_male7'))
{
	function health_professional_count_male7()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 7;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male7'] = $CI->health_professional_model->find_count($where);
		return $data['male7'];
	}
}
if ( ! function_exists('health_professional_count_male8'))
{
	function health_professional_count_male8()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'male';
		$where['category_id'] = 8;
		$CI->load->model('health_professionals/health_professional_model');
		$data['male8'] = $CI->health_professional_model->find_count($where);
		return $data['male8'];
	}
}

if ( ! function_exists('health_professional_count_female'))
{
	function health_professional_count_female()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$CI->load->model('health_professionals/health_professional_model');
		$data['female'] = $CI->health_professional_model->find_count($where);
		return $data['female'];
	}
}
if ( ! function_exists('health_professional_count_female1'))
{
	function health_professional_count_female1()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 1;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female1'] = $CI->health_professional_model->find_count($where);
		return $data['female1'];
	}
}
if ( ! function_exists('health_professional_count_female2'))
{
	function health_professional_count_female2()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 2;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female2'] = $CI->health_professional_model->find_count($where);
		return $data['female2'];
	}
}
if ( ! function_exists('health_professional_count_female3'))
{
	function health_professional_count_female3()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 3;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female3'] = $CI->health_professional_model->find_count($where);
		return $data['female3'];
	}
}
if ( ! function_exists('health_professional_count_female4'))
{
	function health_professional_count_female4()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 4;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female4'] = $CI->health_professional_model->find_count($where);
		return $data['female4'];
	}
}
if ( ! function_exists('health_professional_count_female5'))
{
	function health_professional_count_female5()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 5;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female5'] = $CI->health_professional_model->find_count($where);
		return $data['female5'];
	}
}
if ( ! function_exists('health_professional_count_female6'))
{
	function health_professional_count_female6()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 6;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female6'] = $CI->health_professional_model->find_count($where);
		return $data['female6'];
	}
}
if ( ! function_exists('health_professional_count_female7'))
{
	function health_professional_count_female7()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 7;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female7'] = $CI->health_professional_model->find_count($where);
		return $data['female7'];
	}
}
if ( ! function_exists('health_professional_count_female8'))
{
	function health_professional_count_female8()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'female';
		$where['category_id'] = 8;
		$CI->load->model('health_professionals/health_professional_model');
		$data['female8'] = $CI->health_professional_model->find_count($where);
		return $data['female8'];
	}
}
if ( ! function_exists('health_professional_count_other'))
{
	function health_professional_count_other()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$CI->load->model('health_professionals/health_professional_model');
		$data['other'] = $CI->health_professional_model->find_count($where);
		return $data['other'];
	}
}
if ( ! function_exists('health_professional_count_other1'))
{
	function health_professional_count_other1()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 1;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other1'] = $CI->health_professional_model->find_count($where);
		return $data['other1'];
	}
}
if ( ! function_exists('health_professional_count_other2'))
{
	function health_professional_count_other2()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 2;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other2'] = $CI->health_professional_model->find_count($where);
		return $data['other2'];
	}
}
if ( ! function_exists('health_professional_count_other3'))
{
	function health_professional_count_other3()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 3;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other3'] = $CI->health_professional_model->find_count($where);
		return $data['other3'];
	}
}
if ( ! function_exists('health_professional_count_other4'))
{
	function health_professional_count_other4()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 4;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other4'] = $CI->health_professional_model->find_count($where);
		return $data['other4'];
	}
}
if ( ! function_exists('health_professional_count_other5'))
{
	function health_professional_count_other5()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 5;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other5'] = $CI->health_professional_model->find_count($where);
		return $data['other5'];
	}
}
if ( ! function_exists('health_professional_count_other6'))
{
	function health_professional_count_other6()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 6;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other6'] = $CI->health_professional_model->find_count($where);
		return $data['other6'];
	}
}
if ( ! function_exists('health_professional_count_other7'))
{
	function health_professional_count_other7()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 7;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other7'] = $CI->health_professional_model->find_count($where);
		return $data['other7'];
	}
}
if ( ! function_exists('health_professional_count_other8'))
{
	function health_professional_count_other8()
	{
		$CI = &get_instance();
		$where = array();
		$where['sex'] = 'other';
		$where['category_id'] = 8;
		$CI->load->model('health_professionals/health_professional_model');
		$data['other8'] = $CI->health_professional_model->find_count($where);
		return $data['other8'];
	}
}

if ( ! function_exists('health_professional_count_national_college'))
{
	function health_professional_count_national_college()
	{
		$CI = &get_instance();
		$where = array();
		$where['international_college'] = '';
		$CI->load->model('health_professionals/health_professional_model');
		$data['naional_college'] = $CI->health_professional_model->find_count($where);
		return $data['naional_college'];
	}
}

if ( ! function_exists('health_professional_count_international_college'))
{
	function health_professional_count_international_college()
	{
		$CI = &get_instance();
		$CI->db->where('international_college<>','');
		$data['internaional_college'] = $CI->health_professional_model->find_count();
		return $data['internaional_college'];
	}
}

if ( ! function_exists('health_professional_count_category1'))
{
	function health_professional_count_category1()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 1;
		$data['category1'] = $CI->health_professional_model->find_count($where);
		return $data['category1'];
	}
}
if ( ! function_exists('health_professional_count_category2'))
{
	function health_professional_count_category2()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 2;
		$data['category2'] = $CI->health_professional_model->find_count($where);
		return $data['category2'];
	}
}
if ( ! function_exists('health_professional_count_category3'))
{
	function health_professional_count_category3()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 3;
		$data['category3'] = $CI->health_professional_model->find_count($where);
		return $data['category3'];
	}
}
if ( ! function_exists('health_professional_count_category4'))
{
	function health_professional_count_category4()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 4;
		$data['category4'] = $CI->health_professional_model->find_count($where);
		return $data['category4'];
	}
}
if ( ! function_exists('health_professional_count_category5'))
{
	function health_professional_count_category5()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 5;
		$data['category5'] = $CI->health_professional_model->find_count($where);
		return $data['category5'];
	}
}
if ( ! function_exists('health_professional_count_category6'))
{
	function health_professional_count_category6()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 6;
		$data['category6'] = $CI->health_professional_model->find_count($where);
		return $data['category6'];
	}
}
if ( ! function_exists('health_professional_count_category7'))
{
	function health_professional_count_category7()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 7;
		$data['category7'] = $CI->health_professional_model->find_count($where);
		return $data['category7'];
	}
}
if ( ! function_exists('health_professional_count_category8'))
{
	function health_professional_count_category8()
	{
		$CI = &get_instance();
		$where = array();
		$where['category_id'] = 8;
		$data['category8'] = $CI->health_professional_model->find_count($where);
		return $data['category8'];
	}
}
if ( ! function_exists('health_professional_count'))
{
	function health_professional_count()
	{
		$CI = &get_instance();
		$data['total'] = $CI->health_professional_model->find_count();
		return $data['total'];
	}
}
/* End of file project_helper.php */
/* Location: ./application/helpers/project_helper.php */