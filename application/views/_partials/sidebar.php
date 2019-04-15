<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">    
	  <i class="fas fa-chart-pie"></i>
    </div>
    <div class="sidebar-brand-text mx-3">EDOM <sup>v.1</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('Home') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu Utama
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <?php if($this->session->userdata('role')==='ADMIN'):?>
  <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Master</span>
    </a>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Admin Menu:</h6>
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'dosen' ? 'active': '' ?>" href="<?php echo site_url('admin/master/dosen'); ?>">Master Dosen</a>  
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'matakuliah' ? 'active': '' ?>" href="<?php echo site_url('admin/master/matakuliah'); ?>">Master Matakuliah</a>      		
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'pengisian_edom' ? 'active': '' ?>" href="<?php echo site_url('admin/master/pengisian_edom'); ?>">Input Edom</a>
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'laporan' ? 'active': '' ?>" href="<?php echo site_url('admin/master/laporan'); ?>">Grafik Edom</a>
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'report_edom' ? 'active': '' ?>" href="<?php echo site_url('admin/master/report_edom'); ?>">Report Edom</a>
      </div>
    </div>
  </li>
  <?php elseif($this->session->userdata('role')==='DOSEN'):?>
  <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>SLIP GAJI</span>
    </a>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">User Menu:</h6>        
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'slip_gaji' ? 'active': '' ?>" href="<?php echo site_url('admin/gaji/slip_gaji'); ?>">Cetak Slip</a>
        <a class="collapse-item <?php echo $this->uri->segment(3) == 'ganti_password' ? 'active': '' ?>" href="<?php echo site_url('admin/karyawan/ganti_password'); ?>">Ganti Password</a>
      </div>
    </div>
  </li>
  <?php endif;?>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->