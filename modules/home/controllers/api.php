<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();

        $this->load->library('Nepali_calendar');
        $this->load->model('holidays/holiday_model');
    }

    public function home_get()
    {
        if($this->input->get('year')){
        	$year = $this->input->get('year');
            $month = $this->input->get('month');

            $nepali_date = $year. '-' . $month . '-01';
            $english_date = get_english_date($nepali_date,1);
            
            $where = array(
                'nepali_month' => ($month<10)?'0'.$month:$month,
                'nepali_year' => $year
            );
        }else{
            $english_date = date('Y-m-d');
            $nepali_date = get_nepali_date($english_date,1);
            list($year,$month,$date) = explode('-', $nepali_date);
            $where = array(
                'nepali_month' => $month,
                'nepali_year' => $year
            );
        }

        list($y,$m,$d) = explode('-', $english_date);
        $converted_date = $this->nepali_calendar->AD_to_BS($y,$m,$d,'array');
        $converted_date['month_days'] = $this->nepali_calendar->get_days_in_month($converted_date['year'],$converted_date['month']);
        

        $converted_date['holidays'] = $this->holiday_model->find_all($where);

        $converted_date['end_date_first_month'] = days_in_month($m,$y);
        $converted_date['starting_en_date'] = $d;

        $converted_date['tithi'] = json_decode(get_month_tithi_detail_json($year));

        $this->response($converted_date);
    }

    public function home_post()
    {
	    //TODO
    }

    public function home_delete()
    {
	    //TODO
    }

    private function check_token()
    {
        $token='';
        foreach (getallheaders() as $name => $value) {
            if($name == 'user_token'){
                $token = $value;
            }
        }
        if(!$token){
            echo json_encode(array('code'=>'101','success'=>false,'msg'=>'Access denied'));
            exit;
        }else{
            $where_token['token'] = $token;
            $user = $this->user_model->find_all($where_token);
            if(count($user)){
                return true;                
            }else{
                echo json_encode(array('code'=>'101','success'=>false,'msg'=>'Access denied'));
                exit;
            }
        }
    }


}