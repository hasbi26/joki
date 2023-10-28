
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menu_model');
		$this->load->library('user_agent');
	}

    public function index($user_id = null)
	{


		if($this->agent->is_mobile()){

			$name = htmlspecialchars($this->input->post('name'));
			$menu = $this->db->get_where('user_menu', ['menu' => $name])->row_array();
			$data['menu'] = $this->db->get_where('user_menu')->result_array();
			$data['product'] = $this->db->get('user')->result_array();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title_page'] = "User Monitoring";
			$data['user_id'] = array('user_id' => $user_id);
	


            // $this->load->view('main/header',$data);
			$this->load->view('chat/mobile',  $data);
            $this->load->view('main/footer');


			// $this->load->view('topup/mobile/index', $data);
            // $this->load->view('main/footer');
			




        }else{
            // $this->load->view('main/web/main', $data);
			$name = htmlspecialchars($this->input->post('name'));
			$menu = $this->db->get_where('user_menu', ['menu' => $name])->row_array();
			$data['menu'] = $this->db->get_where('user_menu')->result_array();
			$data['product'] = $this->db->get('user')->result_array();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title_page'] = "User Monitoring";
	
				$this->load->view('templates/sitemain/header', $data);
				$this->load->view('templates/sitemain/sidebar', $data);
				$this->load->view('templates/sitemain/topbar', $data);
				$this->load->view('chat/index', array('user_id' => $user_id));
				$this->load->view('templates/sitemain/footer');
	
        }










	}






}