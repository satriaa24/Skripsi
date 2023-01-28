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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<?php 

// connect to database
include_once("views/config.php");

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['Submit'])) {
    register();
}



// REGISTER ADMIN
function register(){
    global $conn, $errors;

    $kode_alternatif    =  e($_POST['kode_alternatif']);
    $nama_alternatif    =  e($_POST['nama_alternatif']);
    $username    =  e($_POST['username']);
    $hak_akses       =  e($_POST['hak_akses']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);
    $email    =  e($_POST['email']);

    
    

    // form validation: ensure that the form is correctly filled
    if (empty($kode_alternatif)) { 
        array_push($errors,                                           
        '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
             Nama Harus Di Isi !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        '); 
    }
    if (empty($nama_alternatif)) { 
        array_push($errors,                                           
        '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
             Nama Harus Di Isi !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        '); 
    }
    if (empty($username)) { 
        array_push($errors,   '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
            Username Harus Di Isi !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        '); 
    }
    if (empty($hak_akses)) { 
        array_push($errors,   '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
            hak_akses Harus Di Isi !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        '); 
    }

    if (empty($email)) { 
        array_push($errors,   '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
            email Harus Di Isi !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        '); 
    }

    if (empty($password_1)) { 
        array_push($errors,  '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
            Password Harus Di Isi !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        '); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, '   
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="zmdi zmdi-block"></i>
            </div>
            <strong>Oh snap!</strong> Input Data gagal,(psw ke 2 tidak sama dengan yang ke 1)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                </span>
            </button>
        </div>                                        
      
        ');
    }
   

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = ($password_1);//encrypt the password before saving in the database

        if (isset($_POST['hak_akses'])) {
            $hak_akses = e($_POST['hak_akses']);
            $query = "INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, username, email, hak_akses, password) 
                      VALUES('$kode_alternatif', '$nama_alternatif', '$username', '$email', '$hak_akses', '$password')";
            mysqli_query($conn, $query);
            $query2 = "INSERT INTO tb_relasi(kode_alternatif, kode_kriteria) SELECT '$kode_alternatif', kode_kriteria FROM tb_kriteria";
            mysqli_query($conn, $query2);
            $SE_SSION['success']  = "New Peserta successfully created!!";
            echo'<script>alert(\'Peserta Berhasil Di buat Silahkan Login\')
	setTimeout(\'location.href="./"\' ,0);</script>';
        }else{
            $query = "INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, username, email, hak_akses, password) 
                      VALUES('$kode_alternatif','$nama_alternatif', '$username', '$email', '$hak_akses', '$password')";
            mysqli_query($conn, $query);
            $query2 = "INSERT INTO tb_relasi(kode_alternatif, kode_kriteria) SELECT '$kode_alternatif', kode_kriteria FROM tb_kriteria";
            mysqli_query($conn, $query2);

            
            				
        }

    }

}



// LOGIN ADMIN


// return user array from their id
function getUserById($id){
    global $conn;

}
// LOGIN USER

// escape string
function e($val){
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}

function display_error() {
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">';
            foreach ($errors as $error){
                echo $error .'<br>';
            }
        echo '</div>';
    }
    
}
?>
<?php


$query = "SELECT max(kode_alternatif) as maxKode FROM tb_alternatif";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kode_alternatif = $data['maxKode'];
$noUrut = (int) substr($kode_alternatif, 2, 3);
$noUrut++;
$char = "21";
$kode_alternatif = $char . sprintf("%1s", $noUrut);
?>

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
                                        <a href="index.html"><img src="https://i.ibb.co/j88Xszh/Screenshot-18.png"
                                                alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <?php echo display_error(); ?>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Kode</strong></label>
                                            <input type="text" class="form-control" readonly placeholder="Kode"
                                                name='kode_alternatif' value='<?php echo $kode_alternatif; ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username"
                                                name='nama_alternatif'>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username"
                                                name='username'>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com"
                                                name='email'>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name='password_1'>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Ulangi Password</strong></label>
                                            <input type="password" class="form-control" name='password_2'>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Posisi Yang Di Pilih</strong></label>
                                            <select class="form-control"  name="ket_posisi">

                                                <option value="Manajer pemasaran">Manajer pemasaran</option>
                                                <option value="Ob">Ob</option>
                                                <option value="Penjaga tiket">Penjaga tiket</option>
                                                <option value="Tour guide">Tour guide</option>

                                            </select>
                                        </div>
                                        <input type="hidden" class="form-control" name='hak_akses' value='karyawan'>
                                        <div class="text-center mt-4">
                                            <button type="submit" id="submit" name="Submit"
                                                class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white"
                                                href="./">Sign in</a></p>
                                    </div>
                                </div>
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