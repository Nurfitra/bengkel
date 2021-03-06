<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    <?=$pelanggan->row('nama_pemilik');?> ( <?=$pelanggan->row('kendaraan')." | ".$pelanggan->row('no_polisi');?> )
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="simpleCart_shelfItem">
        <div class="col-md-4">
        <span class="item_id" id="id_barang" hidden></span>
          <div class="form-group">
            <label for="exampleInputName2">Jenis jasa</label>
            <select class="item_name form-control" onchange="val_select()" id="select_jasa">
              <?php foreach ($jasa->result() as $row) { ?>
              <option data-value="<?=$row->harga;?>" value="Ganti Sparepart" ><?=$row->nama_jasa;?> ( + Rp. <?=$row->harga;?> )</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="exampleInputName2">Nama Barang</label>
            <select class="item_name form-control" onchange="val_select()" id="select_id">
              <option value="0 , Hanya Jasa" data-value="" data-price="0"> Hanya Jasa</option>
              <?php foreach ($barang->result() as $row) { ?>
              <option value="<?=$row->id_barang;?>, <?=$row->nama_barang;?>" data-value="<?=$row->stok;?>" data-id="<?=$row->id_barang;?>" data-price="<?=$row->harga;?>"><?=$row->nama_barang;?> ( <?=$row->stok;?> Rp. <?=$row->harga;?>/<?=$row->satuan;?> ) | Gudang <?=$row->kode_gudang;?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label for="exampleInputName2">Qty</label>
            <input type="number" value="1" min="1" max="<?=$barang->row('stok');?>" id="max_select" class="form-control item_Quantity">
          </div>
        </div>
        <div class="col-md-2">
          <span class="item_price" hidden id="harga"><?=$barang->row('harga');?></span><br/>
          <a class="btn btn-primary btn-lg item_add" href="javascript:;" id="item-03"> Tambah </a>
        </div>
      </div>
    </div><br/>
    <div class="simpleCart_items"></div>
    <div class="simpleCart_grandTotal"></div><br/>
    <a href="javascript:;" class="btn btn-success btn-lg simpleCart_checkout">Selesai</a>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url('assets'); ?>/simpleCart.min.js"></script>
<script type="text/javascript">
function val_select() {
jasa = $("#select_jasa").find(':selected').data("value");
qty = $("#select_id").find(':selected').data("value");
id = $("#select_id").find(':selected').data("id");
price = $("#select_id").find(':selected').data("price");
document.getElementById("max_select").setAttribute("max", qty);
document.getElementById("id_barang").textContent = id;
document.getElementById("harga").textContent = price+jasa;
}
simpleCart.empty();
simpleCart.currency({
code: "IDR" ,
name: "Indonesian Rupiah" ,
symbol: "Rp " ,
delimiter: "," ,
decimal: "." ,
after: false ,
accuracy: 0
});
simpleCart({
cartColumns: [
{ attr: "name" , label: "Nama Barang" } ,
{ attr: "price" , label: "Harga", view: 'currency' } ,
{ view: "decrement" , label: false , text: "-" } ,
{ attr: "quantity" , label: "Qty" } ,
{ view: "increment" , label: false , text: "+" } ,
{ attr: "total" , label: "SubTotal", view: 'currency' } ,
{ view: "remove" , text: "Hapus" , label: false }
],
cartStyle : "table",
checkout: {
type: "SendForm" ,
url: "<?=base_url('tambahTransaksi/'.$pelanggan->row('no_pendaftaran'));?>",
method: "POST   " ,
extra_data: {
storename: "Bengkel",
id: "Bengkel",
}
}
});
</script>