<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php 

    include("sambungdatabase.php");

    $query = mysqli_query($koneksi,"");

    
    ?>
</head>

<body>
    <div>
        <h1>Halaman Pengaduan</h1>
        <form action="" method="POST">
            <label>NIS</label>
            <input type="text" id="NIS" name="NIS" placeholder="Masukkan NIS Anda" required><br><br>

            <label for="lokasi">lokasi</label>
            <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi" required><br><br>

            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Fasilitas Sekolah">Fasilitas Sekolah</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Lainnya">Lainnya</option>


            <label for="keterangan">Isi Pengaduan</label>
            <textarea id="keterangan" name="keterangan" placeholder="Masukkan Isi Pengaduan Anda"
                required></textarea><br><br>

            <a href="">
                <button type="submit" class="simpanbutton">Simpan</button>
            </a>
        </form>
    </div>

    <?php
    include("sambungdatabase.php");




    ?>
</body>

</html>