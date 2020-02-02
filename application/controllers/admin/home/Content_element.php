<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Content_element extends CI_Controller {

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
            'title' => 'Mom academy',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select('content_element');
        
        $data['load_view'] = 'admin/home/mom/mom_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/home/mom/mom_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {

        $description = $this->input->post('description');
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $placement = $this->input->post('placement');
    
        $data_insert = array(
            "title" => $title,
            "desc" => $description,
            "placement" => $placement,
            "status" => $status,
        );

        $slideshow_id = $this->Model_crud->insert('content_element', $data_insert);
        
        if ($slideshow_id) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/home/content_element');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('content_element', array('id'=>$id));
        // print_r($data['result']);exit;
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/home/mom/mom_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        $description = $this->input->post('description');
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $placement = $this->input->post('placement');
        $id = $this->input->post('id');
    
        $data_update = array(
            "title" => $title,
            "desc" => $description,
            "placement" => $placement,
            "status" => $status,
        );

        // print_r($data_update);exit;
        $updated = $this->Model_crud->update('content_element', $data_update, array('id'=>$id));
        
        if ($updated) {
            $this->session->set_userdata('mom_success', 'Success: You have modified mom!');
        } else {
            $this->session->set_userdata('mom_error', 'Error: Please try again!');
        }

        redirect('admin/home/content_element');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('content_element', array("id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/home/content_element');
    }
}
