<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-nasabah.php';

$id_nasabah = $_GET["id_nasabah"];

if (hapus($id_nasabah) > 0) {
    echo "
    <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'home-nasabah.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'home-nasabah.php';
    </script>
";
}
