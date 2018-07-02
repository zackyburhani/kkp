<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Laporan Perangkingan Nilai</b></small>
    </h1>
  </section>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text fa-fw"></i> Laporan Perangkingan Nilai</h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <form action="<?php echo site_url('C_LapPerangkinganNilai/periode') ?>" method="GET">
              <label class="col-sm-2 control-label" style="margin-top: 5px">Tanggal Periode : </label>
              <div class="col-sm-4">
                <input type="date" name="periode_masuk" class="form-control">
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Pilih</button>
              </div>
              </form>
              <div class="col-sm-4">
                <?php if(isset($periode)){?>
                  <?php if($getLapPerangkinganNilai != null) { ?>
                  <a href="<?php echo site_url('C_LapPerangkinganNilai/cetaklaporanrank/'.$periode) ?>" class="btn btn-danger" style="margin-left: 10px"><i class="fa fa-print"></i> Pdf</a>
                  <a href="<?php echo site_url('C_LapPerangkinganNilai/Excel/'.$periode) ?>" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-file-excel-o"></i> Excel</a>
                  <a href="<?php echo site_url('C_LapPerangkinganNilai/Word/'.$periode) ?>" class="btn btn-primary" style="margin-left: 10px"><i class="fa fa-file-word-o"></i> Word</a>
                   <?php } ?>
                <?php } ?>
              </div>
          </div>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </div>
  </div>

<?php if(isset($getLapPerangkinganNilai)) { ?>
  <?php if($getLapPerangkinganNilai == null) { ?>
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
          <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" >
              <thead>
                <tr>
                  <th width="30px" align="center">No. </th>
                  <th width="60px"><center>ID Calon</center></th>
                  <th width="150px"><center>Nama</center></th>
                  <th width="50px"><center>Hasil</center></th>
                  <th width="150px"><center>keterangan</center></th>    
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach($getLapPerangkinganNilai as $data){ ?>
                <tr>
                  <td class="text-center"><?php echo $no++."." ?></td>
                  <td><center><?php echo $data->id_calon; ?></center></td>
                  <td><?php echo ucwords($data->nm_calon); ?></td>
                  <td><center><?php echo $data->hasil_akhir; ?></center></td>
                  <?php if($data->keterangan != null) { ?>
                  <td><center><?php echo $data->keterangan; ?></center></td>
                  <?php } else { ?>
                  <td><center><?php echo "Tidak Lolos" ?></center></td>
                  <?php } ?>
                </tr>
                <?php }  ?>
              </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
<?php } ?>
</section>


