<?php  
if ((isset($_GET['kode_alternatif'])) && ($_GET['kode_alternatif'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_alternatif WHERE kode_alternatif=%s",
                       GetSQLValueString($koneksi, $_GET['kode_alternatif'], "int"));

  mysqli_select_db($koneksi, $database_koneksi);
  $Result1 = mysqli_query($koneksi, $deleteSQL) or die(mysqli_error($koneksi));
  echo '<script>
  swal({
   title: "Good job!",
   text: "Data Alternatif/karyawan berhasil dihapus",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=karyawan/view";
 });
           </script>';
}
?> 