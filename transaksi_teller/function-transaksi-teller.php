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

        $idTeller = $data["teller"];
        $idNasabah = $data["nasabah"];
        $jumlahSetoran = $data["jml_setoran"];
        $tanggalTransaksi = $data["tgl_transaksi"];

        // query insert data
        $query = "INSERT INTO transaksi_teller VALUES
        (   '',
            '$idTeller', 
            '$idNasabah',
            '$jumlahSetoran',
            '$tanggalTransaksi'
        )";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function hapus($id_transaksi)
    {
        global $db;
        mysqli_query($db, "DELETE FROM transaksi_teller WHERE id_transaksi = $id_transaksi");
        return mysqli_affected_rows($db);
    }

    function ubah($data)
    {
        global $db;

        $idTransaksi = $data["id_transaksi"];
        $idTeller = $data["teller"];
        $idNasabah = $data["nasabah"];
        $jumlahSetoran = $data["jml_setoran"];
        $tanggalTransaksi = $data["tgl_transaksi"];

        // query update data
        $query = "UPDATE transaksi_teller SET
                id_teller = '$idTeller',        
                id_nasabah = '$idNasabah',
                nilai_setor_tunai = '$jumlahSetoran',
                tanggal_transaksi = '$tanggalTransaksi'       
                    WHERE id_transaksi = $idTransaksi
                ";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function cari($keyword)
    {
        $query = "SELECT * FROM transaksi_teller WHERE
            id_transaksi LIKE '%$keyword%' OR
            id_teller LIKE '%$keyword%' OR
            id_nasabah LIKE '%$keyword%'
            ";
        return query($query);
    }
?>