
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KAPAL_PERBAIKAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Mulai</td>
				<td><?php echo $tanggal_mulai; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Selesai</td>
				<td><?php echo $tanggal_selesai; ?></td>
			</tr>
	
			<tr>
				<td>Jenis Perbaikan</td>
				<td><?php echo $jenis_perbaikan; ?></td>
			</tr>
	
			<tr>
				<td>Biaya Perbaikan</td>
				<td><?php echo $biaya_perbaikan; ?></td>
			</tr>
	
			<tr>
				<td>Lokasi Perbaikan</td>
				<td><?php echo $lokasi_perbaikan; ?></td>
			</tr>
	
			<tr>
				<td>Teknisi Perbaikan</td>
				<td><?php echo $teknisi_perbaikan; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_kapal_perbaikan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>