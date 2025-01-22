<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL KELUAR</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_kapal_keluar/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <form method="get" action="<?php echo site_url('tbl_kapal_keluar/word'); ?>" target="_blank">
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
        <table id="tabel_kapal_keluar" class="table table-bordered" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
                <th>Tanggal Keluar</th>
                <th>Pelabuhan Tujuan</th>
                <th>Muatan Keluar</th>
                <th>Alasan Keluar</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tbl_kapal_keluar_data as $tbl_kapal_keluar)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $tbl_kapal_keluar->nomer_kapal ?> - <?php echo $tbl_kapal_keluar->nama_kapal ?></td>
			<td><?php echo tgl_indo($tbl_kapal_keluar->tanggal_keluar) ?></td>
			<td><?php echo $tbl_kapal_keluar->pelabuhan_tujuan ?></td>
			<td><?php echo $tbl_kapal_keluar->muatan_keluar ?></td>
			<td><?php echo $tbl_kapal_keluar->alasan_keluar ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_kapal_keluar/read/'.$tbl_kapal_keluar->id_kapal_keluar),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_kapal_keluar/update/'.$tbl_kapal_keluar->id_kapal_keluar),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_kapal_keluar/delete/'.$tbl_kapal_keluar->id_kapal_keluar),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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