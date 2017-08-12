<?php

class Current_stock extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('products_model');
        $this->load->model('current_stock_model');
        $this->load->model('product_code_price_model');
    }
    
    
    function index()
    {
        $this->listing();
    }
    
    function listing()
    {
        $data['page'] = 'current_stock/listing_view';
        $this->load->view('dashboard/layout', $data);
    }
    
}
