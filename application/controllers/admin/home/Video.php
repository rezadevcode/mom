<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
            'title' => 'Video',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select_where('videos', array('status'=>1));
        $data['load_view'] = 'admin/home/video/video_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/home/video/video_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $title = $this->input->post('title');
        $link_video = $this->input->post('link_video');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        //message
        // $error = False;
        // if (strlen(trim($image)) < 1) {
        //     $this->session->set_userdata('error_image', 'image is required!');
        //     $error = TRUE;
        // }

        // if ($error) {
        //     redirect('admin/home/slideshow/add');
        // }
    
        $data_insert = array(
            "title" => $title,
            "link_video" => $link_video,
            "description" => $description,
            "status" => $status,
            "added" => date('Y-m-d H:i:s')
        );

        $slideshow_id = $this->Model_crud->insert('videos', $data_insert);

        // @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/slideshow/'.$image);
        
        if ($slideshow_id) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified videos!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/home/video');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('videos', array('video_id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/home/video/video_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $title = $this->input->post('title');
        $link_video = $this->input->post('link_video');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        //message
        // $error = False;
        // if (strlen(trim($image)) < 1) {
        //     $this->session->set_userdata('error_image', 'image is required!');
        //     $error = TRUE;
        // }
        
        // if($error) {
        //     redirect('admin/home/video/edit/'.$id);
        // }
        
        //Data Update
        $data_update = array(
            "title" => $title,
            "link_video" => $link_video,
            "description" => $description,
            "status" => $status,
            "updated" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('videos', $data_update, array("video_id"=>$id));
        
        if ($ex_upd) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/home/video');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('videos', array("video_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified video!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/home/video');
    }
}
