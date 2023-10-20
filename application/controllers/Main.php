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

    if (!empty($this->session->userdata('email')))
    {
        // $data['product'] = $this->db->get('jasa')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product']  = $this->db->get_where('jasa',array('type'=>'0'))->row_array();

        if($this->agent->is_mobile()){
            $this->load->view('main/header');
            $this->load->view('main/mobile/mainMember', $data);
            $this->load->view('main/footer');
 
        }else{
            $this->load->view('main/web/main', $data);
        }

    } else {

        $data['product']  = $this->db->get_where('jasa',array('type'=>'1'))->row_array();

        if($this->agent->is_mobile()){
            $this->load->view('main/header');
            $this->load->view('main/mobile/main', $data);
            $this->load->view('main/footer');
 
        }else{
            $this->load->view('main/web/main', $data);
        }
    }
       
   }


   public function getJasa(){

    $data =[] ;
    $param = $this->input->post('postdata');

    if (!empty($this->session->userdata('email')))
    {
        if ($param == "Jasa") {

            $Item = $this->db->get_where('jasa',array('type'=>'0'))->result();
            $data['Item'] = $Item;
    
        } 


        echo json_encode($data);


    } else {

        if ($param == "Jasa") {

        $Item = $this->db->get_where('jasa',array('type'=>'1'))->result();

        $data['Item'] = $Item;
        }
    
        echo json_encode($data);

    }



   }


}