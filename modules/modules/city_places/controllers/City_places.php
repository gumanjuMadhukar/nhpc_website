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
 * City_places
 *
 * Extends the Public_Controller class
 * 
 */

class City_places extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	control('City Places');

        $this->load->model('city_places/city_place_model');
        $this->lang->load('city_places/city_place');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('city_places');
		$data['page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'city_places';
		$this->load->view($this->_container,$data);
	}
}