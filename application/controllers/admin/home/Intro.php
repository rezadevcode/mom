<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Intro extends CI_Controller {

    function __construct() {
        parent::__construct();

        // check if logged in
        if (!$this->session->has_userdata('logged_in')) {
            redirect('admin/login');
        }

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));

        //Data
        $this->data = array(
            'title' => 'Intro',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select('home_intro');
        
        $data['load_view'] = 'admin/home/intro/intro_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        $text = $this->input->post('text');

        //message
        $error = False;
        if (strlen(trim($text)) < 1) {
            $this->session->set_userdata('error_text', 'Text is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/home/intro');
        }
    
        $data_update = array(
            "text" => $text,
            "updated_at" => date('Y-m-d H:i:s')
        );

        $updated = $this->Model_crud->update('home_intro', $data_update, array('home_intro_id'=>1));
        
        if ($updated) {
            $this->session->set_userdata('intro_success', 'Success: You have modified intro!');
        } else {
            $this->session->set_userdata('intro_error', 'Error: Please try again!');
        }

        redirect('admin/home/intro');
    }
}
