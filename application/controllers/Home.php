<?php

class Home extends CI_Controller
{
  public function index()
  {
    $this->load->view('main/index');
  }
  public function galeri()
  {
    $this->load->view('main/galeri');
  }
  public function pricelist()
  {
    $this->load->view('main/pricelist');
  }
  public function instagram()
  {
    $this->load->view('main/instagrampage');
  }
}

?>
