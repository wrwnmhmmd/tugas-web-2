<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'function-transaksi-cso.php';

    // Ambil Data CSO
    $csos = query("SELECT * FROM tbl_cso");

    // Ambil Data Nasabah
    $nasabah = query("SELECT * FROM tbl_nasabah");

    //untuk cek tombol submit sudah di tekan atau belum
    if (isset($_POST["submit"])) {
        //cek data berhasil di tambahkan
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'home-transaksi-cso.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'tambah-transaksi-cso.php';
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
    <h1>Tambah Data CSO</h1>
    <div class="card">
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="cso">Pilih CSO</label>
                    <select name="cso" id="cso">
                        <option value="">-- Pilih CSO --</option>
                        <?php 
                            foreach($csos as $cso) {
                        ?> 
                            <option value="<?= $cso["id_cso"]; ?>"><?= $cso["nama_cso"]." ".$cso["npp_cso"]; ?></option>
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
                    <label for="jenis_layanan">Jenis Layanan</label>
                    <input type="text" name="jenis_layanan" id="jenis_layanan">
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