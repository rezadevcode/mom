<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
            'title' => 'Category',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;

        $data['results'] = $this->Model_crud->select('category');
        
        $data['load_view'] = 'admin/project/category/category_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/project/category/category_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $name = $this->input->post('name');

        //message
        $error = False;
        if (strlen(trim($name)) < 1) {
            $this->session->set_userdata('error_name', 'name is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/project/category/add');
        }

        $slug = url_title($name, 'dash', TRUE);

        $i = 1;
        $baseurl = $slug;
        while ($this->_check_slug($slug)) {
            $slug = $baseurl . "-" . $i++;
        }
    
        $data_insert = array(
            "name" => $name,
            "slug" => $slug
        );

        $id = $this->Model_crud->insert('category', $data_insert);
        
        if ($id) {
            $this->session->set_userdata('category_success', 'Success: You have modified category!');
        } else {
            $this->session->set_userdata('category_error', 'Error: Please try again!');
        }

        redirect('admin/project/category');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('category', array('category_id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/project/category/category_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        $error = False;
        if (strlen(trim($name)) < 1) {
            $this->session->set_userdata('error_name', 'name is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/project/category/edit/'.$id);
        }

        $slug = url_title($name, 'dash', TRUE);

        $i = 1;
        $baseurl = $slug;
        while ($this->_check_slug($slug)) {
            $slug = $baseurl . "-" . $i++;
        }
        
        //Data Update
        $data_update = array(
            "name" => $name,
            "slug" => $slug,
            "updated_at" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('category', $data_update, array("category_id"=>$id));
        
        if ($ex_upd) {
            $this->session->set_userdata('category_success', 'Success: You have modified category!');
        } else {
            $this->session->set_userdata('category_error', 'Error: Please try again!');
        }

        redirect('admin/project/category');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('category', array("category_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('category_success', 'Success: You have modified category!');
        } else {
            $this->session->set_userdata('category_error', 'Error: Please try again!');
        }

        redirect('admin/project/category');
    }

    private function _check_slug($url) {
        //if isset - return true else false
        $result = $this->Model_crud->select_where('category', array('slug' => $url));

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
