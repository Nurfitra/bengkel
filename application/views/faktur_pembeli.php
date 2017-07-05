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
          No.
        </th>
        <th>
          Barang
        </th>
        <th>
          Jumlah
        </th>
        <th>
          Tgl Pembelian
        </th>
        <th>
          Harga
        </th>
      </tr>
      <?php $no=1; foreach($pelanggan->result() as $row){ ?>
      <tr>
        <td>
          <?=$no;?>
        </td>
        <td>
          <?=$row->barang;?>
        </td>
        <td>
          <?=$row->jumlah;?>
        </td>
        <td>
        <?=$row->tgl_service;?>
        </td>
        <td>
          Rp. <?=$row->harga;?>
        </td>
      </tr>
      <?php $no++; } ?>
      <tr class="success">
        <th colspan="4" style="text-align: center;">
          Total
        </th>
        <th>
          Rp. <?=$func->get_total_transaksi($row->no_pendaftaran);?>
        </th>
      </tr>
    </table>
    <a class="btn btn-danger btn-lg" onclick="return confirm('Melunasi Transaksi?');" href="<?=base_url('master/lunas_p/'.$pelanggan->row('no_pendaftaran'));?>">Lunas</a>
    <button class="btn btn-default btn-lg" onclick="location.href='<?=base_url('master/pdf/'.$pelanggan->row('no_pendaftaran'));?>'">Cetak PDF</button>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->