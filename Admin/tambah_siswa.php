<?php session_start();
include("../auth.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
     <?php include("../sidebar_admin.php")?>
    <div>
        <h1>Tambahkan siswa</h1>
        <form action="" method="POST">
            <label>NIS</label>
            <input type="text" id="NIS" name="NIS"><br><br>

             <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username siswa" required><br><br>

            <label for="namasiswa">Nama siswa</label>
            <input type="text" id="namasiswa" name="namasiswa" placeholder="Masukkan Nama Siswa" required><br><br>

            <label for="Kelas">Kelas</label>
            <select id="kelas" name="Kelas" required>
                <option value="XII RPL 1">XII RPL 1</option>
                <option value="XII RPL 2">XII RPL 2</option>
            </select><br><br>

            <label for="password">Password</label>
            <input type="text" id="password" name="password" placeholder="Masukkan password" required><br><br>

            <button type="submit" class="simpanbutton" name="kirim">Simpan</button>
            </a>
        </form>
    </div>
</body>

</html>