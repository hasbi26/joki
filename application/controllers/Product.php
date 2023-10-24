<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menu_model');
		$this->load->model('ProductModel');
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



	public function addProduct() {
		
		
		// Konfigurasi untuk pengunggahan gambar
		$config['upload_path'] = './assets/img/Product/'; // Sesuaikan dengan folder penyimpanan gambar
		$config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diperbolehkan
		$config['max_size'] = 2048; // Ukuran maksimum gambar (dalam kilobita)
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nama', 'Nama Produk harus di isi', 'required');
		$this->form_validation->set_rules('jenis', 'jenis Produk harus di isi', 'required');
		$this->form_validation->set_rules('harga', 'Harga Harus Angka', 'numeric');

		if ($this->form_validation->run() == false) {

			$error = validation_errors();
			echo $error;
		} else {

			$file_upload = $_FILES['gambar'];

			if (!$this->upload->do_upload('gambar')) {
				// Pengungahan gambar gagal, tampilkan pesan kesalahan
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('product/index', $error);
			} else {
				// Pengungahan gambar berhasil, simpan data ke database
				$data = array(
					'nama' => $this->input->post('nama'),
					'jenis' => $this->input->post('jenis'),
					'type' => $this->input->post('type'),
					'harga' => $this->input->post('harga'),
					'image' => $file_upload['name']
				);
	
				// Panggil model untuk menyimpan data ke database
				$this->ProductModel->addProduct($data);
	
				// Redirect ke halaman utama atau halaman yang sesuai
				// redirect('product/index');
				echo 'success';
			}
		}
	}

	

    public function deleteProduct() {
        $id = $this->input->post('id');
		
        $result = $this->ProductModel->deleteItem($id);

        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }


	public function detail()
	{
		echo json_encode($this->db->get_where('jasa', ['id' => $this->input->post('id')])->row_array());
	}

    public function getItemInfo($item_id) {
        // Ambil informasi item dari database berdasarkan ID
        $query = $this->db->get_where('jasa', array('id' => $item_id));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return false;
    }



	public function edit()
	{

		$id = $this->input->post('id');
		$name = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$type = $this->input->post('edittype');
		$harga = $this->input->post('harga');

		$file_upload = $_FILES['gambar'];



		if ($file_upload['name'] != '') {
			$config['upload_path'] = 'assets/img/Product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2000';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar')) {
				
				$item_info = $this->getItemInfo($id);
				// var_dump($new_image);
				// die;
				
				if ($item_info) {
					unlink(FCPATH . 'assets/img/Product/' . $item_info['image']);
	
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
	
					// echo $new_image;
					// return true;
				}
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('nama', $name);
		$this->db->set('jenis', $jenis);
		$this->db->set('type', $type);
		$this->db->set('harga', $harga);
		$this->db->where('id', $id);
		$this->db->update('jasa');
		$this->Flasher_model->flashdata('Your profile has been updated', 'Success', 'success');
		// redirect('product');

		echo 'success';

	// 	var_dump("here?", $this->input->post('id') );
	// 	die;
	// 	// cek apakah ada data yang dikirimkan atau tidak
	// 	if (is_null($this->input->post('id'))) {
	// 		redirect('menu');
	// 	}
	// 	$id = htmlspecialchars($this->input->post('id'));
	// 	$name = htmlspecialchars($this->input->post('name'));
	// 	$menu = $this->db->get_where('user_menu', ['menu' => $name])->row_array();
	// 	// di cek apakah nama sudah digunakan atau belum
	// 	if (is_null($menu)) {
	// 		$this->db->set('menu', $name);
	// 		$this->db->where('id', $id);
	// 		$this->db->update('user_menu');
	// 		$this->Flasher_model->flashdata('Menu Renamed','Succes','success');
	// 		redirect('menu');
	// 	}else{
	// 		$this->Flasher_model->flashdata('Name already exist','Failed','danger');
	// 		redirect('menu');
	// 	}
	// }
	
	}
	

}