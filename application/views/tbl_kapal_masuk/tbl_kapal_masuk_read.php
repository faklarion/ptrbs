
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KAPAL_MASUK</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Masuk</td>
				<td><?php echo $tanggal_masuk; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Asal</td>
				<td><?php echo $pelabuhan_asal; ?></td>
			</tr>
	
			<tr>
				<td>Muatan</td>
				<td><?php echo $muatan; ?></td>
			</tr>
	
			<tr>
				<td>Status Muatan</td>
				<td><?php echo $status_muatan; ?></td>
			</tr>
	
			<tr>
				<td>Status Kapal</td>
				<td><?php echo $status_kapal; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_kapal_masuk') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>