<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-teller.php';

// ambil data di URL
$id_teller = $_GET["id_teller"];

// query data cso berdasarkan id-nya
$teller = query("SELECT * FROM tbl_teller WHERE id_teller = $id_teller")[0];

//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    //cek data berhasil di ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'home-teller.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'ubah-teller.php';
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
    <title>Edit Data Teller</title>
</head>

<body>
    <h1>Edit Data Teller</h1>
    <div class="card">
        <form action="" method="POST">
            <input type="hidden" name="id_teller" value="<?= $teller["id_teller"]; ?>">
            <ul>
                <li>
                    <label for="nama_teller">Nama Teller</label>
                    <input type="text" name="nama_teller" id="nama_teller" required value="<?= $teller["nama_teller"]; ?>">
                </li>
                <li>
                    <label for="npp_teller">NPP Teller</label>
                    <input type="text" name="npp_teller" id="npp_teller" required value="<?= $teller["npp_teller"]; ?>">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>