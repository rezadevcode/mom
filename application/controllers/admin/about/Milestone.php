<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Milestone extends CI_Controller {

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
            'title' => 'Milestone',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select_where('milestone', array('status'=>1));
        
        $data['load_view'] = 'admin/about/milestone/milestone_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/about/milestone/milestone_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
    
        $data_insert = array(
            "title" => $title,
            "desc" => $description,
            "status" => $status
        );

        $slideshow_id = $this->Model_crud->insert('milestone', $data_insert);
        
        if ($slideshow_id) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/about/milestone');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('milestone', array('id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/about/milestone/milestone_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $image = $this->input->post('image');
        $title = $this->input->post('title');
        $position = $this->input->post('position');
        $description = $this->input->post('description');
        $instagram = $this->input->post('instagram');
        $whatsapp = $this->input->post('whatsapp');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/about/milestone/edit/'.$id);
        }
        
        //Data Update
        $data_update = array(
            "title" => $title,
            "position" => $position,
            "desc" => $description,
            "image" => $image,
            'ig_link' => $instagram,
            "wa_link" => $whatsapp,
            "status" => $status,
            "updated" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('milestone', $data_update, array("id"=>$id));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/team/'.$image);
        
        if ($ex_upd) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/about/milestone');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('milestone', array("id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/about/milestone');
    }
}
