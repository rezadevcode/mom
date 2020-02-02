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
        $this->load->library('pagination');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));

        //Data
        $this->data = array(
            'title' => 'Project',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        $this->page();
    }

    public function page() {
        //Data
        $data = $this->data;

        $config["base_url"] = base_url('admin/project/project/page');
        $config["total_rows"] = $this->Model_crud->total_row('project');
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;

        //customize
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['next_link'] = '&gt;';
        $config['prev_link'] = '&lt;';
        $config['first_link'] = '|&lt;';
        $config['last_link'] = '&gt;|';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        $data["results"] = $this->Model_crud->select_query("SELECT p.*, c.name AS category_name, c.slug AS category_slug FROM project p LEFT JOIN category c ON p.category_id = c.category_id ORDER BY p.created_at DESC limit ".(($page - 1) * $config['per_page']).", ".$config["per_page"]);
        $data["links"] = $this->pagination->create_links();
        $data['first_result'] = (($page - 1) * $config['per_page']) + 1;
        $data['last_result'] = count($data["results"]) + (($page - 1) * $config['per_page']);
        $data['total_result'] = $config["total_rows"];
        $data['total_page'] = ceil($config["total_rows"] / $config['per_page']);
        
        $data['load_view'] = 'admin/project/project/project_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['category'] = $this->Model_crud->select('category');

        $data['load_view'] = 'admin/project/project/project_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $image = $this->input->post('image');
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $category = $this->input->post('category');
        $status = $this->input->post('status');


        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        if (strlen(trim($title)) < 1) {
            $this->session->set_userdata('error_title', 'title is required!');
            $error = TRUE;
        }
        if (strlen(trim($text)) < 1) {
            $this->session->set_userdata('error_text', 'text is required!');
            $error = TRUE;
        }
        if (strlen(trim($category)) < 1) {
            $this->session->set_userdata('error_category', 'category is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/project/project/add');
        }

        $data_insert = array(
            "image" => $image,
            "title" => $title,
            "text" => $text,
            "category_id" => $category,
            "status" => $status
        );

        $id = $this->Model_crud->insert('project', $data_insert);

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/project/'.$image);
        
        if ($id) {
            $this->session->set_userdata('project_success', 'Success: You have modified category!');
        } else {
            $this->session->set_userdata('project_error', 'Error: Please try again!');
        }

        redirect('admin/project/project');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('project', array('project_id'=>$id));
        $data['category'] = $this->Model_crud->select('category');
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/project/project/project_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $image = $this->input->post('image');
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $category = $this->input->post('category');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }
        if (strlen(trim($title)) < 1) {
            $this->session->set_userdata('error_title', 'title is required!');
            $error = TRUE;
        }
        if (strlen(trim($text)) < 1) {
            $this->session->set_userdata('error_text', 'text is required!');
            $error = TRUE;
        }
        if (strlen(trim($category)) < 1) {
            $this->session->set_userdata('error_category', 'category is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/project/project/edit/'.$id);
        }
        
        //Data Update
        $data_update = array(
            "image" => $image,
            "title" => $title,
            "text" => $text,
            "category_id" => $category,
            "status" => $status,
            "updated_at" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('project', $data_update, array("project_id"=>$id));
        
        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/project/'.$image);
        
        if ($ex_upd) {
            $this->session->set_userdata('project_success', 'Success: You have modified project!');
        } else {
            $this->session->set_userdata('project_error', 'Error: Please try again!');
        }

        redirect('admin/project/project');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('project', array("project_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('project_success', 'Success: You have modified project!');
        } else {
            $this->session->set_userdata('project_error', 'Error: Please try again!');
        }

        redirect('admin/project/project');
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
