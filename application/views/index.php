  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
    <section class="content">
      <!--START CONTENT LABEL-->
      <div class="bs-callout bs-callout-success">
        <style type="text/css">
          .bs-callout {
              padding: 20px;
              margin: 20px 0;
              border: 1px solid #d9d9d9;
              border-left-width: 5px;
              border-radius: 3px;
          }
          .bs-callout h4 {
              margin-top: 0;
              margin-bottom: 5px;
          }
          .bs-callout p:last-child {
              margin-bottom: 0;
          }
          .bs-callout code {
              border-radius: 3px;
          }
          .bs-callout+.bs-callout {
              margin-top: -5px;
          }
          .bs-callout-success {
              background-color:  #d9d9d9;
              border-left-color: #5cb85c;
          }
        </style>
        <div class="row">
          <div class="form-group">
            <img class="col-md-1" src="<?php echo site_url('assets/img/by2.png')?>" width="500px">
            <div class="col-md-4">
              <h4 style="margin-top: 20px;">Selamat Datang <i><?php echo "nama"; ?></i> !</h4>
            </div>
        </div>
      </div>
    </div>
    <!--EDN CONTENT LABEL-->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-4">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo "12" ?></h3>

              <p>Data Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users fa-fw"></i>
            </div>
            <a href="<?php echo site_url('C_Karyawan') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-4">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo "12" ?></h3>

              <p>Data Kriteria</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-o"></i>
            </div>
            <a href="<?php echo site_url('C_Kriteria') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo "14" ?></h3>

              <p>Data Subkriteria</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-o"></i>
            </div>
            <a href="<?php echo site_url('C_Subkriteria') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- right col -->
  </div>
  <!-- /.content-wrapper -->