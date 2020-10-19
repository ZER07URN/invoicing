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
		$this->load->model('AdminModel');
		$this->load->model('HistoriModel');
	}
	public function index()
	{
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		// var_dump($id_admin);die;
		$r = $this->AdminModel->getRole($id_admin, 'biaya_r')->r;
		$c = $this->AdminModel->getRole($id_admin, 'biaya_c')->r;
		$u = $this->AdminModel->getRole($id_admin, 'biaya_u')->r;
		$d = $this->AdminModel->getRole($id_admin, 'biaya_d')->r;


		if ($r == '1' || $c == '1' || $u == '1' || $d == '1') {
			$data['content'] = 'master_biaya';

			$this->load->view('templates/index', $data);
		} else {
			redirect('Landing');
			// die;
		}
		// $this->load->view('templates/header');     
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
			// echo $row->updated_at;
			
			$format = date('d/m/Y h:m:s', strtotime($row->updated_at));
			// echo $format;die;


			if ($row->status == 1) {
				$status = "<span class='btn btn-rounded btn-outline-success px-3 btn-sm'>Aktif</span>";
			} else {
				$status = "<span class='btn btn-rounded btn-outline-warning px-3 btn-sm'>Non Aktiv</span>";
			}


			$fields = array($no++);
			$fields[] = $row->nama_biaya . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $format  . '<br>';
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
			'nama_biaya' => $username,
			'status' => $stat,
			'updated_at' => date('Y-m-d H:i:s'),
		);

		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if ($status) {
			$this->BiayaModel->tambah($in);
			$status = true;
			$message = 'Berhasil Menambahkan .';


			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Tambah Biaya  : ' . $username;
			$namaLog = 'Tambah Biaya';
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
		$id_admin = $this->input->post('id_admin', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$stat = $this->input->post('status', TRUE);

		$message = 'Gagal Update!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($transaksi_ldu_lihat);die();
		$in = array(
			'nama_biaya' => $nama,
			'status' => $stat,
			'updated_at' => date('Y-m-d H:i:s'),
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		// var_dump($in);die();

		if ($status) {
			$this->ProdukModel->editDariTable('biaya_opr', $in, $id_admin, 'id_biaya');
			$message = 'Berhasil Update Data ';

			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Edit  Biaya  : ' . $nama;
			$namaLog = 'Edit Biaya';
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
		$data = $this->BiayaModel->getById($id_user);
		// var_dump($data);die();
		$status = false;
		$message = 'Gagal menghapus Data!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Data yang dimaksud.';
		} else {
			$this->ProdukModel->hapusDariTable('biaya_opr', $id_user,'id_biaya');
			$status = true;
			$message = 'Berhasil menghapus Dara: <b>' . $data[0]->nama_biaya . '</b>';

			$id_userReal = $_SESSION['id_admin'];
			$created = date('Y-m-d H:i:s');
			$desk = 'Hapus  Biaya  : ' . $data[0]->nama_biaya;
			$namaLog = 'Hapus Biaya';
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
        
                            