<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Data_model');
		$this->load->library('grocery_CRUD');
		if(!$this->session->has_userdata('nama')){
			echo "<script>alert('Kamu harus login!');window.location.href = '".base_url("login")."';</script>";
		}
	}
	public function index()
	{
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('layout/menu');
		$this->load->view('dash');
		$this->load->view('layout/js2');

	}
	public function daftar_service()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('daftar_service');
			//$crud->where('status','1');
			$crud->columns('no_polisi','nama_pemilik','kendaraan','keluhan','tgl_daftar','status');
			$crud->required_fields('no_polisi','nama_pemilik','kendaraan','keluhan','tgl_daftar');
			$crud->fields('no_polisi','nama_pemilik','kendaraan','keluhan','tgl_daftar');
			$crud->set_subject('Daftar Service');

			$output = $crud->render();
			$data = array(
                    'title' => "Daftar Service",
                    'output' => $output,
                );
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('content', $data);
			$this->load->view('layout/js');
	}
	public function gudang()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('flexigrid');
			$crud->set_table('gudang');
			$crud->set_subject('Data Gudang');
			$crud->callback_before_insert(array($this,'gudang_id'));

			$output = $crud->render();
			$data = array(
                    'title' => "Data Gudang",
                    'output' => $output,
                );
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('content', $data);
			$this->load->view('layout/js');
	}
	public function gudang_id($post_array) {
		$post_array['kode_gudang'] = $this->session->userdata('kode_gudang');	 
		return $post_array;
	} 
	public function transaksi()
	{
			$data['pelanggan'] = $this->Data_model->get_all_pelanggan();
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('list_data', $data);
			$this->load->view('layout/js2');
	}
	public function get_barang($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->get('gudang');

	}
	public function tambah_transaksi($no_daftar)
	{
			$num = $this->input->post('itemCount');
			for($i=0;$i<=$num;$i++) {

				$nama = $this->input->post('item_name_'.$i);
				list($jasa, $nama_barang) = explode(",", $nama);
				if(count($nama_barang) <> 0){
					$data = array(
						"no_pendaftaran" => $no_daftar,
						"tgl_service" => date('Y-m-d'),
						"montir" => $this->session->userdata('nama'),
						"storename" => $this->input->post('storename'),
						"cartid" => $this->input->post('cartid'),
						"jumlah" => $this->input->post('item_quantity_'.$i),
						"harga" => $this->input->post('item_price_'.$i),
						"barang" => $nama_barang,
						"jasa" => $jasa,
					);
					$insert = $this->Data_model->insert_data($data);
				}
			}
			if($insert)
			{
				$this->Data_model->update_status($no_daftar);
				echo "<script>alert('Berhasil memproses transaksi!');window.location.href = '".base_url("dataTransaksi")."';</script>";
				redirect('dataTransaksi');
			}else{					
				echo "<script>alert('Gagal menyimpan transaksi!');window.location.href = '".base_url("dataTransaksi")."';</script>";
			}
	}
	public function pelanggan($id_daftar)
	{
			$data['pelanggan'] = $this->Data_model->get_pelanggan(rawurldecode($id_daftar));
			$data['barang'] = $this->Data_model->get_barang();
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('montir_trans', $data);
			$this->load->view('layout/js2');
	}
	public function user()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('user');
			$crud->set_subject('Data User');

			$output = $crud->render();
			$data = array(
                    'title' => "Data User",
                    'output' => $output,
                );
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('content', $data);
			$this->load->view('layout/js');
	}
	public function data_faktur()
	{
			$data['pelanggan'] = $this->Data_model->get_pelanggan_service();
			$data['func'] = $this;

			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('list_transaksi', $data);
			$this->load->view('layout/js2');
	}
	public function cetak_faktur($no_daftar)
	{
			$data['pelanggan'] = $this->Data_model->get_faktur($no_daftar);
			$data['func'] = $this;

			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('faktur', $data);
			$this->load->view('layout/js2');
	}
	public function get_transaksi($no_daftar)
	{
		$this->db->where('no_pendaftaran', $no_daftar);
		return $this->db->get('transaksi');
	}
	public function get_total_transaksi($no_daftar)
	{
		$this->db->select('SUM(harga) as harga');
		$this->db->where('no_pendaftaran', $no_daftar);
		return $this->db->get('transaksi')->row('harga');
	}
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */
