<?php 

include("../sambungdatabase.php");

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

header("location:daftar_kategori.php")
?>