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

        if(isset($_GET['code']))
		{
			$this->googleplus->getAuthenticate();
			// echo '<pre>';
            // print_r($this->googleplus->getUserInfo());exit;

            $google = $this->googleplus->getUserInfo();
            
            $checkmail = $this->Model_crud->select_where('member',['email' => $google['email']]);
            
            if (sizeof($checkmail) == 0) {
                $param = [
                    'name' => $google['name'],
                    'email' => $google['email'],
                    // 'image' => $google['picture'],
                    'status' => 1,
                    'google_login' => 1
                ];
                
                $query = $this->Model_crud->insert('member', $param);

                $data_member = [
                    'name' => $google['name'],
                    'member_id' => $query,
                    'email' => $google['email'],
                    'category' => '',
                ];
            }else{
                $data_member = [
                    'name' => $checkmail[0]['name'],
                    'member_id' => $checkmail[0]['member_id'],
                    'email' => $checkmail[0]['email'],
                    'category' => $checkmail[0]['comunity'],
                ];
            }
        
            $this->session->set_userdata('member_data', $data_member); //set session
            $this->session->set_userdata('member_logged_in', true); //set session
            
            redirect();
		}
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
		
		$data['loginURL'] = $this->googleplus->loginURL();
        $data['content'] = $data_content;
        $data['sponsore'] = $sponsor_result;
        $data['slideshow'] = $slideshow_result;
        $data['banner'] = $banner_result[0];
        $data['service'] = $service_result;
        $data['load_view'] = 'view_home';
        $this->load->view('template/front', $data);
    }
}