<?php
/**
 *
 */
class Admin_mdl extends CI_Model
{
  public function getUuid()
  {
    $get = $this->db->query("SELECT uuid() AS uuid")->row();
    return $get->uuid;
  }
  public function uploadPicture($gambar)
  {
    $config['upload_path'] = './assets/file_upload'; #FOLDER PENYIMPANAN UNTUK MENYIMPAN FILE
    $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp'; #EKSTENSI FILE YANG DIPERBOLEHKAN UNTUK DI UPLOAD
    $config['encrypt_name'] = TRUE; #ENKRIPSI NAMA GAMBAR
    $this->upload->initialize($config); #INIALISASI KETENTUAN FILE YANG AKAN DI UPLOAD

    if (!empty($gambar['name'])) { #CEK APAKAH GAMBAR YANG DIUPLOAD TIDAK KOSONG
      if ($this->upload->do_upload('dataGambar')) { #UPLOAD GAMBAR
        $srcGambar = $this->upload->data();

        // COMPRESS IMAGE
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/'.$srcGambar['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '50%';
        $config['width'] = 600;
        $config['height'] = 400;
        $config['new_image'] = './assets/images/'.$srcGambar['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $response['status'] = 1;
        $response['message'] = "Gambar sukses di upload !!";
        $response['data'] = $srcGambar['file_name'];
        return $response;
      }
    }else {
      $response['status'] = 0;
      $response['message'] = "Gambar tidak terupload !!";
      return $response;
    }
  }
}

 ?>
