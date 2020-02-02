<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('Model_crud');
        $this->load->library('pagination');
        $config = $this->Model_crud->select_where('setting', array('code' => 'config'));
        $menu = $this->Model_crud->select_where('menu', array('status' => 1));

        //Data
        $this->data = array(
            'title' => 'Project',
            'config_name' => $config[0]['value'],
            'logo' => $config[1]['value'],
            'favicon' => $config[2]['value'],
            'meta_title' => $config[7]['value'],
            'meta_description' => $config[8]['value'],
            'meta_keyword' => $config[9]['value'],
			'footer' => $config[19]['value'],
            'menu' => $menu
        );
    }

    public function index() {

    	//Data
        $data = $this->data;

        $data['slideshow'] = $this->Model_crud->select_where('project_slideshow', array('status'=>1));
        $data['project'] = $this->Model_crud->select_query("SELECT p.*, c.name AS category_name, c.slug AS category_slug FROM project p LEFT JOIN category c ON p.category_id = c.category_id ORDER BY p.created_at DESC limit 8");
        $data['category'] = $this->Model_crud->select('category');

        $data['load_view'] = 'view_project';
        $this->load->view('template/front', $data);
    }

    public function page() {
		
		$page = $this->input->post('page');
		$category = $this->input->post('category');
		
		$r_cat = $this->Model_crud->select('category');
		$key = array_search($category, array_column($r_cat, 'slug'));
		
		//if(!is_numeric($page)) {
		//	show_404();
		//}
		
		//if($key == FALSE || $key == NULL) {
		//	show_404();
		//}
		
        //Data
        $data = $this->data;

        $config["per_page"] = 16;

        $page = ($page) ? $page : 1;
		if($category == 'all') {
			$data["results"] = $this->Model_crud->select_query("SELECT p.*, c.name AS category_name, c.slug AS category_slug FROM project p LEFT JOIN category c ON p.category_id = c.category_id ORDER BY p.created_at DESC limit 0, ". $page * $config["per_page"]);
		} else {
			$data["results"] = $this->Model_crud->select_query("SELECT p.*, c.name AS category_name, c.slug AS category_slug FROM project p LEFT JOIN category c ON p.category_id = c.category_id WHERE c.slug = '".strip_tags($category)."' ORDER BY p.title ASC limit 0, ".$page * $config["per_page"]);
		}
        
        $html = $this->load->view('view_project_page', $data, true);

        header("Content-Type: text/plain");
        echo $html;
    }
}