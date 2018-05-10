<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Data Kriteria</b></small>
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

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryKriteria"><i class="fa fa-plus"></i></button> Tambah Data Kriteria
      </div>
      <div class="panel-body">
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableKriteria">
          <thead>
            <tr>
              <th width="20px">No. </th>
              <th><center>Kode Kriteria</center></th>
              <th><center>Nama Kriteria</center></th>
              <th width="40px" align="center;"> <center>Ubah</center> </th>
              <th width="40px" align="center;"> <center>Hapus</center> </th>
            </tr>
          </thead>
          <tbody>
          <?php $no=1; ?>
          <?php foreach($getAllKriteria as $data){ ?>
            <tr>
              <td align="center"><?php echo $no++; ?>.</td>
              <td align="center"><?php echo $data->kd_kriteria ?></td>
              <td align="center"><?php echo $data->nm_kriteria ?></td>
              <td align="center"><a href="#ModalUpdateKriteria<?php echo $data->kd_kriteria ?>" class="btn btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a></td>
              <td align="center"><a href="#ModalHapusKriteria<?php echo $data->kd_kriteria ?>" class="btn btn-danger btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
     </div>
    </div>
  </div>
</section>
