<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL PERBAIKAN</h3>
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
						<td width='200'>Tanggal Mulai <?php echo form_error('tanggal_mulai') ?></td>
						<td><input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo $tanggal_mulai; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></td>
						<td><input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Jenis Perbaikan <?php echo form_error('jenis_perbaikan') ?></td>
						<td> <textarea class="form-control" rows="3" name="jenis_perbaikan" id="jenis_perbaikan" placeholder="Jenis Perbaikan"><?php echo $jenis_perbaikan; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Biaya Perbaikan <?php echo form_error('biaya_perbaikan') ?></td><td><input type="text" class="form-control" name="biaya_perbaikan" id="biaya_perbaikan" placeholder="Biaya Perbaikan" value="<?php echo $biaya_perbaikan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lokasi Perbaikan <?php echo form_error('lokasi_perbaikan') ?></td><td><input type="text" class="form-control" name="lokasi_perbaikan" id="lokasi_perbaikan" placeholder="Lokasi Perbaikan" value="<?php echo $lokasi_perbaikan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Teknisi Perbaikan <?php echo form_error('teknisi_perbaikan') ?></td><td><input type="text" class="form-control" name="teknisi_perbaikan" id="teknisi_perbaikan" placeholder="Teknisi Perbaikan" value="<?php echo $teknisi_perbaikan; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal_perbaikan" value="<?php echo $id_kapal_perbaikan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal_perbaikan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>