<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comment extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_comments() {
        return $this->db->get('comment')->result_array(); // Ambil semua komentar
    }

    public function save_comment($data) {
        $this->db->insert('comment', $data); // Simpan komentar
    }
}
