<?php
$hostname_koneksi = "localhost";
$database_koneksi = "skripsi_satria";
$username_koneksi = "root";
$password_koneksi = "";
$koneksi = mysqli_connect($hostname_koneksi, $username_koneksi, $password_koneksi) or trigger_error(mysqli_error($koneksi),E_USER_ERROR); 


?>