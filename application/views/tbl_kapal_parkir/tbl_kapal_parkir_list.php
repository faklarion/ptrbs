<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL PARKIR</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_kapal_parkir/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <?php echo anchor(site_url('tbl_kapal_parkir/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
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
        <table class="table table-bordered"  id="tabel_kapal_parkir" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Data Kapal</th>
                <th>Tanggal Parkir</th>
                <th>Durasi Parkir</th>
                <th>Lokasi Parkir</th>
                <th>Biaya Parkir</th>
                <th>Alasan Parkir</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tbl_kapal_parkir_data as $tbl_kapal_parkir)
            {
                ?>
            <tr>
                <td width="10px"><?php echo ++$start ?></td>
                <td><?php echo $tbl_kapal_parkir->nomer_kapal ?> - <?php echo $tbl_kapal_parkir->nama_kapal ?></td>
                <td><?php echo tgl_indo($tbl_kapal_parkir->tanggal_parkir) ?></td>
                <td><?php echo $tbl_kapal_parkir->durasi_parkir ?> Hari</td>
                <td><?php echo $tbl_kapal_parkir->lokasi_parkir ?></td>
                <td><?php echo rupiah($tbl_kapal_parkir->biaya_parkir) ?></td>
                <td><?php echo $tbl_kapal_parkir->alasan_parkir ?></td>
                <td style="text-align:center" width="200px">
                    <?php 
                    //echo anchor(site_url('tbl_kapal_parkir/read/'.$tbl_kapal_parkir->id_kapal_parkir),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                    //echo '  '; 
                    echo anchor(site_url('tbl_kapal_parkir/update/'.$tbl_kapal_parkir->id_kapal_parkir),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                    echo '  '; 
                    echo anchor(site_url('tbl_kapal_parkir/delete/'.$tbl_kapal_parkir->id_kapal_parkir),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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