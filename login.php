<?php
session_start();
require 'function.php';

// set cooket
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // set cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] == true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            //  cek remember me
            if (isset($_POST['remember'])) {
                // buat coockie nya
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']));
            }
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/style-login.css">
</head>
<body>
    <div class="card">
        <div class="card-title">
            <h2>LOGIN</h2>
        </div>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
        <?php if (isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username atau Password Salah</p>
        <?php endif; ?>
    </form>
    </div>
</body>

</html>