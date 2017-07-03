<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['daftarService'] = 'master/daftar_service';
$route['dataGudang'] = 'master/gudang';
$route['dataPengguna'] = 'master/user';
$route['dataTransaksi'] = 'master/transaksi';
$route['dashboard'] = 'master/index';
$route['faktur'] = 'master/data_faktur';
$route['pesanBarang'] = 'master/pesan_barang';
$route['pemesananBarang'] = 'master/pemesanan_barang';
$route['Pembelian'] = 'master/pembelian';
$route['jenisJasa'] = 'master/jasa';
$route['lunas/(:num)'] = 'master/lunas/$1';
$route['cetakFaktur/(:num)'] = 'master/cetak_faktur/$1';

$route['daftarService/(:any)'] = 'master/daftar_service/$1';
$route['dataGudang/(:any)'] = 'master/gudang/$1';
$route['dataPengguna/(:any)'] = 'master/user/$1';
$route['dataTransaksi/(:any)'] = 'master/transaksi/$1';
$route['pemesananBarang/(:any)'] = 'master/pemesanan_barang/$1';
$route['pelanggan/(:any)'] = 'master/pelanggan/$1';
$route['jenisJasa/(:any)'] = 'master/jasa/$1';
$route['pesanBarang/(:any)'] = 'master/pesan_barang/$1';

$route['daftarService/(:any)/(:num)'] = 'master/daftar_service/$1/$2';
$route['dataGudang/(:any)/(:num)'] = 'master/gudang/$1/$2';
$route['dataPengguna/(:any)/(:num)'] = 'master/user/$1/$2';
$route['pemesananBarang/(:any)/(:num)'] = 'master/pemesanan_barang/$1/$2';
$route['jenisJasa/(:any)/(:num)'] = 'master/jasa/$1/$2';
$route['dataTransaksi'] = 'master/transaksi';
$route['tambahTransaksi/(:num)'] = 'master/tambah_transaksi/$1';
$route['logout'] = 'login/logout';
