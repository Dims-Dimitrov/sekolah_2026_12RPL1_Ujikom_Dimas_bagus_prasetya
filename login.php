<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="judul">Login</h1>
    <form action="login.php" method="POST">
        <label for="nis">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" class="loginbutton" name="login">Login</button>
    </form>

   <?php
include("sambungdatabase.php");

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE username='$username'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {

        $data = mysqli_fetch_assoc($query);

        if (password_verify($password, $data['password'])) {

            $_SESSION['id_user'] = $data["id_user"];
            $_SESSION['nis']     = $data["nis"];
            $_SESSION['role']    = $data["role"];

            if ($data['role'] == "admin") {
                header("location:Admin/laporan.php");
                exit();
            } else if ($data["role"] == "siswa") {
                header("location:halaman_pengaduan.php");
                exit();
            }

        } else {
            echo "<script>
                alert('Password salah');
                window.location.href='login.php';
            </script>";
        }

    } else {
        echo "<script>
            alert('Username tidak ditemukan');
            window.location.href='login.php';
        </script>";
    }
}
?>
</body>

</html>