<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menu_model');
	}

    public function index()
	{
		$name = htmlspecialchars($this->input->post('name'));
        $menu = $this->db->get_where('user_menu', ['menu' => $name])->row_array();
		$data['menu'] = $this->db->get_where('user_menu')->result_array();
		$data['product'] = $this->db->get('jasa')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Menu Management";

        	$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('product/index', $data);
			$this->load->view('templates/sitemain/footer');


		// $this->form_validation->set_rules('name', 'Name Of New Menu', 'trim|required');
		// $name = htmlspecialchars($this->input->post('name'));
		// $name = trim($name, ' ');
		// $menu = $this->db->get_where('user_menu', ['menu' => $name])->row_array();
		// $data['menu'] = $this->db->get_where('user_menu')->result_array();
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title_page'] = "Menu Management";
		// if ($this->form_validation->run() == false) {
		// 	$this->load->view('templates/sitemain/header', $data);
		// 	$this->load->view('templates/sitemain/sidebar', $data);
		// 	$this->load->view('templates/sitemain/topbar', $data);
		// 	$this->load->view('menu/index', $data);
		// 	$this->load->view('templates/sitemain/footer');
		// }else{
		// 	// cek apakah menu sudah ada atau tidak
		// 	if (is_null($menu)) {
		// 		$this->db->insert('user_menu', ['menu' => $name]);
		// 		$this->Flasher_model->flashdata('New menu added', 'Succes', 'success');
		// 		redirect('menu');
		// 	}else{
		// 		$this->Flasher_model->flashdata('Name menu already exist', 'Failed', 'danger');
		// 		redirect('menu');
		// 	}
		// }
	}



}