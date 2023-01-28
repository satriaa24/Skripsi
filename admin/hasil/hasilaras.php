<?php
session_start();
include_once("../views/config.php");
include_once("function/metode_aras.php");

//POST
if(isset($_POST['form_report'])) {
    report($koneksi);
}
?>

<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Proses Perhitungan Aras 2</h4>
                            </div>
                            <div class="card-body">
                                
      <div class="table-responsive">
          
      <H4>Matriks Keputusan</H4>
    <table id="example3" class="display table-responsive-lg">
 <!-- Content tabel -->
                        <thead>                         
                            <tr align="center">
                                <th scope="col">Alternatif</th>
                                <?php
                                    $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                    $result = mysqli_num_rows($obj);
                                    for($i = 1; $i <= $result; $i++ ) {
                                ?>
                                    <th scope="col">C<?=$i?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id='myTable'>
                            <?php
                            $obj_a = mysqli_query($koneksi, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan'");
                            $result_a = mysqli_num_rows($obj_a);
                            for($a = 0; $a <= $result_a; $a++) {    
                                ?>
                                    <tr align="center">
                                        <td>X<?=$a?></td>
                                        <?php
                                        $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                        $result = mysqli_num_rows($obj);
                                        for($i = 1; $i <= $result; $i++ ) {
                                        ?>
                                        <td><?=$_SESSION['x'.$i][$a]?></td>
                                        <?php } ?>
                                    </tr>
                                <?php
                            }
                            ?>   
                        </tbody>
                    </table>
    </div>
                    <br>

                    <div class="table-responsive">
    <table id="example3" class="display table-responsive-lg">
                        <H4>Normalisasi Matriks</H4>
                        <thead>                         
                            <tr align="center">
                                <th scope="col">Alternatif</th>
                                <?php
                                    $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                    $result = mysqli_num_rows($obj);
                                    for($i = 1; $i <= $result; $i++ ) {
                                ?>
                                    <th scope="col">C<?=$i?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id='myTable'>
                            <?php
                            $obj_a = mysqli_query($koneksi, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan'");
                            $result_a = mysqli_num_rows($obj_a);
                            for($a = 0; $a <= $result_a; $a++) {    
                                ?>
                                    <tr align="center">
                                        <td>X<?=$a?></td>
                                        <?php
                                        $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                        $result = mysqli_num_rows($obj);
                                        for($i = 1; $i <= $result; $i++ ) {
                                        ?>
                                        <td><?=$_SESSION['a'.$i][$a]?></td>
                                        <?php } ?>
                                    </tr>
                                <?php
                            }
                            ?>   
                        </tbody>
                    </table>
    </div>
                    <br>

                    
                    <div class="table-responsive">
    <table id="example3" class="display table-responsive-lg">
                        <H4>Bobot Matriks</H4>
                        <thead>                         
                            <tr align="center">
                                <th scope="col">Alternatif</th>
                                <?php
                                    $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                    $result = mysqli_num_rows($obj);
                                    for($i = 1; $i <= $result; $i++ ) {
                                ?>
                                    <th scope="col">C<?=$i?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id='myTable'>
                            <?php
                            $obj_a = mysqli_query($koneksi, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan'");
                            $result_a = mysqli_num_rows($obj_a);
                            for($a = 0; $a <= $result_a; $a++) {    
                                ?>
                                    <tr align="center">
                                        <td>X<?=$a?></td>
                                        <?php
                                        $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                        $result = mysqli_num_rows($obj);
                                        for($i = 1; $i <= $result; $i++ ) {
                                        ?>
                                        <td><?=$_SESSION['b'.$i][$a]?></td>
                                        <?php } ?>
                                    </tr>
                                <?php
                            }
                            ?>   
                        </tbody>
                    </table>
    </div>
                    <br>

                    <div class="table-responsive">
    <table id="example3" class="display table-responsive-lg">
                        <H4>Nilai Fungsi Optimalisasi</H4>
                        <thead>                         
                            <tr align="center">
                                <th scope="col">Alternatif</th>
                                <?php
                                    $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                    $result = mysqli_num_rows($obj);
                                    for($i = 1; $i <= $result; $i++ ) {
                                ?>
                                    <th scope="col">C<?=$i?></th>
                                <?php } ?>
                                <th scope="col">Si</th>
                            </tr>
                        </thead>
                        <tbody id='myTable'>
                            <?php
                            $obj_a = mysqli_query($koneksi, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan'");
                            $result_a = mysqli_num_rows($obj_a);
                            for($a = 0; $a <= $result_a; $a++) {    
                                ?>
                                    <tr align="center">
                                        <td>X<?=$a?></td>

                                        <?php
                                        $obj = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                        $result = mysqli_num_rows($obj);
                                        for($i = 1; $i <= $result; $i++ ) {
                                        ?>
                                        <td><?=$_SESSION['b'.$i][$a]?></td>
                                        <?php } ?>

                                        <td><?=$_SESSION['c'.$a]?></td>
                                    </tr>
                                <?php
                            }
                            ?>   
                        </tbody>
                    </table>
    </div>
                    <br>

                    <div class="table-responsive">
    <table id="example3" class="display table-responsive-lg">
                        <H4>Nilai Ranking</H4>
                        <thead>                         
                            <tr align="center">
                                <th scope="col">Alternatif</th>
                                <th scope="col">Si</th>
                                <th scope="col">Hasil</th>
                            </tr>
                        </thead>
                        <tbody id='myTable'>
                            <?php
                            $obj_a = mysqli_query($koneksi, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan'");
                            $result_a = mysqli_num_rows($obj_a);
                            for($a = 0; $a <= $result_a; $a++) {    
                                ?>
                                    <tr align="center">
                                        <td>X<?=$a?></td>
                                        <td><?=$_SESSION['c'.$a]?></td>
                                        <td><?=$_SESSION['d'.$a]?></td>
                                    </tr>
                                <?php
                            }
                            ?>   
                        </tbody>
                    </table>
    </div>
<br>
<br>
    <div class="text-right">
                            <form action="" method="post">
                                <button class="btn btn-success" type="submit" name="form_report"><b>Lihat Hasil Aras 3</b></button>
                            </form>
                        </div>
                </div>
            </div>
        </div>