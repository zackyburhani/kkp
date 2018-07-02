<!-- <div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Laporan Rekapitulasi Penilaian</b></small>
    </h1>
  </section>

<section class="content">
    
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text fa-fw"></i> Laporan</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <div class="row">
              <div  class="col-md-6">
                <label class="col-sm-3 control-label">Tanggal Awal</label>
                  <div class="input-group col-sm-9">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker">
                  </div>
              </div>
              <div class="col-md-6">
                <label class="col-sm-3 control-label">Tanggal Akhir</label>
                  <div class="input-group col-sm-9">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                      <input type="date" class="form-control pull-right" id="datepicker">
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <center>
            <button type="submit" class="btn btn-danger" style="margin-left: 10px"><i class="fa fa-print"></i> Pdf</button>
            <button type="submit" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-print"></i> Excel</button>
            <button type="submit" class="btn btn-primary" style="margin-left: 10px"><i class="fa fa-print"></i> Word</button>
          </center>
        </div>

      </div>
      
      </div>  
    </div>
  </div>
</section> -->

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Laporan Rekapitulasi Penilaian</b></small>
    </h1>
  </section>

<section class="content">
  
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text fa-fw"></i> Laporan Rekapitulasi Penilaian</h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <div class="row">
              <div  class="col-md-6">
                <label class="col-sm-3 control-label">Tanggal Periode</label>
                <form action="<?php echo site_url('C_LapRekapitulasiPenilaian/periode') ?>" method="GET">
                  <div class="input-group col-sm-9">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" name="periode_masuk" class="form-control pull-right" id="datepicker">
                  </div>
              </div>
              <div class="col-md-2">
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Pilih</button>
              
              </div>
              <?php if(isset($periode)){?>
              <div class="col-md-4">
               </div>
            <?php } ?>
              </form>
            </div>
          </div>
        </div>
        
        <div class="box-footer">
          <center>
          <form action="<?php echo site_url('C_LapRekapitulasiPenilaian/cetaklaporanrank') ?>" method="GET">
          <button type="submit" name="periode" class="col-md-3 btn btn-danger" style="margin-left: 10px"><i class="fa fa-print"></i> Pdf</button>
              <button type="submit" class="col-md-3 btn btn-success" style="margin-left: 10px"><i class="fa fa-print"></i> Excel</button>
              <button type="submit" class="col-md-3 btn btn-primary" style="margin-left: 10px"><i class="fa fa-print"></i> Word</button>
           
            <?php if(isset($periode)){?>
           <input type="hidden" name="periode" value="<?php echo $periode?>">
          <?php } ?>
            </form>
          </center>
        </div>

      </div>
      
      </div>  
    </div>
  

 <?php if(isset($getLapRekapitulasiPenilaian)){?>
<div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3><center> Preview Laporan</center></h3>
        </div>
        
        <div class="box-body">
        <br>
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" >
              <thead>
                <tr>
                  <th width="30px"><center>ID Calon</center></th>
                  <th width="30px"><center>Nama</center></th>
                  <th width="30px"><center>Jurusan</center></th>
                  <th width="30px"><center>Skill</center></th>
                  <th width="30px"><center>Tanggung Jawab</center></th>
                  <th width="30px"><center>Kesiapan Kerja</center></th>
                  <th width="30px"><center>Perilaku</center></th>
                  <th width="30px"><center>Ketelitian</center></th>
                  <th width="30px"><center>Kejujuran</center></th>
                  <th width="30px"><center>Hasil</center></th>
                  
                  <!-- <th width="59px" align="center;"> <center>Tambah Nilai</center> </th>
                </tr> -->
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach($getLapRekapitulasiPenilaian as $data){ ?>
                <tr>
                  <td><?php echo $data->calon_id; ?></td>
                  <td><?php echo $data->nm_calon; ?></td>
                  <td><?php echo $data->jurusan; ?></td>
                  <td><?php echo $data->skill; ?></td>
                  <td><?php echo $data->tanggung_jawab; ?></td>
                  <td><?php echo $data->kesiapan_kerja; ?></td>
                  <td><?php echo $data->perilaku; ?></td>
                  <td><?php echo $data->ketelitian; ?></td>
                  <td><?php echo $data->kejujuran; ?></td>
                  <td><?php echo $data->hasil; ?></td>
    
                </tr>
                <?php }}  ?>
              </tbody>
            </table>
            <br>
        </div>
      </div>
    </div>  
  </div>
</div>

</section>



