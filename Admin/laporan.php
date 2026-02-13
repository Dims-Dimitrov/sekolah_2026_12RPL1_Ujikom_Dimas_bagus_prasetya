<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php   include("../sambungdatabase.php");?>
</head>
<body>
      <h2>laporan aspirasi</h2>
    <form action="" method="GET">
        <label for="">filter kategori</label>
        <select name="kategori" id="">
            <option value="">--SEMUA KATEGORI---</option>
            <option value="1">Sarana kelas</option>
            <option value="2">Lab jurusan</option>
        </select>
        <label for="">Cari NIS:</label>
        <input type="text" name="nis" placeholder="Masukkan nis">
        <button type="submit">filter data</button>
    </form>

    <?php 

    $query_text = "SELECT * FROM `input_aspirasi` JOIN `kategori` ON input_aspirasi.id_kategori = kategori.id_kategori WHERE 1=1";

    if(!empty($_GET['kategori'])) {
        $kat = $_GET['kategori'];
        $query_text .= "AND input_aspirasi.id_kategori = '$kat'";
    }

    if(!empty($_GET['nis'])) {
        $kat = $_GET['nis'];
        $query_text .= "AND input_aspirasi.id_nis = '$nis'";
    }

    $query = mysqli_query($koneksi, $query_text);
    ?>

      <table border="1">
        <tr>
            <!-- <td>ID</td> -->
            <td>NIS</td>
            <td>Kategori</td>
            <td>Lokasi</td>
            <td>Status</td>
        </tr>
         <?php while ($data = mysqli_fetch_assoc($query)) { ?>
         <tr>
               <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['status']; ?></td>
         </tr>
         <?php } ?>

</body>
</html>