<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL PARKIR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<?php 
						$query = $this->db->select('*')->where('status', 0)->get('tbl_kapal')->result();
					?>
	
					<tr>
						<td width='200'>Nama Kapal <?php echo form_error('id_kapal') ?></td>
						<td>
						<select id="id_kapal" name="id_kapal" class="form-control" style="width: 100%;" required>
							<?php foreach ($query as $option): ?>
								<option value="<?= $option->id_kapal ?>"><?= $option->nomer_kapal ?> - <?= $option->nama_kapal ?></option>
							<?php endforeach; ?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Parkir <?php echo form_error('tanggal_parkir') ?></td>
						<td><input type="date" class="form-control" name="tanggal_parkir" id="tanggal_parkir" placeholder="Tanggal Parkir" value="<?php echo $tanggal_parkir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Durasi Parkir <small>(hari)</small> <?php echo form_error('durasi_parkir') ?></td><td><input type="number" class="form-control" name="durasi_parkir" id="durasi_parkir" placeholder="Durasi Parkir" value="<?php echo $durasi_parkir; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Lokasi Parkir <?php echo form_error('lokasi_parkir') ?></td>
						<td> <textarea class="form-control" rows="3" name="lokasi_parkir" id="lokasi_parkir" placeholder="Lokasi Parkir"><?php echo $lokasi_parkir; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Biaya Parkir <?php echo form_error('biaya_parkir') ?></td><td><input type="number" class="form-control" name="biaya_parkir" id="biaya_parkir" placeholder="Biaya Parkir" value="<?php echo $biaya_parkir; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Alasan Parkir <?php echo form_error('alasan_parkir') ?></td>
						<td> <textarea class="form-control" rows="3" name="alasan_parkir" id="alasan_parkir" placeholder="Alasan Parkir"><?php echo $alasan_parkir; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal_parkir" value="<?php echo $id_kapal_parkir; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal_parkir') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>