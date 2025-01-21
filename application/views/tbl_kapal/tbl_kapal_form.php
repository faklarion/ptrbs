<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nomer Kapal <?php echo form_error('nomer_kapal') ?></td><td><input type="text" class="form-control" name="nomer_kapal" id="nomer_kapal" placeholder="Nomer Kapal" value="<?php echo $nomer_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Kapal <?php echo form_error('nama_kapal') ?></td><td><input type="text" class="form-control" name="nama_kapal" id="nama_kapal" placeholder="Nama Kapal" value="<?php echo $nama_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tipe Kapal <?php echo form_error('tipe_kapal') ?></td><td><input type="text" class="form-control" name="tipe_kapal" id="tipe_kapal" placeholder="Tipe Kapal" value="<?php echo $tipe_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Panjang Kapal <?php echo form_error('panjang_kapal') ?></td><td><input type="number" class="form-control" name="panjang_kapal" id="panjang_kapal" placeholder="Panjang Kapal" value="<?php echo $panjang_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lebar Kapal <?php echo form_error('lebar_kapal') ?></td><td><input type="number" class="form-control" name="lebar_kapal" id="lebar_kapal" placeholder="Lebar Kapal" value="<?php echo $lebar_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tinggi Kapal <?php echo form_error('tinggi_kapal') ?></td><td><input type="number" class="form-control" name="tinggi_kapal" id="tinggi_kapal" placeholder="Tinggi Kapal" value="<?php echo $tinggi_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tahun Kapal <?php echo form_error('tahun_kapal') ?></td><td><input type="number" min="1900" max="2099" step="1" class="form-control" name="tahun_kapal" id="tahun_kapal" placeholder="Tahun Kapal" value="<?php echo $tahun_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kapasitas Kapal <?php echo form_error('kapasitas_kapal') ?></td><td><input type="number" class="form-control" name="kapasitas_kapal" id="kapasitas_kapal" placeholder="Kapasitas Kapal" value="<?php echo $kapasitas_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal" value="<?php echo $id_kapal; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>