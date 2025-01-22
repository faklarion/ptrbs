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
        <h2>Tbl_kapal_berlayar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kapal</th>
		<th>Tanggal Berlayar</th>
		<th>Pelabuhan Tujuan</th>
		<th>Rute Pelayaran</th>
		<th>Muatan</th>
		<th>Kapten Kapal</th>
		<th>Perkiraan Sampai</th>
		
            </tr><?php
            foreach ($tbl_kapal_berlayar_data as $tbl_kapal_berlayar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kapal_berlayar->id_kapal ?></td>
		      <td><?php echo $tbl_kapal_berlayar->tanggal_berlayar ?></td>
		      <td><?php echo $tbl_kapal_berlayar->pelabuhan_tujuan ?></td>
		      <td><?php echo $tbl_kapal_berlayar->rute_pelayaran ?></td>
		      <td><?php echo $tbl_kapal_berlayar->muatan ?></td>
		      <td><?php echo $tbl_kapal_berlayar->kapten_kapal ?></td>
		      <td><?php echo $tbl_kapal_berlayar->perkiraan_sampai ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>