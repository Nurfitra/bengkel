<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Pesan Barang
    <small>it all starts here</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <button class="btn btn-primary" onclick="location.href='<?=base_url('pemesananBarang');?>'">Pemesanan Barang</button><br/><br/>
    
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List Barang Keluar</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <th>
              No.
            </th>
            <th>
              Tanggal
            </th>
            <th>
              Barang
            </th>
            <th>
              Jumlah
            </th>
            <th>
              ID Tujuan
            </th>
            <th>
              Status
            </th>
          </tr>
          <?php $no=1; foreach($pesanan->result() as $row){ ?>
          <tr>
            <td>
              <?=$no;?>
            </td>
            <td>
              <?=$row->tgl;?>
            </td>
            <td>
              <?=$row->nama_barang;?>
            </td>
            <td>
              <?=$row->qty;?>
            </td>
            <td>
              <?=$row->gudang;?>
            </td>
            <td>
              <?=ucfirst($row->status);?>
            </td>
          </tr>
          <?php $no++; } ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <br/>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List Barang Masuk</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <th>
              No.
            </th>
            <th>
              Tanggal
            </th>
            <th>
              Barang
            </th>
            <th>
              Jumlah
            </th>
            <th>
              Pemesan
            </th>
            <th colspan="2" style="text-align: center">
              Action
            </th>
          </tr>
          <?php $no=1; foreach($pesanan_masuk->result() as $row){ ?>
          <tr>
            <td>
              <?=$no;?>
            </td>
            <td>
              <?=$row->tgl;?>
            </td>
            <td>
              <?=$row->nama_barang;?>
            </td>
            <td>
              <?=$row->qty;?>
            </td>
            <td>
              <?=$row->pemesan;?>
            </td>
            <td style="text-align: center">
              <a href="<?=base_url('master/pemesanan_status/'.$row->id_pesan.'/?aksi=dikirim');?>">Terima</a>
            </td>
            <td style="text-align: center">
              <a href="<?=base_url('master/pemesanan_status/'.$row->id_pesan.'/?aksi=ditolak');?>">Tolak</a>
            </td>
          </tr>
          <?php $no++; } ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->