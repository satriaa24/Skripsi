<?php
require_once'functions.php';
/**login */ 
if ($page=='login'){
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION['login'] = $row->user;

        redirect_js("index.php");
    } else{
        print_msg("Salah kombinasi username dan password.");
    }          
}
/** password */
else if ($page=='password'){
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif($act=='logout'){
    unset($_SESSION['login']);
    header("location:login.php");
}

/** alternatif */    
else if($page=='karyawan/alternatif_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    
    if($kode=='' || $nama=='' || $alamat=='' || $tanggal_lahir=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
   elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, alamat_alternatif, tanggal_lahir, username, password, hak_akses) VALUES ('$kode', '$nama', '$alamat', '$tanggal_lahir', '$username', '$password', '$hak_akses')");
        $db->query("INSERT INTO tb_relasi(kode_alternatif, kode_kriteria) SELECT '$kode', kode_kriteria FROM tb_kriteria");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiTambah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=karyawan/view";
       });
                 </script>';
    }                    
} else if($page=='karyawan/alternatif_ubah'){
    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    
    if($nama=='' || $alamat=='' || $tanggal_lahir=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama', alamat_alternatif='$alamat', tanggal_lahir='$tanggal_lahir', username='$username', password='$password', hak_akses='$hak_akses' WHERE kode_alternatif='$_GET[ID]'");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=karyawan/view";
       });
                 </script>';
    }    
} else if ($act=='alternatif_hapus'){
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
     $db->query("DELETE FROM tb_relasi WHERE kode_alternatif='$_GET[ID]'");
     echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=karyawan/view';</script>";
} 
    
/** KRITERIA */    
else if($page=='kriteria/kriteria_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if($kode=='' || $nama=='' ||$bobot=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
   elseif($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode'"))
        print_msg("Kode sudah ada!");
    
    else{
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria,bobot) VALUES ('$kode', '$nama', '$bobot')"); 
        $db->query("INSERT INTO tb_relasi(kode_alternatif, kode_kriteria, nilai) SELECT kode_alternatif, '$kode', 0  FROM tb_alternatif");           
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data berhasil DiTambah",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=kriteria/view";
 });
           </script>';
    }                    
} else if($page=='kriteria/kriteria_ubah'){
    $nama = $_POST['nama'];    
    $bobot = $_POST['bobot'];
    
    if( $nama==''||$bobot=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
         $db->query("UPDATE tb_kriteria SET nama_kriteria='$nama', bobot='$bobot' WHERE kode_kriteria='$_GET[ID]'");
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data berhasil DiUbah",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=kriteria/view";
 });
           </script>';
    }    
} else if ($act=='kriteria_hapus'){
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_kriteria='$_GET[ID]'");
    echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=kriteria/view';</script>";

   
} 
/** rel_alternatif_ubah */ 
else if ($page=='penilaian/rel_alternatif_ubah'){
    foreach($_POST as $key => $value){
        $ID = str_replace('ID-', '', $key);
        $db->query("UPDATE tb_relasi SET nilai='$value' WHERE ID='$ID'");
    }
    echo '<script>
  swal({
   title: "Good job!",
   text: "Data berhasil Diubah",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=penilaian/view";
 });
           </script>';
}
else if($page=='nilai/nilai_tambah1'){
    $kode_kriteria = $_POST['kode_kriteria'];
    $kode_alternatif = $_POST['kode_alternatif'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $rata = ($nilai1+$nilai2+$nilai3+$nilai4+$nilai5)/5;
    
    if($kode_kriteria=='' ||$kode_alternatif=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_nilai WHERE kode_kriteria='$kode_kriteria' AND kode_alternatif='$kode_alternatif'"))
        echo '<script>
        swal({
         title: "Ops!",
         text: "Anda Sudah Mengisi Penilaian",
         icon: "error",
         button: "oke!",
       }).then(function() {
         window.location = "";
       });
                 </script>';             else{
        $db->query("INSERT INTO tb_nilai (kode_kriteria, kode_alternatif, nilai1,nilai2,nilai3,nilai4,nilai5,rata2) VALUES ('$kode_kriteria', '$kode_alternatif', '$nilai1', '$nilai2', '$nilai3','$nilai4','$nilai5','$rata')"); 
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data Penilaian Bekerja Sama Dalam Team berhasil DiTambah, Lanjut Ke Penilaian kreativitas",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=nilai/nilai_tambah2";
 });
           </script>';
    }                    
} else if($page=='nilai/nilai_tambah2'){
    $kode_kriteria = $_POST['kode_kriteria'];
    $kode_alternatif = $_POST['kode_alternatif'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $rata = ($nilai1+$nilai2+$nilai3+$nilai4+$nilai5)/5;
    
    if($kode_kriteria=='' ||$kode_alternatif=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_nilai WHERE kode_kriteria='$kode_kriteria' AND kode_alternatif='$kode_alternatif'"))
        echo '<script>
        swal({
         title: "Ops!",
         text: "Anda Sudah Mengisi Penilaian",
         icon: "error",
         button: "oke!",
       }).then(function() {
         window.location = "";
       });
                 </script>';    
                         else{
        $db->query("INSERT INTO tb_nilai (kode_kriteria, kode_alternatif, nilai1,nilai2,nilai3,nilai4,nilai5,rata2) VALUES ('$kode_kriteria', '$kode_alternatif', '$nilai1', '$nilai2', '$nilai3','$nilai4','$nilai5', '$rata')"); 
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data Penilaian kreativitas berhasil DiTambah, Lanjut Ke Penilaian Attitude",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=nilai/nilai_tambah3";
 });
           </script>';
    }                    
} 
else if($page=='nilai/nilai_tambah3'){
    $kode_kriteria = $_POST['kode_kriteria'];
    $kode_alternatif = $_POST['kode_alternatif'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $rata = ($nilai1+$nilai2+$nilai3+$nilai4+$nilai5)/5;
    
    if($kode_kriteria=='' ||$kode_alternatif=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_nilai WHERE kode_kriteria='$kode_kriteria' AND kode_alternatif='$kode_alternatif'"))
        echo '<script>
        swal({
         title: "Ops!",
         text: "Anda Sudah Mengisi Penilaian",
         icon: "error",
         button: "oke!",
       }).then(function() {
         window.location = "";
       });
                 </script>';    
        else{
        $db->query("INSERT INTO tb_nilai (kode_kriteria, kode_alternatif, nilai1,nilai2,nilai3,nilai4,nilai5,rata2) VALUES ('$kode_kriteria', '$kode_alternatif', '$nilai1', '$nilai2', '$nilai3','$nilai4','$nilai5', '$rata')"); 
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data Penilaian Attitude berhasil DiTambah, Lanjut Ke Pengisian Data",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=penilaian/view";
 });
           </script>';
    }                    
} 
?>
