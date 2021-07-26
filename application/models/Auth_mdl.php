<?php

class Auth_mdl extends CI_Model
{
    public function cek_data_user($username, $password)
    {
      $cekUser = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'")->num_rows();
      $cekPassword = $this->db->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'")->result();
      // 1 . Cek apakah ada username yang sesuai dengan input
      if ($cekUser == 1) {
      if (count($cekPassword) == 1) {
        $response['status'] = 1;
        $response['message'] = "Login berhasil";
        $response['id'] = $cekPassword[0]->id_user;
        $response['name'] = $cekPassword[0]->name;
        return $response;
      }else {
        $response['status'] = 0;
        $response['message'] = "Password salah";
        return $response;
      }
      }
      else {
      $response['status'] = 0;
      $response['message'] = "Username tidak tersedia";
      return $response;
      }

    }
}

 ?>
