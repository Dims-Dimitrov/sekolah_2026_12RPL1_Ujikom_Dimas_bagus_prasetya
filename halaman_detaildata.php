<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("sambungdatabase.php");

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi  JOIN tbuser ON input_aspirasi.nis = tbuser.nis JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE input_aspirasi.id='$id'");

    $data = mysqli_fetch_assoc($query);
    ?>
</head>

<body>
    <div>
        <h1>Detail Data Pengaduan</h1>
        <p>NIS : <?= $data['nis']; ?></p>
        <p>nama : <?= $data['nama']; ?></p>
        <p>Kategori : <?= $data['nama_kategori']; ?></p>
        <p>Lokasi : <?= $data['lokasi']; ?></p>
        <p>keterangan : <?= $data['keterangan']; ?></p>
        <p>Status : <?= $data['status']; ?></p>
        <label for="">Feedback</label>
        <textarea name="feedback" id=""><?php echo $data['feedback']; ?></textarea>
    </div>
</body>

</html>