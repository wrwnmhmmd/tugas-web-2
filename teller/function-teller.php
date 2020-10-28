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
        $namaTeller = htmlspecialchars($data["nama_teller"]);
        $nppTeller = htmlspecialchars($data["npp_teller"]);

        // query insert data
        $query = "INSERT INTO tbl_teller VALUES
        ('', '$namaTeller', '$nppTeller')
        ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function hapus($id_teller)
    {
        global $db;
        mysqli_query($db, "DELETE FROM tbl_teller WHERE id_teller = $id_teller");
        return mysqli_affected_rows($db);
    }

    function ubah($data)
    {
        global $db;

        $idTeller = $data["id_teller"];
        $namaTeller = htmlspecialchars($data["nama_teller"]);
        $nppTeller = htmlspecialchars($data["npp_teller"]);

        // query update data
        $query = "UPDATE tbl_teller SET
                nama_teller = '$namaTeller',        
                npp_teller = '$nppTeller'       
                    WHERE id_teller = $idTeller
                ";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function cari($keyword)
    {
        $query = "SELECT * FROM tbl_teller WHERE
            nama_teller LIKE '%$keyword%' OR
            npp_teller LIKE '%$keyword%'
            ";
        return query($query);
    }
?>