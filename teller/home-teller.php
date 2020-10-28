<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /login.php");
    exit;
}
require 'function-teller.php';
$teller = query("SELECT * FROM tbl_teller");

// tombol cari
if (isset($_POST["cari"])) {
    $nasabah = cari($_POST["keyword"]);
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
</head>

<body>
    <h1>Daftar Teller</h1>
    <a href="tambah-teller.php">Tambah Data Teller</a>
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
            <th>Nama Teller</th>
            <th>NPP Teller</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($teller as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah-teller.php?id_teller=<?= $row["id_teller"]; ?>">Ubah</a> |
                    <a href="hapus-teller.php?id_teller=<?= $row["id_teller"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>
                </td>
                <td><?= $row["nama_teller"]; ?></td>
                <td><?= $row["npp_teller"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>