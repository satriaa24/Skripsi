
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengisian Data</h4>
                            </div>
  <div class="card-body">
  <div class="table-responsive">
    <table id="example3" class="display table-responsive-lg">
        <thead><tr>
                <th>Kode</th>
                <th>Nama Karyawan</th>
                <?php
                $aa = $db->get_var("SELECT COUNT(*) FROM tb_kriteria");
                if($aa>0):
                for($a = 1; $a<=$aa; $a++){
                    echo "<th>C$a</th>";
                }
                endif;  
                ?>
                <th>Aksi</th>
        </tr></thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_alternatif 
                WHERE hak_akses='karyawan' AND kode_alternatif='$kode_alternatif2'
                ORDER BY kode_alternatif");
        $data = get_data();
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->kode_alternatif?></td>
            <td><?=$row->nama_alternatif?></td>
            <?php foreach($data[$row->kode_alternatif] as $k => $v):?>
            <td><?=$v?></td>
            <?php endforeach?>
            <td>
                <a class="btn btn-xs btn-warning" href="?page=penilaian/rel_alternatif_ubah&ID=<?=$row->kode_alternatif?>"><span class="glyphicon glyphicon-edit"></span> Isi/Ubah Nilai</a>        
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    </div>
</div>
</div>
</div>