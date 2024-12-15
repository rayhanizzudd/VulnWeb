<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Cek user berdasarkan username
    public function check_user($username) {
        // Pastikan query ini sesuai dengan nama tabel dan kolom Anda
        $query = $this->db->get_where('user', ['username' => $username]);
        return $query->row_array(); // Mengembalikan satu baris data user
    }
}
