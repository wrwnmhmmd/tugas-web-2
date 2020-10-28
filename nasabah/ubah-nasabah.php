<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-nasabah.php';

// ambil data di URL
$id_nasabah = $_GET["id_nasabah"];

// query data nasabah berdasarkan id-nya
$nasabah = query("SELECT * FROM tbl_nasabah WHERE id_nasabah = $id_nasabah")[0];

//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    //cek data berhasil di ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'home-nasabah.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'ubah-nasabah.php';
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
    <title>Edit Data Nasabah</title>
</head>

<body>
    <h1>Edit Data Nasabah</h1>
    <div class="card">
        <form action="" method="POST">
            <input type="hidden" name="id_nasabah" value="<?= $nasabah["id_nasabah"]; ?>">
            <ul>
                <li>
                    <label for="nama_nasabah">Nama Nasabah</label>
                    <input type="text" name="nama_nasabah" id="nama_nasabah" required value="<?= $nasabah["nama_nasabah"]; ?>">
                </li>
                <li>
                    <label for="nomor_rekening">Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" id="nomor_rekening" required value="<?= $nasabah["nomor_rekening"]; ?>">
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required value="<?= $nasabah["email"]; ?>">
                </li>
                <li>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" required value="<?= $nasabah["alamat"]; ?>">
                </li>
                <li>
                    <label for="nomor_handphone">Nomor Handphone</label>
                    <input type="text" name="nomor_handphone" id="nomor_handphone" required value="<?= $nasabah["nomor_handphone"]; ?>">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>