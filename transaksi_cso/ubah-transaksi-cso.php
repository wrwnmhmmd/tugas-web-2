<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-transaksi-cso.php';

// ambil data di URL
$id_transaksi = $_GET["id_transaksi"];

// Ambil data cso
$csos = query("SELECT * FROM tbl_cso");

// Ambil Data Nasabah
$nasabah = query("SELECT * FROM tbl_nasabah");

// query data cso berdasarkan id-nya
$transaksi = query("SELECT * FROM transaksi_cso WHERE id_transaksi = $id_transaksi")[0];

//untuk cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    //cek data berhasil di ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'home-transaksi-cso.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'home-transaksi-cso.php';
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
    <title>Edit Data Transaksi CSO</title>
</head>

<body>
    <h1>Edit Data Transaksi CSO</h1>
    <div class="card">
        <form action="" method="POST">
            <input type="hidden" name="id_transaksi" value="<?= $transaksi["id_transaksi"]; ?>">
            <ul>
            <li>
                    <label for="cso">Pilih CSO</label>
                    <select name="cso" id="cso">
                        <option value="">-- Pilih CSO --</option>
                        <?php 
                            foreach($csos as $cso) {
                        ?> 
                            <option value="<?= $cso["id_cso"]; ?>"
                            <?php
                                if($cso["id_cso"] == $transaksi["id_cso"]) {
                                    echo 'selected = "selected"';
                                }
                            ?>
                            ><?= $cso["nama_cso"]." ".$cso["npp_cso"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </li>
                <li>
                    <label for="nasabah">Nama Nasabah</label>
                    <select name="nasabah" id="nasabah">
                        <option value="">-- Pilih Nasabah --</option>
                        <?php
                            foreach($nasabah as $row) {
                        ?>
                            <option value="<?= $row["id_nasabah"]; ?>"
                            <?php
                                if($row["id_nasabah"] == $transaksi["id_nasabah"]) {
                                    echo 'selected = "selected"';
                                }
                            ?>
                            ><?= $row["nama_nasabah"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </li>
                <li>
                    <label for="jenis_layanan">Jenis Layanan</label>
                    <input type="text" name="jenis_layanan" id="jenis_layanan" value="<?= $transaksi["jenis_layanan"] ?>">
                </li>
                <li>
                    <label for="tgl_transaksi">Tanggal Transaksi</label>
                    <input type="date" name="tgl_transaksi" id="tgl_transaksi" value="<?= $transaksi["tanggal_transaksi"] ?>">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>