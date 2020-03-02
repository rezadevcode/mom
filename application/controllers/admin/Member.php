<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
            'title' => 'Member',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/member/page/');
        $config['total_rows'] = 8;
        $config['per_page'] = 2;

        $this->pagination->initialize($config);

        $data['results'] = $this->Model_crud->select_where('member', array('status'=>1));
        $data['link'] = $this->pagination->create_links();
        $data['load_view'] = 'admin/member/member_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function export() {
        //Data

        $data['results'] = $this->Model_crud->select_where('member', array('status'=>1));
        
        $data['title'] = 'data member';
        // $data['load_view'] = 'admin/member/member_export';
        $this->load->view('admin/member/member_export', $data);
    }

    public function add() {
        //Data
        $data = $this->data;

        $data['load_view'] = 'admin/member/member_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function save() {
        // echo '<pre>';
        // print_r($_POST);exit;
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $ig_account = $this->input->post('ig_account');
        $fb_account = $this->input->post('fb_account');
        $comunity = $this->input->post('comunity');
        $type = $this->input->post('type');
        $image = $this->input->post('image');
        $password = $this->input->post('password');
        $status = $this->input->post('status');

        //message
        $error = False;
        if (strlen(trim($image)) < 1) {
            $this->session->set_userdata('error_image', 'image is required!');
            $error = TRUE;
        }

        if ($error) {
            redirect('admin/member/add');
        }

        $password = crypt($password, $this->config->item('encryption_key'));
    
        $data_insert = array(
            "name" => $name,
            "email" => $email,
            "ig_account" => $ig_account,
            "fb_account" => $fb_account,
            "comunity" => $comunity,
            'member_type' => $type,
            "password" => $password,
            "image" => $image,
            "status" => $status
        );

        // echo '<pre>';
        // print_r($data_insert);exit;

        $slideshow_id = $this->Model_crud->insert('member', $data_insert);

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/member/'.$image);
        
        if ($slideshow_id) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified member!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/member');
    }

    public function edit($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('member', array('id'=>$id));
        
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/about/team/team_edit';
        $this->load->view('admin/template/backend', $data);
    }
    public function view($id=0) {
        //Data
        $data = $this->data;

        //Data User
        $data['result'] = $this->Model_crud->select_where('member', array('member_id'=>$id));
        
        // echo '<pre>';
        // print_r($data['result']);exit;
        if(!$data['result']) {
            show_404();
        }

        $data['load_view'] = 'admin/member/member_view';
        $this->load->view('admin/template/backend', $data);
    }

    public function update() {
        
        $image = $this->input->post('image');
        $title = $this->input->post('title');
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
            redirect('admin/about/our_team/edit/'.$id);
        }
        
        //Data Update
        $data_update = array(
            "title" => $title,
            "desc" => $description,
            "image" => $image,
            'ig_link' => $instagram,
            "wa_link" => $whatsapp,
            "status" => $status,
            "updated" => date('Y-m-d H:i:s')
        );

        //Notification
        $ex_upd = $this->Model_crud->update('member', $data_update, array("id"=>$id));

        @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/slideshow/'.$image);
        
        if ($ex_upd) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/member');
    }

    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('member', array("id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/member');
    }

    public function service()
    {
        //Data
        $data = $this->data;

        $data['title']   = 'Service';
        $data['results'] = $this->Model_crud->select_query('SELECT a.*, b.name, b.comunity, b.image FROM  service_member a 
        left join member b on a.member_id  = b.member_id GROUP  BY  a.id ');

        // $image = [];
        // foreach ($data['results'] as $key => $row) {
        //     $image = $this->Model_crud->select_where('member_service_img',['member_id' => $row['member_id']]);
        //     $data['results'][$key]['image'] = $image[0]['image'];
        // }
        // $data['results'][0][] = $image[0]['image'];
        // echo '<pre>';
        // print_r($data['results']); exit;
        
        $data['load_view'] = 'admin/service/service_list';
        $this->load->view('admin/template/backend', $data);
    }

    public function service_add()
    {
        $data = $this->data;

        $data['load_view'] = 'admin/service/service_add';
        $this->load->view('admin/template/backend', $data);
    }
}
