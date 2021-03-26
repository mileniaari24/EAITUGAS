<?php
session_start();
if (isset($_SESSION["is_login"])) {
    header("location: index.php");
}

include("config.php");
$alert = "";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($_POST["remember"])) {
        $remember = TRUE;
    } else {
        $remember = FALSE;
    }

    $login = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($config, $login);
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user["password"])) {
        if ($remember) {
            setcookie("email", $user["email"], strtotime('+7 days'), '/');
        }
        setcookie("warna_navbar", "putih", strtotime('+7 days'), '/');
        $_SESSION["is_login"] = TRUE;
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nama"] = $user["nama"];
        $alert = "Selamat, Anda berhasil login! tunggu sampai dashboard ditampilkan.";
        header("Refresh:2;url=index.php");
    } else {
        $alert = "Maaf, Anda gagal login! Silahkan coba lagi.";
    }
}
?>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | EAI WAREHOUSE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body style="background-color: #F5F5DC">

<!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand mr-auto" href="index.php">EAI WAREHOUSE</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">
            <br>
            <br>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="registrasi.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>

<!-- PHP KONTEN -->
    <?php if ($alert) : ?>
        <div class="alert alert-warning" role="alert">
            <?= $alert ?>
        </div>
    <?php endif; ?>
<!-- KONTEN -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="card w-50">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                    <!-- EMAIL -->
                        <div class="form-group">
                            <label for="email"><b>E-mail</b></label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    <!-- PASSWORD -->
                        <div class="form-group">
                            <label for="password"><b>Kata Sandi</b></label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    <!-- RM -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                <label class="custom-control-label" for="remember">Remember me</label>
                            </div>
                        </div>
                    <!-- SUBMIT -->
                        <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Login</button>
                        </div>
                    <!-- REGIS -->
                        <div class="form-group text-center">
                            <span class="text-center">Belum punya akun? <a href="registrasi.php">Registrasi</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>