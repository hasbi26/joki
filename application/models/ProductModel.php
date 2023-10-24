<?php
class ProductModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function addProduct($data) {
        $this->db->insert('jasa', $data);
        return $this->db->insert_id();
    }

    public function getProducts() {
        $query = $this->db->get('jasa');
        return $query->result_array();
    }

    
    public function deleteItem($id) {
        // Ambil informasi item sebelum dihapus
        $item_info = $this->getItemInfo($id);

        if ($item_info) {
            // Hapus item dari database
            $this->db->where('id', $id);
            $this->db->delete('jasa');

            if ($this->db->affected_rows() > 0) {
                unlink(FCPATH . 'assets/img/Product/' . $item_info['image']);
                return true;
            }
        }

        return false;
    }

    public function getItemInfo($item_id) {
        // Ambil informasi item dari database berdasarkan ID
        $query = $this->db->get_where('jasa', array('id' => $item_id));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return false;
    }





}