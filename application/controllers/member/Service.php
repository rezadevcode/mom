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

        $this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('about', 'About', 'trim|required|min_length[5]', array('required' => 'About wajib di isi'));
        // $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => 'Image wajib di isi'));
        // $this->form_validation->set_rules('handphone', 'Handphone', 'trim|required', array('required' => 'Handphone wajib di isi'));

        if ($this->form_validation->run() != FALSE) {
            // echo '<pre>';
            // print_r($this->input->post());exit;

            $this->Model_crud->delete('service_member',['member_id' => $data['data_member']['member_id']]);
            $this->Model_crud->delete('member_service_img',['member_id' => $data['data_member']['member_id']]);

            $about = $this->input->post('about');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $image = $this->input->post('image');

            $data_update = array(
                "member_id" => $data['data_member']['member_id'],
                "category" => $data['data_member']['category'],
                "about" => $about,
                "desc" => $description,
                "price" => $price,
                "added" => date('Y-m-d H:i:s'),
                "updated" => date('Y-m-d H:i:s'),
            );
            $slideshow_id = $this->Model_crud->insert('service_member', $data_update);

            foreach($image as $row){
                $data_insert[] = [
                    "member_id" => $data['data_member']['member_id'],
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
        $result = $this->Model_crud->select_where('member_service_img', array('member_id'=>$data['data_member']['member_id']));
        $result2 = $this->Model_crud->select_where('service_member', array('member_id'=>$data['data_member']['member_id']));
        // if(!$result) {
        //     show_404();
        // }
        // echo '<pre>';
        // print_r($data['data_member']);exit;
        $data['result'] = $result;
        $data['service'] = $result2;
        $data['load_view'] = 'member/service/service_edit';
        $this->load->view('member/template/backend', $data);
    }
    public function edit_password()
    {
        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }
        //Data User
        $data = $this->data;

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[passconf]',
        array('matches' => 'password confirmation tidak cocok'));
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim');
        
        if ($this->form_validation->run() != FALSE) {

            $old_password = $this->input->post('old_password');
            $password = $this->input->post('password');
            $member_id = $data['data_member']['member_id'];

            $get_member = $this->Model_crud->select_where('member',['member_id' => $member_id]);

            $old_password = crypt($old_password, $this->config->item('encryption_key'));
            $get_password = $get_member[0]['password'];
            
            if($get_password == $old_password){ // check old password 
                
                $password = crypt($password, $this->config->item('encryption_key'));

                $data_update = array(
                    "password" => $password,
                    "updated" => date('Y-m-d H:i:s')
                );

                // echo '<pre>';
                // print_r($data_update);exit;
                $slideshow_id = $this->Model_crud->update('member', $data_update, array("member_id"=>$member_id));
                
                if ($slideshow_id) {
                    $this->session->set_userdata('slideshow_success', 'Success: You have modified profile!');
                } else {
                    $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
                }

                redirect('member/profile/edit_password');
            }else{
                $this->session->set_userdata('error_password', 'Error: invalid old Password!');
            }
        }

        $data['load_view'] = 'member/profile/profile_password';
        $this->load->view('member/template/backend', $data);
    }
}