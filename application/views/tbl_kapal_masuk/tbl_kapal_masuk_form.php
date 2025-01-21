<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL MASUK</h3>
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
						<td width='200'>Tanggal Masuk <?php echo form_error('tanggal_masuk') ?></td>
						<td><input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelabuhan Asal <?php echo form_error('pelabuhan_asal') ?></td><td><input type="text" class="form-control" name="pelabuhan_asal" id="pelabuhan_asal" placeholder="Pelabuhan Asal" value="<?php echo $pelabuhan_asal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Muatan <?php echo form_error('muatan') ?></td><td><input type="text" class="form-control" name="muatan" id="muatan" placeholder="Muatan" value="<?php echo $muatan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status Muatan <?php echo form_error('status_muatan') ?></td>
						<td>
							<select name="status_muatan" id="status_muatan" class="form-control">
								<option value="Kosong">Kosong</option>
								<option value="Penuh">Penuh</option>
								<option value="Sebagian">Kosong</option>
							</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Status Kapal <?php echo form_error('status_kapal') ?></td>
						<td>
							<select name="status_kapal" id="status_kapal" class="form-control">
								<option value="Normal">Normal</option>
								<option value="Ada Kendala">Ada Kendala</option>
								<option value="Rusak">Rusak</option>
							</select>
						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal_masuk" value="<?php echo $id_kapal_masuk; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal_masuk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>