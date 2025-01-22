
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KAPAL_PARKIR</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Parkir</td>
				<td><?php echo $tanggal_parkir; ?></td>
			</tr>
	
			<tr>
				<td>Durasi Parkir</td>
				<td><?php echo $durasi_parkir; ?></td>
			</tr>
	
			<tr>
				<td>Lokasi Parkir</td>
				<td><?php echo $lokasi_parkir; ?></td>
			</tr>
	
			<tr>
				<td>Biaya Parkir</td>
				<td><?php echo $biaya_parkir; ?></td>
			</tr>
	
			<tr>
				<td>Alasan Parkir</td>
				<td><?php echo $alasan_parkir; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_kapal_parkir') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>