<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-teller.php';

$id_teller = $_GET["id_teller"];

if(hapus($id_teller) > 0) {
    echo "
    <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'home-teller.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'home-teller.php';
    </script>
";
}
