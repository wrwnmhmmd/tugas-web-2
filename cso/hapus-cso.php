<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function-cso.php';

$id_cso = $_GET["id_cso"];

if(hapus($id_cso) > 0) {
    echo "
    <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'home-cso.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'home-cso.php';
    </script>
";
}
