<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();

        // check if logged in
        if (!$this->session->has_userdata('logged_in')) {
            redirect('admin/login');
        }

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));

        //Data
        $this->data = array(
            'title' => 'Dashboard',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }
    
    public function index() {
        
        //Data
        $data = $this->data;
        
        $data['load_view'] = 'admin/login/login_dashboard';
        $this->load->view('admin/template/backend', $data);
    }
	
}