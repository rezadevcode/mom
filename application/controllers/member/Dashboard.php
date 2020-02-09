<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();

        // check if logged in
        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));
        $data_member = $this->session->userdata('member_data');

        //Data
        $this->data = array(
            'title' => 'Dashboard',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'data_member' => $data_member
        );
    }
    
    public function index() {
        
        //Data
        $data = $this->data;

        $data['load_view'] = 'member/login/login_dashboard';
        $this->load->view('member/template/backend', $data);
    }
	
}