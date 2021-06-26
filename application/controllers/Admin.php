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
    $data['link'] = $this->db->query("SELECT * FROM tb_link_info")->result();
    // echo "<pre>";print_r($data['link']);die;

    $data['konten'] = 'admin/linkInformation';
    $this->load->view('admin/template', $data);
  }
  public function dataUser()
  {
    $data['konten'] = 'admin/dataUser';
    $this->load->view('admin/template', $data);
  }
  public function testGaleri()
  {
    $this->load->view('admin/testGaleri');
  }
  public function uploadGaleri()
  {
    $text = $this->input->post('dataText');
    $id = $this->admin->getUuid();
    $createdAt = date('Y-m-d H:i:s');
    $namaGambar = "Belum Ada";
    $gambar = $_FILES['dataGambar'];
    $upload = $this->admin->uploadPicture($gambar);
    if ($upload['status']==1) {
      $namaGambar = $upload['data'];
    }

    $data = array(
      'id' => $id,
      'text' => $text,
      'gambar' => $namaGambar,
      'created_at' => $createdAt
    );
    echo "<pre>"; print_r($data);die;
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
  public function tambah_link()
  {
    $nama_link = $this->input->post('nama_link');
    $href = $this->input->post('href');
    $time = date('Y-m-d H:i:s');
    $id = $this->admin->getUuid();

    $data_masuk = array(
      'id_link' => $id,
      'nama_link' => $nama_link,
      'href' => $href,
      'created_at' => $time,
      'updated_at' => $time
    );
    $this->db->insert('tb_link_info', $data_masuk);
    redirect('admin/linkInformation');
  }
}

 ?>
