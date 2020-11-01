<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-transaksi-teller.php';

// ambil data di URL
$id_transaksi = $_GET["id_transaksi"];

// Ambil data teller
$tellers = query("SELECT * FROM tbl_teller");

// Ambil Data Nasabah
$nasabah = query("SELECT * FROM tbl_nasabah");

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
                    <label for="teller">Pilih Teller</label>
                    <select name="teller" id="teller">
                        <option value="">-- Pilih Teller --</option>
                        <?php 
                            foreach($tellers as $teller) {
                        ?> 
                            <option value="<?= $teller["id_teller"]; ?>"
                            <?php
                                if($teller["id_teller"] == $transaksi["id_teller"]) {
                                    echo 'selected = "selected"';
                                }
                            ?>
                            ><?= $teller["nama_teller"]." ".$teller["npp_teller"]; ?></option>
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
                    <label for="jml_setoran">Jumlah Setoran</label>
                    <input type="number" name="jml_setoran" id="jmlSetoran" value="<?= $transaksi["nilai_setor_tunai"] ?>">
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