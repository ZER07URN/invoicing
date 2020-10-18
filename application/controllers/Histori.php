<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Histori extends CI_Controller {

 public function __construct()
	{

		parent::__construct();

		$this->load->model('ProdukModel');
		$this->load->model('AdminModel');
		$this->load->model('HistoriModel');
	}
	public function index()
	{
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		// var_dump($id_admin);die;
		$r = $this->AdminModel->getRole($id_admin, 'histori_r')->r;


		if ($r == '1') {
			$data['content'] = 'master_histori';

			$this->load->view('templates/index', $data);
		} else {
			redirect('Landing');
			// die;
		}

		// $this->load->view('templates/header');     
	}
	public function getAllProduk()
	{
		$dt = $this->HistoriModel->data_AllProduk($_POST);
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
            


			$fields = array($no++);
			$fields[] = $row->created . '<br>';
			$fields[] = $row->nama_admin . '<br>';
			$fields[] = $row->nama_histori . '<br>';
			$fields[] = $row->deskripsi . '<br>';
            $datatable['data'][] = $fields;
            

		}



		echo json_encode($datatable);

		exit();
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
        
    /* End of file  Landing.php */
        
                            