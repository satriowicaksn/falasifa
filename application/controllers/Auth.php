<?php
/**
 *
 */
class Auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->library('session');
    $this->load->model('Auth_mdl', 'auth');
  }
  public function index()
  {
    $this->load->view('auth/login');
  }
  public function cek_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $eksekusi = $this->auth->cek_data_user($username, $password);
    if ($eksekusi['status']==1) {

      $session['login'] = true;
      $session['id'] = $eksekusi['id'];
      $session['name'] = $eksekusi['name'];
      $this->session->set_userdata($session);
      redirect('admin/index');
    }else {
      redirect('auth/index');
    }
    echo "<pre>";print_r($eksekusi);die;
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/index');
  }
  // public function test_login()
  // {
  //   $this->load->view('auth/test_login');
  // }
}
 ?>