<?php

    $data = $_GET['data'];
    error_reporting(0);

    if($data == 'home') {
        include "dashboard.php";
    } elseif($data == 'nasabah/home-nasabah.php') {
        include"nasabah/home-nasabah.php";
    } elseif($data == 'teller/home-teller.php') {
        include"teller/home-teller.php";
    } elseif($data == 'cso/home-cso.php') {
        include"cso/home-cso.php";
    }
?>
