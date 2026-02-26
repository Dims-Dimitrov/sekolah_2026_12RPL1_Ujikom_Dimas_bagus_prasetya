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

    $query = mysqli_query($koneksi, "SELECT * FROM `tbuser` WHERE role='siswa'");
    ?>
    <h1>Daftar user siswa</h1>
    <table border="1">
        <tr>
            <td>NIS</td>
            <td>Password</td>
            <td>Nama</td>
            <td>Username</td>
            <td>Kelas</td>
            <td>Tanggal dibuat</td>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['Kelas']; ?></td>
                <td><?php echo $data['Create at']; ?></td>
            </tr>
        <?php } ?>

    </table>
    <div><a href="tambah_siswa.php">Tambah User Siswa</a></div>

</body>

</html>