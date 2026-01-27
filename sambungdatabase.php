<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "2026_ujikom_12rpl1_dimas_bagus_p";


$koneksi = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

else {
    // echo "Koneksi berhasil";
}

mysqli_set_charset($koneksi, "utf8");

?>
