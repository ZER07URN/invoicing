<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kendaraan extends CI_Controller {
  public function __construct()
	{

		parent::__construct();

		$this->load->model('KendaraanModel');
		$this->load->model('ProdukModel');
		$this->load->model('AdminModel');
		$this->load->model('HistoriModel');
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
	public function index()
	{
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		// var_dump($id_admin);die;
		$r = $this->AdminModel->getRole($id_admin, 'kendaraan_r')->r;
		$c = $this->AdminModel->getRole($id_admin, 'kendaraan_c')->r;
		$u = $this->AdminModel->getRole($id_admin, 'kendaraan_u')->r;
		$d = $this->AdminModel->getRole($id_admin, 'kendaraan_d')->r;


		if ($r == '1' || $c == '1' || $u == '1' || $d == '1') {
			$data['content'] = 'master_kendaraan';

			$this->load->view('templates/index', $data);
		} else {
			redirect('Landing');
			// die;
		}
		// $this->load->view('templates/header');     
	}
	public function getAllProduk()
	{
		
		$id_admin = $this->session->userdata('id_admin');

		$kr = $this->AdminModel->getRole($id_admin, 'kendaraan_r')->r;
		$kc = $this->AdminModel->getRole($id_admin, 'kendaraan_c')->r;
		$ku = $this->AdminModel->getRole($id_admin, 'kendaraan_u')->r;
		$kd = $this->AdminModel->getRole($id_admin, 'kendaraan_d')->r;
		

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

			// var_dump($row);die;
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
			$format = date('d/m/Y h:m:s', strtotime($row->updated));

			$fields = array($no++);
			$fields[] = $row->nama_kendaraan . '<br>';
			$fields[] = $jenis . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $format. '<br>';
			$fields[] = $row->nama_admin . '<br>';
			
			if ($ku == 1 and $kd == 1){
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_kendaraan="' . $row->id_kendaraan . '" 
			data-nama_kendaraan="' . $row->nama_kendaraan . '" 
			data-status="' . $row->status . '"  	data-jenis="' . $row->jenis . '"  		
			></i> Ubah</button>

        	<button class="btn btn-round btn-danger hapus" data-nama_kendaraan="' . $row->nama_kendaraan . '" data-id_kendaraan="' . $row->id_kendaraan . '"
			   >Hapus</button>   ';
			} else if ($ku == 0 and $kd == 1) {
				$fields[] = '
        		<button class="btn btn-round btn-danger hapus" data-nama_kendaraan="' . $row->nama_kendaraan . '" data-id_kendaraan="' . $row->id_kendaraan . '"
			   >Hapus</button>   ';
			}
			if ($ku == 1 and $kd == 0) {
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_kendaraan="' . $row->id_kendaraan . '" 
			data-nama_kendaraan="' . $row->nama_kendaraan . '" 
			data-status="' . $row->status . '"  	data-jenis="' . $row->jenis . '"  		
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
		$jenis = $this->input->post('jenis', TRUE);

		$message = 'Gagal menambahkan Produk Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;


		$in = array(
			'nama_kendaraan' => $username,
			'status' => $stat,
			'jenis' => $jenis,
			'updated' => date('Y-m-d H:i:s'),
			'updatedby' => $id_userReal,
		);

		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if ($status) {
			$this->KendaraanModel->tambah_admin($in);
			$status = true;
			$message = 'Berhasil Menambahkan Produk.';

			$created = date('Y-m-d H:i:s');
			$desk = 'Tambah Kendaraan  : ' . $username;
			$namaLog = 'Tambah Kendaraan';
			$this->HistoriModel->log($id_userReal, $namaLog, $desk, $created);

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

		$id_userReal = $_SESSION['id_admin'];
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
			'updatedby' => $id_userReal,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		// var_dump($in);die();

		if ($status) {
			$this->KendaraanModel->editDariTable('kendaraan', $in, $id_admin,'id_kendaraan');
			$message = 'Berhasil Update Produk ';

			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Edit  Kendaraan  : ' . $nama;
			$namaLog = 'Edit  Kendaraan';
			$this->HistoriModel->log($id_userReal, $namaLog, $desk, $created);
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
		$data = $this->KendaraanModel->getById($id_user);
		// var_dump($data);die();
		$status = false;
		$message = 'Gagal menghapus Kendaraan!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Kendaraan yang dimaksud.';
		} else {
			$this->ProdukModel->hapusDariTable('kendaraan', $id_user,'id_kendaraan');
			$status = true;
			$message = 'Berhasil menghapus Kendaraan: <b>' . $data[0]->nama_kendaraan . '</b>';

			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Hapus  Kendaraan  : ' . $data[0]->nama_kendaraan;
			$namaLog = 'Hapus  Kendaraan';
			$this->HistoriModel->log($id_userReal, $namaLog, $desk, $created);
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}

        
}
        
    /* End of file  produk.php */
        
                            