<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();

        // check if logged in
        if (!$this->session->has_userdata('member_logged_in')) {
            redirect();
        }

        //load Model
        $this->load->model('Model_crud');
    }

    public function upload() {
        $file_element_name = 'document';

        // Config Upload
        // $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/assets/tmp';
        $config['upload_path'] = './assets/tmp';
        $config['allowed_types'] = '*';
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
            echo json_encode($json);
        } else {
            $data = $this->upload->data();
            
            // $config['image_library'] = 'gd2';
            // $config['source_image'] = $data['full_path'];
            // $config['create_thumb'] = FALSE;
            // $config['maintain_ratio'] = TRUE;
            // $config['width'] = 128;
            // $config['height'] = 192;

            // $this->load->library('image_lib', $config);

            // $this->image_lib->resize();
            
            $json = array(
                'status' => 'ok',
                'filename' => $data['file_name'],
                'ext' => $data['file_ext']
            );
            header("Content-type:application/json");
            echo json_encode($json);
        }
    }
}
