<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Data Matriks Perbandingan Subkriteria</b></small>
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

                  <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title"><b>Nilai Perbandingan Subkriteria <i>Kompetensi</i></b></h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div>

                    <form method="POST" action="<?php echo base_url('C_PerbandinganSubkriteria/perbandinganMatriks') ?>">
                      <div class="box-body">
                        <table>
                          <tr>
                            <td><b>Skill</b></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="9" required></td>
                            <td><b>Jurusan</b></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td align="center" width="50">9</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">1</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">9</td>
                            <td></td>
                          </tr>

                          <tr>
                            <td width="110"><b>Tanggung Jawab</b></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="7" required</td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="9" required></td>
                            <td><b>Jurusan</b></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td align="center" width="50">9</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">1</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">9</td>
                            <td></td>
                          </tr>

                          <tr>
                            <td><b>Tanggung Jawab</b></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="9" required></td>
                            <td><b>Skill</b></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td align="center" width="50">9</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">1</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">9</td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Nilai Perbandingan Subkriteria <i>Interview</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table>
                        <tr>
                          <td><b>Perilaku</b></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="9" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="8" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="7" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="6" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="5" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="4" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="3" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="2" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="1" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="2" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="3" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="4" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="5" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="6" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="7" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="8" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="9" required></td>
                          <td width="100"><b>Kesiapan Kerja</b></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td align="center" width="50">9</td>
                          <td align="center" width="50">8</td>
                          <td align="center" width="50">7</td>
                          <td align="center" width="50">6</td>
                          <td align="center" width="50">5</td>
                          <td align="center" width="50">4</td>
                          <td align="center" width="50">3</td>
                          <td align="center" width="50">2</td>
                          <td align="center" width="50">1</td>
                          <td align="center" width="50">2</td>
                          <td align="center" width="50">3</td>
                          <td align="center" width="50">4</td>
                          <td align="center" width="50">5</td>
                          <td align="center" width="50">6</td>
                          <td align="center" width="50">7</td>
                          <td align="center" width="50">8</td>
                          <td align="center" width="50">9</td>
                          <td></td>
                        </tr>
                      </table>
                      </div>
                    </div>

                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Nilai Perbandingan Subkriteria <i>Konsistensi</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table>
                          <tr>
                            <td><b>Kejujuran</b></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="9" required></td>
                            <td width="100"><b>Ketelitian</b></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td align="center" width="50">9</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">1</td>
                            <td align="center" width="50">2</td>
                            <td align="center" width="50">3</td>
                            <td align="center" width="50">4</td>
                            <td align="center" width="50">5</td>
                            <td align="center" width="50">6</td>
                            <td align="center" width="50">7</td>
                            <td align="center" width="50">8</td>
                            <td align="center" width="50">9</td>
                            <td></td>
                          </tr>

                        </table>
                      </div>
                      <div class="modal-footer" style="margin-top: 30px">
                        <a href="<?php echo site_url('C_PerbandinganSubkriteria/batal') ?>" type="button" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-gears"></i> Proses</button>
                      </div>
                  </div>
                </div>
              </form>

                <div class="tab-pane" id="tab_2">
                  <form action="<?php echo site_url('C_PerbandinganSubkriteria/simpanEigenvector') ?>" method="POST">
                  <?php if(isset($matriksA)) { ?>
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Matriks Perbandingan Subkriteria <i>Kompetensi</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td></td>
                            <?php $kd = 1; ?>
                            <?php foreach($getSubkriteria as $data) { ?>
                              <th><center><?php echo $data->nm_subkriteria ?></center></th>
                              <input type="hidden" name="<?php echo "SK_kompetensi".$kd++ ?>" value="<?php echo $data->kd_kriteria; ?>">
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
                        <table style="width: 242px;margin-top: -149px" class="table table-striped table-bordered">
                          <tr>
                            <td>Subkriteria</td>
                          </tr>
                          <?php foreach($getSubkriteria as $data) { ?>
                          <tr>
                            <td><b><?php echo $data->nm_subkriteria ?></b></td>
                          </tr>
                          <?php } ?>
                        </table>                    
                      </div>
                    </div>

                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Matriks Perbandingan Subkriteria <i>Interview</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td></td>
                            <?php foreach($getSubkriteria2 as $data) { ?>
                              <th><center><?php echo $data->nm_subkriteria ?></center></th>
                            <?php } ?>
                          </tr>
                          <?php foreach($matriksA2 as $i => $value) { ?>
                            <tr>
                              <td></td>
                                <?php $kd = 1; ?>
                                <?php foreach($matriksA2 as $j => $value ) { ?>
                                  <td align="center"><?php echo round($matriksA2[$i][$j],4) ?></td>
                                  <input type="hidden" name="<?php echo "SK_interview".$kd++ ?>" value="<?php echo $data->kd_kriteria; ?>">
                                <?php } ?>
                            </tr>
                          <?php } ?>
                        </table>

                        <!-- Table Tambahan -->
                        <table style="width: 322px;margin-top: -112px" class="table table-striped table-bordered">
                          <tr>
                            <td>Subkriteria</td>
                          </tr>
                          <?php foreach($getSubkriteria2 as $data) { ?>
                            <tr>
                              <td><b><?php echo $data->nm_subkriteria ?></b></td>
                            </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </div>

                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Matriks Perbandingan Subkriteria <i>Konsistensi</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td></td>
                            <?php $kd = 1; ?>
                            <?php foreach($getSubkriteria3 as $data) { ?>
                              <th><center><?php echo $data->nm_subkriteria ?></center></th>
                              <input type="hidden" name="<?php echo "SK_konsistensi".$kd++ ?>" value="<?php echo $data->kd_kriteria; ?>">
                            <?php } ?>
                          </tr>
                          <?php foreach($matriksA3 as $i => $value) { ?>
                            <tr>
                              <td></td>
                                <?php foreach($matriksA3 as $j => $value ) { ?>
                                  <td align="center"><?php echo round($matriksA3[$i][$j],4) ?></td>
                                <?php } ?>
                            </tr>
                          <?php } ?>
                        </table>

                        <!-- Table Tambahan -->
                        <table style="width: 322px;margin-top: -112px" class="table table-striped table-bordered">
                          <tr>
                            <td>Subkriteria</td>
                          </tr>
                          <?php foreach($getSubkriteria3 as $data) { ?>
                          <tr>
                            <td><b><?php echo $data->nm_subkriteria ?></b></td>
                          </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </div>
                  <?php } else { ?>
                    <h3><center><i>Data Belum Dimasukkan</i></center></h3>
                  <?php } ?>
                </div>

                <div class="tab-pane" id="tab_3">
                  <?php if(isset($matriksA)) { ?>
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Eigenvector Kriteria Subkriteria <i>Kompetensi</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td width="328px"></td>
                            <th style="padding-left: 10px"><center>Nilai Banding</center></th>
                            <th></th>
                          </tr>
                            <?php foreach($penjumlahanMatriks as $i => $value) { ?>
                            <tr>
                              <td><b></b></td>
                              <td><center><?php echo round($penjumlahanMatriks[$i],4) ?></center></td>
                            </tr>
                          <?php } ?>
                        </table>

                        <table style="width: 320px; margin-left: 644px; margin-top: -149px" class="table table-striped table-bordered">
                          <tr>
                            <th><center>Eigenvector</center></th>
                          </tr>
                            <?php $kd = 1; ?>
                            <?php foreach($eigenvector as $j => $value) { ?>
                            <tr>
                              <td>
                                <center><?php echo round($eigenvector[$j],4) ?></center></td>
                                <input type="hidden" name="<?php echo "SE_kompetensi".$kd++ ?>" value="<?php echo round($eigenvector[$j],4) ?>">
                            </tr>
                          <?php } ?>               
                        </table>

                        <!-- Table Tambahan -->
                        <table style="width: 330px; margin-top: -149px" class="table table-striped table-bordered">
                          <tr>
                            <td>Subkriteria</td>
                          </tr>
                          <?php foreach($getSubkriteria as $data) { ?>
                          <tr>
                            <td><b><?php echo $data->nm_subkriteria ?></b></td>
                          </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </div>

                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Eigenvector Kriteria Subkriteria <i>Interview</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td width="328px"></td>
                            <th style="padding-left: 10px"><center>Nilai Banding</center></th>
                            <th></th>
                          </tr>
                            <?php foreach($penjumlahanMatriks2 as $i => $value) { ?>
                              <tr>
                                <td><b></b></td>
                                <td><center><?php echo round($penjumlahanMatriks2[$i],4) ?></center></td>
                              </tr>
                            <?php } ?>
                        </table>

                        <table style="width: 320px; margin-left: 644px; margin-top: -112px" class="table table-striped table-bordered">
                          <tr>
                            <th><center>Eigenvector</center></th>
                          </tr>
                            <?php $kd = 1; ?>
                              <?php foreach($eigenvector2 as $j => $value) { ?>
                              <tr>
                                <td><center><?php echo round($eigenvector2[$j],4) ?></center></td>
                                  <input type="hidden" name="<?php echo "SE_interview".$kd++ ?>" value="<?php echo round($eigenvector2[$j],4) ?>">
                              </tr>
                            <?php } ?>                
                          </table>

                        <!-- Table Tambahan -->
                          <table style="width: 330px; margin-top: -112px" class="table table-striped table-bordered">
                            <tr>
                              <td>Subkriteria</td>
                            </tr>
                            <?php foreach($getSubkriteria2 as $data) { ?>
                            <tr>
                              <td><b><?php echo $data->nm_subkriteria ?></b></td>
                            </tr>
                            <?php } ?>
                          </table>

                      </div>
                    </div>

                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Eigenvector Kriteria Subkriteria <i>Konsistensi</i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td width="328px"></td>
                            <th style="padding-left: 10px"><center>Nilai Banding</center></th>
                            <th></th>
                          </tr>
                            <?php foreach($penjumlahanMatriks3 as $i => $value) { ?>
                              <tr>
                                <td><b></b></td>
                                <td><center><?php echo round($penjumlahanMatriks3[$i],4) ?></center></td>
                              </tr>
                            <?php } ?>
                        </table>

                        <table style="width: 320px; margin-left: 644px; margin-top: -112px" class="table table-striped table-bordered">
                          <tr>
                            <th><center>Eigenvector</center></th>
                          </tr>
                            <?php $kd = 1; ?>
                              <?php foreach($eigenvector3 as $j => $value) { ?>
                              <tr>
                                <td><center><?php echo round($eigenvector3[$j],4) ?></center></td>
                                  <input type="hidden" name="<?php echo "SE_konsistensi".$kd++ ?>" value="<?php echo round($eigenvector3[$j],4) ?>">
                              </tr>
                            <?php } ?>                
                          </table>

                        <!-- Table Tambahan -->
                          <table style="width: 330px; margin-top: -112px" class="table table-striped table-bordered">
                            <tr>
                              <td>Subkriteria</td>
                            </tr>
                            <?php foreach($getSubkriteria3 as $data) { ?>
                            <tr>
                              <td><b><?php echo $data->nm_subkriteria ?></b></td>
                            </tr>
                            <?php } ?>
                          </table>

                      </div>
                    </div>

                    <div class="modal-footer">
                      <a href="<?php echo site_url('C_PerbandinganSubkriteria/batal') ?>" type="button" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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
</section>
