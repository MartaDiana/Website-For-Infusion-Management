<?php
// koneksi ke database
require '../functions.php';


//baca data dari tabel sensor
$sql = mysqli_query($conn, "SELECT * FROM multisensor ORDER BY id DESC"); //data terkahir

//baca data teratas
$volume =0;
if(mysqli_num_rows($sql))
{
$data = mysqli_fetch_array($sql);
$volume = $data['volume'];
}
//uji, apabila nilai suhu belum ada maka anggap = 0
if ($volume == 0) {
    $volume = 0;
}

//cetak nilai suhu
echo $volume;
