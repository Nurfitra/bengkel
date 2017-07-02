<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function get_all_pelanggan()
	{	
		$this->db->where('status','1');
		return $this->db->get('daftar_service');
	}
	public function get_jasa()
	{	
		return $this->db->get('jasa');
	}
	public function get_pelanggan_service()
	{	
		$this->db->where('status','2');
		return $this->db->get('daftar_service');
	}
	public function get_pelanggan($value='')
	{
		$this->db->where('no_polisi', $value);
		return $this->db->get('daftar_service');		
	}
	public function get_barang($value='')
	{
		$this->db->where('stok >', '0');
		return $this->db->get('gudang');		
	}
	public function cek_user($u, $p)
	{
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		return $this->db->get('user');
	}
	public function insert_data($data)
	{
		return $this->db->insert('transaksi', $data);
	}
	public function update_data($nama_barang, $jumlah)
	{
		$this->db->where('nama_barang', $nama_barang);
		return $this->db->update('gudang', array('stok' => '$jumlah'));
	}
	public function update_status($no_daftar, $status)
	{
		$this->db->where('no_pendaftaran', $no_daftar);
		return $this->db->update('daftar_service', array('status' => $status));
	}
	public function get_faktur($no_daftar)
	{
		$this->db->where('daftar_service.no_pendaftaran', $no_daftar);
		$this->db->join('daftar_service','transaksi.no_pendaftaran = daftar_service.no_pendaftaran');
		return $this->db->get('transaksi');
	}

}
