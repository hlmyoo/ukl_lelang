<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "lelang";

    //buat koneksi
    $koneksi = mysqli_connect($serverName, $userName, $password, $database);

    //cek koneksi
    if (!$koneksi) {
       die("Koneksi Gagal ".mysqli_connect_error());
    }
    
?>