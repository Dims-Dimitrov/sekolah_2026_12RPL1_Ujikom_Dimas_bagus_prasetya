<?php session_start(); 
   include("../auth.php");?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori - Laprassek</title>
    <link rel="stylesheet" href="../gaya.css">
</head>

<body>
    <div class="wadah-baris">
        <?php include("../sidebar_admin.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Daftar Kategori Pengaduan</h1>
            
            <?php
            include '../sambungdatabase.php';

            $query = mysqli_query($koneksi, "SELECT * FROM `kategori`");
            ?>
            
            <table class="tabel-data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id_kategori']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
                            <td><a href="hapus_kategori.php?id=<?=$data['id_kategori']; ?>" class="tombol tombol-hapus" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <a href="tambah_kategori.php" class="tombol" style="display:inline-block; margin-top:20px;">Tambah Kategori</a>
        </div>
    </div>
</body>

</html>