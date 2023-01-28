
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Kriteria Electre & Aras</h4>
                            </div>
  <div class="card-body">
          <div class="panel-heading">
          <div class="form-group">
                <a class="btn btn-primary" href="?page=kriteria/kriteria_tambah"><span class="fa fa-save"></span> Tambah Kriteria</a>
            </div>
    </div>
    <div class="table-responsive">
        <table id="example3" class="display table-responsive-lg">
            <thead><tr>
                <th>Kode Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr></thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_kriteria 
            WHERE kode_kriteria LIKE '%$q%' OR nama_kriteria LIKE '%$q%' 
            ORDER BY kode_kriteria");
            
            foreach($rows as $row):?>
            <tr>
                
                <td><?=$row->kode_kriteria?></td>
                <td><?=$row->nama_kriteria?></td>
                <td><?=$row->bobot?></td>
               
                <td>
													<div class="d-flex">
														<a href="?page=kriteria/kriteria_ubah&amp;ID=<?=$row->kode_kriteria?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="aksi.php?act=kriteria_hapus&amp;ID=<?=$row->kode_kriteria?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>	
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>
</div>
</div>