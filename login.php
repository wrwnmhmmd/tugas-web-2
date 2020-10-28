<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: dashboard.php");
    exit;
}
require 'function.php';

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
    <h1>Halaman Login</h1>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
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