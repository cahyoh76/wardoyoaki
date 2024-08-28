<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gambar_barang extends CI_Model {

  public function get_all_data()
  {
    $this->db->select('tbl_barang.*,COUNT(tbl_gambar_barang.id_barang) as total_gambar_barang');
    $this->db->from('tbl_barang');
    $this->db->join('tbl_gambar_barang', 'tbl_gambar_barang.id_barang = tbl_barang.id_barang','left');
    $this->db->group_by('tbl_barang.id_barang');
    $this->db->order_by('tbl_barang.id_barang', 'desc');
    return $this->db->get()->result();
  }

  public function get_data($id_gambar_barang)
  {
    $this->db->select('*');
    $this->db->from('tbl_gambar_barang');
    $this->db->where('id_gambar_barang', $id_gambar_barang);
    return $this->db->get()->row();
  }

  public function get_gambar($id_barang)
  {
    $this->db->select('*');
    $this->db->from('tbl_gambar_barang');
    $this->db->where('id_barang', $id_barang);
    return $this->db->get()->result();
  }

  public function add($data)
  {
    $this->db->insert('tbl_gambar_barang', $data);
  }

  public function delete($data)
  {
    $this->db->where('id_gambar_barang', $data['id_gambar_barang']);
    $this->db->delete('tbl_gambar_barang', $data);
  }
}