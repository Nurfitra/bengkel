<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Daftar Pelanggan
    <small>it all starts here</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
  <?php foreach($pelanggan->result() as $row){ ?>

    <div class="info-box bg-yellow" style="cursor:pointer" onclick="location.href='<?=base_url('pelanggan/'.rawurlencode($row->no_polisi));?>'">
      <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-number"><?=$row->nama_pemilik;?> ( <?=$row->kendaraan.' | '.$row->no_polisi;?> )</span>
        <span class="info-box-text">Keluhan : <?=$row->keluhan;?></span>
        <span class="progress-description">
          Tanggal Masuk : <?=$row->tgl_daftar;?>
        </span>
      </div>
    </div>
  <?php } ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->