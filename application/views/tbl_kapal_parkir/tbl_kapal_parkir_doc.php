<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_kapal_parkir List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kapal</th>
		<th>Tanggal Parkir</th>
		<th>Durasi Parkir</th>
		<th>Lokasi Parkir</th>
		<th>Biaya Parkir</th>
		<th>Alasan Parkir</th>
		
            </tr><?php
            foreach ($tbl_kapal_parkir_data as $tbl_kapal_parkir)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kapal_parkir->id_kapal ?></td>
		      <td><?php echo $tbl_kapal_parkir->tanggal_parkir ?></td>
		      <td><?php echo $tbl_kapal_parkir->durasi_parkir ?></td>
		      <td><?php echo $tbl_kapal_parkir->lokasi_parkir ?></td>
		      <td><?php echo $tbl_kapal_parkir->biaya_parkir ?></td>
		      <td><?php echo $tbl_kapal_parkir->alasan_parkir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>