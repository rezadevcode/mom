<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow extends CI_Controller {

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
            'title' => 'Slideshow',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select_where('project_slideshow', array('status'=>1));
        
        $data['load_view'] = 'admin/project/slideshow/slideshow_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/project/slideshow/slideshow_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $image = $this->input->post('image');
        $status = $this->input->post('status');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/project/slideshow/add');
        }
    
        $data_insert = array(
            "image" => $image,
            "status" => $status
        );

        $slideshow_id = $this->Model_crud->insert('project_slideshow', $data_insert);

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/slideshow/'.$image);
        
        if ($slideshow_id) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/project/slideshow');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('project_slideshow', array('project_slideshow_id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/project/slideshow/slideshow_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $image = $this->input->post('image');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/project/slideshow/edit/'.$id);
        }
        
        //Data Update
        $data_update = array(
            "image" => $image,
            "status" => $status,
            "updated_at" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('project_slideshow', $data_update, array("project_slideshow_id"=>$id));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/slideshow/'.$image);
        
        if ($ex_upd) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/project/slideshow');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('project_slideshow', array("project_slideshow_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified service!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/project/slideshow');
    }
}
