
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Nilai Attitude dan Bekerjasama Dalam Team</h4>
                            </div>
  <div class="card-body">
          <div class="panel-heading">
          <div class="form-group">
                <a class="btn btn-primary btn-rounded" href="?page=nilai/nilai_tambah"><span class="fa fa-save"></span> Tambah Nilai</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="example3" class="display table-responsive-lg">
            <thead><tr align="center">
                <th>Nama Kriteria</th>
                <th>Nama Karywan</th>
                <th>Penilain 1</th>
                <th>Penilain 2</th>
                <th>Penilain 3</th>
                <th>Rata Rata</th>

                <th>Aksi</th>
            </tr></thead>
            <?php
            
            $rows = $db->get_results("SELECT * FROM tb_nilai a INNER JOIN tb_kriteria b INNER JOIN tb_alternatif c ON a.kode_kriteria=b.kode_kriteria AND a.kode_alternatif=c.kode_alternatif");
            
            foreach($rows as $row):?>
            <tr align="center">
                
                <td><?=$row->nama_kriteria?></td>
                <td><?=$row->nama_alternatif?></td>
                <td><?=$row->nilai1?></td>
                <td><?=$row->nilai2?></td>
                <td><?=$row->nilai3?></td>
                <td><?=$row->rata2?></td>

                <td>
													<div class="d-flex justify-content-center">
														<!-- <a href="?page=nilai/nilai_ubah&amp;ID=<?=$row->id_nilai?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> -->
														<a href="aksi.php?act=nilai_hapus&amp;ID=<?=$row->id_nilai?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>	
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>
</div>
</div>