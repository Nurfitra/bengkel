  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(1)==null || $this->uri->segment(1)=="dashboard"){echo "active";} ?>"><a href="<?=base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if($this->session->userdata('role') == 1){ ?>
        <li class="treeview <?php if($this->uri->segment(1)=="dataPengguna" || $this->uri->segment(1)=="dataGudang"){echo "active";} ?>">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=="dataPengguna"){echo "active";} ?>"><a href="<?=base_url('dataPengguna');?>">Pengguna</a></li>
            <li class="<?php if($this->uri->segment(1)=="dataGudang"){echo "active";} ?>"><a href="<?=base_url('dataGudang');?>">Data Gudang</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1)=="jenisJasa"){echo "active";} ?>"><a href="<?=base_url('jenisJasa');?>"><i class="fa fa-book"></i> <span>Jenis Jasa</span></a></li>
        <?php } if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 4){ ?>
        <li class="<?php if($this->uri->segment(1)=="daftarService"){echo "active";} ?>"><a href="<?=base_url('daftarService');?>"><i class="fa fa-book"></i> <span>Daftar Service</span></a></li>
        <?php } if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 4){ ?>
        <li class="<?php if($this->uri->segment(1)=="Pembelian"){echo "active";} ?>"><a href="<?=base_url('Pembelian');?>"><i class="fa fa-book"></i> <span>Pembelian</span></a></li>
        <?php } if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 3){ ?>
        <li class="<?php if($this->uri->segment(1)=="dataTransaksi"){echo "active";} ?>"><a href="<?=base_url('dataTransaksi');?>"><i class="fa fa-book"></i> <span>Data Pelanggan</span></a></li>
        <?php } if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 4){ ?>
        <li class="<?php if($this->uri->segment(1)=="faktur"){echo "active";} ?>"><a href="<?=base_url('faktur');?>"><i class="fa fa-book"></i> <span>Cetak Faktur</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>