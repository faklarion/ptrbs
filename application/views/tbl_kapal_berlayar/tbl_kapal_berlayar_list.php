<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL BERLAYAR</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_kapal_berlayar/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <form method="get" action="<?php echo site_url('tbl_kapal_berlayar/word'); ?>" target="_blank">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="start_date">Tanggal Mulai:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cetak
                            </button>
                        </div>
                    </div>
                </form>
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
        <table class="table table-bordered" id="tabel_kapal_berlayar" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
                <th>Tanggal Berlayar</th>
                <th>Pelabuhan Tujuan</th>
                <th>Rute Pelayaran</th>
                <th>Muatan</th>
                <th>Kapten Kapal</th>
                <th>Perkiraan Sampai</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tbl_kapal_berlayar_data as $tbl_kapal_berlayar)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $tbl_kapal_berlayar->nomer_kapal ?> - <?php echo $tbl_kapal_berlayar->nama_kapal ?></td>
			<td><?php echo tgl_indo($tbl_kapal_berlayar->tanggal_berlayar) ?></td>
			<td><?php echo $tbl_kapal_berlayar->pelabuhan_tujuan ?></td>
			<td><?php echo $tbl_kapal_berlayar->rute_pelayaran ?></td>
			<td><?php echo $tbl_kapal_berlayar->muatan ?></td>
			<td><?php echo $tbl_kapal_berlayar->kapten_kapal ?></td>
			<td><?php echo tgl_indo($tbl_kapal_berlayar->perkiraan_sampai) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_kapal_berlayar/read/'.$tbl_kapal_berlayar->id_kapal_berlayar),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_kapal_berlayar/update/'.$tbl_kapal_berlayar->id_kapal_berlayar),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_kapal_berlayar/delete/'.$tbl_kapal_berlayar->id_kapal_berlayar),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>