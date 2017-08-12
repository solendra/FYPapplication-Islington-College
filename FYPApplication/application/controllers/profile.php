<?php

class Profile extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        
        $this->load->model('users_model');
        
        
        
        $this->load->library('cart');    
    }
    
    function edit_profile()
    {
        $data['page'] = 'profile/edit_profile_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function edit_profile_action()
    {
        if($this->input->post('email')) $data['email'] = $this->input->post('email');
        if($this->input->post('password')) $data['password'] = md5($this->input->post('password'));
        
        $this->users_model->update($data, $this->session->userdata('id'));
        
        $this->session->set_flashdata('msg','Profile Updated Successfully.');
        redirect('profile/edit_profile');
        
    }
}
