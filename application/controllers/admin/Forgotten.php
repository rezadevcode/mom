<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotten extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        
        //Data
        $this->data = array(
            'title' => 'Forgot Password',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value']
        );
    }

    public function index() {
        //Data
        $data = $this->data;
        
        $data['title'] = 'Forgot Your Password?';
        
        //View
        $data['load_view'] = 'admin/forgotten/forgotten';
        $this->load->view('admin/template/backend', $data);
    }

    public function reset() {
        $email = $this->input->post('email');

        //Message
        if ((strlen($email) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $email)) {
            $this->session->set_userdata('error_warning', 'Warning: No match for E-Mail Address.');
            redirect('admin/forgotten');
        }
       
        $user = $this->Model_crud->select_where('user', array('email'=>$email));
        if ($user) {
            // SET DATA UPDATE
            $data_update = array(
                'token' => sha1(md5(date('Y-m-d H:i:s')))
            );
            $ex_upd = $this->Model_crud->update('user', $data_update, array('email'=>$email));

            // NOTIFICATION
            if ($ex_upd) {
                $this->_email($email, $data_update['token_forgot']);

                $this->session->set_userdata('success', 'Reset password has been send to your mail');
            } else {
                $this->session->set_userdata('error_warning', 'Something error, please try again');
            }
            redirect('admin/login');

        } else {
            $this->session->set_userdata('error_warning', 'Warning! Your email never exist');
            redirect('admin/forgotten');
        }
        
    }
    
    public function token($str = '') {
        // Data
        $data = $this->data;
        
        $user = $this->Model_crud->select_where('user', array('token'=>$str));
        
        if($user) {
            $data['token'] = $str;
            
            // LOAD VIEW
            $data['load_view'] = 'admin/forgotten/forgotten2';
            $this->load->view('admin/template/backend', $data);
        } else {
            $this->session->set_userdata('error_warning', 'Wrong Token');
            redirect('admin/forgotten');
        }
    }
    
    public function update() {
        // GET DATA
        $token = $this->security->xss_clean($this->input->post('token'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $confirm = $this->security->xss_clean($this->input->post('confirm'));
        
        // VALIDATION
        $error = FALSE;
        if(strlen(trim($password)) < 6) {
            $this->session->set_flashdata('error_warning', 'Kata sandi kurang dari 6 karakter');
            $error = TRUE;
        }
        if(trim($confirm) != trim($password)) {
            $this->session->set_flashdata('error_warning', 'Konfirmasi kata sandi tidak sama');
            $error = TRUE;
        }
        if($error) {
            redirect('admin/forgotten/token/'.$token);
        }
        
        // SET DATA UPDATE
        $data_update = array(
            'password' => crypt($password, $this->config->item('encryption_key'))
        );
        
        $ex_upd = $this->Model_crud->update('user', $data_update, array('token'=>$token));
        
        // NOTIFICATION
        if ($ex_upd) {
            $this->session->set_userdata('success', 'Password has been update');
            redirect('admin');
        } else {
            $this->session->set_flashdata('error_warning', 'Something error, please try again');
            redirect('admin');
        }
    }
    
    function _email($seg1='', $seg2='') {
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        
        $this->load->library('email');
        $config_email['mailtype'] = 'html';
        $this->email->initialize($config_email);
        
        $this->email->from('noreply@protindo.co.id', $config[0]['value']);
        $this->email->to($seg1);
        $this->email->subject('Forgot Password - '.$config[0]['value']);
        $message = '<p>Silahkan buka link dibawah ini, untuk mereset password:</p>';
        $message .= base_url('admin/forgotten/token/'.$seg2);
        $this->email->message($message);
        
        //Send mail 
        if($this->email->send()) {
            return TRUE;
        } else { 
            return FALSE;
        }
    }

}
