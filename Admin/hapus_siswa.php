<?php 

include("../sambungdatabase.php");

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbuser WHERE id_user='$id'");

header("location:daftar_user_siswa.php")
?>