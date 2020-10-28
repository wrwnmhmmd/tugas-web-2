<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /login.php");
    exit;
}
require 'function-transaksi-teller.php';
$transaksiTeller = query("SELECT * FROM transaksi_teller");

// tombol cari
if (isset($_POST["cari"])) {
    $cso = cari($_POST["keyword"]);
}

// ambil data dari tabel
$result = mysqli_query($db, "SELECT * FROM transaksi_teller");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Daftar Transaksi Teller</h1>
    <a href="tambah-transaksi-teller.php">Tambahkan Data Transaksi Teller</a>
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
            <th>Nama Nasabah</th>
            <th>Jumlah Setoran</th>
            <th>Tanggal Transaksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($transaksiTeller as $row) : ?>
            <tr>    
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah-transaksi-teller.php?id_cso=<?= $row["id_transaksi"]; ?>">Ubah</a> |
                    <a href="hapus-transaksi-teller.php?id_cso=<?= $row["id_transaksi"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>
                </td>
                <td>
                    <?php
                        // buat variable teller id
                        $idTeller = $row["id_teller"];
                        // ambil data dari table teller menggunakan id teller yang diambil di atas
                        $tellerName = query("SELECT nama_teller FROM tbl_teller WHERE id_teller = $idTeller");

                        // Ambil data hasil query yang masih dalam berbentuk array
                        $tellerNameArray = $tellerName[0];

                        // Cek Data tersebut ada atau tidak
                        if(!empty($tellerNameArray)) {
                            // kalau ada munculkan value nama tellernya 
                            echo $tellerNameArray['nama_teller'];
                        }

                    ?>
                </td>
                <td>
                    <?php
                        $idNasabah = $row["id_nasabah"];
                        $namaNasabah = query("SELECT nama_nasabah FROM tbl_nasabah WHERE id_nasabah = $idNasabah");

                        $namaNasabahArray = $namaNasabah[0];

                        if(!empty($namaNasabahArray)) {
                            echo $namaNasabahArray['nama_nasabah'];
                        }
                    ?>
                </td>
                <td><?= $row["nilai_setor_tunai"]; ?></td>
                <td><?= $row["tanggal_transaksi"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>