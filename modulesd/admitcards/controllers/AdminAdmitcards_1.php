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
	protected $default_array = array(
		'year' => 2021,
		'month' => 12
	);
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
		$where = array(
			'year' => $this->default_array['year'],
			'month' => $this->default_array['month']
		);
		$params = $this->input->post(); 

		$total=$this->admitcard_model->find_count();

		/*Count for filters*/
		$this->_get_search_params($params);	
		$filter_total=$this->admitcard_model->find_count($where);

		/*Filters*/
		$this->_get_search_params($params);	
		$fields = ('id,first_name, last_name, middle_name, symbol_number, gender, program, level, photo_link');
		$rows=$this->admitcard_model->find_all($where, $fields);
		$rows = json_decode(json_encode($rows),TRUE);;

		echo json_encode(array('draw'=>$params['draw'],'recordsTotal'=>$total,'recordsFiltered'=>$filter_total,'data'=>$rows));
		exit;
	}

	public function search()
	{
		// Display Page
		$data['header'] = lang('admitcards');
		$data['page'] = $this->config->item('template_admin') . "search";
		$data['module'] = 'admitcards';
		$this->load->view($this->_container,$data);
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
            $this->db->or_like('new_app_admit_card.last_name', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.symbol_number', $params['search']['value']);
            $this->db->or_like('new_app_admit_card.program', $params['search']['value']);



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
        $fields = '*, program.name AS program, level.name AS level, document_information.document_link as student_signature,college.name as college, email, mobile_num';
        $this->otherdb->select($fields);
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id','left');
        $this->otherdb->join('program', 'registration.program_id = program.id','left');
        $this->otherdb->join('level', 'registration.level_id = level.id','left');
        $this->otherdb->join('document_information', "registration.id = document_information.registration_id AND type = 'student_signature'",'left');
        $this->otherdb->join('college', "registration.college_id = college.id",'left');
        $this->otherdb->join('phone', "registration.phone_id = phone.id",'left');
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
	        		'email' => ($v['email']),
	        		'phone_no' => ($v['mobile_num']),
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

    public function generate_remaining()
    {
		$registration_id_array = array(
			72431, 72585, 72626, 72632, 72700, 72911, 73062, 73181, 73223, 73261, 73343, 73353, 73355, 73402, 73420, 73468, 73480, 73638, 73668, 73712, 73768, 73842, 73861, 73865, 74054, 74064, 74074, 74139, 74151, 74160, 74235, 74963, 75087, 75091, 75092, 71982, 68180, 68299, 68301, 69510, 70066, 70584, 68859, 74477, 74483, 74508, 74540, 74569, 74649, 74696, 74803, 74875, 74913, 74936, 68347, 69720, 72376, 72395, 72403, 72437, 72449, 72509, 72522, 72571, 72573, 72582, 72665, 72679, 72771, 72787, 72826, 72848, 72859, 72860, 72883, 72922, 72937, 72972, 72995, 73003, 73004, 73037, 73047, 73061, 73071, 73079, 73098, 73099, 73101, 73135, 73148, 73185, 73225, 73230, 73258, 73272, 73295, 73313, 73329, 73364, 73417, 73495, 73496, 73550, 73563, 73569, 73798, 73804, 73808, 73831, 73872, 73875, 73880, 73934, 73948, 73956, 73995, 74000, 74004, 74044, 74055, 74059, 74113, 74123, 74135, 74144, 74163, 74195, 74219, 74244, 74265, 74328, 74418, 74419, 74423, 74436, 74448, 74451, 74453, 74457, 74474, 74481, 74485, 74488, 74496, 74498, 74521, 74522, 74544, 74555, 74563, 74572, 74583, 74605, 74667, 74684, 74692, 74693, 74697, 74714, 74716, 74718, 74726, 74730, 74735, 74741, 74762, 74872, 74942, 75021, 75025, 75032, 75033, 75059, 75083, 75192, 75196, 75199, 75202, 71823, 71862, 71863, 71865, 71941, 71977, 68120, 68302, 68314, 68434, 68529, 68672, 68710, 68766, 68845, 69035, 69099, 69415, 69505, 70893, 71149, 71170, 74205, 72396, 72769, 72772, 72785, 72788, 72997, 73044, 73076, 73190, 73196, 73278, 73292, 73297, 73391, 73428, 73454, 73524, 73546, 73613, 73640, 73718, 73802, 73807, 73860, 73868, 73886, 73897, 73913, 73953, 73996, 74009, 74022, 74079, 74118, 74201, 74276, 74311, 74329, 74374, 74541, 74845, 75191, 68083, 68087, 71520, 71882, 68115, 68169, 68185, 68244, 68400, 68490, 68572, 68875, 69806, 70534, 70886, 71086, 72356, 72375, 72417, 72420, 72422, 72439, 72546, 72562, 72610, 72652, 72761, 72992, 73036, 73105, 73107, 73160, 73168, 73169, 73203, 73207, 73255, 73266, 73270, 73276, 73290, 73300, 73305, 73361, 73382, 73405, 73410, 73416, 73473, 73505, 73561, 73567, 73568, 73639, 73642, 73646, 73647, 73741, 73754, 73779, 73787, 73792, 73801, 73812, 73858, 73917, 73966, 73999, 74024, 74029, 74043, 74083, 74084, 74250, 74334, 74384, 74612, 74648, 74724, 74753, 74909, 74938, 74946, 74959, 75019, 75041, 75182, 75217, 71578, 72063, 68096, 68348, 68567, 68621, 69027, 69034, 69401, 69104, 70510, 72418, 72453, 72479, 72551, 72574, 72586, 72612, 72824, 72867, 72893, 72900, 72935, 72951, 72960, 72967, 72969, 72986, 73020, 73043, 73051, 73114, 73183, 73199, 73260, 73342, 73360, 73397, 73412, 73413, 73472, 73474, 73555, 73593, 73632, 73636, 73698, 73703, 73708, 73719, 73720, 73722, 73725, 73734, 73740, 73751, 73784, 73786, 73797, 73823, 73824, 73829, 73835, 73854, 73869, 73876, 73936, 73949, 74005, 74010, 74016, 74041, 74045, 74048, 74057, 74065, 74066, 74068, 74073, 74081, 74108, 74112, 74119, 74173, 74187, 74194, 74200, 74204, 74210, 74216, 74218, 74227, 74231, 74236, 74239, 74248, 74254, 74275, 74285, 74286, 74301, 74302, 74310, 74312, 74313, 74318, 74320, 74321, 74322, 74323, 74324, 74325, 74337, 74339, 74340, 74342, 74345, 74349, 74352, 74353, 74361, 74362, 74366, 74386, 74388, 74390, 74397, 74399, 74400, 74401, 74403, 74411, 74413, 74415, 74416, 74425, 74432, 74439, 74440, 74441, 74442, 74445, 74447, 74449, 74454, 74455, 74459, 74461, 74463, 74465, 74470, 74478, 74484, 74486, 74489, 74494, 74499, 74503, 74505, 74509, 74513, 74514, 74515, 74516, 74519, 74525, 74526, 74527, 74528, 74531, 74533, 74537, 74543, 74545, 74548, 74549, 74550, 74559, 74575, 74576, 74579, 74582, 74584, 74585, 74589, 74594, 74595, 74596, 74599, 74602, 74603, 74604, 74609, 74617, 74620, 74622, 74623, 74625, 74628, 74630, 74632, 74641, 74642, 74646, 74651, 74652, 74653, 74658, 74660, 74664, 74670, 74674, 74685, 74705, 74707, 74709, 74710, 74713, 74720, 74721, 74725, 74727, 74728, 74732, 74734, 74736, 74743, 74744, 74754, 74755, 74756, 74757, 74759, 74761, 74765, 74770, 74771, 74777, 74779, 74780, 74782, 74784, 74785, 74787, 74788, 74789, 74790, 74792, 74796, 74797, 74798, 74799, 74800, 74801, 74807, 74810, 74811, 74813, 74814, 74815, 74816, 74817, 74819, 74820, 74821, 74822, 74827, 74829, 74833, 74834, 74838, 74839, 74842, 74848, 74852, 74853, 74855, 74858, 74859, 74860, 74864, 74868, 74870, 74873, 74874, 74876, 74877, 74880, 74882, 74884, 74886, 74888, 74893, 74903, 74904, 74905, 74906, 74908, 74911, 74915, 74916, 74918, 74919, 74920, 74921, 74923, 74927, 74928, 74932, 74933, 74941, 74951, 74952, 74956, 74957, 74961, 74962, 74964, 74971, 74972, 74976, 74977, 74983, 74986, 74988, 74991, 74993, 74995, 74996, 75001, 75009, 75012, 75016, 75017, 75020, 75022, 75027, 75035, 75037, 75039, 75042, 75045, 75047, 75053, 75057, 75094, 75095, 75129, 75138, 75155, 75160, 75190, 75198, 75201, 75203, 75208, 75216, 75218, 75219, 75222, 75223, 75224, 75225, 72144, 72142, 68190, 68604, 71284, 71318, 74574, 68536, 72329, 72478, 71955, 68199, 72614, 72750, 73145, 75044, 75081, 75164, 75186, 75207, 71583, 68477, 72426, 72629, 72971, 73737, 73852, 74133, 74497, 74504, 75197, 71691, 70660, 72355, 72483, 73674, 73757, 74427, 74867, 75063, 75088, 75089, 72616, 71530, 68242, 68325, 72668, 72704, 72796, 73080, 73251, 73423, 73437, 73482, 73515, 73644, 73874, 74591, 68234, 69036, 68894, 68959, 70511, 71088, 72741, 73630, 73821, 75184, 72806, 70922, 74358, 74367, 74644, 70854, 70892, 73119, 73765, 72377, 72381, 72401, 72406, 72407, 72411, 72459, 72466, 72484, 72486, 72490, 72534, 72541, 72544, 72545, 72549, 72579, 72581, 72594, 72647, 72654, 72694, 72699, 72713, 72715, 72800, 72903, 72987, 72993, 73121, 73123, 73132, 73136, 73140, 73285, 73304, 73317, 73326, 73370, 73383, 73385, 73393, 73431, 73434, 73537, 73543, 73556, 73562, 73683, 73687, 73714, 73724, 73733, 73735, 73746, 73760, 73761, 73793, 73810, 73859, 73890, 73920, 73944, 73954, 73955, 73982, 73983, 74001, 74012, 74126, 74156, 74177, 74184, 74193, 74196, 74202, 74226, 74229, 74234, 74243, 74247, 74251, 74252, 74266, 74273, 74277, 74282, 74354, 74357, 74444, 74530, 74552, 74587, 74638, 74659, 74665, 74677, 74691, 74700, 74733, 74767, 74783, 74795, 74805, 74823, 74895, 74917, 75013, 75036, 75060, 75167, 75193, 75204, 71895, 71898, 71902, 71944, 72043, 72239, 72250, 68326, 68360, 68475, 68476, 68538, 68681, 68757, 69306, 70327, 70406, 71093, 72393, 72425, 72433, 72457, 72458, 72657, 72673, 72690, 72721, 72734, 72743, 72763, 72766, 73042, 73172, 73173, 73335, 73337, 73351, 73354, 73380, 73390, 73426, 73517, 73518, 73520, 73526, 73592, 73594, 73599, 73602, 73604, 73607, 73637, 73675, 73682, 73701, 73730, 73731, 73744, 73752, 73773, 73788, 73822, 73839, 73916, 73921, 73924, 73925, 73927, 73947, 73997, 74003, 74023, 74031, 74035, 74148, 74164, 74175, 74185, 74186, 74197, 74207, 74211, 74221, 74223, 74232, 74237, 74245, 74249, 74271, 74309, 74356, 74363, 74370, 74372, 74512, 74554, 74598, 74682, 74711, 74731, 74791, 74836, 74866, 74887, 74889, 74926, 74930, 74955, 74969, 75000, 75079, 75143, 75147, 75166, 75206, 71685, 72095, 72103, 72137, 72277, 68116, 68204, 68211, 68346, 68371, 68379, 68421, 68430, 68565, 68618, 68787, 68794, 69274, 69277, 70051, 70057, 70062, 70180, 70540, 70620, 70879, 70982, 71203, 71344, 69813, 69992, 71326, 72325, 72345, 72348, 72358, 72363, 72370, 72371, 72372, 72373, 72374, 72379, 72382, 72385, 72387, 72389, 72410, 72412, 72413, 72414, 72432, 72435, 72436, 72464, 72465, 72474, 72488, 72493, 72497, 72500, 72524, 72531, 72548, 72550, 72552, 72555, 72556, 72558, 72560, 72561, 72564, 72580, 72587, 72592, 72595, 72599, 72604, 72605, 72607, 72618, 72621, 72630, 72633, 72636, 72638, 72640, 72641, 72645, 72651, 72663, 72669, 72672, 72674, 72675, 72678, 72684, 72685, 72686, 72689, 72693, 72695, 72696, 72705, 72708, 72716, 72718, 72719, 72722, 72731, 72732, 72735, 72745, 72747, 72751, 72755, 72756, 72757, 72759, 72762, 72764, 72768, 72773, 72779, 72786, 72793, 72794, 72799, 72802, 72809, 72810, 72813, 72820, 72829, 72837, 72842, 72849, 72853, 72865, 72870, 72877, 72881, 72887, 72891, 72892, 72894, 72896, 72902, 72909, 72923, 72926, 72929, 72930, 72932, 72933, 72934, 72936, 72939, 72942, 72948, 72954, 72957, 72973, 72978, 72981, 72982, 72985, 72988, 72998, 72999, 73000, 73002, 73007, 73008, 73009, 73010, 73011, 73012, 73014, 73015, 73016, 73017, 73018, 73023, 73024, 73030, 73035, 73038, 73039, 73040, 73048, 73060, 73072, 73075, 73078, 73081, 73085, 73091, 73093, 73100, 73102, 73104, 73108, 73115, 73125, 73126, 73127, 73128, 73130, 73133, 73141, 73154, 73161, 73162, 73164, 73166, 73170, 73176, 73178, 73180, 73182, 73186, 73187, 73188, 73192, 73201, 73202, 73204, 73211, 73215, 73219, 73220, 73221, 73227, 73238, 73256, 73265, 73267, 73277, 73279, 73282, 73287, 73288, 73289, 73291, 73302, 73303, 73306, 73309, 73310, 73321, 73327, 73336, 73352, 73372, 73377, 73378, 73379, 73392, 73394, 73398, 73399, 73401, 73407, 73409, 73411, 73419, 73421, 73424, 73425, 73432, 73435, 73438, 73439, 73442, 73444, 73445, 73446, 73449, 73451, 73452, 73455, 73456, 73457, 73458, 73459, 73461, 73465, 73466, 73471, 73479, 73489, 73492, 73500, 73502, 73521, 73530, 73533, 73540, 73541, 73545, 73553, 73557, 73558, 73559, 73560, 73564, 73565, 73580, 73581, 73585, 73587, 73589, 73595, 73603, 73605, 73614, 73618, 73621, 73624, 73626, 73631, 73634, 73652, 73653, 73684, 73699, 73700, 73702, 73704, 73707, 73715, 73729, 73732, 73736, 73738, 73743, 73745, 73763, 73767, 73770, 73772, 73776, 73783, 73790, 73805, 73814, 73816, 73817, 73818, 73820, 73828, 73830, 73873, 73882, 73888, 73889, 73891, 73892, 73904, 73908, 73910, 73911, 73912, 73914, 73919, 73928, 73937, 73942, 73945, 73958, 73960, 73965, 73967, 73969, 73973, 73974, 73976, 73978, 73980, 73981, 73987, 73989, 73990, 73992, 74002, 74008, 74018, 74019, 74021, 74028, 74030, 74036, 74039, 74052, 74061, 74093, 74115, 74116, 74138, 74145, 74150, 74166, 74167, 74171, 74176, 74178, 74199, 74203, 74206, 74220, 74222, 74230, 74240, 74242, 74267, 74269, 74308, 74314, 74319, 74371, 74393, 74396, 74487, 74535, 74551, 74586, 74588, 74600, 74614, 74656, 74663, 74678, 74703, 74708, 74717, 74722, 74738, 74742, 74750, 74760, 74769, 74781, 74802, 74804, 74812, 74824, 74832, 74835, 74837, 74847, 74850, 74857, 74862, 74863, 74871, 74901, 74912, 74924, 74943, 74958, 74975, 74985, 74999, 75004, 75068, 75151, 75180, 75194, 75195, 75200, 71462, 71523, 71524, 71536, 71574, 71592, 71593, 71607, 71632, 71641, 71643, 71702, 71703, 71708, 71709, 71715, 71721, 71779, 71797, 71803, 71821, 71825, 71826, 71833, 71894, 71906, 71917, 71924, 71928, 71933, 71937, 71939, 71956, 71971, 71974, 71983, 71989, 72022, 72025, 72027, 72031, 72032, 72056, 72057, 72060, 72070, 72074, 72089, 72093, 72106, 72119, 72122, 72131, 72158, 72165, 72176, 72184, 72204, 72214, 72215, 72217, 72233, 72248, 68143, 68145, 68176, 68195, 68200, 68206, 68220, 68260, 68310, 68316, 68318, 68319, 68321, 68353, 68365, 68375, 68383, 68395, 68440, 68441, 68469, 68470, 68480, 68484, 68486, 68497, 68509, 68510, 68526, 68527, 68548, 68573, 68580, 68589, 68594, 68601, 68602, 68611, 68612, 68613, 68626, 68632, 68645, 68646, 68648, 68653, 68756, 68764, 68777, 68785, 68786, 68798, 68820, 68821, 68827, 68862, 68868, 68881, 68897, 68906, 68925, 68930, 68931, 68939, 69002, 69032, 69037, 69097, 69100, 69114, 69153, 69193, 69197, 69279, 69316, 69320, 69360, 69369, 69377, 69380, 69382, 69414, 69420, 69428, 69432, 69454, 69465, 69478, 69486, 69497, 69500, 69551, 69559, 69564, 69573, 69578, 69585, 69590, 69600, 69607, 69609, 69625, 69653, 69667, 69672, 69690, 69710, 69714, 69730, 69732, 69750, 69766, 69779, 69790, 69814, 69824, 69828, 69838, 69840, 69858, 69890, 69892, 69909, 69911, 69913, 69919, 69928, 69995, 70037, 70041, 70047, 70074, 70079, 70094, 70124, 70149, 70154, 70159, 70181, 70187, 70195, 70198, 70227, 70248, 70249, 70281, 70297, 70298, 70321, 70325, 70336, 70338, 70340, 70351, 70362, 70377, 70405, 70427, 70463, 70519, 70529, 70542, 70549, 70599, 70606, 70613, 70624, 70633, 70648, 70659, 70672, 70693, 70701, 70714, 70723, 70732, 70744, 70752, 70793, 70795, 70829, 70838, 70840, 70877, 70917, 70921, 70929, 70950, 70963, 70997, 71001, 71019, 71022, 71031, 71034, 71049, 71057, 71087, 71117, 71131, 71138, 71189, 71194, 71228, 71256, 71267, 71271, 71278, 71296, 71358, 71360, 71372, 71381, 71382, 71459, 68333, 68608, 68676, 69051, 69586, 69748, 70176, 70253, 70308, 70334, 70490, 70562, 70619, 70626, 70638, 70813, 70858, 70966, 71200, 72321, 72349, 72380, 72386, 72400, 72415, 72416, 72428, 72429, 72456, 72463, 72470, 72472, 72480, 72482, 72485, 72489, 72491, 72492, 72495, 72499, 72532, 72563, 72565, 72570, 72572, 72577, 72583, 72593, 72602, 72609, 72622, 72625, 72635, 72639, 72646, 72648, 72655, 72664, 72671, 72680, 72682, 72687, 72691, 72720, 72723, 72728, 72736, 72738, 72739, 72740, 72748, 72753, 72765, 72774, 72781, 72783, 72784, 72789, 72790, 72801, 72805, 72811, 72814, 72815, 72819, 72833, 72834, 72839, 72847, 72852, 72855, 72856, 72857, 72862, 72874, 72878, 72901, 72904, 72907, 72927, 72928, 72941, 72945, 72949, 72950, 72952, 72953, 72956, 72959, 72962, 72965, 72970, 72974, 72975, 72979, 72989, 72994, 73021, 73041, 73046, 73050, 73052, 73055, 73065, 73103, 73109, 73120, 73122, 73129, 73137, 73143, 73150, 73151, 73152, 73165, 73167, 73177, 73179, 73189, 73191, 73195, 73200, 73214, 73217, 73229, 73231, 73236, 73250, 73257, 73264, 73274, 73280, 73284, 73293, 73308, 73315, 73319, 73320, 73324, 73330, 73331, 73350, 73373, 73374, 73384, 73386, 73395, 73396, 73408, 73414, 73422, 73429, 73433, 73443, 73447, 73448, 73450, 73463, 73475, 73476, 73483, 73484, 73485, 73486, 73487, 73490, 73494, 73511, 73525, 73528, 73531, 73535, 73536, 73551, 73566, 73571, 73575, 73578, 73579, 73582, 73586, 73588, 73591, 73609, 73615, 73617, 73620, 73625, 73651, 73669, 73671, 73676, 73679, 73680, 73685, 73688, 73690, 73693, 73695, 73696, 73697, 73710, 73721, 73742, 73748, 73750, 73753, 73755, 73766, 73775, 73780, 73782, 73785, 73789, 73794, 73796, 73803, 73809, 73815, 73825, 73826, 73836, 73838, 73870, 73879, 73885, 73893, 73896, 73898, 73900, 73902, 73903, 73906, 73930, 73933, 73950, 73957, 73975, 73977, 73985, 73986, 74011, 74017, 74020, 74026, 74032, 74034, 74049, 74053, 74067, 74082, 74089, 74094, 74095, 74099, 74110, 74122, 74129, 74134, 74143, 74147, 74149, 74153, 74154, 74155, 74158, 74159, 74170, 74183, 74192, 74198, 74208, 74209, 74224, 74246, 74260, 74270, 74365, 74385, 74394, 74414, 74532, 74577, 74578, 74590, 74601, 74607, 74610, 74613, 74624, 74627, 74637, 74647, 74650, 74669, 74673, 74694, 74695, 74701, 74712, 74745, 74749, 74766, 74768, 74774, 74776, 74825, 74831, 74900, 74910, 74950, 74965, 74981, 75018, 75038, 75069, 75080, 75085, 75106, 75144, 75169, 75172, 68056, 68058, 71599, 71605, 71653, 71699, 71700, 71766, 71777, 71758, 71786, 71791, 71908, 71931, 71934, 71948, 71953, 71981, 72019, 72061, 72062, 72128, 72135, 72136, 72166, 72187, 72246, 72249, 72272, 72286, 68140, 68173, 68215, 68230, 68293, 68337, 68373, 68389, 68425, 68479, 68493, 68494, 68496, 68507, 68516, 68520, 68551, 68578, 68579, 68587, 68588, 68590, 68591, 68592, 68615, 68636, 68674, 68689, 68795, 68812, 68814, 68824, 68846, 68864, 68933, 69015, 69106, 69124, 69125, 69127, 69129, 69132, 69133, 69135, 69136, 69138, 69140, 69144, 69145, 69180, 69183, 69184, 69187, 69188, 69191, 69192, 69194, 69195, 69198, 69199, 69202, 69205, 69207, 69208, 69209, 69210, 69299, 69334, 69335, 69351, 69358, 69363, 69376, 69421, 69430, 69431, 69482, 69542, 69639, 69662, 69684, 69722, 69739, 69773, 69850, 69854, 69880, 69902, 69910, 69929, 69959, 69971, 70005, 70010, 70027, 70029, 70030, 70031, 70038, 70110, 70128, 70132, 70153, 70160, 70164, 70172, 70175, 70239, 70252, 70301, 70312, 70330, 70355, 70454, 70494, 70508, 70533, 70586, 70611, 70629, 70640, 70643, 70689, 70708, 70713, 70718, 70721, 70722, 70726, 70731, 70734, 70767, 70777, 70785, 70790, 70803, 70842, 70846, 70850, 70862, 70863, 70867, 70881, 70894, 70900, 70930, 70977, 70979, 70981, 70985, 70993, 71007, 71012, 71035, 71039, 71065, 71071, 71074, 71078, 71095, 71099, 71126, 71159, 71187, 71211, 71214, 71232, 71245, 71250, 71251, 71253, 71262, 71269, 71277, 71280, 71283, 71291, 71295, 71301, 71303, 71304, 71306, 71311, 71313, 71320, 71321, 71340, 71361, 71365, 71377, 71411, 71456, 68695, 68382, 69203, 69270, 69633, 69842, 70126, 71009, 71090, 72332, 72388, 72390, 72427, 72450, 72462, 72467, 72494, 72523, 72537, 72554, 72584, 72627, 72631, 72697, 72701, 72706, 72709, 72710, 72712, 72760, 72775, 72817, 72832, 72838, 72843, 72846, 72868, 72905, 72910, 72946, 72991, 73005, 73096, 73097, 73131, 73175, 73249, 73259, 73275, 73440, 73467, 73503, 73681, 73728, 73756, 73759, 73774, 73795, 73806, 73970, 73993, 74037, 74051, 74125, 74253, 74330, 74570, 74581, 74629, 74851, 74987, 75082, 75153, 71626, 71842, 71957, 72000, 72047, 72091, 72094, 72101, 72149, 72151, 72190, 72211, 72230, 72232, 72234, 72260, 72270, 72271, 68651, 68711, 68769, 68877, 68936, 68937, 68954, 68957, 68964, 68987, 69024, 69043, 69045, 69049, 69050, 69054, 69064, 69067, 69069, 69074, 69080, 69094, 69101, 69271, 69418, 69577, 69605, 69671, 69703, 69743, 69785, 69791, 69815, 69937, 69962, 70150, 70157, 70163, 70174, 70283, 70305, 70345, 70385, 70665, 70700, 70789, 70899, 71073, 71109, 71264, 69096, 73138, 68126, 68462, 68682, 72469, 72749, 72943, 73032, 73045, 73073, 73228, 73597, 72216, 68274, 70654, 70702, 70794, 73739, 73129, 70761, 69496, 71386, 70911, 70289, 69698, 70725, 68673, 70745, 68895, 73815, 69467, 68765, 70411, 70724, 70627, 71462, 69181, 69443, 69398, 71097, 70373, 69635, 69694, 70716, 68830, 71261, 69569
		);
    	$this->otherdb = $this->load->database('app', TRUE);
        $fields = '*, registration.id as required_id, program.name AS program, level.name AS level, document_information.document_link as student_signature,college.name as college, email, mobile_num';
        $this->otherdb->select($fields);
        $this->otherdb->join('registration_processing', 'registration.id = registration_processing.registration_id','left');
        $this->otherdb->join('program', 'registration.program_id = program.id','left');
        $this->otherdb->join('level', 'registration.level_id = level.id','left');
        $this->otherdb->join('document_information', "registration.id = document_information.registration_id AND type = 'student_signature'",'left');
        $this->otherdb->join('college', "registration.college_id = college.id",'left');
        $this->otherdb->join('phone', "registration.phone_id = phone.id",'left');
        // $this->otherdb->where('registration_processing.current_state','exam_committee'); uncomment after generating admit card
        // $this->otherdb->where('registration_processing.current_status','progress'); uncomment after generating admit card
		$this->otherdb->where_in('registration.id', $registration_id_array); // comment after generating admit card
        $this->otherdb->order_by('program_id');
        $this->otherdb->order_by('registration.first_name');
        $this->otherdb->order_by('registration.middle_name');
        $this->otherdb->order_by('registration.last_name');
		$this->otherdb->group_by('registration.id');
        $students = $this->otherdb->get('registration')->result_array();
         //echo $this->otherdb->last_query().'<br>';
    	 //echo count($students).'<br>';
		 //exit;
        if(count($students)){
        	$count = 1;
        	foreach($students as $k => $v)
	        {
	        	$where = array('phone_no'=>$v['mobile_num']);
	        	$generated_record = $this->admitcard_model->find($where);
	        	if(!$generated_record){
					$program_id = $v['program_id'];
					$where = array('program' => $v['program']);
					$count = $this->admitcard_model->find_count($where) + 1;
					echo $count.'<br>';

					$key = array_search($v['first_name'], array_column($students, 'first_name'));
		        	$v['day_dob_nepali_date'] = sprintf("%02d", $v['day_dob_nepali_date']);
		        	$v['month_dob_nepali_date'] = sprintf("%02d", $v['month_dob_nepali_date']);
		        	$data = array(
						'registration_id' => $v['required_id'],
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
		        		'email' => ($v['email']),
		        		'phone_no' => ($v['mobile_num']),
						'year' => $this->default_array['year'],
						'month' => $this->default_array['month'],
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


	        		// echo $count;
	        		// $count++;
	    			// print_r($v['first_name'] . ' ' .$v['program']);
	    			// echo $v['college'];
	    			// echo '<br>';
	        	}
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

    public function detail_1()
    {
		$data['header'] = lang('admitcards');
		$data['page'] = $this->config->item('template_admin') . "edit";
		$data['module'] = 'admitcards';
		$symbol_number = $this->input->get('symbol_number');
		if($symbol_number)
		{
			$data['edit_data'] = $this->admitcard_model->find(array('symbol_number'=>$symbol_number));
			if($data['edit_data']){
				$data['id'] = $data['edit_data']->id;
				$data['form'] = "Edit";
				$this->load->view($this->_container,$data);
			}else{
				$data['page'] = $this->config->item('template_admin') . "error_symbol";
				$this->load->view($this->_container,$data);
			}
		}
		
    }

    public function save_image()
    {
    	$data['id'] = $this->input->post('id');
    	$image = $this->input->post('webcam');
    	list($image_name,$image_ext) = explode('.',$image);

    	if(trim($image_ext) != 'jpeg'){
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
	    $data['thumb'] = $this->input->post('thumb');
	    $data['thumb2'] = $this->input->post('thumb2');
    	$this->admitcard_model->update($data['id'],$data);
    	redirect('admin/Admitcards/search');
    }

    public function downloadExcel()
	{
		// $this->member_model->_table = 'view_members';
		$where = array(
			'year' => $this->default_array['year'],
			'month' => $this->default_array['month'],
		);
		$rows=$this->admitcard_model->find_all($where);
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
        ->setCellValue('E1', 'Photo Link')
        ->setCellValue('F1', 'DOB')
        ->setCellValue('G1', 'Program')
        ->setCellValue('H1', 'Email')
        ->setCellValue('I1', 'Mobile')
        ->setCellValue('J1', 'Permanent Address');

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
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->photo_link);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->year_dob_nepali_date .'-'. $values->month_dob_nepali_date . '-' . $values->day_dob_nepali_date);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->program);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->email);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->phone_no);
            $col++;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$values->vdc_municipality_english);
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

	public function result($value='')
	{
		$config['upload_path'] = './uploads/result';
    	$config['allowed_types'] = 'xlsx|csv|xls';
    	$config['max_size'] = 100000;

    	$this->load->library('upload', $config);

    	if (!$this->upload->do_upload('result')) {
    		$error = array('error' => $this->upload->display_errors());
    		print_r($error); exit;
    		redirect($_SERVER['HTTP_REFERER']);
    	} else {
    		$data = array('upload_data' => $this->upload->data());
    	}

    	$file = FCPATH . 'uploads/result/' . $data['upload_data']['file_name']; 
    	$this->load->library('Excel');
    	$objPHPExcel = PHPExcel_IOFactory::load($file);
    	$objReader = PHPExcel_IOFactory::createReader('Excel2007');        
    	$objReader->setReadDataOnly(false);

    	$index = array('symbol_number','result');
    	// $index = array('symbol_number','result','percent');
    	$raw_data = array();
    	$view_data = array();
    	foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
    		if ($key == 0) {
    			$worksheetTitle = $worksheet->getTitle();
				$highestRow = $worksheet->getHighestRow(); // e.g. 10
				$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
				$nrColumns = ord($highestColumn) - 64;

				for ($row = 2; $row <= $highestRow; ++$row) {
					for ($col = 0; $col < count($index); ++$col) {
						$cell = $worksheet->getCellByColumnAndRow($col, $row);
						$val = $cell->getValue();
						$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
						$raw_data[$row][$index[$col]] = $val;
					}
				}
			}
		}

		$error_count = 0;
		$missing = array();
		$result = array();
		$imported_data = array();
		$fields = 'id,symbol_number, result';
		foreach ($raw_data as $key => $value) {
			if($value['symbol_number']){
				// get student record to update result
				$where = array('symbol_number' => $value['symbol_number']);
				$student_record = $this->admitcard_model->find($where,$fields);
				// update result if symbol_number exist else list in array
				if($student_record){
					// set value to update
					$student_record->result = $value['result'];
					// $student_record->percent = $value['percent'];
					// update result
					$result = $this->admitcard_model->update($student_record->id,$student_record);
				}else{
					$missing[] = $value;
				}
				// $this->db->close();
			}
		}	

		// echo '<pre>'; print_r($imported_data); exit;

		if(count($missing) > 0){
			// Display Page
			$data['header'] = lang('admitcards');
			$data['page'] = $this->config->item('template_admin') . "missing_symbol";
			$data['module'] = 'admitcards';
			$this->load->view($this->_container,$data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}