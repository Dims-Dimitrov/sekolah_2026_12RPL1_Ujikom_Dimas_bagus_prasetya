<?php session_start();
include("../auth.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
     <?php include("../sidebar_admin.php")?>
    <div>
        <h1>Tambahkan siswa</h1>
        <form action="" method="POST">
            <label>Nama kategori</label>
            <input type="text" id="" name="namakategori"><br><br>
            <button type="submit" class="simpanbutton" name="kirim">Simpan</button>
            </a>
        </form>
    </div>
</body>

</html>