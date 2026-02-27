<?php session_start(); 
   include("auth.php");?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan - Laprassek</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>
    <div class="wadah-baris">
        <?php include("sidebar_siswa.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Riwayat Pengaduan Anda</h1>
            
            <?php
            include("auth.php");
            include 'sambungdatabase.php';

            if (!isset($_SESSION['nis'])) {
                header("Location: login.php");
                exit;
            }

            $nis = $_SESSION['nis'];

            $query = mysqli_query($koneksi, "SELECT * FROM `input_aspirasi` JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE nis='$nis'");
            
            if (mysqli_num_rows($query) > 0) {
            ?>
            <table class="tabel-data">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Isi Pengaduan</th>
                        <th>Tanggal & Waktu</th>
                        <th>Status</th>
                        <th>Feedback</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['lokasi']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
                            <td><?php echo substr($data['keterangan'], 0, 50); ?>...</td>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><span style="background: <?php echo ($data['status'] == 'Selesai') ? '#d4edda' : '#fff3cd'; ?>; padding: 5px 10px; border-radius: 4px;"><?php echo $data['status']; ?></span></td>
                            <td><?php echo substr($data['feedback'], 0, 30); ?>...</td>
                            <td><a href="halaman_detaildata.php?id=<?php echo $data['id']; ?>" class="tautan">Detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php 
            } else {
                echo '<div class="pesan-info">Anda belum membuat pengaduan apapun.</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>