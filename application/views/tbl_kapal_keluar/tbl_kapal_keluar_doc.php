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
        <h2>Tbl_kapal_keluar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kapal</th>
		<th>Tanggal Keluar</th>
		<th>Pelabuhan Tujuan</th>
		<th>Muatan Keluar</th>
		<th>Alasan Keluar</th>
		
            </tr><?php
            foreach ($tbl_kapal_keluar_data as $tbl_kapal_keluar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kapal_keluar->id_kapal ?></td>
		      <td><?php echo $tbl_kapal_keluar->tanggal_keluar ?></td>
		      <td><?php echo $tbl_kapal_keluar->pelabuhan_tujuan ?></td>
		      <td><?php echo $tbl_kapal_keluar->muatan_keluar ?></td>
		      <td><?php echo $tbl_kapal_keluar->alasan_keluar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>