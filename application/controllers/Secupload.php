<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secupload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    public function index() {
        $this->load->view('secure/v_fileupload', ['error' => '', 'success' => '']);
    }
    public function do_upload() {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 2048;
        $config['file_name']     = time() . '_' . $_FILES['userfile']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = $this->upload->display_errors();
            $this->load->view('secure/v_fileupload', ['error' => $error, 'success' => '']);
        } else {
            $data = $this->upload->data();
            $username = $this->input->post('username');
            $comment  = $this->input->post('comment');
            $this->load->view('secure/v_fileupload', [
                'error' => '',
                'success' => "File berhasil diunggah: " . $data['file_name']
            ]);
        }
    }
}
