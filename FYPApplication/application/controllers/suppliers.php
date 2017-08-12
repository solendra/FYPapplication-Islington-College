<?php

class Suppliers extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('suppliers_model');
    }
    
    function index()
    {
        $this->listing();
    }
    
    function listing()
    {
        $data['page'] = 'suppliers/listing_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function add()
    {
        $data['page'] = 'suppliers/add_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function add_action()
    {
        $data = $this->input->post();
        $data['created_on'] = date('Y-m-d');
        
        $this->suppliers_model->insert($data);

        // show success message
        $this->session->set_flashdata('msg','Supplier has been added successfully!!');
        redirect('suppliers/add');
    }
    
    
    function edit($id)
    {
        $data['id'] = $id;
        $data['page'] = 'suppliers/edit_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function edit_action()
    {
        
        $data = $this->input->post();
        
        $this->suppliers_model->update($data, $data['id']);

        // show success message
        $this->session->set_flashdata('msg','Supplier has been updated successfully!!');
        redirect('suppliers/edit/'.$data['id']);
       
    }
}
