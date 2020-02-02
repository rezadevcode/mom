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

        $data['result'] = $this->Model_crud->select('about_intro');
        
        $data['load_view'] = 'admin/about/intro/intro_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        $image = $this->input->post('image');
        $text = $this->input->post('text');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'Image is required!');
            $error = TRUE;
        }
        if (strlen(trim($text)) < 1) {
            $this->session->set_userdata('error_text', 'Text is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/about/intro');
        }
    
        $data_update = array(
            "image" => $image,
            "text" => $text,
            "updated_at" => date('Y-m-d H:i:s')
        );

        $updated = $this->Model_crud->update('about_intro', $data_update, array('about_intro_id'=>1));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/about/'.$image);
        
        if ($updated) {
            $this->session->set_userdata('intro_success', 'Success: You have modified intro!');
        } else {
            $this->session->set_userdata('intro_error', 'Error: Please try again!');
        }

        redirect('admin/about/intro');
    }
}
