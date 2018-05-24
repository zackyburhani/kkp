<?php if(isset($getPeriodeCalon)) { ?>
 <?php foreach($getPeriodeCalon as $data) { ?> 
    <div class="modal fade" id="ModalTambahNilaTargetSubkriteria<?php echo $data->id_calon ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calculator fa-fw"></i>Tambah Nilai Target Kriteria  </h4>
          </div>
          <form method="POST" action="<?php echo site_url('C_TargetSubkriteria/simpanTarget')?>" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label class="control-label" style="margin-top: 5px">Nama Kriteria : </label>
                <select class="form-control" style="width: 100%;" name="kd_subkriteria">
                  <?php foreach($getAllSubkriteria as $data2){ ?>
                    <option value="<?php echo $data2->kd_subkriteria; ?>"><?php echo $data2->nm_subkriteria; ?></option>
                  <?php } ?>  
                </select>
              </div>
              
              <div class="form-group"><label>Nilai Target</label>
                <input required class="form-control required text-capitalize" placeholder="Masukkan Nilai Target" data-placement="top" data-trigger="manual" type="text" name="nilai_target2">
                <input required value="<?php echo $data->id_calon; ?>" type="hidden" name="id_calon">
                <input type="hidden" name="periode_masuk" value="<?php echo $data->periode_masuk?>">
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
  <?php } ?>    
<?php } ?>