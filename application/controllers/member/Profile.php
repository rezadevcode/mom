<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));
        $data_member = $this->session->userdata('member_data');
        
        //Data
        $this->data = array(
            'title' => 'Profile',
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
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]', array('required' => 'nama wajib di isi'));
        $this->form_validation->set_rules('image', 'Image', 'trim|required', array('required' => 'Image wajib di isi'));
        $this->form_validation->set_rules('handphone', 'Handphone', 'trim|required', array('required' => 'Handphone wajib di isi'));

        if ($this->form_validation->run() != FALSE) {

            $name = $this->input->post('name');
            $ig_account = $this->input->post('ig_account');
            $fb_account = $this->input->post('fb_account');
            $comunity = $this->input->post('comunity');
            $type = $this->input->post('type');
            $image = $this->input->post('image');
            $status = $this->input->post('status');
            $member_id = $data['data_member']['member_id'];
            $twitter = $this->input->post('twitter');
            $website = $this->input->post('website');
            $portfolio = $this->input->post('portfolio');
            $ratecard = $this->input->post('ratecard');
            $handphone = $this->input->post('handphone');

            $data_update = array(
                "name" => $name,
                "ig_account" => $ig_account,
                "fb_account" => $fb_account,
                "comunity" => strtolower($comunity),
                // 'member_type' => $type,            
                "image" => $image,
                // "status" => $status,
                "handphone" => $handphone,
                "ratecard" => $ratecard,
                "portfolio" => $portfolio,
                "website" => $website,
                "twitter_account" => $twitter,
                "updated" => date('Y-m-d H:i:s')
            );

            // echo '<pre>';
            // print_r($data_update);exit;
            $slideshow_id = $this->Model_crud->update('member', $data_update, array("member_id"=>$member_id));

            @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/member/'.$image);
            
            if ($slideshow_id) {
                $this->session->set_userdata('slideshow_success', 'Success: You have modified profile!');
            } else {
                $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
            }

            redirect('member/profile');
        }

        //Data User
        $profil = $this->Model_crud->select_where('member', array('member_id'=>$data['data_member']['member_id']));
        if(!$profil) {
            show_404();
        }
        // echo '<pre>';
        //     print_r($profil);exit;
        $data['profil'] = $profil;
        $data['load_view'] = 'member/profile/profile_edit';
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