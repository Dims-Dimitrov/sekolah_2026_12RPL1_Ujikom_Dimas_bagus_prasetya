<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Contoh Sidebar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="halaman_pengaduan.php">halaman pengaduan</a></li>
                <li><a href="halaman_datapengaduan.php">Data Pengaduan</a></li>
                <li><a href="#">Pengaturan</a></li>
            </ul>
        </aside>

        <main class="content">
            <h1>Konten Utama</h1>
            <p>Ini adalah area konten.</p>
        </main>
    </div>

</body>

</html>