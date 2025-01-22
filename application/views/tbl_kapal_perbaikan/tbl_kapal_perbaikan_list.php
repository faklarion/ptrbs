<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL PERBAIKAN</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_kapal_perbaikan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <?php echo anchor(site_url('tbl_kapal_perbaikan/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
            </div>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" id="tabel_kapal_perbaikan" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Jenis Perbaikan</th>
                <th>Biaya Perbaikan</th>
                <th>Lokasi Perbaikan</th>
                <th>Teknisi Perbaikan</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tbl_kapal_perbaikan_data as $tbl_kapal_perbaikan)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $tbl_kapal_perbaikan->nomer_kapal ?> - <?php echo $tbl_kapal_perbaikan->nama_kapal ?></td>
			<td><?php echo tgl_indo($tbl_kapal_perbaikan->tanggal_mulai) ?></td>
			<td><?php echo tgl_indo($tbl_kapal_perbaikan->tanggal_selesai) ?></td>
			<td><?php echo $tbl_kapal_perbaikan->jenis_perbaikan ?></td>
			<td><?php echo rupiah($tbl_kapal_perbaikan->biaya_perbaikan) ?></td>
			<td><?php echo $tbl_kapal_perbaikan->lokasi_perbaikan ?></td>
			<td><?php echo $tbl_kapal_perbaikan->teknisi_perbaikan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_kapal_perbaikan/read/'.$tbl_kapal_perbaikan->id_kapal_perbaikan),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_kapal_perbaikan/update/'.$tbl_kapal_perbaikan->id_kapal_perbaikan),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_kapal_perbaikan/delete/'.$tbl_kapal_perbaikan->id_kapal_perbaikan),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        </div>
                    </div>
            </div>
            </div>
    </section>
</div>