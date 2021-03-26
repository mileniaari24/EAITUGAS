<?php
session_start();
if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}

include("config.php");
$user_id = $_SESSION["user_id"];
$alert = "";

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    mysqli_query($config, "DELETE FROM cart WHERE id=$id");
    $alert = "Berhasil dihapus";
}
$daftar_barang = mysqli_query($config, "SELECT * FROM cart WHERE user_id=$user_id");
?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRASI | EAI WAREHOUSE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="background-color: #F5F5DC">

<!-- NAVBAR -->
    <?php if ($_COOKIE["warna_navbar"] == "dark") : ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand mr-auto" href="index.php">WAD Beauty</a>
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
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $total = 0; ?>
                        <?php while ($barang = mysqli_fetch_assoc($daftar_barang)) : ?>
                            <?php $total += $barang["harga"]; ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $barang["nama_barang"]; ?></td>
                                <td>Rp<?= number_format($barang["harga"]); ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?= $barang["id"] ?>">
                                        <button type="submit" name="submit" class="btn btn-warning btn-block" onclick="return confirm('Apakah Anda yakin untuk menghapus dari keranjang?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="2" class="font-weight-bold">Total</td>
                            <td colspan="2" class="font-weight-bold">Rp<?= number_format($total); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>