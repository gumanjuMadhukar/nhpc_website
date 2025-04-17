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
 * Admin
 *
 * Extends the Public_Controller class
 * 
 */

class Home extends Public_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('events/event_model');
		$this->load->model('services/service_model');
		$this->load->model('messages/message_model');
		$this->load->model('banners/banner_model');
		$this->load->model('partners/partner_model');
		$this->load->model('faqs/faq_model');

        // $this->lang->load('home/home');

	}

	public function index()
	{
		$this->db->cache_on();
		$where['status'] = 1;
		$data['events'] = $this->event_model->find_All();
		$data['messages'] = $this->message_model->find_All(NULL,NULL,'rank');
		$data['services'] = $this->service_model->find_All();
		$this->db->order_by('rank');
		$data['banners'] = $this->banner_model->find_All();
		$data['partners'] = $this->partner_model->find_all();
		$data['faqs'] = $this->faq_model->find_all();
		// Display Page
		$data['header'] = 'Home';
		$data['page'] = $this->config->item('template_public') . "home/index";
		// $data['module'] = 'home';
		$this->load->view($this->_container,$data);
	}

	public function result(){
		$data['header'] = 'Home';
		$data['page'] = $this->config->item('template_public') . "home/result";
		$this->load->view($this->_container,$data);
	}

	// public function test()
	// {
	// 	$data = $this->app_db->get('_web_menu')->result();
	// 	echo '<pre>';
	// 	print_r($data);
	// }
}