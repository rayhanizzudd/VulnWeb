<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vulnxss extends CI_Controller {

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
        $this->load->view('vulnerable/v_xss', $data);
    }

    public function process() {
        $search_query = $this->input->get('search'); 
        if ($search_query) {
            $data['product_image'] = "https://via.placeholder.com/100?text=Produk+" . $search_query;
        } else {
            $data['product_image'] = null; 
        }
        if ($this->input->post()) {
            $comment_data = [
                'username' => $this->input->post('name'),  
                'email' => $this->input->post('email'),    
                'comment' => $this->input->post('comment') 
            ];
            $this->M_comment->save_comment($comment_data);
        }
        $data['comments'] = $this->M_comment->get_all_comments();
        $data['search_query'] = $search_query; 
        $this->load->view('vulnerable/v_xss', $data);
    }
}
