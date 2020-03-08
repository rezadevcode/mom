<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_google_ci extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->library('google'); 
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'google login',
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
			echo '<pre>';
			print_r($this->googleplus->getUserInfo());exit;
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
			redirect('LoginWithGooglePlus/profile');
        }
        
        $data['loginURL'] = $this->googleplus->loginURL();
    }
}