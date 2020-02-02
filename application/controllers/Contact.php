<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'Contact',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'contact_email' => $config[3]['value'],
            'meta_title' => $config[16]['value'],
            'meta_description' => $config[17]['value'],
            'meta_keyword' => $config[18]['value'],
			'footer' => $config[19]['value'],
            'menu' => $menu
        );
    }

    public function index() {
    	//Data
        $data = $this->data;

        $data['contact'] = $this->Model_crud->select('contact_intro');

        $data['load_view'] = 'view_contact';
        $this->load->view('template/front', $data);
    }

    public function submit() {
        $data = $this->data;

        //validation
        $this->form_validation->set_rules('name', 'Username', 'trim|required|xss_clean|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean|min_length[3]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|min_length[3]');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean|min_length[3]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';

            $data_insert = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'phone' => $this->input->post('phone'),
                'comment' => $this->input->post('comment'),
                'ip' => $ipaddress
            );
            $this->Model_crud->insert('contact_inbox', $data_insert);

            $this->load->library('email');

            $this->email->from('noreply@protindo.co.id', 'Protindo');
            $this->email->to($data['contact_email']);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');

            $html = '<p>Pengunjung '.$name.' telah mengirim pesan dengan informasi berikut:</p>';
            $html .= '<table>';
            $html .= '<tr><td>Name: </td><td>'.$data_insert['name'].'</td></tr>';
            $html .= '<tr><td>email: </td><td>'.$data_insert['email'].'</td></tr>';
            $html .= '<tr><td>subject: </td><td>'.$data_insert['subject'].'</td></tr>';
            $html .= '<tr><td>phone: </td><td>'.$data_insert['phone'].'</td></tr>';
            $html .= '<tr><td>comment: </td><td>'.$data_insert['comment'].'</td></tr>';
            $html .= '</table>';


            $this->email->subject('[Message] from '.$data_insert['name']);
            $this->email->message($html);
            $this->email->set_mailtype("html");

            $this->email->send();

            $this->session->set_flashdata('success', '<p style="color: green">Message successfuly submited</p>');
        }

        redirect('contact');
    }
    
}