<?php 
include("sambungdatabase.php");

if(isset($_POST["kirim"])){ 
    $nis = $_POST["NIS"];
    $lokasi = $_POST["lokasi"];
    $id_kategori = $_POST["id_kategori"];
    $keterangan = $_POST["keterangan"];

    $query = "INSERT INTO input_aspirasi (nis, lokasi, id_kategori, keterangan) 
              VALUES ('$nis', '$lokasi', '$id_kategori', '$keterangan')";

    $simpan = mysqli_query($koneksi, $query);

    if($simpan){
        echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'halaman_pengaduan.php';
        </script>";
    } else {
        echo "Data Gagal Disimpan: " . mysqli_error($koneksi);
    }
}
?>
