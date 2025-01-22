<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL BERLAYAR</h3>
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
						<td width='200'>Tanggal Berlayar <?php echo form_error('tanggal_berlayar') ?></td>
						<td><input type="date" class="form-control" name="tanggal_berlayar" id="tanggal_berlayar" placeholder="Tanggal Berlayar" value="<?php echo $tanggal_berlayar; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelabuhan Tujuan <?php echo form_error('pelabuhan_tujuan') ?></td><td><input type="text" class="form-control" name="pelabuhan_tujuan" id="pelabuhan_tujuan" placeholder="Pelabuhan Tujuan" value="<?php echo $pelabuhan_tujuan; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Rute Pelayaran <?php echo form_error('rute_pelayaran') ?></td>
						<td> <textarea class="form-control" rows="3" name="rute_pelayaran" id="rute_pelayaran" placeholder="Rute Pelayaran"><?php echo $rute_pelayaran; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Muatan <?php echo form_error('muatan') ?></td><td><input type="text" class="form-control" name="muatan" id="muatan" placeholder="Muatan" value="<?php echo $muatan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kapten Kapal <?php echo form_error('kapten_kapal') ?></td><td><input type="text" class="form-control" name="kapten_kapal" id="kapten_kapal" placeholder="Kapten Kapal" value="<?php echo $kapten_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Perkiraan Sampai <?php echo form_error('perkiraan_sampai') ?></td>
						<td><input type="date" class="form-control" name="perkiraan_sampai" id="perkiraan_sampai" placeholder="Perkiraan Sampai" value="<?php echo $perkiraan_sampai; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal_berlayar" value="<?php echo $id_kapal_berlayar; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal_berlayar') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>