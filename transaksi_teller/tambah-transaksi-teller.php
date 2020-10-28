<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'function-transaksi-teller.php';

    // Ambil Data Teller
    $tellers = query("SELECT * FROM tbl_teller");

    // Ambil Data Nasabah
    $nasabah = query("SELECT * FROM tbl_nasabah");

    //untuk cek tombol submit sudah di tekan atau belum
    if (isset($_POST["submit"])) {
        //cek data berhasil di tambahkan
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'home-transaksi-teller.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'tambah-transaksi-teller.php';
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
    <title>Tambah Data Transaksi</title>
</head>

<body>
    <h1>Tambah Data Teller</h1>
    <div class="card">
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="teller">Pilih Teller</label>
                    <select name="teller" id="teller">
                        <option value="">-- Pilih Teller --</option>
                        <?php 
                            foreach($tellers as $teller) {
                        ?> 
                            <option value="<?= $teller["id_teller"]; ?>"><?= $teller["nama_teller"]." ".$teller["npp_teller"]; ?></option>
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
                            <option value="<?= $row["id_nasabah"]; ?>"><?= $row["nama_nasabah"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </li>
                <li>
                    <label for="jml_setoran">Jumlah Setoran</label>
                    <input type="number" name="jml_setoran" id="jml_setoran">
                </li>
                <li>
                    <label for="tgl_transaksi">Tanggal Transaksi</label>
                    <input type="date" name="tgl_transaksi" id="tgl_transaksi">
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>