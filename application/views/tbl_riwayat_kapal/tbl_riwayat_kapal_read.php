
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_RIWAYAT_KAPAL</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Jam Update</td>
				<td><?php echo $jam_update; ?></td>
			</tr>
	
			<tr>
				<td>Muatan</td>
				<td><?php echo $muatan; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Asal</td>
				<td><?php echo $pelabuhan_asal; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Tujuan</td>
				<td><?php echo $pelabuhan_tujuan; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Update</td>
				<td><?php echo $tanggal_update; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_riwayat_kapal') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>