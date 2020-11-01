<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /login.php");
    exit;
}
require 'function-transaksi-cso.php';
$transaksiCso = query("SELECT * FROM transaksi_cso");

//total setoran teller
// $totalTransaction = 0;

// foreach($transaksiTeller as $row) {
//     $nilaiSetorTunai = $row["nilai_setor_tunai"];

//     $totalTransaction += $nilaiSetorTunai;
// }

// $finalTotal = $totalTransaction;

// tombol cari
if (isset($_POST["cari"])) {
    $transaksiCso = cari($_POST["keyword"]);
}

// ambil data dari tabel
$result = mysqli_query($db, "SELECT * FROM transaksi_cso");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Customer Service</title>
</head>
<body>
    <h1>Daftar Transaksi Customer Service</h1>
    <!-- <h2>Total Transaksi Hari Ini :</h2> -->
    <a href="tambah-transaksi-cso.php">Tambahkan Data Transaksi CSO</a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Gunakan Id untuk melakukan pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama CSO</th>
            <th>Nama Nasabah</th>
            <th>Jenis Layanan</th>
            <th>Tanggal Transaksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($transaksiCso as $row) : ?>
            <tr>    
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah-transaksi-cso.php?id_transaksi=<?= $row["id_transaksi"]; ?>">Ubah</a> |
                    <a href="hapus-transaksi-cso.php?id_transaksi=<?= $row["id_transaksi"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>
                </td>
                <td>
                    <?php
                        // buat variable cso id
                        $idCso = $row["id_cso"];
                        // ambil data dari table cso menggunakan id cso yang diambil di atas
                        $csoName = query("SELECT nama_cso FROM tbl_cso WHERE id_cso = $idCso");
                        // Ambil data hasil query yang masih dalam berbentuk array
                        $csoNameArray = $csoName[0];
                        // Cek Data tersebut ada atau tidak
                        if(!empty($csoNameArray)) {
                            // kalau ada munculkan value nama CSO 
                            echo $csoNameArray['nama_cso'];
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
                <td><?= $row["jenis_layanan"]; ?></td>
                <td><?= $row["tgl_transaksi"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

        <!-- <tr>
            Total Transaksi 
            <?= number_format($finalTotal); ?>
        </tr> -->
</table>
</body>
</html>