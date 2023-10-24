<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topup extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		is_logged_in();
	}

    public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "My Profile";


		if($this->agent->is_mobile()){
            // $this->load->view('main/header');
            $this->load->view('topup/mobile/index', $data);
            $this->load->view('main/footer');
			
 
        }else{

			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('user/page/profile', $data);
			$this->load->view('templates/sitemain/footer');


        }
    }

}