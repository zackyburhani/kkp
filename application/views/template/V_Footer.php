<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/demo.js') ?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>

<!-- CHART -->
<script src="<?php echo base_url('/assets/Highcharts-6.1.0/code/highcharts.js')?>"></script>
<script src="<?php echo base_url('/assets/Highcharts-6.1.0/code/modules/data.js')?>"></script>
<script src="<?php echo base_url('/assets/Highcharts-6.1.0/code/modules/drilldown.js')?>"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#datatableKaryawan').DataTable();
    $('#datatableKriteria').DataTable();
    $('#datatableSubkriteria').DataTable();
} );
</script>

<script> 
  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
  }, 3000); 
</script>

<script type="text/javascript">
  $('#myModal').modal('show');
</script>

<!-- CHART -->
<script type="text/javascript">

// Create the chart
Highcharts.chart('hasil_akhir_saw', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Hasil Perangkingan'
    },
    subtitle: {
        text: 'Periode Masuk <?php echo tanggal($periode) ?>'
    },
    xAxis: {
        type: 'category'
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.4f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.4f}<br/>'
    },

    "series": [
        {
            "name": "Persentase Perangkingan",
            "colorByPoint": true,
            "data": [
                <?php 
                // data yang diambil dari database
                if(count($chart)>0)
                {
                    foreach ($chart as $data) {
                        echo "['" .ucwords($data->nm_calon) . "'," . $data->hasil_akhir ."],\n";
                    }
                }
            ?>
            ]
        }
    ]
});
</script>

</body>
</html>