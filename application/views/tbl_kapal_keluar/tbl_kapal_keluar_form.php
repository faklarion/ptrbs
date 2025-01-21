<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL KELUAR</h3>
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
						<td width='200'>Tanggal Keluar <?php echo form_error('tanggal_keluar') ?></td>
						<td><input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" placeholder="Tanggal Keluar" value="<?php echo $tanggal_keluar; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelabuhan Tujuan <?php echo form_error('pelabuhan_tujuan') ?></td><td><input type="text" class="form-control" name="pelabuhan_tujuan" id="pelabuhan_tujuan" placeholder="Pelabuhan Tujuan" value="<?php echo $pelabuhan_tujuan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Muatan Keluar <?php echo form_error('muatan_keluar') ?></td><td><input type="text" class="form-control" name="muatan_keluar" id="muatan_keluar" placeholder="Muatan Keluar" value="<?php echo $muatan_keluar; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Alasan Keluar <?php echo form_error('alasan_keluar') ?></td>
						<td> <textarea class="form-control" rows="3" name="alasan_keluar" id="alasan_keluar" placeholder="Alasan Keluar"><?php echo $alasan_keluar; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal_keluar" value="<?php echo $id_kapal_keluar; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal_keluar') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>