<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Simple_login Class
* Class ini digunakan untuk fitur login, proteksi halaman dan logout
* @author  Gun Gun Priatna
* @url    https://recodeku.blogspot.com
*/

class Simple_login {

  // SET SUPER GLOBAL
  var $CI = NULL;

  /**
   * Class constructor
   *
   * @return   void
   */
  public function __construct() {
      $this->CI =& get_instance();
  }

  /*
  * cek username dan password pada table users, jika ada set session berdasar data user dari
  * table users.
  * @param string username dari input form
  * @param string password dari input form
  */
  public function login($username, $password) {

      //cek username dan password
      $query = $this->CI->db->get_where('users',array('username'=>$username,'password' => md5($password)));

      if ($query->num_rows() == 1) {
        // Ambil data user berdasar username dengan query aman (menggunakan parameter binding)
        $this->CI->db->where('username', $username);
        $row = $this->CI->db->get('users');  // Mendapatkan data user berdasarkan username
        
        $admin = $row->row();
        $id = $admin->id_user;
    
        // Set session user
        $this->CI->session->set_userdata('username', $username);
        $this->CI->session->set_userdata('id_login', uniqid(rand()));
        $this->CI->session->set_userdata('id', $id);
    
        // Redirect ke halaman dashboard
        redirect(site_url('dashboard'));
    } else {
        // Jika tidak ada, set notifikasi dalam flashdata (dengan pesan error)
        $this->CI->session->set_flashdata('error', 'Username atau password anda salah, silakan coba lagi..');
    
        // Redirect ke halaman login
        redirect(site_url('login'));
    }
    
       return false;
   }

  /**
   * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
   * login
   */
  public function cek_login() {

      //cek session username
      if($this->CI->session->userdata('username') == '') {

          //set notifikasi
          $this->CI->session->set_flashdata('sukses','Anda belum login');

          //alihkan ke halaman login
          redirect(site_url('login'));
      }
  }

  /**
   * Hapus session, lalu set notifikasi kemudian di alihkan
   * ke halaman login
   */
  public function logout() {
      $this->CI->session->unset_userdata('username');
      $this->CI->session->unset_userdata('id_login');
      $this->CI->session->unset_userdata('id');
      $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
      redirect(site_url('login'));
  }
}