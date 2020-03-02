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
        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }   
        
        redirect('member/dashboard');
    }

    public function signin() {
        // check if logged in
        if ($this->session->has_userdata('member_logged_in')) {
            redirect();
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
                    $data_member = [
                        'name' => $result[0]['name'],
                        'member_id' => $result[0]['member_id'],
                        'email' => $result[0]['email'],
                        'category' => $result[0]['comunity'],
                    ];
                    $this->session->set_userdata('member_data', $data_member); //set session
                    $this->session->set_userdata('member_logged_in', true); //set session
                    
                    //message
                    $json = array(
                        'status' => 'ok',
                        'msg' => 'login success!'
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

        $this->load->library('form_validation');
        // check if logged in
        if ($this->session->has_userdata('member_logged_in')) {
            redirect();
        }
        
        
        if (!$this->input->post()) {
            show_404();
        }
        
		
        
        //validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]',
            array('required' => 'nama wajib di isi'));
        $this->form_validation->set_rules('handphone', 'Handphone', 'trim|required|min_length[8]',
        array('required' => 'handphone wajib di isi'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email]',
        array('required' => 'email wajib di isi'));
        $this->form_validation->set_rules('community', 'Kategori Komunitas', 'trim|required',
        array('required' => 'Kategori wajib di isi'));
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
            // Config Upload image
            $config['upload_path'] = './assets/tmp';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = time() . '_' . $_FILES[$file_element_name]['name'];
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config,'imageupload'); // Create custom object for cover upload
            $this->imageupload->initialize($config);
            $upload_image = $this->imageupload->do_upload($file_element_name);
            
            //resume
            if(!empty($_FILES['resume'])){
                $file_element_name2 = 'resume';
                $config['upload_path'] = './assets/cv';
                $config['allowed_types'] = 'jpg|png|jpeg|JPG|pdf|doc';
                $config['max_size'] = '2048';
                $config['encrypt_name'] = FALSE;
                $config['file_name'] = time() . '_' . $_FILES[$file_element_name2]['name'];
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config,'cvupload'); // Create custom object for cover upload
                $this->cvupload->initialize($config);
                $upload_cv = $this->cvupload->do_upload($file_element_name2);
            }

            if(!empty($_FILES['resume'])){
                if(!$upload_cv){
                    $message[] = $this->cvupload->display_errors();
                }
            }

            if (!$upload_image) {
                $message[] = $this->imageupload->display_errors();
                $json = array(
                    'status' => 'error',
                    'msg' => $message
                );
                header("Content-type:application/json");
                echo json_encode($json,JSON_PRETTY_PRINT);
            } else {
                $data = $this->imageupload->data(); //data uploa image      
                if(!empty($_FILES['resume'])){
                    $data2 = $this->cvupload->data(); //data uploa resume
                }

                $type = $this->input->post('type');
                $name = $this->input->post('name');
                $handphone = $this->input->post('handphone');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $community = $this->input->post('community');
                $community_other = $this->input->post('community_other');
                $image = $data['file_name'];
                $portfolio = $this->input->post('portfolio');
                $ratecard = $this->input->post('ratecard');
                $ig_account = $this->input->post('ig_account');
                $fb_account = $this->input->post('fb_account');
                $twitter = $this->input->post('twitter');
                $website = $this->input->post('website');

                if(!empty($community_other)) {
                    $community = $community_other;
                }
                
                $param = [
                    'name' => $name,
                    'email' => $email,
                    'handphone' => $handphone,
                    'password' => crypt($password, $this->config->item('encryption_key')),
                    'comunity' => strtolower($community),
                    'name' => $name,
                    'image' => $image,
                    'status' => 1,
                    'member_type' => $type,
                    'portfolio' => $portfolio,
                    'ratecard' => $ratecard,
                    'ig_account' => $ig_account,
                    'fb_account' => $fb_account,
                    'twitter_account' => $twitter,
                    'website' => $website
                ];
                if(!empty($_FILES['resume'])){
                    $param['resume'] = $data2['file_name'];
                }

                // echo '<pre>';
                // print_r($param);exit;
                $query = $this->Model_crud->insert('member', $param);

                if ($query > 0) {
                    // $data_member = [
                    //     'name' => $name,
                    //     'member_id' => $query,
                    //     'email' => $email,
                    // ];
                    // $this->session->set_userdata('member_data', $data_member); //set session
                    // $this->session->set_userdata('member_logged_in', true); //set session

                    @rename(FCPATH.'/assets/tmp/'.$image, FCPATH.'/assets/images/member/'.$image);
                    $json = array(
                        'status' => 'ok',
                        'msg' => 'registered successfully. please login!',
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