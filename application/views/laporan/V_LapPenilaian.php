<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Laporan Penilaian Calon Karyawan</b></small>
    </h1>
  </section>

<section class="content">
   <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text fa-fw"></i> Laporan Penilaian Calon Karyawan</h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <form action="<?php echo site_url('C_LapPenilaian/periode') ?>" method="GET">
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
        </div>
      </div>
    </div>
  </div>


<?php if(isset($getLapPenilaianCalonKaryawan)) { ?>
  <?php if($getLapPenilaianCalonKaryawan == null) { ?>
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
                  <th width="40px"><center>ID Calon</center></th>
                  <th width="100px"><center>Nama</center></th>
                  <th width="30px"><center>Jurusan</center></th>
                  <th width="30px"><center>Skill</center></th>
                  <th width="35px"><center>Tanggung Jawab</center></th>
                  <th width="35px"><center>Kesiapan Kerja</center></th>
                  <th width="30px"><center>Perilaku</center></th>
                  <th width="35px"><center>Ketelitian</center></th>
                  <th width="35px"><center>Kejujuran</center></th>
                  <th width="30px"><center>Hasil</center></th>
                  <th width="30px"><center>PDF</center></th>
                  <th width="30px"><center>Excel</center></th>
                  <th width="30px"><center>Word</center></th>

                </tr>
              </thead>
              <tbody>
                <?php foreach($getLapPenilaianCalonKaryawan as $data){ ?>
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
                  <td class="text-center">
                    <a href="<?php echo site_url('C_LapPenilaian/cetaklaporanPenilaian/'.$awal.'/'.$akhir.'/'.$data->calon_id) ?>" class="btn btn-danger"><i class="fa fa-print"></i></a>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo site_url('C_LapPenilaian/Excel/'.$awal.'/'.$akhir.'/'.$data->calon_id) ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo site_url('C_LapPenilaian/Word/'.$awal.'/'.$akhir.'/'.$data->calon_id) ?>" class="btn btn-primary"><i class="fa fa-file-word-o"></i></a>
                  </td>
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



