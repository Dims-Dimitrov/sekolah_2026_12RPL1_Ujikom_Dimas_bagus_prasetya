<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../sambungdatabase.php'; 
    
    $query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori");
    
    ?>
</head>
<body>
    <table border="1">
        <tr>
            <td>NIS</td>
            <td>Lokasi</td>
            <td>Isi pengaduan</td>
            <td>Status</td>
            <td>Feedback</td>
            <td>Detail</td>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['lokasi']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><?php echo $data['feedback']; ?></td>
                <td><a href="tanggapi.php?id=<?php echo $data['id']; ?>">Tanggapi</a></td>
            </tr>
        <?php } ?>

    </table>

</html>