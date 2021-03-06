<div class="modal fade" id="ModalEntryKaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user fa-fw"></i>Tambah Data Calon Karyawan</h4>
      </div>
      <form method="POST" action="<?php echo site_url('C_Karyawan/tambahKaryawan')?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>ID Calon</label>
            <input required class="form-control required text-capitalize" value="<?php echo $getKodeCalon ?>" data-placement="top" data-trigger="manual" type="text" name="id_calon" readonly>
          </div>

          <div class="form-group"><label>Periode Masuk</label>
            <input required class="form-control required text-capitalize" value="<?php echo date('mdY') ?>" data-placement="top" data-trigger="manual" type="date" name="periode_masuk">
          </div>
                
          <div class="form-group"><label>Nama Calon Karyawan</label>
            <input required class="form-control required text-capitalize" placeholder="Input Nama Calon Karyawan" data-placement="top" data-trigger="manual" type="text" name="nm_calon">
          </div>

          <div class="form-group"><label>Tanggal Lahir</label>
            <input required class="form-control" placeholder="yyyy-mm-dd" data-placement="top" data-trigger="manual" type="date" name="tgl_lahir">
          </div>

          <div class="form-group"><label>Alamat</label>
            <textarea class="form-control" name="alamat" required></textarea>
          </div>

          <div class="form-group"><label>Jenis Kelamin</label>
            <div class="radio">
              <label class="radio-inline"><input type="radio" value="L" name="jk">Laki-laki</label>
              <label class="radio-inline"><input type="radio" value="P" name="jk">Perempuan</label>
            </div>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input required class="form-control required" placeholder="Input Email" data-placement="top" data-trigger="manual" type="text" name="email" id="email">
          </div>

          <div class="form-group">
            <label>Nomor Telepon</label>
            <input required class="form-control required" placeholder="Input Nomor Telepon" data-placement="top" data-trigger="manual" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="no_telp" id="no_telp" maxlength="13">
          </div>

          <div class="form-group"><label>Pendidikan Terakhir</label>
            <div class="custom-select my-1 mr-sm-2">
              <select class="form-control" name="pendidikanTerakhir">
                <option value="SMA">SMA</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>