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

class Admin extends Public_Controller
{
	public function __construct()
	{
    	parent::__construct();
        
    	// control('Admin_cards');
          // Load form validation ibrary & user model 
          $this->load->library('form_validation'); 
          $this->load->model('admin/User_model'); 
        //   $this->load->model('admit_cards/User_model'); 
          $this->load->database();
    

           // User login status 
        // $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
		// if(! $this->isUserLoggedIn){ 
        //     $this->voucher_list();
        // }

        // $this->load->model('banners/banner_model');
        // $this->load->model('AdmitCard_model');
        // $this->load->model('Registration_model');
        // $this->load->model('User_model');

        // $this->lang->load('banners/banner');
        // $this->load->library('Zend');
        // $this->load->library('phpqrcode/qrlib');
        // $this->load->helper('url', 'form');
        // $this->load->library('form_validation');
        // $this->load->library('upload');
       
        

    }

    public function login(){
        
    }

    public function home()
	{
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        // print_r( $this->isUserLoggedIn);exit();
		if( $this->isUserLoggedIn){ 
            // $this->voucher_list();
            // exit();
            redirect('admin/voucher_list');
        }else{

        
        
        
       
        // print_r('here');exit();
		// Display Page
        // $data['header'] = 'Login';
        // $data['students'] = $this->User_model->get_all_re_exam_users();
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('loginSubmit')){ 
           
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')), 
                        'status' => 1 
                    ) 
                ); 
                $checkLogin = $this->User_model->getRows($con); 
            //      print_r($checkLogin);
            // exit();
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']);

                    $con = array( 
                        'id' => $this->session->userdata('userId') 
                    ); 
                   
        
                    // $data['user'] = $this->user->get_all("users");
                    
                    $user = $this->User_model->getRows($con);
                    $roleId = $user['role_id'];
                   
                    if($roleId == '1'){
                       redirect('admin/voucher_list');
                    }
  
                   
                }else{ 
                    $data['error_msg'] = 'Wrong email or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 


        $this->load->view($this->config->item('template_public') . "admin/header");
        $this->load->view($this->config->item('template_public') . "admin/login");
        $this->load->view($this->config->item('template_public') . "admin/footer");
    }
    }
    public function voucher_list(){
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        // print_r( $this->isUserLoggedIn);exit();
		if( $this->isUserLoggedIn){ 
            $data['students'] = $this->User_model->get_all_re_exam_users();
        // print_r($data['students'] );
        // exit();
        $this->load->view($this->config->item('template_public') . "re_exam_voucher/re_exam_voucher_list",$data);
    
        }else{
            redirect('admin');
        }
    }
    public function logout(){ 
        
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        $this->home();
    } 


  
}