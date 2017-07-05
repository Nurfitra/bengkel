<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Daftar Transaksi
    <small>it all starts here</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
  <?php foreach($pelanggan->result() as $row){ ?>

    <div class="info-box bg-green" style="cursor:pointer" onclick="location.href='<?=base_url('cetakFaktur/'.rawurlencode($row->no_pendaftaran));?>'">
      <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-number"><?=$row->nama_pemilik;?> ( <?=$row->kendaraan.' | '.$row->no_polisi;?> ) | Total = Rp. <?=$func->get_total_transaksi($row->no_pendaftaran);?></span>
        <span class="info-box-text">Keluhan : <?=$row->keluhan;?></span>
        <span class="progress-description">
          Tanggal Masuk : <?=$row->tgl_daftar;?> 
          Tanggal Service : <?=$func->get_transaksi($row->no_pendaftaran)->row('tgl_service');?>
        </span>
      </div>
    </div>
  <?php } ?>
  <?php foreach($pembeli->result() as $row){ ?>
    <div class="info-box bg-green" style="cursor:pointer" onclick="location.href='<?=base_url('cetakFakturPembeli/'.rawurlencode($row->no_pendaftaran));?>'">
      <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-number">Pembelian <?php $no=0; foreach($func->get_transaksi($row->no_pendaftaran)->result() as $row){ echo $row->barang; if($func->get_transaksi($row->no_pendaftaran)->num_rows() > 1){ echo", "; } $no++; } ?> </span>
        <span class="progress-description">
          Tanggal Pembelian : <?=$func->get_transaksi($row->no_pendaftaran)->row('tgl_service');?><br/>
          Total Rp. <?=$func->get_total_transaksi($row->no_pendaftaran);?>
        </span>
      </div>
    </div>
  <?php } ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->