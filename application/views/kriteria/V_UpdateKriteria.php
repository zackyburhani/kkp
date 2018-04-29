<div class="modal fade" id="ModalUpdateKriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-file-o"></i> Ubah Data Kriteria</h4>
      </div>
      <form method="POST" action="<?php echo site_url('')?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>Kode Kriteria</label>
            <input required class="form-control required text-capitalize" value="" data-placement="top" data-trigger="manual" type="text" name="kd_kriteria">
          </div>
                
          <div class="form-group"><label>Nama Kriteria</label>
            <input required class="form-control required text-capitalize" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="text" name="nm_kriteria">
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