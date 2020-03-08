<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));
        $data_member = $this->session->userdata('member_data');
        
        //Data
        $this->data = array(
            'title' => 'Service',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'data_member' => $data_member
        );
    }

    public function index() {
        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }
        $data = $this->data;
        
        $result = $this->Model_crud->select_query('SELECT a.*, b.`name` as member_name from service_member as a left join member as b on a.`member_id` = b.`member_id` where a.`member_id` ='.$data['data_member']['member_id'].' ORDER BY a.added desc');    
        if(!empty($result)){
            foreach ($result as $key => $value) {
                $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
                $result[$key]['image_service'] = $data_content;
            }
        }
        // echo '<pre>';
        // print_r($result);exit;
        $data['results'] = $result;
        $data['load_view'] = 'member/service/service_list';
        $this->load->view('member/template/backend', $data);
    }

    public function add() {

        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }
        $data = $this->data;

        $this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('about', 'About', 'trim|required|min_length[5]', array('required' => 'About wajib di isi'));
        $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => 'description wajib di isi'));
        $this->form_validation->set_rules('price', 'Price', 'trim|required', array('required' => 'Price wajib di isi'));

        if ($this->form_validation->run() != FALSE) {

            $about = $this->input->post('about');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $image = $this->input->post('image');
            $member_serviceid = hexdec(uniqid());

            $data_update = array(
                "id" => $member_serviceid,
                "member_id" => $data['data_member']['member_id'],
                "category" => $data['data_member']['category'],
                "about" => $about,
                "desc" => $description,
                "price" => $price,
                "status" => 1,
                "added" => date('Y-m-d H:i:s'),
                "updated" => date('Y-m-d H:i:s'),
            );
            // print_r($data_update);exit;
            $slideshow_id = $this->Model_crud->insert('service_member', $data_update);

            foreach($image as $row){
                $data_insert[] = [
                    "service_memberid" => $member_serviceid,
                    'image' => $row,
                    "added" => date('Y-m-d H:i:s'),
                    "updated" => date('Y-m-d H:i:s')
                ];

                @rename(FCPATH.'/assets/tmp/'.$row, FCPATH.'/assets/images/member_service/'.$row);
            }

            $slideshow_id = $this->Model_crud->insert_batch('member_service_img', $data_insert);
            
            if ($slideshow_id) {
                $this->session->set_userdata('slideshow_success', 'Success: You have modified profile!');
            } else {
                $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
            }

            redirect('member/service');
        }

        //Data User
        // $result = $this->Model_crud->select_where('member_service_img', array('member_id'=>$data['data_member']['member_id']));
        // $result2 = $this->Model_crud->select_query('SELECT a.*, b.* from service_member as a left join member as b on a.`member_id` = b.`member_id` where a.`member_id` ='.$data['data_member']['member_id']);
        // if(!$result) {
        //     show_404();
        // }
        // echo '<pre>';
        // print_r($result2);exit;
        // $data['result'] = $result;
        // $data['service'] = $result2;
        $data['load_view'] = 'member/service/service_add';
        $this->load->view('member/template/backend', $data);
    }

    public function edit($id) {

        // $id = $this->uri->segment(4);
        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }
        $data = $this->data;

        $this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('about', 'About', 'trim|required|min_length[5]', array('required' => 'About wajib di isi'));
        $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => 'description wajib di isi'));
        $this->form_validation->set_rules('price', 'Price', 'trim|required', array('required' => 'Price wajib di isi'));

        if ($this->form_validation->run() != FALSE) {

            $about = $this->input->post('about');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $image = $this->input->post('image');
            $status = $this->input->post('status');

            $check = $this->Model_crud->select_where('service_member', ['id' => $id, 'member_id' => $data['data_member']['member_id']]);
            if (sizeof($check) == 0) {
                $this->session->set_userdata('slideshow_error', 'Error: invalid service id!');
                redirect('member/service');
            }
            $data_update = array(
                "member_id" => $data['data_member']['member_id'],
                "category" => $data['data_member']['category'],
                "about" => $about,
                "desc" => $description,
                "price" => $price,
                "status" => $status,
                "updated" => date('Y-m-d H:i:s'),
            );
            // print_r($id);exit;
            $slideshow_id = $this->Model_crud->update('service_member', $data_update,['id' => $id]);

            $this->Model_crud->delete('member_service_img',['service_memberid' => $id]); // delete image

            foreach($image as $row){
                $data_insert[] = [
                    "service_memberid" => $id,
                    'image' => $row,
                    "added" => date('Y-m-d H:i:s'),
                    "updated" => date('Y-m-d H:i:s')
                ];

                @rename(FCPATH.'/assets/tmp/'.$row, FCPATH.'/assets/images/member_service/'.$row);
            }

            $slideshow_id = $this->Model_crud->insert_batch('member_service_img', $data_insert);
            
            if ($slideshow_id) {
                $this->session->set_userdata('slideshow_success', 'Success: You have modified profile!');
            } else {
                $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
            }

            redirect('member/service');
        }

        //Data User
        $service = $this->Model_crud->select_query('SELECT a.*, b.`name` from service_member as a left join member as b on a.`member_id` = b.`member_id` where( a.`member_id` ='.$data['data_member']['member_id'].' AND a.`id`='.$id.')');
        
        foreach ($service as $key => $value) {
            $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
            $service[$key]['image_service'] = $data_content;
        }

        // echo '<pre>';
        // print_r($service);exit;
        $data['service'] = $service;
        $data['load_view'] = 'member/service/service_edit';
        $this->load->view('member/template/backend', $data);
    }
}