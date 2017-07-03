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
			$crud->order_by('status','asc');
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
			$crud->where('kode_gudang', $this->session->userdata('id_user'));
			$crud->callback_before_insert(array($this,'gudang_id'));
			$crud->callback_before_insert(array($this,'checkDuplicateBarang'));
			$crud->callback_add_field('kode_gudang', function () {
			return '<input type="text" maxlength="50" value="'.$this->session->userdata('id_user').'" name="kode_gudang" readonly>'; 
			});

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
	public function checkDuplicateBarang($post_array) {

	    $this->db->where('nama_barang', $post_array['nama_barang']);

	    $query = $this->db->get('gudang');

	    $count_row = $query->num_rows();

	    if ($count_row > 0) {
	        //return false; // And here False to TRUE
			echo "<textarea>".json_encode(array('success' => true , 'success_message' => 'This participant already exists'))."</textarea>";
			$crud->set_echo_and_die();
	     } else {
	        return TRUE; // And here False to TRUE
	     }
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
	public function cek_stok($nama_barang)
	{
		$this->db->like('nama_barang', $nama_barang);
		return $this->db->get('gudang')->row('stok');
	}
	public function tambah_transaksi($no_daftar)
	{
			$num = $this->input->post('itemCount');
			for($i=0;$i<=$num;$i++) {

				$nama = $this->input->post('item_name_'.$i);
				list($jasa, $nama_barang) = array_pad(explode(",", $nama, 2), 2, null);
				if(count($nama_barang) <> 0){
					$data = array(
						"no_pendaftaran" => $no_daftar,
						"tgl_service" => date('Y-m-d'),
						"montir" => $this->session->userdata('nama'),
						"storename" => $this->input->post('storename'),
						"jumlah" => $this->input->post('item_quantity_'.$i),
						"harga" => $this->input->post('item_price_'.$i),
						"barang" => $nama_barang,
						"jasa" => $jasa,
					);
					$this->Data_model->update_data($nama, $this->input->post('item_quantity_'.$i));
					//echo $stok;
					//$total = $cek - $this->input->post('item_quantity_'.$i);
					$insert = $this->Data_model->insert_data($data);
				}
			}
			if($insert)
			{
				$this->Data_model->update_status($no_daftar, '2');
				//echo "<script>alert('Berhasil memproses transaksi!');window.location.href = '".base_url("dataTransaksi")."';</script>";
				//redirect('dataTransaksi');
			}else{					
				echo "<script>alert('Gagal menyimpan transaksi!');window.location.href = '".base_url("dataTransaksi")."';</script>";
			}
	}
	public function pelanggan($id_daftar)
	{
			$data['pelanggan'] = $this->Data_model->get_pelanggan(rawurldecode($id_daftar));
			$data['barang'] = $this->Data_model->get_barang();
			$data['jasa'] = $this->Data_model->get_jasa();
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('montir_trans', $data);
			$this->load->view('layout/js2');
	}
	public function pembelian()
	{
			$data['barang'] = $this->Data_model->get_barang();
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('pembelian', $data);
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
	public function jasa()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('jasa');
			$crud->set_subject('Jenis Jasa');

			$output = $crud->render();
			$data = array(
                    'title' => "Jenis Jasa",
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
	public function pdf($no_daftar)
	{
		$this->load->helper(array('dompdf', 'file'));
		$data['pelanggan'] = $this->Data_model->get_faktur($no_daftar);
		$data['func'] = $this;

		// page info here, db calls, etc.     
		$html = $this->load->view('pdf', $data, true);
		pdf_create($html, $no_daftar);
		/*or
		$data = pdf_create($html, '', false);
		write_file('name', $data);*/
		//if you want to write it to disk and/or send it as an attachment    
	}
	public function lunas($no_daftar)
	{
		$lunas = $this->Data_model->update_status($no_daftar, '0');

		if($lunas){
			echo "<script>alert('Berhasil memproses transaksi!');window.location.href = '".base_url("faktur")."';</script>";
			//redirect('faktur');
		}else{
			echo "<script>alert('Gagal memproses transaksi!');window.location.href = '".base_url("cetakFaktur/".$no_daftar)."';</script>";
			//redirect('cetakFaktur/'.$no_daftar);
		}
	}
	public function pesan_barang()
	{
			$data['pesanan'] = $this->Data_model->get_pesanan($this->session->userdata('nama'));
			$data['pesanan_masuk'] = $this->Data_model->pesanan_masuk($this->session->userdata('id_user'));

			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('pesan_barang', $data);
			$this->load->view('layout/js2');
	}
	public function pemesanan_barang()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('pesan_barang');
			$crud->set_subject('Pesan Barang');
			$crud->set_relation('nama_barang','gudang','nama_barang');
			$crud->fields('gudang','nama_barang','qty','tgl','pemesan');
			$crud->set_relation('gudang','user','username', array('role' => '2'));
			$crud->callback_add_field('pemesan', function () {
			return '<input type="text" maxlength="50" value="'.$this->session->userdata('nama').'" name="pemesan" readonly>'; 
			});
			$output = $crud->render();
			$data = array(
                    'title' => "<button class='btn btn-default btn-xs' onclick='location.href=\"".base_url('pesanBarang')."\"'><<</button> Pesan Barang",
                    'output' => $output,
                );
			$this->load->view('layout/head');
			$this->load->view('layout/nav');
			$this->load->view('layout/menu');
			$this->load->view('content', $data);
			$this->load->view('layout/js');
	}
	public function pemesanan_status($id)
	{
		$status = $this->input->get('aksi');
		$update = $this->Data_model->pemesanan_status($id, $status);
		if($update)
		{
			echo "<script>alert('Berhasil memproses transaksi!');window.location.href = '".base_url("pesanBarang")."';</script>";
		}else{
			echo "<script>alert('Gagal memproses transaksi!');window.location.href = '".base_url("pesanBarang")."';</script>";
		}
	}
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */
