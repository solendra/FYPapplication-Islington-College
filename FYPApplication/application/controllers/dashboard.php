<?php

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('products_model');
        $this->load->model('current_stock_model');
        $this->load->model('settings_model');
        
    }
    

    function index() {
        $this->load->view('dashboard/layout');
    }

    function logout()
    {
            $this->session->sess_destroy();
            redirect();
    }

}
