<?php
session_start();
if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}

include("config.php");
$id = $_SESSION["user_id"];
$result = mysqli_query($config, "SELECT * FROM user WHERE id=$id");
$user = mysqli_fetch_assoc($result);
$alert = "";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $password = "";
    $password2 = "";
    $warna_navbar = $_POST["warna_navbar"];

    setcookie("warna_navbar", $warna_navbar, strtotime('+7 days'), '/');

    if (!empty($_POST["password"]) && !empty($_POST["password2"])) {
        if ($_POST["password"] === $_POST["password2"]) {
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        } else {
            $alert = "Gagal: kata sandi dan konfirmasi kata sandi tidak sesuai!";
        }
    } else {
        $password = $user["password"];
    }

    $query = "UPDATE user SET nama='$nama', no_hp=$no_hp, password='$password' WHERE id=$id";
    $update = mysqli_query($config, $query);
    if ($update) {
        $_SESSION["nama"] = $nama;
        $alert = "Profil berhasil diperbarui";
    }
}

$result = mysqli_query($config, "SELECT * FROM user WHERE id=$id");
$user = mysqli_fetch_assoc($result);
?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE | EAI WAREHOUSE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="background-color: #F5F5DC">

<!-- NAVBAR -->
    <?php if ($_COOKIE["warna_navbar"] == "dark") : ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand mr-auto" href="index.php">EAI WAREHOUSE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text">Selamat Datang, </span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php else : ?>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand mr-auto" href="index.php">EAI WAREHOUSE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text">Selamat Datang, </span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>

<!-- PHP KONTEN -->
    <?php if ($alert) : ?>
        <div class="alert alert-warning w-100" role="alert">
            <?= $alert ?>
        </div>
    <?php endif; ?>
<!-- KONTEN -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="card w-75">
                <div class="card-header text-center">
                    <h3>Profile</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                    <!-- EMAIL -->
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b>Email</b></label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?= $user["email"] ?>">
                            </div>
                        </div>
                    <!-- NAMA -->
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label"><b>Nama</b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user["nama"] ?>">
                            </div>
                        </div>
                    <!-- NO HP -->
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $user["no_hp"] ?>">
                            </div>
                        </div>
                    <!-- PASSWORD -->
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label"><b>Password</b></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    <!--KONFIRMASI PASSWORD  -->
                        <div class="form-group row">
                            <label for="password2" class="col-sm-3 col-form-label"><b>Konfirmasi Password</b></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password2" name="password2">
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Submit</button>
                        <a class="btn btn-secondary btn-block" href="index.php" role="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>