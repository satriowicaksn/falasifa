<?php
/**
 *
 */
class Admin extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('Admin_mdl', 'admin');
    $this->load->library('upload');
  }
  public function index()
  {
    $data['konten'] = 'admin/dashboard';
    $this->load->view('admin/template', $data);
  }
  public function galeri()
  {
    $data['time'] = date('d/m/Y H:i');
    $data['konten'] = 'admin/galeri';
    $this->load->view('admin/template', $data);
  }
  public function linkInformation()
  {
    $data['konten'] = 'admin/linkInformation';
    $this->load->view('admin/template', $data);
  }
  public function dataUser()
  {
    $data['konten'] = 'admin/dataUser';
    $this->load->view('admin/template', $data);
  }
  public function uploadGaleri()
  {
    $text = $this->input->post('dataText');
    // $id = $this->admin->getUuid();
    $createdAt = date('Y-m-d H:i:s');
    $namaGambar = "Belum";

    $gambar = $_FILES['dataGambar'];
    $upload = $this->admin->uploadPicture($gambar);
    // echo "<pre>";print_r($upload);die;


    $data = array(
      'id' => "asa",
      'text' => $text,
      'gambar' => '',
      'created_at' => $createdAt
    );
  }
  public function enkripsi()
  {
    $this->load->library('encryption');
    $key = "falasifaInd";
    $pw = "Password Saya";

    $secret_pw = $this->encryption->encrypt($pw);
    $native_pw = $this->encryption->decrypt($secret_pw);

    $data = array(
      'encode' => $secret_pw,
      'decode' => $native_pw
    );
    echo "<pre>"; print_r($data);
  }
  public function cekDevice()
  {
    $this->load->library('user_agent');
    $data = array(
      'isBrowser' => $this->agent->is_browser(),
      'browser' => $this->agent->browser(),
      'isMobile' => $this->agent->is_mobile(),
      'mobile' => $this->agent->mobile(),
      'platform' => $this->agent->platform(),
      'full' => $this->agent->agent_string()

    );
    echo "<pre>"; print_r($data);
  }
}

 ?>
