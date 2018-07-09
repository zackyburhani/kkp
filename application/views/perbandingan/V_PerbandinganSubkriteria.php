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
                      <h3 class="box-title"><b>Nilai Perbandingan Subkriteria <i><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K1'); echo $nama_kriteria->nm_kriteria ?></i></b></h3>

                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <form method="POST" action="<?php echo base_url('C_PerbandinganSubkriteria/perbandinganMatriks') ?>">
                      <div class="box-body">
                        <table>
                          <tr>
                            <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK2'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk1" value="-9" required></td>
                            <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK1'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
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
                            <td width="110"><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK3'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="7" required</td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk2" value="-9" required></td>
                            <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK1'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
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
                            <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK3'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk3" value="-9" required></td>
                            <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK2'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
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
                        <h3 class="box-title"><b>Nilai Perbandingan Subkriteria <i><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K2'); echo $nama_kriteria->nm_kriteria ?></i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table>
                        <tr>
                          <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK5'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="9" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="8" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="7" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="6" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="5" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="4" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="3" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="2" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="1" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-2" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-3" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-4" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-5" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-6" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-7" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-8" required></td>
                          <td align="center" width="50"><input type="radio" name="sk4" value="-9" required></td>
                          <td width="100"><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK4'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
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
                            <td><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK7'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="sk5" value="-9" required></td>
                            <td width="100"><b><?php $nama_subkriteria = $this->M_Subkriteria->getNamaSubkriteria('SK6'); echo $nama_subkriteria->nm_subkriteria ?></b></td>
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
                    <?php $kd = 1; ?>
                    <?php $kd_banding2a = 1; ?>
                      <?php foreach ($getAllSubkriteria as $hitung) { ?>
                        <input type="hidden" name="<?php echo "SK".$kd++ ?>" value="<?php echo $hitung->kd_subkriteria; ?>">
                      <?php } ?>
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><b>Matriks Perbandingan Subkriteria <i><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K3'); echo $nama_kriteria->nm_kriteria ?></i></b></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>

                      <div class="box-body">
                        <table style="table-layout:fixed" class="table table-striped table-bordered">
                          <tr>
                            <td>Subkriteria</td>
                            <?php foreach($getSubkriteria as $data) { ?>
                              <th><center><?php echo $data->nm_subkriteria ?></center></th>
                              <input type="hidden" name="kriteria1" value="<?php echo $data->kd_kriteria ?>">
                            <?php } ?>
                          </tr>
                          <?php foreach($view_subkriteria1 as $i => $value) { ?>
                          <tr>
                            <td><b><?php echo $view_subkriteria1[$i][0] ?></b></td>
                              <?php foreach($matriksA as $j => $value ) { ?>
                                <td align="center"><?php echo round($matriksA[$i][$j],4) ?></td>
                                <input type="hidden" name="nilaiBanding2a<?php echo $kd_banding2a++ ?>" value="<?php echo $matriksA[$i][$j] ?>">
                              <?php } ?>
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
                            <td>Subkriteria</td>
                            <?php $kd_banding2b = 1; ?>
                            <?php foreach($getSubkriteria2 as $data) { ?>
                              <th><center><?php echo $data->nm_subkriteria ?></center></th>
                              <input type="hidden" name="kriteria2" value="<?php echo $data->kd_kriteria ?>">
                            <?php } ?>
                          </tr>
                          <?php foreach($view_subkriteria2 as $i => $value) { ?>
                            <tr>
                              <td><b><?php echo $view_subkriteria2[$i][0] ?></b></td>
                                <?php foreach($matriksA2 as $j => $value ) { ?>
                                  <td align="center"><?php echo round($matriksA2[$i][$j],4) ?></td>
                                  <input type="hidden" name="nilaiBanding2b<?php echo $kd_banding2b++ ?>" value="<?php echo $matriksA2[$i][$j] ?>">
                                <?php } ?>
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
                            <td>Subkriteria</td>
                            <?php $kd_banding2c = 1; ?>
                            <?php foreach($getSubkriteria3 as $data) { ?>
                              <th><center><?php echo $data->nm_subkriteria ?></center></th>
                              <input type="hidden" name="kriteria3" value="<?php echo $data->kd_kriteria ?>">
                            <?php } ?>
                          </tr>
                          <?php foreach($matriksA3 as $i => $value) { ?>
                            <tr>
                              <td><b><?php echo $view_subkriteria3[$i][0] ?></b></td>
                                <?php foreach($matriksA3 as $j => $value ) { ?>
                                  <td align="center"><?php echo round($matriksA3[$i][$j],4) ?></td>
                                  <input type="hidden" name="nilaiBanding2c<?php echo $kd_banding2c++ ?>" value="<?php echo $matriksA3[$i][$j] ?>">
                                <?php } ?>
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
                            <td>Subkriteria</td>
                            <th style="padding-left: 10px"><center>Nilai Banding</center></th>
                            <th><center>Eigenvector</center></th>
                          </tr>
                            <?php $Sub_E1 = 1; ?>
                            <?php foreach($view_eigenvector1 as $i => $value) { ?>
                            <tr>
                              <td><b><?php echo $view_eigenvector1[$i][0] ?></b></td>
                              <td><center><?php echo round($view_eigenvector1[$i][1],4) ?></center></td>
                              <td><center><?php echo round($view_eigenvector1[$i][2],4) ?></center></td>
                              <input type="hidden" name="SE_kompetensi<?php echo $Sub_E1++ ?>" value="<?php echo $view_eigenvector1[$i][2] ?>">
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
                            <td>Subkriteria</td>
                            <th style="padding-left: 10px"><center>Nilai Banding</center></th>
                            <th><center>Eigenvector</center></th>
                          </tr>
                            <?php $Sub_E2 = 1; ?>
                            <?php foreach($view_eigenvector2 as $i => $value) { ?>
                              <tr>
                                <td><b><?php echo $view_eigenvector2[$i][0] ?></b></td>
                                <td><center><?php echo round($view_eigenvector2[$i][1],4) ?></center></td>
                                <td><center><?php echo round($view_eigenvector2[$i][2],4) ?></center></td>
                                <input type="hidden" name="SE_interview<?php echo $Sub_E2++ ?>" value="<?php echo $view_eigenvector2[$i][2] ?>">
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
                          <td>Subkriteria</td>
                            <th style="padding-left: 10px"><center>Nilai Banding</center></th>
                            <th><center>Eigenvector</center></th>
                          </tr>
                            <?php $Sub_E3 =1; ?>
                            <?php foreach($view_eigenvector3 as $i => $value) { ?>
                              <tr>
                                <td><b><?php echo $view_eigenvector3[$i][0] ?></b></td>
                                <td><center><?php echo round($view_eigenvector3[$i][1],4) ?></center></td>
                                <td><center><?php echo round($view_eigenvector3[$i][2],4) ?></center></td>
                                <input type="hidden" name="SE_konsistensi<?php echo $Sub_E3++ ?>" value="<?php echo $view_eigenvector3[$i][2] ?>">
                              </tr>
                            <?php } ?>
                        </table>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <a href="<?php echo site_url('C_PerbandinganSubkriteria/batal') ?>" type="button" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
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
</section>
