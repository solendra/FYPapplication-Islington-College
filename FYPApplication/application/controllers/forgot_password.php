<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends CI_Controller {
    
        function __construct() {
            parent::__construct();
            
            // load users model
            $this->load->model('users_model');
            
            // if user is already logged in, then redirect it to dashboard
            if($this->session->userdata('id')) redirect('dashboard');
        }

	function index()
	{
            $this->load->view('forgot_password_view');
	}
        
        function send_code()
        {
            if($this->input->post())
            {
                $email = $this->input->post('email');

                $users_rows = $this->users_model->get(array('email' => $email));

                if(count($users_rows) > 0)
                {
                    // generate unique code
                    $code = md5(uniqid()); 

                    // insert to user's forgot password code

                    $data['forgot_password_code'] = $code;

                    $this->users_model->update($data, $users_rows[0]['id']);


                    // User email confirmation
                    $this->load->library('email', array('mailtype' => 'html'));
                    $this->email->from('account@securitynepal.com', 'OM Furnishing Management System');
                    $this->email->to("$email");
                    $this->email->subject("Forget account password.");

                    $message = "<p>Somebody recently asked to reset your account's password.</p>";
                    $message .= "<p><a href='".base_url("forgot_password/reset/$code")."'>Click here</a> to reset your account's password</p>";

                    $this->email->message($message);
                    $this->email->send();

			//echo $this->email->print_debugger();

			//die();

                    //echo "Email sent with password reset instruction.";

//                    echo '<hr> <b>Email:</b>';

//                    echo $message;

			$this->session->set_flashdata('msg','Email with password reset Instruction sent!');
                        redirect();


                }
                else
                {
                    // showing login error message
                    $this->session->set_flashdata('err_msg','Invalid Email Address!');
                    redirect('forgot_password?email='.$this->input->post('email'));
                }
            } else redirect('forgot_password');
            
            
            
        }
        
        function reset($code)
        {
            $users_rows = $this->users_model->get(array('forgot_password_code' => $code));
            if(count($users_rows) > 0)
            {
                $data['code'] = $code;
                $this->load->view('password_reset_view', $data);
            }
            else
            {
                // showing login error message
                $this->session->set_flashdata('err_msg','Invalid Password Reset Code!');
                redirect('forgot_password');
            }
            
        }
        
        function reset_action()
        {
            $forgot_password_code = $this->input->post('forgot_password_code');
            
            $users_rows = $this->users_model->get(array('forgot_password_code' => $forgot_password_code));
            if(count($users_rows) > 0)
            {
                $data['password'] = md5($this->input->post('password'));
                $data['forgot_password_code'] = '';
                
                $this->users_model->update($data, $users_rows[0]['id']);
                
                // showing success message
                $this->session->set_flashdata('msg','Password updated Successfully!');
                redirect('login');
                
            }
            else
            {
                // showing login error message
                $this->session->set_flashdata('err_msg','Invalid Password Reset Code!');
                redirect('forgot_password');
            }
            
            
            
            
        }
        
     /*   function mail_test()
        {
	        $this->load->library('email');

		$this->email->from('admin@securitynepal.com', 'Security Nepal');
		$this->email->to('sumandomarpa@gmail.com'); 
		
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	
		
		$this->email->send();
		
		echo $this->email->print_debugger();
        }
      
      */
        
        
}