<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vulnupload extends CI_Controller {

    public function index() {
        $this->load->view('vulnerable/v_fileupload');
    }

    public function do_upload() {
        $upload_path = './uploads/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = '*';
        $config['overwrite']     = true;
        $config['file_name']     = time() . '_' . $_FILES['userfile']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = $this->upload->display_errors();
            $data['success'] = null;
        } else {
            $uploaded_data = $this->upload->data(); 
            $data['success'] = 'File berhasil diunggah!';
            $data['file_name'] = $uploaded_data['file_name'];
            $data['error'] = null;
        }

        $this->load->view('vulnerable/v_fileupload', [
            'error' => isset($data['error']) ? $data['error'] : '',
            'success' => isset($data['success']) ? $data['success'] : '',
            'file_name' => isset($data['file_name']) ? $data['file_name'] : ''
        ]);
    }


}
