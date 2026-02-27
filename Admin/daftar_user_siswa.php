<?php session_start(); 
    include("../auth.php");?>
    
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - Laprassek</title>
    <link rel="stylesheet" href="../gaya.css">
</head>

<body>
    <div class="wadah-baris">
        <?php include("../sidebar_admin.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Daftar User Siswa</h1>
            
            <?php
            include '../sambungdatabase.php';

            $query = mysqli_query($koneksi, "SELECT * FROM `tbuser` WHERE role='siswa'");
            ?>
            
            <table class="tabel-data">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Kelas</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['Kelas']; ?></td>
                            <td><?php echo $data['Create at']; ?></td>
                            <td><div class><a href="hapus_siswa.php?id=<?=$data['id_user']; ?>" class="tombol tombol-hapus" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a></div></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <a href="tambah_siswa.php" class="tombol" style="display:inline-block; margin-top:20px;">Tambah User Siswa</a>
        </div>
    </div>
</body>

</html>