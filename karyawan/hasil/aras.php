<?php
session_start();
include_once("../views/config.php");
include_once("function/metode_aras.php");

if(isset($_POST['b_hitung'])) {
    aras($koneksi);
}
if(isset($_POST['b_cek'])) {
    cek($koneksi);
}
?>

<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Proses Perhitungan Hasil Seleksi 1</h4>
                            </div>
  <div class="card-body">
  <div class="table-responsive">
    <table id="example3" class="display table-responsive-lg">
    <thead>
                            <tr align="center">
                                <th scope="col"> Nama Alternatif</th>
                                <?php
                                    $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                    $result = mysqli_num_rows($obj);
                                    for($i = 1; $i <= $result; $i++ ) {
                                ?>
                                    <th scope="col">C<?=$i?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id=myTable>
                            <?php
                            $obj = mysqli_query($koneksi, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan'");
                            while($arr = mysqli_fetch_array($obj)) :
                                
                            ?>
                            <tr align="center">
                                <td><?=$arr['nama_alternatif']?></td>
                                <?php
                                $obj_a = mysqli_query($koneksi, "SELECT * FROM tb_relasi");
                                while($arr_a = mysqli_fetch_array($obj_a)) :
                                        if ($arr['kode_alternatif'] == $arr_a['kode_alternatif']) {
                                ?>
                                <td><?=$arr_a['nilai']?></td>
                                <?php
                                        }
                                endwhile;
                                ?>
                            </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
    </table>
    </div>
    <div class="row">
                        <div class="col-sm-12 text-right">
                        <form action="" method="post">
                            <button class="btn btn-success" type="submit" name="b_hitung">Mulai Perangkingan</button>
                        </form>
                        </div>
                    </div>
    </div>
</div>
</div>
</div>