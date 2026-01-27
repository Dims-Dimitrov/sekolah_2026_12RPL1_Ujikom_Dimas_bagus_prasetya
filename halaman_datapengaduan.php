<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'sambungdatabase.php';

    $query = mysqli_query($koneksi, "SELECT * FROM `input_aspirasi`");
    ?>
    <table>
        <tr>
            <td>NIS</td>
            <td>Lokasi</td>
            <td>Isi pengaduan</td>
            <td>Status</td>
            <td>Feedback</td>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['NIS']; ?></td>
                <td><?php echo $data['lokasi']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['status']; ?>
            </tr>
        <?php } ?>

    </table>

</body>

</html>