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
      'password' =>   md5($password),
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

			$fields = array($no++);
			$fields[] = $row->nama_admin . '<br>';
			$fields[] = $row->email . '<br>';
			$fields[] = $row->status . '<br>';
			$fields[] = $row->created . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
			data-id_user="' . $row->id_user . '" 
			data-nama_admin="' . $row->nama_admin . '" 
			data-email="' . $row->email . '" 
			data-status="' . $row->status . '" 
			data-created="' . $row->created . '" 
			data-password="' . $row->password . '" 		
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-id_user="' . $row->id_user . '" data-nama_admin="' . $row->nama_admin . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}

        
}
        
    /* End of file  admin.php */
        
                            