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
    $status_login = $this->session->userdata('login');
    if ($status_login != true) {
      redirect('auth/index');
    }
  }
  public function index()
  {
    $data['konten'] = 'admin/dashboard';
    $data['kunjungan'] = $this->admin->get_kunjungan_halaman();
    $data['total_kunjungan'] = $this->admin->get_total_kunjungan();
    $data['galeri'] = $this->admin->get_galeri();
    $this->admin->cekDevice("dashboard admin");
    // echo "<pre>";print_r($data['galeri']);die;
    $this->load->view('admin/template', $data);
  }
  public function kategori()
  {
    $data['konten'] = 'admin/kategori';
    $data['kategori'] = $this->admin->get_kategori();
    $this->admin->cekDevice("galeri halaman admin");
    $this->load->view('admin/template', $data);
    // echo "<pre>";print_r($data['kategori']);die;
  }
  public function galeri()
  {
    $data['time'] = date('d/m/Y H:i');
    $data['konten'] = 'admin/galeri';
    $data['galeri'] = $this->admin->get_galeri();
    $data['kategori'] = $this->admin->get_kategori();
    // echo "<pre>";print_r($data['galeri']);die;
    $this->admin->cekDevice("galeri halaman admin");
    $this->load->view('admin/template', $data);
  }
  public function linkInformation()
  {
    $data['link'] = $this->db->query("SELECT * FROM tb_link_info")->result();
    // echo "<pre>";print_r($data['link']);die;
    $this->admin->cekDevice("link information halaman admin");
    $data['konten'] = 'admin/linkInformation';
    $this->load->view('admin/template', $data);
  }
  public function dataUser()
  {
    $data['konten'] = 'admin/dataUser';
    $data['user'] = $this->admin->get_user();
    $this->admin->cekDevice("data user halaman admin");
    // echo "<pre>";print_r($data['user']);die;
    $this->load->view('admin/template', $data);
  }
  public function testGaleri()
  {
    $this->load->view('admin/testGaleri');
  }
  public function uploadGaleri()
  {
    $id = $this->admin->getUuid();
    $createdAt = date('Y-m-d H:i:s');
    $namaGambar = "Belum Ada";
    $gambar = $_FILES['dataGambar'];
    $kategori = $this->input->post('kategori');

    $upload = $this->admin->uploadPicture($gambar);

    if ($upload['status']==1) {
      $namaGambar = $upload['data'];
    }

    $data = array(
      'id_galeri' => $id,
      'foto' => $namaGambar,
      'id_kategori' => $kategori,
      'created_at' => $createdAt
    );
    $this->db->insert('tb_galeri', $data);
    redirect('admin/galeri');
    // echo "<pre>"; print_r($data);die;
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
  public function hapus_link()
  {
    $id = $this->input->post('id_link');
    $this->db->query("DELETE FROM tb_link_info WHERE id_link = '$id'");
    redirect('admin/linkInformation');
  }
  public function update_link()
  {
    $id = $this->input->post('id_link');
    $nama_link = $this->input->post('nama_link');
    $href = $this->input->post('href');
    $updated_at = date('Y-m-d H:i:s');

    $data = array(
      'nama_link' => $nama_link,
      'href' => $href,
      'updated_at' => $updated_at
    );
    $where = array(
      'id_link' => $id
    );
    $this->db->update('tb_link_info', $data, $where);
    redirect('admin/linkInformation');
  }
  public function hapus_galeri()
  {
    $id_galeri = $this->input->post('id_galeri');
    $this->db->query("DELETE FROM tb_galeri WHERE id_galeri = '$id_galeri'");
    redirect('admin/galeri');
  }
  public function tambah_user()
  {
    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $id_user = $this->admin->getUuid();
    $data = array(
      'id_user' => $id_user,
      'name' => $name,
      'username' => $username,
      'password' => $password,
      'created_at' => date('Y-m-d H:i:s')
    );
    $this->db->insert('tb_user', $data);
    redirect('admin/dataUser');
  }
  public function update_user()
  {
    $id_user = $this->input->post('id_user');
    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $data = array(
      'name' => $name,
      'username' => $username,
      'password' => $password
    );
    $where = array(
      'id_user' => $id_user
    );
    $this->db->update('tb_user', $data, $where);
    redirect('admin/dataUser');
  }
  public function hapus_user()
  {
    $id_user = $this->input->post('id_user');
    $this->db->query("DELETE FROM tb_user WHERE id_user = '$id_user'");
    redirect('admin/dataUser');
  }
  public function tambah_kategori()
  {
    $id_kategori = $this->admin->getUuid();
    $nama_kategori = $this->input->post('nama_kategori');
    $created_at = date('Y-m-d H:i:s');
    $updated_at = $created_at;

    $data = array(
      'id_kategori' => $id_kategori,
      'nama_kategori' => $nama_kategori,
      'created_at' => $created_at,
      'updated_at' => $updated_at
    );

    $this->db->insert('tb_kategori', $data);
    redirect('admin/kategori');
  }
  public function update_kategori()
  {
    $id_kategori = $this->input->post('id_kategori');
    $nama_kategori = $this->input->post('nama_kategori');
    $updated_at = date('Y-m-d H:i:s');

    $data = array(
      'nama_kategori' => $nama_kategori,
      'updated_at' => $updated_at
    );
    $where = array(
      'id_kategori' => $id_kategori
    );
    $this->db->update('tb_kategori', $data, $where);
    redirect('admin/kategori');
  }
  public function hapus_kategori()
  {
    $id_kategori = $this->input->post('id_kategori');
    $this->db->query("DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");
    redirect('admin/kategori');
  }
  public function update_kategori_foto()
  {
    $id_galeri = $this->input->post('id_galeri');
    $kategori = $this->input->post('kategori');
    $data = array(
      'id_kategori' => $kategori
    );
    $where = array(
      'id_galeri' => $id_galeri
    );
    $this->db->update('tb_galeri', $data, $where);
    redirect('admin/galeri');
  }
}

 ?>
