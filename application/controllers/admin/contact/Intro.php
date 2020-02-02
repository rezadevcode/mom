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
            'title' => 'Contact',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['result'] = $this->Model_crud->select('contact_intro');
        
        $data['load_view'] = 'admin/contact/intro/intro_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        $image = $this->input->post('image');
        $map = $this->input->post('map');
        $address = $this->input->post('address');
        $pdf = $this->input->post('pdf');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'Image is required!');
            $error = TRUE;
        }
        if (strlen(trim($map)) < 1) {
            $this->session->set_userdata('error_map', 'Map is required!');
            $error = TRUE;
        }
        if (strlen(trim($address)) < 1) {
            $this->session->set_userdata('error_address', 'Address is required!');
            $error = TRUE;
        }
        if (strlen(trim($pdf)) < 1) {
            $this->session->set_userdata('error_pdf', 'PDF is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/contact/intro');
        }
    
        $data_update = array(
            "image" => $image,
            "map" => $map,
            "address" => $address,
            "pdf" => $pdf,
            "updated_at" => date('Y-m-d H:i:s')
        );

        $updated = $this->Model_crud->update('contact_intro', $data_update, array('contact_intro_id'=>1));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/contact/'.$image);
        @rename(FCPATH.'/assets/tmp/'.$map, FCPATH.'/assets/images/contact/'.$map);
        @rename(FCPATH.'/assets/tmp/'.$pdf, FCPATH.'/assets/images/contact/'.$pdf);
        
        if ($updated) {
            $this->session->set_userdata('intro_success', 'Success: You have modified contact!');
        } else {
            $this->session->set_userdata('intro_error', 'Error: Please try again!');
        }

        redirect('admin/contact/intro');
    }
}
