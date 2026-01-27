<?php 
include("sambungdatabase.php");
    
if(isset($_POST["kirim"])){ 
    $nis = $_POST["NIS"];
    $lokasi = $_POST["lokasi"];
    $kategori = $_POST["kategori"];
    $keterangan = $_POST["keterangan"];

    $query = mysqli_query($koneksi, "INSERT INTO tbpengaduan(nis, lokasi, kategori, keterangan) VALUES ('$nis', '$lokasi', '$kategori', '$keterangan')");

    $simpan = mysqli_query($koneksi, $query);
    if($simpan){
        echo "<script>alert('Data Berhasil Disimpan');
    window.location.href = 'halaman_pengaduan.php'; </script>";
    } else {
        echo "Data Gagal Disimpan" .mysqli_error($koneksi);
    }
}
?>