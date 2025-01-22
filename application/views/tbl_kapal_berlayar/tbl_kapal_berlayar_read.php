
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KAPAL_BERLAYAR</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Berlayar</td>
				<td><?php echo $tanggal_berlayar; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Tujuan</td>
				<td><?php echo $pelabuhan_tujuan; ?></td>
			</tr>
	
			<tr>
				<td>Rute Pelayaran</td>
				<td><?php echo $rute_pelayaran; ?></td>
			</tr>
	
			<tr>
				<td>Muatan</td>
				<td><?php echo $muatan; ?></td>
			</tr>
	
			<tr>
				<td>Kapten Kapal</td>
				<td><?php echo $kapten_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Perkiraan Sampai</td>
				<td><?php echo $perkiraan_sampai; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_kapal_berlayar') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>