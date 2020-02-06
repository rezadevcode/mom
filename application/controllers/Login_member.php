<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_member extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code'=>'config'));
        
        //Data
        $this->data = array(
            'title' => 'Login',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        // check if logged in
        if ($this->session->has_userdata('member_logged_in')) {
            redirect('admin/dashboard');
        }
        
        //Data
        $data = $this->data;
        $data['error_warning'] = '';

        //View
        $data['load_view'] = 'admin/login/login_front';
        $this->load->view('admin/template/backend', $data);
    }

    public function signin() {
        // check if logged in
        if ($this->session->has_userdata('member_logged_in')) {
            redirect('admin/dashboard');
        }
		
		$this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		
        if ($this->form_validation->run() == FALSE) {
            //message
            $json = array(
                'status' => 'error',
                'msg' => validation_errors()
            );
            header("Content-type:application/json");
            echo json_encode($json,JSON_PRETTY_PRINT);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $result = $this->Model_crud->select_where('member', array('email'=>$email));
            
            // attempt to login
            if ($result) {
                $pass = crypt($password, $this->config->item('encryption_key'));
                // print_r($pass);
                // exit;
                if($pass == $result[0]['password']) {
                    $this->session->set_userdata('member_data', $result[0]['name']); //set session
                    $this->session->set_userdata('member_logged_in', true); //set session
                    
                    //message
                    $json = array(
                        'status' => 'ok',
                        'msg' => 'success login'
                    );
                    header("Content-type:application/json");
                    echo json_encode($json,JSON_PRETTY_PRINT);
                } else {
                    //message
                    $json = array(
                        'status' => 'error',
                        'msg' => '<p>no match email and password</p>'
                    );
                    header("Content-type:application/json");
                    echo json_encode($json,JSON_PRETTY_PRINT);
                }
                
            } else {
                //message
                $json = array(
                    'status' => 'error',
                    'msg' => '<p>no match email and password</p>'
                );
                header("Content-type:application/json");
                echo json_encode($json,JSON_PRETTY_PRINT);
            }
        }
    }

    public function signup() {
        // check if logged in
        if ($this->session->has_userdata('member_logged_in')) {
            redirect('admin/dashboard');
        }
		
		$this->load->library('form_validation');
        
        //validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]',
            array('required' => 'nama wajib di isi'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email]',
        array('required' => 'email wajib di isi'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[passconf]',
        array('matches' => 'password confirmation tidak cocok'));
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim');
        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'Image', 'required',
            array('required' => 'image wajib di isi'));
        }
		
        if ($this->form_validation->run() == FALSE) {
            //message
            $json = array(
                'status' => 'error',
                'msg' => validation_errors()
            );
            header("Content-type:application/json");
            echo json_encode($json,JSON_PRETTY_PRINT);
        } else {
            $file_element_name = 'image';

            // Config Upload
            $config['upload_path'] = './assets/tmp';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG';
            $config['max_size'] = 1024 * 40;
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = time() . '_' . $_FILES[$file_element_name]['name'];
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $json = array(
                    'status' => 'error',
                    'msg' => $this->upload->display_errors()
                );
                header("Content-type:application/json");
                echo json_encode($json,JSON_PRETTY_PRINT);
            } else {
                $data = $this->upload->data(); //data uploaf

                $type = $this->input->post('type');
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $community = $this->input->post('community');
                $image = $data['file_name'];
                $ig_account = $this->input->post('ig_account');
                $fb_account = $this->input->post('fb_account');
                
                $param = [
                    'name' => $name,
                    'email' => $email,
                    'password' => crypt($password, $this->config->item('encryption_key')),
                    'comunity' => strtolower($community),
                    'name' => $name,
                    'image' => $image,
                    'status' => 1,
                    'member_type' => $type,
                    'ig_account' => $ig_account,
                    'fb_account' => $fb_account
                ];

                $query = $this->Model_crud->insert('member', $param);

                if ($query) {
                    $this->session->set_userdata('member_data', $name); //set session
                    $this->session->set_userdata('member_logged_in', true); //set session

                    @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/member/'.$image);
                    $json = array(
                        'status' => 'ok',
                        'msg' => 'insert success',
                        'result' => $query,
                    );
                } else {
                    $json = array(
                        'status' => 'error',
                        'msg' => 'insert failed',
                        'result' => $query,
                    );
                }
                
                header("Content-type:application/json");
                echo json_encode($json,JSON_PRETTY_PRINT);
            }            
        }
    }

    public function logout() {
        // logout
        $this->session->sess_destroy();
        redirect();
    }

}