<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

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
            'title' => 'Inbox',
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

        $config["base_url"] = base_url('admin/contact/inbox/page');
        $config["total_rows"] = $this->Model_crud->total_row('contact_inbox');
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
        $data["results"] = $this->Model_crud->select_query("SELECT * FROM contact_inbox ORDER BY created_at DESC limit ".(($page - 1) * $config['per_page']).", ".$config["per_page"]);
        $data["links"] = $this->pagination->create_links();
        $data['first_result'] = (($page - 1) * $config['per_page']) + 1;
        $data['last_result'] = count($data["results"]) + (($page - 1) * $config['per_page']);
        $data['total_result'] = $config["total_rows"];
        $data['total_page'] = ceil($config["total_rows"] / $config['per_page']);
        
        $data['load_view'] = 'admin/contact/inbox/inbox_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function view($id) {
        //Data
        $data = $this->data;

        $data['result'] = $this->Model_crud->select_where('contact_inbox', array('contact_inbox_id'=>$id));

        $data['load_view'] = 'admin/contact/inbox/inbox_view';
        $this->load->view('admin/template/backend', $data);
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('contact_inbox', array("contact_inbox_id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('inbox_success', 'Success: You have modified inbox!');
        } else {
            $this->session->set_userdata('inbox_error', 'Error: Please try again!');
        }

        redirect('admin/contact/inbox');
    }

}
