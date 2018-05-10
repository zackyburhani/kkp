<?php foreach($getAllCalon as $data){?>
  <div class="modal fade" tabindex="-1" id="ModalLihatKaryawan<?php echo $data->id_calon ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><i class="fa fa-user fa-fw"></i> Detil Calon Karyawan</h3>
        </div>
        <div class="modal-body">
          <form method="POST" action="" enctype="multipart/form-data">
            <table class="table table-responsive" border="0">
              <tbody>
                <tr>
                  <td width="200px">ID Calon Karyawan</td>
                  <td>:</td>
                  <td><b><?php echo $data->id_calon ?></b></td>
                </tr>
                <tr>
                  <td width="200px">Nama Calon Karyawan</td>
                  <td>:</td>
                  <td><?php echo $data->nm_calon ?></td>
                </tr>
                 <tr>
                  <td width="200px">Tanggal Lahir</td>
                  <td>:</td>
                  <td><?php echo $data->tgl_lahir ?></td>
                </tr>
                 <tr>
                  <td width="200px">Alamat</td>
                  <td>:</td>
                  <td><?php echo $data->alamat ?></td>
                </tr>
                 <tr>
                  <td width="200px">Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo $data->jk ?></td>
                </tr>
                 <tr>
                  <td width="200px">Email</td>
                  <td>:</td>
                  <td><?php echo $data->email ?></td>
                </tr>
                 <tr>
                  <td width="200px">Nomor Telepon</td>
                  <td>:</td>
                  <td><?php echo $data->no_telp ?></td>
                </tr>
                 <tr>
                  <td width="200px">Pendidikan Terakhir</td>
                  <td>:</td>
                  <td><?php echo $data->pendidikan_terakhir ?></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>