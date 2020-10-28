<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-cso.php';
//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek data berhasil di tambahkan
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'home-cso.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'tambah-cso.php';
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
    <title>Tambah Data CSO</title>
</head>

<body>
    <h1>Tambah Data CSO</h1>
    <div class="card">
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="nama_cso">Nama CSO</label>
                    <input type="text" name="nama_cso" id="nama_cso" required>
                </li>
                <li>
                    <label for="npp_cso">NPP CSO</label>
                    <input type="text" name="npp_cso" id="npp_cso" required>
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>