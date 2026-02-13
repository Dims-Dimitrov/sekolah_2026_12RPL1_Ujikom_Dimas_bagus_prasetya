<?php session_start(); 
   include("auth.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("auth.php");
    include 'sambungdatabase.php';

    if (!isset($_SESSION['nis'])) {
        header("Location: login.php");
        exit;
    }

    $nis = $_SESSION['nis'];

    $query = mysqli_query($koneksi, "SELECT * FROM `input_aspirasi` JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE nis='$nis'");
    ?>
    <table border="1">
        <tr>
            <td>NIS</td>
            <td>Lokasi</td>
            <td>Kategori</td>
            <td>Isi pengaduan</td>
            <td>Tanggal & waktu</td>
            <td>Status</td>
            <td>Feedback</td>
            <td>Detail</td>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['lokasi']; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['tgl_pengaduan']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><?php echo $data['feedback']; ?></td>
                <td><a href="halaman_detaildata.php?id=<?php echo $data['id']; ?>">Detail</a></td>
            </tr>
        <?php } ?>

    </table>

</body>

</html>