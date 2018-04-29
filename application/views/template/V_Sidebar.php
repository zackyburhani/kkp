  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/AdminLTE/dist/img/avatar.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo "Nama" ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-asterisk"></i> DATA MASTER</li>
        <li>
          <a href="<?php echo site_url('C_Dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('C_Karyawan'); ?>">
            <i class="fa fa-user"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-o"></i>
            <span>Kriteria Dan Subkriteria</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('C_Kriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Data Kriteria</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('C_Subkriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Data Subkriteria</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-asterisk"></i> PERHITUNGAN AHP</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i>
            <span>Perbandingan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('C_PerbandinganKriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Data Kriteria</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('C_PerbandinganSubkriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Data Subkriteria</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>

    </section>
  </aside>