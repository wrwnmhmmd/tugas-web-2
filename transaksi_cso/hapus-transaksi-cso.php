<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-transaksi-cso.php';

$id_transaksi = $_GET["id_transaksi"];

if(hapus($id_transaksi) > 0) {
    echo "
    <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'home-transaksi-cso.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'home-transaksi-cso.php';
    </script>
";
}
