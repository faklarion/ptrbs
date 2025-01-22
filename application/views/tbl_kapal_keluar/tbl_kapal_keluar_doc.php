<!doctype html>
<html>
    <head>
        <title><?= $title ?></title>
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
        <h2 class="text-center">PT RIMAU BAHTERA SHIPPING</h2>
        <p class="text-center"><img src="<?= base_url('assets/images/logorbs.png') ?>" width="200px"></p>
        <h4 class="text-center"><?= $title ?></h4>
        <p class="text-center"><?= $periode ?></p>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
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
		      <td><?php echo $tbl_kapal_keluar->nomer_kapal ?> - <?php echo $tbl_kapal_keluar->nama_kapal ?></td>
		      <td><?php echo tgl_indo($tbl_kapal_keluar->tanggal_keluar) ?></td>
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
<script>
    window.print();
</script>