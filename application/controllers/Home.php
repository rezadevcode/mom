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

        $banner_result = $this->Model_crud->select_where('banner',['deployment' => 'home']);
        $sponsor_result = $this->Model_crud->select_where('sponsor',['status' => 1, 'type' => 'sponsor']);
        $content_result = $this->Model_crud->select_where('content_element',['placement' => 'home']);
        $slideshow_result = $this->Model_crud->select_where('slideshow',['status' => 1]);
        $service_result = $this->Model_crud->select_where('home_service',['status' => 1]);
        $data_content = [];
        
        foreach ($content_result as $value) {
            $data_content[$value['id']] = $value;
        }
        // echo '<pre>';
        // print_r($data_content);exit;
        $data['content'] = $data_content;
        $data['sponsore'] = $sponsor_result;
        $data['slideshow'] = $slideshow_result;
        $data['banner'] = $banner_result[0];
        $data['service'] = $service_result;
        $data['load_view'] = 'view_home';
        $this->load->view('template/front', $data);
    }
}