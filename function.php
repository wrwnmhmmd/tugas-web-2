<!-- koneksi ke database -->
<?php $db = mysqli_connect("localhost", "root", "", "e_branch");

function registrasi($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // cek usrname udah ada atau belum
    $result = mysqli_query($db, "SELECT username FROM user WHERE
            username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username sudah terdaftar!')
                    </script>";
        return false;
    }
    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!')
                </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($db);
}
?>