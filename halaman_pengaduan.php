<?php session_start(); 
   include("auth.php");?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengaduan - Laprassek</title>
    <link rel="stylesheet" href="gaya.css">

    <?php 
    include("prosesaspirasi.php");
    include("sambungdatabase.php");
    $query = mysqli_query($koneksi,"select * from kategori");
    ?>
</head>

<body>
    <div class="wadah-baris">
        <?php include("sidebar_siswa.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Halaman Pengaduan</h1>
            <form action="" method="POST" class="formulir">
                <div class="grup-formulir">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="NIS" required value="<?php echo $_SESSION['nis']; ?>" readonly>
                </div>

                <div class="grup-formulir">
                    <label for="lokasi">Lokasi Perbaikan</label>
                    <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi" required>
                </div>

                <div class="grup-formulir">
                    <label for="kategori">Kategori Pengaduan</label>
                    <select id="kategori" name="id_kategori" required>
                        <option value="">Pilih Kategori</option>
                         <?php
                while ($data = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="grup-formulir">
                    <label for="keterangan">Isi Pengaduan</label>
                    <textarea id="keterangan" name="keterangan" placeholder="Masukkan Isi Pengaduan Anda" required></textarea>
                </div>

                <button type="submit" class="tombol" name="kirim">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
</body>

</html>