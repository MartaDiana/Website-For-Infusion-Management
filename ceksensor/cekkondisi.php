<?php
// koneksi ke database
require '../functions.php';


//baca data dari tabel sensor
$sql = mysqli_query($conn, "SELECT * FROM multisensor ORDER BY id DESC"); //data terkahir

//baca data teratas
$kondisi=0;
if(mysqli_num_rows($sql))
{
$data = mysqli_fetch_array($sql);
$kondisi = $data['kondisi'];
}
//uji, apabila nilai suhu belum ada maka anggap = 0

if ($kondisi == 0) {
    echo "Aman";
} elseif ($kondisi == 1) {
    echo "Ada Gangguan, Segera Cek!";
}
// cetak tetesan
