<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /login.php");
    exit;
}
require 'function-cso.php';
$cso = query("SELECT * FROM tbl_cso");

// tombol cari
if (isset($_POST["cari"])) {
    $cso = cari($_POST["keyword"]);
}

// ambil data dari tabel
$result = mysqli_query($db, "SELECT * FROM tbl_cso");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Daftar CSO</h1>
    <a href="tambah-cso.php">Tambahkan Data CSO</a>
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
            <th>Nama CSO</th>
            <th>NPP CSO</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($cso as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah-cso.php?id_cso=<?= $row["id_cso"]; ?>">Ubah</a> |
                    <a href="hapus-cso.php?id_cso=<?= $row["id_cso"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>
                </td>
                <td><?= $row["nama_cso"]; ?></td>
                <td><?= $row["npp_cso"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>