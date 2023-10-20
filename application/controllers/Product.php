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


	}



}