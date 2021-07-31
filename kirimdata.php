<?php
	include "functions.php";

	$tetes = $_GET['d1'];
	$volume = $_GET['d2'];
	$kondisi = $_GET['d3'];
	$denyut = $_GET['d4'];

	mysqli_query($conn, "ALTER TABLE multisensor AUTO_INCREMENT=1");
	$kirim = mysqli_query($conn, "INSERT INTO multisensor(tetes, volume, kondisi, denyut)VALUES('$tetes', '$volume', '$kondisi', '$denyut')");
	if($kirim)
		echo "Berhasil";
	else
		echo "Gagal";
?> 