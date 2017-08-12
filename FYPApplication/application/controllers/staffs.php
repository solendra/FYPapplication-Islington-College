<?php

class Staffs extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('staffs_model');
    }
    
    function index()
    {
        $this->listing();
    }
    
    function listing()
    {
        $data['page'] = 'staffs/listing_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function add()
    {
        $data['page'] = 'staffs/add_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function add_action()
    {
        $data = $this->input->post();
        
        $this->staffs_model->insert($data);

        // show success message
        $this->session->set_flashdata('msg','Staff has been added successfully!!');
        redirect('staffs/add');
    }
    
    
    function edit($id)
    {
        $data['id'] = $id;
        $data['page'] = 'staffs/edit_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function edit_action()
    {
        
        $data = $this->input->post();
        
        $this->staffs_model->update($data, $data['id']);

        // show success message
        $this->session->set_flashdata('msg','Staff has been updated successfully!!');
        redirect('staffs/edit/'.$data['id']);
       
    }
}
