<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vulnsqli extends CI_Controller {

    public function index() {
        $this->load->view('vulnerable/v_sqli', ['message' => '']);
    }
    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $user = $result->row();
            if ($user->role == 'administrator') {
                $message = "Welcome Administrator";
            } else {
                $message = "Anda bukan admin.";
            }
        } else {
            $message = "Login gagal. Silakan coba lagi.";
        }
        $this->load->view('vulnerable/v_sqli', ['message' => $message]);
    }
}
