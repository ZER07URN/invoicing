<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Landing extends CI_Controller {

public function index()
{
		// var_dump($this->input->ip_address());die;


		$data['content'] = 'landing';

		$this->load->view('templates/index', $data);
}
        
}
        
    /* End of file  Landing.php */
        
                            