<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Matriks Normalisasi Kriteria</b></small>
    </h1>
  </section> 

<section class="content">

<?php if($this->session->flashdata('pesan') == TRUE ) { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success fade in" id="alert">
        <p><center><b><?php echo $this->session->flashdata('pesan') ?></b></center></p>
      </div>
    </div>
  </div>
<?php } ?>

<?php if($this->session->flashdata('pesanGagal') == TRUE ) { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger" id="alert">
        <p><center><b><?php echo $this->session->flashdata('pesanGagal') ?></b></center></p>
      </div>
    </div>
  </div>
<?php } ?>

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-sm-2 control-label" style="margin-top: 5px">Pilih Periode Masuk : </label>
              <form action="<?php echo site_url('C_MatriksKriteria/periode') ?>" method="GET">
                <div class="col-sm-3">
                  <input type="date" name="periode_masuk" class="form-control">
                </div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Pilih</button>
                </div>
              </form>
            </div>
          </div>
        </div>      
      </div>
    </div>

<?php if(isset($getPeriodeCalon)) { ?>
  <?php if($matriksISI != null) { ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">

          <div class="panel-body">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Matriks Nilai Target</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>

              <div class="box-body">
                <table style="table-layout:fixed" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="50px"><center>No.</center></th>
                      <th width="100px"><center>ID Calon</center></th>
                      <th width="250px"><center>Nama</center></th>
                      <?php foreach($getAllKriteria as $kriteria) { ?>
                      <th><center><?php echo $kriteria->nm_kriteria ?></center></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    <?php foreach($getPeriodeCalon as $periode) { ?>
                    <tr>
                      <td><center><?php echo $no++."." ?></center></td>
                      <td><?php echo $periode->id_calon ?></td>
                      <td><?php echo ucwords($periode->nm_calon) ?></td>
                      <?php $nilaiTarget = $this->M_MatriksKriteria->nilaiTarget($periode->id_calon) ?>
                      <?php foreach($nilaiTarget as $target) { ?>
                      <td><center><?php echo $target->K1 ?></center></td>
                      <td><center><?php echo $target->K2 ?></center></td>
                      <td><center><?php echo $target->K3 ?></center></td>
                    <?php } ?>  
                    </tr>
                    
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Matriks Normalisasi</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>

              <div class="box-body">
                <table style="table-layout:fixed" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="50px"><center>No.</center></th>
                      <th width="100px"><center>ID Calon</center></th>
                      <th width="250px"><center>Nama</center></th>
                      <?php foreach($getAllKriteria as $kriteria) { ?>
                      <th><center><?php echo $kriteria->nm_kriteria ?></center></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    <?php foreach($getPeriodeCalon as $periode) { ?>
                    <tr>
                      <td><center><?php echo $no++."." ?></center></td>
                      <td><?php echo $periode->id_calon ?></td>
                      <td><?php echo ucwords($periode->nm_calon) ?></td>
                      <?php $matriksNormalisasi = $this->M_MatriksKriteria->matriksNormalisasi($tanggalPeriode,$periode->id_calon);?>
                        <?php foreach ($matriksNormalisasi as $data4) { ?>
                          <td align="center"><?php echo round($data4->K1/$max[0],4) ?></td>
                          <td align="center"><?php echo round($data4->K2/$max[1],4) ?></td>
                          <td align="center"><?php echo round($data4->K3/$max[2],4) ?></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Perangkingan</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>

              <div class="box-body">
                <table style="table-layout:fixed" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="50px"><center>No.</center></th>
                      <th width="100px"><center>ID Calon</center></th>
                      <th width="250px"><center>Nama</center></th>
                      <th width="250px"><center>Nilai SAW</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    <?php foreach($total_view as $data => $nilai) { ?>
                    <tr>
                      <td><center><?php echo $no++."." ?></center></td>
                      <td><?php echo ($total_view[$data][0]) ?></td>
                      <td><?php echo ucwords(($total_view[$data][1])) ?></td>
                      <td align="center"><?php echo ($total_view[$data][2]) ?></td>
                    <?php } ?>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          <?php } else{ ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <h4><center>Data Tidak Ditemukan</center></h4>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>          

        </div>
       </div>
       <?php if($matriksISI != null) { ?>
          <?php if(isset($getPeriodeCalon)) { ?>
          <form action="<?php echo site_url('C_MatriksKriteria/simpanHasil/'.$tanggalPeriode) ?>" method="POST">
          <input type="hidden" name="periode_masuk" value="<?php echo $tanggalPeriode ?>">
          <?php $no=1; ?>
          <?php foreach ($getPeriodeCalon as $periode) { ?>
            <input type="hidden" value="<?php echo $periode->id_calon ?>" name="id_calon<?php echo $no++; ?>">
          <?php } ?>
          <div class="footer" style="margin-bottom: 10px;">
            <?php $hilangkanTombol = $this->M_MatriksKriteria->hilangkanTombol($tanggalPeriode); ?>
            <?php if($hilangkanTombol == null) { ?>
            <button type="submit" class="btn btn-success pull-right" style="margin-left: 10px;margin-bottom: 50px;"><i class="fa fa-save"></i> Simpan Hasil</button>
            <?php } ?>
          </div>

          </form>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </section>


                  
