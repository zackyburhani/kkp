<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Nilai Target Kriteria</b></small>
    </h1>
  </section>
 
<section class="content">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-sm-2 control-label" style="margin-top: 5px">Pilih Periode Masuk : </label>
              <form action="<?php echo site_url('C_TargetKriteria/periode') ?>" method="GET">
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
      
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-default color-palette-box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-calculator"></i> Nilai Target</h3>
          </div>
          <div class="box-body">
            <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableKaryawan">
              <thead>
                <tr>
                  <th width="20px" align="center"><center>No. </center></th>
                  <th width="70px"><center>Periode Masuk</center></th>
                  <th width="70px"><center>ID Calon</center></th>
                  <th width="200px"><center>Nama</center></th>
                  <th width="30px"><center>Nilai</center></th>
                  <th width="59px" align="center;"> <center>Tambah Nilai</center> </th>
                </tr>
              </thead>
              <tbody> 
                <?php $no=1; ?>
                <?php if(isset($getPeriodeCalon)) { ?>
                <?php foreach($getPeriodeCalon as $data){ ?>
                <tr>
                  <td align="center"><?php echo $no++; ?>.</td>
                  <td><?php echo $data->periode_masuk; ?></td>
                  <td><?php echo $data->id_calon; ?></td>
                  <td>
                    <a href="#ModalLihatKaryawan<?php echo $data->id_calon ?>" data-toggle="modal"><?php echo $data->nm_calon; ?></a>
                  </td>
                  <td align="center">
                    <a href="#ModalLihatNilai<?php echo $data->id_calon ?>" class="btn btn-info btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span></a>
                  </td>
                  <td align="center">
                    <a href="#ModalTambahNilaTargetKriteria<?php echo $data->id_calon ?>" class="btn btn-success btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></a>
                  </td>
                </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right" style="margin-left: 10px"><i class="fa fa-save"></i> Simpan Nilai Target</button>
          </div>
        </div>  
      </div>
    </div>
  </section>

