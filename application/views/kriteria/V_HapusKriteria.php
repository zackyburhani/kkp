<?php foreach($getAllKriteria as $data){ ?>
<div class="modal fade" id="ModalHapusKriteria<?php echo $data->kd_kriteria ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash fa-fw"></i>Konfirmasi Hapus</h4>
      </div>
      <div class='modal-body'>Anda yakin ingin menghapus <i><?php echo $data->kd_kriteria ?></i> dengan nama <b><?php echo $data->nm_kriteria ?></b> ?
      </div>
      <div class='modal-footer'>
        <form class="" action="<?php echo site_url('C_Kriteria/deleteKriteria') ?>" method="post">
          <input type="hidden" value="<?php echo $data->kd_kriteria ?>" name="kd_kriteria">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>Batal</button>
          <button class="btn btn-danger" aria-label="Delete" type="submit" name="hapus"><i class="fa fa-trash fa-fw"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>