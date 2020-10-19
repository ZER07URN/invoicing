<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {
	public function __construct()

	{

		parent::__construct();

		$this->load->model('AdminModel');
		$this->load->model('HistoriModel');
	}
	public function buat_captcha()
	{
		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url() . 'captcha/',
			'font_path' => './font/timesbd.ttf',
			'img_width' => '150',
			'img_height' => 50,
			'word_length'   => 3,
			'pool'          => '0123456789',
			'font_size'     => 19,
			'expiration' => 60,     
			   'colors'        => array(
				'background' => array(255, 255, 255),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(255, 40, 40)
			)
		);
		$cap = create_captcha($vals);
		return $cap;
	}
	
public function index()
{
		// $this->load->view('templates/header');    
		$cap = $this->buat_captcha();
		$data['captcha'] = $this->buat_captcha();
		// var_dump($cap);die;
		// $data['cap_img'] = $cap['image']; 
		$data['content'] = 'login';

		$this->load->view('templates/indexLogin', $data);      
}
	public function passwordMatch($plain_password, $encrypted)

	{

		return $plain_password == $this->bizDecrypt($encrypted);
	}
	public function bizDecrypt($enc)

	{

		$dec64 = base64_decode($enc);

		$substr1 = substr($dec64, 12, strlen($dec64) - 12);

		$substr2 = substr($substr1, 0, strlen($substr1) - 6);

		$dec = base64_decode(base64_decode($substr2));

		return $dec;
	}


	public function login_proses()
	{
		// var_dump($_POST);die;
		$this->load->library('form_validation');
		$username = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$captcha = $this->input->post('captcha', true);
		$code = $this->input->post('code', true);
		
		$data = $this->AdminModel->login($username);
		$status = false;
		$message = 'Email tidak ditemukan!';
		// var_dump($data->num_rows());die;
		if($code != $captcha){
			$message = 'Captcha Tidak Sama!';
			$status = false;
		}else{

		
		if ($data->num_rows() == 1) {
			$r = $data->row();
			// var_dump($r->status==0);die;
			if($r->status==0){

				$message = 'Admin Tidak Aktiv, Mohon hubungi Super Admin!';
				$status = false;
			}else{
				if ($this->passwordMatch($password, $r->password)) {
					$session = array(
						'admin_session' => true, 
						'id_admin' => $r->id_user,
						'nama' => $r->nama_admin, 
					);
					$this->session->set_userdata($session); // Buat session sesuai $session
					// Hapus Session kode captcha
					$status = true;
					$message = 'Selamat datang ' . $r->nama_admin . ', sedang mengalihkan..';

					//Log histori
					$desk = 'Login  ' ;
					$namaLog = 'Login';
					$this->HistoriModel->log($r->id_user, $namaLog, $desk);

				} else {
					$message = 'Username & password tidak cocok!';
				}
			}
			} else {
				$message = 'Username & password tidak cocok!';
			}
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
        
}
        
    /* End of file  Login.php */
        
                            