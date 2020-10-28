<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-transaksi-teller.php';

// ambil data di URL
$id_transaksi = $_GET["id_transaksi"];

// query data cso berdasarkan id-nya
$transaksi = query("SELECT * FROM transaksi_teller WHERE id_transaksi = $id_transaksi")[0];

//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    //cek data berhasil di ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'home-transaksi-teller.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'home-transaksi-teller.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Transaksi Teller</title>
</head>

<body>
    <h1>Edit Data Transaksi Teller</h1>
    <div class="card">
        <form action="" method="POST">
            <input type="hidden" name="id_transaksi" value="<?= $transaksi["id_transaksi"]; ?>">
            <ul>
                <li>
                    <label for="nama_teller">Nama Teller</label>
                    <input type="text" name="nama_teller" id="nama_teller" required value="<?= $transaksi["nama_teller"]; ?>">
                </li>
                <li>
                    <label for="nama_nasabah"Nama Nasabah</label>
                    <input type="text" name="nama_nasabah" id="nama_nasabah" required value="<?= $transaksi["nama_nasabah"]; ?>">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>