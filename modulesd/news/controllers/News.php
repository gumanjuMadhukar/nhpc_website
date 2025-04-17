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
 * News
 *
 * Extends the Public_Controller class
 * 
 */

class News extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	// control('News');

        $this->load->model('news/news_model');
        $this->lang->load('news/news');
    }

    public function index()
	{
		// Display Page
		$data['header'] = lang('news');
		$data['page'] = $this->config->item('template_public') . "news/index";
		$data['module'] = 'news';
		$this->db->order_by('date','desc');
		$this->db->limit(6);
		$data['news_recent'] = $this->news_model->find_all();
		$this->db->order_by('date','desc');
		$data['news'] = $this->news_model->find_all();
		$this->load->view($this->_container,$data);
	}

	public function detail($id)
	{
		if ($id == null) 
		{
			redirect('news');            
		}

		$data['header'] = lang('news');
		$data['page'] = $this->config->item('template_public') . "news/newsinner";
		$where['id'] = $id;
		$data['detail'] = $this->news_model->find($where);
		$data['module'] = 'news';
		$this->load->view($this->_container,$data);
	}
}