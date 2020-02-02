<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));
        
        //Data
        $this->data = array(
            'title' => 'Login',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        // check if logged in
        if ($this->session->has_userdata('logged_in')) {
            redirect('admin/dashboard');
        }
        
        //Data
        $data = $this->data;
        $data['error_warning'] = '';

        //View
        $data['load_view'] = 'admin/login/login_front';
        $this->load->view('admin/template/backend', $data);
    }

    public function signin() {
        // check if logged in
        if ($this->session->has_userdata('logged_in')) {
            redirect('admin/dashboard');
        }
		
		$this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
        if ($this->form_validation->run() == FALSE) {
            //message
            $this->session->set_userdata('error_warning', 'No match for Username and/or Password.');
                    
            redirect('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $result = $this->Model_crud->select_where('user', array('username'=>$username));
            
            // attempt to login
            if ($result) {
                $pass = crypt($password, $this->config->item('encryption_key'));
                // print_r($pass);
                // exit;
                if($pass == $result[0]['password']) {
                    $this->session->set_userdata('user', $username);
                    $this->session->set_userdata('logged_in', true);
                    
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_userdata('error_warning', 'No match for Username and/or Password.');
                    redirect('admin/login');
                }
                
            } else {
                //message
                $this->session->set_userdata('error_warning', 'No match for Username and/or Password.');
                redirect('admin/login');
            }
        }
    }

    public function logout() {
        // logout
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}