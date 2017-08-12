<?php

class Staff_salary extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('staffs_model');
        $this->load->model('staff_salary_paid_model');
    }
    
    function index()
    {
        $this->listing();
    }
    
    function listing()
    {
        $data['page'] = 'staff_salary/listing_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    
    function pay_action($staff_id, $month)
    {
        
        $staff_rows = $this->staffs_model->get($staff_id);
        
//        echo $staff_rows[0]s['salary'];
        
        $data = array(
                    'staff_id' => $staff_rows[0]['id'],
                    'month' => $month,
                    'amount' => $staff_rows[0]['salary'],          
                    'date' => date('Y-m-d')          
        );
        
        
        $this->staff_salary_paid_model->insert($data);
        
        // show success message
        $this->session->set_flashdata('msg','Staff salary paid successfully!!');
        redirect('staff_salary');
    }
    
    /*
     * 
    function pay()
    {
        $data['page'] = 'staff_salary/pay_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function pay_action()
    {
        $data = $this->input->post();
        $data['date'] = date('Y-m-d');
        $this->staff_salary_paid_model->insert($data);
        
        
        // show success message
        $this->session->set_flashdata('msg','Staff salary been added successfully!!');
        redirect('staff_salary/pay');
    }
    
    */
    
    
    function get_staff_salary_amount_ajax()
    {
        
        $staff_id =  $this->input->post('staff_id');
        
        $staffs_rows = $this->staffs_model->get($staff_id);
        echo $staffs_rows[0]['salary'];
    }
    
    function paid_history()
    {
        $data['page'] = 'staff_salary/paid_history_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    
    
}
