<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model');
		if($this->session->userdata('role') == 2)
		{				
			redirect('dataGudang');
		}
		else if($this->session->userdata('role') == 3)
		{				
			redirect('dataTransaksi');
		}
		else if($this->session->userdata('role') == 4)
		{				
			redirect('daftarService');
		}else if($this->session->userdata('role') == 1){				
			redirect('dashboard');
		}
	}

	public function index()
	{	
		$this->load->view('login');
	}
	public function cek_login()
	{
		$u = $this->input->post('u');
		$p = $this->input->post('p');
		$cek_login = $this->Data_model->cek_user($u, $p);
		if($cek_login->num_rows() <> 0)
		{
			$this->session->set_userdata('nama', $cek_login->row('nama'));
			$this->session->set_userdata('role', $cek_login->row('role'));
			if($cek_login->row('role') == 2)
			{				
				redirect('dataGudang');
			}
			else if($cek_login->row('role') == 3)
			{				
				redirect('dataTransaksi');
			}
			else if($cek_login->row('role') == 4)
			{				
				redirect('daftarService');
			}else{				
				redirect('dashboard');
			}
		}else{
			echo "<script>alert('Username/Password salah!');window.location.href = '".base_url("login")."';</script>";
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');	
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */