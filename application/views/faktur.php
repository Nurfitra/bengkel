<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
   Faktur <?=$pelanggan->row('nama_pemilik');?>
    <small>it all starts here</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">

    <table class="table table-striped">
      <tr>
        <th>
          Barang
        </th>
        <th>
          Jumlah
        </th>
        <th>
          Tgl Service
        </th>
        <th>
          Harga
        </th>
      </tr>
      <?php foreach($pelanggan->result() as $row){ ?>
      <tr>
        <td>
          <?=$row->barang;?>
        </td>
        <td>
          <?=$row->jumlah;?>
        </td>
        <td>
          Rp. <?=$row->tgl_service;?>
        </td>
        <td>
          Rp. <?=$row->harga;?>
        </td>
      </tr>
      <?php } ?>
      <tr class="success">
        <th colspan="3" style="text-align: center;">
          Total
        </th>
        <th>
          Rp. <?=$func->get_total_transaksi($row->no_pendaftaran);?>
        </th>
      </tr>
    </table>
    <button class="btn btn-danger btn-lg">Lunas</button>
    <button class="btn btn-default btn-lg" onclick="location.href='<?=base_url('master/pdf/'.$pelanggan->row('no_pendaftaran'));?>'">Cetak PDF</button>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->