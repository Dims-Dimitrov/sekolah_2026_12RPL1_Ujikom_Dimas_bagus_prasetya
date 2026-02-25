<?php session_start(); 
   include("../auth.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../sambungdatabase.php");
    $query_kat = mysqli_query($koneksi, "select * from kategori");
    ?>
</head>

<body>
    <h2>laporan aspirasi</h2>
    <form action="" method="GET">
        <label for="">filter kategori</label>
        <select name="kategori" id="">
            <option value="">SEMUA KATEGORI</option>
            <?php
            while ($data = mysqli_fetch_assoc($query_kat)) { ?>
                <option value="<?php echo $data['id_kategori']; ?>" <?php if (isset($_GET['kategori']) && $_GET['kategori'] == $data['id_kategori'])
                       echo "selected"; ?>>
                    <?php echo $data['nama_kategori']; ?>
                </option> <?php } ?>
        </select>
        <label for="">Cari NIS:</label>
        <input type="text" name="nis" placeholder="Masukkan nis"
            value="<?php echo isset($_GET['nis']) ? $_GET['nis'] : ''; ?>">

        <label for="">Cari Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>">
        <button type="submit">filter data</button>
    </form>

    <?php

    $query_text = "SELECT * FROM `input_aspirasi` JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE 1=1";

    if (!empty($_GET['kategori'])) {
        $kat = $_GET['kategori'];
        $query_text .= " AND input_aspirasi.id_kategori = '$kat'";
    }

    if (!empty($_GET['nis'])) {
        $nis = $_GET['nis'];
        $query_text .= " AND input_aspirasi.nis = '$nis'";
    }
    if (!empty($_GET['tanggal'])) {
        $tanggal = $_GET['tanggal'];
        $query_text .= " AND DATE(input_aspirasi.tgl_pengaduan) = '$tanggal'";
    }

    $query = mysqli_query($koneksi, $query_text);
    ?>

    <table border="1">
        <tr>
            <td>NIS</td>
            <td>Kategori</td>
            <td>Lokasi</td>
            <td>Status</td>
            <td>Tanggapi</td>
        </tr>
        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><a href="tanggapi.php?id=<?php echo $data['id']; ?>">Tanggapi</a></td>
            <?php } ?>

</body>

</html>