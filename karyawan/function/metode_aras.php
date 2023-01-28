<?php
    function aras($koneksi) {
        $panjang = 0;
        $obj_kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
        while ($arr_kriteria = mysqli_fetch_array($obj_kriteria)) :
                $panjang++;
        endwhile;

        $obj_guru = mysqli_query($koneksi, "SELECT * from tb_alternatif where hak_akses = 'karyawan'");
        while ($arr_guru = mysqli_fetch_array($obj_guru)) :
            $id_cek = $arr_guru['kode_alternatif'];

            $obj_penilaian = mysqli_query($koneksi, "SELECT * from tb_relasi WHERE kode_alternatif = $id_cek ");
            while ($arr_penilaian = mysqli_fetch_array($obj_penilaian)) :
                $temp[] = $arr_penilaian['kode_alternatif'];
            endwhile;
            $_SESSION['validasi'.$id_cek] = $temp;
            unset ($temp);
            if($panjang == count( $_SESSION['validasi'.$id_cek])) {
                $val[] = "val";
            }

        endwhile;
        $val_guru = 0;
        $obj_val_guru= mysqli_query($koneksi, "SELECT * from tb_alternatif where hak_akses = 'karyawan'");
        while ($arr_val_kriteria = mysqli_fetch_array($obj_val_guru)) :
                $val_guru++;
        endwhile;
        
        if($val_guru == count($val)) {
            // Langkah 1 Matriks Keputusan
            $kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
            while ($arr_kriteria = mysqli_fetch_array($kriteria)):
                $id_kriteria = $arr_kriteria['kode_kriteria'];
                $guru = mysqli_query($koneksi, "SELECT * from tb_alternatif where hak_akses = 'karyawan'");
                while ($arr_guru = mysqli_fetch_array($guru)):
                    
                    $id_guru = $arr_guru['kode_alternatif'];
                    $nilai = mysqli_query($koneksi, "SELECT * FROM tb_relasi");
                    while($arr_nilai = mysqli_fetch_array($nilai)) :
                        if($id_kriteria == $arr_nilai['kode_kriteria'] && $id_guru == $arr_nilai['kode_alternatif'] ) {
                            echo $arr_nilai['nilai']." ";
                            $temp[]= $arr_nilai['nilai'];    
                        }
                    endwhile;
                endwhile;
                echo '<br>';
                $_SESSION['x'.$id_kriteria] = $temp;
                unset ($temp);
            endwhile;

            echo '<br>';
            print_r($_SESSION['x1']); echo '<br>';
            print_r($_SESSION['x2']); echo '<br>';
            print_r($_SESSION['x3']); echo '<br>';
            print_r($_SESSION['x4']); echo '<br>';
            print_r($_SESSION['x5']); echo '<br>';

            $kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
            while ($arr_kriteria = mysqli_fetch_array($kriteria)):
                $id_kriteria = $arr_kriteria['kode_kriteria'];
                if($arr_kriteria['jenis'] == 'benefit') {
                    $temp[] = max($_SESSION['x'.$id_kriteria]);
                }
                if($arr_kriteria['jenis'] == 'cost') {
                    $temp[] = min($_SESSION['x'.$id_kriteria]);
                }
                for($i = 0;  $i < count($_SESSION['x'.$id_kriteria]); $i++) {

                    $temp[$i+1] = $_SESSION['x'.$id_kriteria][$i];
                    
                }
                $_SESSION['x'.$id_kriteria] = $temp;
                unset ($temp);
            endwhile;

            echo '<br>';
            echo '--Decision Matriks--';
            echo '<br>';
            print_r($_SESSION['x1']);echo '<br>';
            print_r($_SESSION['x2']);echo '<br>';
            print_r($_SESSION['x3']);echo '<br>';
            print_r($_SESSION['x4']);echo '<br>';
            print_r($_SESSION['x5']);echo '<br>';
            // Tutup Langkah 1 Matriks Keputusan


                    
            // Langkah 2  Normalisasi Matriks
            echo '<h2>Langkah Kedua</h2>';
            $kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
            while ($arr_kriteria = mysqli_fetch_array($kriteria)):
                $id_kriteria = $arr_kriteria['kode_kriteria'];
                $_SESSION['s'.$id_kriteria] = array_sum($_SESSION['x'.$id_kriteria]);
            endwhile;

            print_r($_SESSION['x1']); echo "Hasil => " ;print_r($_SESSION['s1']); echo '<br>';
            print_r($_SESSION['x2']); echo "Hasil => " ;print_r($_SESSION['s2']); echo '<br>';
            print_r($_SESSION['x3']); echo "Hasil => " ;print_r($_SESSION['s3']); echo '<br>';
            print_r($_SESSION['x4']); echo "Hasil => " ;print_r($_SESSION['s4']); echo '<br>';
            print_r($_SESSION['x5']); echo "Hasil => " ;print_r($_SESSION['s5']); echo '<br>';

            echo '<br>';
            echo '<br>';

            $kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
            while ($arr_kriteria = mysqli_fetch_array($kriteria)):
                $id_kriteria = $arr_kriteria['kode_kriteria'];
                for($i = 0;  $i < count($_SESSION['x'.$id_kriteria]); $i++) {

                    $div = $_SESSION['x'.$id_kriteria][$i] / $_SESSION['s'.$id_kriteria];
                    $round = round($div, 3);
                    echo $round." ";
                    $temp[] = $round;
                    
                }
                $_SESSION['a'.$id_kriteria] = $temp;
                unset ($temp);
                echo '<br>';
            endwhile;
            echo '<br>';
            print_r($_SESSION['a1']); echo '<br>';
            print_r($_SESSION['a2']); echo '<br>';
            print_r($_SESSION['a3']); echo '<br>';
            print_r($_SESSION['a4']); echo '<br>';
            print_r($_SESSION['a5']); echo '<br>';
            // Tutup Langkah 2  Normalisasi Matriks


            
            // Langkah 3 Menentukan Bobot Matriks
            echo '<h2>Langkah Ketiga</h2>';
            $kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
            while ($arr_kriteria = mysqli_fetch_array($kriteria)):
                $id_kriteria = $arr_kriteria['kode_kriteria'];
                $bobot = $arr_kriteria['bobot'] / 100;
                for($i = 0;  $i < count($_SESSION['a'.$id_kriteria]); $i++) {

                    $multiple = $_SESSION['a'.$id_kriteria][$i] * $bobot;
                    echo $multiple. " ";
                    $temp[] = $multiple;
                }
                $_SESSION['b'.$id_kriteria] = $temp;
                unset ($temp);
                echo '<br>';
            endwhile;

            echo '<br>';
            print_r($_SESSION['x1']); echo '<br>';
            print_r($_SESSION['x2']); echo '<br>';
            print_r($_SESSION['x3']); echo '<br>';
            print_r($_SESSION['x4']); echo '<br>';
            print_r($_SESSION['x5']); echo '<br>';
            //Tutup Langkah 3 Menentukan Bobot Matriks

            
            // Langkah 4 Menentukan Nilai Optimalisasi
            echo '<h2>Langkah Keempat</h2>';

            $kriteria = mysqli_query($koneksi, "SELECT * from tb_alternatif where hak_akses = 'karyawan'");
            while ($arr_kriteria = mysqli_fetch_array($kriteria)):
                    $temp_guru[] = $arr_kriteria;
            endwhile;
            $count = count($temp_guru);
            for($a = 0; $a < $count+1; $a++) {
                $kriteria = mysqli_query($koneksi, "SELECT * from tb_kriteria");
                for ($i = 0; $arr_kriteria = mysqli_fetch_array($kriteria); $i++){
                    $id_kriteria = $arr_kriteria['kode_kriteria'];
                    $temp[] = $_SESSION['b'.$id_kriteria][$a];
                    echo $_SESSION['b'.$id_kriteria][$a]. ' ';
                }
                $_SESSION['c'.$a] = array_sum($temp);
                unset ($temp);
                echo '<br>';
            }
            echo '<br>';
            print_r($_SESSION['c0']); echo '<br>';
            print_r($_SESSION['c1']); echo '<br>';
            print_r($_SESSION['c2']); echo '<br>';
            print_r($_SESSION['c3']); echo '<br>';
            // Tutup Langkah 4 Menentukan Nilai Optimalisasi

            // Langkah 5 Tingkatan Peringkat
            echo '<h2>Langkah Kelima</h2>';

            for($i = 0; $i < $count+1; $i++) {
                $div = $_SESSION['c'.$i] / $_SESSION['c0'];
                $_SESSION['d'.$i] = round($div, 3);
            }

            echo"<script>alert('Proses Berhasil Ke Tahap 2'); window.location='?page=hasil/hasilaras';</script>";

        }
        else {
            // header('location: ?page=hasil/aras');
            echo"<script>alert('Proses Gagal Ke Tahap 2'); window.location='?page=hasil/aras';</script>";

        }
        
    }

    function report ($koneksi) {
        $obj = mysqli_query($koneksi, "SELECT * from tb_alternatif where hak_akses = 'karyawan'");
        $i = 1;
        $arr = array();
        $id = array();
        while($b = mysqli_fetch_array($obj)) :
            $arr[]= $_SESSION['d'.$i];
            $id[] = $b['kode_alternatif'];
            $i++;

        endwhile;
        
        for ($x = 0; $x < count($arr); $x++) {
            for ($y = 0; $y < 3; $y++) {
                if($arr[$x] > $arr[$y]) {
                    $hasil = $arr[$x];
                    $hasil_id = $id[$x]; 

                    $arr[$x] = $arr[$y];
                    $id[$x] = $id[$y];

                    $arr[$y] = $hasil;
                    $id[$y] = $hasil_id;
                }
            }
        }
    
        $_SESSION['nilai'] = $arr;
        $_SESSION['kode_alternatif'] = $id;
        header('location:report_guru_terbaik.php');
        echo"<script>alert('Proses Berhasil Ke Tahap 3'); window.location='?page=hasil/nilaiahiraras';</script>";

    }
?>