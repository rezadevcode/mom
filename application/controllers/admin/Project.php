<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
            'title' => 'Sponsor',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select_where('sponsor',['type' => 'project']);
        
        $data['load_view'] = 'admin/project/project_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/project/project_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $image = $this->input->post('image');
        $type = $this->input->post('type');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/project/add');
        }
    
        $data_insert = array(
            "title" => $title,
            "status" => $status,
            "image" => $image,
            "type" => $type
        );

        $slideshow_id = $this->Model_crud->insert('sponsor', $data_insert);

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/sponsor/'.$image);
        
        if ($slideshow_id) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/project');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('sponsor', array('id'=>$id));
        // print_r($data['result']);exit;
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/project/project_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {

        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $image = $this->input->post('image');
        $type = $this->input->post('type');
        $id = $this->input->post('id');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/project/edit/'.$id);
        }
    
        $data_update = array(
            "title" => $title,
            "status" => $status,
            "image" => $image,
            "type" => $type,
            "updated" => date('Y-m-d H:i:s')
        );

        // print_r($data_update);exit;
        $updated = $this->Model_crud->update('sponsor', $data_update, array('id'=>$id));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/sponsor/'.$image);
        
        if ($updated) {
            $this->session->set_userdata('mom_success', 'Success: You have modified mom!');
        } else {
            $this->session->set_userdata('mom_error', 'Error: Please try again!');
        }

        redirect('admin/project');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('sponsor', array("id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/project');
    }
}
