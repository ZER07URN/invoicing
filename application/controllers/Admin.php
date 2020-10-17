<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

  public function __construct()

  {

    parent::__construct();

    $this->load->model('AdminModel');

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

		$message = 'Gagal Update!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($transaksi_ldu_lihat);die();
		$in = array(
			'nama_admin' => $nama,
			'password' =>  $password,
			'email' => $email,
			'status' => $stat,
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
        
                            