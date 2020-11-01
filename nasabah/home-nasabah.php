<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /login.php");
    exit;
}
require 'function-nasabah.php';
$nasabah = query("SELECT * FROM tbl_nasabah");

// tombol cari
if (isset($_POST["cari"])) {
    $teller = cari($_POST["keyword"]);
}

// ambil data dari tabel
$result = mysqli_query($db, "SELECT * FROM tbl_nasabah");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/home-nasabah.css">
</head>

<body>
    <div class="container">
    <h1>Daftar Nasabah</h1>
    <a href="tambah-nasabah.php">Tambahkan Data Nasabah</a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Keyword Pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama Nasabah</th>
            <th>Nomor Rekening</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Nomor Handphone</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($nasabah as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah-nasabah.php?id_nasabah=<?= $row["id_nasabah"]; ?>">Ubah</a> |
                    <a href="hapus-nasabah.php?id_nasabah=<?= $row["id_nasabah"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>
                </td>
                <td><?= $row["nama_nasabah"]; ?></td>
                <td><?= $row["nomor_rekening"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["nomor_handphone"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
</body>

</html>