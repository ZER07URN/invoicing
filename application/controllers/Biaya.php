<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Biaya extends CI_Controller {
  public function __construct()
	{

		parent::__construct();

		$this->load->model('ProdukModel');
		$this->load->model('CustomerModel');
		$this->load->model('SuplierModel');
		$this->load->model('BiayaModel');
	}
	public function index()
	{
		// $this->load->view('templates/header');     
		$data['content'] = 'master_biaya';

		$this->load->view('templates/index', $data);
	}
	public function getAll()
	{
		$dt = $this->BiayaModel->data_All($_POST);
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


			$fields = array($no++);
			$fields[] = $row->nama_biaya . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $row->updated_at . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_biaya="' . $row->id_biaya . '" 
			data-nama_biaya="' . $row->nama_biaya . '" 
			data-status="' . $row->status . '"  	
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" 			data-id_biaya="' . $row->id_biaya . '" 
			data-nama_biaya="' . $row->nama_biaya . '" 
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

		$message = 'Gagal menambahkan Suplier Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;


		$in = array(
			'nama_supplier' => $username,
			'status' => $stat,
			'modified' =>2,
		);

		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if ($status) {
			$this->SuplierModel->tambah($in);
			$status = true;
			$message = 'Berhasil Menambahkan .';
		} else {
			$message = 'Gagal menambahkan data Baru!<br>Silahkan lengkapi data yang diperlukan.';

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

		$message = 'Gagal Update!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($transaksi_ldu_lihat);die();
		$in = array(
			'nama_supplier' => $nama,
			'status' => $stat,
			'modified' => 99,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		// var_dump($in);die();

		if ($status) {
			$this->ProdukModel->editDariTable('supplier', $in, $id_admin, 'id_supplier');
			$message = 'Berhasil Update Data ';
		} else {
			$message = 'Gagal Meng-Update Data! ';
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
		$data = $this->SuplierModel->getById($id_user);
		// var_dump($data);die();
		$status = false;
		$message = 'Gagal menghapus Data!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Data yang dimaksud.';
		} else {
			$this->ProdukModel->hapusDariTable('supplier', $id_user,'id_supplier');
			$status = true;
			$message = 'Berhasil menghapus Dara: <b>' . $data[0]->nama_supplier . '</b>';
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}

        
}
        
    /* End of file  produk.php */
        
                            