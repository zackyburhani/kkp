<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Matriks Normalisasi Subkriteria</b></small>
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
              <form action="<?php echo site_url('C_MatriksSubkriteria/periode') ?>" method="GET">
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
    <?php foreach($getAllKriteria as $kriteria) { ?>
      <div class="panel panel-default">

      <div class="panel-body">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Matriks Nilai Target <i><?php echo $kriteria->nm_kriteria ?></i></h3>

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
                  <?php $getSubkriteria = $this->M_Subkriteria->getSubkriteria($kriteria->kd_kriteria); ?>
                  <?php foreach($getSubkriteria as $row){ ?>
                  <th><center><?php echo $row->nm_subkriteria ?></center></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $matriksTarget = $this->M_MatriksSubkriteria->matriksTarget($kriteria->kd_kriteria);?>
                <?php $no=1; ?>
                <?php foreach ($getPeriodeCalon as $data) { ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo $data->id_calon; ?></td>
                  <td><?php echo ucwords($data->nm_calon) ?></td>
                    <?php $matriksTargetNilai = $this->M_MatriksSubkriteria->matriksTargetNilai($data->id_calon,$kriteria->kd_kriteria);?>
                    <?php foreach ($matriksTargetNilai as $data2) { ?>
                      <td align="center"><?php echo $data2->nilai_target2 ?></td>
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
                  <th width="100px"><center>ID Calon </center></th>
                  <th width="250px"><center>Nama</center> </th>
                  <?php foreach($getSubkriteria as $row){ ?>
                  <th><center><?php echo $row->nm_subkriteria ?></center></th>
                  <?php } ?>
                </tr>
              </thead>

              <tbody>
                <?php $no=1; ?>
                <?php foreach ($getPeriodeCalon as $data) { ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo $data->id_calon ?></td>
                  <td><?php echo ucwords($data->nm_calon) ?></td>
                    <?php $matriksNormalisasi = $this->M_MatriksSubkriteria->matriksNormalisasi($tanggalPeriode,$data->id_calon);?>
                    <?php if($kriteria->kd_kriteria == 'K1') { ?>
                      <?php foreach ($matriksNormalisasi as $data4) { ?>
                        <td align="center"><?php echo round($data4->SK1/$max[0],4) ?></td>
                        <td align="center"><?php echo round($data4->SK2/$max[1],4) ?></td>
                        <td align="center"><?php echo round($data4->SK3/$max[2],4) ?></td>
                      <?php } ?>
                    <?php } ?>
                    <?php if($kriteria->kd_kriteria == 'K2') { ?>
                      <?php foreach ($matriksNormalisasi as $data4) { ?>
                        <td align="center"><?php echo round($data4->SK4/$max[3],4) ?></td>
                        <td align="center"><?php echo round($data4->SK5/$max[4],4) ?></td>
                      <?php } ?>
                    <?php } ?>
                    <?php if($kriteria->kd_kriteria == 'K3') { ?>
                      <?php foreach ($matriksNormalisasi as $data4) { ?>
                        <td align="center"><?php echo round($data4->SK6/$max[5],4) ?></td>
                        <td align="center"><?php echo round($data4->SK7/$max[6],4) ?></td>
                      <?php } ?>
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
                <?php if($kriteria->kd_kriteria == 'K1') { ?>
                <?php foreach ($total1_view as $data => $nilai) { ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo ($total1_view[$data][0]) ?></td>
                  <td><?php echo ucwords(($total1_view[$data][1])) ?></td>
                  <td align="center"><?php echo ($total1_view[$data][2]) ?></td>
                <?php } ?>
                <?php } ?>

                <?php if($kriteria->kd_kriteria == 'K2') { ?>
                <?php foreach ($total2_view as $data => $nilai) { ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo ($total2_view[$data][0]) ?></td>
                  <td><?php echo ucwords(($total2_view[$data][1])) ?></td>
                  <td align="center"><?php echo ($total2_view[$data][2]) ?></td>
                <?php } ?>
                <?php } ?>

                <?php if($kriteria->kd_kriteria == 'K3') { ?>
                <?php foreach ($total3_view as $data => $nilai) { ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo ($total3_view[$data][0]) ?></td>
                  <td><?php echo ucwords(($total3_view[$data][1])) ?></td>
                  <td align="center"><?php echo ($total3_view[$data][2]) ?></td>
                <?php } ?>
                <?php } ?>                
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
     </div>
    <?php } ?>
<?php } else { ?>
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

<?php if(isset($getPeriodeCalon)) { ?>
<?php if($matriksISI != null) { ?>
<?php $hilangkanTombol = $this->M_MatriksSubkriteria->hilangkanTombol($tanggalPeriode); ?>
<form action="<?php echo site_url('C_MatriksSubkriteria/simpanNilai/'.$tanggalPeriode) ?>" method="POST">
<?php $no=1; ?>
<?php foreach ($getPeriodeCalon as $periode) { ?>
  <input type="hidden" value="<?php echo $periode->id_calon ?>" name="id_calon<?php echo $no++; ?>">
  <?php } ?>
<div class="footer" style="margin-bottom: 10px;">
  <?php if($hilangkanTombol == null) { ?>
  <button type="submit" class="btn btn-success pull-right" style="margin-left: 10px;margin-bottom: 50px;"><i class="fa fa-save"></i> Simpan Hasil</button>
  <?php } ?>
</div>

</form>
<?php } ?>
</div>
</div>
<?php } ?>
  

</section>