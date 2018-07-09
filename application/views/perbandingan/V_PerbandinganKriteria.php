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
                    
                    <table>
                          <tr>
                            <td><b><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K1'); echo $nama_kriteria->nm_kriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="k1" value="-9" required></td>
                            <td><b><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K2'); echo $nama_kriteria->nm_kriteria ?></b></td>
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
                            <td width="110"><b><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K3'); echo $nama_kriteria->nm_kriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="7" required</td>
                            <td align="center" width="50"><input type="radio" name="k2" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="k2" value="-9" required></td>
                            <td><b><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K1'); echo $nama_kriteria->nm_kriteria ?></b></td>
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
                            <td><b><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K3'); echo $nama_kriteria->nm_kriteria ?></b></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="9" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="8" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="7" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="6" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="5" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="4" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="3" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="2" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="1" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-2" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-3" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-4" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-5" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-6" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-7" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-8" required></td>
                            <td align="center" width="50"><input type="radio" name="k3" value="-9" required></td>
                            <td><b><?php $nama_kriteria = $this->M_Kriteria->getNamaKriteria('K2'); echo $nama_kriteria->nm_kriteria ?></b></td>
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
                        <td>Kriteria</td>
                        <?php $kd_banding = 1; ?>
                        <?php $kd = 1; ?>
                        <?php $array = array(); ?>
                        <?php foreach($getAllKriteria as $data) { ?>
                          <th><center><?php echo $data->nm_kriteria ?></center></th>
                          <input type="hidden" name="<?php echo "K".$kd++ ?>" value="<?php echo $data->kd_kriteria; ?>">
                        <?php } ?>
                      </tr>
                      <?php foreach($view_perbandingan as $i => $value) { ?>
                        <tr>
                          <td><b><?php echo $view_perbandingan[$i][0] ?></b></td>
                            <?php foreach($view_perbandingan as $j => $value ) { ?>
                              <td align="center"><?php echo round($matriksA[$i][$j],4) ?></td>
                              <?php $array[] = $matriksA[$i][$j] ?>
                              <input type="hidden" name="nilaiBanding<?php echo $kd_banding++ ?>" value="<?php echo $matriksA[$i][$j] ?>">
                            <?php } ?>
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
                  
                  <?php if(isset($view_eigenvector)) { ?>
                    <table style="table-layout:fixed" class="table table-striped table-bordered">
                      <tr>
                        <th>Kriteria</th>
                        <th><center>Nilai Banding</center></th>
                        <th><center>Eigenvector</center></th>
                      </tr>
                      <?php $eig = 1; ?>
                      <?php foreach($view_eigenvector as $i => $value) { ?>
                        <tr>
                          <td><?php echo $view_eigenvector[$i][0] ?></td>
                          <td><center><?php echo round($view_eigenvector[$i][1],4) ?></center></td>
                          <td><center><?php echo round($view_eigenvector[$i][2],4) ?></center></td>
                          <input type="hidden" name="E<?php echo $eig++ ?>" value="<?php echo $view_eigenvector[$i][2] ?>">
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