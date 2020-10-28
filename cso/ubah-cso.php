<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-cso.php';

// ambil data di URL
$id_cso = $_GET["id_cso"];

// query data cso berdasarkan id-nya
$cso = query("SELECT * FROM tbl_cso WHERE id_cso = $id_cso")[0];

//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    //cek data berhasil di ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'home-cso.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'ubah-cso.php';
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
    <title>Edit Data CSO</title>
</head>

<body>
    <h1>Edit Data CSO</h1>
    <div class="card">
        <form action="" method="POST">
            <input type="hidden" name="id_cso" value="<?= $cso["id_cso"]; ?>">
            <ul>
                <li>
                    <label for="nama_cso">Nama CSO</label>
                    <input type="text" name="nama_cso" id="nama_cso" required value="<?= $cso["nama_cso"]; ?>">
                </li>
                <li>
                    <label for="npp_cso">NPP CSO</label>
                    <input type="text" name="npp_cso" id="npp_cso" required value="<?= $cso["npp_cso"]; ?>">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>