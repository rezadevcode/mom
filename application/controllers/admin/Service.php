<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
            'title' => 'Service',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/service/page');
        $config['total_rows'] = $this->Model_crud->total_row('service_member');
        $config['per_page'] = 10 ;
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        

        $result = $this->Model_crud->sort('service_member','added','desc',$data['page'],$config["per_page"]); 
        if(!empty($result)){
            foreach ($result as $key => $value) {
                $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
                $result[$key]['image_service'] = $data_content;
            }
        }
        // print_r($data['results']);exit;
        $data['results'] = $result;
        $data['link'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['load_view'] = 'admin/service_member/service_list';
        $this->load->view('admin/template/backend', $data);
    }
    public function page() {
        //Data
        $data = $this->data;
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/service/page');
        $config['total_rows'] = $this->Model_crud->total_row('service_member');
        $config['per_page'] = 10;
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;    

        $result = $this->Model_crud->sort('service_member','added','desc',$data['page'],$config["per_page"]); 
        if(!empty($result)){
            foreach ($result as $key => $value) {
                $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
                $result[$key]['image_service'] = $data_content;
            }
        }
        // print_r($data['results']);exit;
        $data['results'] = $result;
        $data['link'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['load_view'] = 'admin/service_member/service_list';
        $this->load->view('admin/template/backend', $data);
    }
    public function add() {

        $data = $this->data;

        $this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('about', 'About', 'trim|required|min_length[5]', array('required' => 'About wajib di isi'));
        $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => 'description wajib di isi'));
        $this->form_validation->set_rules('price', 'Price', 'trim|required', array('required' => 'Price wajib di isi'));

        if ($this->form_validation->run() != FALSE) {

            $name = $this->input->post('name');
            $talent = $this->input->post('talent');
            $about = $this->input->post('about');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $image = $this->input->post('image');
            $member_serviceid = hexdec(uniqid());

            $data_update = array(
                "id" => $member_serviceid,
                "member_id" => 0,
                "name" => $name,
                "category" => $talent,
                "about" => $about,
                "desc" => $description,
                "price" => $price,
                "status" => 1,
                "added" => date('Y-m-d H:i:s'),
                "updated" => date('Y-m-d H:i:s'),
            );
            // echo '<pre>';
            // print_r($image);exit;
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

            redirect('admin/service');
        }

        $data['load_view'] = 'admin/service_member/service_add';
        $this->load->view('admin/template/backend', $data);
    }

    public function edit($id) {

        $data = $this->data;

        $this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('about', 'About', 'trim|required|min_length[5]', array('required' => 'About wajib di isi'));
        $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => 'description wajib di isi'));
        $this->form_validation->set_rules('price', 'Price', 'trim|required', array('required' => 'Price wajib di isi'));

        if ($this->form_validation->run() != FALSE) {

            $name = $this->input->post('name');
            $talent = $this->input->post('talent');
            $about = $this->input->post('about');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $image = $this->input->post('image');
            $status = $this->input->post('status');

            $check = $this->Model_crud->select_where('service_member', ['id' => $id]);
            if (sizeof($check) == 0) {
                $this->session->set_userdata('slideshow_error', 'Error: invalid service id!');
                redirect('admin/service');
            }
            $data_update = array(
                "member_id" => 0,
                "name" => $name,
                "category" => $talent,
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

            redirect('admin/service');
        }

        //Data User
        $service = $this->Model_crud->select_where('service_member', ['id' => $id]);
        
        foreach ($service as $key => $value) {
            $data_content = $this->Model_crud->select_where('member_service_img',['service_memberid' => $value['id']]);        
            $service[$key]['image_service'] = $data_content;
        }

        // echo '<pre>';
        // print_r($service);exit;
        $data['service'] = $service;
        $data['load_view'] = 'admin/service_member/service_edit';
        $this->load->view('admin/template/backend', $data);
    }
    public function delete() {
        
        $checkbox = $this->input->post('selected');
        $ex_del = FALSE;

        for ($i = 0; $i < count($checkbox); $i++) {
            $ex_del = $this->Model_crud->delete('service_member', array("id" => $checkbox[$i]));
        }

        //notification
        if ($ex_del) {
            $this->session->set_userdata('slideshow_success', 'Success: You have modified slideshow!');
        } else {
            $this->session->set_userdata('slideshow_error', 'Error: Please try again!');
        }

        redirect('admin/service');
    }
}