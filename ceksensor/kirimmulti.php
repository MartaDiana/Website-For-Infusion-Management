<?php

require '../functions.php';

//baca data yang dikirim dari nodemcu

$tetes = $_GET['d1'];
$volume = $_GET['d2'];
$kondisi = $_GET['d3'];
$denyut = $_GET['d4'];


mysqli_query($conn, "ALTER TABLE multisensor AUTO_INCREMENT = 1");

//simpan data sensor ke tabel sensor
$simpan = mysqli_query($conn, "INSERT INTO multisensor(tetes, volume, denyut, kondisi) VALUES ('$tetes', '$volume', '$denyut', '$kondisi')");

// uji simpan untuk memberika response
if ($simpan)
    echo "OK";
else
    echo "Error";
