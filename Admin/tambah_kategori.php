<?php session_start();
include("../auth.php"); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - Laprassek</title>
    <link rel="stylesheet" href="../gaya.css">
    <?php
    include("../sambungdatabase.php");

    if (isset($_POST["kirim"])) {
        $namakategori = $_POST["namakategori"];

        $query = "INSERT INTO kategori (nama_kategori) 
              VALUES ('$namakategori')";

        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {
            echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'daftar_kategori.php';
        </script>";
        } else {
            echo "Data Gagal Disimpan: " . mysqli_error($koneksi);
        }
    }
    ?>
</head>
<body>
    <div class="wadah-baris">
        <?php include("../sidebar_admin.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Tambah Kategori Pengaduan</h1>
            
            <form action="" method="POST" class="formulir">
                <div class="grup-formulir">
                    <label for="namakategori">Nama Kategori</label>
                    <input type="text" id="namakategori" name="namakategori" placeholder="Masukkan nama kategori" required>
                </div>
                
                <button type="submit" class="tombol" name="kirim">Simpan Kategori</button>
                <a href="daftar_kategori.php" class="tombol-sekunder tombol" style="margin-left:10px;">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>