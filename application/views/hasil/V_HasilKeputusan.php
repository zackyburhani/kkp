<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Hasil Keputusan</b></small>
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
              <form action="<?php echo site_url('C_HasilKeputusan/periode') ?>" method="GET">
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

  <?php if(isset($getAllHasil)) { ?>
    <?php if($getAllHasil != null) { ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div id="hasil_akhir_saw" style="min-width: 310px; height: 400px; margin: 0 auto"></div>         
          </div>
        </div>      
      </div>
    </div>
  
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">

          
          <div class="panel-body">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Hasil Keputusan</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>
              <form action="<?php echo site_url('C_HasilKeputusan/simpanHasil') ?>" method="POST">
                <input type="hidden" name="periode_masuk" value="<?php echo $periode ?>">
                <div class="box-body">
                  <table style="table-layout:fixed" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="150px"><center>ID Calon </center></th>
                        <th width="430px"><center>Nama</center> </th>
                        <th><center>Nilai SAW</center></th>
                        <th><center>Rangking</center></th>
                        <th width="60px"><center>Pilih</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $peringkat=1; ?>
                      <?php $calon=1; ?>
                      <?php foreach ($getAllHasil as $row) { ?>
                      <tr>
                        <td align="center"><?php echo $row->id_calon ?></td>
                        <td><?php echo ucwords($row->nm_calon) ?></td>
                        <td><center><?php echo $row->hasil_akhir ?></center></td>
                        <td><center><b><?php echo $peringkat++; ?></b></center></td>
                        <td>
                          <?php if($row->keterangan == null) { ?>
                          <center><input type="checkbox" name="calon<?php echo $calon++; ?>" value="<?php echo $row->id_calon ?>"></center>
                          <?php } else { ?>
                            <center><i class="fa fa-check"></i></center>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="footer">
                <button type="submit" class="btn btn-success pull-right" style="margin-left: 10px"><i class="fa fa-save"></i> Simpan Hasil</button>
              </div>
            </form>

          </div>
          <div class="container-fluid">
            <?php foreach($getKesimpulan as $kesimpulan) { ?>
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Kesimpulan : </h4>
                  Dari hasil perhitungan yang dilakukan menggunakan metode <i>Analytical Hierarchy Process</i> dan <i>Simple Additive Weighting</i> calon karyawan yang memiliki nilai tertinggi adalah <b><?php echo ucwords($kesimpulan->nm_calon) ?></b> dengan nilai <b><?php echo $kesimpulan->hasil_akhir ?></b> 
              </div>
            <?php } ?>
          </div>
         </div>
        </div>
      </div>
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
</section>

                    
