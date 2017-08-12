<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
        function __construct() {
            parent::__construct();
            
            // load users model
            $this->load->model('users_model');
            
            // if user is already logged in, then redirect it to dashboard
            if($this->session->userdata('id')) redirect('dashboard');
        }

	function index()
	{
            // if form is submitted then check user
            if($this->input->post())
            {
                    if($this->users_model->check_valid_user())
                    {
                            redirect('dashboard');
                    }
                    else 
                    {
                        // showing login error message
                        $this->session->set_flashdata('err_msg','Invalid Email / Password!!');
                        redirect();
                    }
            }
            // if form is not submitted yet then show login form
            else $this->load->view('login_view');
	}
        
}
