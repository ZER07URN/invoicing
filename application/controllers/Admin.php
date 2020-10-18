<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

  public function __construct()

  {

    parent::__construct();

    $this->load->model('AdminModel');
	$this->load->model('ProdukModel');

  }

public function index()
{
		// $this->load->view('templates/header');     
		$data['content'] = 'master_admin';

		$this->load->view('templates/index',$data);     
}
public function tambah_admin()
{
	$username = $this->input->post('nama', TRUE);
    $password = $this->input->post('password', TRUE);
    $email = $this->input->post('email', TRUE);
	$stat = $this->input->post('status', TRUE);
		$admin_r = ($this->input->post('admin_r', TRUE) == "true") ? 1 : 0;
		$admin_c = ($this->input->post('admin_c', TRUE) == "true") ? 1 : 0;
		$admin_u = ($this->input->post('admin_u', TRUE) == "true") ? 1 : 0;
		$admin_d = ($this->input->post('admin_d', TRUE) == "true") ? 1 : 0;

		$suplier_r = ($this->input->post('suplier_r', TRUE) == "true") ? 1 : 0;
		$suplier_c = ($this->input->post('suplier_c', TRUE) == "true") ? 1 : 0;
		$suplier_u = ($this->input->post('suplier_u', TRUE) == "true") ? 1 : 0;
		$suplier_d = ($this->input->post('suplier_d', TRUE) == "true") ? 1 : 0;

		$produk_r = ($this->input->post('produk_r', TRUE) == "true") ? 1 : 0;
		$produk_c = ($this->input->post('produk_c', TRUE) == "true") ? 1 : 0;
		$produk_u = ($this->input->post('produk_u', TRUE) == "true") ? 1 : 0;
		$produk_d = ($this->input->post('produk_d', TRUE) == "true") ? 1 : 0;

		$kendaraan_r = ($this->input->post('kendaraan_r', TRUE) == "true") ? 1 : 0;
		$kendaraan_c = ($this->input->post('kendaraan_c', TRUE) == "true") ? 1 : 0;
		$kendaraan_u = ($this->input->post('kendaraan_u', TRUE) == "true") ? 1 : 0;
		$kendaraan_d = ($this->input->post('kendaraan_d', TRUE) == "true") ? 1 : 0;

		$custumer_r = ($this->input->post('custumer_r', TRUE) == "true") ? 1 : 0;
		$custumer_c = ($this->input->post('custumer_c', TRUE) == "true") ? 1 : 0;
		$custumer_u = ($this->input->post('custumer_u', TRUE) == "true") ? 1 : 0;
		$custumer_d = ($this->input->post('custumer_d', TRUE) == "true") ? 1 : 0;

		$biaya_r = ($this->input->post('biaya_r', TRUE) == "true") ? 1 : 0;
		$biaya_c = ($this->input->post('biaya_c', TRUE) == "true") ? 1 : 0;
		$biaya_u = ($this->input->post('biaya_u', TRUE) == "true") ? 1 : 0;
		$biaya_d = ($this->input->post('biaya_d', TRUE) == "true") ? 1 : 0;

		$histori_r = ($this->input->post('histori_r', TRUE) == "true") ? 1 : 0;
		


	
    $message = 'Gagal menambahkan Admin Baru!<br>Silahkan lengkapi data yang diperlukan.';
    $errorInputs = array();
	$status = true;	


    $in = array(
      'nama_admin' => $username,
      'status' => $stat,
      'password' =>   $this->bizEncrypt($password),
	  'email' => $email,
	   'created' => date('Y-m-d H:i:s'),
	);

	
    if (empty($username)) {
      $status = false;
      $errorInputs[] = array('#username', 'Silahkan pilih username');
    }
    if (empty($password)) {
      $status = false;
      $errorInputs[] = array('#password', 'Silahkan Masukan Password');
	}
	if ($status) {
		$this->AdminModel->tambah_admin($in);
			$id_admin = $this->AdminModel->get_last_id()->last_id;
			$in_role = array(
				'id_user' => $id_admin,
				'admin_r' => $admin_r,
				'admin_c' => $admin_c,
				'admin_u' => $admin_u,
				'admin_d' => $admin_d,

				'supplier_r' => $suplier_r,
				'supplier_c' => $suplier_c,
				'supplier_u' => $suplier_u,
				'supplier_d' => $suplier_d,

				'produk_r' => $produk_r,
				'produk_c' => $produk_c,
				'produk_u' => $produk_u,
				'produk_d' => $produk_d,

				'kendaraan_r' => $kendaraan_r,
				'kendaraan_c' => $kendaraan_c,
				'kendaraan_u' => $kendaraan_u,
				'kendaraan_d' => $kendaraan_d,

				'custumer_r' => $custumer_r,
				'custumer_c' => $custumer_c,
				'custumer_u' => $custumer_u,
				'custumer_d' => $custumer_d,

				'biaya_r' => $biaya_r,
				'biaya_c' => $biaya_c,
				'biaya_u' => $biaya_u,
				'biaya_d' => $biaya_d,
				'histori_r' => $histori_r,
			);
		$this->AdminModel->tambah_admin_role($in_role);
		 $status = true;
    	$message = 'Berhasil Menambahkan Admin.';
		 

      } else {
		$message = 'Gagal menambahkan Admin Baru!<br>Silahkan lengkapi data yang diperlukan.';

		$message = 'Gagal ';
    	$status = false;
		
    }



    echo json_encode(array(
      'status' => $status,
      'message' => $message,
      'errorInputs' => $errorInputs
    ));

}
public function getAllProduk()
{
		$dt = $this->AdminModel->data_AllAdmin($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status="";
		foreach ($dt['data']->result() as $row) {
			if($row->status==1){
				$status = "<span class='btn btn-rounded btn-outline-success px-3 btn-sm'>Aktif</span>";
			}else{
				$status = "<span class='btn btn-rounded btn-outline-warning px-3 btn-sm'>Non Aktiv</span>";
			}


			$fields = array($no++);
			$fields[] = $row->nama_admin . '<br>';
			$fields[] = $row->email . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $row->created . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target="#modal" 
			data-id_user="' . $row->id_user . '" 
			data-nama_admin="' . $row->nama_admin . '" 
			data-email="' . $row->email . '" 
			data-status="' . $row->status . '" 
			data-created="' . $row->created . '" 
			data-password="' . $this->bizDecrypt($row->password) . '" 		
			data-admin_r="' . $row->admin_r . '" data-admin_c="' . $row->admin_c . '" data-admin_u="' . $row->admin_u . '" data-admin_d="' . $row->admin_d . '" 
			
			data-suplier_r="' . $row->supplier_r . '" data-suplier_c="' . $row->supplier_c . '" data-suplier_u="' . $row->supplier_u . '" data-suplier_d="' . $row->supplier_d . '" 


			data-produk_r="' . $row->produk_r . '" 
			data-produk_c="' . $row->produk_c . '" 
				data-produk_u="' . $row->produk_u . '" 	data-produk_d="' . $row->produk_d . '" 	data-kendaraan_r="' . $row->kendaraan_r . '" 	data-kendaraan_c="' . $row->kendaraan_c . '" 	data-kendaraan_u="' . $row->kendaraan_u . '" 	data-kendaraan_d="' . $row->kendaraan_d . '" 

				data-histori_r="' . $row->histori_r . '" 	data-histori_c="' . $row->histori_c . '" 		data-histori_u="' . $row->histori_u . '" 	data-histori_d="' . $row->histori_d . '" 

				data-custumer_r="' . $row->custumer_r . '" 	data-custumer_c="' . $row->custumer_c . '" 		data-custumer_u="' . $row->custumer_u . '" 	data-custumer_d="' . $row->custumer_d . '" 

				data-biaya_r="' . $row->biaya_r . '" 	data-biaya_c="' . $row->biaya_c . '" 		data-biaya_u="' . $row->biaya_u . '" 	data-biaya_d="' . $row->biaya_d . '" 


			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-id_user="' . $row->id_user . '" data-nama_admin="' . $row->nama_admin . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
}

public function edit_admin()
{
	// var_dump($_POST);die;
		$id_admin = $this->input->post('id_admin', TRUE);	
		$password = $this->input->post('password', TRUE);
		$email = $this->input->post('email', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$stat = $this->input->post('status', TRUE);

		$admin_r = ($this->input->post('admin_r', TRUE) == "true") ? 1 : 0;
		$admin_c = ($this->input->post('admin_c', TRUE) == "true") ? 1 : 0;
		$admin_u = ($this->input->post('admin_u', TRUE) == "true") ? 1 : 0;
		$admin_d = ($this->input->post('admin_d', TRUE) == "true") ? 1 : 0;

		$suplier_r = ($this->input->post('suplier_r', TRUE) == "true") ? 1 : 0;
		$suplier_c = ($this->input->post('suplier_c', TRUE) == "true") ? 1 : 0;
		$suplier_u = ($this->input->post('suplier_u', TRUE) == "true") ? 1 : 0;
		$suplier_d = ($this->input->post('suplier_d', TRUE) == "true") ? 1 : 0;

		$produk_r = ($this->input->post('produk_r', TRUE) == "true") ? 1 : 0;
		$produk_c = ($this->input->post('produk_c', TRUE) == "true") ? 1 : 0;
		$produk_u = ($this->input->post('produk_u', TRUE) == "true") ? 1 : 0;
		$produk_d = ($this->input->post('produk_d', TRUE) == "true") ? 1 : 0;
			
		$kendaraan_r = ($this->input->post('kendaraan_r', TRUE) == "true") ? 1 : 0;
		$kendaraan_c = ($this->input->post('kendaraan_c', TRUE) == "true") ? 1 : 0;
		$kendaraan_u = ($this->input->post('kendaraan_u', TRUE) == "true") ? 1 : 0;
		$kendaraan_d = ($this->input->post('kendaraan_d', TRUE) == "true") ? 1 : 0;

		$custumer_r = ($this->input->post('custumer_r', TRUE) == "true") ? 1 : 0;
		$custumer_c = ($this->input->post('custumer_c', TRUE) == "true") ? 1 : 0;
		$custumer_u = ($this->input->post('custumer_u', TRUE) == "true") ? 1 : 0;
		$custumer_d = ($this->input->post('custumer_d', TRUE) == "true") ? 1 : 0;

		$biaya_r = ($this->input->post('biaya_r', TRUE) == "true") ? 1 : 0;
		$biaya_c = ($this->input->post('biaya_c', TRUE) == "true") ? 1 : 0;
		$biaya_u = ($this->input->post('biaya_u', TRUE) == "true") ? 1 : 0;
		$biaya_d = ($this->input->post('biaya_d', TRUE) == "true") ? 1 : 0;

		$histori_r = ($this->input->post('histori_r', TRUE) == "true") ? 1 : 0;
		





		$message = 'Gagal Update!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($transaksi_ldu_lihat);die();
		$in = array(
			'nama_admin' => $nama,
			'password' =>
			$this->bizEncrypt($password),
			'email' => $email,
			'status' => $stat,
		);
		$in_role = array(
			'admin_r' => $admin_r,
			'admin_c' => $admin_c,
			'admin_u' => $admin_u,
			'admin_d' => $admin_d,

			'supplier_r' => $suplier_r,
			'supplier_c' => $suplier_c,
			'supplier_u' => $suplier_u,
			'supplier_d' => $suplier_d,

			'produk_r' => $produk_r,
			'produk_c' => $produk_c,
			'produk_u' => $produk_u,
			'produk_d' => $produk_d,

			'kendaraan_r' => $kendaraan_r,
			'kendaraan_c' => $kendaraan_c,
			'kendaraan_u' => $kendaraan_u,
			'kendaraan_d' => $kendaraan_d,

			'custumer_r' => $custumer_r,
			'custumer_c' => $custumer_c,
			'custumer_u' => $custumer_u,
			'custumer_d' => $custumer_d,

			'biaya_r' => $biaya_r,
			'biaya_c' => $biaya_c,
			'biaya_u' => $biaya_u,
			'biaya_d' => $biaya_d,
			'histori_r' => $histori_r,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih username');
		}
		if (empty($password)) {
			$status = false;
			$errorInputs[] = array('#password', 'Silahkan Masukan Password');
		}
		// var_dump($in);die();

		if ($status) {
			$this->AdminModel->editDariTable('user',$in, $id_admin);		
			$message = 'Berhasil Update Admin ';
			$this->ProdukModel->editDariTable('user_role', $in_role, $id_admin,'id_user');	
				} 
		 else {
			$message = 'Gagal Meng-Update Admin! ';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
}

public function hapusAdmin()
{
	
		$id_user = $this->input->post('id_user', true);
		$data = $this->AdminModel->getAdminById($id_user);
		// var_dump($data);die();
		$status = false;
		$message = 'Gagal menghapus Admin!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat admin yang dimaksud.';
		} else {
			$this->AdminModel->hapusDariTable('user',$id_user);			
				$status = true;
				$message = 'Berhasil menghapus Admin: <b>' . $data[0]->nama_admin . '</b>';

		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
}

	public function bizEncrypt($plaintext)
	{
		$tahun = date('Y');
		$bulan = date('m');
		$hari = date('d');
		$jam = date('H');
		$menit = date('i');
		$detik = date('s');
		$pool = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_+&';

		$word1 = '';
		for ($i = 0; $i < 4; $i++) {
			$word1 .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
		}

		$plain = $hari . $bulan . $tahun . $word1 . base64_encode(base64_encode($plaintext)) . $detik . $menit . $jam;
		$enc = base64_encode($plain);
		return $enc;
	}

	public function bizDecrypt($enc)
	{
		$dec64 = base64_decode($enc);
		$substr1 = substr($dec64, 12, strlen($dec64) - 12);
		$substr2 = substr($substr1, 0, strlen($substr1) - 6);
		$dec = base64_decode(base64_decode($substr2));
		return $dec;
	}
	public function passwordMatch($plain_password, $encrypted)
	{
		return $plain_password == $this->bizDecrypt($encrypted);
	}


        
}
        
    /* End of file  admin.php */
        
                            