<?php
// koneksi ke database
require '../functions.php';

//baca data dari tabel sensor
$sql = mysqli_query($conn, "SELECT * FROM multisensor ORDER BY id DESC"); //data terkahir

//baca data teratas
$tetes=0;
if(mysqli_num_rows($sql))
{
$data = mysqli_fetch_array($sql);
$tetes = $data['tetes'];
}
//uji, apabila nilai suhu belum ada maka anggap = 0
if ($tetes == 0) {
    $tetes = 0;
}

//cetak nilai suhu
echo $tetes;
