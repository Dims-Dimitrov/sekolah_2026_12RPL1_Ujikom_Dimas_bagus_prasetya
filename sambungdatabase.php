<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "2026_12rpl1_ujikom_dimas_bagus_prasetya";


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8");

?>
