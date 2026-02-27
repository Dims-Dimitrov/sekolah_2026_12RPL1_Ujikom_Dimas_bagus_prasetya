<?php session_start(); 
    include("../auth.php");?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapi Pengaduan - Laprassek</title>
    <link rel="stylesheet" href="../gaya.css">
    <?php include '../sambungdatabase.php';

    $id = ($_GET['id']);

    if (isset($_POST['update'])) {
        $status = $_POST['status'];
        $feedback = $_POST['feedback'];

        $update = mysqli_query($koneksi, "UPDATE input_aspirasi SET status='$status', feedback='$feedback' WHERE id='$id' ");

        if ($update) {
            echo "<script>alert('Berhasil diupdate'); window.location='laporan.php'</script>";
        } else {
            echo "gagal update";
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi  JOIN tbuser ON input_aspirasi.nis = tbuser.nis JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE input_aspirasi.id='$id'");

    ?>
</head>

<body>
    <div class="wadah-baris">
        <?php include("../sidebar_admin.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Tanggapi Pengaduan Siswa</h1>
            
            <?php $data = mysqli_fetch_assoc($query); ?>
            
            <div class="kartu">
                <p><strong>NIS :</strong> <?= $data['nis']; ?></p>
                <p><strong>Nama :</strong> <?= $data['nama']; ?></p>
                <p><strong>Kategori :</strong> <?= $data['nama_kategori']; ?></p>
                <p><strong>Lokasi :</strong> <?= $data['lokasi']; ?></p>
                <p><strong>Keterangan :</strong> <?= $data['keterangan']; ?></p>
            </div>

            <form action="" method="POST" class="formulir">
                <div class="grup-formulir">
                    <label for="status">Status Pengaduan</label>
                    <select name="status" id="status" required>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>

                <div class="grup-formulir">
                    <label for="feedback">Feedback / Tanggapan</label>
                    <textarea name="feedback" id="feedback" class="texarea-detail" required></textarea>
                </div>

                <button type="submit" class="tombol" name="update">Update Tanggapan</button>
                <a href="laporan.php" class="tombol-sekunder tombol" style="margin-left:10px;">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>