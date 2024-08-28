<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi_kami extends CI_Controller {
  
  public function index()
  {
    $data = array(
      'title' => 'Hubungi Kami',
      'isi' => 'v_hubungi_kami',
    );
    $this->load->view('layout/v_wrapper_frontend', $data, FALSE);  
  }
}