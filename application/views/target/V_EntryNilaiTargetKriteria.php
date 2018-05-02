<div class="modal fade" id="ModalTambahNilaTargetKriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calculator fa-fw"></i>Tambah Nilai Target Kriteria  </h4>
      </div>
      <form method="POST" action="<?php echo site_url('')?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>Nilai Target</label>
            <input required class="form-control required text-capitalize" placeholder="Masukkan Nilai Target" value="" data-placement="top" data-trigger="manual" type="text" name="nilai_target">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>  