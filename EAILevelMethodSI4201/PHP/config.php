<?php

$config = mysqli_connect("localhost", "root", "", "wad_modul4");

if (!$config) {
    echo "<h6 style='color:red';>Maaf, Database Anda Gagal Terhubung</h6>";
}