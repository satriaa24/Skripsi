<?php
session_start();
include_once("../views/config.php");
$nilai = $_SESSION['nilai'];
$kode_alternatif = $_SESSION['kode_alternatif'];

?>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Proses Perhitungan Aras 3 (Hasil Akhir)</h4>
                            </div>
                            <div class="col-sm">
                                <br>
                                <a href="cetakaras.php" class="btn btn-success btn-rounded"><span class="fa fa-save"></span> Cetak File PDF</a>
                            </div>
  <div class="card-body">
<div class="table-responsive">
<?php
include_once("../views/config.php");
$karyawan3 = mysqli_query($mysqli, "select * from tb_alternatif where hak_akses='karyawan' ");
$karyawan3 = mysqli_num_rows($karyawan3);

?>
    <table id="example3" class="display table-responsive-lg">
                        <thead>
                            <tr align="center">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <!-- <th scope="col">Email</th> -->
                                <th scope="col">Jabatan</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Keterangan</th>

                            </tr>
                        </thead>
                        <tbody id=myTable>
                            <?php
                            $no = 0;
                                for ($i = 0; $i < count($nilai); $i++) {
                                    $no++;
                                    $id = $kode_alternatif[$i];
                                    $obj = mysqli_query($koneksi, "SELECT * FROM tb_alternatif WHERE kode_alternatif = '$id' ");
                                    $arr = mysqli_fetch_array($obj);
                                    error_reporting(0);
                                    $total_hasil+=$nilai[$i];
                            ?>
                            <tr align="center">
                                <th scope="row"><?=$no?></th>
                                <td><?=$arr['nama_alternatif']?> </td>
                                <!-- <td><?=$arr['email']?> </td> -->
                                <td><?=$arr['hak_akses']?> </td>
                                <td><?=$nilai[$i]?> </td>
                                <?php 
						if($nilai[$i]>0.500){
							echo "<td style='font-weight:bold; background-color:#30bf50;'>Anda LOLOS! 
                                               </a></td>";
						}else{
							echo "<td style='font-weight:bold; background-color:red;'>Anda Tidak LOLOS!</td>";
						}
					?>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <thead>
                            <tr align="center" bgcolor="bg-secondary">
                                <th scope="col"></th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                                <!-- <th scope="col"></th> -->
                                <th scope="col"><?php echo $total_hasil; ?></th>
                                
                            </tr>
                        </thead>
                    </table>
                    <?php
                        $hasil_akhir = ($total_hasil/$no)*100;
                    ?>
                    <h3>Menghitung Akurasi Metode Arras</h3>
                    <h4>(Total Hasil / Jumlah Data) X 100%</h4>
                    <h4>( <?php echo $total_hasil." / ".$no; ?> ) X 100% = <?php echo round($hasil_akhir)."%"; ?></h4> 
                    <h3>Perhitungan Akurasi Di Ambil Dari Jurnal SIMESTRIS, Vol 9 NO 1 April 2018</h3>
                            </div>
                            </div>
                            </div>
                            </div>