<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar_barang extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_gambar_barang');
    $this->load->model('m_barang');
    
  }

  public function index()
  {
    $data = array(
      'title' => 'Gambar Barang',
      'gambar_barang' => $this->m_gambar_barang->get_all_data(),
      'isi' => 'gambar_barang/v_gambar_barang',
    );
    $this->load->view('layout/v_wrapper_backend', $data, FALSE);  
  }

  public function add($id_barang)
  {
    $this->form_validation->set_rules('ket', 'Keterangan Gambar', 'required',
      array('required'=>'%s Harus Diisi!!!'
    ));

    if ($this->form_validation->run() == TRUE) {
        $config['upload_path'] = './assets/gambar_barang/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|heic';
        $config['max_size'] = '100000';
        $this->upload->initialize($config);
        $field_name = "gambar_barang"; 
        if (!$this->upload->do_upload($field_name)) {
          $data = array(
            'title' => 'Add Gambar Barang',
            'error_upload' => $this->upload->display_errors(),
            'barang' => $this->m_barang->get_data($id_barang),
            'gambar_barang' => $this->m_gambar_barang->get_gambar($id_barang),
            'isi' => 'gambar_barang/v_add_gambar_barang',
          );
          $this->load->view('layout/v_wrapper_backend', $data, FALSE); 
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/gambar_barang/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
              'id_barang' => $id_barang,
              'ket' => $this->input->post('ket'),
              'gambar_barang' => $upload_data['uploads']['file_name'],
            );
            $this->m_gambar_barang->add($data);
            $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan!!!');
            redirect('gambar_barang/add/'. $id_barang);
        }
    } 
    
    $data = array(
      'title' => 'Add Gambar Barang',
      'barang' => $this->m_barang->get_data($id_barang),
      'gambar_barang' => $this->m_gambar_barang->get_gambar($id_barang),
      'isi' => 'gambar_barang/v_add_gambar_barang',
    );
    $this->load->view('layout/v_wrapper_backend', $data, FALSE); 
  }

  //Delete one item
  public function delete($id_barang, $id_gambar_barang)
  {
    //Hapus gambar
    $gambar_barang = $this->m_gambar_barang->get_data($id_gambar_barang);
    if ($gambar_barang->gambar_barang != "") {
      unlink('assets/gambar_barang/'.$gambar_barang->gambar_barang);
    }
    //End Hapus Gambar
    $data = array('id_gambar_barang' => $id_gambar_barang);
    $this->m_gambar_barang->delete($data);
    $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus!!!');
    redirect('gambar_barang/add/' . $id_barang);
  }
}