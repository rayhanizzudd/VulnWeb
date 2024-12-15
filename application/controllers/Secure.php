<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends CI_Controller {
    public function index () {
        // Load view yang berisi form login
        $this->load->view('dashboard/v_secure');
    }
}