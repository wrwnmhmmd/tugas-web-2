<?php $db = mysqli_connect("localhost", "root", "", "e_branch");

    function query($query)
    {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data)
    {
        global $db;

        $idCso = $data["cso"];
        $idNasabah = $data["nasabah"];
        $jenisLayanan = $data["jenis_layanan"];
        $tanggalTransaksi = $data["tgl_transaksi"];

        // query insert data
        $query = "INSERT INTO transaksi_cso VALUES
        (   '',
            '$idCso', 
            '$idNasabah',
            '$jenisLayanan',
            '$tanggalTransaksi'
        )";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function hapus($id_transaksi)
    {
        global $db;
        mysqli_query($db, "DELETE FROM transaksi_cso WHERE id_transaksi = $id_transaksi");
        return mysqli_affected_rows($db);
    }

    function ubah($data)
    {
        global $db;

        $idTransaksi = $data["id_transaksi"];
        $idCso = $data["cso"];
        $idNasabah = $data["nasabah"];
        $jenisLayanan = $data["jenis_layanan"];
        $tanggalTransaksi = $data["tgl_transaksi"];

        // query update data
        $query = "UPDATE transaksi_cso SET
                id_cso = '$idCso',        
                id_nasabah = '$idNasabah',
                jenis_layanan = '$jenisLayanan',
                tgl_transaksi = '$tanggalTransaksi'       
                    WHERE id_transaksi = $idTransaksi
                ";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function cari($keyword)
    {
        $query = "SELECT * FROM transaksi_cso WHERE
            id_transaksi LIKE '%$keyword%' OR
            id_cso LIKE '%$keyword%' OR
            id_nasabah LIKE '%$keyword%'
            ";
        return query($query);
    }
?>