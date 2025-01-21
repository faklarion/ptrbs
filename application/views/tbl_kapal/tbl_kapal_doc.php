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
        <h2>Tbl_kapal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomer Kapal</th>
		<th>Nama Kapal</th>
		<th>Tipe Kapal</th>
		<th>Panjang Kapal</th>
		<th>Lebar Kapal</th>
		<th>Tinggi Kapal</th>
		<th>Tahun Kapal</th>
		<th>Kapasitas Kapal</th>
		<th>Status Kapal</th>
		
            </tr><?php
            foreach ($tbl_kapal_data as $tbl_kapal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kapal->nomer_kapal ?></td>
		      <td><?php echo $tbl_kapal->nama_kapal ?></td>
		      <td><?php echo $tbl_kapal->tipe_kapal ?></td>
		      <td><?php echo $tbl_kapal->panjang_kapal ?></td>
		      <td><?php echo $tbl_kapal->lebar_kapal ?></td>
		      <td><?php echo $tbl_kapal->tinggi_kapal ?></td>
		      <td><?php echo $tbl_kapal->tahun_kapal ?></td>
		      <td><?php echo $tbl_kapal->kapasitas_kapal ?></td>
		      <td><?php echo $tbl_kapal->status_kapal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>