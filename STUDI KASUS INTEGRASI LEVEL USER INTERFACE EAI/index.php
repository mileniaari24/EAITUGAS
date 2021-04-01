<!DOCTYPE html>
<html>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


<head>

<nav class="navbar navbar-light" style="background-color: #db8989;">
  <div class="container">
    <a class="navbar-brand" href="">
      <img src="https://www.freepnglogos.com/uploads/bukalapak-logo-png/bukalapak-apa-itu-startup-pengertian-cara-memulai-dan-0.png" alt="" width="155" height="65" style="margin-left:14cm">
      <img src="https://www.jd.id/news/wp-content/uploads/2020/06/JDID_4-1024x1024.png" alt="" width="100" height="80">
    </a>
  </div>
</nav>

    <title>Scraping Website</title>
    <link rel="stylesheet" type="text/css" href="ini.css">
    <style>
        blink {
            color: #1c87c8;
            font-size: 15px;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Arial, 'Trebuchet MS';
        }
        table,
        th,
        td {
            border: 2px solid white;

        }
    </style>
</head>

<body>

<div class="col-md-10" style="margin-top: 1cm; margin-left: 4cm; margin-bottom: 1cm; width: 85%">
    <div class="card">
        <div class="card body-centered">
            <?php
                //ambil data dari tb_admin di database
                include 'config.php';
                $query = "SELECT * FROM data";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Bukalapak Image</th>";
                    echo "<th>Bukalapak URL</th>";
                    echo "<th>Bukalapak Harga</th>";
                    echo "<th>Bukalapak Nama Produk</th>";
                    echo "<th>Jd.id Image</th>";
                    echo "<th>Jd.Id URL</th>";
                    echo "<th>Jd.Id Harga</th>";
                    echo "<th>Jd.Id Nama Produk</th>";

                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";

                    // BukaLapak
                    echo "<td> <img src=' " . $row['bukalapak_image'] . " ' width='100' height='100
                    ' /></td>";
                    echo "<td> <a href = ' " . $row['bukalapak_url'] . " ' style='color:black' />
                    Link Website Bukalapak </td>";
                    echo "<td>" . $row['bukalapak_harga1'] . "</td>";
                    echo "<td>" . $row['bukalapak_namaproduk1'] . "</td>";
                
                    // jd id
                    echo "<td> <img src=' " . $row['samsung_image'] . " ' width='100' height='100
                        ' /></td>";
                    echo "<td> <a href = ' " . $row['samsung_url'] . " ' style='color:black' /> 
                        Link Website Jd.Id </td>";
                    echo "<td>" . $row['samsung_harga'] . "</td>";
                    echo "<td width='100px'>" . $row['samsung_namaproduk'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table";
                }
            ?>
        </div>
    </div>
</div>

</body>

</html>