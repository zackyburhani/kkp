<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Data Matriks Perbandingan Kriteria</b></small>
    </h1>
  </section>

<section class="content">
    
<?php if($this->session->flashdata('pesan') == TRUE ) { ?>
<div class="row">
  <div class="col-md-12">
  <div class="alert alert-success fade in" id="alert">
    <p><center><b><?php echo $this->session->flashdata('pesan') ?></b></center></p>
  </div>
</div>
</div>
<?php } ?>

<?php if($this->session->flashdata('pesanGagal') == TRUE ) { ?>
<div class="row">
  <div class="col-md-12">
  <div class="alert alert-danger" id="alert">
    <p><center><b><?php echo $this->session->flashdata('pesanGagal') ?></b></center></p>
  </div>
</div>
</div>
<?php } ?>


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Masukkan Nilai Banding</a></li>
                <li><a href="#tab_2" data-toggle="tab">Matriks Banding</a></li>
                <li><a href="#tab_3" data-toggle="tab">Eigenvector</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="container-fluid" style="margin-bottom: 10px;">
                    <center><b>Masukkan Nilai Perbandingan Kriteria</b></center>
                    <hr>
                  </div>       
                  <form method="POST" action="<?php echo base_url('C_PerbandinganKriteria/perbandinganMatriks') ?>">
                    
                    <div class="row" style="margin-bottom: 10px">
                      <div class="col-md-4">
                        <center><b>Kriteria</b></center>
                      </div>
                      <div class="col-md-4">
                        <center><b>Nilai Banding</b></center>
                      </div>
                      <div class="col-md-4">
                        <center><b>Kriteria</b></center>
                      </div>
                    </div>

                    <?php foreach($getAllKriteria as $row) { ?>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <div class="custom-select">
                              <select class="form-control" name="K_<?php echo $row->kd_kriteria; ?>">
                                <?php if($getAllKriteria == null) { ?>
                                  <option value="">-</option>
                                <?php } else { ?>
                                  <?php foreach($getAllKriteria as $data){ ?>
                                    <option value="<?php echo $data->kd_kriteria; ?>"><?php echo $data->nm_kriteria; ?></option>
                                  <?php } ?>  
                                <?php } ?>
                              </select>
                             </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <div class="custom-select">
                              <select class="form-control" name="<?php echo $row->kd_kriteria ?>">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                              </select>
                             </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <div class="custom-select">
                              <select class="form-control" name="K2_<?php echo $row->kd_kriteria; ?>">
                                <?php if($getAllKriteria == null) { ?>
                                  <option value="">-</option>
                                <?php } else { ?>
                                  <?php foreach($getAllKriteria as $data){ ?>
                                    <option value="<?php echo $data->kd_kriteria; ?>"><?php echo $data->nm_kriteria; ?></option>
                                  <?php } ?>  
                                <?php } ?>
                              </select> 
                             </div>
                           </div>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="modal-footer" style="margin-top: 30px">
                      <a href="<?php echo site_url('C_PerbandinganKriteria/batal') ?>" type="button" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
                      <button type="submit" class="btn btn-success"><i class="fa fa-gears"></i> Proses</button>
                    </div>
                  </form>
                </div>

                <div class="tab-pane" id="tab_2">
                  <div class="container-fluid" style="margin-bottom: 10px;">
                    <center><b>Matriks Perbandingan Kriteria</b></center>
                    <hr>
                  </div>
                  <form action="<?php echo site_url('C_PerbandinganKriteria/simpanEigenvector') ?>" method="POST">
                  <?php if(isset($matriksA)) { ?>
                    <table style="table-layout:fixed" class="table table-striped table-bordered">
                      <tr>
                        <td></td>
                        <?php $kd = 1; ?>
                        <?php foreach($getAllKriteria as $data) { ?>
                          <th><center><?php echo $data->nm_kriteria ?></center></th>
                          <input type="hidden" name="<?php echo "K".$kd++ ?>" value="<?php echo $data->kd_kriteria; ?>">
                        <?php } ?>
                      </tr>
                      <?php foreach($matriksA as $i => $value) { ?>
                        <tr>
                          <td></td>
                            <?php foreach($matriksA as $j => $value ) { ?>
                              <td align="center"><?php echo round($matriksA[$i][$j],4) ?></td>
                            <?php } ?>
                        </tr>
                      <?php } ?>
                    </table>

                    <!-- Table Tambahan -->
                    <table style="width: 250px;margin-top: -169px" class="table table-striped table-bordered">
                      <tr>
                        <td>Kriteria</td>
                      </tr>
                      <?php foreach($getAllKriteria as $data) { ?>
                      <tr>
                        <td><b><?php echo $data->nm_kriteria ?></b></td>
                      </tr>
                      <?php } ?>
                    </table>

                  <?php } else { ?>
                    <h3><center><i>Data Belum Dimasukkan</i></center></h3>
                  <?php } ?>
                
                </div>

                <div class="tab-pane" id="tab_3">
                  <div class="container-fluid" style="margin-bottom: 10px;">
                    <center><b>Eigenvector Kriteria</b></center>
                  </div>

                  <hr>
                  
                  <?php if(isset($eigenvector)) { ?>
                    <table style="table-layout:fixed" class="table table-striped table-bordered">
                      <tr>
                        <td width="328px"></td>
                        <th style="padding-left: -100px"><center>Nilai Banding</center></th>
                        <th></th>
                      </tr>
                      <?php foreach($penjumlahanMatriks as $i => $value) { ?>
                        <tr>
                          <td><b></b></td>
                          <td><center><?php echo round($penjumlahanMatriks[$i],4) ?></center></td>
                        </tr>
                      <?php } ?>
                    </table>

                    <div class="col-sm-offset-8">
                      <table style="width: 334px; margin-left: -4px; margin-top: -169px" class="table table-striped table-bordered">
                        <tr>
                          <th><center>Eigenvector</center></th>
                        </tr>
                          <?php $kd = 1; ?>
                            <?php foreach($eigenvector as $j => $value) { ?>
                            <tr>
                              <td><center><?php echo round($eigenvector[$j],4) ?></center></td>
                                <input type="hidden" name="<?php echo "E".$kd++ ?>" value="<?php echo round($eigenvector[$j],4) ?>">
                            </tr>
                          <?php } ?>                    
                        </table>

                        <!-- Table Tambahan -->
                        <table style="width: 328px;margin-left: -665px; margin-top: -169px" class="table table-striped table-bordered">
                          <tr>
                            <td>Kriteria</td>
                          </tr>
                          <?php foreach($getAllKriteria as $data) { ?>
                          <tr>
                            <td><b><?php echo $data->nm_kriteria ?></b></td>
                          </tr>
                          <?php } ?>
                        </table>

                        <div class="modal-footer" style="margin-top: 30px">
                          <a href="<?php echo site_url('C_PerbandinganKriteria/batal') ?>" type="button" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Eigenvector</button>
                        </div>
                      </form>

                      <?php } else { ?>
                        <h3><center><i>Data Belum Dimasukkan</i></center></h3>
                      <?php } ?>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>