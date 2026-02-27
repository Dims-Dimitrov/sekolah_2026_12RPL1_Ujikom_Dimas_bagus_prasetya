<?php session_start(); 
   include("auth.php");?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - Laprassek</title>
    <link rel="stylesheet" href="gaya.css">
    <?php

    include("sambungdatabase.php");

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi  JOIN tbuser ON input_aspirasi.nis = tbuser.nis JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE input_aspirasi.id='$id'");

    $data = mysqli_fetch_assoc($query);
    ?>
</head>

<body>
    <div class="wadah-baris">
        <?php include("sidebar_siswa.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Detail Data Pengaduan</h1>

            <div class="kartu">
                <p><strong>Tanggal :</strong> <?= $data['tgl_pengaduan']; ?></p>
                <p><strong>NIS :</strong> <?= $data['nis']; ?></p>
                <p><strong>Nama :</strong> <?= $data['nama']; ?></p>
                <p><strong>Kategori :</strong> <?= $data['nama_kategori']; ?></p>
                <p><strong>Lokasi :</strong> <?= $data['lokasi']; ?></p>
                <p><strong>Keterangan :</strong> <?= $data['keterangan']; ?></p>
                <p><strong>Status :</strong> <?= $data['status']; ?></p>
                <div class="grup-formulir">
                    <label for="feedback"><strong>Feedback</strong></label>
                    <textarea name="feedback" id="feedback" class="texarea-detail" readonly><?php echo $data['feedback']; ?></textarea>
                </div>
                <a href="halaman_datapengaduan.php" class="tombol-sekunder tombol">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>