<?php session_start(); 
    include("../auth.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../sambungdatabase.php';

    $id = ($_GET['id']);

    if (isset($_POST['update'])) {
        $status = $_POST['status'];
        $feedback = $_POST['feedback'];

        $update = mysqli_query($koneksi, "UPDATE input_aspirasi SET status='$status', feedback='$feedback' WHERE id='$id' ");

        if ($update) {
            echo "<script>alert('berhasil update'); window.location='laporan.php'</script>";
        } else {
            echo "gagal update";
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi  JOIN tbuser ON input_aspirasi.nis = tbuser.nis JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE input_aspirasi.id='$id'");


    ?>
</head>

<body>
     <?php include("../sidebar_admin.php")?>

    <div>
        <?php $data = mysqli_fetch_assoc($query); ?>
        <h1>Detail Data Pengaduan</h1>
        <p>NIS : <?= $data['nis']; ?></p>
        <p>nama : <?= $data['nama']; ?></p>
        <p>Kategori : <?= $data['nama_kategori']; ?></p>
        <p>Lokasi : <?= $data['lokasi']; ?></p>
        <p>keterangan : <?= $data['keterangan']; ?></p>
    </div>

    <form action="" method="POST">
        <label for="status">Status:</label>
        <select name="status" id="">
            <option value="Menunggu">Menunggu</option>
            <option value="Diproses">Diproses</option>
            <option value="Selesai">Selesai</option>
        </select>

        <label for="feedback">Feedback:</label>
        <textarea name="feedback" id=""></textarea>

        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>