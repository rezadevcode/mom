<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
            'title' => 'Service',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['text'] = $this->Model_crud->select('home_service_text');
        $data['list'] = $this->Model_crud->select_where('home_service', array('status'=>1));
        
        $data['load_view'] = 'admin/home/service/service_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/home/service/service_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $image = $this->input->post('image');
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $status = $this->input->post('status');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/home/service/add');
        }
    
        $data_insert = array(
            "image" => $image,
            "title" => $title,
            "text" => $text,
            "status" => $status
        );

        $id = $this->Model_crud->insert('home_service', $data_insert);

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/service/'.$image);
        
        if ($id) {
            $this->session->set_userdata('service_success', 'Success: You have modified service!');
        } else {
            $this->session->set_userdata('service_error', 'Error: Please try again!');
        }

        redirect('admin/home/service');
    }

    public function update_text() {
        $text = $this->input->post('text');
    
        $data_update = array(
            "text" => $text,
            "updated_at" => date('Y-m-d H:i:s')
        );

        $updated = $this->Model_crud->update('home_service_text', $data_update, array('home_service_text_id'=>1));
        
        if ($updated) {
            $this->session->set_userdata('service_success', 'Success: You have modified service!');
        } else {
            $this->session->set_userdata('service_error', 'Error: Please try again!');
        }

        redirect('admin/home/service');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('home_service', array('home_service_id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/home/service/service_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $image = $this->input->post('image');
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/home/service/edit/'.$id);
        }
        
        //Data Update
        $data_update = array(
            "image" => $image,
            "title" => $title,
            "text" => $text,
            "status" => $status,
            "updated_at" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('home_service', $data_update, array("home_service_id"=>$id));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/service/'.$image);
        
        if ($ex_upd) {
            $this->session->set_userdata('service_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('service_error', 'Error: Please try again!');
        }

        redirect('admin/home/service');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('home_service', array("home_service_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('service_success', 'Success: You have modified service!');
        } else {
            $this->session->set_userdata('service_error', 'Error: Please try again!');
        }

        redirect('admin/home/service');
    }
}
