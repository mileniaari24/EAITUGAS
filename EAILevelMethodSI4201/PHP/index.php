<?php
session_start();
if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}

include("config.php");
$alert = "";
if (isset($_POST["submit"])) {
    $nama_barang = $_POST["nama_barang"];
    $user_id = $_SESSION["user_id"];
    $harga = $_POST["harga"];

    $query = "INSERT INTO cart VALUES (NULL, $user_id, '$nama_barang', $harga)";
    $result = mysqli_query($config, $query);

    $alert = "Terimakasih! Pesanan Anda berhasil ditambahkan";
}
?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | EAI WAREHOUSE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="background-color: #F5F5DC">

<!-- NAVBAR DAN PHP KONTEN -->

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
                        <span class="navbar-text">Selamat Datang,  </span>
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
    <div class="container mt-5">
        <div class="card-header text-center" style="background:#FFEBCD; ">
            <h2>Selamat Datang di EAI WAREHOUSE Kelompok 8</h2>
            <p><b>---List Data Barang di Gudang---</b></p>
        </div>
        <br>
        <br>
        <div class="container row justify-content-center">
         <!-- CARD 1 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">Hada labo Tamagohada Face Wash 100gr</h5>
                        <hr>
                        <b>Rp55.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="Hada labo Tamagohada Face Wash 100gr">
                        <input type="hidden" name="harga" value="55000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
        <!-- CARD 2 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">AXIS-Y - Complete No-Stress Physical Sunscreen 50ml</h5>
                        <hr>
                        <b>Rp239.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="AXIS-Y - Complete No-Stress Physical Sunscreen 50ml">
                        <input type="hidden" name="harga" value="239000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD3 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">The Body Shop - Tea Tree Mattifying Lotion 50ml</h5>
                        <hr>
                        <b>Rp209.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="The Body Shop - Tea Tree Mattifying Lotion 50ml">
                        <input type="hidden" name="harga" value="209000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD4 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">COSRX</h5>
                        <hr>
                        <b>Rp189.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="COSRX">
                        <input type="hidden" name="harga" value="189000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD5 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">ARIUL</h5>
                        <hr>
                        <b>Rp25.350</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="ARIUL">
                        <input type="hidden" name="harga" value="25350">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD6 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">NACIFIC</h5>
                        <hr>
                        <b>Rp159.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="NACIFIC">
                        <input type="hidden" name="harga" value="159000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD7 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">DEAR KLAIRS</h5>
                        <hr>
                        <b>Rp450.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="DEAR KLAIRS">
                        <input type="hidden" name="harga" value="450000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD8 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">LANEIGE</h5>
                        <hr>
                        <b>Rp249.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="LANEIGE">
                        <input type="hidden" name="harga" value="249000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD9 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">KLAVUU</h5>
                        <hr>
                        <b>Rp465.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="KLAVUU">
                        <input type="hidden" name="harga" value="465000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD10 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">WHITELAB</h5>
                        <hr>
                        <b>Rp264.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="WHITELAB">
                        <input type="hidden" name="harga" value="264000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD11 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">SOMETHINC</h5>
                        <hr>
                        <b>Rp225.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="SOMETHINC">
                        <input type="hidden" name="harga" value="225000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD12 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">THE ORDINARY</h5>
                        <hr>
                        <b>Rp170.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="THE ORDINARY">
                        <input type="hidden" name="harga" value="170000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD13 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">ROJUKISS MASK</h5>
                        <hr>
                        <b>Rp42.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="ROJUKISS MASK">
                        <input type="hidden" name="harga" value="42000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD14 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">ZLOTA SERUM</h5>
                        <hr>
                        <b>Rp134.000</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="ZLOTA SERUM">
                        <input type="hidden" name="harga" value="134000">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
            <!-- CARD15 -->
            <div class="card" style="width: 20rem;">
                <form method="POST">
                    <div class="card-body">
                        <h5 class="card-title">Cetaphil</h5>
                        <hr>
                        <b>Rp148.200</b>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="nama_barang" value="Cetaphil">
                        <input type="hidden" name="harga" value="148200">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Tambahkan ke Toko</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>