<?php
session_start();
if (isset($_SESSION["is_login"])) {
    header("location: index.php");
}

include("config.php");
$alert = "";
if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $password2 = password_hash($_POST["password2"], PASSWORD_DEFAULT);

    $daftar = "INSERT INTO user VALUES (NULL, '$nama', '$email', '$no_hp', '$password')";
    $result = mysqli_query($config, $daftar);

    if ($result) {
        $alert = "Berhasil registrasi";
    } else {
        $alert = "Gagal registrasi";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRASI | EAI WAREHOUSE</title>
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
            <div class="card mb-3 w-50">
                <div class="card-header text-center">
                    <h3>Registrasi</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                    <!-- NAMA -->
                        <div class="form-group">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    <!-- EMAIL -->
                        <div class="form-group">
                            <label for="email"><b>E-mail</b></label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    <!-- NO HP -->
                        <div class="form-group">
                            <label for="no_hp"><b>No. Handphone</b></label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp">
                        </div>
                    <!-- PASSWORD -->
                        <div class="form-group">
                            <label for="password"><b>Kata Sandi</b></label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    <!-- KONFIRMASI PASS -->
                        <div class="form-group">
                            <label for="password2"><b>Konfirmasi Kata Sandi</b></label>
                            <input type="password" class="form-control" id="password2" name="password2">
                        </div>
                    <!-- SUBMIT -->
                        <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Daftar</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-center">Sudah punya akun? <a href="login.php">Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>