<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
?>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
        <style>
            h2{
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
        <table class="mytable">
            <tr>
                <th id="th">No. </th>
                <th>ID Calon</th>
                <th>Nama Calon</th>
                <th>Hasil</th>
                <th>Keterangan</th>
            </tr>
            <?php $no=1; ?>
            <?php foreach($word as $data) { ?>
            <tr>
                <td><center><?php echo $no++."." ?></center></td>
                <td><center><?php echo $data->id_calon ?></center></td>
                <td><?php echo ucwords($data->nm_calon) ?></td>
                <td><center><?php echo $data->hasil_akhir ?></center></td>
                <?php if($data->keterangan != null) { ?>
                    <td><center><?php echo $data->keterangan ?></center></td>
                <?php } else { ?>
                    <td><center><?php echo "Tidak Lolos" ?></center></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>