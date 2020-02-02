<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'Client',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'meta_title' => $config[10]['value'],
            'meta_description' => $config[11]['value'],
            'meta_keyword' => $config[12]['value'],
			'footer' => $config[19]['value'],
            'menu' => $menu
        );
    }

    public function index() {
    	//Data
        $data = $this->data;

        $data['client_icon'] = $this->Model_crud->select_where('client_icon', array('status'=>1));
        $data['client_list'] = $this->Model_crud->select_order('client_list', 'name', 'asc');

        $data['load_view'] = 'view_client';
        $this->load->view('template/front', $data);
    }
    
}