<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secsqli extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('M_user'); 
    }

    public function index() {
        $this->load->view('secure/v_sqli', ['message' => '']);
    }

    public function login() {
        log_message('debug', 'Login method accessed'); 
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['message'] = 'Silakan isi username dan password dengan benar.';
            $this->load->view('secure/v_sqli', $data);
            return;
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->M_user->check_user($username);

        if ($user && $password === $user['password']) { 
            $data['message'] = 'Login berhasil. Selamat datang, Administrator!';
            log_message('debug', 'Login successful for user: ' . $username);
            $this->load->view('secure/v_sqli', $data);
        } else {
            $data['message'] = 'Username atau password salah.';
            log_message('error', 'Login failed for user: ' . $username);
            $this->load->view('secure/v_sqli', $data);
        }
    }

}
