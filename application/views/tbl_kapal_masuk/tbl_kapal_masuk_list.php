<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL MASUK</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_kapal_masuk/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <?php echo anchor(site_url('tbl_kapal_masuk/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
             </div>
            </div>
            
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" id="tabel_kapal_masuk" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
                <th>Tanggal Masuk</th>
                <th>Pelabuhan Asal</th>
                <th>Muatan</th>
                <th>Status Muatan</th>
                <th>Status Kapal</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($tbl_kapal_masuk_data as $tbl_kapal_masuk)
                    {
                ?>
            
            <tr>
                <td width="10px"><?php echo ++$start ?></td>
                <td><?php echo $tbl_kapal_masuk->nomer_kapal ?> - <?php echo $tbl_kapal_masuk->nama_kapal ?></td>
                <td><?php echo tgl_indo($tbl_kapal_masuk->tanggal_masuk) ?></td>
                <td><?php echo $tbl_kapal_masuk->pelabuhan_asal ?></td>
                <td><?php echo $tbl_kapal_masuk->muatan ?></td>
                <td><?php echo $tbl_kapal_masuk->status_muatan ?></td>
                <td><?php echo $tbl_kapal_masuk->status_kapal ?></td>
                <td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_kapal_masuk/read/'.$tbl_kapal_masuk->id_kapal_masuk),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_kapal_masuk/update/'.$tbl_kapal_masuk->id_kapal_masuk),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_kapal_masuk/delete/'.$tbl_kapal_masuk->id_kapal_masuk),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>