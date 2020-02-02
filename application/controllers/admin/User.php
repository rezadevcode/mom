<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
            'title' => 'User',
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

        $config["base_url"] = base_url('admin/user/page');
        $config["total_rows"] = $this->Model_crud->total_row('user');
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $data["results"] = $this->Model_crud->select_query("SELECT * FROM `user` ORDER BY created_at DESC limit ".(($page - 1) * $config['per_page']).", ".$config["per_page"]);
        $data["links"] = $this->pagination->create_links();
        $data['first_result'] = (($page - 1) * $config['per_page']) + 1;
        $data['last_result'] = count($data["results"]) + (($page - 1) * $config['per_page']);
        $data['total_result'] = $config["total_rows"];
        $data['total_page'] = ceil($config["total_rows"] / $config['per_page']);
        
        $data['load_view'] = 'admin/user/user_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/user/user_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm');
        $status = $this->input->post('status');

        //Message
        $error = False;
        if ((strlen(trim($username)) < 1) || (strlen(trim($username)) > 32)) {
            $this->session->set_userdata('username_error', 'Username must be between 1 and 32 characters!');
            $error = TRUE;
        }
        if ((strlen($email) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $email)) {
            $this->session->set_userdata('email_error', 'E-Mail Address does not appear to be valid!');
            $error = TRUE;
        }
        if ((strlen($password) < 4) || (strlen($password) > 20)) {
            $this->session->set_userdata('password_error', 'Password must be between 4 and 20 characters!');
            $error = TRUE;
        }
        if ($confirm != $password) {
            $this->session->set_userdata('confirm_error', 'Password confirmation does not match password!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/user/add');
        }
        
        //Check Duplicate Email
        $check_dp = $this->Model_crud->total_row_where('user', array('username'=>$username));
        if($check_dp > 0) {
            $this->session->set_userdata('error', 'Username already used!');
            redirect('admin/user/add');
        }
        $check_dp = $this->Model_crud->total_row_where('user', array('email'=>$email));
        if($check_dp > 0) {
            $this->session->set_userdata('error', 'E-Mail Address already used!');
            redirect('admin/user/add');
        }
        
        $data_insert = array(
            'username' => $username,
            'email' => $email,
            'password' => crypt($password, $this->config->item('encryption_key')),
            'ip' => $_SERVER['REMOTE_ADDR']? : ($_SERVER['HTTP_X_FORWARDED_FOR']? : $_SERVER['HTTP_CLIENT_IP']),
            'status' => $status
        );

        //Notification
        $ex_ins = $this->Model_crud->insert('user', $data_insert);
        if ($ex_ins) {
            $this->session->set_userdata('user_success', 'Success: You have modified user!');
        } else {
            $this->session->set_userdata('user_error', 'Error: Please try again!');
        }

        redirect('admin/user');
    }

    public function edit($seg1 = '') {
        //Data
        $data = $this->data;
        
        $user_id = $seg1;
        
        //Data User
        $data['user'] = $this->Model_crud->select_where('user', array('user_id'=>$user_id));
        
        if(!$data['user']) {
            show_404();
        }
        
        $data['load_view'] = 'admin/user/user_edit';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm');
        $status = $this->input->post('status');
        $user_id = $this->input->post('user_id');
        
        $user = $this->Model_crud->select_where('user', array('user_id'=>$user_id));

        //Message
        $error = False;
        if ((strlen(trim($username)) < 1) || (strlen(trim($username)) > 32)) {
            $this->session->set_userdata('username_error', 'Username must be between 1 and 32 characters!');
            $error = TRUE;
        }
        if ((strlen($email) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $email)) {
            $this->session->set_userdata('email_error', 'E-Mail Address does not appear to be valid!');
            $error = TRUE;
        }
        if (strlen($password) > 4) {
            if ($confirm != $password) {
                $this->session->set_userdata('confirm_error', 'Password confirmation does not match password!');
                $error = TRUE;
            }
        }
        
        //Check Duplicate Email
        $check_dp = $this->Model_crud->total_row_where('user', array('username'=>$username));
        if($check_dp > 1) {
            $this->session->set_userdata('username_error', 'Username already used!');
            $error = TRUE;
        }
        $check_dp = $this->Model_crud->total_row_where('user', array('email'=>$email));
        if($check_dp > 1) {
            $this->session->set_userdata('email_error', 'E-Mail Address already used!');
            $error = TRUE;
        }
        
        if($error) {
            redirect('admin/user/edit/'.$user_id);
        }
        
        //Data Update
        $data_update = array(
            "username" => $username,
            "email" => $email,
            "status" => $status
        );

        //Notification
        $ex_upd = $this->Model_crud->update('user', $data_update, array("user_id"=>$user_id));
        if($password != '') {
            $data_pass = array(
                'password' => crypt($password, $this->config->item('encryption_key'))
            );
            $ex_upd = $this->Model_crud->update('user', $data_pass, array("user_id"=>$user_id));
        }
        if ($ex_upd) {
            $this->session->set_userdata('user_success', 'Success: You have modified user!');
        } else {
            $this->session->set_userdata('user_error', 'Error: Please try again!');
        }

        redirect('admin/user');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $user = $this->Model_crud->select_where('user', array('user_id'=>$checkbox[$i]));
            if($user[0]['user_id'] != 1) {
                $ex_del = $this->Model_crud->delete('user', array("user_id" => $checkbox[$i]));
            }
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('user_success', 'Success: You have modified User!');
        } else {
            $this->session->set_userdata('user_error', 'Error: Please try again!');
        }

        redirect('admin/user');
    }

}
