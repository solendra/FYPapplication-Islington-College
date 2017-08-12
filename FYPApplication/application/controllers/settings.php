<?php

class Settings extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        
        $this->load->model('settings_model');
        
    }
    
    function index()
    {
        $data['page'] = 'settings/settings_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    
    function edit_settings_action()
    {
        $data = $this->input->post();
       
        $this->settings_model->update($data, 1);
        
        $this->session->set_flashdata('msg','Software Settings has been Updated Successfully.');
        redirect('settings');
        
    }
   
}
