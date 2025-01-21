
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KAPAL_KELUAR</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Keluar</td>
				<td><?php echo $tanggal_keluar; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Tujuan</td>
				<td><?php echo $pelabuhan_tujuan; ?></td>
			</tr>
	
			<tr>
				<td>Muatan Keluar</td>
				<td><?php echo $muatan_keluar; ?></td>
			</tr>
	
			<tr>
				<td>Alasan Keluar</td>
				<td><?php echo $alasan_keluar; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_kapal_keluar') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>