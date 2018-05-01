<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Data Karyawan</b></small>
    </h1>
  </section>

<section class="content">
    
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryKaryawan"><i class="fa fa-plus"></i></button> Tambah Data Karyawan
      </div>
      <div class="panel-body">
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableKaryawan">
          <thead>
            <tr>
              <th>ID Calon</th>
              <th>Nama </th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Jenis Kelamin</th>
              <th>email</th>
              <th>No_telp</th>
              <th>Pendidikan</th>
              <th width="40px" align="center;"> <center>Ubah</center> </th>
              <th width="40px" align="center;"> <center>Hapus</center> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td align="center;"><a href="#ModalUpdateKaryawan" class="btn btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a></td>
              <td align="center;"><a href="#ModalHapusKaryawan" class="btn btn-danger btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
            </tr>
          </tbody>
        </table>
      </div>
     </div>
    </div>
  </div>
</section>
