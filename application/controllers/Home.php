<?php

class Home extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('Admin_mdl', 'admin');
  }
  public function index()
  {
    $this->load->view('main/index');
    $this->admin->cekDevice("halaman utama web");
  }
  public function kategori()
  {
    $data['kategori'] = $this->admin->get_kategori();
    $this->load->view('main/kategori', $data);
  }
  public function galeri($id_kategori='')
  {
    $data['nama_kategori'] = $this->admin->get_nama_kategori($id_kategori);
    $data['galeri'] = $this->admin->get_galeri_by_id_kategori($id_kategori);
    $this->admin->cekDevice("galeri halaman utama");
    $this->load->view('main/galeri', $data);
  }
  public function pricelist()
  {
    $this->load->view('main/pricelist');
  }
  public function instagram()
  {
    $data['instagram'] = $this->db->query("SELECT * FROM tb_link_info")->result();
    $this->load->view('main/instagrampage', $data);
    $this->admin->cekDevice("instagram halaman utama");
    // echo "<pre>";print_r($data['instagram']);die;
  }

  public function location()
  {
    $this->load->view('main/location');
    $this->admin->cekDevice("halaman lokasi");
  }
}

?>
