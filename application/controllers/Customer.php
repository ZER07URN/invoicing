<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Customer extends CI_Controller {
  public function __construct()
	{

		parent::__construct();

		$this->load->model('ProdukModel');
		$this->load->model('CustomerModel');
		$this->load->model('AdminModel');
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
		$r = $this->AdminModel->getRole($id_admin, 'custumer_r')->r;
		$c = $this->AdminModel->getRole($id_admin, 'custumer_c')->r;
		$u = $this->AdminModel->getRole($id_admin, 'custumer_u')->r;
		$d = $this->AdminModel->getRole($id_admin, 'custumer_d')->r;


		if ($r == '1' || $c == '1' || $u == '1' || $d == '1') {
			$data['content'] = 'master_customer';

			$this->load->view('templates/index', $data);
		} else {
			redirect('Landing');
			// die;
		}
		// $this->load->view('templates/header');     
	
	}
	public function getAll()
	{
		$dt = $this->CustomerModel->data_All($_POST);
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
			$fields[] = $row->nama_custumer . '<br>';
			$fields[] = $row->alamat . '<br>';
			$fields[] = $row->no_telepon . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_custumer="' . $row->id_custumer . '" 
			data-nama_custumer="' . $row->nama_custumer . '" 
			data-status="' . $row->status . '"  			data-no_telepon="' . $row->no_telepon . '"  
			data-alamat="' . $row->alamat . '"  
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-id_custumer="' . $row->id_custumer . '" data-nama_custumer="' . $row->nama_custumer . '"
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
		$no_telepon = $this->input->post('no_telepon', TRUE);
		$alamat = $this->input->post('alamat', TRUE);

		$message = 'Gagal menambahkan Customer Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;


		$in = array(
			'nama_custumer' => $username,
			'status' => $stat,
			'alamat' => $alamat,
			'no_telepon' => $no_telepon,
		);

		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if ($status) {
			$this->CustomerModel->tambah($in);
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
		$alamat = $this->input->post('alamat', TRUE);
		$no_telepon = $this->input->post('no_telepon', TRUE);

		$message = 'Gagal Update!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($transaksi_ldu_lihat);die();
		$in = array(
			'nama_custumer' => $nama,
			'status' => $stat,
			'no_telepon' => $no_telepon,
			'alamat' => $alamat,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		// var_dump($in);die();

		if ($status) {
			$this->ProdukModel->editDariTable('custumer', $in, $id_admin, 'id_custumer');
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
		$data = $this->CustomerModel->getById($id_user);
		// var_dump($data);die();
		$status = false;
		$message = 'Gagal menghapus Data!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Data yang dimaksud.';
		} else {
			$this->ProdukModel->hapusDariTable('custumer', $id_user,'id_custumer');
			$status = true;
			$message = 'Berhasil menghapus Dara: <b>' . $data[0]->nama_custumer . '</b>';
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}

        
}
        
    /* End of file  produk.php */
        
                            