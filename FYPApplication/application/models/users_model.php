<?php

class Users_model extends MY_Model
{
    protected $table = 'users';
    protected $primary_key = 'id';
    
    
    function check_valid_user()
    {
        
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $this->db->where(array('email' => $email, 'password' => $password));
        $users_rows = $this->db->get('users')->result_array();
        //echo "<pre>";
        //print_r($users_rows);

        if(count($users_rows) > 0)
        {
                $this->session->set_userdata($users_rows[0]);
                return true;
        }
        else
        {
                return false;
        }
    }
    
}