<?php

class Products extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('products_model');
    }
    
    
    function index()
    {
        $this->listing();
    }
    
    function listing()
    {
        $data['page'] = 'products/listing_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function add()
    {
        $data['page'] = 'products/add_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function add_action()
    {
        $data = $this->input->post();
        
        // check if the product name is already exists
        $products_rows = $this->products_model->get(array('product_name' => $data['product_name']));
        if(count($products_rows) == 0)
        {
            $this->products_model->insert($data);
            
            // show success message
            $this->session->set_flashdata('msg','Product has been added successfully!!');
            redirect('products/add');
        }
        else
        {
            // show error message
            $this->session->set_flashdata('err_msg', $data['product_name'].' product already exists!!');
            redirect('products/add');
        }
    }
    
    function edit($id)
    {
        $data['id'] = $id;
        $data['page'] = 'products/edit_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function edit_action()
    {
        $data = $this->input->post();
        
        
        // check if the product name is already exists
        $products_rows = $this->products_model->get("product_name = '".$data['product_name']."' AND id != ".$data['id']);
        
        if(count($products_rows) == 0)
        {
            $this->products_model->update($data, $data['id']);
            
            // show success message
            $this->session->set_flashdata('msg','Product has been updated successfully!!');
            redirect('products/edit/'.$data['id']);
        }
        else
        {
            // show error message
            $this->session->set_flashdata('err_msg', $data['product_name'].' product already exists!!');
            redirect('products/edit/'.$data['id']);
        }
        
        $this->output->enable_profiler();
    }
    
    
}
