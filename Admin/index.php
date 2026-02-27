<?php session_start(); 
    include("../auth.php");?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Laprassek</title>
    <link rel="stylesheet" href="../gaya.css">
    <?php include '../sambungdatabase.php'; 
    
    $query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori");
    
    ?>
</head>
<body>
    <div class="wadah-baris">
        <?php include("../sidebar_admin.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Dashboard Admin</h1>
            
            <div style="display:flex; gap:20px; margin-bottom:30px;">
                <a href="tambah_siswa.php" class="tombol">Tambah Siswa</a>
                <a href="laporan.php" class="tombol">Filter Laporan</a>
            </div>
            
            <table class="tabel-data">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Lokasi</th>
                        <th>Isi Pengaduan</th>
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
                            <td><?php echo substr($data['keterangan'], 0, 50); ?>...</td>
                            <td><?php echo $data['status']; ?></td>
                            <td><?php echo substr($data['feedback'], 0, 30); ?>...</td>
                            <td><a href="tanggapi.php?id=<?php echo $data['id']; ?>" class="tautan">Tanggapi</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>