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
        $namaCso = htmlspecialchars($data["nama_cso"]);
        $nppCso = htmlspecialchars($data["npp_cso"]);

        // query insert data
        $query = "INSERT INTO tbl_cso VALUES
        ('', '$namaCso', '$nppCso')
        ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function hapus($id_cso)
    {
        global $db;
        mysqli_query($db, "DELETE FROM tbl_cso WHERE id_cso = $id_cso");
        return mysqli_affected_rows($db);
    }

    function ubah($data)
    {
        global $db;

        $idCso = $data["id_cso"];
        $namaCso = htmlspecialchars($data["nama_cso"]);
        $nppCso = htmlspecialchars($data["npp_cso"]);

        // query update data
        $query = "UPDATE tbl_cso SET
                nama_cso = '$namaCso',        
                npp_cso = '$nppCso'       
                    WHERE id_cso = $idCso
                ";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function cari($keyword)
    {
        $query = "SELECT * FROM tbl_cso WHERE
            nama_cso LIKE '%$keyword%' OR
            npp_cso LIKE '%$keyword%'
            ";
        return query($query);
    }
?>