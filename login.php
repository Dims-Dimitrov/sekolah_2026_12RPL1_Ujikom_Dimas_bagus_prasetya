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
        <label for="nis">NIS:</label>
        <input type="text" id="nis" name="nis" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" class="loginbutton" name="login">Login</button>
    </form>

    <?php
    session_start();
    include("sambungdatabase.php");
    if (isset($_POST["login"])) {
        $nis = $_POST["nis"];
        $password = $_POST["password"];


        $query = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE nis='$nis' AND password='$password'");

        $cek = mysqli_num_rows($query);

        if ($cek > 0)
            $data = mysqli_fetch_assoc($query);

        //simpan data sementara
        $_SESSION['id'] = $data["id"];
        $_SESSION['nis'] = $data["nis"];
        $_SESSION['password'] = $data["password"];
        $_SESSION['role'] = $data["role"];
        $_SESSION['nis'] = $data["nis"];

        if($data['role'] == "admin") {
            header("location:Admin/halaman_dasbor.php");
        } else if ($data["role"] == "siswa") {
            header("location:halaman_utama.php");
        } else {
            header("location: login.php?pesan=NIS Salah");
        }

    }
    ?>
</body>

</html>