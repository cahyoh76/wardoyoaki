<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

  public function register($data)
  {
    $this->db->insert('tbl_pelanggan', $data);
    
  }

  public function edit($data)
  {
    $this->db->where('id_pelanggan', $data['id_pelanggan']);
    $this->db->update('tbl_pelanggan', $data);
  }

}

/* End of file M_pelanggan.php */
