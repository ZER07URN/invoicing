<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Suplier extends CI_Controller {
  public function __construct()
	{

		parent::__construct();

		$this->load->model('ProdukModel');
		$this->load->model('CustomerModel');
		$this->load->model('SuplierModel');
		$this->load->model('AdminModel');
		$this->load->model('HistoriModel');
	}
	public function index()
	{
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		// var_dump($id_admin);die;
		$r = $this->AdminModel->getRole($id_admin, 'supplier_r')->r;
		$c = $this->AdminModel->getRole($id_admin, 'supplier_c')->r;
		$u = $this->AdminModel->getRole($id_admin, 'supplier_u')->r;
		$d = $this->AdminModel->getRole($id_admin, 'supplier_d')->r;
		// $this->load->view('templates/header'); 

		if ($r == '1' || $c == '1' || $u == '1' || $d == '1') {
			$data['content'] = 'master_suplier';

			$this->load->view('templates/index', $data);
		} else {
			redirect('Landing');
			// die;
		}    
	}
	public function getAll()
	{
		$id_admin = $this->session->userdata('id_admin');
		$sr = $this->AdminModel->getRole($id_admin, 'supplier_r')->r;
		$sc = $this->AdminModel->getRole($id_admin, 'supplier_c')->r;
		$su = $this->AdminModel->getRole($id_admin, 'supplier_u')->r;
		$sd = $this->AdminModel->getRole($id_admin, 'supplier_d')->r;


		
		$dt = $this->SuplierModel->data_All($_POST);
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
				$sta = "<span class='btn btn-rounded btn-outline-success px-3 btn-sm'>Aktif</span>";
			} else {
				$sta = "<span class='btn btn-rounded btn-outline-warning px-3 btn-sm'>Non Aktiv</span>";
			}


			$fields = array($no++);
			$fields[] = $row->nama_supplier . '<br>';
			$fields[] = $sta . '<br>';
			$fields[] = $row->nama_admin . '<br>';

		if ($su == 1 and $sd == 1) {

			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_supplier="' . $row->id_supplier . '" 
			data-nama_supplier="' . $row->nama_supplier . '" 
			data-status="' . $row->status . '"  	
			></i> Ubah</button>
			<button class="btn btn-round btn-danger hapus" 			data-id_supplier="' . $row->id_supplier . '" 
				data-nama_supplier="' . $row->nama_supplier . '" 
			>Hapus</button>  ';		

			} else if ($su == 0 and $sd == 1) {

			$fields[] = '
			<button class="btn btn-round btn-danger hapus" 			data-id_supplier="' . $row->id_supplier . '" 
			data-nama_supplier="' . $row->nama_supplier . '" 
			>Hapus</button>  ';
			} else  if ($su == 1 and $sd == 0) {

				$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_supplier="' . $row->id_supplier . '" 
			data-nama_supplier="' . $row->nama_supplier . '" 
			data-status="' . $row->status . '"  	
			></i> Ubah</button> ';
			} else {
				$fields[] = '
				<button class="btn btn-round btn-danger" 
				>Tidak Punya Akses!</button>              

				';
			}

			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function tambah()
	{
		$id_userReal = $_SESSION['id_admin'];

		$username = $this->input->post('nama', TRUE);
		$stat = $this->input->post('status', TRUE);

		$message = 'Gagal menambahkan Suplier Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;


		$in = array(
			'nama_supplier' => $username,
			'status' => $stat,
			'modified' =>$id_userReal,
		);

		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if ($status) {
			$this->SuplierModel->tambah($in);
			$status = true;
			$message = 'Berhasil Menambahkan .';

			$created = date('Y-m-d H:i:s');
			$desk = 'Tambah Suplier  Produk  : ' . $username;
			$namaLog = 'Tambah Suplier  Produk';
			$this->HistoriModel->log($id_userReal, $namaLog, $desk, $created);
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

		$id_userReal = $_SESSION['id_admin'];
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
			'modified' => $id_userReal,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		// var_dump($in);die();

		if ($status) {
			$this->ProdukModel->editDariTable('supplier', $in, $id_admin, 'id_supplier');
			$message = 'Berhasil Update Data ';

			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Edit Suplier  Produk  : ' . $nama;
			$namaLog = 'Edit Suplier  Produk';
			$this->HistoriModel->log($id_userReal, $namaLog, $desk, $created);
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

			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Hapus Suplier  Produk  : ' . $data[0]->nama_supplier;
			$namaLog = 'Hapus Suplier  Produk';
			$this->HistoriModel->log($id_userReal, $namaLog, $desk, $created);
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	function cekLogin()
	{
		if (!$this->isLoggedInAdmin()) {
			$this->session->set_flashdata(
				'notifikasi',
				array(
					'alert' => 'alert-danger',
					'message' => 'Silahkan Login terlebih dahulu.',

				)
			);
			redirect('login');
		}
	}
	public function isLoggedInAdmin()
	{
		// Cek apakah terdapat session "admin_session"

		if ($this->session->userdata('admin_session'))
		return true; // sudah login
		else
			return false; // belum login
	}

        
}
        
    /* End of file  produk.php */
        
                            