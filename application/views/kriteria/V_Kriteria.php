<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Halaman Data Kriteria</small>
    </h1>
  </section>

<section class="content">
  <div class="panel panel-default">
    <div class="panel-body"><h4><i class="fa fa-file-o"></i> Data Kriteria</h4></div>
  </div>
    
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
              <th>Kode Kriteria</th>
              <th>Nama Kriteria</th>
              <th width="40px" align="center;"> <center>Ubah</center> </th>
              <th width="40px" align="center;"> <center>Hapus</center> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td align="center;"><a href="#ModalUpdateKriteria" class="btn btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a></td>
              <td align="center;"><a href="#ModalHapusKriteria" class="btn btn-danger btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
            </tr>
          </tbody>
        </table>
      </div>
     </div>
    </div>
  </div>
</section>
