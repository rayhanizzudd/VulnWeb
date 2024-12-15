<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secxss extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load database dan model
        $this->load->database();
        $this->load->model('M_comment');
    }

    public function index() {
        $data['product_image'] = null;
        $data['comments'] = $this->M_comment->get_all_comments(); 
        $data['search_query'] = ''; 
        $this->load->view('secure/v_xss', $data);
    }

    public function process() {
        $search_query = $this->input->get('search', TRUE); 
        $search_query = $search_query ? htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8') : ''; 
        if ($search_query) {
            $data['product_image'] = "https://via.placeholder.com/100?text=Produk+" . urlencode($search_query);
        } else {
            $data['product_image'] = null; 
        if ($this->input->post()) {
            $name = $this->input->post('name', TRUE); 
            $email = $this->input->post('email', TRUE); 
            $comment = $this->input->post('comment', TRUE); 
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
            $comment_data = [
                'username' => $name,
                'email' => $email,
                'comment' => $comment
            ];
            $this->M_comment->save_comment($comment_data);
        }
        $data['comments'] = $this->M_comment->get_all_comments();
        $data['search_query'] = $search_query; 
        $this->load->view('secure/v_xss', $data);
    }
}

}
