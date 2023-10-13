<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		$this->load->library('user_agent');
   }


   public function index()
   {

    $data['product'] = $this->db->get('jasa')->result_array();

       if($this->agent->is_mobile()){
           $this->load->view('main/mobile/main', $data);
           $this->load->view('main/footer');

       }else{
           $this->load->view('main/web/main', $data);
       }
       
   }


   public function getJasa(){

    // $data['product'] = $this->db->get('jasa')->result_array();

    $Item = $this->db->get('jasa')->result_array();

    $data['Item'] = $Item;

    echo json_encode($data);
   }


}