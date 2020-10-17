<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kendaraan extends CI_Controller {
  public function __construct()
	{

		parent::__construct();

		$this->load->model('KendaraanModel');
	}
	public function index()
	{
		// $this->load->view('templates/header');     
		$data['content'] = 'master_kendaraan';

		$this->load->view('templates/index', $data);
	}
	public function getAllProduk()
	{
		$dt = $this->KendaraanModel->data_AllProduk($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status = "";
		foreach ($dt['data']->result() as $row) {
			if ($row->status == 1) {
				$status = "<span class='btn btn-rounded btn-outline-success px-3 btn-sm'>Aktif</span>";
			} else {
				$status = "<span class='btn btn-rounded btn-outline-warning px-3 btn-sm'>Non Aktiv</span>";
			}
			if ($row->jenis == 1) {
				$jenis = "<span class='btn btn-rounded btn-outline-success px-3 btn-sm'>Mobil</span>";
			} else {
				$jenis = "<span class='btn btn-rounded btn-outline-warning px-3 btn-sm'>Truk</span>";
			}


			$fields = array($no++);
			$fields[] = $row->nama_kendaraan . '<br>';
			$fields[] = $jenis . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $row->updated. '<br>';
			$fields[] = $row->updatedby . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_kendaraan="' . $row->id_kendaraan . '" 
			data-nama_kendaraan="' . $row->nama_kendaraan . '" 
			data-status="' . $row->status . '"  	data-jenis="' . $row->jenis . '"  		
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-nama_kendaraan="' . $row->nama_kendaraan . '" data-id_kendaraan="' . $row->id_kendaraan . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function tambah()
	{
		$username = $this->input->post('nama', TRUE);
		$stat = $this->input->post('status', TRUE);
		$jenis = $this->input->post('jenis', TRUE);

		$message = 'Gagal menambahkan Produk Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;


		$in = array(
			'nama_kendaraan' => $username,
			'status' => $stat,
			'jenis' => $jenis,
			'updated' => date('Y-m-d H:i:s'),
			'updatedby' => 1,
		);

		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if ($status) {
			$this->KendaraanModel->tambah_admin($in);
			$status = true;
			$message = 'Berhasil Menambahkan Produk.';
		} else {
			$message = 'Gagal menambahkan Produk Baru!<br>Silahkan lengkapi data yang diperlukan.';

			$message = 'Gagal ';
			$status = false;
		}



		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function edit()
	{
		// var_dump($_POST);die;
		$id_admin = $this->input->post('id_admin', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$stat = $this->input->post('status', TRUE);
		$jenis = $this->input->post('jenis', TRUE);

		$message = 'Gagal Update!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($transaksi_ldu_lihat);die();
		$in = array(
			'nama_kendaraan' => $nama,
			'status' => $stat,
			'jenis' => $jenis,
			'updated' => date('Y-m-d H:i:s'),
			'updatedby' => 2,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		// var_dump($in);die();

		if ($status) {
			$this->KendaraanModel->editDariTable('kendaraan', $in, $id_admin,'id_kendaraan');
			$message = 'Berhasil Update Produk ';
		} else {
			$message = 'Gagal Meng-Update Produk! ';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function hapus()
	{

		$id_user = $this->input->post('id_user', true);
		$data = $this->ProdukModel->getById($id_user);
		// var_dump($data);die();
		$status = false;
		$message = 'Gagal menghapus Produk!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Produk yang dimaksud.';
		} else {
			$this->ProdukModel->hapusDariTable('produk', $id_user,'id_produk');
			$status = true;
			$message = 'Berhasil menghapus Produk: <b>' . $data[0]->nama_produk . '</b>';
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}

        
}
        
    /* End of file  produk.php */
        
                            