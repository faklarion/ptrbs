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
        <h2>Tbl_kapal_masuk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kapal</th>
		<th>Tanggal Masuk</th>
		<th>Pelabuhan Asal</th>
		<th>Muatan</th>
		<th>Status Muatan</th>
		<th>Status Kapal</th>
		
            </tr><?php
            foreach ($tbl_kapal_masuk_data as $tbl_kapal_masuk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kapal_masuk->id_kapal ?></td>
		      <td><?php echo $tbl_kapal_masuk->tanggal_masuk ?></td>
		      <td><?php echo $tbl_kapal_masuk->pelabuhan_asal ?></td>
		      <td><?php echo $tbl_kapal_masuk->muatan ?></td>
		      <td><?php echo $tbl_kapal_masuk->status_muatan ?></td>
		      <td><?php echo $tbl_kapal_masuk->status_kapal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>