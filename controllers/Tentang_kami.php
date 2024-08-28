<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kami extends CI_Controller {
  
  public function index()
  {
    $data = array(
      'title' => 'Tentang Kami',
      'isi' => 'v_tentang_kami',
    );
    $this->load->view('layout/v_wrapper_frontend', $data, FALSE);  
  }
}