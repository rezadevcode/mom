<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mom_project extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'Mom Project',
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
        $project_result = $this->Model_crud->select_where('sponsor',['status' => 1, 'type' => 'project']);
        $banner_result = $this->Model_crud->select_where('banner',['deployment' => 'mom project']);
        $content_result = $this->Model_crud->select_where('content_element',['placement' => 'mom project']);
        $data_content = [];
        
        foreach ($content_result as $value) {
            $data_content[$value['id']] = $value;
        }
        // echo '<pre>';
        // print_r($data_content);exit;
        $data['content'] = $data_content;
        $data['project'] = $project_result;
        $data['banner'] = $banner_result[0];
        $data['load_view'] = 'view_project';
        $this->load->view('template/front', $data);
    }
    
}