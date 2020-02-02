<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'About',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'meta_title' => $config[13]['value'],
            'meta_description' => $config[14]['value'],
            'meta_keyword' => $config[15]['value'],
			'footer' => $config[19]['value'],
            'menu' => $menu
        );
    }

    public function index() {
    	//Data
        $data = $this->data;

        $data['about_intro'] = $this->Model_crud->select('about_intro');
        $data['about_people'] = $this->Model_crud->select('about_people');

        $data['load_view'] = 'view_about';
        $this->load->view('template/front', $data);
    }
    
}