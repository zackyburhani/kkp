<?php foreach($getAllCalon as $data){ ?>
<div class="modal fade" id="ModalUpdateKaryawan<?php echo $data->id_calon ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user fa-fw"></i>Ubah Data Calon Karyawan</h4>
      </div>
      <form method="POST" action="<?php echo site_url('C_Karyawan/updateKaryawan')?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>ID Calon</label>
            <input required class="form-control required text-capitalize" value="<?php echo $data->id_calon ?>" data-placement="top" data-trigger="manual" type="text" name="id_calon" readonly>
          </div>
                
          <div class="form-group"><label>Nama Calon Karyawan</label>
            <input required class="form-control required text-capitalize" value="<?php echo $data->nm_calon ?>"placeholder="Input Nama Calon Karyawan" data-placement="top" data-trigger="manual" type="text" name="nm_calon">
          </div>

          <div class="form-group"><label>Tanggal Lahir</label>
            <input required class="form-control" value="<?php echo $data->tgl_lahir ?>"placeholder="yyyy-mm-dd" data-placement="top" data-trigger="manual" type="date" name="tgl_lahir">
          </div>

          <div class="form-group"><label>Alamat</label>
            <textarea class="form-control" name="alamat" required><?php echo $data->alamat ?></textarea>
          </div>

          <div class="form-group"><label>Jenis Kelamin</label>
            <div class="radio" >
              <label class="radio-inline"><input <?php if( $data->jk=='L'){echo "checked"; } ?> type="radio" value="L" name="jk">Laki-laki</label>
              <label class="radio-inline"><input type="radio" <?php if( $data->jk=='P'){echo "checked"; } ?> value="P" name="jk">Perempuan</label>
            </div>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input required class="form-control required" value="<?php echo $data->email ?>"placeholder="Input Email" data-placement="top" data-trigger="manual" type="text" name="email" id="email">
          </div>

          <div class="form-group">
            <label>Nomor Telepon</label>
            <input required class="form-control required" value="<?php echo $data->no_telp ?>"placeholder="Input Nomor Telepon" data-placement="top" data-trigger="manual" type="text" name="no_telp" id="no_telp" maxlength="13">
          </div>

          <div class="form-group"><label>Pendidikan Terakhir</label>
            <div class="custom-select my-1 mr-sm-2">
              <select class="form-control" name="pendidikanTerakhir">
                <option <?php if( $data->pendidikan_terakhir=='SMA'){echo "selected"; } ?> value="SMA">SMA</option>
                <option <?php if( $data->pendidikan_terakhir=='D3'){echo "selected"; } ?> value="D3">D3</option>
                <option <?php if( $data->pendidikan_terakhir=='S1'){echo "selected"; } ?> value="S1">S1</option>
                <option <?php if( $data->pendidikan_terakhir=='S2'){echo "selected"; } ?> value="S2">S2</option>
                <option <?php if( $data->pendidikan_terakhir=='S3'){echo "selected"; } ?> value="S3">S3</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>