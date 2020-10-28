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
        $nama_nasabah = htmlspecialchars($data["nama_nasabah"]);
        $nomor_rekening = htmlspecialchars($data["nomor_rekening"]);
        $email = htmlspecialchars($data["email"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $nomor_handphone = htmlspecialchars($data["nomor_handphone"]);

        // query insert data
        $query = "INSERT INTO tbl_nasabah VALUES
        ('', '$nama_nasabah', '$nomor_rekening', '$email', '$alamat', '$nomor_handphone')
        ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function hapus($id_nasabah)
    {
        global $db;
        mysqli_query($db, "DELETE FROM tbl_nasabah WHERE id_nasabah = $id_nasabah");
        return mysqli_affected_rows($db);
    }

    function ubah($data)
    {
        global $db;

        $id_nasabah = $data["id_nasabah"];
        $nama_nasabah = htmlspecialchars($data["nama_nasabah"]);
        $nomor_rekening = htmlspecialchars($data["nomor_rekening"]);
        $email = htmlspecialchars($data["email"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $nomor_handphone = htmlspecialchars($data["nomor_handphone"]);

        // query insert data
        $query = "UPDATE tbl_nasabah SET
                nama_nasabah = '$nama_nasabah',        
                nomor_rekening = '$nomor_rekening',        
                email = '$email',        
                alamat = '$alamat',        
                nomor_handphone = '$nomor_handphone'
                    WHERE id_nasabah = $id_nasabah
                ";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function cari($keyword)
    {
        $query = "SELECT * FROM tbl_nasabah WHERE
            nama_nasabah LIKE '%$keyword%' OR
            nomor_rekening LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
            ";
        return query($query);
    }
?>