<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service_result extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'Service',
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
        // $banner_result = $this->Model_crud->select_where('banner',['deployment' => 'service']);        
        // $content_result = $this->Model_crud->select_where('content_element',['placement' => 'service']);
        $content_result = $this->Model_crud->select_query('SELECT a.*, b.`name` as member_name from service_member as a left join member as b on a.`member_id` = b.`member_id` where a.`status` = 1');
        $data_content = [];
        
        if(!empty($content_result)){
            foreach ($content_result as $key => $value) {
                $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
                $content_result[$key]['image_service'] = $data_content;
            }
        }
        $count_profile = $this->Model_crud->total_row_where('member', ['status' => 1]);
        $count_service = $this->Model_crud->total_row_where('service_member', ['status' => 1]);
        // echo '<pre>';
        // print_r($content_result);exit;
        $data['content'] = $content_result;
        $data['count_member'] = $count_profile;
        $data['count_service'] = $count_service;
        $data['load_view'] = 'view_service2';
        $this->load->view('template/front', $data);
    }

    public function search() {
    	//Data
        $data = $this->data;
        
        $keyword = $this->input->get('q');
        $keyword = $this->security->xss_clean($keyword);
        $keyword = strip_tags($keyword);

        // echo '<pre>';
        // print_r($keyword);exit;
        $service = $this->Model_crud->select_query("SELECT a.*, b.`name`, b.`image` as member_img, b.`comunity` from service_member as a
        left join member as b on a.`member_id` = b.`member_id` where (a.`category` LIKE '%$keyword%' OR a.`about` LIKE '%$keyword%' )");

        if(!empty($service)){
            foreach ($service as $key => $value) {
                $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
                $service[$key]['image_service'] = $data_content;
            }
        }
    
        // echo '<pre>';
        // print_r($service);exit;
        $count_service = !empty($service) ? count($service) : 0;
        $count_profile = $this->Model_crud->total_row_where('member', ['status' => 1]);

        $data['loginURL'] = $this->googleplus->loginURL();
        $data['active'] = $keyword;
        $data['content'] = $service;
        $data['count_member'] = $count_profile;
        $data['count_service'] = $count_service;
        $data['load_view'] = 'view_service2';
        $this->load->view('template/front', $data);
    }

    public function detail($id) {
    	//Data
        $data = $this->data;

        if (!isset($id)) {
            show_404();
        }
        
        //Data User
        $service = $this->Model_crud->select_query('SELECT a.*, b.`name`, b.`image` as member_img, b.`comunity` from service_member as a left join member as b on a.`member_id` = b.`member_id` where a.`id`='.$id);
        
        if(empty($service)){
            show_404();
        }
        foreach ($service as $key => $value) {
            $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
            $service[$key]['image_service'] = $data_content;
        }
        // echo '<pre>';
        // print_r($service);exit;
        $data['loginURL'] = $this->googleplus->loginURL();
        $data['result'] = $service;
        $data['load_view'] = 'view_service_detail';
        $this->load->view('template/front', $data);
    }
    
}