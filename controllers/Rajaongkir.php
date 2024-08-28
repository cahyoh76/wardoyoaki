<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {
  private $api_key = 'c6aeeb2b673614c6f7b5fa834e59663f';

public function __construct()
{
  parent::__construct();
  $this->load->model('m_admin');
  
}

  public function provinsi()
  {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  $array_response = json_decode($response, true);
  // echo '<pre>';
  // print_r($array_response['rajaongkir']['results']);
  // echo '</pre>';
  $data_provinsi = $array_response['rajaongkir']['results'];
  echo "<option value=''>--Pilih Provinsi--</option>";
  foreach ($data_provinsi as $key => $value) {
    echo "<option value='" .$value['province'] . "' id_provinsi='" . $value['province_id'] ."'>" . $value['province'] . "</option>";
  }
}
  }

  public function setting_kota()
  {
$id_provinsi_terpilih = $this->input->post('id_provinsi');

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response, true);
  $data_kota = $array_response['rajaongkir']['results'];
  echo "<option value=''>--Pilih Kota--</option>";
  foreach ($data_kota as $key => $value) {
    echo "<option value='" .$value['city_id'] . "'>" . $value['city_name'] . "</option>";
  }
}
  }

  public function kota()
  {
$id_provinsi_terpilih = $this->input->post('id_provinsi');

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response, true);
  $data_kota = $array_response['rajaongkir']['results'];
  echo "<option value=''>--Pilih Kota--</option>";
  foreach ($data_kota as $key => $value) {
    echo "<option value='" . $value['city_name'] . "' id_kota='" .$value['city_id'] . "'>" . $value['city_name'] . "</option>";
  }
}
  }

  public function ekspedisi()
  {
    echo '<option value="">--Pilih Ekspedisi--</option>';
    echo '<option value="jne">JNE</option>';
    echo '<option value="tiki">TIKI</option>';
    echo '<option value="pos">POS INDONESIA</option>';
  }

  public function paket()
  {
    $id_kota_asal = $this->m_admin->data_setting()->lokasi;
    $ekspedisi = $this->input->post('ekspedisi');
    $id_kota = $this->input->post('id_kota');
    $berat = $this->input->post('berat');

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=" . $id_kota_asal . "&destination=" . $id_kota . "&weight=" . $berat . "&courier=" . $ekspedisi,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  $array_response = json_decode($response, true);
  // echo '<pre>';
  // print_r($array_response['rajaongkir']['results']['0']['costs']);
  // echo '</pre>';
  $data_paket = $array_response['rajaongkir']['results']['0']['costs'];
  echo "<option value=''>-- Pilih Paket--</option>";
  foreach ($data_paket as $key => $value) {
    echo "<option value='" . $value['service']."' ongkir='" . $value['cost'][0]['value']."' estimasi='".$value['cost'][0]['etd']." Hari'>";
    echo $value['service'] . " | Rp." . $value['cost'][0]['value']. " | " .$value['cost'][0]['etd']. "Hari";
    echo "</option>";
    }
    }
  }
}