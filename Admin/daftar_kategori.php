<?php session_start(); 
   include("../auth.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("../sidebar_admin.php")?>
    <?php
    include '../sambungdatabase.php';

    $query = mysqli_query($koneksi, "SELECT * FROM `kategori`");
    ?>
    <h1>Daftar user siswa</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Kategori</td>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['id_kategori']; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
            </tr>
        <?php } ?>

    </table>
    <div><a href="tambah_kategori.php">Tambah kategori</a></div>

</body>

</html>