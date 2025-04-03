<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends  Admin_Controller{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->db->cache_on();
		$data['header'] = 'Home';
		$data['page'] = $this->config->item('template_admin') . "home";
		$this->load->view($this->_container, $data);
		// $this->load->view('welcome_message');
	}
}
