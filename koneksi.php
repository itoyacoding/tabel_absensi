<?php
//koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "dbabsensi";

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: close connection when done
// mysqli_close($koneksi);
?>
