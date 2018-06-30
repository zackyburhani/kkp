<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Data Karyawan</b></small>
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
    <form action="<?php echo site_url('C_Karyawan/periode') ?>" method="GET">
      <div class="form-group">
        <label class="col-sm-2 control-label" style="margin-top: 5px">Pilih Periode Masuk : </label>
          <div class="col-sm-6">
            <input type="date" name="periode_masuk" class="form-control">
          </div>
          <div class="col-sm-4">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Pilih</button>
          </div>
      </div>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryKaryawan"><i class="fa fa-plus"></i></button> Tambah Data Karyawan
        <?php if(isset($tanggalPeriode)) { ?>
          <?php if($tanggalPeriode != null){ ?>
            <a class="btn btn-danger pull-right" href="<?php echo site_url('C_Karyawan/Cetak/'.$tanggalPeriode) ?>"><i class="fa fa-print"></i> Cetak Daftar Periode Karyawan</a>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="panel-body">
        
        <?php if(!isset($getPeriodeCalon)){ ?>

          <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableKaryawan">
            <thead>
              <tr>
                <th width="20px" align="center">No. </th>
                <th><center>Periode Masuk</center></th>
                <th><center>Nama</center></th>
                <th><center>No_telp</center></th>
                <th width="70px">Pendidikan</th>
                <th width="40px" align="center;"> <center>Lihat</center> </th>
                <th width="40px" align="center;"> <center>Ubah</center> </th>
                <th width="40px" align="center;"> <center>Hapus</center> </th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            <?php foreach($getAllCalon as $data){ ?>
              <tr>
                <td align="center"><?php echo $no++; ?>.</td>
                <td><?php echo $data->periode_masuk ?></td>
                <td><?php echo ucwords($data->nm_calon) ?></td>
                <td align="center"><?php echo $data->no_telp ?></td>
                <td align="center"><?php echo $data->pendidikan_terakhir ?></td>
                <td align="center"><a href="#ModalLihatKaryawan<?php echo $data->id_calon ?>" class="btn btn-info btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> </a></td>
                <td align="center"><a href="#ModalUpdateKaryawan<?php echo $data->id_calon ?>" class="btn btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a></td>
                <td align="center"><a href="#ModalHapusKaryawan<?php echo $data->id_calon ?>" class="btn btn-danger btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>

        <?php } else { ?>
          <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableKaryawan">
            <thead>
              <tr>
                <th width="20px" align="center">No. </th>
                <th><center>Periode Masuk</center></th>
                <th><center>Nama</center></th>
                <th><center>No_telp</center></th>
                <th width="70px">Pendidikan</th>
                <th width="40px" align="center;"> <center>Lihat</center> </th>
                <th width="40px" align="center;"> <center>Ubah</center> </th>
                <th width="40px" align="center;"> <center>Hapus</center> </th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            <?php foreach($getPeriodeCalon as $data){ ?>
              <tr>
                <td align="center"><?php echo $no++; ?>.</td>
                <td><?php echo $data->periode_masuk ?></td>
                <td><?php echo ucwords($data->nm_calon) ?></td>
                <td align="center"><?php echo $data->no_telp ?></td>
                <td align="center"><?php echo $data->pendidikan_terakhir ?></td>
                <td align="center"><a href="#ModalLihatKaryawan<?php echo $data->id_calon ?>" class="btn btn-info btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> </a></td>
                <td align="center"><a href="#ModalUpdateKaryawan<?php echo $data->id_calon ?>" class="btn btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a></td>
                <td align="center"><a href="#ModalHapusKaryawan<?php echo $data->id_calon ?>" class="btn btn-danger btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>
      </div>
     </div>
    </div>
  </div>
</section>
