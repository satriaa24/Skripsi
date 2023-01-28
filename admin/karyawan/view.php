<?php  
$maxRows_rs_alternatif = 20;
$pageNum_rs_alternatif = 0;
if (isset($_GET['pageNum_rs_alternatif'])) {
  $pageNum_rs_alternatif = $_GET['pageNum_rs_alternatif'];
}
$startRow_rs_alternatif = $pageNum_rs_alternatif * $maxRows_rs_alternatif;

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_alternatif = "SELECT kode_alternatif, nama_alternatif, hak_akses FROM tb_alternatif where 1 = 1 AND hak_akses='karyawan' ORDER BY kode_alternatif ASC ";
$query_limit_rs_alternatif = sprintf("%s LIMIT %d, %d", $query_rs_alternatif, $startRow_rs_alternatif, $maxRows_rs_alternatif);
$rs_alternatif = mysqli_query($koneksi, $query_limit_rs_alternatif) or die(mysqli_error($koneksi));
$row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif);

if (isset($_GET['totalRows_rs_alternatif'])) {
  $totalRows_rs_alternatif = $_GET['totalRows_rs_alternatif'];
} else {
  $all_rs_alternatif = mysqli_query($koneksi, $query_rs_alternatif);
  $totalRows_rs_alternatif = mysqli_num_rows($all_rs_alternatif);
}
$totalPages_rs_alternatif = ceil($totalRows_rs_alternatif/$maxRows_rs_alternatif)-1;

		
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
 <!-- <p><a href="?page=karyawan/alternatif_tambah" class="btn btn-xs btn-primary"><span class="fa fa-save"></span> Insert Data</a> </p> -->
 <?php if ($totalRows_rs_alternatif > 0) { ?>
  <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Karyawan</h4>
                            </div>
  <div class="card-body">
    <div class="panel-heading">
          <div class="form-group">
                <a class="btn btn-primary btn-rounded" href="?page=karyawan/alternatif_tambah"><span class="fa fa-save"></span> Tambah Karyawan</a>
            </div>
    </div>
<div class="table-responsive">
<table id="example3" class="display table-responsive-lg">
<thead>
   <tr bgcolor="#709FED" align="center">
     <th>NO</th>
     <th>NAMA</th>
     <th>JABATAN</th>
     <th>Action</th>
   </tr>
   </thead>
   <tbody>
  <?php $no = 1; do { ?>
     <tr align="center">
       <td><?php echo $no++; ?></td>
       <td><?php echo $row_rs_alternatif['nama_alternatif']; ?></td>
       <td><?php echo $row_rs_alternatif['hak_akses']; ?></td>
       <td>
													<div class="d-flex justify-content-center">
														<a href="?page=karyawan/alternatif_ubah&amp;ID=<?php echo $row_rs_alternatif['kode_alternatif']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="aksi.php?act=alternatif_hapus&amp;ID=<?php echo $row_rs_alternatif['kode_alternatif']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>	
       </tr>
     <?php } while ($row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif)); ?>
     </tbody>
 </table> 
</div>
</div>
</div>
</div>
<?php }else{ 
	pesan('danger','Oops! Alternatif belum ada. Silahkan Tambahkan'); 
  
}
?>