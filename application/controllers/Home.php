<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => '',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'meta_title' => $config[4]['value'],
            'meta_description' => $config[5]['value'],
            'meta_keyword' => $config[6]['value'],
			'footer' => $config[19]['value'],
            'menu' => $menu
        );
    }

    public function index() {

    	//Data
        $data = $this->data;
        
        // echo '<pre>';
        // print_r($data);exit;

        // $data['slideshow'] = $this->Model_crud->select_where('home_slideshow', array('status'=>1));
        // $data['intro'] = $this->Model_crud->select('home_intro');
        // $data['service_intro'] = $this->Model_crud->select('home_service_text');
        // $data['service_list'] = $this->Model_crud->select_where('home_service', array('status'=>1));
        // $data['project'] = $this->Model_crud->select_query("SELECT p.*, c.name AS category_name, c.slug AS category_slug FROM project p LEFT JOIN category c ON p.category_id = c.category_id ORDER BY p.created_at DESC limit 8");
        // $data['client_list'] = $this->Model_crud->select_order('client_list', 'name', 'asc');
        
        $data['load_view'] = 'view_home';
        $this->load->view('template/front', $data);
    }
}