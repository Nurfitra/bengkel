<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div>
				<h3>&nbsp; Daftar Alat dan Bahan</h3>
			</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Peralatan</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table id="datatable-fixed-header" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Alat</th>
						<th>Nama Alat</th>
						<th>Kategori</th>
						<th>Total Alat</th>
						<th>Satuan</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
<?php $i=1; foreach ($alat as $a) { ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $a->kode_alat; ?></td>
						<td><?php echo $a->nama_alat; ?></td>
						<td><?php echo $a->kategori; ?></td>
						<td><?php echo $a->jml_alat; ?></td>
						<td><?php echo $a->satuan; ?></td>
						<td><button type="button" class="btn btn-default"><a href="home.php" class="fa fa-eye"></a></button></td>
<?php $i++; } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
</div>