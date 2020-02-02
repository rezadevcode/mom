<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

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
            'title' => 'Client List',
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

        $config["base_url"] = base_url('admin/client/lists/page');
        $config["total_rows"] = $this->Model_crud->total_row('client_list');
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
        $data["results"] = $this->Model_crud->select_query("SELECT * FROM client_list ORDER BY created_at DESC limit ".(($page - 1) * $config['per_page']).", ".$config["per_page"]);
        $data["links"] = $this->pagination->create_links();
        $data['first_result'] = (($page - 1) * $config['per_page']) + 1;
        $data['last_result'] = count($data["results"]) + (($page - 1) * $config['per_page']);
        $data['total_result'] = $config["total_rows"];
        $data['total_page'] = ceil($config["total_rows"] / $config['per_page']);
        
        $data['load_view'] = 'admin/client/list/list_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/client/list/list_add';
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
            redirect('admin/client/lists/add');
        }
    
        $data_insert = array(
            "name" => $name
        );

        $id = $this->Model_crud->insert('client_list', $data_insert);
        
        if ($id) {
            $this->session->set_userdata('client_success', 'Success: You have modified client!');
        } else {
            $this->session->set_userdata('client_error', 'Error: Please try again!');
        }

        redirect('admin/client/lists');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('client_list', array('client_list_id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/client/list/list_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        //message
        $error = False;
        if (strlen(trim($name)) < 1) {
            $this->session->set_userdata('error_name', 'Name is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/client/lists/edit/'.$id);
        }
        
        //Data Update
        $data_update = array(
            "name" => $name,
            "updated_at" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('client_list', $data_update, array("client_list_id"=>$id));
        
        if ($ex_upd) {
            $this->session->set_userdata('client_success', 'Success: You have modified client!');
        } else {
            $this->session->set_userdata('client_error', 'Error: Please try again!');
        }

        redirect('admin/client/lists');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('client_list', array("client_list_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('client_success', 'Success: You have modified client!');
        } else {
            $this->session->set_userdata('client_error', 'Error: Please try again!');
        }

        redirect('admin/client/lists');
    }
}
