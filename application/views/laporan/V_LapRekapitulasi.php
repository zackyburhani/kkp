<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Laporan Rekapitulasi Penilaian</b></small>
    </h1>
  </section>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text fa-fw"></i> Laporan Rekapitulasi Penilaian</h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <form action="<?php echo site_url('C_LapRekapitulasiPenilaian/periode') ?>" method="GET">
              <label class="col-sm-2 control-label" style="margin-top: 5px">Tanggal Awal : </label>
              <div class="col-sm-3">
                <input type="date" name="awal" class="form-control" required>
              </div>
              <label class="col-sm-2 control-label" style="margin-top: 5px">Tanggal Akhir : </label>
              <div class="col-sm-3">
                <input type="date" name="akhir" class="form-control" required>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Pilih</button>
              </div>
              </form>
          </div>
        </div>
        <div class="box-footer">
          <center>
            <?php if(isset($awal)){?>
              <?php if($getLapRekapitulasiPenilaian != null) { ?>
                <a href="<?php echo site_url('C_LapRekapitulasiPenilaian/cetaklaporanrank/'.$awal.'/'.$akhir) ?>" class="btn btn-danger" style="margin-left: 10px"><i class="fa fa-print"></i> Pdf</a>
                <a href="<?php echo site_url('C_LapRekapitulasiPenilaian/Excel/'.$awal.'/'.$akhir) ?>" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-file-excel-o"></i> Excel</a>
                <a href="<?php echo site_url('C_LapRekapitulasiPenilaian/Word/'.$awal.'/'.$akhir) ?>" class="btn btn-primary" style="margin-left: 10px"><i class="fa fa-file-word-o"></i> Word</a>
              <?php } ?>
            <?php } ?>
          </center>    
        </div>
      </div>
    </div>
  </div>


<?php if(isset($getLapRekapitulasiPenilaian)){?>
  <?php if($getLapRekapitulasiPenilaian == null) { ?>
     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h4><center>Data Tidak Ditemukan</center></h4>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        
        <div class="box-body">
        <br>
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" >
              <thead>
                <tr>
                  <th width="25px"><center>ID Calon</center></th>
                  <th width="90px"><center>Nama</center></th>
                  <th width="30px"><center>Jurusan</center></th>
                  <th width="30px"><center>Skill</center></th>
                  <th width="30px"><center>Tanggung Jawab</center></th>
                  <th width="30px"><center>Kesiapan Kerja</center></th>
                  <th width="30px"><center>Perilaku</center></th>
                  <th width="30px"><center>Ketelitian</center></th>
                  <th width="30px"><center>Kejujuran</center></th>
                  <th width="30px"><center>Hasil</center></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($getLapRekapitulasiPenilaian as $data){ ?>
                <tr>
                  <td class="text-center"><?php echo $data->calon_id; ?></td>
                  <td><?php echo ucwords($data->nm_calon); ?></td>
                  <td class="text-center"><?php echo $data->jurusan; ?></td>
                  <td class="text-center"><?php echo $data->skill; ?></td>
                  <td class="text-center"><?php echo $data->tanggung_jawab; ?></td>
                  <td class="text-center"><?php echo $data->kesiapan_kerja; ?></td>
                  <td class="text-center"><?php echo $data->perilaku; ?></td>
                  <td class="text-center"><?php echo $data->ketelitian; ?></td>
                  <td class="text-center"><?php echo $data->kejujuran; ?></td>
                  <td class="text-center"><?php echo $data->hasil; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>  
  </div>
  <?php } ?>
<?php } ?>
</section>



