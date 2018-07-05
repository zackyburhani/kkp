<?php
$tanggal = tanggal($awal)."_Sampai_".tanggal($akhir);
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Rekapitulasi_Nilai_Periode_$tanggal.doc");
?>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
        <style>
            h2,h5{
                text-align: center
            }
            .mytable{
                border:1px solid black; 
                border-collapse: collapse;
                width: 100%;
            }
            .mytable tr th, .mytable tr td{
                border:1px solid black; 
                padding: 5px 10px;
            }
            #th{
                width: 20px
            }
        </style>
    </head>
    <body>
        <h2>PT. Biya Maestro Hardscape</h2>
            <h5>Jl. BPKP No. 37 Sudimara Pinang, Kota Tangerang 
                <br> Telp / Fax : 021-22927310
                <br> E-mail : maestro_hardscape@yahoo.com
            </h5>
        <table class="mytable">
            <tr>
                <th id="th">No. </th>
                <th>ID Calon</th>
                <th>Nama Calon</th>
                <th>Jurusan</th>
                <th>Skill</th>
                <th>Tanggung Jawab</th>
                <th>Kesiapan Kerja</th>
                <th>Perilaku</th>
                <th>Ketelitian</th>
                <th>Kejujuran</th>
                <th>Hasil</th>
            </tr>
            <?php $no=1; ?>
            <?php foreach($word as $data) { ?>
            <tr>
                <td><center><?php echo $no++."." ?></center></td>
                <td><center><?php echo $data->calon_id ?></center></td>
                <td><?php echo $data->nm_calon ?></td>
                <td><center><?php echo $data->jurusan ?></center></td>
                <td><center><?php echo $data->skill?></center></td>
                <td><center><?php echo $data->tanggung_jawab ?></center></td>
                <td><center><?php echo $data->kesiapan_kerja ?></center></td>
                <td><center><?php echo $data->perilaku ?></center></td>
                <td><center><?php echo $data->ketelitian ?></center></td>
                <td><center><?php echo $data->kejujuran ?></center></td>
                <td><center><?php echo $data->hasil ?></center></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>