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
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Jenis Perbaikan</th>
                <th>Biaya Perbaikan</th>
                <th>Lokasi Perbaikan</th>
                <th>Teknisi Perbaikan</th>
		
            </tr><?php
            foreach ($tbl_kapal_perbaikan_data as $tbl_kapal_perbaikan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kapal_perbaikan->nomer_kapal ?> - <?php echo $tbl_kapal_perbaikan->nama_kapal ?></td>
		      <td><?php echo tgl_indo($tbl_kapal_perbaikan->tanggal_mulai) ?></td>
		      <td><?php echo tgl_indo($tbl_kapal_perbaikan->tanggal_selesai) ?></td>
		      <td><?php echo $tbl_kapal_perbaikan->jenis_perbaikan ?></td>
		      <td><?php echo rupiah($tbl_kapal_perbaikan->biaya_perbaikan) ?></td>
		      <td><?php echo $tbl_kapal_perbaikan->lokasi_perbaikan ?></td>
		      <td><?php echo $tbl_kapal_perbaikan->teknisi_perbaikan ?></td>	
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