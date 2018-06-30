<?php foreach($nilaiDetail as $data){?>
  <div class="modal fade" tabindex="-1" id="ModalLihatNilai<?php echo $data->id_calon ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><i class="fa fa-user fa-fw"></i> Detil Nilai Calon Karyawan</h3>
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
                  <td><?php echo ucwords($data->nm_calon) ?></td>
                </tr>
                <?php $nilai = $this->M_TargetKriteria->nilai($data->id_calon); ?>
                <?php foreach($nilai as $detil) { ?>
                  <tr>
                    <td width="200px"><?php echo $detil->nm_kriteria ?></td>
                    <td>:</td>
                    <td><?php echo $detil->nilai_target ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>