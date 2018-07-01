<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><b>Halaman Laporan Perangkingan Nilai</b></small>
    </h1>
  </section>

<section class="content">
  
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text fa-fw"></i> Laporan Perangkingan Nilai</h3>
        </div>

        <div class="box-body">
          <div class="form-group">
            <div class="row">
              <div  class="col-md-6">
                <label class="col-sm-3 control-label">Tanggal Periode</label>
                <form action="<?php echo site_url('C_LapPerangkinganNilai/periode') ?>" method="GET">
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
          
          <form action="<?php echo site_url('C_LapPerangkinganNilai/cetaklaporanrank') ?>" method="GET">
          <?php if(isset($periode)){?>
          <button type="submit" name="periode" class="btn btn-danger" style="margin-left: 10px"><i class="fa fa-print"></i> Pdf</button>
              <button type="submit" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-print"></i> Excel</button>
              <button type="submit" class="btn btn-primary" style="margin-left: 10px"><i class="fa fa-print"></i> Word</button>
           
            
           <input type="hidden" name="periode" value="<?php echo $periode?>">
          <?php } ?>
            </form>
          
        </div>

      </div>
      
      </div>  
    </div>
  

 <?php if(isset($getLapPerangkinganNilai)){?>
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
                  <th width="70px"><center>ID Calon</center></th>
                  <th width="200px"><center>Nama</center></th>
                  <th width="30px"><center>Hasil</center></th>
                  <th width="200px"><center>keterangan</center></th>
                  
                  <!-- <th width="59px" align="center;"> <center>Tambah Nilai</center> </th>
                </tr> -->
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach($getLapPerangkinganNilai as $data){ ?>
                <tr>
                  <td><?php echo $data->id_calon; ?></td>
                  <td><?php echo $data->nm_calon; ?></td>
                  <td><?php echo $data->hasil_akhir; ?></td>
                  <td><?php echo $data->keterangan; ?></td>
    
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


