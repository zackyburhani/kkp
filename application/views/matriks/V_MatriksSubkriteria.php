<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Halaman Matriks Normalisasi Subriteria</small>
    </h1>
  </section>

<section class="content">
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
                  <th width="100px">ID Calon </th>
                  <th width="250px">Nama </th>
                  <?php $getSubkriteria = $this->M_Subkriteria->getSubkriteria($kriteria->kd_kriteria); ?>
                  <?php foreach($getSubkriteria as $row){ ?>
                  <th><?php echo $row->nm_subkriteria ?></th>
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
                  <td><?php echo $data->nm_calon ?></td>
                    <?php $matriksTargetNilai = $this->M_MatriksSubkriteria->matriksTargetNilai($data->id_calon,$kriteria->kd_kriteria);?>
                    <?php foreach ($matriksTargetNilai as $data2) { ?>
                      <td><?php echo $data2->nilai_target2 ?></td>
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
                  <th width="100px">ID Calon </th>
                  <th width="250px">Nama </th>
                  <?php foreach($getSubkriteria as $row){ ?>
                  <th><?php echo $row->nm_subkriteria ?></th>
                  <?php } ?>
                </tr>
              </thead>

              <tbody>
                <?php $no=1; ?>
                <?php foreach ($getPeriodeCalon as $data) { ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo $data->id_calon ?></td>
                  <td><?php echo $data->nm_calon ?></td>
                    <?php $matriksNormalisasi = $this->M_MatriksSubkriteria->matriksNormalisasi($tanggalPeriode,$data->id_calon);?>
                    <?php if($kriteria->kd_kriteria == 'K1') { ?>
                      <?php foreach ($matriksNormalisasi as $data4) { ?>
                        <td><?php echo round($data4->SK1/$max[0],4) ?></td>
                        <td><?php echo round($data4->SK2/$max[1],4) ?></td>
                        <td><?php echo round($data4->SK3/$max[2],4) ?></td>
                      <?php } ?>
                    <?php } ?>
                    <?php if($kriteria->kd_kriteria == 'K2') { ?>
                      <?php foreach ($matriksNormalisasi as $data4) { ?>
                        <td><?php echo round($data4->SK4/$max[3],4) ?></td>
                        <td><?php echo round($data4->SK5/$max[4],4) ?></td>
                      <?php } ?>
                    <?php } ?>
                    <?php if($kriteria->kd_kriteria == 'K3') { ?>
                      <?php foreach ($matriksNormalisasi as $data4) { ?>
                        <td><?php echo round($data4->SK6/$max[5],4) ?></td>
                        <td><?php echo round($data4->SK7/$max[6],4) ?></td>
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
                  <th>No.</th>
                  <th>ID Calon </th>
                  <th>Nama </th>
                  <th>Nilai SAW</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="footer">
          <button type="submit" class="btn btn-success pull-right" style="margin-left: 10px"><i class="fa fa-save"></i> Simpan Hasil</button>
        </div>

      </div>
     </d
    <?php } ?>
    </div>
  </div>
<?php } ?>

</section>