<html>
	<head>
		<title>Invoice</title>
		<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/style.css">
		</style>
	</head>
	<body>
		<div id="page-wrap">
			<table width="100%">
				<tbody>
					<tr>
						<td width="50%">
							<h1>Management Bengkel</h1> <!-- your logo here -->
						</td>
						<td width="50%">
							<h2>Faktur #<?=$pelanggan->row('cartid');?></h2><br>
							<strong>Nama:</strong> <?=$pelanggan->row('nama_pemilik');?> ( <?=$pelanggan->row('no_polisi');?> )<br>
							<strong>Tanggal:</strong> <?php echo date('d/M/Y');?><br>
							<strong>Nomor Invoice:</strong> <?=$pelanggan->row('cartid');?><br>
							<strong>Montir:</strong> <?=$pelanggan->row('montir');?><br>
							<strong>Kasir:</strong> <?=$this->session->userdata('nama');?><br>
						</td>
					</tr>
				</tbody>
			</table>
			<p>&nbsp;</p>
			<table width="100%" class="outline-table">
				<tbody>
					<tr class="border-bottom border-right center grey">
						<td width="5%"><strong>No.</strong></td>
						<td width="25%"><strong>Jenis Jasa</strong></td>
						<td width="30%"><strong>Barang</strong></td>
						<td width="10%"><strong>Jumlah</strong></td>
						<td width="30%"><strong>Harga</strong></td>
					</tr>
					<?php $no=1; foreach($pelanggan->result() as $row){ ?>
					<tr class="border-bottom border-right center">
						<td class="pad-left"><?=$no;?></td>
						<td class="pad-left"><?=$row->jasa;?></td>
						<td class="pad-left"><?=$row->barang;?></td>
						<td class="right border-top"><?=$row->jumlah;?></td>
						<td class="right border-top">Rp. <?=$row->harga;?></td>
					</tr>
					<?php $no++; } ?>
					<tr class="border-bottom border-right center grey">
						<th width="65%" colspan="4" style="text-align: center;">
							Total
						</th>
						<th width="35%">
							Rp. <?=$func->get_total_transaksi($row->no_pendaftaran);?>
						</th>
					</tr>
				</tbody>
			</table>
			
			<table width="auto">
				<tr class="border-right center lunas">
					<td width="100%"><strong><h1 class="lunas">LUNAS</h1></strong></td>
				</tr>
			</table>
		</div>
	</body>
</html>