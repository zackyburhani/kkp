<?php foreach($getAllSubkriteria as $data){ ?>
  <div class="modal fade" id="ModalUpdateSubkriteria<?php echo $data->kd_subkriteria ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-file-o"></i> Ubah Data Subkriteria</h4>
        </div>
        <form method="POST" action="<?php echo site_url('')?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group"><label>Nama Kriteria</label>
              <div class="custom-select my-1 mr-sm-2">
                <select class="form-control" name="kriteria">
                  <?php foreach($getNmKSubkriteria as $data){ ?>
                   <option <?php if( $data->kd_kriteria=='K1'){echo "selected"; } ?> value="<?php echo $data->kd_kriteria ?>"><?php echo $data->nm_kriteria ?></option>
                   <option <?php if( $data->kd_kriteria=='K2'){echo "selected"; } ?> value="<?php echo $data->kd_kriteria ?>"><?php echo $data->nm_kriteria ?></option>
                   <option <?php if( $data->kd_kriteria=='K3'){echo "selected"; } ?> value="<?php echo $data->kd_kriteria ?>"><?php echo $data->nm_kriteria ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            
            <div class="form-group"><label>Kode Subkriteria</label>
              <input required class="form-control required text-capitalize" value="" data-placement="top" data-trigger="manual" type="text" name="kd_Subkriteria">
            </div>
                  
            <div class="form-group"><label>Nama Subkriteria</label>
              <input required class="form-control required text-capitalize" placeholder="Input Nama Subkriteria" data-placement="top" data-trigger="manual" type="text" name="nm_subkriteria">
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
<?php } ?>