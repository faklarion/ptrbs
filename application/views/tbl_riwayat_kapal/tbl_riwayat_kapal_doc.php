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
        <h2 class="text-center">PT RIMAU BAHTERA SHIPPING</h2>
        <p class="text-center"><img src="<?= base_url('assets/images/logorbs.png') ?>" width="200px"></p>
        <h4 class="text-center"><?= $title ?></h4>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
                <th>Tanggal Update</th>
                <th>Jam Update</th>
                <th>Muatan</th>
                <th>Pelabuhan Asal</th>
                <th>Pelabuhan Tujuan</th>
                <th>Status</th>
		
            </tr><?php
            foreach ($tbl_riwayat_kapal_data as $tbl_riwayat_kapal)
            {
                ?>
                <tr>
                <td width="10px"><?php echo ++$start ?></td>
                <td><?php echo $tbl_riwayat_kapal->nomer_kapal ?> - <?php echo $tbl_riwayat_kapal->nama_kapal ?></td>
                <td><?php echo tgl_indo($tbl_riwayat_kapal->tanggal_update) ?></td>
                <td><?php echo $tbl_riwayat_kapal->jam_update ?></td>
                <td><?php echo $tbl_riwayat_kapal->muatan ?></td>
                <td><?php echo $tbl_riwayat_kapal->pelabuhan_asal ?></td>
                <td><?php echo $tbl_riwayat_kapal->pelabuhan_tujuan ?></td>
                <td><?php echo $tbl_riwayat_kapal->status ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

<script>
    window.print()
</script>