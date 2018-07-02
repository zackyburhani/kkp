  <aside class="main-sidebar">
    <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-asterisk"></i> DATA MASTER</li>
        <li>
          <a href="<?php echo site_url('C_Dashboard') ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('C_Karyawan'); ?>">
            <i class="fa fa-users"></i> <span>Data Calon Karyawan</span>
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

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i>
            <span>Nilai Target</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li>
              <a href="<?php echo site_url('C_TargetKriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Nilai Target Kriteria</span>
              </a>
            </li> -->
            <li>
              <a href="<?php echo site_url('C_TargetSubkriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Nilai Target Subkriteria</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i>
            <span>Matriks Normalisasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('C_MatriksKriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Matriks Kriteria</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('C_MatriksSubkriteria') ?>">
                <i class="fa fa-circle-o"></i> <span>Matriks Subkriteria</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url('C_HasilKeputusan'); ?>">
            <i class="fa fa-clipboard"></i> <span>Hasil Keputusan</span>
          </a>
        </li>
      </ul>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-asterisk"></i> LAPORAN</li>
        <li>
          <a href="<?php echo site_url('C_LapPerangkinganNilai') ?>">
            <i class="fa fa-file-text"></i> <span>Perangkingan Nilai</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('C_LapRekapitulasiPenilaian'); ?>">
            <i class="fa fa-file-text"></i> <span>Rekapitulasi Penilaian</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('C_LapPenilaian'); ?>">
            <i class="fa fa-file-text"></i> <span>Penilaian Calon Karyawan</span>
          </a>
        </li>
      </ul>

    </section>
  </aside>