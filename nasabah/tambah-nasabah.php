<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-nasabah.php';
//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek data berhasil di tambahkan
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'home-nasabah.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'tambah-nasabah.php';
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
    <title>Tambah Data Nasabah</title>
</head>

<body>
    <h1>Tambah Data Nasabah</h1>
    <div class="card">
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="nama_nasabah">Nama Nasabah</label>
                    <input type="text" name="nama_nasabah" id="nama_nasabah" required>
                </li>
                <li>
                    <label for="nomor_rekening">Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" id="nomor_rekening" required>
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </li>
                <li>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" required>
                </li>
                <li>
                    <label for="nomor_handphone">Nomor Handphone</label>
                    <input type="text" name="nomor_handphone" id="nomor_handphone" required>
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>