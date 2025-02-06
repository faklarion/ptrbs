<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA RIWAYAT KAPAL</h3>
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
						<td width='200'>Jam Update <?php echo form_error('jam_update') ?></td><td><input type="time" class="form-control" name="jam_update" id="jam_update" placeholder="Jam Update" value="<?php echo $jam_update; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Tanggal Update <?php echo form_error('tanggal_update') ?></td>
						<td><input type="date" class="form-control" name="tanggal_update" id="tanggal_update" placeholder="Tanggal Update" value="<?php echo $tanggal_update; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Muatan <?php echo form_error('muatan') ?></td><td><input type="text" class="form-control" name="muatan" id="muatan" placeholder="Muatan" value="<?php echo $muatan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelabuhan Asal <?php echo form_error('pelabuhan_asal') ?></td><td><input type="text" class="form-control" name="pelabuhan_asal" id="pelabuhan_asal" placeholder="Pelabuhan Asal" value="<?php echo $pelabuhan_asal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelabuhan Tujuan <?php echo form_error('pelabuhan_tujuan') ?></td><td><input type="text" class="form-control" name="pelabuhan_tujuan" id="pelabuhan_tujuan" placeholder="Pelabuhan Tujuan" value="<?php echo $pelabuhan_tujuan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_riwayat" value="<?php echo $id_riwayat; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_riwayat_kapal') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>