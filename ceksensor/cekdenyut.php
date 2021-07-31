<?php
// koneksi ke database
require '../functions.php';


//baca data dari tabel sensor
$sql = mysqli_query($conn, "SELECT * FROM multisensor ORDER BY id DESC"); //data terkahir

$denyut=0;
if(mysqli_num_rows($sql))
{
//baca data teratas
$data = mysqli_fetch_array($sql);
$denyut = $data['denyut'];
}
//uji, apabila nilai suhu belum ada maka anggap = 0
if ($denyut == 0) {
    $denyut = 0;
}

//cetak nilai suhu
echo $denyut;
