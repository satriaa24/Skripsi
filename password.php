
<?php  require_once('Connections/koneksi.php');  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
			
		
		mysqli_select_db($koneksi, $database_koneksi);
		$rs_sql = sprintf("SELECT kode_alternatif FROM tb_alternatif WHERE kode_alternatif = %s",
							GetSQLValueString($koneksi, $_POST['hak_akses'], "int"));
									
		$sql = mysqli_query($koneksi, $rs_sql) or die(mysqli_error($koneksi));
		$cek = mysqli_num_rows($sql); 
		
		//jika ada maka edit password admin		
		if ($cek > 0) {
				$updateSQL = sprintf("UPDATE tb_alternatif SET Password=PASSWORD(%s) WHERE kode_alternatif=%s",
								   GetSQLValueString($koneksi, $_POST['password'], "text"),
								   GetSQLValueString($koneksi, $_POST['hak_akses'], "int"));
					
				mysqli_select_db($koneksi, $database_koneksi);
				$Result1 = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));   
				
				if ($Result1) {
					pesanlink('Password successfully changed','login.php');
				}
		 }
		
		
}

$colname_search = "-1";
$colname_Login = "-1";
if (isset($_POST['search'])) {
  $colname_search = $_POST['search'];
  $colname_Login = $_POST['hak_akses'];  
}
  mysqli_select_db($koneksi, $database_koneksi);
  $query_search = sprintf("SELECT `kode_alternatif`, `username`, `hak_akses`, `nama_alternatif` FROM tb_alternatif WHERE hak_akses = %s AND `username` = %s ", 
  	GetSQLValueString($koneksi, $colname_search, "text"),
	GetSQLValueString($koneksi, $colname_Login, "text"));
  $search = mysqli_query($koneksi, $query_search) or die(mysqli_error($koneksi));
  $row_search = mysqli_fetch_assoc($search);
  $totalRows_search = mysqli_num_rows($search);  
   
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobie : Job Portal Admin Template" />
	<meta property="og:title" content="Jobie : Job Portal Admin Template" />
	<meta property="og:description" content="Jobie : Job Portal Admin Template" />
	<meta property="og:image" content="page-error-404.html" />
	<meta name="format-detection" content="telephone=no">
    <title>Jobie - Job Portal Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Enter your Username & Key here</h4>
                                    <form id="form1" name="form1" method="post" action="">
                                        <div class="form-group">
                                            <label class="text-white"><strong>Username</strong></label>
                                            <input type="text" name="search" id="Username" class="form-control" value="Username">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-white"><strong>Key</strong></label>
                                            <input type="text" name="hak_akses" id="hak_akses" class="form-control" value="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="button" class="btn bg-white text-primary btn-block">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <?php if ((isset($_POST['search'])) && ($totalRows_search == 0)) { // Show if recordset empty ?>
          <p class="callout callout-danger animated slideInDown">Account not found</p>
          <?php } // Show if recordset empty ?>
        <?php if ($totalRows_search > 0) { // Show if recordset not empty ?>
        <div class="box  animated tada">
        <div class="box-body">
          <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
            <table height="158" align="center">
              <tr valign="baseline">
                <td colspan="2"><div align="center">Please enter your new password.<br> 
                  <?= $row_search['nama_alternatif']; ?> 
                </div></td>
              </tr>
              <tr valign="baseline">
                <td height="54" colspan="2"><div align="center"><strong>New Password</strong></div>
                <input type="password" name="password" value="" size="32" class="form-control" required/></td>
              </tr>
              <tr valign="baseline">
                <td valign="bottom"><input type="submit" value="Change Passsword" class="btn btn-primary btn-block"/></td>
                <td valign="bottom"><div align="right"><a href="login.php" class="btn btn-warning">Back to Home</a></div></td>
              </tr>
            </table>
            <input type="hidden" name="MM_update" value="form2" />
            <input type="hidden" name="key" value="<?php echo $row_search['ID']; ?>" />
          </form>
          </div> 
          </div>
          <?php } // Show if recordset not empty ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>

</body>


</html>