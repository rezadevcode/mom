<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));
        $current = $this->Model_crud->select_where('menu', array('slug' => $this->uri->segment(1)));
        if(!$current) {
            show_404();
        }

        //Data
        $this->data = array(
            'title' => ($current)? $current[0]['name']:'',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'meta_title' => ($current)? $current[0]['name']:'',
            'meta_description' => $config[5]['value'],
            'meta_keyword' => $config[6]['value'],
			'footer' => $config[19]['value'],
            'menu' => $menu
        );
    }

    public function index($slug = '') {

    	//Data
        $data = $this->data;

        $data['result'] = $this->Model_crud->select_where('menu', array('slug' => $slug));
        
        $data['load_view'] = 'view_custom';
        $this->load->view('template/front', $data);
    }
}