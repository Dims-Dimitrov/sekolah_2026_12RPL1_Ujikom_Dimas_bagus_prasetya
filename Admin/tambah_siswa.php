<?php session_start(); 
    include("../auth.php");?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa - Laprassek</title>
    <link rel="stylesheet" href="../gaya.css">
    <?php
    include("../sambungdatabase.php");

    if (isset($_POST["kirim"])) {
        $nis = $_POST["NIS"];
        $namasiswa = $_POST["namasiswa"];
        $username =  $_POST["username"];
        $kelas = $_POST["Kelas"];
        $raw_password = $_POST["password"];
        $role = "siswa";

        $password_aman = password_hash($raw_password, PASSWORD_DEFAULT);

        $query = "INSERT INTO tbuser (nis, nama, username, kelas, password, role) 
              VALUES ('$nis', '$namasiswa', '$username', '$kelas', '$password_aman', '$role')";

        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {
            echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'daftar_user_siswa.php';
        </script>";
        } else {
            echo "Data Gagal Disimpan: " . mysqli_error($koneksi);
        }
    }
    ?>
</head>

<body>
    <div class="wadah-baris">
        <?php include("../sidebar_admin.php")?>
        <div class="wadah-konten">
            <h1 class="judul-halaman">Tambah Siswa Baru</h1>
            
            <form action="" method="POST" class="formulir">
                <div class="grup-formulir">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="NIS" required>
                </div>

                <div class="grup-formulir">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username siswa" required>
                </div>

                <div class="grup-formulir">
                    <label for="namasiswa">Nama Siswa</label>
                    <input type="text" id="namasiswa" name="namasiswa" placeholder="Masukkan nama siswa" required>
                </div>

                <div class="grup-formulir">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="Kelas" placeholder="Masukkan Kelas" required>
                    </select>
                </div>

                <div class="grup-formulir">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="tombol" name="kirim">Simpan Siswa</button>
                <a href="daftar_user_siswa.php" class="tombol-sekunder tombol" style="margin-left:10px;">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>