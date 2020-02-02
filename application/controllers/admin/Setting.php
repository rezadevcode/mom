<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
    function __construct() {
        parent::__construct();

        // check if logged in
        if (!$this->session->has_userdata('logged_in')) {
            redirect('admin/login');
        }

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));

        //Data
        $this->data = array(
            'title' => 'Setting',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
        
        // CONFIG STORE
        $this->setting = $config;
    }
    
    public function index() {
        
        //Data
        $data = $this->data;
        $config = $this->setting;
        
        $data['name'] = $config[0]['value'];
        $data['logo'] = $config[1]['value'];
        $data['contact_email'] = $config[3]['value'];
        $data['home_meta_title'] = $config[4]['value'];
        $data['home_meta_description'] = $config[5]['value'];
        $data['home_meta_keyword'] = $config[6]['value'];
        $data['project_meta_title'] = $config[7]['value'];
        $data['project_meta_description'] = $config[8]['value'];
        $data['project_meta_keyword'] = $config[9]['value'];
        $data['client_meta_title'] = $config[10]['value'];
        $data['client_meta_description'] = $config[11]['value'];
        $data['client_meta_keyword'] = $config[12]['value'];
        $data['about_meta_title'] = $config[13]['value'];
        $data['about_meta_description'] = $config[14]['value'];
        $data['about_meta_keyword'] = $config[15]['value'];
        $data['contact_meta_title'] = $config[16]['value'];
        $data['contact_meta_description'] = $config[17]['value'];
        $data['contact_meta_keyword'] = $config[18]['value'];
		$data['footer'] = $config[19]['value'];
        
        $data['load_view'] = 'admin/setting/setting_edit';
        $this->load->view('admin/template/backend', $data);
    }
    
    public function update() {
        
        $name = $this->input->post('name');
        $logo = $this->input->post('logo');
        $contact_email = $this->input->post('contact_email');
        $home_meta_title = $this->input->post('home_meta_title');
        $home_meta_description = $this->input->post('home_meta_description');
        $home_meta_keyword = $this->input->post('home_meta_keyword');
        $project_meta_title = $this->input->post('project_meta_title');
        $project_meta_description = $this->input->post('project_meta_description');
        $project_meta_keyword = $this->input->post('project_meta_keyword');
        $client_meta_title = $this->input->post('client_meta_title');
        $client_meta_description = $this->input->post('client_meta_description');
        $client_meta_keyword = $this->input->post('client_meta_keyword');
        $about_meta_title = $this->input->post('about_meta_title');
        $about_meta_description = $this->input->post('about_meta_description');
        $about_meta_keyword = $this->input->post('about_meta_keyword');
        $contact_meta_title = $this->input->post('contact_meta_title');
        $contact_meta_description = $this->input->post('contact_meta_description');
        $contact_meta_keyword = $this->input->post('contact_meta_keyword');
		$footer = $this->input->post('footer');
        
        //message
        $error = False;
        if ((strlen(trim($name)) < 1) || (strlen(trim($name)) > 32)) {
            $this->session->set_userdata('error_name', 'Name must be between 1 and 32 characters!');
            $error = TRUE;
        }
        if (strlen(trim($name)) < 1) {
            $this->session->set_userdata('error_logo', 'Logo is required!');
            $error = TRUE;
        }
        if ((strlen($contact_email) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $contact_email)) {
            $this->session->set_userdata('error_contact_email', 'Store E-Mail address does not appear to be valid!');
            $error = TRUE;
        }

        if($error) {
            redirect('admin/setting');
        }
        
        $data_update1 = array('value' => $name);
        $data_update2 = array('value' => $logo);
        $data_update3 = array('value' => $contact_email);
        $data_update4 = array('value' => $home_meta_title);
        $data_update5 = array('value' => $home_meta_description);
        $data_update6 = array('value' => $home_meta_keyword);
        $data_update7 = array('value' => $project_meta_title);
        $data_update8 = array('value' => $project_meta_description);
        $data_update9 = array('value' => $project_meta_keyword);
        $data_update10 = array('value' => $client_meta_title);
        $data_update11 = array('value' => $client_meta_description);
        $data_update12 = array('value' => $client_meta_keyword);
        $data_update13 = array('value' => $about_meta_title);
        $data_update14 = array('value' => $about_meta_description);
        $data_update15 = array('value' => $about_meta_keyword);
        $data_update16 = array('value' => $contact_meta_title);
        $data_update17 = array('value' => $contact_meta_description);
        $data_update18 = array('value' => $contact_meta_keyword);
		$data_update19 = array('value' => $footer);
        
        
        //notification
        $ex_upd = $this->Model_crud->update('setting', $data_update1, array("setting_id" => 1));
        $ex_upd = $this->Model_crud->update('setting', $data_update2, array("setting_id" => 2));
        $ex_upd = $this->Model_crud->update('setting', $data_update3, array("setting_id" => 4));
        $ex_upd = $this->Model_crud->update('setting', $data_update4, array("setting_id" => 5));
        $ex_upd = $this->Model_crud->update('setting', $data_update5, array("setting_id" => 6));
        $ex_upd = $this->Model_crud->update('setting', $data_update6, array("setting_id" => 7));
        $ex_upd = $this->Model_crud->update('setting', $data_update7, array("setting_id" => 8));
        $ex_upd = $this->Model_crud->update('setting', $data_update8, array("setting_id" => 9));
        $ex_upd = $this->Model_crud->update('setting', $data_update9, array("setting_id" => 10));
        $ex_upd = $this->Model_crud->update('setting', $data_update10, array("setting_id" => 11));
        $ex_upd = $this->Model_crud->update('setting', $data_update11, array("setting_id" => 12));
        $ex_upd = $this->Model_crud->update('setting', $data_update12, array("setting_id" => 13));
        $ex_upd = $this->Model_crud->update('setting', $data_update13, array("setting_id" => 14));
        $ex_upd = $this->Model_crud->update('setting', $data_update14, array("setting_id" => 15));
        $ex_upd = $this->Model_crud->update('setting', $data_update15, array("setting_id" => 16));
        $ex_upd = $this->Model_crud->update('setting', $data_update16, array("setting_id" => 17));
        $ex_upd = $this->Model_crud->update('setting', $data_update17, array("setting_id" => 18));
        $ex_upd = $this->Model_crud->update('setting', $data_update18, array("setting_id" => 19));
		$ex_upd = $this->Model_crud->update('setting', $data_update19, array("setting_id" => 20));
        
        if ($ex_upd) {
            @rename(FCPATH.'/assets/tmp/'.$logo, FCPATH.'/assets/images/'.$logo);

            $this->session->set_userdata('notif_success', 'Success: You have modified setting!');
        } else {
            $this->session->set_userdata('notif_error', 'Error: Please try again!');
        }

        redirect('admin/setting');
    }
}