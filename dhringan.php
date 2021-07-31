<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require 'functions.php';


?>

<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dehidrasi Ringan</title>
    <link rel="stylesheet" href="frontend/libraries/bootsrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">
</head>

<body>
    <!-- navbar -->
    <section class="bgatas" id="bgatas">
        <div class="container">
            <nav class="row navbar navbar-expand-lg navbar-light bg-white">
                <div class="navbar-nav ml-auto mr-sm-auto mr-lg-0 mr-md-auto">
                    <img src="frontend/img/pens.png" alt="pens" width="55px">
                </div>
                <ul class="navbar-nav mr-auto d-none d-lg-block">
                    <li>
                        <span class="text-muted">
                            &nbsp; &nbsp;| &nbsp; Monitoring Proses Tatalaksana Dehidrasi
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- akhir navbar -->


    <!-- Dehidrasi Ringan -->
    <section class="dhringan" id="dhringan">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 mb-5">
                    <h1>Tatalaksana pada Pasien Dehidrasi Ringan - Sedang</h1>
                </div>
            </div>

            <div class="row penanganan">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p class="header">Langkah 1 : Proses Tatalaksana (Dengan Observasi Selama 3 jam):</p>
                    <p>1. Rehidrasi dengan cairan (rehidrasi oral)</p>
                    <p>2. Zink</p>
                    <p>3. Antibiotik selektif</p>
                    <p>4. Diet</p>
                    <p class="header">Langkah 2 : Nilai Kembali Skor Dihidrasi: <a href="denyut.php">Nilai Kembali</a> </p>
                    <p class="header">Jika Skor Dehidrasi Berkurang :</p>
                    <p>-> Pasien Boleh Pulang</p>
                    <p class="header">Jika Skor Dehidrasi Tetap:</p>
                    <p>-> Ulangi Langkah 1 dan Langkah 2.</p>
                    <p class="header">Jika Skor Dehidrasi Bertambah:</p>
                    <p>-> Secara Otomatis akan Diarahkan pada Proses Tatalaksana Dehidrasi Menggunakan Cairan Intravena.</p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col ml-auto mr-sm-auto">
                    <a href="logout.php" class="btn btn-dashboard px-5 mt-4 mb-4 ">Log Out</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Dehidrasi Ringan  -->


    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="foter"> &copy; Created by Marta Diana.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->



    <script src="frontend/libraries/js/jquery-3.1.1.js"></script>
    <script src="frontend/libraries/bootsrap/js/bootstrap.js"></script>
    <script src="frontend/scripts/main.js"></script>
    <script src="frontend/libraries/js/retina.min.js"></script>
</body>

</html>